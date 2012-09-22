<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 07:45:27
         compiled from "templates/default/_controller/site/maincontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205781242150036427e738f8-58621551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4609a02cd766e92055e4dca1e4b891d0fe8ddf0d' => 
    array (
      0 => 'templates/default/_controller/site/maincontent.tpl',
      1 => 1275098274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205781242150036427e738f8-58621551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_sslashes')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.sslashes.php';
?><?php echo (($tmp = @smarty_modifier_sslashes($_smarty_tpl->getVariable('contents')->value))===null||$tmp==='' ? "No contents" : $tmp);?>
