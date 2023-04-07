<?php
    require('bootstrap.php');

    if( !isset($_GET['boards']) && !isset($_GET['search']) ) {
        
        $smarty->assign('tableros',Video::cargar_tableros($id_usuario='general',$opcion='0'));
        $smarty->assign('pagina',0);
        

    }else if(isset($_GET['boards'])){

        $smarty->assign('tableros',Video::paginar_tableros($_GET['boards']));
        $smarty->assign('pagina',$_GET['boards']);

       
    }else if(isset($_GET['search'])){
        
        $smarty->assign('pagina',0);
        $smarty->assign('tableros',Video::search_tablero($_GET['search']));

    }

    $smarty->assign('content_config','boards');
    $smarty->assign('titulo',"The best boards ".NAME_SITE);
    $smarty->assign('descripcion',NAME_SITE." plataform free for alls share your contents");
    $smarty->assign('og_imagen',LOGOSITE);
    $smarty->assign('url_board',$dominio);
    $smarty->display('../template/header.tpl');
