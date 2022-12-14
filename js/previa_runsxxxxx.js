var adentro=0;
var target = "";
var time = 0;
var previa_temp;
var url_list_temp;
var portada_temp;

function portada(id,portada){

	 	var id= `#video${id}`;
	 	adentro=0;
 	$(id).css("background","white");

	var portadada_img = portada;

	 $(id).html(`<img class='img-responsive' src='${portadada_img}' style='height:180px; width:100%;'>`);
 	

}


function asing_temp_load_prev(id,url_list,previa,portada){


 			target = id;
			previa_temp = previa;
			url_list_temp = url_list;
			portada_temp = portada;

 		
 			$(id).css("background","black");
		 	$(id).html(`<a href='${url_list}'>
				<video src='${previa}'  id='${id}' class='img-responsive' constrols autoplay loop  style='height:180px; width:100%;'>	
				</a>
		 	`);
				
		 var video=document.getElementById(id);	
		 	video.muted=true;


}


function previa(id,previa,url_list=null,portada){
 	var id= `#video${id}`;
 	var hi = previa;

 	if(target==""){

 		//la primera vez cuando reproduces la vista previa de un video

		asing_temp_load_prev(id,url_list,previa,portada);


 	}else{
 		//la segunda ves en adelante que se ejecute el script	



 	$(target).html(`<a href='${url_list_temp}'><img src='${portada_temp}' class='img-responsive'  
 		style='height:180px; background:black; margin:auto;'
 		 onmouseover="previa(${target},${previa_temp},${url_list_temp},${portada_temp})"></a>`);

 		asing_temp_load_prev(id,url_list,previa,portada);

 	}
 	

		 
		 	/*
		 		setTimeout(function(){

		 				$(id).html(`<a href='${url_list}'><img src='${portada}' style='height:180px; width:100%;'  ontouchmove='previa(`${id}`,`${hi}`,`${url_list}`,`${portada}`)'></a>`);
		 		},8000);	
		 		*/


 	}


$('document').ready(function(){


	var ventana_bienvenida =`
	<div id='Advertencia' class='panel panel-default col-md-5';  style='background:black;height:300px;  left:25%; color:white; z-indez:3px; position:fixed; opacity:0.9;'>
		<div >
			<n>Warning</n>
		</div>
		<div class='panel-body'>
			<n>
			Content only for over 18 years
			of age we are not responsible for entering minors
			to this site.<br>
				<img src="assets/logo.png" width='200' stlye='margin:auto'><br>
				<strong style='color:white; margin-left:40%;'>Click here</strong>

			</n>
		</div>





	</div>
	`;


/*
	$('#datos').append(ventana_bienvenida);
	$('#Advertencia').click(function(){

		this.remove();
	});
*/







});