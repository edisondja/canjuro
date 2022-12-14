<!DOCTYPE html>
<html>
<head>
	<title>dsadasd</title>
</head>
<body>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="file" name="imagen"/>

		<input type="submit" value="cargar">
	</form>

</body>
</html>
<?php	ini_set('display_errors', 'On');
	ini_set('html_errors', 0);
	error_reporting(-1);

	include'logic.php';


		//Video::estadistica_video(0,'top_general',true);	
	//	Video::cargar_tableros(618);
		Video::cargar_tablero(7);
	//	Video::search_tablero("Pervertido jugador de lol sube pack de su madre e hermana");
    Video::cargar_multimedias_de_tablero(7);

	if(isset($_FILES['imagen']['tmp_name'])){
		echo "pye";
	    Video::asignador_de_multimedia_tablero(3,$_FILES['imagen']['tmp_name'],$_FILES['imagen']['type'],'Culones bien lindones');
    
    }
?>