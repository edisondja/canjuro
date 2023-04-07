<?php
include'logic_panel.php';

	$action =  $_POST['action'];

if($action=='search_video_now'){


	search_video($_POST['palabra']);
//count_Rows();

}else if($action=='update_poster_now'){


  	//echo $_POST['id_post'];


	update_poster_fast($_POST['id_post'],$_FILES['archivo']['tmp_name'],$_POST['titulo']);



}else if($action=="update_metadata_post"){

	update_video($_POST['titulo'],$_POST['descripcion'],$_POST['categoria'],$_POST['id_post']);



}else if($action=="login"){

		login_panel($_POST['usuario'],$_POST['clave']);

}else if($action=="delete_video"){

    	delete_video_permanent($_POST['id_video']);

}else if($action=="cerrar_sesion"){

	close_session();

}else if($action=="load_video"){


	load_video_data($_POST['id_video']);



}


















?>