<?php
#archivo logico preparado
	include'conexion.php';
	include'Validacion.php';

	date_default_timezone_set('America/Santo_Domingo');
	$dominio = DOMAIN;


class Video extends Validacion{

	public Mysqli  $s; 

	public static function guardar_tablero($titulo,$description,$fecha_creacion,$imagen_tablero,$id_usuario){
       
		
			global $conexion; 
			$sql = "insert into tableros(titulo,descripcion,fecha_creacion,imagen_tablero,id_usuario)values(?,?,?,?,?)";
			$guardar = $conexion->prepare($sql);
			$guardar->bind_param('ssssi',$titulo,$description,$fecha_creacion,$imagen_tablero,$id_usuario);
			$guardar->execute() or die("no se puedo guardar el tablero");
	}

	public static function paginar_tableros($boards){

		global $conexion;


			 if($boards==1){
			     
			     $sql = "select * from tableros inner join user on tableros.id_usuario=user.id_user limit 0,10";
				 $data = $conexion->prepare($sql);
			
			 }else if($boards>1){

					$final = 10;
			 		$inicio =  ($boards * $final) - $final;
			 		$sql = "select * from tableros inner join user on tableros.id_usuario=user.id_user limit ?,?";
					$data = $conexion->prepare($sql);
					$data->bind_param('ii',$inicio,$final);

			 }
			 $data->execute();
			 $results = $data->get_result();
			 return  $results;


	}

	public static function cargar_tablero($id_tablero,$config='json'){

			global $conexion;
			$sql = "select * from tableros inner join user on tableros.id_usuario=user.id_user where id_tablero=?";
			$cargado = $conexion->prepare($sql);
			$cargado->bind_param('i',$id_tablero);
			$cargado->execute();
			$data = $cargado->get_result();
			$data = mysqli_fetch_object($data) or die("no se pudo cargar el tablero");
			
			if($config=='json'){

				echo json_encode($data);
				
			}else{

				return $data;

			}
			
	}


	public static function asignar_metadatos_a_multimedia($id_asignar,$texto,$precio,$metodo_de_pago){

		global $conexion;
		$sql = "update asingar_multimedia_t set texto=?,precio=?,metodo_de_pago=? where id_asignar=?";
		$acoplar = $conexion->prepare($sql);
		$acoplar->bind_param('sisi',$texto,$precio,$metodo_de_pago,$id_asignar);
		$acoplar->execute() or die('error');
		echo "update asset success";

	}


	public static function cargar_metadatos_de_multimedia($id_multimedia){

		global $conexion;

		$sql = "select * from asingar_multimedia_t where id_asignar=?";
		$cargar = $conexion->prepare($sql);
		$cargar->bind_param('i',$id_multimedia);
		$cargar->execute();
		$data = $cargar->get_result();
		$data = mysqli_fetch_object($data);

		echo json_encode($data);
 
	}



	public static function search_tablero($texto){

		global $conexion;

	    $texto = "%$texto%";


		$data= $conexion->prepare("select * from tableros inner join user on tableros.id_usuario=user.id_user where titulo like ? || descripcion like ? limit 20");
		$data->bind_param('ss',$texto,$texto);
		$data->execute();
		$resp = $data->get_result();
		$datos = [];
        foreach ($resp as $key) {

        	$datos[] = $key;
        }
        
		return $datos;

	}

	public static function cargar_tableros($id_usuario='general',$opcion='json'){

			global $conexion;
			
			if($id_usuario=='general'){
				
				$sql = "select * from tableros inner join user on user.id_user=tableros.id_usuario order by id_tablero desc limit 20";
				$cargado = $conexion->prepare($sql);

			}else{
					
				$sql = "select * from tableros inner join user on user.id_user=tableros.id_usuario where id_usuario=? order by id_tablero desc limit 20";
				$cargado = $conexion->prepare($sql);
				$cargado->bind_param('i',$id_usuario);		
			}
	
			$cargado->execute();
			$data = $cargado->get_result();
			$json=[];
			foreach ($data as $key) {

				$json[] = $key;
			}
			if($opcion=='json'){

				echo json_encode($json);

			}else{

				/* If the var opcion dont is equal to json return array associative */

				return 	$json;				

			}

	}

	public static function detectar_archivo($tipo){

		$tipo_archivo = $tipo;
		$tipo_arc = explode("/", $tipo_archivo);
		$tipo_arc = $tipo_arc[1];//aqui esta capturada la fuente en el segundo indice
		return $tipo_arc;
	}


	public static function asignador_de_multimedia_tablero($id_tablero,$url_temp,$tipo_archivo,$titulo){

			global $conexion;
			$fecha = new DateTime();
			$fecha_a = $fecha->getTimestamp();
			$tipo_a = Video::detectar_archivo($tipo_archivo);
			$titulo_de_assets =Video::titlo_list($titulo);
			$guardar_como ="";
			//echo $tipo_a;
			if($tipo_a=='jpeg' || $tipo_a=='png'){
				
				$tipo_asset = 'imagen';

				$guardar_como = "imagenes_tablero/$fecha_a$titulo_de_assets.jpg";

		    	shell_exec("ffmpeg -i $url_temp $guardar_como");
		   		//move_uploaded_file($url_temp,$guardar_como);
		    	echo "<img src='$guardar_como' width='75'>";
		    	echo $url_temp;
		    	//echo "gurdando archivo";


		    }else if($tipo_a=='mp4' || $tipo_a=='webm' || $tipo_a=='avi'){
		    	
		    	$tipo_asset = 'video';
		    	$guardar_como = "videos/$fecha_a$titulo_de_assets.mp4";
		    	shell_exec("ffmpeg -i $url_temp $guardar_como");

		    }else{
		    	return "Lo sentimos este tipo de archivo no esta permitido";
		    } 
			$sql = "insert asingar_multimedia_t(id_tablero,ruta_multimedia,tipo_multimedia)values(?,?,?)";
			$guardar = $conexion->prepare($sql);
		    $guardar->bind_param('iss',$id_tablero,$guardar_como,$tipo_asset);
			$guardar->execute();
		

	}

	public function eliminar_multimedia_de_tablero($id_multimedia){
		global $conexion;
		$sql = "delete from asingar_multimedia_t where id_asignar=?";
		$eliminar = $conexion->prepare($sql);
		$eliminar->bind_param('i',$id_multimedia);
		$eliminar->execute();
	}

	public static function cargar_multimedias_de_tablero($id_tablero,$config='json'){
			global $conexion;
			$sql = "select * from asingar_multimedia_t where id_tablero=?";
			$cargar = $conexion->prepare($sql);
			$cargar->bind_param('i',$id_tablero);
			$cargar->execute();
			$data = $cargar->get_result();
			$datos = [];
			foreach ($data as $key) {
				$datos[] = $key;
			}
			if($config=='json') {

				echo json_encode($datos);

			}else{

				return $datos;

			}	
	}

	public static function actulizar_tablero($titulo,$descripcion,$imagen_tablero,$id_tablero){

			global $conexion;

			if($imagen_tablero!==""){

				$sql = "update tableros set titulo=?,descripcion=?,imagen_tablero=? where id_tablero=?";

				$actualizar = $conexion->prepare($sql);

			    $actualizar->bind_param('sssi',$titulo,$descripcion,$imagen_tablero,$id_tablero);
	   	    
	   	    }else{

	   	    	$sql = "update tableros set titulo=?,descripcion=? where id_tablero=?";

				$actualizar = $conexion->prepare($sql);

			    $actualizar->bind_param('ssi',$titulo,$descripcion,$id_tablero);

	   	    }
			$actualizar->execute() or die("error al actualizar tablero");
	}

	public static function eliminar_tablero($id_tablero){

			global $conexion; 
			$sql = "delete from tableros where id_tablero=?";
			$eliminar = $conexion->prepare($sql);
			$eliminar->bind_param('i',$id_tablero);
			$eliminar->execute();
	}

	public static function block_site(){
		/*$list =[
				'hackphreik.com'=>true,
				 'https://www.hackphreik.com'=>true

		      ];

			if($list[$_SERVER['SERVER_NAME']]==true){
		
				header("location:mensaje.html",TRUE,301);

			}

			if($_SERVER["REQUEST_URI"]=="/index.php"){

					header("location:/",TRUE,301);

			}  */

	}


	public static function url_ready($id_post,$titulo){
        $url_video = "playvideo.php?id=$id_post/$titulo";
        $url_ready = str_replace(' ', '-', $url_video);
        $unicodeRegexp = '([*#0-9](?>\\xEF\\xB8\\x8F)?\\xE2\\x83\\xA3|\\xC2[\\xA9\\xAE]|\\xE2..(\\xF0\\x9F\\x8F[\\xBB-\\xBF])?(?>\\xEF\\xB8\\x8F)?|\\xE3(?>\\x80[\\xB0\\xBD]|\\x8A[\\x97\\x99])(?>\\xEF\\xB8\\x8F)?|\\xF0\\x9F(?>[\\x80-\\x86].(?>\\xEF\\xB8\\x8F)?|\\x87.\\xF0\\x9F\\x87.|..(\\xF0\\x9F\\x8F[\\xBB-\\xBF])?|(((?<zwj>\\xE2\\x80\\x8D)\\xE2\\x9D\\xA4\\xEF\\xB8\\x8F\k<zwj>\\xF0\\x9F..(\k<zwj>\\xF0\\x9F\\x91.)?|(\\xE2\\x80\\x8D\\xF0\\x9F\\x91.){2,3}))?))';

        $url_ready = preg_replace($unicodeRegexp,'',$url_ready);

        return $url_ready;
      }

      public static function titlo_list($title){

      	$titulo_listo = str_replace(' ','_',$title);


      	return $titulo_listo;
      }

      public static function upadate_post($titulo,$descripcion,$img_temp,$sub_titulo,$nombre_archivo,$id_user){

      		global $conexion;

      	if($titulo!="" && $descripcion!="" && $img_temp!="" && 
      		 $sub_titulo!="" && $nombre_archivo!="" && $id_user!=""){
      		
      		$sql = "update posts set titulo=?,descripcion=?,ruta_imagen=?,sub_titulo=? where id_user=?";
      		$upadte = $conexion->prepare('ssssi',
      			$titulo,
      			$descripcion,
      			$ruta_imagen,
      			$sub_titulo,
      			$id_user
      		);

      		if($update->execute()){

      			echo "actualizados con exito";


      		}
      	}else {

      			echo "todos los campos son requeridos";
      	}


      }

      public static function load_my_posts($id_user){

      		global $conexion;

      		$sql = "select * from posts where id_user=? where tipo_post='blog'";
      		$load = $conexion->prepare('i',$id_user);
      		$load->prepare('i',$id_user);
      		$load->execute();
      		$data_r = $load->get_result();
      		$data = [];
      		foreach ($variable as $key) {

      				$data[] = $key;

      		}

      		echo json_encode($data);


      }

      public static function eliminar_post($id_post){
      		global $conexion;
      		$config_vi ="desactivado";
      		$sql = "update posts set tipo_post=? where id_post=?";	
      		$delete = $conexion->prepare('si',$config_vi,$id_post);

      		if($delete->execute()){

      			echo "eliminado con exito";

      		}      		
      }

      // onlyfans
      public static function only_fans_videos(){

      		global $conexion;
      		$sql = "select * from posts where titulo like '%onlyfans%' limit 40";
      		$data = $conexion->query($sql);
      		$count = 0;

      		foreach ($data as $key) {
      			if($count==5){
      			 	echo "<div style='text-align:center;'>
					   <script type='application/javascript'
    data-idzone='4396896'
    data-branding_enabled='0'
    src='https://a.realsrv.com/video-outstream.js' async
></script>
							</div>";

      				$count=0;
      			}else{
      			 	Video::interfaz_video2($key);
      			}
				$count++;

      		}


      }

      public static function interfaz_video2($key =[]){
			global $dominio;
			$titulo	= $key['titulo'];
			$descripcion = Video::cortar_titulo($key['descripcion'],120);



			if($key['disk_config']==""){

				$ruta_imagen_r = "$dominio/$key[ruta_imagen]";
				$ruta_previa_r ="$dominio/$key[previa]";

			}else if($key['disk_config']=="disk2"){

					$ruta_imagen_r = "$dominio/$key[ruta_imagen]";
					$ruta_previa_r ="$dominio/$key[previa]";

			}


				$url = Video::url_ready($key['id_post'],$key['titulo']);

					echo "

					
					<div style='background-color: #0A0909;border: 5px solid black;'></div> <br/>
					 
					<a>

							<div class='col-lg-12'>
			        	<div class='resent-grid-img recommended-grid-img' >


			        	<a href='$url' style='font-size:14px;'><strong>$titulo
									<a class='' href='profile.php?id=$key[id_user]/$key[usuario]'> <br>$key[usuario]</a></strong>
										<p>
											
										</p>
									</a>							

			        		<div id='video$key[id_post]'>
						<a href='$url'><img  class='img-responsive' style='height:250px; background:black; margin:auto;' title='$key[titulo]'  src='$ruta_imagen_r' alt='$key[titulo]' onmouseover='previa(`$key[id_post]`,`$ruta_previa_r`,`$url`,`$ruta_imagen_r`)'/></a>
			        		</div>
										<div class='time' style='text-color:white'>
												<p>$key[duracion]</p>
										</div>	

								</div> <br/>
								</div> 
								



  <!-- Table -->
  <table class='table' style='background:black;'>
 
 <tr style='background:black;' >

  <td class='glyphicon glyphicon-thumbs-up' style='width:45%; padding-left:12%;'>
   
  </td>

  <td class='glyphicon glyphicon-comment' style='width:35%;'>
   
  </td >
  <td class='glyphicon glyphicon-share-alt'> 
   
  </td>
   
  </tr>
 
  </table>
</div>

								
							</div>
						</div>
							</a>


							
							";

							/* Boton de view comentado por motivo de carga a la vista
								<button class='btn btn_prev' onclick='previa(`$key[id_post]`,`$key[previa]`,`$url`,`$key[ruta_imagen]`)'>Preview</button>
							 */



		}


      public static function  read_country(){
		/*$data = json_decode(file_get_contents('http://api.ipstack.com/148.0.135.201?access_key=c6e227afcee4958d90362496c8f96868&format=1'));
		$imagen = $data->location->country_flag;
		//$avatar = $data->location->country_flag_emoji_unicode
		//echo "<img src='$imagen' style='heigth:25px;width:25px;'>";

		echo "<table style='margin:auto'><tr><td style='padding-top:2px;'>$data->country_name</td><td><img src='$imagen' style='heigth:25px;width:25px;padding-top:2px;'></td></tr></table>";
	  	*/
	  }

      public static function publicar_post($titulo,$descripcion,$img_temp,$sub_titulo,$nombre_archivo,$id_user,$tipo_archivo){
      		global $conexion;
      		//metodo para publicar posts videosegg

      		if($titulo!="" && $descripcion!="" && $img_temp!="" && 
      		 $sub_titulo!="" && $nombre_archivo!="" && $id_user!="" && $tipo_archivo!=""){

			      		if($tipo_archivo=='image/png' || $tipo_archivo=='image/jpeg'){

			      		$fecha_publicacion = date('Ymdhis');
			      		$tipo_post ='blog';
						$ruta_imagen = "imagenes/".$fecha_publicacion.$nombre_archivo;      		
			      		move_uploaded_file($img_temp,$ruta_imagen);

			      		$sql =  "insert into posts (titulo,descripcion,ruta_imagen,sub_titulo,fecha_publicacion,tipo_post,id_user)values(?,?,?,?,?,?,?)";
			      		$guardar = $conexion->prepare($sql);
			      		$guardar->prepare('ssssssi',
			      			$titulo,
			      			$descripcion,
			      			$ruta_imagen,
			      			$sub_titulo,
			      			$fecha_a,
			      			$tipo_post,
			      			$id_user
			      		);

			      		if($guardar->execute()){

			      			echo "publicado";
			      		}

			      	}else{

			      		echo "Formato de imagen icompatible";

			      	}
      	}else {

      		echo "todos los campos son requeridos";

      	}

     }




      public static function  get_view($id_video){
      		global $conexion;
      		#verificando si existe view en este vido para acumularle otro mas cuando un usuario lo vea
      		$sql = "select * from  view where id_video='$id_video'";
      		$ver = $conexion->query($sql);
      		$ver = mysqli_fetch_object($ver);
    

      		if($ver->views>0){

		  			$sql = "update view set views=views+1 where id_video=?";
		   			$update = $conexion->prepare($sql);
		   			$update->bind_param('i',$id_video);
		   			$update->execute();		   			
      		}else{	
      			$valor =1;
      			#registrando primer view
      			$sql= "insert into view(id_video,views)values(?,?)";
      			$save =$conexion->prepare($sql);
      			$save->bind_param('ii',
      					$id_video,
      					$valor
      			);

      			$save->execute();


      		}

 

      }


      public static function read_view($id_video){
      	#metodo que carga los views de los videos
      	global $conexion;
      		$sql = "select * from view where id_video='$id_video'";
      		$data = $conexion->query($sql);
      		$ver =  mysqli_fetch_object($data);

      		$ver = $ver->views;

      		return $ver;
      }

      public static function read_page($page,$categoria="",$config=""){
      		global $conexion;

      		if($page==1){


      				$sql = "select * from posts inner join user on user.id_user=posts.id_user order by posts.id_post desc limit 0,39";
      				$data = $conexion->query($sql);

      				foreach ($data as $key) {


      					Video::interfaz_video($key);
      				}




      		}else if($page>1 && $categoria==""){
      			$limite = 39;
      			$calculo =  ($limite * $page) - $limite;

      				$sql = "select * from posts inner join user on user.id_user=posts.id_user order by posts.id_post desc limit $calculo,$limite";
      				  $data = $conexion->query($sql);


      				foreach ($data as $key) {

      					Video::interfaz_video($key);
      				}
				


      		}else if($categoria!="" && $config=="read_category"){

				//echo "<H2 style='color:White'>HOLA QUE ES ESTO</H2>";

      			//Video::get_category_count($categoria);
				    $limite =39;
				    if($page==1){

				        $limite--;
				        $sql ="select * from posts  inner join user on user.id_user=posts.id_user where posts.categoria like'%$categoria%' and tipo_post='video' order by posts.id_post desc limit 0,39 ";

				    }else if($page>1){

				        $inicio = $page * $limite -$limite -1; 

				         $sql ="select * from posts inner join user on user.id_user=posts.id_user  where posts.categoria like'%$categoria%' and tipo_post='video'  order by posts.id_post desc limit $inicio,$limite ";
				     }else{
						 
						

				     	 $sql ="select * from posts inner join user on user.id_user=posts.id_user where posts.categoria like'%$categoria%' and tipo_post='video' order by id_post  desc limit 0,39";
				     	}
					$data = $conexion->query($sql);
	
				  


      				foreach ($data as $key) {

      					Video::interfaz_video($key);
      				}

				
      		}





      }

      public static function load_user_info($id_user){
	      
	      	global $conexion;
	      	$sql = "select * from user where id_user=?";
	      	$search = $conexion->prepare($sql);
	      	$search->bind_param('i',$id_user);
	      	$search->execute();
	      	$datos  = $search->get_result();
	      	$datos = mysqli_fetch_object($datos);
	      	return $datos;

      }


      public static function  load_video_user_config($data=[],$url,$conf=null){
      		global $dominio;
				if($data['disk_config']==''){

						   
					if($conf=="rl"){
							
							return"<a href='$url'><img class='img-responsive' style='height:100px; background:black; margin:auto;' src='$dominio/$data[ruta_imagen]' alt='$data[titulo]'class='lazyLoad' /></a>";

					}else{ 
						   	return "<a href='$url'><img src='$dominio/$data[ruta_imagen]' alt='$data[titulo]' class='lazyLoad' /></a>";				   
				    }

				 }else if($data['disk_config']=='disk2'){

							
				 		if($conf=="rl"){

				 			return"<a href='$url'><img class='img-responsive' style='height:100px; background:black; margin:auto;' src='$dominio/$data[ruta_imagen]' alt='$data[titulo]'class='lazyLoad' /></a>";
				 		}else{
							     	
							return "<a href='$url'><img src='$dominio/$data[ruta_imagen]' alt='$data[titulo]'  /></a>";		
						}
				 
				 }


      }



      public static function check_videos_user($id_user=null,$config="pages"){
      		global $conexion;

      		$sql = "select count(titulo)cantidad from posts where id_user=?";
      		$check = $conexion->prepare($sql);
      		$check->bind_param('i',$id_user);
      		$check->execute();
      		$result  = $check->get_result();
      		$result = mysqli_fetch_object($result);
      		$count = $result->cantidad;


      		if($config==""){
      		   
      		   return  $count;

      	    }else if($config=="pages"){
      	    	$contador = 0;
      	    	$pages = 0;
      	    	for($i=0;$i<$count;$i++){

      	    			$contador++;

      					if($contador==30){
      						$pages+=1;
      						$contador=0;
      					}

      	    		
      	    	}
      	    	return $pages;

      	    }


      }

      public static function load_video_user($id_user,$page=0){

      		global $conexion;
      		/*
      		if(!isset($_GET['view_all'])){
      		$sql = "select * from posts where id_user=? limit 14";
      	    }else{
      	    	$sql = "select * from posts where id_user=?";	
      	    }
      	    */





      	    if($page==0){
      	      
      	      $sql = "select * from posts where id_user=? limit 30";	
  
      		}else if($page>0){

      			if($page>1){
      			   
      			   $inicio=  ($page * 30) - 30;
      			    $sql = "select * from posts where id_user=? limit $inicio,30";	

      		   
      		     }else{

      			   $sql = "select * from posts where id_user=? limit 0,29";	



      		     }

				  
      		}

      		$search  = $conexion->prepare($sql);
      		$search->bind_param('i',$id_user);
      		 $search->execute();
      		$save = $search->get_result();

      		//target
      		foreach ($save as $key) {
      			$url = Video::url_ready($key['id_post'],$key['titulo']);

      				echo "
						
						<div class='col-md-3 resent-grid recommended-grid'>
							<div class='resent-grid-img recommended-grid-img'>".
								Video::load_video_user_config($key,$url,"rl")."
								<div class='time small-time'>
									<p>$key[duracion]</p>
								</div>
								<div class='clck small-clck'>
									<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
								</div>
							</div>
							<div class='resent-grid-info recommended-grid-info video-info-grid'>
								<h5><a href='$url' class='title'>$key[titulo]</a></h5>
								<ul>
									<li><p class='author author-info'><a href='' class='author'></a></p></li>
									<li class='right-list'><p class='views views-info'></p></li>
								</ul>
							</div>
						</div>
						";



      		}
      		/*
      		if(!isset($_GET['view_all'])){

      		echo "<a href='?view_all&id=$_GET[id]'><button class='btn btn-primary'>Ver mas</button></a>";
      	   }

      	   */

      }


		public static function interfaz_video($key =[]){
			global $dominio;
			$titulo	= $key['titulo'];
			$descripcion = Video::cortar_titulo($key['descripcion'],120);



			if($key['disk_config']==""){

				$ruta_imagen_r = "$dominio/$key[ruta_imagen]";
				$ruta_previa_r ="$dominio/$key[previa]";

			}else if($key['disk_config']=="disk2"){

					$ruta_imagen_r = "$dominio/$key[ruta_imagen]";
					$ruta_previa_r ="$dominio/$key[previa]";

			}


				$url = Video::url_ready($key['id_post'],$key['titulo']);

					echo "
					<a>
							<div class='col-md-4 resent-grid recommended-grid slider-top-grids'>
			        	<div class='resent-grid-img recommended-grid-img' >
			        		<div id='video$key[id_post]'>
						<a href='$url'><img  class='img-responsive' style='height:180px; background:black; margin:auto;' title='$key[titulo]'  src='$ruta_imagen_r' alt='$key[titulo]' onmouseover='previa(`$key[id_post]`,`$ruta_previa_r`,`$url`,`$ruta_imagen_r`)'/></a>
			        		</div>
										<div class='time' style='text-color:white'>
												<p>$key[duracion]</p>
										</div>	
								</div>
								<div class='resent-grid-info recommended-grid-info cajatext'>
								<ul>
									<li><a href='profile.php?id=$key[id_user]/$key[usuario]'><img src='$key[foto_url]' style='height:40px; width:40px; display:none' class='img-responsive img-circle' /></a></li>
									<li>
									<a href='$url' style='font-size:14px;'><p>$titulo
									<a class='' href='profile.php?id=$key[id_user]/$key[usuario]'><strong style='color:#9C0000'><br>$key[usuario]</a></p>
										<p>
											
										</p>
									</a>							
									</li>
								</ul>		
								</div>
							</div>
							</a>
							
							";

							/* Boton de view comentado por motivo de carga a la vista
								<button class='btn btn_prev' onclick='previa(`$key[id_post]`,`$key[previa]`,`$url`,`$key[ruta_imagen]`)'>Preview</button>
							 */



		}

     public static function cortar_titulo($titulo,$hasta,$inicio=0){


            $caracteres = strlen($titulo); 

            if($caracteres>30){

            $titulo = substr($titulo,$inicio,$hasta);
        	
            	return $titulo."..";

        	}else{


        			return $titulo;

        	}


	}



	public static function crear_paginacion($page="",$categoria="",$config="",$search=""){
		global $conexion;
		if($categoria!="" && $config=="categoria_page" ){

			$sql = "select count(titulo)cantidad from posts where categoria like '%$categoria%' and tipo_post='video'";

		}else if($categoria=="" && $config==""){
			
			$sql = "select count(titulo)cantidad from posts where tipo_post='video'";
		
		}else if($config=="search_paginacion" && $search!=""){

			$sql = "select count(titulo)cantidad from posts where titulo like '%$search%' || descripcion like '%$search%' and tipo_post='video'";

		}
		$posts = $conexion->query($sql);
		$posts =  mysqli_fetch_object($posts);
		$cantidad = $posts->cantidad;
		$count_page=1;
		$count_post=0;
		echo "<ul class='pagination paginador' style='font-size:15px; margin-left:15%;'>
             <li  id='retroceder'><a>&laquo;</a></li>";
				

		if($page=="" && $config==""){

				echo "<li ><a href='index.php?page=$count_page' >$count_page</a></li>";
			
				for ($i=0; $i<=$cantidad; $i++) { 
					
					$count_post+=1;
						


					if($count_post==20){

							$count_page+=1;
							if($categoria==""){

								echo "<li ><a href='index.php?page=$count_page' >$count_page</a></li>";

							}else{
							echo "<li ><a href='index.php?page=$count_page&categoria=$categoria'>$count_page</a></li>";

							}

						$count_post=0;
					}



					if($count_page==5){

						break;
					}

				
					


				}



		}else if($page>=1 && $config==""){

			//cuando quieren una pagina mayor que 1

			$count_page = 0;
			$contador=0;
			$romper= 0;
			if($page>3){
					$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2' >$page2</a></li>";
		   }else if($page==3){
		   			$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2' >$page2</a></li>";


		   }else if($page==2){

		   			$page1 = $page -1;
					echo "<li ><a href='index.php?page=$page1'>$page1</a></li>";

		   }

		   	for ($i=1; $i<=$cantidad; $i++) { 
						
						$count_post+=1;
						
						if($count_post==20){
							
							$count_page++;
							$count_post=0;
						

							if($count_page>=$page){
								$romper++;
								
								if($categoria==""){


										if($count_page==$page){
											echo "<li ><a href='index.php?page=$count_page' style='background:black;'>$count_page</a></li>";
										}else{
												echo "<li ><a href='index.php?page=$count_page' >$count_page</a></li>";

										}

								}else{
										if($count_page==$page){
												echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' style='background:black;'>$count_page</a></li>";

										}else{
													echo "<li ><a href='index.php?page=$count_page&categoria=$categoria'>$count_page</a></li>";

										}	

								}
						     	
					     	}

					
							
						}

				if($page==1){
					if($romper==5){

						break;
					}
				}else if($page==2){

					if($romper==4){

						break;
					}
				}else{
					if($romper==3){

						break;
					}

				}
					   	

		



				}


		}else if($categoria!="" && $config=="categoria_page" ){
		#echo "<h1>YO NO TENGO TIEMPO PA PELDER EL TIEMPO";

			$count_page = 0;
			$contador=0;
			$romper= 0;
			if($page>3){
					$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&categoria=$categoria' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&categoria=$categoria' >$page2</a></li>";
		   }else if($page==3){
		   			$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&categoria=$categoria' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&categoria=$categoria' >$page2</a></li>";


		   }else if($page==2){

		   			$page1 = $page -1;
					echo "<li ><a href='index.php?page=$page1&categoria=$categoria'>$page1</a></li>";

		   }

		 #  echo "<h1>CANTIDAD ACTUAL DE PAGIANAS $cantidad</h1>";


				for ($i=1; $i<=$cantidad; $i++) { 
						
						$count_post+=1;
						
						if($count_post==39){
							
							$count_page++;
							$count_post=0;
						

							if($count_page>=$page){
								$romper++;
								
								if($categoria==""){


										if($count_page==$page){
											echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' style='background:black;'>$count_page</a></li>";
										}else{
												echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' >$count_page</a></li>";

										}

								}else{
										if($count_page==$page){
												echo "<li ><a href='index.php?page=$count_page&categoria=$categoria' style='background:black;'>$count_page</a></li>";

										}else{
													echo "<li ><a  href='index.php?page=$count_page&categoria=$categoria'>$count_page</a></li>";

										}	

								}
						     	
					     	}

					
							
						}

							
					
							if($romper==5){

								break;
							}
						

					     

				}


		}else if($search!="" && $config=="search_paginacion"  && $categoria==""){

				$count_page = 0;
			$contador=0;
			$romper= 0;
			if($page>3){
					$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&search=$search' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&search=$search' >$page2</a></li>";
		   }else if($page==3){
		   			$page1 = $page -2;
					$page2 = $page -1;
					echo "<li ><a href='index.php?page=$page1&search=$search' >$page1</a></li>";
					echo "<li ><a href='index.php?page=$page2&search=$search' >$page2</a></li>";


		   }else if($page==2){

		   			$page1 = $page -1;
					echo "<li ><a href='index.php?page=$page1&search=$search'>$page1</a></li>";

		   } 

		 #  echo "<h1>CANTIDAD ACTUAL DE PAGIANAS $cantidad</h1>";


				for ($i=1; $i<=$cantidad; $i++) { 
						
						$count_post+=1;
						
						if($count_post==20){
							
							$count_page++;
							$count_post=0;
						

							if($count_page>=$page){
								$romper++;
								
								if($categoria==""){


										if($count_page==$page){
											echo "<li ><a href=href='index.php?page=$page&search=$search' style='background:black;'>$count_page</a></li>";
										}else{
									echo "<li ><a href='index.php?page=$page&search=$search'>$count_page</a></li>";

										}

								}else{
										if($count_page==$page){
												echo "<li ><a href='index.php?page=$page&search=$search' style='background:black;'>$count_page</a></li>";

										}else{
													echo "<li ><a href='index.php?page=$page&search=$search'>$count_page</a></li>";

										}	

								}
						     	
					     	}

					
							
						}

					if($romper==3){

						break;
					}

					     	

		



				}





		}




		echo " <li><a href='#' id='siguiente'>&raquo;</a></li>";


	}


	public static function videos_read($ruta_t=""){


		
		global $conexion;

		$sql = "select * from posts inner join user on posts.id_user=user.id_user order by id_post desc limit 39 ";

		$data = $conexion->query($sql);

			foreach ($data as $key) {


						Video::interfaz_video($key);

					}





	}



		public static function videos_read_page($page=0){

			global $conexion;
			if($page==1){

				$sql = "select * from posts as p inner join user as u on p.id_user=u.id_user limit  0,19 order by desc id_post";

				$data = $conexion->query($sql);
				foreach ($data as $key) {
		
							Video::interfaz_video($key);

					}



			}else if($page>1){

					$limite = 22;
					$inicio = ($limite * $page) - $limite;
					$sql = "select * from posts as p inner join user as u on p.id_user=u.id_user limit $inicio,$limite order by desc id_post";
					$data = $conexion->query($sql);

					foreach ($data as $key) {
		

								Video::interfaz_video($key);
					}






			}
			








		}


		public static function search_video($search,$config="default"){
			//Video::capturar_no_encontrado($search);
			//Search video
				  global $conexion;

				  if($search==""){

				  		echo "<h1>Please type something in the search box</h1>";	

				  	 return;

				  }


				  //$search = str_replace(" ","",$search);

			      if(!isset($_GET['page'])){
			      
			      	#NIVEL 1 DE BUSQUEDA

			      	if($config=="default"){


			     	     $sql  = "select * from posts  inner join user on user.id_user=posts.id_user WHERE MATCH(titulo, descripcion) AGAINST ('$search') limit 0,39";

			      	}else if($config=="hashtag"){

			      		//$sql  = "select * from posts  inner join user on user.id_user=posts.id_user WHERE MATCH(descripcion,titulo) AGAINST ('$search') limit 0,39";

			      		$sql  = "select * from posts  inner join user on user.id_user=posts.id_user where descripcion like'%#$search%' limit 0,39";



			      	}
			      		$result_check = $conexion->query($sql);

			      		if($result_check->num_rows<1){
			      			#NIVEL 2 DE BUSQUEDA

			      			if($config=="default"){
			      					$sql = "select * from posts  inner join user on user.id_user=posts.id_user where posts.titulo like '%$search%' || posts.descripcion like '%$search%' and tipo_post='video' limit 0,39";
			      					$result_check = $conexion->query($sql);

			      				if($result_check->num_rows<1){

			      					#NIVEL 3 DE BUSQUEDA
									$sql = "select * from posts  inner join user on user.id_user=posts.id_user where SOUNDEX(posts.titulo like) like SOUNDEX('$search') and tipo_post='video' limit 0,39";
			      						

			      				}

			      		     }
			      				


			      		}

			      }else if(isset($_GET['page']) && isset($_GET['search']) && $config=="default"){

						$page =  $_GET['page'];

						//echo "<h1>HAY BOBO!!</h1>";

						if($page==1){

								$sql = "select * from posts  inner join user on user.id_user=posts.id_user where posts.titulo like '%$search%' || posts.descripcion like '%$search%' and tipo_post='video' limit 0,39";

						}else if($page>1){


							$inicio =  (39 * $page) - 39;
							$fin  = 39 * $page;

							$sql = "select * from posts  inner join user on user.id_user=posts.id_user where posts.titulo like '%$search%' || posts.descripcion like '%$search%' and tipo_post='video' limit $inicio,39";


						}

			      }else if($config=="hashtag" && isset($_GET['page']) && isset($_GET['tag'])){

			      		if($page==1){

								$sql = "select * from posts  inner join user on user.id_user=posts.id_user where posts.descripcion like '%$search%' and tipo_post='video' limit 0,39";

						}else if($page>1){


							$inicio =  (39 * $page) - 39;
							$fin  = 39 * $page;

							$sql = "select * from posts  inner join user on user.id_user=posts.id_user where posts.descripcion like '%$search%' and tipo_post='video' limit $inicio,$fin";


						}


			      }

			      $inicio = 0;


			     	 //    $sql  = "select * from posts  inner join user on user.id_user=posts.id_user WHERE MATCH(titulo, descripcion) AGAINST ('$search') limit 0,39";
			       $data = $conexion->query($sql);


			       if($data->num_rows<1){


			       		Video::capturar_no_encontrado($search);

			       }else{


			       		//Video::capturar_search($search);
			       }

			       		
			      foreach ($data as $key) {				

						Video::interfaz_video($key);
					
					}

						$result_search = "select count(titulo)cantidad from posts where titulo like '%$search%' || descripcion like '%$search%' and tipo_post='video'";
						$cantidad = $conexion->query($result_search);
						$cantidad = mysqli_fetch_object($cantidad);
						$total_posts = $cantidad->cantidad;
						//target

						$count_page = 0;
						$end = 0;
						$page=0;


					if(!isset($_GET['tag'])){
						echo "<ul class='pagination paginador' style='font-size:15px; margin-left:15%;'>
			             <li  id='retroceder'><a>&laquo;</a></li>";
							
			             	while($end!=$total_posts){	
			             		$end++;
			             		$count_page++;
			             		if($count_page==39){

			             			$page+=1;
			             			if($config=="default"){
			             			  
			             			  echo "<li><a href='?page=$page&search=$search'>$page</a></li>";
			             			
			             			}else if($config=="hashtag"){

			             				      echo "<li><a href='?page=$page&tag=$search'>$page</a></li>";

			             			}
			             			$count_page=0;
			             		}	


			             	}

			            echo "<li><a href='#' id='siguiente'>&raquo;</a></li></ul>";

					}

	 }


	 public static function Generar_paginador(){

			$result_search = "select count(titulo)cantidad from posts where titulo like '%$search%' || descripcion like '%$search%' and tipo_post='video'";
			$cantidad = $conexion->query($result_search);
			$cantidad = mysqli_fetch_object($cantidad);
			$total_posts = $cantidad->cantidad;
			//target

			$count_page = 0;
			$end = 0;
			$page=0;


		if(!isset($_GET['tag'])){
			echo "<ul class='pagination paginador' style='font-size:15px; margin-left:15%;'>
             <li  id='retroceder'><a>&laquo;</a></li>";
				
             	while($end!=$total_posts){	
             		$end++;
             		$count_page++;
             		if($count_page==39){

             			$page+=1;
             			if($config=="default"){
             			  
             			  echo "<li><a href='?page=$page&search=$search'>$page</a></li>";
             			
             			}else if($config=="hashtag"){

             				      echo "<li><a href='?page=$page&tag=$search'>$page</a></li>";

             			}
             			$count_page=0;
             		}	


             	}

            echo "<li><a href='#' id='siguiente'>&raquo;</a></li></ul>";

		}

	 }

		public static function Login($user,$clave){

				session_destroy();
				session_start();
				global $conexion;

				/*
				$sql = "select * from user where usuario='$user' and clave='$clave'";
				$data = $conexion->query($sql);

				if($data->num_rows<1){

						$sql = "select * from user where email='$user' and clave='$clave'";
						$data = $conexion->query($sql);

				}
				*/
				$sql = "select * from user where email=? or usuario=? and clave=?";
				$guardar = $conexion->prepare($sql);
				$guardar->bind_param('sss',$user,$user,$clave);
				$guardar->execute();
				$data = $guardar->get_result();
					
				if($data->num_rows>0){


 					$data = mysqli_fetch_object($data);
					$_SESSION['nombre'] = $data->nombre;
					$_SESSION['apellido'] = $data->apellido;
					$_SESSION['edad'] = $data->edad;
					$_SESSION['email'] = $data->edad;
					$_SESSION['sexo'] = $data->sexo;
		 			$_SESSION['id_user'] = $data->id_user;
		 			$_SESSION['usuario']= $data->usuario;
		 			$_SESSION['foto_url'] = $data->foto_url;
						echo "log";
			 			header("Location:dashboard.php");

				}else{




				}





		}

		public static function cargar_data_video($id_video){
			//este metodo retorna un objecto con los metadatos del video

			global $conexion;
				$titulo ="";
				$categoria = "";
				$sql = "select * from posts where id_post=?";
				$cargar = $conexion->prepare($sql);
				$cargar->bind_param('i',
					$id_video
			    );
			    $cargar->execute();
			    $data = $cargar->get_result();
			    $data = mysqli_fetch_object($data);

			    return $data;

		}

		public static function listar_categorias($categoria,$config=null){
			   //creando links de categorias
			   $categorias_listas= "";
			   $categoria = explode(",",$categoria);
			   $cantidad_indices = count($categoria);
			   global $dominio;


			   for($i=0;$i<$cantidad_indices-1;$i++){

			   		if($categoria[$i]!="," || $categoria[$i]!=""){

			   			 if($config==null){

			   			       $categorias_listas.="<a href='$dominio?categoria=$categoria[$i]'><button class='btn-danger' style='margin-right:5px; margin-top:5px;margin-bottom:5px;'>$categoria[$i]</button></a>";
			   			}else if($config=="only_text"){

			   				$categorias_listas.="$categoria[$i] ";
			   			}

			   		}


			   }

			   //file_put_contents("argumentos.txt",$categorias_listas);

			   return $categorias_listas;	

		}

		public static function cargar_video($id_video){
			global $dominio;
			global $conexion;
				$titulo ="";
				$sql = "select * from posts inner join user on posts.id_user=user.id_user where posts.id_post=?";
				$cargar = $conexion->prepare($sql);
				$cargar->bind_param('i',
					$id_video
			    );
			    $cargar->execute();
			    $data = $cargar->get_result();
			    $data = mysqli_fetch_object($data);

			   $categorias_listas = Video::listar_categorias($data->categoria);

			   $ruta_actual = $_SERVER["REQUEST_URI"];

			  /* $iframe="<textarea rows='5' cols='40' id='iframe_c'><iframe src='$dominio/embed.php?id=$id_video' frameborder='0' width='560' height='315' scrolling='no' allowfullscreen></iframe>
				 </textarea>";*/
				 $iframe ="Coming soom";



			   $titulo = $data->titulo;

			   if($data->disk_config==""){

				   $ruta_poster= "$dominio/$data->ruta_imagen";
				   $ruta_video ="$dominio/$data->ruta_video";

			   }else if($data->disk_config=="disk2"){

			   		$ruta_poster= "$dominio/$data->ruta_imagen";
				    $ruta_video ="$dominio/$data->ruta_video";	

			   }

			    echo "
			    <div class='song'>
						<div class='song-info'>
					</div>
                    <div class='video-grid'>
                    	$categorias_listas
						<video  class='img-responsive' preload='none' loop controls style='width: 640px; height: 300px;' poster='$ruta_poster' type='video/webm' id='video_listo'>
							    <source src='$ruta_video' type='video/mp4'/>
							</video><br>
														<h1 style='color:white'>$data->titulo</h1>
														<div class='sharethis-inline-reaction-buttons'></div>
								<table>
									<tr>
										<td><a href='profile.php?id=$data->id_user/$data->usuario'><img src='$data->foto_url'/ class='img-responsive img-circle' style='height:30px; width:30px;'/></a></td>
										<td><a href='profile.php?id=$data->id_user/$data->usuario'><b style='font-size:15px;color:#33BFD5;'>$data->usuario</b></a>
										</td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp</td>
										<td><a href='#rabo' onclick='comentarios()'><strong style='font-size:15px;color:#33BFD5;'>Comments&nbsp;</strong></a></td>
										<td><strong style='font-size:13px;color:white; class='view_movil '>&nbsp;".Video::read_view($id_video)." Views"."</strong><td>
										<td class='view_computer'><button class='btn btn-info' id='display_embed' onclick='embed_ready()'>Embed</button></td>
										<td id='embed_code' style='display:none;'>$iframe</td>
										<td><a href='https://www.performancetrustednetwork.com/uzbhpcmj?key=99a26329da3254b391ec2b4844ed6b29'><span class='badge badge-danger' style='background:#e32929;'>Download</span></a></td>
									<tr/>
										
									<tr>

									</tr>

								</table>
						

						</div>
					</div>

			    ";

			    /* 
				<td><strong style='font-size:15px;'>| | | | | |</strong></td>
											<td><button class='btn btn-primary' style='border:none; background:#F53F81;' id='descargar_video'>Descargar</button></td>

			    estos elementos van dentro e un meno como td
				<td><button class='btn btn-dark' id='display_embed' onclick='embed_ready()'>Get Embed</button></td>
										<td id='embed_code' style='display:none;'>$iframe</td>
	
			    */


			    echo "<script type='text/javascript'>	
							
						function embed_ready(){
								
								$('#embed_code').show('slow');
								$('#follow').hide('slow');

								copy_iframe('iframe_c');
		                   
		                   }
		                   function copy_iframe(id_elemento) {
								  var aux = document.createElement('textarea');
								  aux.setAttribute('value', document.getElementById(id_elemento).innerHTML);
								  document.body.appendChild(aux);
								  aux.select();
								  document.execCommand('copy');
								  document.body.removeChild(aux);
							 }

		             </script>";


	}

		public static function cargar_relacion($categoria){

				
					///$cate = Video::listar_categorias($categoria,"only_text");
					global $conexion;
					$sql = "select * from posts as p inner join user as u on p.id_user=u.id_user where categoria like '%$categoria%' order by id_post desc limit 17";
					$data = $conexion->query($sql);
					$count = 0;

					foreach ($data as $key) {
						$url_new = Video::url_ready($key['id_post'],$key['titulo']);	
					/*	if($count==10){
							echo "<iframe src='//a.realsrv.com/iframe.php?idzone=4099336&size=300x100' width='300' height='100' scrolling='no' marginwidth='0' marginheight='0' frameborder='0'></iframe>";
									$count=0;
						}*/
						$count++;
						echo "
						<div class='single-grid-right'>
							<div class='single-right-grids'>
							<div class='col-md-4 single-right-grid-left'>
								<div class='time'>
								  <p>$key[duracion]</p>
								   </div>".Video::load_video_user_config($key,$url_new)."</div>
								<div class='col-md-8 single-right-grid-right'>
									<a href='$url_new' class='title'>$key[titulo]</a>
									<p class='author'><a href='profile.php?id=$key[id_user]/$key[usuario]' class='author'>$key[usuario]</a></p>
									<p class='views'></p>
								</div>
								<div class='clearfix'></div>
									</div>	
							</div>

							
							";

							

					}

	

		}

		public static function load_category($categoria=""){

			global $conexion;
					$cate = explode(",", $categoria);
						$categoria = $cate[0];
						echo "<h1>$categoria</h1>";

				$sql = "select * from posts as p inner join user as u  on p.id_user=u.id_user where p.categoria like '%$categoria%' and tipo_post='video' order by id_post desc limit 0,9";

				$data = $conexion->query($sql);

				foreach ($data as $key) {
							
						echo "
										<div class='col-md-3 resent-grid recommended-grid slider-first'>
											<div class='resent-grid-img recommended-grid-img'>
												<a ><img src='$domnio/$key[ruta_imagen]' alt='' /></a>
												<div class='time smalltime slider-time'>
													<p>$key[duracion]</p>
												</div>
												<div class='clck small-clck'>
													<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
												</div>
											</div>
											<div class='resent-grid-info recommended-grid-info'>
												<h5><a href='' class='title'>$key[titulo]</a></h5>
												<div class='slid-bottom-grids'>
													<div class='slid-bottom-grid'>
									<p class='author author-info'><a href='#' class='author'></a></p>
													</div>
													<div class='slid-bottom-grid slid-bottom-right'>
														<p class='views views-info'></p>
													</div>
													<div class='clearfix'> </div>
												</div>
											</div>
										</div>";


				}






		}


public static function upload_video($titulo,$descripcion,$categoria){

	#metodo para subir video
	$nombreVideo = $_FILES['videos']['name'];
	$rutaTemVideo  = $_FILES['videos']['tmp_name'];
	$tipo_archivo = $_FILES['videos']['type'];
	$tipo_arc = explode("/", $tipo_archivo);
	$tipo_arc = $tipo_arc[1];//aqui esta capturada la fuente en el segundo indice


	/*
	$titulo_count = count($titulo)	;

	if($titulo>40){
		echo "Intento entrar mas caracteres en el titulo";

		return;
	}
	*/
	if(count($titulo)>60){

		die("titulo muy largo");
		return;
	}


	$fecha_a = date('Ymdhis');


	$reciduo_video = "previa/$fecha_a"."previa.mp4";

	$rutaImagen = "imagenes/$fecha_a"."portada.jpg";
	$video_completo = "videos/$fecha_a"."videsoegg.mp4";


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
				
						#shell_exec("ffmpeg  -ss 00:01:40 -t 5 -i $rutaTemVideo $reciduo_video" );
				shell_exec("ffmpeg  -ss 0:01:00 -t 2 -i $rutaTemVideo parte1.ts");
				shell_exec("ffmpeg  -ss 0:02:10 -t 2 -i $rutaTemVideo  parte2.ts");
				shell_exec("ffmpeg  -ss 0:03:30 -t 2 -i $rutaTemVideo parte3.ts");
				shell_exec("ffmpeg  -ss 0:05:30 -t 2 -i $rutaTemVideo  parte4.ts");

				shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

				shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:20  -vframes 1 $rutaImagen");

			}else if($tiempo_cut>=06  && $tiempo_cut<15){

					shell_exec("ffmpeg  -ss 0:01:00 -t 2 -i $rutaTemVideo parte1.ts");
				shell_exec("ffmpeg  -ss 0:02:10 -t 2 -i $rutaTemVideo  parte2.ts");
				shell_exec("ffmpeg  -ss 0:04:30 -t 2 -i $rutaTemVideo parte3.ts");
				shell_exec("ffmpeg  -ss 0:10:30 -t 2 -i $rutaTemVideo  parte4.ts");

				shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

				shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:30  -vframes 1 $rutaImagen");



			}else if($tiempo_cut>=15 && $tiempo_cut<=26 ){

				shell_exec("ffmpeg  -ss 0:05:00 -t 2 -i $rutaTemVideo parte1.ts");
				shell_exec("ffmpeg  -ss 0:08:10 -t 2 -i $rutaTemVideo  parte2.ts");
				shell_exec("ffmpeg  -ss 0:10:30 -t 2 -i $rutaTemVideo parte3.ts");
				shell_exec("ffmpeg  -ss 0:14:30 -t 2 -i $rutaTemVideo  parte4.ts");

				shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

				shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

				shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:30  -vframes 1 $rutaImagen");



			}else if($tiempo_cut<01){

						shell_exec("ffmpeg  -ss 0:00:10 -t 2 -i $rutaTemVideo parte1.ts");
						shell_exec("ffmpeg  -ss 0:00:20 -t 2 -i $rutaTemVideo  parte2.ts");
						shell_exec("ffmpeg  -ss 0:00:30 -t 2 -i $rutaTemVideo parte3.ts");
						shell_exec("ffmpeg  -ss 0:00:50 -t 2 -i $rutaTemVideo  parte4.ts");
						shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

						shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

					
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:15  -vframes 1 $rutaImagen");


			}else if($tiempo_cut>=1 && $tiempo_cut<=2){

						shell_exec("ffmpeg  -ss 0:00:40 -t 2 -i $rutaTemVideo parte1.ts");
						shell_exec("ffmpeg  -ss 0:00:30 -t 2 -i $rutaTemVideo  parte2.ts");
						shell_exec("ffmpeg  -ss 0:01:30 -t 2 -i $rutaTemVideo parte3.ts");
						shell_exec("ffmpeg  -ss 0:00:50 -t 2 -i $rutaTemVideo  parte4.ts");
						shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

						shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

					
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:07   -vframes 1 $rutaImagen");

			}else if($tiempo_cut>=27  &&  $tiempo_cut<=50){

						shell_exec("ffmpeg  -ss 0:10:40 -t 2 -i $rutaTemVideo parte1.ts");
						shell_exec("ffmpeg  -ss 0:15:30 -t 2 -i $rutaTemVideo  parte2.ts");
						shell_exec("ffmpeg  -ss 0:18:30 -t 2 -i $rutaTemVideo parte3.ts");
						shell_exec("ffmpeg  -ss 0:25:50 -t 2 -i $rutaTemVideo  parte4.ts");
						shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

						shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");

					
						shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:30  -vframes 1 $rutaImagen");
			}

			shell_exec("ffmpeg -i $rutaTemVideo  $video_completo");


		foreach ($categoria as $key) {

				$categorias.= $key.",";
		}

		$id_user = $_SESSION['user_id'];

		$fecha = date('Y/m/d');
		$page=1;
		#contando pages
		$sql = "select * from posts";
		$resp = $conexion->query($sql);
		$count=0;
		foreach ($resp as $key) {
			
			$count++;
			if($count==20){
				$page+=1;
			}

		}

		$dato =  explode($nombreVideo, ".");

		if($rutaTemVideo!="" && $titulo!=""){

		#if($dato[1]=="mp4" || $dato[1]=="ts" || $dato[1]=="avi"){

		$sql = "insert into posts(titulo,categoria,ruta_video,ruta_imagen,descripcion,id_user,fecha_publicacion,page,previa,duracion)VALUES(?,?,?,?,?,?,?,?,?,?)";
		$ready = $conexion->prepare($sql);
		$ready->bind_param('sssssisiss',$titulo,$categorias,$video_completo,$rutaImagen,$descripcion,$id_user,$fecha,$page,$reciduo_video,$duracion);
		if($ready->execute()){

			echo "success";

		}else{

			echo "error load video";
		}

		#}else{

		#	echo "este archivo no es mp4";
		#}



		}else{

			echo "faltan datos por completar";
		}

}else{

	echo "<strong>We are sorry the type of file that has just been uploaded is not supported. Try these formats AVI, MPG, H264, MOV, WMV as they are the ones we work with<strong>";
}












		}

		public static  function leer_comentarios($id_post,$tipo_post='video'){

			global $conexion;


				if($tipo_post=='board'){
					
					$sql ="select * from comentario as c inner join user as u on  c.usuario_id=u.id_user  where c.id_tablero=? and c.tipo_post=? order by id_comentario desc ";
				
				}else{

					$sql ="select * from comentario as c inner join user as u on  c.usuario_id=u.id_user  where c.id_post=? and c.tipo_post=? order by id_comentario desc ";

				}
				$read =$conexion->prepare($sql);
				$read->bind_param('is',$id_post,$tipo_post);
				$read->execute();
				$ejecutar = $read->get_result();

				foreach ($ejecutar as $key) {
					
						$data[] = $key;

				}

				echo json_encode($data);


		}

		public static function load_descript(){

			if(!isset($_GET['page']) && !isset($_GET['categoria']) && !isset($_GET['search'])){


				
				echo '<meta name="description" content='.DESCRIPTION_SITE."/>'";
			}else if(isset($_GET['search'])){

					echo "<meta name='description' content='".DESCRIPTION_SITE."$_GET[search]'>";

			}else{


				echo "<meta name='description' content='".DESCRIPTION_SITE."'/>";


			}


		}




		public static function load_title(){

				
			      if(!isset($_GET['page']) && !isset($_GET['categoria']) && !isset($_GET['search']) && !isset($_GET['tag']) && !isset($_GET['id'])){

			            echo " <title>".NAME_SITE." ".DESCRIPTION_SLOGAN."</title>";
			            echo "<meta name='description' content='".DESCRIPTION_SITE."'/>";
		

			      }else if(isset($_GET['page'])){

			                    if(!isset($_GET['categoria'])){
			                     echo "  <title>".NAME_SITE." -PAGE $_GET[page]</title>";
			                            
			                    }else{

			                        echo "  <title>".NAME_SITE.".$_GET[categoria]  Page- $_GET[page]</title>";

			                    }

			      }else if(isset($_GET['categoria'])){

			              echo "<title>".NAME_SITE.".$_GET[categoria]</title>";
			              echo "<meta name='description' content='".NAME_SITE.".$_GET[categoria]'>";

			      }else if(isset($_GET['search'])){

			    
			      		echo "  <title>Sex Tapes found from $_GET[search] -.".NAME_SITE."</title>";


			      }else if(isset($_GET['tag'])){
                    

                   echo "<title>".SEARCH_HASTAG."#$_GET[tag] - ".NAME_SITE."</title>";
                  # echo "<meta name='description' content='".SEARCH_HASTAG."$_GET[tag]".NAME_SITE.'>";

			      }




		}



			public static function interfaz_coment(){

				if(isset($_SESSION['usuario'])){

					echo "<img data-src='$_SESSION[foto_url]' style='height:25px; width:25px;' class='img-circle img-responsive lazyLoad'><textarea placeholder='write comment' required='' id='comentario'></textarea><br>
									<button class='btn btn-primary' id='comentar'>Comment</button>
 									<input src='$_SESSION[foto_url]' id='img_url' type='hidden'>
									<div class='clearfix'> </div><br>";

				}else{
					/*
					echo "<strong>If you want to comment you must log in Click here <a  href='#small-dialog2' class='play-icon popup-with-zoom-anim' onclick='window.location=registrer.php';>Registrer</strong>";
					*/
							echo "<img data-src='$domnio/assets/man-user.png' style='height:25px; width:25px;' class='img-circle img-responsive lazyLoad'><textarea placeholder='Write' required='' id='comentario'></textarea><br>
									<button class='btn btn-primary' id='comentar'>Comment</button>
 									<input src='$domnio/assets/man-user.png' id='img_url' type='hidden'>
									<div class='clearfix'> </div><br>";


				}

		}

		public static function capturar_no_encontrado($busqueda){
			global $conexion;
			//$conexion->query("insert into resultados(busqueda)values('$busqueda')");
			
			date_default_timezone_set("America/Santo_Domingo");
			$fecha_a = date('Ymdhis');

			$sql = "insert into resultados(busqueda,fecha_busqueda)values(?,?)";
			$guardar = $conexion->prepare($sql);
			$guardar->bind_param('ss',$busqueda,$fecha_a);
			$guardar->execute();

		}
	
		public static function readpage_key_word($pagina=1){
			

			global $conexion;

			$fin=200;

			if($pagina<=1){

				$inicio=0;
				
				$sql = "select * from resultados order by id_resultado desc limit $inicio,$fin";

			}else if($pagina>1){

				$inicio = ($fin * $pagina) - $fin;

				$sql = "select * from resultados order by id_resultado desc limit $inicio,$fin ";

			}

			$data = $conexion->query($sql);

			return $data;


		}

		public static function capturar_search($search){


			//$search = preg_replace(/[<|>|iframe]/,'',$search);
		

			global $conexion;
			date_default_timezone_set("America/Santo_Domingo");
			$fecha_a = date('Ymdhis');


			$sql = "select criterio from criterios where criterio=?";
			$result = $conexion->prepare($sql);
			$result->bind_param('s',$search);
			$result->execute();
			$count = $result->get_result();
			$count = $count->num_rows;

			if($count<1){

				$sql = "insert into criterios(criterio,fecha_criterio)values(?,?)";
				$guardar = $conexion->prepare($sql);
				$guardar->bind_param('ss',$search,$fecha_a);
				$guardar->execute();


			}



		}

		public static function get_category_count($categoria){

			global $conexion;
			//check category
			$check = $conexion->prepare("select (categoria) from categorias_vi where categoria=?");
			$check->bind_param('s',$categoria);
			$check->execute();
			$cantidad = $check->get_result();

			if($cantidad->num_rows>0){
				//$countador = 1;
				$update = $conexion->prepare("update categorias_vi set vista=vista+1 where categoria=?");
				$update->bind_param('s',$categoria);
				$update->execute();

			}else{
				$guardar = $conexion->prepare("insert into categorias_vi(categoria,vista)values(?,?)");
				$count  = 1;
				$guardar->bind_param('si',$categoria,$count);
				$guardar->execute();
			}
	

		}

		public static function estadistica_video($id_user=618,$config="cargar_mi_top",$crear_boton=null){
				global $conexion;
				$stocks="";
				if($config=="cargar_mi_top"){

					$videos = $conexion->prepare("select * from posts inner join view on posts.id_post=view.id_video where id_user=? order by views desc limit 10");
					$videos->bind_param('i',$id_user);
					$videos->execute();
					$stocks = $videos->get_result();

			    }else if($config=="top_general"){
			    		
			    		$stocks = $conexion->query("select * from posts inner join view on posts.id_post=view.id_video order by views desc limit 0,10");
			    
			    }else if($config=='filtrar_top_fechas'){

			    	$videos = $conexion->prepare("select * from posts inner join view on posts.id_post=view.id_video where id_user=? order by views desc limit 10");
					$videos->bind_param('i',$id_user);
					$videos->execute();
					$stocks = $videos->get_result();
			    
			    }else if($config=='top_de_categorias'){

			    		$stocks = $conexion->query("select * from categorias_vi order by vista desc limit 10");
			    }

			    if($crear_boton==null){
						//echo $stocks->num_rows;
		                $datos = [];
						$data=[
						    'datasets'=>[[
						    	'label'=>'Tus 10 videos mas vistos',
						        'data'=>[],
						        'backgroundColor'=>'#f13072'
						    ]],
						   

						    'labels'=>[]
						];


						foreach ($stocks as $key) {
							//echo" ".$key['titulo'];

							if($config=='cargar_mi_top' || $config=='top_general' || $config=='filtrar_top_fechas'){

								array_push($data['datasets'][0]['data'],$key['views']);
						        array_push($data['labels'],substr($key['titulo'],0,30));
					        
					        }else{

					        	array_push($data['datasets'][0]['data'],$key['vista']);
						        array_push($data['labels'],$key['categoria']);
					        }

						}

						echo json_encode($data);

			}else if($crear_boton==true && $config=='top_general'){

				/*	$tops="";

					foreach ($stocks as $key) {
							
								$tops.="<td>
									 <a href=".Video::url_ready($key[id_post],$key[titulo])."><span class='badge badge-danger' style='background:#e32929;'>$key[titulo]</span></a>
								 </td>";
					}

				       echo "<div class='contedor_botones'>
									<table>
										$tops
									</table>
									<hr>
						   </div>";
						*/	
								
			}
		}

		public static function picture_profile(){
			
			global $dominio;
			$key =  Video::get_user($_SESSION['id_user']);
			echo  "<img src='$dominio/$key->foto_url' class='img-responsive img-circle'  style='margin:auto; height:30px; width:30px;'>";
		}

		public static function get_user($id_user){
			global $conexion;
			$SQL ="select * from user where id_user=?";
			
			$user = $conexion->prepare($SQL);
			
			$user->bind_param('i',$id_user);
			
			$user->execute();
			
			$data = $user->get_result();
			
			$data = mysqli_fetch_object($data);

			return $data;	

		}

		public static function actualizar_perfil($usuario,$password,$email,$id_user,$foto_temp=""){
			global $conexion;
			session_start();
			$id_user = $_SESSION['id_user'];

			if($foto_temp!=""){

				//echo $usuario." ".$password." ".$email." "."USUARIO ID".$id_user." ".$foto_temp;
				//return "da";
				$fecha = date('ymdis');

				$foto_perfil = "imagenes_perfil/$fecha"."foto.jpg";
				shell_exec("ffmpeg -i $foto_temp $foto_perfil");

			   // $data_user =Video::get_user($id_user);
			   // $url_foto_old = $data_user->foto_url;

				$sql="update user set usuario='$usuario',clave='$password',email='$email',foto_url='$foto_perfil' where id_user='$id_user'";
			

				$conexion->query($sql) or die("Error al actualizar perfil");

				echo $foto_perfil;

			    //echo $url_foto_old;
			}else{

				$updata = "update user set usuario='$usuario',clave='$password',email='$email' where id_user='$id_user'";

				$conexion->query($updata) or die('error al actualizar perfil');
				echo Video::get_user($id_user)->foto_url;

			}



		}

		public static function make_tag($id_user,$nombre_tag){

				global $conexion;
				//codigo para guardar este tag si no existe;
				$resp =  $conexion->prepare("select (nombre_tag) from tag where nombre_tag=?");
				$resp =  $resp->bind_param($nombre_tag);
				$resp->execute();
				$tag_result = $resp->get_result();

				if($tag_result->num_rows<1){
						date_default_timezone_set("America/Santo_Domingo");
						$fecha_creacion = date('Ymdhis');
						$sql = "insert into tag(id_user,nombre_tag)values(?,?)";
						$guardar = $conexion->prepare($sql);
						$guardar->bind_param('is',
							$id_user,
							$nombre_tag,
							$fecha_creacion
						);
						$guardar->execute();
						$nombre_tag  = $guardar->get_result();
						$nombre_tag  = mysqli_fetch_object($nombre_tag);
						echo $nombre_tag->nombre_tag;
			   }else{

			   		$tag_result = mysqli_fetch_object($tag_result);
			   		echo $tag_result->nombre_tag;

			   }

		}


		public static function add_tag_to_post($id_post,$id_tag){
				/*guardar tag con el posts*/
				global $conexion;
				$SQL = "insert into tag_registrer(id_post,id_tag)values(?,?)";
				$guardar = $conexion->prepare($SQL);
				$guardar->bind_param('ii',$id_post,$id_tag);
				$guardar->execute() or die("Problemas al guardar el tag con el posts");



		}

		public static function get_graph($siteUrl){

			/*
			$requestUrl = 'https://opengraph.io/api/1.1/site/' . urlencode($siteUrl);
			// Make sure you include your free app_id here!  No CC required
			$requestUrl = $requestUrl . '?app_id=568ecf72-a640-439e-9e76-1464bebf8bb4';
			$siteInformationJSON = file_get_contents($requestUrl);
			$siteInformation = json_decode($siteInformationJSON, true);
			* /
					    return $siteInformation['hybridGraph'];	

			/*	 
			$siteInformation['hybridGraph']['title'];
			$siteInformation['hybridGraph']['description'];
		    $siteInformation['hybridGraph']['image'];
			*/


		}


	public static function guardar_comentario($id_post,$id_user,$comentario,$tipo_post='video'){
			global $conexion;

			
				$comentario = str_replace("script","000",$comentario);

				$fecha = date('Ymdhis');
				if($tipo_post=='board'){

					$sql = "insert into comentario(id_tablero,usuario_id,texto,fecha_publicacion,tipo_post)VALUES(?,?,?,?,?)";

				}else{

					$sql = "insert into comentario(id_post,usuario_id,texto,fecha_publicacion,tipo_post)VALUES(?,?,?,?,?)";


				}
				
				$execute = $conexion->prepare($sql);
				$execute->bind_param('iisss',$id_post,$id_user,$comentario,$fecha,$tipo_post);

				try{

					$execute->execute();
					echo "exito";
				
				}catch(Exception $error){

					echo $error;
				}
				
		}


		public static function actualziar_comentario($id,$comentario,$tipo_post='video'){
		
			global $conexion;

		    $sql = "update comentario set comentario=? where id_comentario=? and tipo_post=?";
			$update = $conexion->prepare($sql);
			$update->bind_param('sis',$comentario,$id,$tipo_post);
			$update->execute();


		}


		public static function eliminar_comentario($id_comentario){
				
			global $conexion;
			$sql = "delete from comentario where id_comentario=?";
			$eliminar = $conexion->prepare($sql);
			$eliminar->bind_param('i',$id_comentario);
			$eliminar->execute() or die('error delete coment');

			echo"success comment";


		}







}


































?>