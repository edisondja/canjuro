/*function add_favorit(id_video,id_user){

	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			action:"agregar_favorito",
			id_video:id_video,
			id_user:id_user
		}


	}).done(function(resp){


		console.log(resp);

	});






}




function no_like(id_video,id_user){
		check_session();

	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			action:'disklike_video',
			id_video:id_video,
			id_user:id_user
		}


	}).done(function(resp){


		console.log(resp);	
			traer_dislike($('#id_post').val());


	});





}*/

function check_session(){

		var capturar = $('#session').val();

		if(capturar=="login"){

			console.log("success");
		}else if(capturar=="off"){

			alertify.success("Inicie session para hacer esta accion")

			return;
		}

}
/*

function like_video(id_video,id_user){

	check_session();

	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			action:"save_like",
			id_video:id_video,
			id_user:id_user
		}


	}).done(function(resp){
	console.log(resp);

			traer_dislike(id_video);

	});




}
*//*
function traer_likes(id){
	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			id_video:id,
			action:'load_likes'
			
		}


	}).done(function(resp){
			
			$("#container_like").html(resp);
					traer_likes($('#id_post').val());


	});



}

function traer_dislike(id_video){
	$.ajax({
		url:'../gestos_on.php',
		type:'post',
		data:{
			id_video:id_video,
			action:'load_dislike'
		}

	}).done(function(resp){

			if(resp==""){
							$('#container_dislike').html("0");


			}else{

				$('#container_dislike').html(resp);

			}
	});



}
*/






function actualizar_datos(comentario,id_comentario){


	$.ajax({
		url:'../actualizar_comentario.php',
		type:'post',
		data:{
			id_comentario:id_comentario,
			comentario:comentario

		}

	}).done(function(resp){

		alertify.success("hola");

	});




}

    function refactorizador(comentario){
				    	const regex = /[|<a>|"|-|<|>]/gi;
                        comentario = comentario.replace(regex,'');
                        return comentario;
				    }



function leer_comentarios(id_post){

		var id_user = $('#id_user').val();

			$.ajax({
				url:'../leer_comentarios.php',
				type:'post',
				data:{
					id_post:id_post
				}

			}).done(function(resp2){

				var comentario="";
				var data = JSON.parse(resp2);
				

				for(i=0;i<data.length;i++){

						comentario+=`<div id='coment${data[i].id_comentario}'>`;
						comentario+="<div class='panel-heading'>&nbsp"+data[i].usuario+"";
						if(data[i].id_user==id_user){
		
							comentario+=`
							<div class="dropdown" style='float:left'>
							  <img  class='dropdown-toggle' data-toggle="dropdown" src='../assets/menu.png'>					
							  <ul class="dropdown-menu">`;
							 comentario+="<li><a onclick=eliminar_video("+data[i].id_comentario+")>Eliminar</a></li>";
							 comentario+=`<li><a onclick="modificar_comentario(${data[i].id_comentario},'coment${data[i].id_comentario}','${data[i].texto}')">Modificar</a></li>`;
							comentario+=`
							  </ul>
							</div>
							`;
						}	
						comentario+="</div>";
						comentario+=`<img  style='height:50px; width:50px;  float:left' src='../${data[i].foto_url}' class='img-circle'>`;
						comentario+="<div class='panel-body'><p style='font-size:12px;'>"+data[i].texto+"</p>";
						comentario+="<strong style='float:right'>"+data[i].fecha_publicacion+"</strong><hr/>";
						comentario+="</div></div>";


				}

				$('#comentarios').html(comentario);


			});


	}



	function eliminar_video(eliminar){

		alertify.confirm("estas seguro que quieres eliminar el comentario?","se borrara automaticamente de este video",function(){

			$.ajax({
			url:'../eliminar_comentario.php',
			type:'post',
			data:{
				id:eliminar
			}


		}).done(function(resp){


				if(resp=="success"){
					alertify.success("comentario eliminado");
					
				}else{
						alertify.error("error al eliminar");
				}

				leer_comentarios($('#id_post').val());

		});


		},
		function(){

		}


		)

		




	}

function modificar_comentario(id,target=null,comentario=null){

id_user = $('#id_user').val();
	
	$(`#${target}`).html(`<textarea id='s${target}'>${comentario}</textarea>
		<br><button class='btn-primary boton_update' id='${target}update_coment'>Update</button>`);


	$(`#${target}update_coment`).click(()=>{


					$.ajax({
						url:"../gestos_on.php",
						type:"post",
						data:{
							action:"update_coment",
							text_coment:$(`#s${target}`).val(),
							id_comentario:id
						}

					}).done(function(resp){
						
									leer_comentarios($('#id_post').val());

					});



	});



/*
	var comentario_new = `
	<div class='panel panel-default col-md-8' id='update_coment_w'  style='z-index:5;position:absolute; top:-400px; box-shadow:black 1px 1px 1px 1px;'>
			<div'>
				<textarea class='form-control' cols='10' rows='5' id='text_coment'>
				</textarea><img src='${img_url}' width='50' class='img-circle'>
				<button id='actualizar_comentario' class='btn btn-primary'>Actualizar</button>
				<button id='cancelar_acutalizar' class='btn btn-primary'>Cancelar</button>

			</div>
	</div>
	`;	

	$('#comentarios').append(comentario_new);
	$('#actualizar_comentario').click(function(){


		$.ajax({
			url:"../gestos_on.php",
			type:"post",
			data:{
				action:"update_coment",
				text_coment:$('#text_coment').val(),
				id_comentario:id
			}

		}).done(function(resp){
							alertify.success(resp);
						leer_comentarios();


		});



	});

	$('#cancelar_acutalizar').click(function(){

		$('#update_coment_w').hide('slow');

	});
*/

}



//traer_likes($('#id_post').val());
//traer_dislike($('#id_post').val());
$('document').ready(function(){
 	
 	var count=true;

	$('#show_coments').click(function(){


			if(count==true){

					$('#coment_now').show('slow');
					count=false;
			}else{

				$('#coment_now').hide('slow');
				count=true;
			}	

	});


	
/*
	$('#add_favorit').click(function(){
			$('#add_favorit').css("box-shadow","orange 1px 1px 1px 1px");
			$('#add_favorit').css("border-radius","100px");
			add_favorit($('#id_post').val(),$('#id_user').val());

	});

	$('#dislike').click(function(){

		$('#dislike').css("box-shadow","3px 3px 3px #D42BA8");
		$('#dislike').css("border-radius","100px");
		no_like($('#id_post').val(),$('#id_user').val());


	});

	$('#like_video').click(function(){

		$('#like_video').css("box-shadow","3px 3px 3px #D42BA8");
		$('#like_video').css("border-radius","100px");
		like_video($('#id_post').val(),$('#id_user').val());

	})

*/
	$('#comentar').click(function(){

		if($('#comentario').val()!=""){

		

			$.ajax({
				url:'../guardar_comentario.php',
				type:'post',
				data:{
					id_post:$('#id_post').val(),
					id_user:$('#id_user').val(),
					comentario:$('#comentario').val()
				}


			}).done(function(resp){
						/*
						var config = {
							    apiKey: "AIzaSyCH1WqjbWl2XosYNBBZDke5unCrAJaNmNs",
							    authDomain: "videosegg-680a1.firebaseapp.com",
							    databaseURL: "https://videosegg-680a1.firebaseio.com",
							    projectId: "videosegg-680a1",
							    storageBucket: "videosegg-680a1.appspot.com",
							    messagingSenderId: "813030164539"
							  };
					 

					    if (!firebase.apps.length) {
		    				
		    			  		 firebase.initializeApp(config);
					     }
					     
	    				var guardar = firebase.database().ref('/notificaciones/');
	    				guardar.push({
	    						usuario:$('#usuario_login').val(),
	    						comentario:coment,
	    						id_notificacion:$('#id_user_video').val(),
	    						url_video:$('#ruta_actual_video').val(),
	    						url_avatar_user:$('#url_imagen_user').val(),
	    						estado:'pendiente'

	    				});*/

					$('#comentarios').trigger('click');
					leer_comentarios($('#id_post').val());

			});


			

			$('#comentario').val("");

		}

	});


/* $('#editar_perfil').click(function(){

 	alert("hola");

 });

*/


});

// Este es el método que vamos a llamar
// cada vez que se detecte una intersección
function onScrollEvent(entries, observer) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            var attributes = entry.target.attributes;
            var src = attributes['data-src'].textContent;
            entry.target.src = src;
            entry.target.classList.add('visible');
        }
    });
}

// Utilizamos como objetivos todos los
// elementos que tengan la clase lazyLoad,
// que vimos en el HTML de ejemplo.
var targets = document.querySelectorAll('.lazyLoad');

// Instanciamos un nuevo observador.
var observer = new IntersectionObserver(onScrollEvent);

// Y se lo aplicamos a cada una de las
// imágenes.
targets.forEach(function(entry) {
    observer.observe(entry);
});