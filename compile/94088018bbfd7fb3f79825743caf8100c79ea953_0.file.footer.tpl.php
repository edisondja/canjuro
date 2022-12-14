<?php
/* Smarty version 4.2.1, created on 2022-11-28 23:44:09
  from 'C:\xampp\htdocs\edtube\template\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63858009eebd64_49825387',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94088018bbfd7fb3f79825743caf8100c79ea953' => 
    array (
      0 => 'C:\\xampp\\htdocs\\edtube\\template\\footer.tpl',
      1 => 1669693444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63858009eebd64_49825387 (Smarty_Internal_Template $_smarty_tpl) {
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
