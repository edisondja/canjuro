<?php
session_start();
include'logic.php';
//include'contar_visitas.php';

  if(isset($_POST['password'])){

									
		Video::Login($_POST['usuario'],$_POST['password']);


}
		if(isset($_GET['id'])){
			try{
				$data_v = Video::cargar_data_video($_GET['id']);

				Video::validar_video($_GET['id']);

				$data_imagen = $data_v->ruta_imagen;
				$categoria = $data_v->categoria;
				$descripcion =$data_v->descripcion;
				$descripcion_meta =  $descripcion;
				$titulo = $data_v->titulo;
				$duration = $data_v->duracion;
				$ruta_v = $data_v->ruta_video;
				$id_user_video = $data_v->id_user;

				#ready to go
				 $ruta_actual = $_SERVER["REQUEST_URI"];

				 $canon_rut = Video::url_ready($_GET['id'],$titulo);
				 $canon_rut = explode("/",$canon_rut);
				 $canon_rut = $canon_rut[0]."/".$canon_rut[1];
				 $img_og ="";
				 $disk_config =$data_v->disk_config;

				 if($disk_config==""){
				   
				   $img_og = "https://videosegg.com/$data_imagen";

				 }else if($disk_config=="disk2"){

				 	 $img_og = "https://files.videosegg.com/$data_imagen";

				 }
			}catch(Exception $e){

				file_put_contents("logs.txt", $e);
			}

	}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="canonical" href="https://videosegg.com/<?php echo $canon_rut;?>" />
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ca12ecf2c4f3b001126eb68&product=sticky-share-buttons' async='async'></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112944763-1"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112944763-1');
</script>
    <link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css"/>
<script src="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.js"></script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<title><?php echo $titulo." - VideosEgg.com"; ?></title>
<link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
<meta name="description" content="<?php echo $descripcion_meta." - VideosEgg"; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msvalidate.01" content="B85B1EC08D14A7B4D7E01C13DA35F2BB" />
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
<meta http-equiv="Content-Language" content="es"/>
<meta name="Robots" content="all"/>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">


<!-- ETIQUETAS TWITER -->
<meta name="twitter:card" content="photo" >
<meta name="twitter:site" content="VideosEGG" >
<meta name="twitter:title" content="<?php echo $titulo ?>" >
<meta name="twitter:description" content="<?php echo $descripcion_meta." - VideosEgg"; ?>" >
<meta name="twitter:image" content="<?php echo $img_og;  ?>" >
<meta name="twitter:url" content="https://www.videosegg.com/<?php echo $ruta_actual; ?>" >

<!-- ETIQUETAS FACEBOOK -->
<meta property="og:image" content="<?php  echo $img_og; ?>">
<meta property="og:video" content="<?php echo $ruta_v;?>">
<meta property="og:title" content="<?php echo $titulo ?>">
<meta property="og:type" content="mp4">
<meta property="og:url" content="https://www.videosegg.com/<?php echo $ruta_actual; ?>">
<meta property="og:duration" content="<?php echo $duration ?>">
<meta property="og:video:width" content="510">
<meta property="og:video:height" content="400">
<meta property="og:description" content="<?php echo $descripcion_meta." - VideosEgg"; ?>">
<meta property="og:site_name" content="VideosEGG">
<meta name="google" value="notranslate">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $categoria; ?>" VideosEgg />
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />


<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style2020.min.css" rel='stylesheet' type='text/css' media="all" />
<!--<link href="css/alertify.min.css" rel='stylesheet' type='text/css' media="all" />
<link rel="stylesheet" type="text/css" href="css/alertify.css">-->




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--<script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>-->
      <!-- <script src="js/function_videos2019now.js"></script> !-->
<script type="text/javascript" src="https://syndication.exosrv.com/splash.php?idzone=2920006&capping=0"></script>




<!--start-smoth-scrolling-->
<!-- fonts -->
<!--
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>-->
<!-- //fonts -->
<!--<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v6.0&appId=126415568152910&autoLogAppEvents=1"></script>-->
<script type="text/javascript">	
	function comentarios(){
		 let  com=document.getElementById('coment_master');
		 com.classList.remove("interfaz_coment");

         let descripcion = document.getElementById('descripcion');
         descripcion.classList.remove("descripcion");

	}    
</script>
<script type="text/javascript" src="js/leer_comentario.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo_extra.min.css">

  	<?php
  			if(isset($_SESSION['id_user'])){


  				$id_user = $_SESSION['id_user'];
  				echo "<input type='hidden' id='id_user' value='$id_user'>";

  			}else{


  				 	echo "<input type='hidden' id='id_user' value='0'>";

  			}	


  	?>
  	
  	<?php
  		if(isset($_SESSION['usuario'])){

  			  	echo"<input type='hidden' id='usuario_login' value='$_SESSION[usuario]'>";
	

  		}else{

  				echo"<input type='hidden' id='usuario_login' value='Anonimo'>";
  		}
  	?>
  	<style type="text/css">
		.menu_pc{
		
		}
		.menu_movil{

		}
		@media only screen and (min-width: 1024px){
			.menu_pc{
				display: block;
			}
			.menu_movil{
				display: none;
			}

		}

		@media only screen and (max-width: 600px){
			.menu_movil{
				display: block;
			}
			.menu_pc{
				display: none;
			}
		}
 </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
  <body>
  	<input type="hidden" id="ruta_v" value="<?php echo $ruta_v; ?>">
    <input type="hidden" id="disk_config" value="<?php echo $disk_config; ?>">
    <input type="hidden" id="ruta_actual_video" value="<?php  echo $ruta_actual; ?>">
    <input type="hidden" id="url_imagen_user" value="<?php echo $_SESSION[foto_url]; ?>">
	<input type="hidden" id="id_post" value="<?php echo $_GET['id']; ?>">
  	<input type="hidden" id="id_user_video" value="<?php echo $id_user_video; ?>">
  	<div class="container">
  <h2>Dropdowns</h2>
  <p>The .dropdown class is used to indicate a dropdown menu.</p>
  <p>Use the .dropdown-menu class to actually build the dropdown menu.</p>
  <p>To open the dropdown menu, use a button or a link with a class of .dropdown-toggle and data-toggle="dropdown".</p>                                          
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
</div>

 <?php include('components/component_head_movil.php') ?>
 <div class="menu_pc">
   	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="https://videosegg.com/images/logo.png" alt="" /></h1></a>
                </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right" action="index.php">
					<input type="text" class="form-control" placeholder="Search..." name="search">
					<?php  Video::read_country(); ?>
					<input type="submit" value=" ">
				</form>

			</div>
			<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle"
          data-toggle="dropdown">Putas<span class="caret"></span>
  </button>

  <ul class="dropdown-menu" role="menu">
    <li><a href="https://videosegg.com/index.php?search=mexicana">Mexicanas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=ecuatorianas">Ecuatorianas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=chilena">Chilenas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=colombiana">Colombianas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=venezolana">Venezolanas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=uruguayas">Uruguayas</a></li>
        <li class="divider"></li>
     <li><a href="https://videosegg.com/index.php?search=argentina">Argentinas</a></li>
         <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=peruana">Peruanas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=dominican">Dominicanas</a></li>
        <li class="divider"></li>
     <li><a href="https://videosegg.com/index.php?search=haitianas">Haitianas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=boliviana">Bolivianas</a></li>
        <li class="divider"></li>
  	 <li><a href="https://videosegg.com/index.php?search=paraguayas">Paraguayas</a></li>
  	     <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=brasil">Brasile�as</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=panama">Paname�as</a></li>
      <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=honduras">Hondure�as</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=boricua">Boricuas PR</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=jamaica">Jamaiquinas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=nicaraguense">Nicaraguenses</a></li>
        <li class="divider"></li>    
  </ul>
</div>
			<div class="header-top-right">

			
				<div class="file">
					<a href="categorias.php">Categ</a>

				</div>	

				<div class="signin">
					<?php
						if(isset($_SESSION['id_user'])){

								echo "<a href='https://videosegg.com/dashboard.php'>Perfil</a>";

						}else{

				echo "<a href='#small-dialog2' class='play-icon popup-with-zoom-anim' onclick='window.location=registrer.php';>Regist</a>";

						}

					?>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->
									<div id="small-dialog2" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
											<?php
												include'components/component_registrer.php';

											?>
										
								
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog3" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="facebook-button">
												<a href="#">Connect with Facebook</a>
											</div>
											<div class="chrome-button">
												<a href="#">Connect with Google</a>
											</div>
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<div class="signup">
										<form action="" method="post">
								<input type="text" class="email" name="usuario" placeholder="Usuario" required="required"/>
								<input type="password" placeholder="Password" name="password" required="required" />
								<input type="submit"  value="LOGIN"/>
							</form>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog7" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="facebook-button">
												<a href="#">Connect with Facebook</a>
											</div>
											<div class="chrome-button">
												<a href="#">Connect with Google</a>
											</div>
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<!--
										<div class="signup">
											<form action="" method="post">
												<input type="text" class="email" placeholder="Email" name="usuario" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" placeholder="Password" required="required" name="password" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input type="submit"  value="Sign In"/>
											</form>
										</div>
									-->
										<div class="clearfix"> </div>
									</div>		
									<div id="small-dialog4" class="mfp-hide">
										<h3>Feedback</h3> 
										<!--
										<div class="feedback-grids">
											<div class="feedback-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="button-bottom">
												<p><a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign in</a> to get started.</p>
											</div>
										</div>
									-->
									</div>
									<div id="small-dialog5" class="mfp-hide">
										<h3>Ayuda</h3> 
											<div class="help-grid">
												<p>Saludos Dios te bendiga, para cualquier tipo de reclamaci�n ya mencionada aqui debajo por favor contactanos a nuestro correo para resolver en lo que podamos ayudarte </p>
											</div>
											<div class="help-grids">
												<div class="help-button-bottom">
													<p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Contenido No Grato</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Da�os y Perjuicios hacia una persona</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Falta al Copyrigth</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Contenido Clonado</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Reportar Video</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Da�os a Terceros</a></p>
												</div>
											</div>
									</div>
									<div id="small-dialog6" class="mfp-hide">
										<div class="video-information-text">
											<h4>VideosEGG</h4>
											<p>VideosEGG Los Mejores Filtrados Videos XXX Gratis</p>
										</div>
									</div>
									<script>
											$(document).ready(function() {
											$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
																											
											});
									</script>	
				</div>
				<div class="signin">
					<?php
					   
						if(!isset($_SESSION['usuario'])){

							echo '<a href="#small-dialog" class="play-icon popup-with-zoom-anim">Iniciar</a>';

						}
					?>
					<div id="small-dialog" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
						<h3>Login</h3>

						<div class="social-sits">
							
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Signup</a></p>
							</div>
						</div>
						<div class="signup">
							<form action="" method="post">
								<input type="text" class="email" name="usuario" placeholder="Enter Usuario" required="required" />
								<input type="password" placeholder="Password" name="password" required="required"/>
								<input type="submit"  value="LOGIN"/>
							</form>
							<div class="forgot">

								<a href="#">Forgot password ?</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
					<li class="active"><a href="cam.html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden=" true"></span>Sexo En Vivo</a></li>
					<li><a href="https://videosegg.com/index.php?search=hermana" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Incesto Real</a></li>
					<li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Tendencias<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="https://videosegg.com/playvideo.php?id=1883/Cogiendo-con-cristiana-mientras-sus-padres-no-estan-en-casa">Prohibidos de Cristianas</a></li>
							<li><a href="videosegg.com/playvideo.php?id=1517/Kathyconk-Moviendo-su-culo--como-perra">La perra de KathyconK</a></li>
							<li><a href="https://videosegg.com/playvideo.php?id=5713/FILTRADO-Macarena-puta-Argentina-Gran-Hermano-2016">FILTRADO Macarena puta</a></li>
							<li><a href="https://videosegg.com/playvideo.php?id=5352/Barbie-Garciiia-Singando-Parte-3-Cuero-del-Inst">Barbie Garciiia Singando</a></li>                                             
				<li><a href="https://videosegg.com/playvideo.php?id=5738/FILTRADO-YURI-VARGAS-MODELO-COLOMBIANA-">Yuri Vargas XXX</a></li>
							<li><a href="https://videosegg.com/playvideo.php?id=1924/Video-intimo-De-Marlen-Selene-Reyes-Presentadora-de-Tv-Porno-xxx-">Marlen Selene XXX</a></li> 
				 <li><a style="font-size:14px;" href="https://videosegg.com/index.php?search=PUTAS+LATINAS">Mas Putas Latinas...</a></li>
				 
						</ul>

						<!-- script-for-menu -->
						<script>
							$( "li a.menu1" ).click(function() {
							$( "ul.cl-effect-2" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
			
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					
					<li><a href="https://videosegg.com/index.php?search=INTIMO" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Prohibidos XXX</a></li>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="https://twitter.com/videosegg1" class="facebook"> </a></li>
								<li><a href="https://www.facebook.com/temptationofficial/" class="facebook twitter"> </a></li>
								<li><a href="https://www.pinterest.com/videosegghd/" class="facebook chrome"> </a></li>
								<li><a href="https://www.instagram.com/webvideosegg/?hl=es-la" class="facebook dribbble"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright � 2020 VideosEgg. All Rights Reserved.</p>
							<p>Support webvideosegg@gmail.com</p>
						</div>
					</div>
				</div>
        </div>
        
 </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
									<div style="text-align: center;" class="view_movil">
									<script type="text/javascript">
									var ad_idzone = "2920002",
										 ad_width = "300",
										 ad_height = "100";
									</script>
									<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
									<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920002" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920002&output=img&type=300x100" width="300" height="100"></a></noscript>
									</div>
									<iframe  class="view_computer" src="//a.exosrv.com/iframe.php?idzone=3790533&size=728x90" width="675" height="90" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
									        
					<?php

						if(isset($_GET['id'])){

							Video::cargar_video($_GET['id']);
							Video::get_view($_GET['id']);


						}else{

							Video::cargar_video(756);


						}
					
				    ///target
							$url_blog="https://www.blogger.com/blog_this.pyra?t&u=https://videosegg.com/$ruta_actual&n=$titulo";
					?>
			
					

					<div class="song-grid-right">
						<div class="share barrShare">
							<h5></h5>
							<ul>

								<input type="hidden" id="session"  value="<?php  if(isset($_SESSION['usuario'])){ echo "login";}else{ echo "off";} ?>">
								<!--
								<li><a  class="icon like" id="like_video"><div id="container_like">0</div></a></li>
								<li><a  class="icon comment-icon" id="dislike"><div id="container_dislike">0</div></a></li>
								!-->
								<li class="view">Views <?php if(isset($_GET['id'])){ echo Video::read_view($_GET['id']); }  ?></li>

							</ul>

	

						</div>
					</div>
					
													                                

					<div class="clearfix"> </div>
					<div class="published">
							<div class="load_more">	
								<ul style="list-style: none;">
									<li>
					
										<p class="descripcion" id="descripcion" style="color:black; font-size: 12px;"><?php  
											
											$text = $descripcion;
												$text = preg_replace('/(?:^|\s)#(\w+)/', ' <a href="index.php?tag=$1"> #$1</a>', $text);

												echo $text;

                                           ?>
										</p><!--<strong style="cursor:pointer;">Ver mas...</strong>-->

									</li>
									<li>
							
										<div class="load-grids" style="display: none;">
											<div class="load-grid">
												<p>Category</p>
											</div>
											<div class="load-grid">
												<a href="">Entertainment</a>
											</div>

											<div class="clearfix"> </div>
										</div>
									</li>
								</ul>
							</div>
					</div>

									<div style="text-align: center;">
                                   
                                   <script type="text/javascript">
									var ad_idzone = "2920002",
										 ad_width = "300",
										 ad_height = "100";
									</script>
									<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
									<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920002" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920002&output=img&type=300x100" width="300" height="100"></a></noscript>
						
						</div>

					<div class="all-comments interfaz_coment" id="coment_master">
						<div class="all-comments-info" id="interfaz_coment">
							<a href="#">Comentarios</a>
							<div class="box">
								<div class="fb-comments" data-href="<?php echo $domain;?>/<?php echo $canon_rut;?>" data-mobile="true"  data-width="" data-numposts="5"></div>
								<?php
									Video::interfaz_coment();
								?>
								<div id="comentarios">
									
								</div>
								
									
								
							</div>
							<div class="all-comments-buttons">
							<!--	<ul>
									<li><a href="#" class="top">Comentarios top</a></li>
									
									<li><a href="#" class="top my-comment">Mis Comentarios</a></li>
								</ul>
							-->
							</div>
						</div>
						<div class="media-grids">
				
							<div class="media">
								
							</div>
						</div>
					</div>
				</div>
					<div class="col-md-4 view_computer">
							<script type="text/javascript">
									var ad_idzone = "2920010",
										 ad_width = "300",
										 ad_height = "250";
									</script>
							<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
							<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
					</div>

				<div class="col-md-4 single-right">
				
					<h3>Relacionados</h3>
					
							
							<?php

								Video::cargar_relacion($categoria);
							?>

					
				</div>
				<div class="clearfix"> </div>
			</div>
				<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="row">
							<div class="col-md-4">
									<script type="text/javascript">
									var ad_idzone = "2920010",
										 ad_width = "300",
										 ad_height = "250";
									</script>
									<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
									<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
								
							</div>
							<div class="col-md-4 view_computer">
									<script type="text/javascript">
									var ad_idzone = "2920010",
										 ad_width = "300",
										 ad_height = "250";
									</script>
									<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
									<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
								
							</div>
							<div class="col-md-4 view_computer">
									<script type="text/javascript">
									var ad_idzone = "2920010",
										 ad_width = "300",
										 ad_height = "250";
									</script>
									<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
									<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
								
							</div>
						</div>
						<div class="footer-top-nav">
							<ul>
									<li><img data-src="https://filesvideosegg.sfo2.digitaloceanspaces.com/assets/120x60_RTA-5042-1996-1400-1577-RTA_c.gif" class="img-responsive lazzyLoad" >
									</li>								
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
								<li><a href="index.php">Terms</a></li>
								<li><a href="index.php">Privacy</a></li>
								
								<li><a href="index.php">Policy & Safety </a></li>
								
							</ul>
						</div>
					</div>
					<div class="footer-bottom">
						<ul>
							
							</li>
							<li><a href="#small-dialog5" class="play-icon popup-with-zoom-anim f-history f-help">Ayuda</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- //footer -->
		</div>
		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <!--<script src="js/alertify.min.js"></script>
	<script src="js/alertify.js.js"></script>-->

  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--<script type="text/javascript">
    	$('document').ready(function(){
    			var id_user = $('#id_user').val();
    			var id_post = $('#id_post').val();

    			leer_comentarios(id_post);

    	});

    </script>-->
    <script type="text/javascript" src="js/leer_comentarios.min.js"></script>

    <?php

    	if(!isset($_POST['usuario'])){

    //	Video::login($_POST['usuario'],$_POST['clave']);

    }

    ?>
 <script type="text/javascript" src="js/function_videosActual.min.js"></script>
<script type="text/javascript" src="js/pre_roll.min.js"></script>
<script type="application/javascript" src="https://a.exosrv.com/video-slider.js"></script>
<!--<script type="application/javascript" data-idzone="3788763" data-ad_frequency_period="720" data-ad_frequency_count="1" data-browser_settings="1" data-ad_trigger_method="3" src="https://a.exosrv.com/fp-interstitial.js"></script>-->
<script type="text/javascript" src="js/slider_exoclick.min.js"></script>

  </body>
  
</html>
<!--
<style type="text/css">
	
.boton_update{
	margin-left:75%;
	margin-bottom:10px;

}

@media screen and (max-width:600){

	.boton_update{
	margin-left:80%;
	margin-bottom:10px;
	}


}
</style>
-->