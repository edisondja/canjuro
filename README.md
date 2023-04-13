# canjuro
Red social

<p>
  Canjuro es un proyecto basado en una red social donde los usuarios podran compartir su contenido
  libre de expresion, teniendo sus propias tiendas si lo desean y sus pagos podran ser recibidos por paypal
  o cryptomonedas, tendran la opcion de vender proudctos digitales como audiovisual,imagenes y musica si lo desean,
  no solo producto digitales tambien fisico.
</p>

<h3>Estructura del proyecto</h3>

<p>Primero vamos a comenar con la configuracion que se encuentra en este directorio ✔</p>
<table>
  <td>Configurar proyecto en el entorno que estes</td>
  <td>Directorio</td>
  <td>./config/config.php</td>
</table>

<code>
  
    define("DOMAIN","https://localhost.com");
    #These are the data for the connection of the database 
    define("HOST_BD","localhost");
    define("USER_BD","seus");
    define("PASSWORD_BD","password");
    define("NAME_DB","edtube");
    #Config with scope complete used for the site tube
    define("NAME_SITE","EDtube");
    define("DESCRIPTION_SLOGAN","Donde encontraras los video mas buscados");
    define("DESCRIPTION_SITE","El mejor tube para ver los mejores videos");
    #Favicon for the site very important 
    define("FAVICON",DOMAIN."/assets/favicon.ico");
    #The dimesion for the site logo is 230px of width and 50px of height
    define("LOGOSITE",DOMAIN."/assets/hotpipe.png");
    define("COPYRIGHT_DESCRIPTION","Copyright © 2022 EDTUBE. All Righ-ts Reserved.");
    define("MAIL_SITE","suppor@edtube.com");
    define("SEARCH_DESCRIPTION","Baddie Sweet one Sex Tape");
    define("PAGE_DESCRIPTION","Uckers badders from United Kingdom NSFW XXX");
    #The title description is the tag used for the browser for example..
    define("TITLE_DESCRIPTION","Better Uckers badders Sex Tapes - edtube");-
    #Description for search using hastag
    define("SEARCH_HASTAG","The Best badders Hashtag - edtube")
 
</code>
<hr>


<p>Si usted desea crear nuevas entidades lo hace en este directorio ✔</p>
<table>
  <td>Trabajar con entidades</td>
  <td>Directorio</td>
  <td>./Modelos/User.php</td>
<table>

 <h3>Crear apis para la aplicacion</h3>
 <p>Para usted crear apis puede hacerlo de una manera simple, solo tiene que entrar al directorio Controllers/actions_board.php.
  usted va observar que exite un switch, y una varaible post que recibe el atributo action, este atributo sera utilizado para 
  definir la accion que desea ejuctar. por ejemplo $_POST['action'] = 'load_user_info', esta accion carga la informacion del usuario con
  con el id  correspondiente. ejemplo..<br/>
  <hr>
  <?php
  <br>
  require('../Models/User.php');
  <br><br>
  switch($_POST['action']){
    
   case 'load_user_info':<br><br>
        &nbsp;$user = new User();<br>
        &nbsp;$user->get_info_user($_POST['user_id']);
   
   break;
   
   
  }
  ?>
   <p>Esta accion retornaria la informacion completa del usuario</p>
  </p>
  
  <h3>Trabajando con los templates y componentes</h3>
    <table>
      <td>Trabajar con templates</td>
      <td>Directorio</td>
      <td>./template/header.tpl</td>
    <table>
  <p>Si usted desea desarrollar templates y nuevos comoponentes, puede hacerlo en el directorio template,creas
      el componente profile.tpl por ejemplo y luego lo incluyes en las condiciones del header.tpl ✔... ejemplo<br>
  </p>
                
      <?php        
      if $content_config=='boards'
                
                   elseif $content_config=='single_board'
                   
                      {include file="single_board.tpl"}
                      
                    elseif $content_config=='profile'
                       
                       include file="profile.tpl"  <-----
                              
                            Observe como aqui se esta incluyendo el tpl profile, 
                            inidicando en la varaible content_config=='profile'                                        
                    else
                        include file='default.tpl'

               if
    ?>
  
    <p style="color:red">
        header.tpl, es el template master, que incluye, el titulo del sitio web,logotipo,favicon y menu, por esta razon
        comenzamos a desarrollar a partir de el.
    </p>
    
    
 <h3>Como llamar el template o componente creado</h3>
 <p>Si queremos llamar el componente creado user_profile.tpl por ejemplo, simplemente tenemos que hacer los siguiente
 creamos un arhcivo user_profile.php y lo seteamos de esta manera.
 </p>
                         
 <code>
   require('bootstrap.php');
    require('models/User.php');
    require('models/Board.php');
    //Load profile user;
    //cargar_tableros($id_usuario='general',$opcion='json')

    $smarty->assign('titulo',"Profile by user ".NAME_SITE);
    $smarty->assign('descripcion',NAME_SITE." plataform free for alls share your contents");
    $smarty->assign('og_imagen',LOGOSITE);
    
    $smarty->assign('url_board',"$dominio");


    if(isset($_GET['user'])){

        $profile = new User();
        $data_user = $profile->LoadProfileUser($_GET['user']);
        $get_user_id =  $profile->get_id_from_user($_GET['user']);
        $get_user_id = $get_user_id->id_user;
        $boards = new Board();
        $data = $boards->cargar_tableros($get_user_id,'objects');
        //print_r( $data_user);
        $smarty->assign('content_config','profile'); al setear prfoile en content_config header.tpl sabra que lo tiene que llamar el profile.tpl
        $smarty->assign('boards',$data);
        $smarty->assign('name',$data_user->foto_url);
        $smarty->assign('og_imagen',$data_user->foto_url);
        $smarty->assign('data_profile',$data_user);
        $smarty->display('../template/header.tpl');  >---

    }

 
 
 </code>
                         
                         

  
