<?php
/* Smarty version 4.2.1, created on 2023-04-11 23:17:08
  from '/var/www/youselft/template/registrer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_643622b49c04c3_31831417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73091117e2bc82396ad71df40b1b2a6a072c1549' => 
    array (
      0 => '/var/www/youselft/template/registrer.tpl',
      1 => 1681269419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_643622b49c04c3_31831417 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-md-3">


</div>


<div class="col-md-6">
        <h3 style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
;">JOIN NOW</h3>

        <form method="post" action="controllers/actions_board.php">
            <strong style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
">Username</strong>
            <input type="text" name="usuario" class="form-control"/></br>
            <strong style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
" >Password</strong>
            <input type="password" name="clave" class="form-control"/></br>
            <strong style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
">Email</strong>
            <input type="text" name="email"  class="form-control"/></br>
            <strong style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
">Name</strong>
            <input type="text" name="name"  class="form-control"/></br>
            <strong style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
" >Last Name</strong>
            <input type="text"  name="last_name" class="form-control"/></br>
            <strong style="color:<?php echo $_smarty_tpl->tpl_vars['color']->value;?>
" >Wirite a micro bio</strong>
            <textarea class="form-control" name="bio">

            </textarea>
            <input type="hidden" name="action" value="create_user"></br>
            <div style="text-align:center;">
                <button class="btn btn-danger">join now</button>
            </div>
            
        </form>



</div><?php }
}
