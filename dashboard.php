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
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

	<script src="js/soundmanager2.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
	<script src="js/alertify.js"></script>
	<script src="js/alertify.min.js"></script>
	<link rel="icon" href="<?php echo FAVICON;?>">
	<script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/realpanel2020cs.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/notificaciones2019s.js"></script>
	<script src="js/jquery_form.js"></script> 
	<script src="js/up_asyn_5.js"></script>
	<script src="js/tablero_functions.js"></script>
	<!--<script src="js/fomulario_functions.js"></script>-->
	<script type="text/javascript">
 	var emoticones = "▷◁→⇨✓®© ✔✆➕✅☝✌️👌🙌✍⭐✨😂🔥❤️⌛⌚⛔⚽💅⚠️⚡🚀✓®©▷◁✆→⇨【】⊛🥇🙂✅😊😘😍⚠📵😈🚀🔥";
 	var link = "";
 	var nombre_link="";
 	var menu_select ="";
   		function emoticon_add(emoticon){

   			$('#descripcion').val($('#descripcion').val()+emoticon);
   			console.log("emoticon agregado");

   		}

   		function agregar_enlace(){

   				alertify.prompt( 'Ingrese la ruta de enlace','para luego vicularlo a un link', 's'
               , function(evt, value) { 

               	 	link = value;
               	 	nombre_link = prompt("Ingrese el nombre del link");

               	 	$('#descripcion').val($('#descripcion').val()+`<a href=${link}>${nombre_link}</a>`);

           		}
               , function() { alertify.error('Cancel') });



   		}


   	

 	$('document').ready(()=>{

		

      	var cantidad_e  = emoticones.length;

      	for(i=0;i<cantidad_e;i++){

      			if(i==0){
      				$('#emoticones').append(`<span class="glyphicon glyphicon-remove" id="cerrar" 
      					style="font-size: 30px; color:red"></span>
      					`);
      			}
      		   $('#emoticones').append(`<p onclick="emoticon_add('${emoticones[i]}')">${emoticones[i]}</p>`);


      	}

      	$('#imagen_dis').click(function(){

      			$('#emoticones').css('display','inline-flex');
      			menu_select = 'emoticones';

      	})

      	$('#cerrar').click(function(){

      		$('#emoticones').css('display','none');
      			
      	});

		$('#subir_video_reddit').click(function(){
			
			let id_user = $('#id_user').val();

			$('#dataMain').html(`
				<hr/>
				<img src='https://viddit.red/img/vidditred-logo-large.png' width='80' style='margin-left:35%'>
					<form method="post" action="reddit_upload.php" enctype='multipart/form-data'></br>
						<h3>Subir video de url de reddit</h3>
						<input type='hidden' name='id_user' value='${id_user}'/>
						<input type='text' class='form-control' name='url_reddit' placeholder='Url de video en Reddit'/><br/>
						<input type='text' class='form-control' name='titulo_reddit' placeholder='Titulo de video'/><br/>
						<textarea placeholder='Descripcion de video' name='descripcion_reddit' class="form-control"></textarea></br>
						
						<input type="checkbox"  value="Thotiana" name="categoria[]"><strong>Thotiana</strong>
						<input type="checkbox"  value="Instagram baddie" name="categoria[]"><strong>Instagram baddie</strong>
						<input type="checkbox"  value="Onlyfans" name="categoria[]"><strong>Onlyfans</strong><br>
						<input type="checkbox"  value="Petite" name="categoria[]"><strong>Petite</strong>
						<input type="checkbox"  value="Anal" name="categoria[]"><strong>Anal</strong>
						<input type="checkbox"  value="Amateur" name="categoria[]"><strong>Amateur</strong>
						<input type="checkbox"  value="Sweet one" name="categoria[]"><strong>Sweet One</strong><br>
						<input type="checkbox"  value="Big tits" name="categoria[]"><strong>big tits</strong>
						<input type="checkbox"  value="deep throatting" name="categoria[]"><strong>deep throatting</strong>
						<input type="checkbox"  value="Leaked" name="categoria[]"><strong>Leaked</strong>
						<input type="checkbox"  value="Deep Throat" name="categoria[]"><strong>deep throat</strong>
						<input type="checkbox"  value="Snowbunny" name="categoria[]"><strong>Snowbunny</strong>
						<input type="checkbox"  value="Reddit" name="categoria[]"><strong>Reddit</strong>
						<input type="checkbox"  value="Big Ass" name="categoria[]"><strong>Big Ass</strong>
						<input type="checkbox"  value="Back Shots" name="categoria[]"><strong>Back Shots</strong>
						<input type="checkbox"  value="Twerking" name="categoria[]"><strong>Twerking</strong>
					
						<hr/>
						Transferir de reddit
						<input type="radio" value="normal" name="config" checked="true"/><br/>
						Transferir de redgif
						<input type="radio" value="redgif" name="config"/><br/>
						Tranferir de videosgg
						<input type="radio" value="videosegg_transfer" name="config"/><br/>
						<button class='btn btn-primary' style='margin-left:40%;'>Transferir a VIDEOSEGG</button>			
					</form>
					<hr/>
					<i>Los videos que son subidos de esta forma, se descargaran automaticamente en los servidores de VIDEOSEGG de forma automatica asi tambien obteniendo la misma vista
					previa que viene en la carga de reddit. <strong>Versión BETA</strong></i>
				`);

		});


      	$(document).keypress(function (e) {
		      if (e.which == 13 || e.width==27) {
		      		if(menu_select=='emoticones'){
		      			alertify.message("Cerrando emoticones");
		      			$('#emoticones').hide('slow');
		      		}else if(menu_select=='digitando'){

		      				$('#descripcion').val($('#descripcion').val()+"<br/>");
		      		}
		      }
	    });

	    $('textarea').click(function(){

	    		menu_select = 'digitando';
	    		$('#emoticones').hide('slow');
	    })

	    $('textarea').keyup(function(e){

	    		let letras = $('#descripcion').val().length;
	    		$('#letras').html("Letras "+letras);
	    });


	    $('#tablero').click(()=>{

	    		let id_usuario = $('#id_user').val();

	    		$('#dataMain').html(`<hr/>
	    			<h2>Creando tablero</h2><hr/><button class='btn btn-dark' style='float:right;' id='mis_tableros'>Mis tableros</button><br/>	
	    			<form method='post' enctype='multipart/form-data' action='gestos_on.php' id='guardar_tablero'>
	    				<strong>Titulo</strong></br>
	    				<input type='hidden' name='id_usuario' value='${id_usuario}'>
	    				<input type='hidden' name='action' value='crear_tablero'>
	    				<input type='text' class='form-control' name='titulo'></br>
	    				<strong>Descripcion</strong><br/>
	    				<textarea name='descripcion' class='form-control'></textarea></br>
	    				<strong>Portada de tablero</strong></br>
						<input type='file' name='imagen'/><hr/>
						<input type='submit' class='btn btn-primary' style='float:right;' value='Guaradar Tablero'/> 					
 					</form>
	    	  	 `);


	    		$('#mis_tableros').click(()=>{
	    						
	 				$.ajax({
	 					url:'gestos_on.php',
	 					type:'post',
	 					data:{
	 					     id_usuario:id_usuario,
	 					     action:'cargar_tableros'		
	 					}			
	 				}).done(data=>{
	 					let datos = JSON.parse(data);
	 					let interfaz =`<strong>Mis tableros</strong><input type='text' id='buscar_tablero' class='form-control' />
						<hr/> <button class='btn btn-dark' style='float:right; margin:5px;' id='back'>Retroceder</button>
	 					<div style='overflow-y:scroll; height:500px;' id='data_tablero'>`;
	 					datos.forEach(data=>{

	 						interfaz+=`<br/><div class='card'>
	 							<strong>${data.titulo}</strong><br/>
	 							<div class='card-body' id='tab${data.id_tablero}'>
	 								 <p>${data.descripcion}</p>
	 								<img  class="rounded" src='${data.imagen_tablero}' class='' style='height:300px;width:250px; style='float:right' />
	 								<button class='btn btn-danger' onclick="eliminar_tablero(${data.id_tablero})">Eliminar</button>
	 								<button class='btn btn-dark' onclick="carga_tablero(${data.id_tablero})">Actualizar</button>
	 								<button class='btn btn-dark'>Ver tablero</button>
	 								<button class='btn btn-warning' onclick="subir_multimedia(${data.id_tablero})">Subir Multimedia</button>
	 							</div>
	 						</div>`;
	 					
	 					});	
	 					interfaz+=`</div>`;
					
	 					$('#dataMain').html(interfaz);

						 agregar_evento_a_boton_retroceder();

	 				});





	    		});
	    		

				
	    });



 	});
 	

 </script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
 <script type="text/javascript">
 	function cargar_graficos(config='cargar_mi_top'){

 		$.ajax({
 			url:'/gestos_on.php',
 			type:'post',
 			data:{
 				action:config,
 				id_user:$('#id_user').val()
 			}

 		}).done(data=>{

		 		let datos  = JSON.parse(data);
		 		console.log(datos);

				$('#dataMain').html(`<h3 style='text-align: center;'>Cantidad de vistas generadas</h3>
				<strong>Filtra tu top por fechas</strong>&nbsp;<button class='btn btn-dark' id='top_10'>Top 10 en general</button>&nbsp; <button class='btn btn-dark' id='categorias'>Categorias mas vistas</button><hr/>
				<input type='date' id='fecha_inicial' class='form-control'>Hasta <input type='date' id='fecha_final' class='form-control' />
				<canvas id="graficos"></canvas>`);
				var ctx = document.getElementById('graficos').getContext('2d');

		 		var myPieChart = new Chart(ctx, {
				    type: 'bar',
				    data:datos
				  
				});

		 		$('#top_10').click(()=>{

		 			cargar_graficos('cargar_top_general');

		 		});

		 		$('#categorias').click(()=>{

		 				cargar_graficos('top_de_categorias');

		 		})

 		});		

 	}


 </script>

</head>
<body>
		<?php 
		   include'logic.php';
		   $usuario  = Video::load_user_info($_SESSION['id_user']);


		?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="background:##ffffff;"><hr/>
				<a href="<?php echo $dominio;?>/controllers"><img src="<?php echo LOGOSITE; ?>" style="height:40px;width: 250px;"></a>
				 <div class="dropdown" style="float: right;">
				  <button class="btn btn-secondary dropdown-toggle" style="background:#e30e0e" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				     <strong style="padding:5px; color: white;"><?php echo $usuario->usuario." ";Video::picture_profile(); ?></strong>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="<?php echo $dominio.'/profile.php?id='.$_SESSION['id_user']; ?>">Ver mi perfil</a>
				    <a class="dropdown-item" href="<?php echo $dominio;?>"><?php echo NAME_SITE;?></a>
				    <a class="dropdown-item" href="<?php echo $dominio;?>/cerrar_session.php">Cerrar Sesion</a>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"><hr>
		<i style="font-size: 22px;">Herramientas de ejecución</i><hr>
		<ul class="nav flex-column">
		  <li class="nav-item" onclick="location.href='<?php echo $dominio;?>/dashboard.php'">
		  	 Subir video <svg class="bi bi-cloud-upload" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path d="M4.887 6.2l-.964-.165A2.5 2.5 0 103.5 11H6v1H3.5a3.5 3.5 0 11.59-6.95 5.002 5.002 0 119.804 1.98A2.501 2.501 0 0113.5 12H10v-1h3.5a1.5 1.5 0 00.237-2.981L12.7 7.854l.216-1.028a4 4 0 10-7.843-1.587l-.185.96z"/>
			  <path fill-rule="evenodd" d="M5 8.854a.5.5 0 00.707 0L8 6.56l2.293 2.293A.5.5 0 1011 8.146L8.354 5.5a.5.5 0 00-.708 0L5 8.146a.5.5 0 000 .708z" clip-rule="evenodd"/>
			  <path fill-rule="evenodd" d="M8 6a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 6z" clip-rule="evenodd"/>
			 </svg>
		  </li>
		  <li class="nav-item" id="subir_video_reddit">
	 			Video Reddit
				 <svg class="bi bi-cloud-upload" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
		  <li class="nav-item" id="tablero">
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

		  <li onclick="cargar_graficos()">
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
	   		<div>
	   			
	   		</div>
	   		<div class="col-md-8" id="dataMain"><hr>
			    <?php 

					require('components/component_form_upload.php');

				?>
			</div><br>
			<div class="col-md-2" id="mis_videos" style="overflow-y: scroll;height:800px;">
				<table id="videos">
					<tr>
						<td><h3><hr>Sigue impactando personas subiendo video!</h3></td>
					</tr>
				</table>
			</div>

		</div>
	</div>
</body>
</ht!ml>


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