<?php
    require('bootstrap.php');

    $smarty->assign('content_config','single_board');

    if(isset($_GET['id'])) {
        

        $data_board = (array) Video::cargar_tablero($_GET['id'],'0');
        $multimedias_tableros = (array) Video::cargar_multimedias_de_tablero($_GET['id'],'0');
        $smarty->assign('board',$data_board);
        $smarty->assign('titulo',$data_board['titulo']);
        $smarty->assign('descripcion',$data_board['descripcion']);
        $smarty->assign('id_tablero',$data_board['id_tablero']);
        $smarty->assign('og_imagen',$dominio."/".$data_board['imagen_tablero']);
        $smarty->assign('usuario',$data_board['usuario']);
        $smarty->assign('foto_usuario',$dominio."/".$data_board['foto_url']);
        $smarty->assign('multimedias_t',$multimedias_tableros);
        $smarty->assign('url_board',"$dominio/controllers/single_board.php?id=$_GET[id]");
        $smarty->display('../template/header.tpl');

    }











?>