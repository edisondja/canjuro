/*
================================================================================
  Alternativa SIN Excel / OLE2
  -----------------------------
  1) Guarda el XLS como CSV (separado por comas o punto y coma).
  2) Sube el archivo al cliente y léelo con TEXT_IO / WebUtil.

  Formato CSV esperado:
    CODIGO,DESCRIPCION,CANTIDAD,PRECIO
    P001,Producto demo,10,25.50
================================================================================
*/

PROCEDURE CARGAR_CSV(
  p_ruta_archivo IN VARCHAR2,
  p_separador    IN VARCHAR2 DEFAULT ','
) IS
  v_file   TEXT_IO.FILE_TYPE;
  v_linea  VARCHAR2(4000);
  v_fila   NUMBER := 0;
  v_ok     NUMBER := 0;

  v_codigo      VARCHAR2(100);
  v_descripcion VARCHAR2(500);
  v_cantidad    VARCHAR2(100);
  v_precio      VARCHAR2(100);

  FUNCTION NTH_FIELD(
    p_texto     IN VARCHAR2,
    p_pos       IN NUMBER,
    p_separador IN VARCHAR2
  ) RETURN VARCHAR2 IS
    v_inicio NUMBER := 1;
    v_fin    NUMBER;
    v_i      NUMBER := 1;
  BEGIN
    LOOP
      v_fin := INSTR(p_texto || p_separador, p_separador, v_inicio);
      IF v_i = p_pos THEN
        RETURN TRIM(SUBSTR(p_texto, v_inicio, v_fin - v_inicio));
      END IF;
      EXIT WHEN v_fin = 0 OR v_i > 50;
      v_inicio := v_fin + LENGTH(p_separador);
      v_i := v_i + 1;
    END LOOP;
    RETURN NULL;
  END;
BEGIN
  /* En Forms Web usar: CLIENT_TEXT_IO.FOPEN(...) */
  v_file := TEXT_IO.FOPEN(p_ruta_archivo, 'R');

  LOOP
    BEGIN
      TEXT_IO.GET_LINE(v_file, v_linea);
    EXCEPTION
      WHEN NO_DATA_FOUND THEN
        EXIT;
    END;

    v_fila := v_fila + 1;

    /* Fila 1 = encabezado */
    IF v_fila > 1 THEN
      v_codigo      := NTH_FIELD(v_linea, 1, p_separador);
      v_descripcion := NTH_FIELD(v_linea, 2, p_separador);
      v_cantidad    := NTH_FIELD(v_linea, 3, p_separador);
      v_precio      := NTH_FIELD(v_linea, 4, p_separador);

      IF v_codigo IS NOT NULL THEN
        INSERT_FILA_XLS(v_codigo, v_descripcion, v_cantidad, v_precio, v_fila);
        v_ok := v_ok + 1;
      END IF;
    END IF;
  END LOOP;

  TEXT_IO.FCLOSE(v_file);
  FORMS_DDL('COMMIT');

  MESSAGE('CSV cargado. Filas insertadas: ' || v_ok);
  SYNCHRONIZE;

EXCEPTION
  WHEN OTHERS THEN
    BEGIN
      TEXT_IO.FCLOSE(v_file);
    EXCEPTION
      WHEN OTHERS THEN NULL;
    END;
    MESSAGE('Error CSV: ' || SQLERRM);
    SYNCHRONIZE;
    RAISE;
END;
