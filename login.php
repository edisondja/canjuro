<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Porn Egg inicio de session</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="css/alertify.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/funcion.js"></script>
	<link rel="icon" href="assets/favicon.ico">
	<meta charset="utf-8">
</head>
<body>
<div class="container-fluid">
	<div class="row" style="height:120px; background:#0D0D0D;">
			<div class="col-md-3"  >
				<a href="index.php"><img src="assets/logo.png"  style="height:40px;width: 250px; margin-top:5.5%;"></a>	
			</div>	
			<div class="col-md-4">
				                                     
				

			</div>
	</div>	
	
	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-5"><br>
		<br><br><br>
		<h3>Registro Exitoso</h3>
		<h4>Ya puedes Iniciar</h4>
		<form method="post" action="" enctype="multipart/form-data">
			<input type="text" name="usuario" class="form-control" placeholder="usuario"><br>
			<input type="password" name="clave" class="form-control" placeholder="contraseña"><br>
			<button class="btn btn-primary" name="action" value="login">Login</button>

		
		</form>
      </div>
      	<div class="col-md-3"><br><br><br>
						
		</div>

	</div>
	

<?php
	header("location:index.php");
	
	
	if(isset($_POST['action'])=="logiar"){
			include'logic.php';
			include'contar_visitas.php';

			echo "entro";
		    if(isset($_POST['usuario']) && isset($_POST['clave'])){

											
				Video::Login($_POST['usuario'],$_POST['clave']);
									

			}





	}
		







?>




</div>
</body>
</html>