<?php

include'../config/conexion.php';


  $action = $_POST['action'];

  if($action=="check_user"){

  		$user = $_POST['usuario'];
  		$sql = "select * from user where usuario=?";
  		$ready  = $conexion->prepare($sql);
  		$ready->bind_param('s',$user);
  		$ready->execute();
 		$valor =$ready->get_result();

 		if($valor->num_rows>0){

 				echo "no_disponible";
 		}else{ 

 			echo "disponible";
 		}


  }else if($action=="check_email"){

  		$email = $_POST['email'];

  		$sql = "select * from user where email=?";
  		$ready  = $conexion->prepare($sql);
  		$ready->bind_param('s',$email);
  	    $ready->execute();
 		$data = $ready->get_result();

 		if($data->num_rows>0){

 				echo "no_disponible";
 		}else{ 

 			echo "disponible";
 		}



  }else if($action=="registrer_user"){

  	$usuario =$_POST['usuario'];
	$email = $_POST['email'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['clave2'];
	$sexo = $_POST['sexo'];
	$fecha = date('Ymdhis');

	if($sexo=="Masculino"){
	$foto_default="assets/hombre.png"; 
	}else if($sexo=="Femenina"){
		$foto_default="assets/mujer.png";
	}else{

		$foto_default="assets/duroporelculo.png";
	}
	#verif 
	$sql  = "select * from user where usuario='$usuario'";
	$result = $conexion->query($sql);
	$nombre = "disable";
	$apellido ="disable";

	if($clave==$clave2 and $clave!="" and $clave2!="" and $result->num_rows==0){


	$sql = "insert into user(usuario,clave,email,sexo,foto_url,fecha_creacion,nombre,apellido)VALUES(?,?,?,?,?,?,?,?)";
	
	 $ready = $conexion->prepare($sql);
	 $ready->bind_param('ssssssss',$usuario,$clave,$email,$sexo,$foto_default,$fecha,$nombre,$apellido);
	 $ready->execute();

	if($ready){
		
			//header("location:https://videosegg.com/login.php");
		echo "success";
	}


	}else{

		echo "<i>Las contraseñas no coinciden</i>";
	}
	if($result->num_rows>0){

		echo "Este usuario ya esta en uso";
	}


  }



	












?>