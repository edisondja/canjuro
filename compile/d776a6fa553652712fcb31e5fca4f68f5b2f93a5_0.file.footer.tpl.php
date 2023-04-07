<?php
/* Smarty version 4.2.1, created on 2023-04-06 13:53:23
  from '/var/www/youselft/template/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_642f07138ce123_03397753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd776a6fa553652712fcb31e5fca4f68f5b2f93a5' => 
    array (
      0 => '/var/www/youselft/template/footer.tpl',
      1 => 1669693444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642f07138ce123_03397753 (Smarty_Internal_Template $_smarty_tpl) {
?>
            
            <?php if ($_smarty_tpl->tpl_vars['content_config']->value == 'boards') {?>
              <nav aria-label="Page navigation example" >
                <ul class="pagination"  style="margin-left:30%; margin-top:5px">
                  <li class="page-item" id='retroceder'>
                    <a class="page-link"  style='cursor:pointer' aria-label="Next">
                      <span aria-hidden="true" >Back</span>
                    </a>
                  </li>
                  <li class="page-item" id='avanzar'>
                    <a class="page-link" style='cursor:pointer' aria-label="Next">
                      <span aria-hidden="true" >Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <input type='hidden' id='pagina' value='<?php echo $_smarty_tpl->tpl_vars['pagina']->value;?>
'/>
            <?php } else { ?>
            <?php }?>
            <br><hr>
            <footer class="bg-dark text-center text-white">
          
              
            </footer>
      </div> 
  </body>
</html><?php }
}
