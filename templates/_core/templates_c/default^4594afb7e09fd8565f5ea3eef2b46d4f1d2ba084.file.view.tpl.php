<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 15:33:46
         compiled from "templates/default/_controller/admin/language/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1647102252500674eadd06b9-07254515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4594afb7e09fd8565f5ea3eef2b46d4f1d2ba084' => 
    array (
      0 => 'templates/default/_controller/admin/language/view.tpl',
      1 => 1342599724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1647102252500674eadd06b9-07254515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menulanguage'];?>
</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<div class="page-header" rel="menu_language"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menulanguage'];?>
</h1></div>

<h3><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_list'];?>
</h3>



<div>
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('langPacks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
?>
	<div class="langfolder well span4">
		<div class="langfolder_langpack">
			<?php echo $_smarty_tpl->tpl_vars['language']->value['folder'];?>

		</div>
		<ul class="unstyled">
			<?php  $_smarty_tpl->tpl_vars['groupfiles'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['groupname'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['language']->value['controllergroup']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['groupfiles']->key => $_smarty_tpl->tpl_vars['groupfiles']->value){
 $_smarty_tpl->tpl_vars['groupname']->value = $_smarty_tpl->tpl_vars['groupfiles']->key;
?>
				<li class="langfolder_folder">
					<i class="icon-folder-open"></i> <?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>

					<ul class="unstyled">
						<?php  $_smarty_tpl->tpl_vars['langfile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groupfiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['langfile']->key => $_smarty_tpl->tpl_vars['langfile']->value){
?>
							<li class="langfolder_file">
								<a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
language/edit/folder/<?php echo $_smarty_tpl->tpl_vars['language']->value['folder'];?>
/subfolder/<?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
/file/<?php echo $_smarty_tpl->tpl_vars['langfile']->value;?>
"><i class="icon-file"></i> <?php echo $_smarty_tpl->tpl_vars['langfile']->value;?>
</a>
							</li>
						<?php }} ?>
					</ul>
				</li>
			<?php }} ?>
			
			<?php  $_smarty_tpl->tpl_vars['langfile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['language']->value['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['langfile']->key => $_smarty_tpl->tpl_vars['langfile']->value){
?>
				<li class="langfolder_file">
					<a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
language/edit/folder/<?php echo $_smarty_tpl->tpl_vars['language']->value['folder'];?>
/file/<?php echo $_smarty_tpl->tpl_vars['langfile']->value;?>
"><i class="icon-file"></i> <?php echo $_smarty_tpl->tpl_vars['langfile']->value;?>
</a>
				</li>
			<?php }} ?>
		</ul>
		
	</div>
<?php }} ?>
</div>
	


