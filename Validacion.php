<?php

	class Validacion{

		function __construct(){



		}

		public static function validar_video($id=0){

			global $conexion;
			$sql = "select (id_post) from posts where id_post=?";
			$check = $conexion->prepare($sql);
			$check->bind_param('i',$id);
			$check->execute();

			$result = $check->get_result();

			if($result->num_rows>0){


			}else{
					header("location:index.php");
			}


		}







	}



?>