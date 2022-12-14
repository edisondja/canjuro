<?php
    require('logic.php');
    require('download_reddit/rdt-video.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

        function generar_categorias($cat_array){

           $cats;

            foreach ($cat_array as $key) {
                
                $cats.= $key.",";
           
            }
        
          return $cats;
            

        }

        $fecha = new DateTime();
        $fecha_a = $fecha->getTimestamp();

        //$reciduo_video = "previa/$fecha_aprevia$titulo_url.mp4";
        $catx = $_POST['categoria'];
        $titulo_url = Video::titlo_list($_POST['titulo_reddit']);
        $video_completo = "videos_reddit/$fecha_a$titulo_url";
        $categoria= $_POST['categoria'];



        $call = new RDTvideo();
        
        if($_POST['config']=='normal'){

            $url = $call->getVideoLink($_POST['url_reddit'],'normal');

        }else if($_POST['config']=='redgif'){

            $url = $call->getVideoLink($_POST['url_reddit'],'redgif');

        }else if($_POST['config']=='videosegg_transfer'){

            $url = $call->getVideoLink($_POST['url_reddit'],'videosegg_transfer');

        }

        $call->download($video_completo);
        $titulo = $_POST['titulo_reddit'];

        if(strlen($titulo)>80){

            die("titulo muy largo, debe de tener menos de 60 caracteres");
            return;
        }
        $descripcion = $_POST['descripcion_reddit'];
        $id_user= $_POST['id_user'];
        $rutaImagen = "imagenes_reddit/$fecha_a$titulo_url.jpg";
        //$rutaImagen=$call->download_thumb($call->videoThumb(),$rutaImagen);
        //echo "<br> URL IMAGE : $reciduo_video</HR>";02.
        $fecha = date('ymdiis');
        //$duracion = "2:50";
        $page=0;
        
        global $conexion;
        
		$disk_config='disk2';
        $tp = 'video';
        $video_completo = "videos_reddit/$fecha_a$titulo_url.mp4";
        $reciduo_video = "previa/$fecha_aprevia$titulo_url.mp4";

        //sacar tiempo de video
        $xyz = shell_exec("ffmpeg -i $video_completo 2>&1");
        $search='/Duration: (.*?),/';
        preg_match($search, $xyz, $matches);
        $explode = explode(':', $matches[1]);
              //  echo 'Hour: ' . $explode[0];
             //   echo 'Minute: ' . $explode[1];
             //   echo 'Seconds: ' . $explode[2];
        $duracion=$explode[1];
        $duracion.=":$explode[2]";
        $duracion_c =  explode(".", $duracion);
        $duracion = $duracion_c[0];

        #leyendo tiempo del video
        $tiempo_cut = explode(":", $duracion);
        $tiempo_cut_s = $tiempo_cut[1];
        $tiempo_cut = $tiempo_cut[0];
        $rutaTemVideo = $video_completo;

        if($tiempo_cut>=02 && $tiempo_cut<06){
                        
                    #shell_exec("ffmpeg  -ss 00:01:40 -t 5 -i $rutaTemVideo $reciduo_video" );
            shell_exec("ffmpeg  -ss 0:01:00 -t 2 -i $rutaTemVideo parte1.ts");
            shell_exec("ffmpeg  -ss 0:02:10 -t 2 -i $rutaTemVideo  parte2.ts");
            shell_exec("ffmpeg  -ss 0:03:30 -t 2 -i $rutaTemVideo parte3.ts");
            shell_exec("ffmpeg  -ss 0:05:10 -t 2 -i $rutaTemVideo  parte4.ts");
            shell_exec("ffmpeg  -ss 0:05:12 -t 2 -i $rutaTemVideo  parte5.ts");
            shell_exec("ffmpeg  -ss 0:05:20 -t 2 -i $rutaTemVideo  parte6.ts");
            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts|parte5.ts|parte6.ts' $reciduo_video");
            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts parte5.ts parte.ts");
            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:01:20  -vframes 1 $rutaImagen");


        }else if($tiempo_cut>=06  && $tiempo_cut<15){

            shell_exec("ffmpeg  -ss 0:01:00 -t 2 -i $rutaTemVideo parte1.ts");
            shell_exec("ffmpeg  -ss 0:02:10 -t 2 -i $rutaTemVideo  parte2.ts");
            shell_exec("ffmpeg  -ss 0:04:30 -t 2 -i $rutaTemVideo parte3.ts");
            shell_exec("ffmpeg  -ss 0:10:30 -t 4 -i $rutaTemVideo  parte4.ts");

            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:02:30  -vframes 1 $rutaImagen");


        }else if($tiempo_cut>=15 && $tiempo_cut<=26 ){

            shell_exec("ffmpeg  -ss 0:05:00 -t 2 -i $rutaTemVideo parte1.ts");
            shell_exec("ffmpeg  -ss 0:08:10 -t 2 -i $rutaTemVideo  parte2.ts");
            shell_exec("ffmpeg  -ss 0:10:30 -t 2 -i $rutaTemVideo parte3.ts");
            shell_exec("ffmpeg  -ss 0:14:30 -t 4 -i $rutaTemVideo  parte4.ts");

            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");

            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:30  -vframes 1 $rutaImagen");		



        }else if($tiempo_cut<01){

                if($tiempo_cut_s>=10 && $tiempo_cut_s<=20){

                            shell_exec("ffmpeg  -ss 0:00:03 -t 2 -i $rutaTemVideo parte1.ts");
                            shell_exec("ffmpeg  -ss 0:00:02 -t 2 -i $rutaTemVideo  parte2.ts");
                            shell_exec("ffmpeg  -ss 0:00:08 -t 2 -i $rutaTemVideo parte3.ts");
                            shell_exec("ffmpeg  -ss 0:00:05 -t 4 -i $rutaTemVideo  parte4.ts");
                            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:05  -vframes 1 $rutaImagen");

                }else if($tiempo_cut_s>=20 && $tiempo_cut_s<=30){
                            
                            shell_exec("ffmpeg  -ss 0:00:02 -t 2 -i $rutaTemVideo parte1.ts");
                            shell_exec("ffmpeg  -ss 0:00:05 -t 2 -i $rutaTemVideo  parte2.ts");
                            shell_exec("ffmpeg  -ss 0:00:10 -t 2 -i $rutaTemVideo parte3.ts");
                            shell_exec("ffmpeg  -ss 0:00:19 -t 4 -i $rutaTemVideo  parte4.ts");
                            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:15  -vframes 1 $rutaImagen");

                
                }else if($tiempo_cut_s>=30 && $tiempo_cut_s<=40){
                            shell_exec("ffmpeg  -ss 0:00:02 -t 2 -i $rutaTemVideo parte1.ts");
                            shell_exec("ffmpeg  -ss 0:00:05 -t 2 -i $rutaTemVideo  parte2.ts");
                            shell_exec("ffmpeg  -ss 0:00:10 -t 2 -i $rutaTemVideo parte3.ts");
                            shell_exec("ffmpeg  -ss 0:00:19 -t 4 -i $rutaTemVideo  parte4.ts");
                            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:15  -vframes 1 $rutaImagen");

                    
                }else if($tiempo_cut_s>=3 && $tiempo_cut_s<=10){

                            shell_exec("ffmpeg  -ss 0:00:01 -t 2 -i $rutaTemVideo parte1.ts");
                            shell_exec("ffmpeg  -ss 0:00:02 -t 2 -i $rutaTemVideo  parte2.ts");
                            shell_exec("ffmpeg  -ss 0:00:03 -t 2 -i $rutaTemVideo parte3.ts");
                            shell_exec("ffmpeg  -ss 0:00:08 -t 4 -i $rutaTemVideo  parte4.ts");
                            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:01 -vframes 1 $rutaImagen");


                }else if($tiempo_cut_s>=40 && $tiempo_cut_s<=59){

                            shell_exec("ffmpeg  -ss 0:00:30 -t 2 -i $rutaTemVideo parte1.ts");
                            shell_exec("ffmpeg  -ss 0:00:10 -t 2 -i $rutaTemVideo  parte2.ts");
                            shell_exec("ffmpeg  -ss 0:00:20 -t 2 -i $rutaTemVideo parte3.ts");
                            shell_exec("ffmpeg  -ss 0:00:55 -t 4 -i $rutaTemVideo  parte4.ts");
                            shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                            shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                            shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:15  -vframes 1 $rutaImagen");

                            
                }

        }else if($tiempo_cut>=1 && $tiempo_cut<=2){

                    shell_exec("ffmpeg  -ss 0:00:40 -t 2 -i $rutaTemVideo parte1.ts");
                    shell_exec("ffmpeg  -ss 0:00:30 -t 2 -i $rutaTemVideo  parte2.ts");
                    shell_exec("ffmpeg  -ss 0:01:30 -t 2 -i $rutaTemVideo parte3.ts");
                    shell_exec("ffmpeg  -ss 0:00:50 -t 4 -i $rutaTemVideo  parte4.ts");
                    shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                    shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                    shell_exec("ffmpeg -i $rutaTemVideo -ss 00:00:07   -vframes 1 $rutaImagen");

            
        }else if($tiempo_cut>=27  &&  $tiempo_cut<=50){

                    shell_exec("ffmpeg  -ss 0:10:40 -t 2 -i $rutaTemVideo parte1.ts");
                    shell_exec("ffmpeg  -ss 0:15:30 -t 2 -i $rutaTemVideo  parte2.ts");
                    shell_exec("ffmpeg  -ss 0:18:30 -t 2 -i $rutaTemVideo parte3.ts");
                    shell_exec("ffmpeg  -ss 0:25:50 -t 4 -i $rutaTemVideo  parte4.ts");
                    shell_exec("ffmpeg -i concat:'parte1.ts|parte2.ts|parte3.ts|parte4.ts' $reciduo_video");
                    shell_exec("rm parte1.ts parte2.ts parte3.ts parte4.ts");
                    shell_exec("ffmpeg -i $rutaTemVideo -ss 00:03:30  -vframes 1 $rutaImagen");
                
        }

        //echo $duracion;

       
        $categorias = generar_categorias($catx);



        $sql = "insert into posts(titulo,categoria,ruta_video,ruta_imagen,descripcion,id_user,fecha_publicacion,page,duracion,tipo_post,disk_config,previa)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$ready = $conexion->prepare($sql);
        $ready->bind_param('sssssisissss',$titulo,$categorias,$video_completo,$rutaImagen,$descripcion,$id_user,$fecha,$page,$duracion,$tp,$disk_config,$reciduo_video);
       
        if($ready->execute()){

			//echo $video_completo;
			shell_exec("php sitemap_crear.php");
			shell_exec("php sitemap_crear_search.php");
            echo "<a href='https://videosegg.com/$video_completo.mp4'>https://videosegg.com/".$video_completo."</a>";
            header('location:dashboard.php','301');

		}else{
            echo "<a href='https://videosegg.com/$video_completo.mp4'>https://videosegg.com/".$video_completo."</a>";


         //   echo "<hr> No se pudo guardar el video";
            
            $sql = "insert into posts(titulo,ruta_video,ruta_imagen,descripcion,id_user,duracion,tipo_post,disk_config,categoria)VALUES('$titulo','$video_completo',
            '$rutaImagen','$descripcion',
            $id_user,'$duracion','$tp','$disk_config','$categorias')";
            
            if($conexion->query($sql)){

                echo "GUARDADO CON EXITO!!!!!";
                header('location:dashboard.php','301');

            }else{

                shell_exec("rm -r  $video_completo");
                shell_exec("rm -r $rutaImagen");
                echo "<hr/>Se borraron los ficheros de intento de subida de este video por que no fue posible almacenerlo en la base de datos";

            }

          


           // echo " Guardado con exito";

		}




        
    
        
 
        

			//echo $video_completo;

			//shell_exec("php sitemap_crear.php");
			//shell_exec("php sitemap_crear_search.php");
           // echo "\n ya se descargo";


		



        #echo $url."\n";
        #echo shell_exec("ffmpeg -i https://v.redd.it/enxxsuo5xko31/DASHPlaylist.mpd -c copy guardado.mp4");
    



    







?>