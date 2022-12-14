<?php
	
	$profile =true;
	require('components/component_head.php');

?>
<?php


    if(isset($_POST['password']) && isset($_POST['password'])){

									
		Video::Login($_POST['usuario'],$_POST['password']);
							

	}

	if(isset($_GET['id'])){
			$data_r =	Video::load_user_info($_GET['id']);
			 $ruta_actual = $_SERVER["REQUEST_URI"];
	}


?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
								<h3></h3>
							</div>
								
		<div class="heading-right">
			<?php
				if(isset($_GET['id'])){

					echo "<img  src='$data_r->foto_url' style='height:80px;; width:80px; ' class='img-circle img-responsive'>";


				}

			?>

								<a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Follow+</a>
							</div>

							<div class="clearfix"> </div>
						</div>
									
						<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3><?php echo $data_r->usuario; ?></h3>
								<div class="song-grid-right">
						<div class="share">
							<h5></h5>
							<ul>
								<li><a href="whatsapp://send?text=<?php echo $dominio."".$ruta_actual; ?>" data-action='share/whatsapp/share' class='icon whatsapp-icon'>Share</a></li>
								 
							</ul>
							
							<hr>
						</div>
					</div>
					
						</div>
							<!--
							<div style="text-align:center;">
							<iframe width="300" height="100" frameborder="0" scrolling="no" src="//tsyndicate.com/iframes2/9c3aa6ec89c547d293bc1b8afddacce6.html?categories={categories}&subid={subid}"></iframe></div>
						-->
					 <?php
					 if(isset($_GET['id'])){
					 		
					 		$id_user = $_GET['id'];

					 		Video::load_video_user($id_user);


					 	}else{

					 		echo "<h3>This User no have videos<h3>";
					 	}
					 ?>

					 <!--
					 <div style="text-align:center">
					 <iframe width="300" height="100" frameborder="0" scrolling="no" src="//tsyndicate.com/iframes2/9c3aa6ec89c547d293bc1b8afddacce6.html?categories={categories}&subid={subid}"></iframe>
					-->
					</div>
							</div>
						<div class="clearfix"> </div>
					</div>
					</div>
				
				<!-- footer -->
				<?php
					require('components/component_footer.php');
                ?>

                <!--
                	<script type="application/javascript" src="https://a.exosrv.com/video-slider.js"></script>
					<script type="application/javascript">
					var adConfig = {
					    "idzone": 3788749,
					    "frequency_period": 360,
					    "close_after": 0,
					    "sound_enabled": 0,
					    "on_complete": "repeat",
					    "branding_enabled": 1
					};
					ExoVideoSlider.init(adConfig);
					</script>
					<script type="application/javascript" data-idzone="3788763" data-ad_frequency_period="720" data-ad_frequency_count="1" data-browser_settings="1" data-ad_trigger_method="3" src="https://a.exosrv.com/fp-interstitial.js"></script>
				-->
  </body>
  <?php

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
		//session_start();

				Video::Login($usuario,$clave);
					header("location:dashb");
		//session_destroy();

		//echo "registrado con exito <a href='login.php'>Inicie Session por aqui!</a>";

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