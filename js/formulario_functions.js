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

 	});
 	
