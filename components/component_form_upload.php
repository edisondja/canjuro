 <!-- Component form -->
 
 <style type="text/css">
 	.menu>li{
 		 float: right;
 		 padding:5px;
 	}


 </style>



   <form method="post"  enctype="multipart/form-data" id="myForm" action="<?php echo $dominio;?>/guardar_video.php">
				<input type="text" maxlength="80" name="titulo" placeholder="titulo del video" class="form-control" required=""><br>
				<strong>Select Category</strong><br><br>
				<div class="panel panel-default">
					<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
						<input type="checkbox"  value="Blonde" name="categoria[]"><strong>Social</strong>
						<input type="checkbox"  value="Historia" name="categoria[]"><strong>Historia</strong>
						<input type="checkbox"  value="Computacion" name="categoria[]"><strong>Computacion</strong>
						<input type="checkbox"  value="Software" name="categoria[]"><strong>Software</strong>
						<input type="checkbox"  value="Comedia" name="categoria[]"><strong>Comedia</strong>
						<input type="checkbox"  value="Parejas" name="categoria[]"><strong>Parejas</strong>
						<input type="checkbox"  value="Valores" name="categoria[]"><strong>Valores</strong>
						<input type="checkbox"  value="Etica" name="categoria[]"><strong>Etica</strong>
						<input type="checkbox"  value="Amoar" name="categoria[]"><strong>Amor</strong>




				</div>
			
				<div class="panel panel-default">
				
				</div>
				<div class="video_text" style="display: none"><span>Video subiendo porfavor espere...</span></div>
				 <div class="progress progress-striped active">
				  <div class="progress-bar bg-warning"  role="progressbar" aria-valuenow="0" aria-valuemin="0" 
				  aria-valuemax="100" style="width: 0%;background:#28a745;">
				    <span class="sr-only">0% Complete</span>
				  </div>
				</div>
				<div class="image"></div>
			
				

				<img src="assets/upload.svg" class="img-responsive" id="upload_v" style="margin-left: 42%" width="80">
				<p style="text-align: center; font-size: 18px;">Select video to upload</p>

				<input type="file" name="videos" class="form-control" id="upload_o" style="display: none;"><br>
				<div id="letras"></div>
				<textarea name="descripcion" id="descripcion" class="form-control" placeholder="descripcion del contenido"></textarea><br>
				 <div class="panel-heading">
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
   		           </div>
					<hr/>
					<b>Deseas ponerle intro a este video?</b>
					<input type="checkbox"  name="intro" value="si"/>
					<hr/>
					

				<input type="submit" class="btn btn-primary" value="Upload Video">

			</form>
			<!-- Component form end-->