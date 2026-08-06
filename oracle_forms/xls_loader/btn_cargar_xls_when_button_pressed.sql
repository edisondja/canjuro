/*
================================================================================
  Trigger: WHEN-BUTTON-PRESSED del botón BTN_CARGAR_XLS
  Requiere: WebUtil configurado (CLIENT_GET_FILE_NAME / CLIENT_OLE2)
================================================================================
*/
DECLARE
  v_ruta VARCHAR2(500);
BEGIN
  /* Diálogo para elegir el archivo en el cliente */
  v_ruta := CLIENT_GET_FILE_NAME(
              NULL,
              NULL,
              'Archivos Excel (*.xls;*.xlsx)|*.xls;*.xlsx|Todos (*.*)|*.*',
              'Seleccione el archivo Excel a cargar',
              OPEN_FILE,
              TRUE
            );

  IF v_ruta IS NULL THEN
    MESSAGE('Carga cancelada.');
    SYNCHRONIZE;
    RETURN;
  END IF;

  /* Opcional: limpiar staging antes de cargar */
  DELETE FROM STG_CARGA_XLS;
  FORMS_DDL('COMMIT');

  /*
    Si tu hoja no se llama como la activa, pasa el nombre:
    CARGAR_XLS(v_ruta, 'Hoja1');
  */
  CARGAR_XLS(v_ruta);

  /* Refrescar bloque si muestras la staging en pantalla */
  GO_BLOCK('BLK_STG_XLS');
  EXECUTE_QUERY;

EXCEPTION
  WHEN OTHERS THEN
    MESSAGE('No se pudo cargar el archivo: ' || SQLERRM);
    SYNCHRONIZE;
END;
