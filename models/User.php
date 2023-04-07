<?php


require('EncryptToken.php');


Class User extends EncryptToken{

        
    public int $id_user;
    public string $usuario;
    public string $nombre;
    public string $apellido;
    public string $clave;
    public string $correo;
    public string $foto_url;
    public $conection;
    




        function __construct(){

           $this->SetConection();

        }

        function RegistrerUser(){

          
            if($this->ExistUser($this->usuario)==true){

                $clave = md5($this->clave);
                $fecha = date('ymdis');
                $sql = "insert into user(usuario,clave,email,sexo,foto_url,fecha_creacion,nombre,apellido)VALUES(?,?,?,?,?,?,?,?)";
                $ready = $this->conection->prepare($sql);
                $ready->bind_param('ssssssss',
                $this->usuario,
                $clave,
                $this->email,
                $this->sexo,
                $this->foto_url,
                $fecha,
                $this->nombre,
                $this->apellido);
                $ready->execute();
                $this->SendMailActivedAccount();
                echo "success";


            }else{

                echo "User no avaible";

            }
        
        } 

        function get_id_from_user($user){

            $sql = "select * from user where usuario=?";
			$cargado = $this->conection->prepare($sql);
            $cargado->bind_param('s',$user);
            $cargado->execute();
            $user = $cargado->get_result();
            $user = mysqli_fetch_object($user);
            return $user;
            
        }

        function UpdateUser($usuario,$password,$email,$foto_perfil="",$id_user){


                if($foto_temp!=""){

       
                    $fecha = date('ymdis');

                    $foto_perfil = "imagenes_perfil/$fecha"."foto.jpg";
                    shell_exec("ffmpeg -i $foto_temp $foto_perfil");
                    $sql="update user set usuario=?,clave=?,email=?,foto_url=? where id_user=?";
                    $conection->prepare($sql);
                    $conection->bind_param('ssssi',$usuario,$password,$email,$foto_perfil,$id_user);
                    $conection->execute();

                    echo $foto_perfil;

                }else{

                    $sql="update user set usuario=?,clave=?,email=?,foto_url=? where id_user=?";
                    $conection->prepare($sql);
                    $conection->bind_param('ssssi',$usuario,$password,$email,$foto_perfil,$id_user);
                    $conection->execute()  or die('error al actualizar perfil');

                }


        }

        function LoadConfigPayUser(){


        }

        public function Login($user,$clave)
        
        {

                
                session_start();    
                $clave = md5($clave);
                $sql = "select * from user where email=? or usuario=? and clave=?";
                $guardar = $this->conection->prepare($sql);
                $guardar->bind_param('sss',$user,$user,$clave);
                $guardar->execute();
                $data = $guardar->get_result();
                    
                if($data->num_rows>0){

                    $data = mysqli_fetch_object($data);
                    $_SESSION['nombre'] = $data->nombre;
                    $_SESSION['apellido'] = $data->apellido;
                    $_SESSION['sexo'] = $data->sexo;
                    $_SESSION['id_user'] = $data->id_user;
                    $_SESSION['usuario']= $data->usuario;
                    $_SESSION['foto_url'] = $data->foto_url;
                    
                    
                   $token=$this->EncryptUser($data->id_user,$data->usuario);

                    $user_user = [
                            'token'=>$token,
                            'usuario'=>$data->usuario,
                            'nombre'=>$data->nombre,
                            'apellido'=>$data->apellido,
                            'foto_url'=>$data->foto_url,
                            'id_user'=>$data->id_user
                    ];

                    echo json_encode($user_user);

                }else{

                    echo "user incorrect";

                }

        }


        public static function SigOut(){

            session_start(); 
            session_destroy();

        }


        public function SendMailActivedAccount(){

                echo "verificando correo electronico";
        }


        function LoadProfileUser($usuario){

          $SQL =  "select * from user where usuario=?";
          $DataUser =  $this->conection->prepare($SQL);
          $DataUser->bind_param('s',$usuario);
          $DataUser->execute();
          $user = $DataUser->get_result();
          $user = mysqli_fetch_object($user);

          return $user;

        }
    
        function ExistUser($usuario){

            
          $SQL =  "select * from user where usuario=?";
          $DataUser =  $this->conection->prepare($SQL);
          $DataUser->bind_param('s',$usuario);
          $DataUser->execute();
          $exist = $DataUser->get_result();
          
          if($exist->num_rows>0){

           return false;

          }else{

            return true;
          }



        }




}



/*
$usuario = new User();
$usuario->getBearerToken();
$usuario->Login('edisondja','Meteoro2412');
$usuario->usuario = 'edisonxxx';
$usuario->nombre= 'Edison De Jesus';
$usuario->foto_url= 'Edison De Jesus';
$usuario->apellido= 'Edison De Jesus';
$usuario->clave = "concentro";
$token = $usuario->EncryptUser(1);
$usuario->VerifiyTokenExpired('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiZWRpc29uZGphIiwiaWRfdXNlciI6MSwiZXhwIjoxNjY2MzI1MjUxfQ.xV3UfYNvt5CvWvHc9k7KnD8k1_0uxFMGpi9HsgC86to');
//echo $token;
//$usuario->DecodeToken($token);
//$usuario->RegistrerUser();


*/



?>

