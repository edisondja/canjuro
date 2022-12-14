<?php
session_start();
	include'../logic.php';
	//include'contar_visitas.php';

    if(isset($_POST['password']) && isset($_POST['password'])){

									
		Video::Login($_POST['usuario'],$_POST['password']);

	}




?>
<!DOCTYPE HTML>
<html>
<head>
<?php
	if(!isset($categoria)){
		Video::load_title();
	}else{

		echo"<title>Las mejores categorias porno VideosEGG</title>";
	}

?>
<!--
<script type="text/javascript" src="js/swiped-events.js"></script>-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112944763-1"></script>
<script type="text/javascript" src="js/analytic.min.js"></script>
<link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
<meta name="yandex-verification" content="5702ede0b237c3eb" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
<meta name="msvalidate.01" content="B85B1EC08D14A7B4D7E01C13DA35F2BB" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<meta http-equiv="Content-Language" content="es"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Robots" content="all"/>
<meta name="google" value="notranslate">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<style type="text/css">
	.movil_ver{
		display: none;
	}
	.pc_ver{
		display: block;
	}

	@media only screen and (max-width:600px){
		.movil_ver{
			display: block;
		}
		.pc_ver{
			display: none;
		}
	}

</style>-->

<?php
	
if(!isset($profile)){	

	if(!isset($_GET['search']) && !isset($_GET['categoria']) && !isset($_GET['page'])){

		echo "<link rel='canonical' href='https://videosegg.com' />";
	
	}else if(isset($_GET['search'])){

		if(!isset($_GET['page'])){
		
			echo "<link rel='canonical' href='https://videosegg.com/index.php?search=$_GET[search]'>";
	    
	    }else{

	    	echo "<link rel='canonical' href='https://videosegg.com/index.php?search=$_GET[search]&page=$_GET[page]'>";

	    }


	}else if(isset($_GET['categoria']) && !isset($_GET['search']) &&!isset($_GET['page'])){

		echo "<link rel='canonical' href='https://videosegg.com/index.php?categoria=$_GET[categoria]'>";

	}else if(isset($_GET['categoria']) && isset($_GET['page'])){


		echo "<link rel='canonical' href='https://videosegg.com/index.php?categoria=$_GET[categoria]&page=$_GET[page]'>";

	}

}else{
		 $ruta_actual = $_SERVER["REQUEST_URI"];

		echo "<link rel='canonical' href='https://videosegg.com$ruta_actual' />";

}
	
?>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>

<script type="text/javascript">
    Push.Permission.request();

var ad_idzone = "3387231",
      ad_popup_fallback = false,
      ad_popup_force = false,
      ad_new_tab = false,
      ad_frequency_period = 720,
      ad_frequency_count = 1,
      ad_trigger_method = 1;
</script>
<script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
<script type="text/javascript">

		     var config = {
						    apiKey: 'AIzaSyCH1WqjbWl2XosYNBBZDke5unCrAJaNmNs',
						    authDomain: 'videosegg-680a1.firebaseapp.com',
						    databaseURL: 'https://videosegg-680a1.firebaseio.com',
						    projectId: 'videosegg-680a1',
						    storageBucket: 'videosegg-680a1.appspot.com',
							messagingSenderId: '813030164539'
					 };
			
		 if (!firebase.apps.length) {
	    				
	    		     firebase.initializeApp(config);
			  }

          var db  = firebase.database().ref();
        
        	

          var query = db.child('/videosnow/').limitToLast(1);

          query.on('child_added',data=>{


          
          		Push.create('Videosegg', {
				    body:data.val().descripcion,
				    icon:data.val().imagen_url,
				    timeout: 8000,               // Timeout before notification closes automatically.
				    vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
				    onClick: function() {
				        // Callback for when the notification is clicked. 
				       window.location.href=data.val().url_video;
				    }  
				});
				
          		firebase.database().ref(`/videosnow/${data.key}`).remove();
	


          });


</script>

<script type="text/javascript" src="https://ads.exosrv.com/popunder1000.js"></script>
-->

<?php
	
	Video::load_descript();

?>

<?php
	if(isset($video_play)){

			if(isset($_GET['id'])){
		$data_v = Video::cargar_data_video($_GET['id']);

		$data_imagen = $data_v->ruta_imagen;
		$categoria = $data_v->categoria;
		$descripcion =$data_v->descripcion;
		$titulo = $data_v->titulo;
		$duration = $data_v->duracion;

		#ready to go
		 $ruta_actual = $_SERVER["REQUEST_URI"];
	}

		echo"
		<meta property='og:image' content='https://videosegg.com/$data_imagen'>
		<meta property='og:title' content='$titulo'>
		<meta property='og:type' content='video.movie'>
		<meta property='og:url' content='https://www.videosegg.com/$ruta_actual'>
		<meta property='og:duration' content='$duration'>
		<meta property='og:video:width' content='510'>
		<meta property='og:video:height' content='400'>
		";

	}else if(isset($profile)){

			if(isset($_GET['id'])){

					$data_r =	Video::load_user_info($_GET['id']);
					$ruta_actual = $_SERVER["REQUEST_URI"];
					echo "<meta property='og:title' content='Perfil de $data_r->usuario VideosEGG'>";
					echo "<title>Perfil de $data_r->usuario VideosEGG</title>";


			}

		echo "<meta property='og:image' content='https://videosegg.com/$data_r->foto_url'>";


	}else if(isset($categoria)){

				echo "<meta property='og:title' content='Las mejores categoria porno VideosEGG'>";



	}else{
			echo '<meta property="og:image" content="https://videosegg.com/assets/logoj.jpg">';


	}



?>



<meta name="keywords" content="VideosEGG, videosegg.com egg videos, intimos filtrados, xxx prohibidos,virales xxx videos" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style2020.min.css" rel='stylesheet' type='text/css' media="all" />

<script src="js/jquery-3.1.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->

  
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
-->

<style type="text/css">
		.menu_movil{
			display: none;
		}
		.menu_pc{
			display: block;
		}

		@media only screen and (min-width:1024px){
				.menu_pc{
					display: block;
				}

		}


		@media only screen and (max-width: 600px){
			.menu_pc{
				display: block;
			}
			.menu_movil{
				display: block;
			}
		}

</style>
</head>
  <body>
  	<?php //require('components/component_head_movil.php');  ?>
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
    <li><a href="https://videosegg.com/index.php?search=brasil">Brasileñas</a></li>
        <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=panama">Panameñas</a></li>
      <li class="divider"></li>
    <li><a href="https://videosegg.com/index.php?search=honduras">Hondureñas</a></li>
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
												<p>Saludos Dios te bendiga, para cualquier tipo de reclamación ya mencionada aqui debajo por favor contactanos a nuestro correo para resolver en lo que podamos ayudarte </p>
											</div>
											<div class="help-grids">
												<div class="help-button-bottom">
													<p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Contenido No Grato</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Daños y Perjuicios hacia una persona</a></p>
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
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Daños a Terceros</a></p>
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
							<p>Copyright © 2020 VideosEgg. All Rights Reserved.</p>
							<p>Support webvideosegg@gmail.com</p>
						</div>
					</div>
				</div>
        </div>
     </div>
