<?php
	include'logic.php';

	$sitemap = "<?xml version='1.0' encoding='UTF-8'?>
	<urlset
      xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'
      xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'
      xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'>
      ";
      	$data = $conexion->query("select * from posts");
      	$url ="";

      foreach ($data as $key) {
      	
      	$url = Video::url_ready($key['id_post'],$key['titulo']);

     		$sitemap.="<url>
					  <loc>$url</loc>
					  <lastmod>$key[fecha_publicacion]</lastmod>
					  <priority>$key[id_post]</priority>
					</url>";
      }

	


	$sitemap.="<url></urlset>";

	file_put_contents("sitemap2.xml", $sitemap);

?>



