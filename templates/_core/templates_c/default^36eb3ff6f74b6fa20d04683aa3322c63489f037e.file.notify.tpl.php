<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 07:45:27
         compiled from "templates/default/notify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210021926250036427b4b918-34859515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36eb3ff6f74b6fa20d04683aa3322c63489f037e' => 
    array (
      0 => 'templates/default/notify.tpl',
      1 => 1301969610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210021926250036427b4b918-34859515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (count($_smarty_tpl->getVariable('notifySuccess')->value)>0){?>
<div class="notify-bar notify-bar-success">
	<div class="notify-bar-icon"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/success.png" alt="success" /></div>
	<div class="notify-bar-button<?php if ($_smarty_tpl->getVariable('hidenotifyclose')->value){?> hide<?php }?>"><a href="javascript:void(0);" onclick="javascript:$(this).parent().parent().fadeOut();" title="close"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/close-btn.png" border="0" alt="close" /></a></div>
	<div class="notify-bar-text">
		<?php if (is_array($_smarty_tpl->getVariable('notifySuccess')->value)){?>
			<?php  $_smarty_tpl->tpl_vars['notifySuccessItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifySuccess')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['notifySuccessItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['notifySuccessItem']->iteration=0;
if ($_smarty_tpl->tpl_vars['notifySuccessItem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifySuccessItem']->key => $_smarty_tpl->tpl_vars['notifySuccessItem']->value){
 $_smarty_tpl->tpl_vars['notifySuccessItem']->iteration++;
 $_smarty_tpl->tpl_vars['notifySuccessItem']->last = $_smarty_tpl->tpl_vars['notifySuccessItem']->iteration === $_smarty_tpl->tpl_vars['notifySuccessItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["notifysuccess"]['last'] = $_smarty_tpl->tpl_vars['notifySuccessItem']->last;
?>
				<p><?php echo $_smarty_tpl->tpl_vars['notifySuccessItem']->value;?>
</p>
				<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['notifysuccess']['last']){?><div class="notify-bar-text-sep"></div><?php }?>
			<?php }} ?>
		<?php }else{ ?>
			<p><?php echo $_smarty_tpl->getVariable('notifySuccess')->value;?>
</p>
		<?php }?>
	</div>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('notifyError')->value)>0){?>
<div class="notify-bar notify-bar-error">
	<div class="notify-bar-icon"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/error.png" alt="error" /></div>
	<div class="notify-bar-button<?php if ($_smarty_tpl->getVariable('hidenotifyclose')->value){?> hide<?php }?>"><a href="javascript:void(0);" onclick="javascript:$(this).parent().parent().fadeOut();" title="close"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/close-btn.png" border="0" alt="close" /></a></div>
	<div class="notify-bar-text">
		<?php if (is_array($_smarty_tpl->getVariable('notifyError')->value)){?>
			<?php  $_smarty_tpl->tpl_vars['notifyErrorItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifyError')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['notifyErrorItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['notifyErrorItem']->iteration=0;
if ($_smarty_tpl->tpl_vars['notifyErrorItem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifyErrorItem']->key => $_smarty_tpl->tpl_vars['notifyErrorItem']->value){
 $_smarty_tpl->tpl_vars['notifyErrorItem']->iteration++;
 $_smarty_tpl->tpl_vars['notifyErrorItem']->last = $_smarty_tpl->tpl_vars['notifyErrorItem']->iteration === $_smarty_tpl->tpl_vars['notifyErrorItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["notifyerror"]['last'] = $_smarty_tpl->tpl_vars['notifyErrorItem']->last;
?>
				<p><?php echo $_smarty_tpl->tpl_vars['notifyErrorItem']->value;?>
</p>
				<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['notifyerror']['last']){?><div class="notify-bar-text-sep"></div><?php }?>
			<?php }} ?>
		<?php }else{ ?>
			<p><?php echo $_smarty_tpl->getVariable('notifyError')->value;?>
</p>
		<?php }?>
	</div>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('notifyWarning')->value)>0){?>
<div class="notify-bar notify-bar-warning">
	<div class="notify-bar-icon"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/warning.png" alt="warning" /></div>
	<div class="notify-bar-button<?php if ($_smarty_tpl->getVariable('hidenotifyclose')->value){?> hide<?php }?>"><a href="javascript:void(0);" onclick="javascript:$(this).parent().parent().fadeOut();" title="close"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/close-btn.png" border="0" alt="close" /></a></div>
	<div class="notify-bar-text">
		<?php if (is_array($_smarty_tpl->getVariable('notifyWarning')->value)){?>
			<?php  $_smarty_tpl->tpl_vars['notifyWarningItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifyWarning')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['notifyWarningItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['notifyWarningItem']->iteration=0;
if ($_smarty_tpl->tpl_vars['notifyWarningItem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifyWarningItem']->key => $_smarty_tpl->tpl_vars['notifyWarningItem']->value){
 $_smarty_tpl->tpl_vars['notifyWarningItem']->iteration++;
 $_smarty_tpl->tpl_vars['notifyWarningItem']->last = $_smarty_tpl->tpl_vars['notifyWarningItem']->iteration === $_smarty_tpl->tpl_vars['notifyWarningItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["notifywarning"]['last'] = $_smarty_tpl->tpl_vars['notifyWarningItem']->last;
?>
				<p><?php echo $_smarty_tpl->tpl_vars['notifyWarningItem']->value;?>
</p>
				<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['notifywarning']['last']){?><div class="notify-bar-text-sep"></div><?php }?>
			<?php }} ?>
		<?php }else{ ?>
			<p><?php echo $_smarty_tpl->getVariable('notifyWarning')->value;?>
</p>
		<?php }?>
	</div>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('notifyInformation')->value)>0){?>
<div class="notify-bar notify-bar-info">
	<div class="notify-bar-icon"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/info.png" alt="info" /></div>
	<div class="notify-bar-button<?php if ($_smarty_tpl->getVariable('hidenotifyclose')->value){?> hide<?php }?>"><a href="javascript:void(0);" onclick="javascript:$(this).parent().parent().fadeOut();" title="close"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
notify/close-btn.png" border="0" alt="close" /></a></div>
	<div class="notify-bar-text">
		<?php if (is_array($_smarty_tpl->getVariable('notifyInformation')->value)){?>
			<?php  $_smarty_tpl->tpl_vars['notifyInformationItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('notifyInformation')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['notifyInformationItem']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['notifyInformationItem']->iteration=0;
if ($_smarty_tpl->tpl_vars['notifyInformationItem']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['notifyInformationItem']->key => $_smarty_tpl->tpl_vars['notifyInformationItem']->value){
 $_smarty_tpl->tpl_vars['notifyInformationItem']->iteration++;
 $_smarty_tpl->tpl_vars['notifyInformationItem']->last = $_smarty_tpl->tpl_vars['notifyInformationItem']->iteration === $_smarty_tpl->tpl_vars['notifyInformationItem']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["notifyinformation"]['last'] = $_smarty_tpl->tpl_vars['notifyInformationItem']->last;
?>
				<p><?php echo $_smarty_tpl->tpl_vars['notifyInformationItem']->value;?>
</p>
				<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['notifyinformation']['last']){?><div class="notify-bar-text-sep"></div><?php }?>
			<?php }} ?>
		<?php }else{ ?>
			<p><?php echo $_smarty_tpl->getVariable('notifyInformation')->value;?>
</p>
		<?php }?>
	</div>
</div>
<?php }?>