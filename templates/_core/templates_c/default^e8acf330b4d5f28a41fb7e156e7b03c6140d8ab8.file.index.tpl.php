<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 08:30:03
         compiled from "templates/default/_controller/admin/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8841860525006119b7f4889-95708970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8acf330b4d5f28a41fb7e156e7b03c6140d8ab8' => 
    array (
      0 => 'templates/default/_controller/admin/index/index.tpl',
      1 => 1342575001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8841860525006119b7f4889-95708970',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.date_format.php';
?><div class="page-header"><h1>Dashboard</h1></div>

<h3>System Information</h3>
<br />
	
		<table class="table table-striped">
			<tr>
				<td width="200" class="td_right">Server IP :</td>
				<td><?php echo $_smarty_tpl->getVariable('formData')->value['fserverip'];?>
</td>
			</tr>
			<?php if ($_smarty_tpl->getVariable('me')->value->groupid==@GROUPID_ADMIN){?>
			<tr>
				<td class="td_right">Server Name :</td>
				<td><?php echo $_smarty_tpl->getVariable('formData')->value['fserver'];?>
</td>
			</tr>
			<tr>
				<td class="td_right">PHP Version :</td>
				<td><?php echo $_smarty_tpl->getVariable('formData')->value['fphp'];?>
</td>
			</tr>
			
			<tr>
				<td class="td_right">Server Time :</td>
				<td><?php echo smarty_modifier_date_format(time(),$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
</td>
			</tr>
			<?php }?>
		</table>





<div class="clear"></div>