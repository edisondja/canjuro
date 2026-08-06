/*
================================================================================
  Oracle Forms - Carga de archivos XLS / XLSX
  Archivo: pkg_cargar_xls.pll.sql

  Uso:
    1) Copia estas Program Units al .fmb o a una PLL adjunta.
    2) En Forms Web (10g/11g/12c) usa CLIENT_OLE2 + WebUtil.
    3) Requiere Excel instalado en el cliente Windows.
    4) Ajusta INSERT_FILA_XLS a tu tabla / bloque.

  Formato esperado de la hoja (fila 1 = encabezados, datos desde fila 2):
    A = CODIGO | B = DESCRIPCION | C = CANTIDAD | D = PRECIO
================================================================================
*/

/*------------------------------------------------------------------------------
  Lee el valor de una celda Excel y lo devuelve como VARCHAR2.
------------------------------------------------------------------------------*/
FUNCTION XLS_CELDA(
  p_worksheet IN CLIENT_OLE2.OBJ_TYPE,
  p_fila      IN NUMBER,
  p_columna   IN NUMBER
) RETURN VARCHAR2 IS
  v_args   CLIENT_OLE2.LIST_TYPE;
  v_cell   CLIENT_OLE2.OBJ_TYPE;
  v_valor  VARCHAR2(4000);
BEGIN
  v_args := CLIENT_OLE2.CREATE_ARGLIST;
  CLIENT_OLE2.ADD_ARG(v_args, p_fila);
  CLIENT_OLE2.ADD_ARG(v_args, p_columna);

  v_cell  := CLIENT_OLE2.GET_OBJ_PROPERTY(p_worksheet, 'Cells', v_args);
  CLIENT_OLE2.DESTROY_ARGLIST(v_args);

  v_valor := CLIENT_OLE2.GET_CHAR_PROPERTY(v_cell, 'Text');
  CLIENT_OLE2.RELEASE_OBJ(v_cell);

  RETURN TRIM(v_valor);
EXCEPTION
  WHEN OTHERS THEN
    BEGIN
      CLIENT_OLE2.DESTROY_ARGLIST(v_args);
    EXCEPTION
      WHEN OTHERS THEN NULL;
    END;
    BEGIN
      CLIENT_OLE2.RELEASE_OBJ(v_cell);
    EXCEPTION
      WHEN OTHERS THEN NULL;
    END;
    RETURN NULL;
END;

/*------------------------------------------------------------------------------
  Inserta una fila leída del Excel.
  PERSONALIZA esta rutina según tu tabla o bloque Forms.
------------------------------------------------------------------------------*/
PROCEDURE INSERT_FILA_XLS(
  p_codigo      IN VARCHAR2,
  p_descripcion IN VARCHAR2,
  p_cantidad    IN VARCHAR2,
  p_precio      IN VARCHAR2,
  p_fila_excel  IN NUMBER
) IS
BEGIN
  /* Opción A: insertar en tabla staging */
  INSERT INTO STG_CARGA_XLS (
    CODIGO,
    DESCRIPCION,
    CANTIDAD,
    PRECIO,
    FILA_EXCEL,
    FECHA_CARGA
  ) VALUES (
    p_codigo,
    p_descripcion,
    TO_NUMBER(NVL(NULLIF(REPLACE(p_cantidad, ',', '.'), ''), '0')),
    TO_NUMBER(NVL(NULLIF(REPLACE(p_precio, ',', '.'), ''), '0')),
    p_fila_excel,
    SYSDATE
  );

  /*
  -- Opción B: crear registro en bloque Forms
  GO_BLOCK('BLK_DETALLE');
  CREATE_RECORD;
  :BLK_DETALLE.CODIGO      := p_codigo;
  :BLK_DETALLE.DESCRIPCION := p_descripcion;
  :BLK_DETALLE.CANTIDAD    := TO_NUMBER(NVL(NULLIF(REPLACE(p_cantidad, ',', '.'), ''), '0'));
  :BLK_DETALLE.PRECIO      := TO_NUMBER(NVL(NULLIF(REPLACE(p_precio, ',', '.'), ''), '0'));
  */
END;

/*------------------------------------------------------------------------------
  Abre el XLS, recorre filas y carga datos.
  p_ruta_archivo: ruta completa en el CLIENTE, ej. C:\temp\carga.xls
  p_hoja        : nombre de la hoja o NULL para la activa
  p_max_filas   : tope de seguridad (default 5000)
------------------------------------------------------------------------------*/
PROCEDURE CARGAR_XLS(
  p_ruta_archivo IN VARCHAR2,
  p_hoja         IN VARCHAR2 DEFAULT NULL,
  p_max_filas    IN NUMBER   DEFAULT 5000
) IS
  v_app        CLIENT_OLE2.OBJ_TYPE;
  v_workbooks  CLIENT_OLE2.OBJ_TYPE;
  v_workbook   CLIENT_OLE2.OBJ_TYPE;
  v_worksheets CLIENT_OLE2.OBJ_TYPE;
  v_worksheet  CLIENT_OLE2.OBJ_TYPE;
  v_args       CLIENT_OLE2.LIST_TYPE;

  v_fila       NUMBER := 2; -- fila 1 = encabezados
  v_cargadas   NUMBER := 0;
  v_omitidas   NUMBER := 0;

  v_codigo      VARCHAR2(100);
  v_descripcion VARCHAR2(500);
  v_cantidad    VARCHAR2(100);
  v_precio      VARCHAR2(100);
  v_vacio       BOOLEAN;
BEGIN
  IF p_ruta_archivo IS NULL THEN
    MESSAGE('Debe indicar la ruta del archivo XLS.');
    SYNCHRONIZE;
    RETURN;
  END IF;

  /* 1) Abrir Excel */
  v_app := CLIENT_OLE2.CREATE_OBJ('Excel.Application');
  CLIENT_OLE2.SET_PROPERTY(v_app, 'Visible', FALSE);
  CLIENT_OLE2.SET_PROPERTY(v_app, 'DisplayAlerts', FALSE);

  /* 2) Abrir workbook */
  v_workbooks := CLIENT_OLE2.GET_OBJ_PROPERTY(v_app, 'Workbooks');
  v_args := CLIENT_OLE2.CREATE_ARGLIST;
  CLIENT_OLE2.ADD_ARG(v_args, p_ruta_archivo);
  v_workbook := CLIENT_OLE2.INVOKE_OBJ(v_workbooks, 'Open', v_args);
  CLIENT_OLE2.DESTROY_ARGLIST(v_args);

  /* 3) Seleccionar hoja */
  IF p_hoja IS NOT NULL THEN
    v_worksheets := CLIENT_OLE2.GET_OBJ_PROPERTY(v_workbook, 'Worksheets');
    v_args := CLIENT_OLE2.CREATE_ARGLIST;
    CLIENT_OLE2.ADD_ARG(v_args, p_hoja);
    v_worksheet := CLIENT_OLE2.GET_OBJ_PROPERTY(v_worksheets, 'Item', v_args);
    CLIENT_OLE2.DESTROY_ARGLIST(v_args);
  ELSE
    v_worksheet := CLIENT_OLE2.GET_OBJ_PROPERTY(v_workbook, 'ActiveSheet');
  END IF;

  /* 4) Recorrer filas hasta encontrar fila vacía o llegar al tope */
  LOOP
    EXIT WHEN v_fila > p_max_filas;

    v_codigo      := XLS_CELDA(v_worksheet, v_fila, 1);
    v_descripcion := XLS_CELDA(v_worksheet, v_fila, 2);
    v_cantidad    := XLS_CELDA(v_worksheet, v_fila, 3);
    v_precio      := XLS_CELDA(v_worksheet, v_fila, 4);

    v_vacio := (v_codigo IS NULL AND v_descripcion IS NULL
                AND v_cantidad IS NULL AND v_precio IS NULL);
    EXIT WHEN v_vacio;

    IF v_codigo IS NULL THEN
      v_omitidas := v_omitidas + 1;
    ELSE
      BEGIN
        INSERT_FILA_XLS(v_codigo, v_descripcion, v_cantidad, v_precio, v_fila);
        v_cargadas := v_cargadas + 1;
      EXCEPTION
        WHEN OTHERS THEN
          v_omitidas := v_omitidas + 1;
          MESSAGE('Error fila ' || v_fila || ': ' || SQLERRM);
          SYNCHRONIZE;
      END;
    END IF;

    v_fila := v_fila + 1;
  END LOOP;

  FORMS_DDL('COMMIT');

  MESSAGE('Carga finalizada. Insertadas: ' || v_cargadas ||
          ' | Omitidas: ' || v_omitidas);
  SYNCHRONIZE;

  /* 5) Cerrar Excel */
  CLIENT_OLE2.INVOKE(v_workbook, 'Close');
  CLIENT_OLE2.INVOKE(v_app, 'Quit');

  BEGIN CLIENT_OLE2.RELEASE_OBJ(v_worksheet);  EXCEPTION WHEN OTHERS THEN NULL; END;
  BEGIN CLIENT_OLE2.RELEASE_OBJ(v_worksheets); EXCEPTION WHEN OTHERS THEN NULL; END;
  BEGIN CLIENT_OLE2.RELEASE_OBJ(v_workbook);   EXCEPTION WHEN OTHERS THEN NULL; END;
  BEGIN CLIENT_OLE2.RELEASE_OBJ(v_workbooks);  EXCEPTION WHEN OTHERS THEN NULL; END;
  BEGIN CLIENT_OLE2.RELEASE_OBJ(v_app);        EXCEPTION WHEN OTHERS THEN NULL; END;

EXCEPTION
  WHEN OTHERS THEN
    BEGIN
      CLIENT_OLE2.INVOKE(v_workbook, 'Close');
      CLIENT_OLE2.INVOKE(v_app, 'Quit');
    EXCEPTION
      WHEN OTHERS THEN NULL;
    END;

    MESSAGE('Error al cargar XLS: ' || SQLERRM);
    SYNCHRONIZE;
    RAISE;
END;
