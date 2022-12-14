<?php

require('logic.php');

session_start();


//require('logic.php');

$accion = $_POST['action'];


if($accion=="cargar_perfil"){

$id_user =$_POST['id_user'];


$sql = "SELECT *FROM user where id_user='$id_user'";

$ejecutar = $conexion->query($sql);

foreach ($ejecutar as $key) {
	
	$data[] = $key; 

}

      echo 	json_encode($data);
 
 $conexion->close();

}else if($accion=="actualizar_perfil"){

	$id_user = $_SESSION['id_user'];
	$usuario  = $_POST['usuario'];
	$password = $_POST['pw'];
	$email = $_POST['email'];
	$foto_tmp = $_FILES['foto']['tmp_name'];

		Video::actualizar_perfil($usuario,$password,$email,$id_user,$foto_tmp);


}else{

	echo "Sorry this type of format is not supported try with mp4 png or jpg";
}



 





?>