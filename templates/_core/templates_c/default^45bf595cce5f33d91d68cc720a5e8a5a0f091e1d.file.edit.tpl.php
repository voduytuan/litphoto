<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 15:38:12
         compiled from "templates/default/_controller/admin/language/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1725790756500675f409f281-34780355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45bf595cce5f33d91d68cc720a5e8a5a0f091e1d' => 
    array (
      0 => 'templates/default/_controller/admin/language/edit.tpl',
      1 => 1342600666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1725790756500675f409f281-34780355',
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
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</li>
</ul>

<div class="page-header" rel="menu_language"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
 <code><?php echo $_smarty_tpl->getVariable('langFolder')->value;?>
<?php echo $_smarty_tpl->getVariable('folder')->value;?>
/<?php if ($_smarty_tpl->getVariable('subfolder')->value!=''){?><?php echo $_smarty_tpl->getVariable('subfolder')->value;?>
/<?php }?><?php echo $_smarty_tpl->getVariable('file')->value;?>
</code></h1></div>



<form class="form-horizontal" name="manage" action="" method="post">
	
	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	
	<?php  $_smarty_tpl->tpl_vars['node'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fileData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['node']->key => $_smarty_tpl->tpl_vars['node']->value){
?>
		<div class="control-group">
			<label class="control-label" title="<?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
"><code><?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
</code></label>
			<div class="controls">
				<textarea class="input-xxlarge" rows="1" <?php if (count($_smarty_tpl->getVariable('warning')->value)>0){?>disabled="disabled"<?php }?> name="fname[<?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
]"><?php echo $_smarty_tpl->tpl_vars['node']->value['values'];?>
</textarea>
				<?php if ($_smarty_tpl->tpl_vars['node']->value['descr']!=''){?>
					<span class="help-block"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formDescriptionLabel'];?>
:<?php echo $_smarty_tpl->tpl_vars['node']->value['descr'];?>
</span>
				<?php }?>
			</div>
		</div>
	<?php }} ?>

	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<label class="checkbox"><input type="checkbox" name="fsortbyalphabet" value="1"/> <em><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formReorderAlphabetLabel'];?>
</em></label>
		</div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" <?php if (count($_smarty_tpl->getVariable('warning')->value)>0){?>disabled="disabled"<?php }?> value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formUpdateSubmit'];?>
" class="btn btn-primary btn-large">
	</div>
</form>

