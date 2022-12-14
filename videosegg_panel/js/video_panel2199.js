	


	function eliminar_video(id_video){


	   alertify.confirm("Desea eliminar video de forma permanente?","Si presiona ok este video se borrara automaticamente del servidor",
			()=>{

				$.ajax({
					url:'call_logic.php',
					type:'post',
					data:{
						action:'delete_video',
						id_video:id_video
					}



				}).done(data=>{
					console.log(data);

					if(data=="success"){

						alertify.success("Listo video borrado correctamente!");


					}
				});


			},()=>{
				alertify.success("ho");

			}

		);


		


	}

	function change_poster_fast(id_post,titulo){	
		var template=`
				<form method='post' enctype='multipart/form-data' action='call_logic.php' id='formulario${id_post}'><br>
						<input type='hidden' name='action' value='update_poster_now' >
						<input type='file' class='form-control' name='archivo'><br>
						<input type='hidden' name='id_post' value='${id_post}'>
						<input type='hidden' name='titulo' value='${titulo}'>
						<input type='submit' class='btn btn-primarty' value='OK'>
						<progress max='100'></progress>
				</form>

		`;

		$(`#${id_post}`).html(template);


		$(`#formulario${id_post}`).ajaxForm({

				besoforeSend:function(){


				},
				uploadProgress:function(event,position,total,porciento){

					$('progress').val(porciento);


				},
				success:function(){

					//console.log("subida con exito");
				},
				complete:function(response){

					console.log(response.responseText);
					$(`#imagen${id_post}`).attr("src",`${response.responseText}`);

				}

		});


	}


	function interface_edition(data=[]){

		return`
			 <form method='post' enctype='multipart/form-data' id='formulario_update${data.id_post}' action='call_logic.php'>
			 	<input type='hidden' name='id_post' value='${data.id_post}'
			 	<strong>Titulo</strong><br>
			 	<input type='text' name='titulo' value='${data.titulo}' class='form-control'><br>
			 	<strong>Categorias</strong>
			 	<textarea class='form-control' name='categoria'>${data.categoria}</textarea><br>
			 	<input type='hidden' name='action'  value='update_metadata_post'>
			 	<strong>Descripcion</strong><br>
			 	<textarea class='form-control' name='descripcion'>
			 		${data.descripcion}
			 	</textarea>

			 	<div class='card'>
			 			<img src='https://videosegg.com/${data.ruta_imagen}' style='heigth:150px; width:150px; border-radius:5px;'>
			 	</div><br>
			 	<input type='submit' value='actulizar' class='btn btn-primary'>
			</form> 
			<br>
		`;
	}



	function editar_video(id_video){

			$.ajax({
				url:'call_logic.php',
				type:'post',
				data:{
					action:'load_video',
					id_video:id_video
				}



			}).done(data=>{
					console.log(data);
					var data_video = JSON.parse(data);
					console.log(data_video);

				 var form_edit = interface_edition(data_video);
				 	$(`#${id_video}`).html(form_edit);

				 	$(`#formulario_update${data_video.id_post}`).ajaxForm({	
				 		besoforeSend:function(){
				 			//cuando se actualiza el dato

				 		},
				 		uploadProgress:function(z,s,s,progress){

				 		},
				 		success:function(){

				 		},
				 		complete:function(response){
				 			console.log(response.responseText);

				 			if(response.responseText=="Datos actualziado correctamente..."){

				 				alertify.success("Video actualizado correctamente");
				 			}


				 		}




				 	});


			});

	}



$('document').ready(function(){


	$('#cerrar_sesion').click(()=>{
		alertify.success("ent");

			$.ajax({
				url:'call_logic.php',
				type:'post',
				data:{
					action:'cerrar_sesion'
				}

			}).done(data=>{
				console.log(data);
					if(data=="success"){

						location='index.php';
					}


			});


	});

	$('#video_panel').click(function(){

			$('#dasboard').html(`<br>
				<h1>Panel Video</h1>
				<input type='text' class='form-control' placeholder='Escriba el nombre del video' id='search_video'>
				<div id='result-data'><br>
					<div class='card'>
							<div class='card-img-top' >
								<img src='https://i.pinimg.com/originals/44/5f/88/445f884ada282e8e26077e4ef71f0e1a.jpg' style='width:200px; heigth:200px'>
								<button class='btn btn-dark'>Editar</button>
								<button class='btn btn-dark' >Eliminar</button>
								<button class='btn btn-dark' onclick="change_poster_fast(22,'Chica')">Cambiar imagen rapido</button>
								<button class='btn btn-info'>Mas Detalles</button>	<br>
								<div class='card-text' style='background:#242661; color:white;'>Aqui vemos claramente como esta chica se desnuda frente a una camara</div>
									
							</div>
												<div class='card-title'><strong>Chica bella bailando desnuda</strong></div>

						<div id='22'></div>
					</div>
				</div>

		   `);


			$('#search_video').keyup(()=>{


					$.ajax({
						url:'call_logic.php',
						type:'post',
						data:{
							palabra:$('#search_video').val(),
							action:'search_video_now'

						}


					}).done((data)=>{

						console.log(data);
					
						var data =  JSON.parse(data);
						var interface = "";					
						var ruta ="";
						data.forEach((key)=>{

							if(key.disk_config==""){

								ruta =  "../"+key.ruta_imagen;

							}else if(key.disk_config=='disk2'){

								ruta = `../${key.ruta_imagen}`;
							}else{

								ruta =  "../"+key.ruta_imagen;

							}

						    interface+=`<div class='card'>
							<div class='card-img-top' >
								<img src='${ruta}' style='width:200px; height:150px' id='imagen${key.id_post}'>
								<button class='btn btn-dark' onclick='editar_video(${key.id_post})'>Editar</button>
								<button class='btn btn-dark' onclick='eliminar_video(${key.id_post})'>Eliminar</button>
								<button class='btn btn-dark' onclick="change_poster_fast(${key.id_post},'${key.titulo}')">Cambiar imagen rapido</button>
								<button class='btn btn-info'>Mas Detalles</button>	<br>
								<div class='card-text' style='background:#242661; color:white;'>${key.descripcion}</div>
									
							</div>
												<div class='card-title'><strong>${key.titulo}</strong></div>
							<div id='${key.id_post}'></div>
							</div>`


						});




						$('#result-data').html(interface);

					


					});



			});



	});






});