<?php
session_start();
	include'logic.php';
	//include'contar_visitas.php';

    if(isset($_POST['password']) && isset($_POST['password'])){

									
		Video::Login($_POST['usuario'],$_POST['password']);

	}
     header("Content-Language: en-US");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php
	if(!isset($categoria)){
		Video::load_title();
	}else{

		echo"<title>The best categories porn from ".NAME_SITE."</title>";
	}

?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<link rel="icon" href="<?php echo FAVICON;?>" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="rating" content="RTA-5042-1996-1400-1577-RTA" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<meta http-equiv="Content-Language" content="en-US"/>
<meta name="Distribution" content="global"/>
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

</style>

<?php
//Revisando sitios no permitido 
//	Video::block_site();
	
if(!isset($profile)){	

	if(!isset($_GET['search']) && !isset($_GET['categoria']) && !isset($_GET['page'])){

		echo "<link rel='canonical' href='$dominio' />";
	
	}else if(isset($_GET['search'])){

		if(!isset($_GET['page'])){
		
			echo "<link rel='canonical' href='$dominio/index.php?search=$_GET[search]'>";
	    
	    }else{

	    	echo "<link rel='canonical' href='$dominio/index.php?search=$_GET[search]&page=$_GET[page]'>";

	    }


	}else if(isset($_GET['categoria']) && !isset($_GET['search']) &&!isset($_GET['page'])){

		echo "<link rel='canonical' href='$dominio/index.php?categoria=$_GET[categoria]'>";

	}else if(isset($_GET['categoria']) && isset($_GET['page'])){


		echo "<link rel='canonical' href='$dominio/index.php?categoria=$_GET[categoria]&page=$_GET[page]'>";

	}

}else{
		 $ruta_actual = $_SERVER["REQUEST_URI"];

		echo "<link rel='canonical' href='$dominio$ruta_actual' />";

}
	
?>

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
		<meta property='og:image' content='$dominio/$data_imagen'>
		<meta property='og:title' content='$titulo'>
		<meta property='og:type' content='video.movie'>
		<meta property='og:url' content='$dominio/$ruta_actual'>
		<meta property='og:duration' content='$duration'>
		<meta property='og:video:width' content='510'>
		<meta property='og:video:height' content='400'>
		";

	}else if(isset($profile)){

			if(isset($_GET['id'])){

					$data_r =	Video::load_user_info($_GET['id']);
			        $name_site = NAME_SITE;
					$ruta_actual = $_SERVER["REQUEST_URI"];
					echo "<meta property='og:title' content='Perfil de $data_r->usuario $name_site'>";
					echo "<title>Perfil de $data_r->usuario".NAME_SITE."</title>";
			}

		echo "<meta property='og:image' content='$dominio/$data_r->foto_url'>";


	}else if(isset($categoria)){

				echo "<meta property='og:title' content='".DESCRIPTION_SLOGAN."'>";

				
	}else{
			echo "<meta property='og:image' content='".LOGOSITE."'>";


	}



?>



<meta name="keywords" content="ukthots, ukthots.com Porn FREE baddies, sex tape exposed, from reddit xxx community" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style2020.min.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->

  
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
-->
<style type="text/css">
		.menu_pc{
		
		}
		.menu_movil{

		}
		.cajatext{
		}
		@media only screen and (min-width: 1024px){
			.cajatext{
				height: 80px;
			}
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
			.cajatext{
				height: 60px;
			}
		}


</style>


</head>
  <body style="background:#12122b">

  	<?php include('component_head_movil.php');  ?>
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
          <a class="navbar-brand" href="index.php"><h1><img src="<?php echo LOGOSITE;?>" alt="" /></h1></a>
                </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right" action="index.php">
					<input type="text" class="form-control" placeholder="Search..." name="search">
					<?php  Video::read_country(); ?>
					<input type="submit" value=" ">
				</form>

			
			<div class="header-top-right">

			
				<div class="file">
					<a href="categorias.php">Categ</a>

				</div>	

				<div class="signin">
					<?php
						if(isset($_SESSION['id_user'])){

								echo "<a href='$dominio/dashboard.php'>Perfil</a>";

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
												//include'components/component_registrer.php';

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
										<h3>Help</h3> 
											<div class="help-grid">
												<p>Regards,
 										dear user, for any claim related to the subject mentioned here below contact us at our email </p>
											</div>
											<div class="help-grids">
												<div class="help-button-bottom">
													<p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Copyright infringement</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Damage to third parties</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Child Pornography</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Identity theft</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Zoophilia</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">CLONED CONTENT</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Unpleasant content</a></p>
												</div>
												
											</div>
									</div>
									<div id="small-dialog6" class="mfp-hide">
										<div class="video-information-text">
											<h4><?php echo NAME_SITE;  ?></h4>
											<p><?php echo DESCRIPTION_SITE;?></p>
										</div>
									</div>


							<!-- ADS -->
				</div>
				<div class="signin">
					<?php
					   
						if(!isset($_SESSION['usuario'])){

							echo '<a href="#small-dialog" id="iniciar" class="play-icon popup-with-zoom-anim">Iniciar</a>';

						}
					?>
					<div id="small-dialog" class="mfp-hide"  style="background:black; opacity: 0.9; color:#FF1196;">
						<h3>Login</h3>

						<div class="social-sits">
							
							<div class="button-bottom">
								<p>New account? <a href="#small-dialog2" id='crear_cuenta' class="play-icon popup-with-zoom-anim">Signup</a></p>
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
								<li><a href="" class="facebook"> </a></li>
								<li><a href="" class="facebook twitter"> </a></li>
								<li><a href="" class="facebook chrome"> </a></li>
								<li><a href="" class="facebook dribbble"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p><?php echo COPYRIGHT_DESCRIPTION;?></p>
							<p><?php echo MAIL_SITE;  ?></p>
						</div>
					</div>
				</div>
        </div>
     </div>
