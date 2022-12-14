<?php
	session_start();
	$comentario = $_POST['comentario'];
	$id_post = explode("/",$_POST['id_post']);

    //$comentario = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', '<a href="\0" style=color:#337ab7;>\0</a>',$comentario); 

	 Video::guardar_comentario($id_post[0],$comentario);


?>