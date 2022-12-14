<?php
	require('components/component_head.php');

?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
					
							
							<div style="text-align: center;">
							 <!-- ads 1
								<script async type="application/javascript" src="https://a.realsrv.com/ad-provider.js"></script> 
								<ins class="adsbyexoclick" data-zoneid="4396876"></ins> 
								<script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script> </br>

															<script type="text/javascript">
									atOptions = {
										'key' : '240bbfe88de0b118701f5a5ab79350c7',
										'format' : 'iframe',
										'height' : 50,
										'width' : 320,
										'params' : {}
									};
									document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.variouscreativeformats.com/240bbfe88de0b118701f5a5ab79350c7/invoke.js"></scr' + 'ipt>');
								</script>
							-->
							</div>

						<?php


							if(isset($_GET['search'])){

								if($search!=""){

								     echo "<h1>Result of $_GET[search]</h1>";
								}
							}else{

								if(isset($_GET['tag'])){

									echo "<h1>Results hashtag #$_GET[tag]</h1>";

								}else{


								  echo "<h1 style='color:white'>Thots Baddies from United Kingdom</h1>";

								}



							}


						?>	



						<style type="text/css">
								.contedor_botones{
									font-size:18px;
									width: 850px;
									overflow-x: scroll;
								}

								@media only screen and (max-width:600px){
										.contedor_botones{
											width: 350px; 
											overflow-x: scroll; 
											font-size:18px;
										}
								}

							</style>
							<?php

							if(!isset($_GET['page']) && !isset($_GET['search']) && !isset($_GET['tag'])){
									
									Video::estadistica_video(0,'top_general',true);
						    }
						    ?>


					<!--	ads 2	
						<script type="application/javascript"
			       		data-idzone="4396896"
							data-branding_enabled="0"
							src="https://a.realsrv.com/video-outstream.js" async
						></script>
						-->
					<?php



						//print_r($conexion);

						if(isset($_GET['search'])){


							Video::search_video($_GET['search']);
							//Video::crear_paginacion(0,"","search_paginacion",$_GET['search']);


						}
						if(!isset($_GET['page']) && !isset($_GET['categoria']) && !isset($_GET['search']) &&!isset($_GET['tag']) ){
							Video::videos_read();	

							Video::crear_paginacion();

						}else if(isset($_GET['page']) && !isset($_GET['categoria']) && !isset($_GET['search'])){



							Video::read_page($_GET['page']);

							Video::crear_paginacion($_GET['page']);



						}else if( isset($_GET['categoria'])){


							if(!isset($_GET['page'])){
								//echo "<H2 style='color:White'>HOLA QUE ES ESTO</H2>";


								Video::read_page(0,$_GET['categoria'],"read_category");
								Video::crear_paginacion(0,$_GET['categoria'],"categoria_page");
							
							}else{
								Video::read_page($_GET['page'],$_GET['categoria'],"read_category");
								Video::crear_paginacion($_GET['page'],$_GET['categoria'],"categoria_page");
							}

						}else if(  isset($_GET['tag'])){

							
							Video::search_video($_GET['tag'],"hashtag");

						
						}
					




				
					?>

				


								<!--	ads 3

								<script type="application/javascript"
									data-idzone="4396896"
									src="https://a.realsrv.com/video-outstream.js" async
								></script>
								-->	
					
							</div>

					</div>

					<!--	ads 4	
							<div style="text-align: center;">
							
																<script async type="application/javascript" src="https://a.realsrv.com/ad-provider.js"></script> 
									<ins class="adsbyexoclick" data-zoneid="4396888"></ins> 
									<script>(AdProvider = window.AdProvider || []).push({"serve": {}});</script> </br>

																<script type="text/javascript">
										atOptions = {
											'key' : '553f47e44cb140310febb7a11f93e14e',
											'format' : 'iframe',
											'height' : 250,
											'width' : 300,
											'params' : {}
										};
										document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.variouscreativeformats.com/553f47e44cb140310febb7a11f93e14e/invoke.js"></scr' + 'ipt>');
									</script>								

								</div>			

								<script type="application/javascript" src="https://syndication.realsrv.com/splash.php?idzone=4396892&capping=0"></script>	
						
							
						
						<div class="clearfix"> </div>
					-
					
			</div>
			 footer -->
			<?php
				require('components/component_footer.php');
			?>
  </body>
  	<style type="text/css">
        	.paginador{
        			margin-left: 38%;

        	 }
        	@media screen and (max-width:600px){
        		.paginador{
        	 	    margin-left:0px;
        	     }
        	}

        	
        	@media screen and (min-width:1024px){

        		.paginador{
        			margin-left: 38%;
        		}
        	}

  	</style>
</html>
