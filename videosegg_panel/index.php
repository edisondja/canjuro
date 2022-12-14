<!DOCTYPE html>
<html>
<head>
<?php
	session_start();

	if(!isset($_SESSION['usuario'])){

			header("location:login_panel.php");

	}


?>
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">

	<title>Vid Admin</title>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  <script src="js/jquery_form.js"></script>
  <!-- JavaScript 
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.rtl.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.rtl.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.rtl.min.css"/>
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.rtl.min.css"/>
-->
	<script src="js/video_panel2199.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Rubias", "Density", { role: "style" } ],
        ["Latinas", 8.94, "#b87333"],
        ["Anal", 10.49, "darkblue"],
        ["Amateur", 30.30, "gold"],
        ["Sexo oral", 100.45, "color: #e5e4e2"],
        ["Trios", 70.45, "color: #e5e4e2"],
        ["Anal", 80.45, "color: #e5e4e2"],
               ["Lesbianas",75.45, "color: pink"],
                      ["Jovenes", 68.45, "color: gold"],
                            ["Hentai", 60.45, "color: purple"],
                                   ["Parodia", 50.45, "color: orange"],
                                          ["Gays", 20.45, "color: pink"],
                                                 ["Uniformes", 54.45, "color: darkred"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Categorias Videosegg",
        width: 1024,
        height: 550,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="height: 80px; background:#42373a">
					<p style="color:white;padding-top:20px;">Videosegg PANEL</p>
					<strong style="color:gold; float: right; margin-top: -2.2%;"> Admin <?php echo $_SESSION['usuario']; ?></strong>
			</div>
		</div>

			<div class="row">
					<div class="col-md-3" style="background:#252021; height:100%;">
						<!--  Menu lateral -->
						<ul style="margin-top: 5px;">
							<li><img src="assets/flash.png" class="menu_element">Publicar entrada</li>

							<li id="video_panel"><img src="assets/flash.png" class="menu_element" >Videos</li>
								
							<li><img src="assets/flash.png" class="menu_element">Busquedas Frecuentes</li>
						     
						    <li><img src="assets/flash.png" class="menu_element">Borrar Archivos</li>

						    <li><img src="assets/flash.png" class="menu_element">Categorias</li>

						    <li><img src="assets/flash.png" class="menu_element">Editar Menu Admin</li>

						    <li><img src="assets/flash.png" class="menu_element">Usuarios</li>


						    <li><img src="assets/burn.png" class="menu_element">Agregar Comportamiento</li>


						    <li id="cerrar_sesion"><img src="assets/flash.png" class="menu_element" >Cerrar Session</li>

						    


						</ul>

					</div>
					<div class="col-md-8" id="dasboard"><br>

						    <div id="columnchart_values" style="width:300px; height: 300px;"></div>

					    <!--Div that will hold the pie chart-->
					    <div id="chart_div"></div>

					
					</div>

			

			</div>


	</div>
</body>
</html>

<style type="text/css">
*{
	text-decoration: none;
	list-style: none;

}
.menu_element{
	margin-top:10px;
	height:30px;
    width: 30px; 
	padding-top: 10px;
	cursor: pointer;
	color:white;
}

li{
 	color:orange;


}
li:hover{
	border-color:orange;
	border :1px solid;
	cursor: pointer;;
	background:#f9e345;
	color:black;
}

</style>