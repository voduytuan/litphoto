<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 16:52:18
         compiled from "templates/default/_controller/admin/sessionmanager/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108806748150068752275086-19074510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95a9d3194af8eb74cd8070bd69d3b1ed91a60a16' => 
    array (
      0 => 'templates/default/_controller/admin/sessionmanager/detail.tpl',
      1 => 1342605136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108806748150068752275086-19074510',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.date_format.php';
?>
<center>
<table width="98%" style="border:1px solid #00CCCC;font-family:Verdana, Arial, Helvetica, sans-serif;">
	<tr>
		<td height="32" bgcolor="#0099FF" align="center" style="font-weight:bold;color:#FFFFFF">
			SESSION ID #<?php echo $_smarty_tpl->getVariable('mySession')->value->id;?>

		</td>
	</tr>
<?php if (count($_smarty_tpl->getVariable('error')->value)==0){?>

	<tr>
		<td>
			<table width="100%" class="tablegrid highlightTable" style="font-size:12px;border-collapse:collapse" cellpadding="5" border="0">
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Session ID</td>
					<td align="left">: <?php echo $_smarty_tpl->getVariable('mySession')->value->id;?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Session Data</td>
					<td align="left">: <?php echo wordwrap($_smarty_tpl->getVariable('mySession')->value->data,60,"\n",true);?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">IP Address</td>
					<td align="left">: <?php echo $_smarty_tpl->getVariable('mySession')->value->ipaddress;?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">HTTP_USER_AGENT</td>
					<td align="left">: <?php echo $_smarty_tpl->getVariable('mySession')->value->agent;?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Browser </td>
					<td align="left">: <img alt="<?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getBrowser();?>
" title="<?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getBrowser();?>
 <?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getVersion();?>
" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/images/browsers/<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('mySession')->value->browser->getBrowser(), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('mySession')->value->browser->getBrowser(),SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('mySession')->value->browser->getBrowser()));?>
.png" /> <?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getBrowser();?>
 <?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getVersion();?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Platform</td>
					<td align="left">: <img alt="<?php echo $_smarty_tpl->getVariable('entry')->value['browser']['platform'];?>
" title="<?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getPlatform();?>
" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/images/browsers/<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('mySession')->value->browser->getPlatform(), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('mySession')->value->browser->getPlatform(),SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('mySession')->value->browser->getPlatform()));?>
.png" /> <?php echo $_smarty_tpl->getVariable('mySession')->value->browser->getPlatform();?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Controller/Action</td>
					<td align="left">: <?php echo $_smarty_tpl->getVariable('mySession')->value->controller;?>
/<?php echo $_smarty_tpl->getVariable('mySession')->value->action;?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Member</td>
					<td align="left">: <?php if ($_smarty_tpl->getVariable('mySession')->value->actor->id==0){?><span style="color:#999999">GUEST</span><?php }else{ ?><?php echo $_smarty_tpl->getVariable('mySession')->value->actor->fullname;?>
<?php }?></td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Created at</td>
					<td align="left">: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('mySession')->value->datecreated,'%H:%M, %d/%m/%Y');?>
</td>
				</tr>
				<tr>
					<td align="right" style="font-weight:bold;" valign="top">Expired at</td>
					<td align="left">: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('mySession')->value->dateexpired,'%H:%M, %d/%m/%Y');?>
</td>
				</tr>
			</table>
		</td>
	</tr>
<?php }?>
</table>


</center>