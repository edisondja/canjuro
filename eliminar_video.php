<?php
	//eliminar_comentario
	require('logic.php');

	$id = $_POST['id'];
	$sql =  "DELETE FROM comentario  where id_user='$id'";
	$result =  $conexion->query($sql);
	if($result){

		echo "success";
	}else{
		echo "error no se pudo elimianr el comentario";
	}














?>