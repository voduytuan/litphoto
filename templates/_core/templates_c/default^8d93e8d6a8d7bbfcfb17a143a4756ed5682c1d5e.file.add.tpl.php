<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 19:45:01
         compiled from "templates/default/_controller/admin/user/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4056297585006afcdafe893-95394757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d93e8d6a8d7bbfcfb17a143a4756ed5682c1d5e' => 
    array (
      0 => 'templates/default/_controller/admin/user/add.tpl',
      1 => 1342615496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4056297585006afcdafe893-95394757',
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
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menuuser'];?>
</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</li>
</ul>

<div class="page-header" rel="menu_user_list"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</h1></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['userAddToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	<div class="control-group">
		<label class="control-label" for="fgroupid">Group <span class="star_require">*</span></label>
		<div class="controls">
			<select id="fgroupid" name="fgroupid">
				<option value="">- - - -</option>
				<?php  $_smarty_tpl->tpl_vars['groupname'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('userGroups')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['groupname']->key => $_smarty_tpl->tpl_vars['groupname']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['groupname']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->getVariable('formData')->value['fgroupid']==$_smarty_tpl->tpl_vars['key']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
</option>
				<?php }} ?>
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="femail">Email <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="femail" id="femail" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['femail']);?>
" class="">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fpassword">Password <span class="star_require">*</span></label>
		<div class="controls">
			<input type="password" name="fpassword" id="fpassword" />
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fpassword2">Retype Password <span class="star_require">*</span></label>
		<div class="controls">
			<input type="password" name="fpassword2" id="fpassword2" />
		</div>
	</div>
			
	<div class="control-group">
		<label class="control-label" for="ffullname">Fullname <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ffullname" id="ffullname" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ffullname']);?>
" class="">
		</div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formAddSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>
			
	
</form>

