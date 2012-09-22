<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 09:16:46
         compiled from "templates/default/_controller/site/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169231383450076e0ec0c965-73124651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a29adf90aa47d20548a8302fa06c783e15de08e7' => 
    array (
      0 => 'templates/default/_controller/site/sidebar.tpl',
      1 => 1342664138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169231383450076e0ec0c965-73124651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_math')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.math.php';
?><!-- sidebar -->
<aside id="sidebar">
	
	<ul>
		<li class="block">
    		<h4>CATEGORIES</h4>
			<ul style="list-style-type:square;list-style-position:inner;">
				<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fullCategoryList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
?>
					<?php if ($_smarty_tpl->getVariable('category')->value->enable==1){?><li class="cat-item" style="margin-left:<?php echo smarty_function_math(array('equation'=>"x*2",'x'=>$_smarty_tpl->getVariable('category')->value->level),$_smarty_tpl);?>
0px;"><a href="<?php echo $_smarty_tpl->getVariable('category')->value->getPhotoCategoryPath();?>
" title="<?php echo $_smarty_tpl->getVariable('category')->value->title;?>
"><?php echo $_smarty_tpl->getVariable('category')->value->title;?>
</a></li><?php }?>
				<?php }} ?>
				
				
			</ul>
		</li>
		
	</ul>
	
	<em id="corner"></em>
</aside>
<!-- ENDS sidebar -->