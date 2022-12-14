<!DOCTYPE html>
<html>
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112944763-1"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112944763-1');
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
	session_start();
if( !isset($_SESSION['id_user']) ){

		header("location:login.php");		
}else{

	echo "<input type='hidden' id='id_user'  value='$_SESSION[id_user]'/>";

}




?>

	<title>Registrar porng</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/soundmanager2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<link rel="icon" href="assets/favicon.ico">
	<script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
	<script type="text/javascript" src="js/notificaciones2019s.js"></script>
	<Script src="js/jquery_core.js" ></script>
	<script src="js/jquery_form.js"></script> 
	<script src="js/up_asyn_4.js"></script>
	<script src="js/realpanel2019csx.js"></script>
	<meta charset="utf-8">

	
	

</head>
<body >
<div class="container-fluid">

	<div class="row">
			
			<div class="col-md-12" style="height:100px; background:#0D0D0D;" >
				<a href="https://videosegg.com"><img src="assets/logo.png"  style="height:40px;width: 250px; margin-top:2.5%;"></a>
			</div>
	</div>	
	<div class="row">
		<div class="col-md-12" id="notificaciones"></div>
		
	</div>

	<div class="row">
		<div class="col-md-3"><br>
			<div class="panel panel-default">
					<div class="panel-heading" id="foto_perfil">
						<?php
							include'logic.php';
							Video::picture_profile();
						?>
					</div>

				<div class="panel-body">
						<div class="nav navbar">
				<ul class="nav navbar">
					<li id="noti" style="cursor: pointer;"><p style="color:black;" id="notif_text"><img src="assets/star.png" style="height:25px; width:25px;">Notificaciones</p></li>

					<li><a href="cerrar_session.php"><img src="assets/key.png" style="height:25px; width:25px;">Closed Session</a></li>
					<li><a id="video"><img src="assets/porn.jpg" style="height:25px; width:25px;"><strong>Edit video</strong></a></li>
					<li id="Upload_video_s"><a><img src="assets/upload.svg" style="height:25px; width:25px;> href="#">Upload Video</a></li>
					<li><a><img src="assets/wait.png" style="height:25px; width:25px;"> Videos pending</a></li>
					<li><a href="index.php"><img src="assets/home.png"  style="height:25px; width:25px;"> Home</a></li>
					<li id="editar_perfil"><a><img src="assets/man-user.png" style="height:25px; width:25px;> href="#">Editar perfil</a></li>
					<li id="favoritos"><a><img src="assets/star.png" style="height:25px; width:25px;> href="#">Favorit</a></li>
				</ul>
			</div>


				</div>
			</div>
		</div>
		<div class="col-md-5" id="dataMain"><br>
	
				<?php 

					require('components/component_form_upload.php');

				?>
				<style>
				  vaadin-rich-text-editor.height-constraints {
				    min-height: 400px;
				    max-height: 600px;
				  }
				</style>
				<vaadin-rich-text-editor class="height-constraints"></vaadin-rich-text-editor>
		</div>
		<br>
		<div class="col-md-3" id="mis_videos">
			<div class="panel panel-default">
				<div class="panel-heading">Planes</div>	
				<div class="panel-body">
							<button class="btn btn-primary">Upgrade Regular 2$ Now</button>
							<button class="btn btn-success" style="margin-top: 3%;">Upgrade Primium 5$ Now</button>
							<button class="btn btn-success" style="margin-top: 3%; background:#FF3399; border:none;">Upgrade Primium Ultra 10$ Now</button>
				</div>


			</div>
		</div>


	</div>



		
	</div>






</div>
<?php

	

	if( isset($_POST['titulo'])!="" )
	{
		require('guardar_video.php');

	}




?>



</style>
<style type="text/css">
	body{
	background:#ecf0f1;
}

.container-main{
	width:500px;
	margin:40px auto;
	padding:20px;
	background:white;
	border-radius: 5px;
}
</style>
</body>
</html>