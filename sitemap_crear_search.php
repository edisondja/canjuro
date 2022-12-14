s<?php
include'logic.php';
#generar sitemap videosegg
$armar ="<?xml version='1.0' encoding='UTF-8'?>
<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'
      xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
      xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'>";
	$fecha = date('Y-m-d H:i:s');


echo $fecha." Creado Mapa del sitio";
$fecha = "2018-11-15T15:41:07+00:00";

	$sql = "select count(titulo)cantidad from posts;";
	$posts = $conexion->query($sql);
	$posts = mysqli_fetch_object($posts);	
	$count_page = 1;
	$posts_count = 0;


	$sql = "select criterio from criterios";
	$data= $conexion->query($sql);

	foreach ($data as $key) {
			
		$url_index = "?search=$key[criterio]";

		$armar.="
			<url>
		 	 <loc>https://videosegg.com/$url_index</loc>
			  <lastmod>$fecha</lastmod>
			  <priority>1.00</priority>
			</url>
			";

	}



$armar.="</urlset>";  
    shell_exec("rm sitemap_search.xml");
	file_put_contents("sitemap_search.xml", $armar);
echo "mapa creado ..";

?>