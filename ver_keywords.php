<!DOCTYPE html>
<html>
<head>
	<title>Ver Keyworks</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Palabras clave</title>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body class="container-fluid">
<div class="row">
	<div class="col-md-12">
				<h2>Palabras Claves no encontrada</h2>
	</div>
</div> 
	<div class="row">
		<div class="col-md-12" style="overflow-y:scroll; height: 400px;">
		<table class="table" >
	
					<tr>
						<td>Palabre Clave</td>
						<td>Fecha Busqueda</td>
					</tr>
					
				<?php
					include'logic.php';

					if(!isset($_GET['page']) || isset($_GET['page'])<=1 ){
						$Keyworks = Video::readpage_key_word();
					
					}else if(isset($_GET['page'])>1){

							$Keyworks = Video::readpage_key_word($_GET['page']);


					}

						//print_r($Keyworks);

						foreach ($Keyworks as $key) {
							
							echo "<tr>
									<td>$key[busqueda]</td>
									<td>$key[fecha_busqueda]</td>
								  </tr>";

						}

				?>

		</table>

		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="?page=1"><button class="btn btn-dark">Atras</button></a>
			<a href="?page=2&nex=true"><button class="btn btn-success">Suguiente</button></a>
		</div>
	</div>
</body>
</html>