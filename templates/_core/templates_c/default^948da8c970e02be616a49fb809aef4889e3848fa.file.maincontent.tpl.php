<?php /* Smarty version Smarty-3.0.7, created on 2012-07-16 10:56:13
         compiled from "templates/default/_controller/admin/maincontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:333589467500390dd3c9185-89607616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '948da8c970e02be616a49fb809aef4889e3848fa' => 
    array (
      0 => 'templates/default/_controller/admin/maincontent.tpl',
      1 => 1272071033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '333589467500390dd3c9185-89607616',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_sslashes')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.sslashes.php';
?>
<?php echo (($tmp = @smarty_modifier_sslashes($_smarty_tpl->getVariable('contents')->value))===null||$tmp==='' ? "No contents" : $tmp);?>

