<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 15:16:11
         compiled from "templates/default/_controller/admin/user/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1156141880500670cb2ae333-99655035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79eff1a3fe3d6cf57d1984403f9972e217f5790d' => 
    array (
      0 => 'templates/default/_controller/admin/user/edit.tpl',
      1 => 1342597935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1156141880500670cb2ae333-99655035',
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
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</li>
</ul>

<div class="page-header" rel="menu_user_list"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</h1></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['userEditToken'];?>
" />

	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	<?php if ($_smarty_tpl->getVariable('myUser')->value->avatar!=''){?>
	<div class="control-group">
		<label class="control-label">Avatar</label>
		<div class="controls">
			<a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('setting')->value['avatar']['imageDirectory'];?>
<?php echo $_smarty_tpl->getVariable('myUser')->value->avatar;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('setting')->value['avatar']['imageDirectory'];?>
<?php echo $_smarty_tpl->getVariable('myUser')->value->thumbImage();?>
" width="100" border="0" /></a><input type="checkbox" name="fdeleteimage" value="1" />Delete<br />
		</div>
	</div>
	<?php }?>

	<?php if ($_smarty_tpl->getVariable('me')->value->id!=$_smarty_tpl->getVariable('myUser')->value->id){?>
	<div class="control-group">
		<label class="control-label" for="fgroupid">Group</label>
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
	<?php }?>
		
		
	<div class="control-group">
		<label class="control-label" for="femail">Email <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="femail" id="femail" disabled="disabled" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['femail']);?>
" class="">
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
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formUpdateSubmit'];?>
" class="btn btn-large btn-primary" />
		<a href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/resetpass/id/<?php echo $_smarty_tpl->getVariable('myUser')->value->id;?>
')" class="btn btn-info pull-right">Reset Password</a>
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>
           
		
</form>

