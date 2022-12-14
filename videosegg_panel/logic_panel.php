<?php
	include'conexion.php';
	

	function update_video($titulo,$descripcion,$categoria,$id_video){

		global $conexion;
		$sql = "update posts set titulo='$titulo',descripcion='$descripcion',categoria='$categoria' where id_post='$id_video'";

		$update = $conexion->query($sql) or die("error al actualizar");

		echo "Datos actualziado correctamente...";

	}	

	function count_Rows(){

		$sql = "select * from posts count(titulo)cantidad";
		$data = $conexion->query($sql);

		echo "<h1 style='color:white;'>";
		echo $data->num_rows;
		echo "</h1>";

	}


	function update_poster_fast($id_video,$temp_img,$titulo_video){
			$fehca = date('ymdis');
			$titulo_video = str_replace(" ","_",$titulo_video);





			global $conexion;
			$sql = "select * from posts where id_post='$id_video'";
			$data_result = $conexion->query($sql);	
			$result = mysqli_fetch_object($data_result);

			if($result->disk_config==""){
			
			    $guardar_imagen = "../imagenes/$fehca$titulo_video.jpg";
			    shell_exec("rm -r ../$result->ruta_imagen");
			   	$sql =  "update posts set ruta_imagen='$guardar_imagen' where id_post='$id_video'";


		    }else if($result->disk_config=="disk2"){

		    		$guardar_imagen = "../imagenes/$fehca$titulo_video.jpg";
		    		$guardar_imagen2  = "imagenes/$fehca$titulo_video.jpg";
		    		$sql =  "update posts set ruta_imagen='$guardar_imagen2' where id_post='$id_video'";

					//shell_exec("rm -r ../../filesvideos/$result->ruta_imagen");
		    }



			shell_exec("ffmpeg -i $temp_img $guardar_imagen");

			//actualizar imagen de forma rapida
			$conexion->query($sql) or die("La imagen no se actualizo correctamente...");

		if($result->disk_config==''){
			echo  "/".$guardar_imagen;
		
		}else if($result->disk_config=='disk2'){

			echo "../".$guardar_imagen2;
		}

	}

	function load_video_data($id_video){
			global $conexion;
			$sql = "select * from posts where id_post='$id_video'";
			$data_result = $conexion->query($sql);	
			$data = mysqli_fetch_object($data_result);
		
			echo json_encode($data);

	}


	function delete_video_permanent($id_video){

			global $conexion;
			$sql = "select * from posts where id_post='$id_video'";
			$data_result = $conexion->query($sql);
			$result = mysqli_fetch_object($data_result);
			$archivo_foto = $result->ruta_imagen;
			$archivo_video = $result->ruta_video;
			$archivo_vista_previa = $result->previa;

			if($archivo_foto!="" && $archivo_video!=""){
				

				if($result->disk_config==''){

					shell_exec("rm -r ../$archivo_foto");
				 	shell_exec("rm -r ../$archivo_video");
				 	shell_exec("rm -r ../$archivo_vista_previa");

			    }else if($result->disk_config=='disk2'){

			    	/*
			    	shell_exec("rm -r ../../filesvideos/imagenes/$archivo_foto");
				 	shell_exec("rm -r ../../filesvideos/videos/$archivo_foto");
				 	shell_exec("rm -r ../../filesvideos/previa/$previa");
					*/


			    }


			    	$sql = "delete  from posts where id_post='$id_video'";	
			    	$result = $conexion->query($sql);

			}
			


	}

	function load_categorie_info(){


	}

	function search_video($search){

		//echo "hola";
		global $conexion;
		$SQL = "select *from posts where titulo like '%$search%' || descripcion like'%$search%' limit 9";
		$result = $conexion->query($SQL);
		$data =  [];
		foreach ($result as $key) {
			
				$data[] = $key;
		}

		echo json_encode($data);

	}

	function login_panel($user,$pass){
		global $conexion;
		$sql = "select *from user where usuario='$user' and clave='$pass' and type_user='admin'";
		$data = $conexion->query($sql);

		if($data->num_rows>0){

			$data_user = mysqli_fetch_object($data);
			session_start();
			$_SESSION['nombre'] = $data_user->nombre;
			$_SESSION['usuario'] = $data_user->usuario;
			$_SESSION['foto_url'] = $data_user->foto_url;
			$_SESSION['id_user'] = $data_user->id_user;

			header("location:index.php");


		}else{

			echo "<strong>Usuario y contraseñas incorrectos</strong>";
		}

	}

	function close_session(){
		session_start();
		if(session_destroy()){

			echo "success";
		}


	}

function crear_fotogramas($rutaTemVideo,$id_video){

	   $fecha_a = date('Ymdhis');
		$categoria = $_POST['categoria'];

		$titulo_url = Video::titlo_list($titulo);

		$reciduo_video = "../previa/$fecha_aprevia$titulo_url.mp4";

		$rutaImagen = "../almacen_temporal/$fecha_a$titulo_url";

		$xyz = shell_exec("ffmpeg -i $rutaTemVideo 2>&1");
		$search='/Duration: (.*?),/';
		preg_match($search, $xyz, $matches);
		$explode = explode(':', $matches[1]);
		echo 'Hour: ' . $explode[0];
		echo 'Minute: ' . $explode[1];
		echo 'Seconds: ' . $explode[2];

		 $duracion=$explode[1];
		 $duracion.=":$explode[2]";
		 $duracion_c =  explode(".", $duracion);
		 $duracion = $duracion_c[0];

		#leyendo tiempo del video
		$tiempo_cut = explode(":", $duracion);
		$tiempo_cut = $tiempo_cut[0];
		$fuente_video = explode('.', $nombreVideo);
		$fuente = $fuente_video[1];

		if($tipo_arc=="mp4" || $tipo_arc=="avi" || $tipo_arc=="webm" || $tipo_arc=="h264" || $tipo_arc=="mov" || $tipo_arc=="wmv"){


			if($tiempo_cut>=02 && $tiempo_cut<06){
				
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:20  -vframes 1 '$rutaImagen'1.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:40  -vframes 1 '$rutaImagen'2.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:30  -vframes 1 '$rutaImagen'3.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:05:00  -vframes 1 '$rutaImagen'4.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:12  -vframes 1 '$rutaImagen'5.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:45  -vframes 1 '$rutaImagen'6.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:50  -vframes 1 '$rutaImagen'7.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:06  -vframes 1 '$rutaImagen'8.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:59  -vframes 1 '$rutaImagen'9.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:45  -vframes 1 '$rutaImagen'10.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:45  -vframes 1 '$rutaImagen'11.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:45  -vframes 1 '$rutaImagen'12.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:45  -vframes 1 '$rutaImagen'13.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:22  -vframes 1 '$rutaImagen'14.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:10  -vframes 1 '$rutaImagen'15.jpg");


			}else if($tiempo_cut>=06  && $tiempo_cut<15){


				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:06:00  -vframes 1 '$rutaImagen'1.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:05:40  -vframes 1 '$rutaImagen'2.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:07:30  -vframes 1 '$rutaImagen'3.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:08:00  -vframes 1 '$rutaImagen'4.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:09:12  -vframes 1 '$rutaImagen'5.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:10:45  -vframes 1 '$rutaImagen'6.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:50  -vframes 1 '$rutaImagen'7.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:06  -vframes 1 '$rutaImagen'8.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:09:59  -vframes 1 '$rutaImagen'9.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:07:45  -vframes 1 '$rutaImagen'10.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:45  -vframes 1 '$rutaImagen'11.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:45  -vframes 1 '$rutaImagen'12.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:45  -vframes 1 '$rutaImagen'13.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:06:22  -vframes 1 '$rutaImagen'14.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:10  -vframes 1 '$rutaImagen'15.jpg");;



			}else if($tiempo_cut>=15 && $tiempo_cut<=26 ){

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:11:20  -vframes 1 '$rutaImagen'1.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:40  -vframes 1 '$rutaImagen'2.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:05:30  -vframes 1 '$rutaImagen'3.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:07:00  -vframes 1 '$rutaImagen'4.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:09:12  -vframes 1 '$rutaImagen'5.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:10:45  -vframes 1 '$rutaImagen'6.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:12:50  -vframes 1 '$rutaImagen'7.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:13:06  -vframes 1 '$rutaImagen'8.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:14:59  -vframes 1 '$rutaImagen'9.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:45  -vframes 1 '$rutaImagen'10.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:07:45  -vframes 1 '$rutaImagen'11.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:09:45  -vframes 1 '$rutaImagen'12.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:06:45  -vframes 1 '$rutaImagen'13.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:05:22  -vframes 1 '$rutaImagen'14.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:00  -vframes 1 '$rutaImagen'15.jpg");


			}else if($tiempo_cut<01){

			
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:15  -vframes 1 $rutaImagen");


			}else if($tiempo_cut>=1 && $tiempo_cut<=2){

				
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:07   -vframes 1 $rutaImagen");

			}else if($tiempo_cut>=27  &&  $tiempo_cut<=50){

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:11:20  -vframes 1 '$rutaImagen'1.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:10:40  -vframes 1 '$rutaImagen'2.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:05:30  -vframes 1 '$rutaImagen'3.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:04:00  -vframes 1 '$rutaImagen'4.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:06:12  -vframes 1 '$rutaImagen'5.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:07:45  -vframes 1 '$rutaImagen'6.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:09:50  -vframes 1 '$rutaImagen'7.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:06  -vframes 1 '$rutaImagen'8.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:20:59  -vframes 1 '$rutaImagen'9.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:24:45  -vframes 1 '$rutaImagen'10.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:25:45  -vframes 1 '$rutaImagen'11.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:12:45  -vframes 1 '$rutaImagen'12.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:09:45  -vframes 1 '$rutaImagen'13.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:22  -vframes 1 '$rutaImagen'14.jpg");
				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:17:10  -vframes 1 '$rutaImagen'15.jpg");


			}



	}

}


?>