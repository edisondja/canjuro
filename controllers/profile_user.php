<?php
    require('bootstrap.php');
    require('../models/User.php');
    require('../models/Board.php');

    //cargar_tableros($id_usuario='general',$opcion='json')

    $smarty->assign('content_config','profile');
    $smarty->assign('titulo',"Profile by user ".NAME_SITE);
    $smarty->assign('descripcion',NAME_SITE." plataform free for alls share your contents");
    $smarty->assign('og_imagen',LOGOSITE);
    
    $smarty->assign('url_board',"$dominio/controllers/");


    if(isset($_GET['user'])){

        $profile = new User();
        $data_user = $profile->LoadProfileUser($_GET['user']);
        $get_user_id =  $profile->get_id_from_user($_GET['user']);
        $get_user_id = $get_user_id->id_user;
        $boards = new Board();
        $data = $boards->cargar_tableros($get_user_id,'objects');
        //print_r( $data_user);
        $smarty->assign('boards',$data);
        $smarty->assign('data_profile',$data_user);
        $smarty->display('../template/header.tpl');

    }



?>