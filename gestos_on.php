<?php
	include'logic.php';
	include'gestos.php';
	/*ini_set('display_errors', 'On');
	ini_set('html_errors', 0);
	error_reporting(-1);
	*/
	session_start();
$action = $_POST['action'];


	if($action=="save_like"){

		$id_video = $_POST['id_video'];
		$id_user=  $_POST['id_user'];

		Gesto::like_video($id_video,$id_user);


	}else if($action=="load_likes") {
			
		$id = $_POST['id_video'];
		
		Gesto::traer_likes($id);


	}else if($action=="load_dislike") {

		$id_video =$_POST['id_video'];
		Gesto::traer_noLike($id_video);
		
	}else if($action=="agregar_favorito"){

			$id_user = $_POST['id_user'];
			$id_video = $_POST['id_video'];

		Gesto::favorito_add($id_video,$id_user);
	}else if($action=="disklike_video"){
		
			$id_user = $_POST['id_user'];
			$id_video = $_POST['id_video'];

			Gesto::no_like($id_user,$id_video);

	}else if($action=="delete_favorit"){

			$id_favorito = $_POST['id'];
			Gesto::favorito_drop($id_favorito);

	}else if($action=="update_coment"){
		$id_comentario = $_POST['id_comentario'];
		$text=  $_POST['text_coment'];
		Gesto::update_coment($id_comentario,$text);

	}else if($action=="check_like"){
		$id_video  = $_POST['id_post'];
		$id_user = $_POST['id_user'];

		Gesto::check_like($id_video,$id_user);


	}else if($action=="check_no_like"){
		$id_video  = $_POST['id_post'];
		$id_user = $_POST['id_user'];

		Gesto::check_dislike($id_video,$id_user);

	}else if($action=="check_favorit"){

		$id_video  = $_POST['id_post'];
		$id_user = $_POST['id_user'];

		Gesto::check_favorit($id_video,$id_user);

	}else if($action=="guardar_comentario"){
	
	 		Video::guardar_comentario($_POST['id_post'],$_POST['comentario']);

	}else if($action=="actualizar_comentaro"){

		Video::actualziar_comentario($_POST['id'],$_POST['comentario']);
	
	}else if($action=="leer_comentarios"){

			Video::leer_comentario($_POST['id_post']);

	}else if($action=="cargar_mi_top"){
			    
			    Video::estadistica_video($_POST['id_user']);
	
	}else if($action=="cargar_top_general"){

			Video::estadistica_video($_POST['id_user'],'top_general');

	}else if($action=='top_de_categorias'){
			
			Video::estadistica_video($_POST['id_user'],'top_de_categorias');
	
	}else if($action=='crear_tablero'){
		
		$fecha = new DateTime();
		$fecha_a =  date('ymd');
		$ruta = "imagenes_tablero/".$fecha_a.".jpg";
		//$ruta = "imagenes/test.jpg";
		//shell_exec("ffmpeg -i $_FILES[imagen][tmp_name] $ruta");
		//move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
		$archivo = $_FILES['imagen']['tmp_name'];
		shell_exec("ffmpeg -i $archivo $ruta");
		Video::guardar_tablero($_POST['titulo'],$_POST['descripcion'],$fecha_a,$ruta,$_POST['id_usuario']);
		header("location:dashboard.php");


	}else if($action=='cargar_tablero'){
		
		Video::cargar_tablero($_POST['id_tablero']);

	}else if($action=='cargar_tableros'){

		Video::cargar_tableros($_POST['id_usuario']);

	}else if($action=='eliminar_tablero'){

		Video::eliminar_tablero($_POST['id_tablero']);
	
	}else if($action=='asignar_multimedia_a_tablero'){

		$cantidad = count($_FILES['multimedia']['tmp_name']);
		
		for($i=0;$i<$cantidad;$i++){

		     Video::asignador_de_multimedia_tablero($_POST['id_tablero'],$_FILES['multimedia']['tmp_name'][$i],$_FILES['multimedia']['type'][$i],$_FILES['multimedia']['name'][$i]);
	    }
	
	}else if($action=='eliminar_multimedia_de_tablero'){

		Video::eliminar_multimedia_de_tablero($_POST['id_multimedia']);
	
	}else if($action=='actualizar_tablero'){

		if($_FILES['imagen']['name']==null){
			
			$descripcion = $_POST['descripcion'];

			
			Video::actulizar_tablero($_POST['titulo'],$descripcion,"",$_POST['id_tablero']);
			header("location:dashboard.php");

		}else{

		
			$temp_url=$_FILES['imagen']['tmp_name'];
			$fecha = new DateTime();
			$fecha_a = $fecha->getTimestamp();
			$ruta = "imagenes/".$fecha_a.".jpg";
			shell_exec("ffmpeg -i $temp_url $ruta");

			Video::actulizar_tablero($_POST['titulo'],$_POST['descripcion'],$ruta,$_POST['id_tablero']);
			header("location:dashboard.php");

		}

	}else if($action=='cargar_multimedias_de_tablero'){

			$id_tablero = $_POST['id_tablero'];

			Video::cargar_multimedias_de_tablero($id_tablero);
	

	}else if($action=='asignar_metadatos_a_multimedia'){

	
		$id_asignar = $_POST['id_multimedia'];
		$texto = $_POST['texto'];
		$precio = $_POST['precio'];
		$metodo_de_pago = $_POST['metodo_de_pago'];
		Video::asignar_metadatos_a_multimedia($id_asignar,$texto,$precio,$metodo_de_pago);
	
	
	}else if($action=='cargar_metadatos_de_tablero'){

	   	$id_multimedia = $_POST['id_multimedia']; 
		Video::cargar_metadatos_de_multimedia($id_multimedia);

		
	}else{

		echo "no action select";
	}
?>