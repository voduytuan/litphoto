<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 19:31:49
         compiled from "templates/default/_controller/site/notfound/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14866381935006acb55ceec0-40167166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a8e2c17ce62e05b404f708fed1e30de229528fb' => 
    array (
      0 => 'templates/default/_controller/site/notfound/index.tpl',
      1 => 1339311232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14866381935006acb55ceec0-40167166',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.escape.php';
?>
	<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyWarning',$_smarty_tpl->getVariable('lang')->value['global']['pagenotfound']); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
    
    <div class="notfound_requesturl"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['notfoundRequestUrl'];?>
 <span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('referer')->value);?>
</span></div>
	
	<div style="padding:20px; line-height:2;">
	<h2 style="padding-bottom:0; margin-bottom:0;"><em><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['headline'];?>
</em></h2>
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text1'];?>
</p>
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text2'];?>
</p>
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text3'];?>
</p
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text4'];?>
</p>
    <?php if ($_smarty_tpl->getVariable('recommendurl')->value!=''){?><p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text3'];?>
 <a href="<?php echo $_smarty_tpl->getVariable('recommendurl')->value;?>
"><?php echo $_smarty_tpl->getVariable('recommendurl')->value;?>
</a></p><?php }?>
	</div>
