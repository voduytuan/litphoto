<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 18:53:40
         compiled from "templates/default/_controller/admin/photocategory/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5244933225006a3c45fbe11-34272061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55bcef3810cefbf8554207670918a0717a7d9319' => 
    array (
      0 => 'templates/default/_controller/admin/photocategory/add.tpl',
      1 => 1342612419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5244933225006a3c45fbe11-34272061',
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
">Photo Category</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</li>
</ul>

<div class="page-header" rel="menu_photocategory"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</h1></div>

<div class="navgoback"><a href="<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formBackLabel'];?>
</a></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['photocategoryAddToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	<div class="control-group">
		<label class="control-label" for="fparentid">Parent Category</label>
		<div class="controls">
			<select id="fparentid" name="fparentid">
				<option value="0">- - - - - - - - - - - - - - - - - - -</option>
				<?php  $_smarty_tpl->tpl_vars['parentCat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('parentCategories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['parentCat']->key => $_smarty_tpl->tpl_vars['parentCat']->value){
?>
					<option value="<?php echo $_smarty_tpl->getVariable('parentCat')->value->id;?>
" title="<?php echo $_smarty_tpl->getVariable('parentCat')->value->title;?>
" <?php if ($_smarty_tpl->getVariable('parentCat')->value->id==$_smarty_tpl->getVariable('formData')->value['fparentid']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('parentCat')->value->title;?>
</option>
				<?php }} ?>
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="ftitle">Title <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ftitle" id="ftitle" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['formData']);?>
">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fslug">SEO URL Slug</label>
		<div class="controls">
			<input type="text" name="fslug" id="fslug" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fslug']);?>
">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fdescription">Description</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="fdescription" id="fdescription"><?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fdescription']);?>
</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fenable"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formShowLabel'];?>
</label>
		<div class="controls">
			<select class="input-small" name="fenable" id="fenable">
				<option value="1"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formYesLabel'];?>
</option>
				<option value="0" <?php if ($_smarty_tpl->getVariable('formData')->value['fenable']=='0'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formNoLabel'];?>
</option>
			</select>
		</div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formAddSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>	
	
</form>


