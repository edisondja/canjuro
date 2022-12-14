<?php

require('logic.php');
	
	$id_user = $_POST['id_user'];
	
	if( isset($_POST['id_user'])){
  

	if(!isset($_POST['search_video'])){

			$sql = "select * from posts where id_user='$id_user' order by fecha_publicacion desc limit 20";
	
	}else if(isset($_POST['search_video'])){

		$search = $_POST['search_video'];

				$sql = "select * from posts where id_user='$id_user' and  titulo like '%$search%' order by fecha_publicacion desc limit 15";
	}

		
	$result = $conexion->query($sql);


	foreach ($result as $key) {
		
			$data[] =  $key;
	}



	echo json_encode($data);
	/*respondiendo datos de la consulta en formato json para
	ser consumido por javascript usando ajax*/

	}


		if(isset($_POST['eliminar_video'])){

			$id = $_POST['eliminar_video'];
			$sql = "delete from posts where id_post='$id'";
			$run  = $conexion->query($sql);
			if($run){
				echo "eliminado con exito";
			}

			$conexion->close();

		}

?>