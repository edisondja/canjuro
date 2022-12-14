  function notificacion_sonido(){

  		// create "mySound"...
			var mySound = soundManager.createSound({
			  url: 'https://videosegg.com/assets/plip.mp3',
			  volume:80
			});

			// ...and play it
			mySound.play();
  }

  var json_noti ="";
    Push.Permission.request();

  var config = {
		    apiKey: "AIzaSyCH1WqjbWl2XosYNBBZDke5unCrAJaNmNs",
		    authDomain: "videosegg-680a1.firebaseapp.com",
		    databaseURL: "https://videosegg-680a1.firebaseio.com",
		    projectId: "videosegg-680a1",
		    storageBucket: "videosegg-680a1.appspot.com",
		    messagingSenderId: "813030164539"
		  };
    firebase.initializeApp(config);
 var user_id = $('#id_user').val();

 //leyendo notifaciones a videos de este usuario manera tal que se entere cuando lo comenten
 //console.log(user_id);
 
 const gente = firebase.database().ref();
 const query = gente.child('/notificaciones/').orderByChild('id_notificacion').equalTo(user_id);
 var count = 0;
 var notificacion;

 query.on('child_added',snap=>{
 	
	//console.log(snap.val().nombre);
	
	//console.log(snap.val().comentario);
	
	if(snap.val().estado!=="visto"){
		count++;
		notificacion_sonido();

				/*
				notificacion = new Notification("Videosegg",{
				    body:snap.val().comentario,
				    icon:snap.val().url_avatar_user,
				    image:"nalga.png"
				});
				notificacion.onclick=function(){

					location.href=`https://videosegg.com/${snap.val().url_video}`;
				}	*/



			   	Push.create('Videosegg', {
				    body:snap.val().comentario,
				    icon:snap.val().url_avatar_user,
				    timeout: 8000,               // Timeout before notification closes automatically.
				    vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
				    onClick: function() {
				        // Callback for when the notification is clicked. 
				       window.location.href=snap.val().url_video;
				    }  
				});



		//alertify.message(`${snap.val().usuario} Ha comentado tu video ${snap.val().comentario}`);

		$('#notif_text').html(`Tienes ${count} notificaciones sin ver`);
		$('#notif_text').css('background','gold');
		$('#notif_text').css('padding','3px');
		$('#notif_text').css('border-radius','5px');
			
			if(count==0){

					$('#notif_text').html('Notificaciones');
			}
	}
	


	//$('#noti').trigger('click');


});




function eliminar_registro(id,url){

   		firebase.database().ref(`/notificaciones/${id}`).remove();
   		location.href=url;

   }

function notificacion_vista(id_notificacion,data=[]){


		firebase.database().ref(`/notificaciones/${id_notificacion}`).set(json_noti);

		console.log('registro actualizado');
}



function notificaciones(){
		notificacion_sonido();	
	
	//alertify.success("entro");
	var interface=`<div class='col-md-5' style='z-index:5; position:absolute; top:300px; left:100px; overflow-y:scroll; height:500px;'> 
				<div class='panel panel-default'><button class='btn-primary' id='cerrar_panel'>Cerrar</button>`;
	 const gente = firebase.database().ref();
 			const query = gente.child('/notificaciones/').orderByChild('id_notificacion').equalTo(user_id).limitToLast(20);
 			var json;
		query.on("child_added",data=>{

			json_noti = {
				id_notificacion:data.val().id_notificacion,
				usuario:data.val().usuario,
				comentario:data.val().comentario,
				url_avatar_user:data.val().url_avatar_user,
				url_video:data.val().url_video,
				estado:'visto'
			};

		
			interface += `
					
						<div class='panel-body' onclick="eliminar_registro('${data.key}','${data.val().url_video}')"  onmouseover="notificacion_vista('${data.key}')" style='cursor:pointer;'>
							<img src='https://videosegg.com/${data.val().url_avatar_user}' class='img-responsive img-circle' style='height:25px; width:25px;'>
								<strong>${data.val().usuario}</strong>
								<p>${data.val().comentario}</p>
						</div>
						<hr>
				`;
				






		});



		interface+="</div>";
	
		$('#notificaciones').html(interface);


		$('#cerrar_panel').click(function(){
			
				$('#notificaciones').html("");

		});

}
