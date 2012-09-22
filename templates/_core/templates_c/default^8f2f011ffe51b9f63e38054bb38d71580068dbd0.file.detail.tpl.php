<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 16:18:29
         compiled from "templates/default/_controller/admin/log/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23483393450067f653ddb10-28462502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f2f011ffe51b9f63e38054bb38d71580068dbd0' => 
    array (
      0 => 'templates/default/_controller/admin/log/detail.tpl',
      1 => 1342597957,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23483393450067f653ddb10-28462502',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.date_format.php';
?><ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menulog'];?>
</a> <span class="divider">/</span></li>
	<li class="active">Detail</li>
</ul>

<div class="page-header" rel="menu_log"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_detail'];?>
 : #<?php echo $_smarty_tpl->getVariable('log')->value->id;?>
</h1></div>

<div class="navgoback">
<a href="<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formBackLabel'];?>
</a>
</div>

<h3><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_detail'];?>
</h3>


<table class="table table-striped">
	<tr>
		<td class="td_right"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formTypeLabel'];?>
 :</strong></td>
		<td><?php echo $_smarty_tpl->getVariable('log')->value->type;?>
</td>
	</tr>
    
	<tr>
		<td width="150" class="td_right"><strong>Entry ID :</strong></td>
		<td><?php echo $_smarty_tpl->getVariable('log')->value->id;?>
</td>
	</tr>
	<tr>
		<td class="td_right"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formEmailLabel'];?>
 :</strong></td>
		<td><?php echo $_smarty_tpl->getVariable('log')->value->email;?>
 (UID: <?php echo $_smarty_tpl->getVariable('log')->value->uid;?>
)</td>
	</tr>
	
	
	<tr>
		<td class="td_right"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formIpLabel'];?>
 :</strong></td>
		<td><?php echo $_smarty_tpl->getVariable('log')->value->ipaddress;?>
</td>
	</tr>
	
	<tr>
		<td class="td_right"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formDatecreatedLabel'];?>
 :</strong></td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('log')->value->datecreated,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
</td>
	</tr>
	
	<tr>
		<td class="td_right"><strong><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formMoreDataLabel'];?>
 :</strong></td>
		<td>
			<ul>
				<li><em><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formMainIdLabel'];?>
</em>: <?php echo $_smarty_tpl->getVariable('log')->value->mainid;?>
</li>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('log')->value->moredata; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><em><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</em>: <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</li>
			<?php }} ?>
			</ul>
		</td>
	</tr>
	
	<tr>
		<td></td>
		<td><a class="btn btn-danger" title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log/delete/id/<?php echo $_smarty_tpl->getVariable('log')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('encodedRedirectUrl')->value;?>
?token=<?php echo $_SESSION['securityToken'];?>
');"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDeleteLabel'];?>
</a></td>
	</tr>
	
</table>

