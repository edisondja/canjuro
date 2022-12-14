 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description"   content="Dowanlod video  from to mp3 convert video mp3" charset="utf-8">
	<title>Conver your video to mp3</title>
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="https://syndication.exosrv.com/splash.php?idzone=2920006&capping=0"></script>
	<script>
		$('document').ready(function(){

					$('#convert').click(function(){

							$('#load').html(`<img src='../assets/loading.gif' style='height:50px; width:50px;'>`);


					});




		});

	</script>

 </head>
 <body>
 	<div class="container-fluid">
 			<div class="row" style="background:black; height:120px; color:white;"> 
 							<script type="text/javascript">
						var ad_idzone = "2920002",
							 ad_width = "300",
							 ad_height = "100";
						</script>
						<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
						<noscript><iframe src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920002&output=noscript&type=300x100" width="300" height="100" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
						</noscript>
		 			
 		
			

 			</div>
 			<div class="row">
 				<div class="col-md-3"></div>
 				<div class="col-md-5">
 					<h1>Insert url</h1>	
 					 <img src="../assets/logo.png" style="height:50px; width:280px;margin-left:2%;   margin-top:2%;">

 					<form method="post" action="">
 						<input type="text" name="url_video" class="form-control"><br>
 						<input type="submit" name="convert" class="btn btn-primary" value="Convert to mp3" id="converter">
 					</form>
 					<div id="load">
 						
 					</div>
 					<?php
 						if(isset($_POST['convert'])){


 							$video = $_POST['url_video'];

 						 	$titulo_video =  exec("youtube-dl $video");
 							echo exec("ffmpeg  -i $titulo_video  audio.mp3");


 							echo "<strong>Video convertido .....<strong>";

 						}


 					?>
 	

 				</div>
 				<div class="col-md-3"><br>
 					<script type="text/javascript">
						var ad_idzone = "2920026",
							 ad_width = "300",
							 ad_height = "250";
						</script>
						<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
						<noscript><iframe src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920026&output=noscript&type=300x250" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></noscript>

					<script type="text/javascript">
					var ad_idzone = "2920026",
						 ad_width = "300",
						 ad_height = "250";
					</script>
					<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
					<noscript><iframe src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2920026&output=noscript&type=300x250" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></noscript>
						 				
 				</div>



 	</div>
 </body>
 </html>