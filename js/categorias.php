<?php
	include'../conexion.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Videosegg.com</title>

<script type="text/javascript"> var bannerOpts = { activationCode: 'api', targetBanner: '_blank' } </script>


<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
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
				<form class="navbar-form navbar-right" method="get" action="index.php">
					<input type="text" class="form-control" name="buscar" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>  
			<div class="header-top-right">
				<div class="file">
					<a  href="categorias.php">Categ...</a>
				</div>	
				<div class="signin">
				<a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Registrate</a>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->
									<div id="small-dialog2" style="background:black; opacity:0.9;"  class="mfp-hide">
										<h3>Crea tu cuenta Gratis</h3> 
										<div class="social-sits">
											<div class="">
												<a href="#"></a>
											</div>
											<div class="">
												<a href="#"></a>
											</div>
											<div class="button-bottom">
												<p>Ya tienes tu cuenta? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Accede</a></p>
											</div>
										</div>
										<div class="Resgistrate">
								<form method="post" action="../registrer.php">
				<input type="text" name="usuario" placeholder="Usuario" class="form-control"><br>
				<input type="password" name="clave" placeholder="Contraseña" class="form-control"><br>
				<input type="password" name="clave2" placeholder="Repita su contraseña" class="form-control"><br>
				<input type="text" name="email" placeholder="Correo electronico" class="form-control"><br>
		<strong style="font-size:18px; color:#CD1EB5;">Selecione su sexo</strong><br>
				<strong style="font-size:14px; color:red;">Masculino</strong>
				<input type="radio" name="sexo" checked="true" value="Masculino">
				<strong style="font-size:14px; color:red;">Femenino</strong>
				<input type="radio" name="sexo" value="Femenina">
					<strong style="font-size:14px; color:red;">Gay</strong>
				<input type="radio" name="sexo" value="Gay"><br><br>
				<button style="background:#CD1EB5;" class="btn btn-success" name="registrar">Registrar</button>
			</form>
											<div class="continue-button">
												
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog3" class="mfp-hide">
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
											<form>
												<input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" />
												<input type="submit"  value="Sign Up"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog7" class="mfp-hide">
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
											<form action="upload.html">
												<input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input type="submit"  value="Sign In"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div id="small-dialog8" class="mfp-hide">
										<h3>Subscribe to our newsletters</h3> 
										<div class="signup subscribe-grid">
											<form>
												<input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="submit"  value="Subscribe"/>
											</form>
										</div>
									</div>
									<div id="small-dialog4" class="mfp-hide">
										<h3>Feedback</h3> 
										<div class="feedback-grids">
											<div class="feedback-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="button-bottom">
												<p><a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign in</a> to get started.</p>
											</div>
										</div>
									</div>
									<div id="small-dialog5" class="mfp-hide">
										<h3>Help</h3> 
											<div class="help-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="help-grids">
												<div class="help-button-bottom">
													<p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Feedback</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Lorem ipsum dolor sit amet</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Nunc vitae rutrum enim</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris at volutpat leo</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris vehicula rutrum velit</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Aliquam eget ante non orci fac</a></p>
												</div>
											</div>
									</div>
									<div id="small-dialog6" class="mfp-hide">
										<div class="video-information-text">
											<h4>Video information & settings</h4>
											<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											<ol>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
											</ol>
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
					<a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a>
					<div id="small-dialog" style="background:black; opacity:0.9;" class="mfp-hide">
						<h3>Acceder</h3>
						<div class="social-sits">
							<div class="">
								<a href="#"></a>
							</div>
							<div class="">
								<a href="#"></a>
							</div>
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Registrarse</a></p>
							</div>
						</div>
						<div class="login">
							<form method="post" action="../login.php" enctype="multipart/form-data">
			<input type="text" name="usuario" class="form-control" placeholder="usuario"><br>
			<input type="password" name="clave" class="form-control" placeholder="contraseña"><br>
			<button class="btn btn-primary" name="action" value="logiar">Login</button>

		</div>
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
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
					<li><a href=".html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Camara en Vivo</a></li>
					<li><a href="history.php" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Historial</a></li>
					<li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Categorias<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="index.php?categoria=jovenes">Jovenes</a></li>                                   
							<li><a href="index.php?categoria=Amateur">Amateur</a></li>
							<li><a href="index.php?categoria=Lesbiana">Lesbianas</a></li>
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
		<li><a href="#" class="menu"><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Actrices<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-1">
							<li><a href="index.php">Esperanza Gómez</a></li>                                             
							<li><a href="index.php">Mia Kahlifa</a></li>
							<li><a href="index.php">Alexis Texas</a></li> 
							<li><a href="index.php">Rebeca Linares</a></li>
							<li><a href="index.php">Jayde Jaymes</a></li>                                   
							<li><a href="index.php">Eva Lovia</a></li>
							<li><a href="index.php">Juliana Colombiana</a></li>
							<li><a href="index.php">Remy LaCroix</a></li>                                             
							<li><a href="index.php">Francesca Jaimes</a></li>
							<li><a href="index.php">Sofia Nix</a></li> 
							<li><a href="index.php">Lisa Ann</a></li>                                             
							<li><a href="index.php">Jillian Janson</a></li>
							<li><a href="index.php">Verónica Rodriguez</a></li> 
							<li><a href="index.php">Keischa Grey</a></li>                                             
							<li><a href="index.php">Ryan Conner</a></li>
							<li><a href="index.php">Karina Colombiana</a></li> 
							<li><a href="index.php">A.j. Applete</a></li>                                             
							<li><a href="index.php">Kendra Lust</a></li>
							<li><a href="index.php">Carolina Abril</a></li> 
							<li><a href="index.php">Piper Perri</a></li>                                             
							<li><a href="index.php">Abella Danger</a></li>
							<li><a href="index.php">Jada Steves</a></li> 
							<li><a href="index.php">Paola Shumager</a></li>                                             
							<li><a href="index.php">Riley Reid</a></li>
							<li><a href="index.php">Valentina Nappi</a></li> 
							<li><a href="index.php">Amarna Miller</a></li>                                             
							<li><a href="index.php">Nekane</a></li>
							<li><a href="index.php">Kelsi Monroe</a></li>  
							<li><a href="index.php">Jynx Maze</a></li> 
							<li><a href="index.php">Marina Visconti</a></li>                                             
							<li><a href="index.php">Jessie Rogers</a></li>
							<li><a href="index.php">Natalie</a></li> 
							<li><a href="index.php">Sasha Grey</a></li>                                             
							<li><a href="index.php">Noelle Easton</a></li>
							<li><a href="index.php">Abella Anderson</a></li>  
							<li><a href="index.php">Adriana Chechik</a></li> 
							<li><a href="index.php">Katrina Jade</a></li>                                             
							<li><a href="index.php">Jasmie James</a></li>
							<li><a href="index.php">Kagney Linn Karter</a></li> 
							<li><a href="index.php">Carol Ferrel</a></li>                                             
							<li><a href="index.php">Natasha</a></li>
							<li><a href="index.php">Mandy Muse</a></li>
							<li><a href="index.php">Sara Jay</a></li>
							
							<li><a href="index.php">Carmen de Luz</a></li>
							<li><a href="index.php">Rose Monroe</a></li>
							<li><a href="index.php">Peta Jensen</a></li>  
							<li><a href="index.php">Sara Luv</a></li>
							<li><a href="index.php">Aidra Fox</a></li>
							<li><a href="index.php">Chiquita Lopez</a></li>  
							<li><a href="index.php">Isabella de Santos</a></li>
							<li><a href="index.php">Luchy</a></li>
							<li><a href="index.php">Dani Daniels</a></li>  
							<li><a href="index.php">Ava Addams</a></li>
							<li><a href="index.php">Mia Malkova</a></li>
							<li><a href="index.php">Lorena Garcia</a></li>  
							<li><a href="index.php">Gianna Michaels</a></li>
							<li><a href="index.php">Valerie Kay</a></li>
							<li><a href="index.php">Angela White</a></li>  
							<li><a href="index.php">Alexis Rodriguez</a></li>
							<li><a href="index.php">Julia Ann</a></li>
							<li><a href="index.php">Brandi Love</a></li>  
							<li><a href="index.php">Emma</a></li>
							<li><a href="index.php">Aletta Ocean</a></li>
							<li><a href="index.php">Allison Miller</a></li>  
							<li><a href="index.php">Dillion Harper</a></li>
							<li><a href="index.php">Melaine Rios</a></li>
							<li><a href="index.php">Carol Miranda</a></li>  

							<li><a href="index.php">Phoeniz Marie</a></li>
							<li><a href="index.php">Shae Summers</a></li>  
							<li><a href="index.php">Foxy Di</a></li>
							<li><a href="index.php">Maria Riot</a></li>
							<li><a href="index.php">Dakota Skype</a></li>  
							<li><a href="index.php">Pinky</a></li>
							<li><a href="index.php">Misha Cross</a></li>
							<li><a href="index.php">Kayden Kross</a></li>  
							<li><a href="index.php">Anikka Albrite</a></li>
							<li><a href="index.php">Lupe Fuentes</a></li>
							<li><a href="index.php">Malena Morgan</a></li>  
							<li><a href="index.php">Amirah Adara</a></li>
							<li><a href="index.php">Monique Fuentes</a></li>
							<li><a href="index.php">Ariela Ferrera</a></li>  
							<li><a href="index.php">Anita Toro</a></li>
							<li><a href="index.php">Naomi Russell</a></li>
							<li><a href="index.php">Little Caprice</a></li>  
							<li><a href="index.php">Julia Roca</a></li>
							<li><a href="index.php">Blondie Fesser</a></li>
							<li><a href="index.php">Alexa Tomas</a></li>
							<li><a href="index.php">Gigi Rivera</a></li>  
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					
					<li><a href="news.php" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Mis Videos</a></li>
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
								
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright © 2018 VideosEgg. All Rights Reserved</p>
						</div>
					</div>
				</div>
       			 </div><br>
       			 	<div style="text-align:center;">
												
							<script id="mp_spot_1761841" type="text/javascript">
   							 mp_ads_spot_id=1761841;
    						mp_ads_width=360;
   							 mp_ads_height=60;
						</script>
						<script src="http://static.trafficjunky.com/js/marketplace.min.js"></script>

  				</div>
					<div class="clearfix"> </div>
				</div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-10 show-grid-left main-grids">
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3>Categorias</h3>
								</div>
								<div class="heading-right">
									
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=jovenes"><img src="images/categorias/adolescentes.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=jovenes" class="title">Jovenes</a></h5>
									
									<p class="views">
										<?php
								$sql = "select * from post where categoria like '%jovenes%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
							
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=sado"><img src="images/categorias/sado.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=sado" class="title">Sado</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%sado%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=amateur"><img src="images/categorias/amateur.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=amateur" class="title">Amateur</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%Amateur%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>

							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=alemanas"><img src="images/categorias/alemanas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=alemanas" class="title">Alemanas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%Alemanas%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>

							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=Sexo_anal"><img src="images/categorias/anal.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=Sexo_anal" class="title">Anal</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%Sexo anal%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=arabes"><img src="images/categorias/arabe.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=arabes" class="title">Arabes</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%Arabes%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=lesbiana"><img src="images/categorias/lesbianas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=lesbiana" class="title">Lesbianas</a></h5>
									
									<p class="views">
										<?php
												$sql = "select * from post where categoria like '%lesbiana%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=rubias"><img src="images/categorias/rubias.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=rubias" class="title">Rubias</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%rubias%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=orgias"><img src="images/categorias/orgias.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=orgias" class="title">orgias</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%orgias%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>

								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=doble_penetracion"><img src="images/categorias/doble_penetracion.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=doble_penetracion" class="title">Doble Penetracion</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%doble_Penetracion%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>

								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=mamadas"><img src="images/categorias/mamadas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=mamadas" class="title">Mamadas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%Mamadas%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>

								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=hentai"><img src="images/categorias/hentai.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=hentai" class="title">Hentai</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%hentai%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>

								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=mature"><img src="images/categorias/mature.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=mature" class="title">Mature</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%mature%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=masages"><img src="images/categorias/masage.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=masages" class="title">Masages</a></h5>
									
									<p class="views">
										<?php
												$sql = "select * from post where categoria like '%masages%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=culos"><img src="images/categorias/culos.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=culos" class="title">Culos</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%culos%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=pelirrojas"><img src="images/categorias/pelirrojas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=pelirrojas" class="title">Pelirrojas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%pelirrojas%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=milf"><img src="images/categorias/milf.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=milf" class="title">MILF</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%milf%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=creampie"><img src="images/categorias/creampie.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=creampie" class="title">Creampie</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%creampie%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=gay"><img src="images/categorias/gays.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=gay" class="title">Gays</a></h5>
									
									<p class="views">
										<?php
											$sql = "select * from post where categoria like '%gay%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=shemale"><img src="images/categorias/shemale.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=shemale" class="title">Shemale</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%shemale%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=pov"><img src="images/categorias/pov.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=pov" class="title">POV</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%POV%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=trios"><img src="images/categorias/trios.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=trios" class="title">Trios</a></h5>
									
									<p class="views">
										<?php
												$sql = "select * from post where categoria like '%trios%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=latina"><img src="images/categorias/latinas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=latina" class="title">Latinas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%latina%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=hardcore"><img src="images/categorias/hardcore.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=hardcore" class="title">Hardcore</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%hardcore%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
								<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=gordas"><img src="images/categorias/gordas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=gordas" class="title">Gordas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%gordas%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=interracial"><img src="images/categorias/interracial.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=interracial" class="title">Interracial</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%interracial%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=tetonas"><img src="images/categorias/tetonas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=tetonas" class="title">Tetonas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%tetonas%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=facial"><img src="images/categorias/facial.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=facial" class="title">Facial</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%facial%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=asiaticas"><img src="images/categorias/asiaticas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=asiaticas" class="title">Asiaticas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%asiaticas%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=africana"><img src="images/categorias/africanas.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=africana" class="title">Africanas</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%africana%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=negra"><img src="images/categorias/negras.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=negra" class="title">Negras</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%negra%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=uniformes"><img src="images/categorias/uniformes.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
					<h5><a href="index.php?categoria=uniformes" class="title">Uniformes</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%uniformes%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=parodia"><img src="images/categorias/parodia.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=parodia" class="title">Parodia</a></h5>
									
									<p class="views">
										<?php
												$sql = "select * from post where categoria like '%parodia%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?>
									</p>
									
								</div>
							</div>
							<div class="col-md-2 resent-grid recommended-grid show-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="index.php?categoria=cartoon"><img src="images/categorias/cartoon.jpg" alt="" /></a>
									<div class="time small-time show-time">
										
									</div>
									<div class="clck show-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info">
									<h5><a href="index.php?categoria=cartoon" class="title">Cartoon</a></h5>
									
									<p class="views">
									<?php
												$sql = "select * from post where categoria like '%cartoon%'";
												$proceso = $conexion->query($sql);
												echo $proceso->num_rows;
										?> 
									</p>
									
								</div>
							</div>


							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="recommended">
						<div class="recommended-grids">
							<div class="recommended-info">
								<div class="heading">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				 
				<div style="text-align:center;">
												
						<script id="mp_spot_1768271" type="text/javascript">
						    mp_ads_spot_id=1768271;
						    mp_ads_width=300;
						    mp_ads_height=250;
						</script>
						<script src="http://static.trafficjunky.com/js/marketplace.min.js"></script>

  				</div>
  				
				<div class="clearfix"> </div>
						</div>
			<div class="clearfix"> </div>
		</div>


			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								
								<li><a href="copyright.html">Copyright</a></li>
								
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
								<li><a href="terms.html">Terms</a></li>
								<li><a href="privacy.html">Privacy</a></li>
							
								<li><a href="privacy.html">Policy & Safety </a></li>
								
							</ul>
						</div>
					</div>
					<div class="footer-bottom">
					
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
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>