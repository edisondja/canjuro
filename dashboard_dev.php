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
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
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
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/realpanel2019csx.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="js/jquery-3.1.1.min.js"></script>

</head>
<body>
		<?php 
		   include'logic.php';
		   $usuario  = Video::load_user_info($_SESSION['id_user']);


		?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="background:#3c3539;">
				 <div class="dropdown" style="float: right;">
				  <button class="btn btn-secondary dropdown-toggle" style="background:#43474b" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				     <strong style="padding:5px; color: white;"><?php echo $usuario->usuario." ";Video::picture_profile(); ?></strong>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="<?php echo 'https://videosegg.com/profile.php?id='.$_SESSION[id_user]; ?>">Ver mi perfil</a>
				    <a class="dropdown-item" href="https://videosegg.com">Muro</a>
				    <a class="dropdown-item" href="https://videosegg.com/cerrar_session.php">Cerrar Sesion</a>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"><hr>
		<i style="font-size: 22px;">Herramientas de ejecucion</i><hr>
		<ul class="nav flex-column">
		  <li class="nav-item" onclick="location.href='https://videosegg.com/dashboard.php'">
		  	 Subir video <svg class="bi bi-cloud-upload" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path d="M4.887 6.2l-.964-.165A2.5 2.5 0 103.5 11H6v1H3.5a3.5 3.5 0 11.59-6.95 5.002 5.002 0 119.804 1.98A2.501 2.501 0 0113.5 12H10v-1h3.5a1.5 1.5 0 00.237-2.981L12.7 7.854l.216-1.028a4 4 0 10-7.843-1.587l-.185.96z"/>
			  <path fill-rule="evenodd" d="M5 8.854a.5.5 0 00.707 0L8 6.56l2.293 2.293A.5.5 0 1011 8.146L8.354 5.5a.5.5 0 00-.708 0L5 8.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
			  <path fill-rule="evenodd" d="M8 6a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 6z" clip-rule="evenodd"/>
			 </svg>
		  </li>
		  <li class="nav-item" id="editar_perfil">
		   		Editar perfil <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
				</svg>
		  </li>
		  <li class="nav-item" id="video">
		    Editar video <svg class="bi bi-collection-play-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M1.5 14.5A1.5 1.5 0 010 13V6a1.5 1.5 0 011.5-1.5h13A1.5 1.5 0 0116 6v7a1.5 1.5 0 01-1.5 1.5h-13zm5.265-7.924A.5.5 0 006 7v5a.5.5 0 00.765.424l4-2.5a.5.5 0 000-.848l-4-2.5zM2 3a.5.5 0 00.5.5h11a.5.5 0 000-1h-11A.5.5 0 002 3zm2-2a.5.5 0 00.5.5h7a.5.5 0 000-1h-7A.5.5 0 004 1z" clip-rule="evenodd"/>
			</svg>
		  </li>
		  <li class="nav-item">
		  	Tableros <svg class="bi bi-layout-text-window" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
			  <path fill-rule="evenodd" d="M11 15V4h1v11h-1zm4.5-11H.5V3h15v1zM3 6.5a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm0 3a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5zm0 3a.5.5 0 01.5-.5h5a.5.5 0 010 1h-5a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
			</svg>
		    
		  </li>

		  <li class="nav-item">
		  	Mensajes <svg class="bi bi-chat-square-dots" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v8a1 1 0 001 1h2.5a2 2 0 011.6.8L8 14.333 9.9 11.8a2 2 0 011.6-.8H14a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v8a2 2 0 002 2h2.5a1 1 0 01.8.4l1.9 2.533a1 1 0 001.6 0l1.9-2.533a1 1 0 01.8-.4H14a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
			  <path d="M5 6a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z"/>
			</svg>
		    
		  </li>

		  <li>
		  	Estadisticas
		  	<svg class="bi bi-bar-chart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <rect width="4" height="5" x="1" y="10" rx="1"/>
			  <rect width="4" height="9" x="6" y="6" rx="1"/>
			  <rect width="4" height="14" x="11" y="1" rx="1"/>
			</svg>

		  </li>
		  <li>
		  	Borradores
		  	<svg class="bi bi-gem" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M3.1.7a.5.5 0 01.4-.2h9a.5.5 0 01.4.2l2.976 3.974c.149.185.156.45.01.644L8.4 15.3a.5.5 0 01-.8 0L.1 5.3a.5.5 0 010-.6l3-4zm11.386 3.785l-1.806-2.41-.776 2.413 2.582-.003zm-3.633.004l.961-2.989H4.186l.963 2.995 5.704-.006zM5.47 5.495l5.062-.005L8 13.366 5.47 5.495zm-1.371-.999l-.78-2.422-1.818 2.425 2.598-.003zM1.499 5.5l2.92-.003 2.193 6.82L1.5 5.5zm7.889 6.817l2.194-6.828 2.929-.003-5.123 6.831z" clip-rule="evenodd"/>
			</svg>

		  </li>

		
		</ul>
	   </div>
	   		<div class="col-md-5" id="dataMain"><br>
			    <?php 

					require('components/component_form_upload.php');

				?>
			</div>
			<div class="col-md-3" id="mis_videos"><br>
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
</body>
</html>


<style type="text/css">


ul,li{
	font-size: 22px;
	cursor: pointer;
	padding: 10px;

}

li:hover{
	background:#fbf6f9;
	z-index:5;
}

.container-main{
	width:500px;
	margin:40px auto;
	padding:20px;
	background:white;
	border-radius: 5px;
}
</style>