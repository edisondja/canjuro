# canjuro
Red social

<p>
  Canjuro es un proyecto basado en una red social donde los usuarios podran compartir su contenido
  libre de expresion, teniendo sus propias tiendas si lo desean y sus pagos podran ser recibidos por paypal
  o cryptomonedas, tendran la opcion de vender proudctos digitales como audiovisual,imagenes y musica si lo desean,
  no solo producto digitales tambien fisico.
</p>

<h3>Estructura del proyecto</h3>

<p>Si usted desea crear nuevas entidades lo hace en este directorio</p>
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
  <p>Si usted desea desarrollar templates y nuevos comoponentes, puede hacerlo en el directorio templates,
    para crear una vista haciendo un nuevo .tpl, siempre tienens que incluir el componente header.tpl y footer.tpl,
    para mantener la estructura del proyecto, header.tpl, trae junto al el logo de la plataforma,titulo,descripcion del sitio,menu
    y todas las librerias globales
  </p>
  <table>
    <td>Trabajar con templates</td>
    <td>Directorio</td>
    <td>./templates/header.tpl</td>
  <table>
  
