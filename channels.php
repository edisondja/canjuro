<?php
session_start();
	include'logic.php';
	include'contar_visitas.php';

    if(isset($_POST['password']) && isset($_POST['password'])){

									
		Video::Login($_POST['usuario'],$_POST['password']);
							

	}


?>
<!DOCTYPE HTML>
<html>
<head>
<?php
		
		Video::load_title();

?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112944763-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112944763-1');
</script>
<link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
<meta name="yandex-verification" content="5702ede0b237c3eb" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
<meta name="msvalidate.01" content="B85B1EC08D14A7B4D7E01C13DA35F2BB" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<meta http-equiv="Content-Language" content="es"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Robots" content="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:image" content="https://videosegg.com/assets/logoj.jpg">
<meta name="description" content="Videosegg is an adult website with totally free porn, HD and 4k content to give you the best user experience for free porneggs"; ?>



<meta name="keywords" content="videosegg, videosegg.com egg videos, porno gratis, eggvideos, videos" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />

<script src="js/jquery-3.1.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->

  
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="images/logo.png" alt="" /></h1></a>
                </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search..." name="search">
					<input type="submit" value=" ">
				</form>
			</div>
			<div class="header-top-right">
				<div class="file">
					<a href="categorias.php">Categorias</a>
				</div>	
				<div class="signin">
					<?php
						if(isset($_SESSION['id_user'])){

								echo "<a href='https://videosegg.com/dashboard.php'>Profile</a>";

						}else{

				echo "<a href='#small-dialog2' class='play-icon popup-with-zoom-anim' onclick='window.location=registrer.php';>Register</a>";

						}

					?>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->
									<div id="small-dialog2" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
										<h3 style="color:#FF1196">Create Account</h3> 
										
												<form method="post" action="">
											<input type="text" name="usuario" placeholder="Usuario" id="usuario" class="form-control"><br>
											<input type="password" name="clave" id="clave"  placeholder="Contraseña" class="form-control"><br>
											<input type="password" name="clave2" id="clave2" placeholder="Repita su contraseña" class="form-control"><br>
											<input type="text" name="email" id="email" placeholder="Correo electronico" class="form-control"><br>
											<strong>Select your sex</strong><br>
											<strong>Masculino</strong>
											<input type="radio" name="sexo"  checked="true" value="Masculino">
											<strong>Femenino</strong>
											<input type="radio" name="sexo" value="Femenina">
												<strong>Gay</strong>
											<input type="radio" name="sexo" value="Gay"><br><br>
														<input type="submit" name="registrar" class="btn btn-primary" value="registrar"/>

										</form><br>
										<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
										
								
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
								<input type="text" class="email" name="usuario" placeholder="Enter email / mobile" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?"/>
								<input type="password" placeholder="Password" name="password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
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
											<p>VideosEGG FREE PORN</p>
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
					<a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign In</a>
					<div id="small-dialog" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
						<h3>Login</h3>
						<div class="social-sits">
							
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Signup</a></p>
							</div>
						</div>
						<div class="signup">
							<form action="" method="post">
								<input type="text" class="email" name="usuario" placeholder="Enter email / mobile" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?"/>
								<input type="password" placeholder="Password" name="password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
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
					<li><a href="index.php" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
					<li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Categorias<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="index.php?categoria=jovenes">Jovenes</a></li>                                   
							<li><a href="index.php?categoria=Amateur">Amateur</a></li>
							<li><a href="index.php?categoria=Lesbianas">Lesbianas</a></li>
							<li><a href="index.php?categoria=trios">Trios</a></li>                                             
							<li><a href="index.php?categoria=Anal">Anal</a></li>
							<li><a href="index.php?categoria=Latina">Latinas</a></li> 
				            <li><a style="font-size:14px;" href="categorias.php">Ver Mas...</a></li>
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
					
					<li><a href="index.php" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Soporte</a></li>
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
							<p>Copyright © 2019 VideosEgg. All Rights Reserved.</p>
							<p>Support webvideosegg@gmail.com</p>
						</div>
					</div>
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="recommended">
					<div class="recommended-grids english-grid">
						<div class="recommended-info">
							<div class="heading">
								<h3>Latest Sports Videos</h3>
							</div>
							<div class="heading-right">

								<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
							</div>
							<div class="clearfix"> </div>
						</div>

						
						<div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img style="width:100%;" src="images/g2.jpg" alt="" /></a>
								<div class="time small-time sports-tome">
									<p>5:34</p>
								</div>
								<div class="clck sports-clock">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="single.html" class="title">Nullam interdum metus varius sit sed viverra</a></h5>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
						</div>

					
						<div class="clearfix"> </div>
					</div>
				
				
				
					
				</div>
			</div>
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li>
																	<script type="text/javascript">
								var ad_idzone = "2920010",
									 ad_width = "300",
									 ad_height = "250";
								</script>
								<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
								<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
								</li>
								<li>
																		                                    
									<script id="mp_spot_1772971" type="text/javascript">
									    mp_ads_spot_id=1772971;
									    mp_ads_width=300;
									    mp_ads_height=250;
									</script>
									<script src="https://static.trafficjunky.com/js/marketplace.min.js"></script>


								</li>
								
								<li>
									
									<script type="text/javascript">
									var ad_idzone = "2920010",
										 ad_width = "300",
										 ad_height = "250";
									</script>
									<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
									<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2920010" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920010&output=img&type=300x250" width="300" height="250"></a></noscript>
								</li>
								
									<li><img src="https://videosegg.com/assets/120x60_RTA-5042-1996-1400-1577-RTA_c.gif" class="img-responsive" >
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
    <script src="js/bootstrap.min.js"></script>
 <script src="js/alertify.js"></script>

  <script src="js/alertify.min.js"></script>
  <script src="js/funcion.js"></script>  
  <script src="js/search.js"></script>
    <script  src="js/previa_runs.js"></script>

    <!--Escript importante para el funcionamiento de la web

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/categorias_load.js"></script>

    -->

    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
   <?php
	include'../conexion.php';

if(isset($_POST['registrar'])){
	#echo "<h1>REGISTRANDO</h1>";

	$usuario =$_POST['usuario'];
	$email = $_POST['email'];
	$clave = $_POST['clave'];
	$clave2 = $_POST['clave2'];
	$sexo = $_POST['sexo'];
	$fecha = date('Ymdhis');

	if($sexo=="Masculino"){
	$foto_default="assets/hombre.png"; 
	}else if($sexo=="Femenina"){
		$foto_default="assets/mujer.png";
	}else{

		$foto_default="assets/duroporelculo.png";
	}
	#verif 
	$sql  = "select * from user where usuario='$usuario'";
	$result = $conexion->query($sql);
	$nombre = "disable";
	$apellido ="disable";

	if($clave==$clave2 and $clave!="" and $clave2!="" and $result->num_rows==0){


	$sql = "insert into user(usuario,clave,email,sexo,foto_url,fecha_creacion,nombre,apellido)VALUES(?,?,?,?,?,?,?,?)";
	
	 $ready = $conexion->prepare($sql);
	 $ready->bind_param('ssssssss',$usuario,$clave,$email,$sexo,$foto_default,$fecha,$nombre,$apellido);
	 $ready->execute();

	if($ready){
		
			header("location:https://videosegg.com/login.php");

	}


	}else{

		echo "<i>Las contraseñas no coinciden</i>";
	}
	if($result->num_rows>0){

		echo "Este usuario ya esta en uso";
	}

}




?>
</html>
