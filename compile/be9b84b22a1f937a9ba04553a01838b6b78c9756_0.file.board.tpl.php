<?php
/* Smarty version 4.2.1, created on 2023-04-06 14:19:18
  from '/var/www/youselft/template/board.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_642f0d26f0ac54_24390066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be9b84b22a1f937a9ba04553a01838b6b78c9756' => 
    array (
      0 => '/var/www/youselft/template/board.tpl',
      1 => 1680805156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f0d26f0ac54_24390066 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/youselft/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>

<div class="col-sm-3"></div>
<div class="col-sm-6" style='margin-bottom:15px;'>



           <div class='card text-white bg-dark mb-3'>
                      <div class='body' style='padding:5px'>
                        <div class='title'><strong><a href='https://youselft.com/profile_user.php?user=<?php echo $_smarty_tpl->tpl_vars['tablero']->value['usuario'];?>
'> <img class='imagenPerfil' src='<?php echo $_smarty_tpl->tpl_vars['dominio']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tablero']->value['foto_url'];?>
'/></a>
                          <?php echo $_smarty_tpl->tpl_vars['tablero']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['tablero']->value['apellido'];?>
 <i class="fa-solid fa-highlighter"></i></strong></div>
                     
                        <p style='padding-left: 10px;'><?php echo $_smarty_tpl->tpl_vars['tablero']->value['descripcion'];?>
​</p>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['dominio']->value;?>
/single_board.php?id=<?php echo $_smarty_tpl->tpl_vars['tablero']->value['id_tablero'];?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['tablero']->value['titulo']," ","_");?>
">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['dominio']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tablero']->value['imagen_tablero'];?>
" style='' class="card-img-top" alt="...">
                        </a>
                      </div>
                      <p class='p'  style='padding:5px;'>
                        
                      </p>

                         <div class="card-footer" style='float:right'>
                              <div style='float:right'>
                                 <i class="fa-solid fa-thumbs-up"style='display:none'></i>
                                <i class="fa-solid fa-bookmark" style='display:none'></i>
                                <i class="fa-regular fa-share-from-square" style='cursor:pointer'></i>
                                <i class="fa-regular fa-thumbs-up" style='cursor:pointer'></i>
                                <i class="fa-regular fa-comment-dots" style='cursor:pointer'></i>
                                <i class="fa-regular fa-bookmark" style='cursor:pointer'></i>
                              </div>
                        </div>
                </div>

  
   
  
</div>
<div class="col-sm-3"></div><?php }
}
