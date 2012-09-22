<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 16:01:34
         compiled from "templates/default/_controller/admin/user/changepassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27744041650067b6e07a034-60327761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a4268b2961193bf738b8a5898fc3b4e88ae0ba8' => 
    array (
      0 => 'templates/default/_controller/admin/user/changepassword.tpl',
      1 => 1342602092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27744041650067b6e07a034-60327761',
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
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_changepassword'];?>
</li>
</ul>

<div class="page-header" rel="menu_user_list"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_changepassword'];?>
</h1></div>

<form action="" method="post" name="myform" class="form-horizontal">

	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		
	<div class="control-group">
		<label class="control-label" for="foldpass"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['oldpass'];?>
 <span class="star_require">*</span></label>
		<div class="controls">
			<input type="password" name="foldpass" id="foldpass">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fnewpass1"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['newpass1'];?>
 <span class="star_require">*</span></label>
		<div class="controls">
			<input type="password" name="fnewpass1" id="fnewpass1">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fnewpass2"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['newpass2'];?>
 <span class="star_require">*</span></label>
		<div class="controls">
			<input type="password" name="fnewpass2" id="fnewpass2">
		</div>
	</div>
		
			
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formUpdateSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>
           
		
</form>


	
	
	
	