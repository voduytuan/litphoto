<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 11:00:47
         compiled from "templates/default/_controller/admin/notify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89879453500634efb15812-42500012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2da0c689671ee8b21d448457af7e8321da9de14b' => 
    array (
      0 => 'templates/default/_controller/admin/notify.tpl',
      1 => 1342584045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89879453500634efb15812-42500012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (count($_smarty_tpl->getVariable('notifySuccess')->value)>0){?>
<div class="alert alert-success">
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<h4 class="alert-heading">Success!</h4>
	<?php if (is_array($_smarty_tpl->getVariable('notifySuccess')->value)){?>
		<?php  $_smarty_tpl->tpl_vars['notifySuccessItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifySuccess')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifySuccessItem']->key => $_smarty_tpl->tpl_vars['notifySuccessItem']->value){
?>
			<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->tpl_vars['notifySuccessItem']->value;?>
</p>
		<?php }} ?>
	<?php }else{ ?>
		<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->getVariable('notifySuccess')->value;?>
</p>
	<?php }?>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('notifyError')->value)>0){?>
<div class="alert alert-error">
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<h4 class="alert-heading">Error!</h4>
	<?php if (is_array($_smarty_tpl->getVariable('notifyError')->value)){?>
		<?php  $_smarty_tpl->tpl_vars['notifyErrorItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifyError')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifyErrorItem']->key => $_smarty_tpl->tpl_vars['notifyErrorItem']->value){
?>
			<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->tpl_vars['notifyErrorItem']->value;?>
</p>
		<?php }} ?>
	<?php }else{ ?>
		<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->getVariable('notifyError')->value;?>
</p>
	<?php }?>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('notifyWarning')->value)>0){?>
<div class="alert alert-block">
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<h4 class="alert-heading">Warning!</h4>
	<?php if (is_array($_smarty_tpl->getVariable('notifyWarning')->value)){?>
		<?php  $_smarty_tpl->tpl_vars['notifyWarningItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifyWarning')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifyWarningItem']->key => $_smarty_tpl->tpl_vars['notifyWarningItem']->value){
?>
			<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->tpl_vars['notifyWarningItem']->value;?>
</p>
		<?php }} ?>
	<?php }else{ ?>
		<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->getVariable('notifyWarning')->value;?>
</p>
	<?php }?>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('notifyInformation')->value)>0){?>
<div class="alert alert-info">
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	<h4 class="alert-heading">Information!</h4>
	<?php if (is_array($_smarty_tpl->getVariable('notifyInformation')->value)){?>
		<?php  $_smarty_tpl->tpl_vars['notifyInformationItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifyInformation')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifyInformationItem']->key => $_smarty_tpl->tpl_vars['notifyInformationItem']->value){
?>
			<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->tpl_vars['notifyInformationItem']->value;?>
</p>
		<?php }} ?>
	<?php }else{ ?>
		<p><i class="icon-chevron-right"></i> <?php echo $_smarty_tpl->getVariable('notifyInformation')->value;?>
</p>
	<?php }?>
</div>
<?php }?>