<?php
	require('components/component_head.php');

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
							
						  <div style="text-align: center;">
						  <script type="application/javascript" data-idzone="4396902" src="https://a.realsrv.com/nativeads-v2.js" ></script>
						</div>
						

					<?php

						//print_r($conexion);

					
							Video::only_fans_videos();
							//Video::crear_paginacion(0,"","search_paginacion",$_GET['search']);
						
				
					?>

						
					
					
				
					
							



			<!-- footer -->
			<?php
			require('components/component_footer.php');
			?>

		


<script type="application/javascript" src="https://syndication.realsrv.com/splash.php?idzone=4396892&capping=0"></script>

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
