<?php

    Class Board extends EncryptToken{

        public $conection;
    

        function __construct(){

           $this->SetConection();

        }

        public static function guardar_tablero($titulo,$description,$fecha_creacion,$imagen_tablero,$id_usuario){
       
		
			$this->conection; 
			$sql = "insert into tableros(titulo,descripcion,fecha_creacion,imagen_tablero,id_usuario)values(?,?,?,?,?)";
			$guardar = $this->conection->prepare($sql);
			$guardar->bind_param('ssssi',$titulo,$description,$fecha_creacion,$imagen_tablero,$id_usuario);
			$guardar->execute() or die("no se puedo guardar el tablero");

	    }


 


        public static function cargar_tablero($id_tablero,$config='json'){

			$this->conection;
			$sql = "select * from tableros inner join user on tableros.id_usuario=user.id_user where id_tablero=?";
			$cargado = $this->conection->prepare($sql);
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

      function search_tablero($texto){

            global $conexion;
    
            $texto = "%$texto%";
            
    
            $data= $this->conection->prepare("select * from tableros inner join user on tableros.id_usuario=user.id_user where titulo like ? || descripcion like ? limit 20");
            $data->bind_param('ss',$texto,$texto);
            $data->execute();
            $resp = $data->get_result();
            $datos = [];
            foreach ($resp as $key) {
    
                $datos[] = $key;
            }
            
            return $datos;
    
        }


        function asignar_metadatos_a_multimedia($id_asignar,$texto,$precio,$metodo_de_pago){

            $this->conection;
            $sql = "update asingar_multimedia_t set texto=?,precio=?,metodo_de_pago=? where id_asignar=?";
            $acoplar = $this->conection->prepare($sql);
            $acoplar->bind_param('sisi',$texto,$precio,$metodo_de_pago,$id_asignar);
            $acoplar->execute() or die('error');
            echo "update asset success";
    
        }


         function asignador_de_multimedia_tablero($id_tablero,$url_temp,$tipo_archivo,$titulo){

                $this->conection;
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
                $guardar = $this->conection->prepare($sql);
                $guardar->bind_param('iss',$id_tablero,$guardar_como,$tipo_asset);
                $guardar->execute();
		

	    }
    
         function cargar_tableros($id_usuario='general',$opcion='json'){

			$this->conection;
			
			if($id_usuario=='general'){
				
				$sql = "select * from tableros inner join user on tableros.id_usuario=user.id_user order by id_tablero desc limit 20";
				$cargado = $this->conection->prepare($sql);

			}else{
					
				$sql = "select * from tableros  inner join user on tableros.id_usuario=user.id_user where id_usuario=? order by id_tablero desc limit 20";
				$cargado = $this->conection->prepare($sql);
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

      function eliminar_multimedia_de_tablero($id_multimedia){
            $this->conection;
            $sql = "delete from asingar_multimedia_t where id_asignar=?";
            $eliminar = $this->conection->prepare($sql);
            $eliminar->bind_param('i',$id_multimedia);
            $eliminar->execute();
        }
    
     function cargar_multimedias_de_tablero($id_tablero,$config='json'){
                $this->conection;
                $sql = "select * from asingar_multimedia_t where id_tablero=?";
                $cargar = $this->conection->prepare($sql);
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








    }






?>