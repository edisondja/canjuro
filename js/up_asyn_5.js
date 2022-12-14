/** APP: Ajax Image uploader with progress bar
    Website:packetcode.com
    Author: Krishna TEja G S
    Date: 29th April 2014
***/

$(function(){
	 
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
	 						$('#dataMain').html("<br><br><h3>Felicidades su video ha sido publicado con exito !<hr></h3>");



	 			},2000);

	 			// show the image after success
	 	}
	 });

	 //set the progress bar to be hidden on loading
	 $(".progress").hide();


});