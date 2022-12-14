count_v=0;
var box_videos="";
function load_video_script(){

// function from the jquery form plugin
	$('#myForm').ajaxForm({
		beforeSend:function(){
			 $(".progress").show();
			 $('.video_text').show();
			 $('.sr-only').show();
			 $('input').prop('disabled',true);


		},
		uploadProgress:function(event,position,total,percentComplete){
			$(".progress-bar").width(percentComplete+'%'); //dynamicaly change the progress bar width
			//$(".sr-only").html(percentComplete+'%'); // show the percentage number
			
			$('.video_text').html(`<span>Video subiendo por favor espere...</span> ${percentComplete}%`);

			if(percentComplete==100){
				
				$('.video_text').html(`<span>Video procesando por favor espere...</span> ${percentComplete}%`);

			}
		},
		success:function(){
			$(".progress").hide(); //hide progress bar on success of upload
		},
		complete:function(response){
			if(response.responseText=='0')
				$(".image").html("Error"); //display error if response is 0
			else
				$('.video_text').html('<span>Subido correctamente , Su video estara disponible en un momento..</span>');
				setTimeout(()=>{
					$('.progress-bar').hide();
							$('#dataMain').html(`<div class='panel panel-default'>
									<br><br><h3>Felicidades su video ha sido publicado con exito !<hr></h3>
									<img src='image/upload.png' style='width:300px;'>	
							</div>`);	



				},2000);

				// show the image after success
		}
	});

	//set the progress bar to be hidden on loading
	$(".progress").hide();




}

function load_favorit(){

	   $.ajax({
	   url:"load_favorits.php",
	   type:"post",
	   data:{
		   id_user:$('#id_user').val(),
		   load_favorits:true
	   }

   }).done(function(resp){

	   var data = JSON.parse(resp);
	   var adaptador="";
	   for(i=0;i<data.length;i++){
		   adaptador+=`<br>`;
		   adaptador+=`
		   <div class='panel panel-default'>	
		   <div class='panel-heading'>${data[i].titulo}</div>
			   <div class='panel-body' >
				   <video src='${data[i].ruta_video}' class='img-responsive' controls='true' width='500' ></video>
			   </div>
			   <div class='panel-footer'>
				   ${data[i].descripcion}
					   <a href='playvideo.php?id=${data[i].id_post}'><br><button class='btn btn-primary' style='border:none; background:#FF3399; border-color:#FF3399;'>See More</button></a>
			   <button style='float:right; border:none; background:#FF3399; border-color:#FF3399;' class='btn btn-warning' onclick='eliminar_favorito(${data[i].id_favorito})'>Delete</button>
			   </div>

		   </div>
		   `;	


	   }
	   $('#dataMain').html(adaptador);


   });
}

   function eliminar_video(id_video){

	   alertify.confirm('eliminar video','Deseas eliminar este video',function(){

		   
				   $.ajax({
					   url:'editar_video.php',
					   type:'post',
					   data:{
						   eliminar_video:id_video
					   }
				   }).done(function(resp){

						   $('#video').trigger('click');
						   alertify.success(resp);
				   });

	   },function(){


	   });




   }

   function editar_video(id_video){
	   var id = id_video;
	   //load data video
	   var datos;
	   $.ajax({
		   url:"editando_video.php",
		   type:"post",
		   data:{
			   action:'load_video',
			   id_video:id_video
		   }

	   }).done(function(resp){
			   console.log(resp);

			   var editar_video
			   datos =  JSON.parse(resp);
			   
			   datos.forEach(function(key){

					   editar_video =`<br><br>
					   <form method='post' action='editando_video.php' enctype='multipart/form-data'>
					   <strong>Titulo</strong><br>
					   <input type='text' name='titulo' id='titulo' value='${key.titulo}' class='form-control'/><br>
						   <strong>Descripcion</strong>
						   <textarea class='form-control' name='descripcion'>${key.descripcion}</textarea>
						   <strong>Categoria seleccionada</strong>
						   <select name='categoria' class='form-control' id='categoria'>
									   <option value='${key.categoria}'>${key.categoria}</option>
							   </select><br>
							   <strong>Selecione categorias</strong><br><br>
							   <input type="checkbox"  value="Rubias" name="categoria[]"><strong>Rubias</strong>
							   <input type="checkbox"  value="Latina" name="categoria[]"><strong>Latinas</strong>
							   <input type="checkbox"  value="Porno start" name="categoria[]"><strong>Porn Star</strong>
							   <input type="checkbox"  value="Amateur" name="categoria[]"><strong>Amateur</strong>
							   <input type="checkbox"  value="Sexo Anal" name="categoria[]"><strong>Anal</strong>
							   <input type="checkbox"  value="Africana" name="categoria[]"><strong>Africanas</strong>
							   <input type="checkbox"  value="Hentai" name="categoria[]"><strong>Hentai</strong>
							   <input type="checkbox"  value="Gay" name="categoria[]"><strong>Gay</strong><br>
							   <input type="checkbox"  value="Sado" name="categoria[]"><strong>Sado</strong>
							   <input type="checkbox"  value="Arabes" name="categoria[]"><strong>Arabes</strong>
							   <input type="checkbox"  value="Alemanas" name="categoria[]"><strong>Alemanas</strong>
							   <input type="checkbox"  value="Jovenes" name="categoria[]"><strong>Jovenes</strong>
							   <input type="checkbox"  value="Orgias" name="categoria[]"><strong>Orgias</strong>
							   <input type="checkbox"  value="Trios" name="categoria[]"><strong>Trios</strong>
							   <input type="checkbox"  value="Milf" name="categoria[]"><strong>Milf</strong>
							   <input type="checkbox"  value="Lesbianas" name="categoria[]"><strong>Lesbianas</strong><br>
							   <input type="checkbox"  value="Uniformes" name="categoria[]"><strong>Uniformes</strong>
							   <input type="checkbox"  value="POV" name="categoria[]"><strong>POV</strong>
							   <input type="checkbox"  value="Mamadas" name="categoria[]"><strong>Mamadas</strong>
							   <input type="checkbox"  value="Masages" name="categoria[]"><strong>Masages</strong>
							   <input type="checkbox"  value="Mature" name="categoria[]"><strong>Mature</strong>
							   <input type="checkbox"  value="Doble penetracion" name="categoria[]"><strong>Doble Penetracion</strong><br>
							   <input type="checkbox"  value="Tetonas" name="categoria[]"><strong>Tetonas</strong>
							   <input type="checkbox"  value="Gordas" name="categoria[]"><strong>Gordas</strong>
							   <input type="checkbox"  value="Publico" name="categoria[]"><strong>Publico</strong>
							   <input type="checkbox"  value="Negra" name="categoria[]"><strong>Negras</strong>
							   <input type="checkbox"  value="Hardcore" name="categoria[]"><strong>Hardcore</strong>
							   <input type="checkbox"  value="Pelirrojas" name="categoria[]"><strong>Pelirrojas</strong>
							   <input type="checkbox"  value="Interracial" name="categoria[]"><strong>Interracial</strong><br>
							   <input type="checkbox"  value="Shemale" name="categoria[]"><strong>Shemale</strong>
							   <input type="checkbox"  value="Creampie" name="categoria[]"><strong>Creampie</strong>
							   <input type="checkbox"  value="Asiaticas" name="categoria[]"><strong>Asiaticas</strong>
							   <input type="checkbox"  value="Cartoon" name="categoria[]"><strong>Cartoon</strong>
							   <input type="checkbox"  value="Facial" name="categoria[]"><strong>Facial</strong>
							   <input type="checkbox"  value="Parodias" name="categoria[]"><strong>Parodias</strong>
							   <input type="checkbox"  value="Culos" name="categoria[]"><strong>Culos</strong><br>
							   <input type="checkbox"  value="Penes grandes" name="categoria[]"><strong>Penes Grandes</strong>
							   <input type="checkbox"  value="Aceite" name="categoria[]"><strong>Oiled</strong>
							   <input type="checkbox"  value="PornHD" name="categoria[]"><strong>PornHD</strong>
							   <input type="checkbox"  value="Fetiche" name="categoria[]"><strong>Fetiche</strong>
							   <input type="checkbox"  value="Bukkake" name="categoria[]"><strong>Bukkake</strong>
							   <input type="checkbox"  value="Casting" name="categoria[]"><strong>Casting</strong>
							   <input type="checkbox"  value="Compilation" name="categoria[]"><strong>Compilation</strong>
							   <input type="checkbox"  value="Latex" name="categoria[]"><strong>Latex</strong>
							   <input type="checkbox"  value="Gangbang" name="categoria[]"><strong>Gangbang</strong>
							   <input type="checkbox"  value="Orgasm" name="categoria[]"><strong>Orgasm</strong>
							   <input type="checkbox"  value="BBW" name="categoria[]"><strong>BBW</strong>
							   <input type="checkbox"  value="Camara Web" name="categoria[]"><strong>Camara Web</strong>
							   <input type="checkbox"  value="Masturbacion" name="categoria[]"><strong>Masturbacion</strong>
							   <input type="checkbox"  value="BrasileÃ±as" name="categoria[]"><strong>BrasileÃ±as</strong>
							   <input type="checkbox"  value="Colombianas" name="categoria[]"><strong>Colombianas</strong>
							   <input type="checkbox"  value="Squirt" name="categoria[]"><strong>Squirt</strong>
							   <input type="checkbox"  value="Jovecintas/Viejos" name="categoria[]"><strong>Jovencitas/Viejos</strong>
							   <input type="checkbox"  value="Toys" name="categoria[]"><strong>Toys</strong>
							   <input type="checkbox"  value="Outdoor" name="categoria[]"><strong>Outdoor</strong>
							   <input type="checkbox"  value="Cumshot" name="categoria[]"><strong>Cumshot</strong>
							   <input type="checkbox"  value="Pajas" name="categoria[]"><strong>Pajas</strong>
							   <input type="checkbox"  value="Vintage" name="categoria[]"><strong>Vintage</strong>
						   <input type='hidden' name='action' value='update_video'>
						   <input type='hidden' name='id_video' value='${key.id_post}'><br><br>
						   <button class='btn btn-success' id='update_video'>Update</button>

					   <form>
					   `;

				   
			   });

	   
				   $('#dataMain').html(editar_video);

	   




	   });




   }


function eliminar_favorito(id){


   alertify.confirm("quieres borrar el video de favorito?",
   function(){

		   $.ajax({
			   url:"gestos_on.php",
			   type:"post",
			   data:{
				   action:"delete_favorit",
				   id:id
			   }

		   }).done(function(resp){

				   alertify.success(resp);
				   load_favorit();
		   });	
   },
   function(){

   }


   );


}


$('document').ready(function(){



   $('#subir_video').click(function(){

	   var loading = `
	   <div style='position:absolute;z-index:4;left:3%; opacity:0.9;'>
	   <strong>Subiendo video<strong><br>
	   <img src='assets/loading.gif' width='75'>
	   <div>
	   `;

	   $('#dataMain').append(loading);




   });

function adapter_video(dato=[]){

		  var domain="";
	   

		   if(dato.disk_config==""){
				   
				   domain="https://localhost/edtube";
		   

		   }else if(dato.disk_config=='disk2'){

		   
				   domain="https://localhost/edtube";
		   
		   }
	   

		   return `
			   <tr>
				   <td><img src='${domain}/${dato.ruta_imagen}' alt='${data.titulo}' style='height:50px;width:50px;margin-top:5px;' class='img-responsive'></td>
				   <td>
					   <div class="dropdown" style="float: right;">
							 <button class="btn btn-secondary dropdown-toggle" style="background:#43474b; margin:5px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<strong style="padding:5px; color: white;">Accion</strong>
							 </button>
							 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								  <li class='dropdown-item' onclick='eliminar_video(${dato.id_post})'>Eliminar</li>
								  <li class='dropdown-item' onclick='editar_video(${dato.id_post})'>Actualizar</li>
							 </div>
					   </div>
				   </td>
			   </tr>
		   `;



}

  

   function search_video(key){

			   $.ajax({
				   url:'editar_video.php',
				   type:'post',
				   data:{
					   search_video:key,
					   id_user:$('#id_user').val()


				   }

			   }).done(function(data){
				   //console.log(data);

				   
				   var datos = JSON.parse(data);	
				   box_videos = "";

				   datos.forEach((key)=>{

						   console.log(key.titulo);
						   box_videos+=adapter_video(key);

				   });
					   //alert(box_videos);
					   $('#videos').html(box_videos);

			   });

		}


$('#video').click(function(){

   $.ajax({
	   url:'editar_video.php',
	   type:'post',
	   data:{
		   id_user:$('#id_user').val()
	   }



   }).done(function(resp){
	   var  videos=`<br><input type='text' class='form-control' id='video_search'><br/><div id="videos"><table>`;
   

	   data = JSON.parse(resp);


	   
	   data.forEach(function(dato){
   
	   
		   videos+= adapter_video(dato);	


	   });

	   
	   videos+=`</table></div>`;

	   $('#mis_videos').html(videos).hide();
			   $('#mis_videos').show('slow',()=>{

					   $('#video_search').keyup(()=>{
							 
						   //return console.log("buscando el video");
							 search_video($('#video_search').val());
						 });

			   });

   



   });





});

$('#publicar_video').click(function(){

   var loading = `<img src='http://localhost/edtube/assets/loading.gif' width='75'>`;
   //$('#dataMain').append(loading);




});


$('#noti').click(()=>{


   notificaciones();
   




});



$('#Upload_video_s').click(function(){

	   var id_user = $('#id_user').val();


   var load_video =`<br><br><form method="post"  enctype="multipart/form-data" id="myForm" action="https://localhost/edtube/guardar_video.php">
			   <input type="text" maxlength="70" name="titulo" placeholder="titulo del video" class="form-control" required=""><br>
			   <strong>Select Category</strong><br><br>
			   <div class="panel panel-default">
					   <input type='hidden' value='${id_user}' name='id_user'>
					   <input type="checkbox"  value="Rubias" name="categoria[]"><strong>Rubias</strong>
					   <input type="checkbox"  value="CastaÃ±as" name="categoria[]"><strong>CastaÃ±as</strong>
					   <input type="checkbox"  value="Latina" name="categoria[]"><strong>Latinas</strong>
					   <input type="checkbox"  value="Porno start" name="categoria[]"><strong>Porn Star</strong>	<input type="checkbox"  value="Amateur" name="categoria[]"><strong>Amateur</strong>
					   <input type="checkbox"  value="Sexo Anal" name="categoria[]"><strong>Anal</strong><br>
					   <input type="checkbox"  value="Africana" name="categoria[]"><strong>Africanas</strong>
					   <input type="checkbox"  value="Hentai" name="categoria[]"><strong>Hentai</strong>
					   <input type="checkbox"  value="Gay" name="categoria[]"><strong>Gay</strong>
					   <input type="checkbox"  value="Sado" name="categoria[]"><strong>Sado</strong>
					   <input type="checkbox"  value="Arabes" name="categoria[]"><strong>Arabes</strong>
					   <input type="checkbox"  value="Alemanas" name="categoria[]"><strong>Alemanas</strong>
					   <input type="checkbox"  value="Jovenes" name="categoria[]"><strong>Jovenes</strong><br>
					   <input type="checkbox"  value="Orgias" name="categoria[]"><strong>Orgias</strong>
			   <input type="checkbox"  value="Trios" name="categoria[]"><strong>Trios</strong>
			   <input type="checkbox"  value="Milf" name="categoria[]"><strong>Milf</strong>
			   <input type="checkbox"  value="Lesbianas" name="categoria[]"><strong>Lesbianas</strong>
			   <input type="checkbox"  value="Uniformes" name="categoria[]"><strong>Uniformes</strong>
			   <input type="checkbox"  value="POV" name="categoria[]"><strong>POV</strong>
			   <input type="checkbox"  value="Mamadas" name="categoria[]"><strong>Mamadas</strong><br>
			   <input type="checkbox"  value="Masages" name="categoria[]"><strong>Masages</strong>
			   <input type="checkbox"  value="Mature" name="categoria[]"><strong>Mature</strong>
			   <input type="checkbox"  value="Doble penetracion" name="categoria[]"><strong>Doble Penetracion</strong>
			   <input type="checkbox"  value="Tetonas" name="categoria[]"><strong>Tetonas</strong>
			   <input type="checkbox"  value="Gordas" name="categoria[]"><strong>Gordas</strong>
			   <input type="checkbox"  value="Publico" name="categoria[]"><strong>Publico</strong><br>

			   <input type="checkbox"  value="Negra" name="categoria[]"><strong>Negras</strong>
			   <input type="checkbox"  value="Hardcore" name="categoria[]"><strong>Hardcore</strong>
			   <input type="checkbox"  value="Pelirrojas" name="categoria[]"><strong>Pelirrojas</strong>
			   <input type="checkbox"  value="Interracial" name="categoria[]"><strong>Interracial</strong>
			   <input type="checkbox"  value="Shemale" name="categoria[]"><strong>Shemale</strong>
			   <input type="checkbox"  value="Creampie" name="categoria[]"><strong>Creampie</strong><br>
			   <input type="checkbox"  value="Asiaticas" name="categoria[]"><strong>Asiaticas</strong>
			   <input type="checkbox"  value="Cartoon" name="categoria[]"><strong>Cartoon</strong>
			   <input type="checkbox"  value="Facial" name="categoria[]"><strong>Facial</strong>
			   <input type="checkbox"  value="Parodias" name="categoria[]"><strong>Parodias</strong>
			   <input type="checkbox"  value="Culos" name="categoria[]"><strong>Culos</strong><br>
			   <input type="checkbox"  value="Latex" name="categoria[]"><strong>Latex</strong>
			   <input type="checkbox"  value="Penes grandes" name="categoria[]"><strong>Penes Grandes</strong>
			   <input type="checkbox"  value="Aceite" name="categoria[]"><strong>Oiled</strong>
			   <input type="checkbox"  value="PornHD" name="categoria[]"><strong>PornHD</strong>
			   <input type="checkbox"  value="Fetiche" name="categoria[]"><strong>Fetiche</strong>
			   <input type="checkbox"  value="Bukkake" name="categoria[]"><strong>Bukkake</strong>
			   <input type="checkbox"  value="Casting" name="categoria[]"><strong>Casting</strong>
			   <input type="checkbox"  value="Compilation" name="categoria[]"><strong>Compilation</strong>
			   <input type="checkbox"  value="Gangbang" name="categoria[]"><strong>Gangbang</strong>
			   <input type="checkbox"  value="Orgasm" name="categoria[]"><strong>Orgasm</strong>
			   <input type="checkbox"  value="BBW" name="categoria[]"><strong>BBW</strong>
			   <input type="checkbox"  value="Camara Web" name="categoria[]"><strong>Camara Web</strong><br>
			   <input type="checkbox"  value="Masturbacion" name="categoria[]"><strong>Masturbacion</strong>
			   <input type="checkbox"  value="BrasileÃ±as" name="categoria[]"><strong>BrasileÃ±as</strong>
			   <input type="checkbox"  value="Colombianas" name="categoria[]"><strong>Colombianas</strong>
			   <input type="checkbox"  value="Squirt" name="categoria[]"><strong>Squirt</strong>
			   <input type="checkbox"  value="Jovecintas/Viejos" name="categoria[]"><strong>Jovencitas/Viejos</strong><br>
			   <input type="checkbox"  value="Toys" name="categoria[]"><strong>Toys</strong>
			   <input type="checkbox"  value="Outdoor" name="categoria[]"><strong>Outdoor</strong>
			   <input type="checkbox"  value="Cumshot" name="categoria[]"><strong>Cumshot</strong>
			   <input type="checkbox"  value="Pajas" name="categoria[]"><strong>Pajas</strong>
			   <input type="checkbox"  value="Vintage" name="categoria[]"><strong>Vintage</strong>



			   </div>
		   
			   <div class="panel panel-default">
				   

   
	   
			   </div>
			   <div class="video_text" style="display: none"><span>Video subiendo porfavor espere...</span></div>
				<div class="progress progress-striped active">
				 <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" 
				 aria-valuemax="100" style="width: 0%">
				   <span class="sr-only">0% Complete</span>
				 </div>
			   </div>
			   <div class="image"></div>
		   
			   

			   <img src="assets/upload.svg" class="img-responsive" id="upload_v" style="margin:auto" width="80">
			   <p style="text-align: center; font-size: 18px;">Select video to upload</p>

			   <input type="file" name="videos" class="form-control" id="upload_o" style="display: none;"><br>
			   <div id='letras'></div>
			   <textarea name="descripcion" class="form-control" placeholder="descripcion del contenido"></textarea><br>
				   <div class="panel-body" style="display: inline-flex; cursor: pointer;">
								  <ul style="list-style: none;text-decoration: none; font-size: 22px;" id="menu">
									  <li style="float: right; padding: 5px;"><span class="glyphicon glyphicon-sunglasses" id="imagen_dis">Emotion</span></li>
									  <li style="float: right; padding: 5px;"><span class="glyphicon glyphicon-paperclip" onclick="agregar_enlace()">Enlace</span></li>
								  </ul>
									 <div>
										<div id="emoticones" style="display: none;position:absolute;z-index:3;height: 300px; width: 500px; background:white; opacity: 0.9;overflow-x: scroll;top:180px; font-size: 30px;">
									   </div>
									 </div>
								
						   </div>

			   <input type="submit" class="btn btn-primary" value="Upload Video">

		   </form>`;

		   $('#dataMain').html(load_video);
		   load_video_script();


		   $('body').scrollTop(800);

		   $('#upload_v').click(function(){


	   $('#upload_o').trigger('click');
	   $('#upload_o').show('slow');


   $('#subir_video').click(function(){

	   var loading = `
	   <div style='position:absolute;z-index:4;left:3%; opacity:0.9;'>
	   <strong>Subiendo video<strong><br>
	   <img src='assets/loading.gif' width='75'>
	   <div>
	   `;

	   $('#dataMain').append(loading);




   });




$('#publicar_video').click(function(){



   if(count_v==0){
	   count_v=1;

		   var loading = `<img src='http://localhost/edtube/assets/loading.gif' width='75'>`;
		   $('#dataMain').append(loading);
   }



});

});




});



$('#upload_v').click(function(){


	   $('#upload_o').trigger('click');
	   $('#upload_o').show('slow');

});





$('#favoritos').click(function(){
   /*Cargando mis videos favortios*/

   load_favorit();

});

$('#editar_perfil').click(function(){

   var profile="";
	   $.ajax({
		   url:'datos_usuario.php',
		   type:'post',
		   data:{
			   id_user:$('#id_user').val(),
			   action:"cargar_perfil"
		   }

	   }).done(function(resp){

			   var data = JSON.parse(resp);

		   
		   for(i=0;i<data.length;i++){

		   profile+="<br><form method='post' enctype='multipart/form-data' id='form_profile' action='datos_usuario.php'>";
			   profile+="<br><div class='panel panel-default'>";
				   profile+="<div class='panel-heading'>Datos personales</div>";
					   profile+="<div class='panel-body'>";
						   profile+="<strong>Usuario</strong>";
						   profile+="<input  class='form-control' type='text' name='usuario'  id='usuario' value='"+data[i].usuario+"'/>";
						   profile+="<strong>ContraseÃ±a</strong>";
						   profile+="<input  class='form-control' type='password' name='pw' id='password' value='"+data[i].clave+"'/>";
						   profile+="<strong>Repita su contraseÃ±a</strong>";
						   profile+="<input  class='form-control' type='password' name='pw' id='password2' value='"+data[i].clave+"'/>";
						   profile+="<strong>Correo electronico</strong>";
						   profile+="<input  class='form-control' type='text' name='email' id='email' value='"+data[i].email+"'/>";
						   profile+="<strong>Cambiar foto de perfil</strong>";
						   profile+="<input type='hidden' name='action' value='actualizar_perfil'>";
						   profile+="<input  class='form-control' name='foto' type='file' id='picture' value='"+data[i].foto_url+"'/>";
						   profile+="<br><button  class='btn btn-primary'>Modificar datos</button>";
					   profile+="</div>";
					   profile+="<div class='panel-footer'></div>";
			   profile+="</div>";
			   profile+=`<progress value="" max="" id="update_progress">`;
		   profile+="</form>";



		   }
	   
		   $('#dataMain').html(profile);
				   $('#form_profile').ajaxForm({
						   beforeSend:function(){
							   $('#update_progress').show();

						   },
						   uploadProgress:function(x,s,x,progress){

								   $('#update_progress').val(progress);

						   },
						   success:function(){

							   console.log("se envio");
						   },
						   complete:function(data){
							   $('#update_progress').hide('slow');
							   console.log(data);
							   console.log(data.responseText);
							   $('#foto_perfil').html(`<img src='${data.responseText}'
								class='img-responsive img-circle'  style='margin:auto; height:80px; width:80px;'>`);	

						   }





					   });
					   $('#update_progress').hide();


		   

		   $('#editar').click(function(){

			   alert("probando");
			   if($('#password').val()==$('#password2').val()){

			   $.ajax({	
				   url:'datos_usuario.php',
				   type:'post',
				   data:{
					   id_user:$('#id_user').val(),
					   action:'actualizar_perfil',
					   usuario:$('#usuario').val(),
					   pw:$('#password').val(),
					   email:$("#email").val()
				   }


			   }).done(function(resp2){

				   alert(resp2);


			   });


		   }else{
			   alert("no coienciden");
		   }


		   });

   


	   });
   




});



});