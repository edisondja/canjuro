<?php
require('logic.php');
header('Access-Control-Allow-Origin: *');  
header('location:index.php');

	global $conexion;
	$data = Video::cargar_data_video($_GET['id']);
	$titulo = $data->titulo;
	$url_video = "https://videoegg.com/".$data->ruta_video;
	$poster = "https://videosegg.com/".$data->ruta_imagen;
	$url =  Video::url_ready($_GET['id'],$titulo);


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <script src="js/jquery-3.1.1.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css"/>
      <script src="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.js"></script>


	<title>Videosegg</title>
</head>
<body style="background:black;">
	<input type="hidden" id="url_web" value='<?php echo $url;?>'/>
	<div class="container-fluid">
		<div class="row">
				<div class="col-md-12">
					<strong style="color:#DADADA;"><?php  echo $titulo; ?></strong>
					  <div>
					  	<video  style="width:100%; height: 300px;" controls poster="<?php echo $poster; ?>" type='video/mp4' id='video_listo'>
					  		
					  		  <source src="<?php echo $url_video; ?>"  type="video/mp4">

					  	</video>
					  </div>
				</div>
		</div>
		
	    <footer>
	      
		<script type="text/javascript">

			    var testVideo = fluidPlayer(
		        "video_listo",
		        {
		            vastOptions: {
		                "adList": [
		                    {
		                        "roll": "preRoll",
		                        "vastTag": "https://syndication.exoclick.com/splash.php?idzone=3198355"
		                    },
		                    {
		                        "roll": "midRoll",
		                        "vastTag": "https://syndication.exoclick.com/splash.php?idzone=3198355",
		                        "timer": 8
		                    },
		                    {
		                        "roll": "midRoll",
		                        "vastTag": "https://syndication.exoclick.com/splash.php?idzone=3198355",
		                        "timer": 10
		                    },
		                    {
		                        "roll": "postRoll",
		                        "vastTag": "https://syndication.exoclick.com/splash.php?idzone=3198355"
		                    },
		                    {
				                "vAlign" : "bottom",
				                "roll" : "preRoll",
				                "vastTag" : "https://syndication.exosrv.com/splash.php?idzone=3788753"
		            		},
		            		{
				                "vAlign" : "bottom",
				                "roll" : "postRoll",
				                "vastTag" : "https://syndication.exosrv.com/splash.php?idzone=3788753"
		            		}
		                ]
		            },
		            layoutControls: {
		            logo: {
		                imageUrl: 'https://videosegg.com/images/videoseggembed.png', // Default null
		                position: 'top left', // Default 'top left'
		                clickUrl: '<?php echo $url; ?>', // Default null
		                opacity: 0.8, // Default 1
		                mouseOverImageUrl: 'https://videosegg.com/images/star.png', // Default null
		                imageMargin: '10px', // Default '2px'
		                hideWithControls: true, // Default false
		                showOverAds: 'true' // Default false
		            },
		            primaryColor: "#e51c60"

		          }
		        }
		    );		
   </script>
		
  </footer>
</div>
</body>

</html>


