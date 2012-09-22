<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 15:29:34
         compiled from "templates/default/_controller/site/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10740418575007c56e6cd8a4-17051688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea5e4eb531c2fc175743bba5d5be10ef62e9150b' => 
    array (
      0 => 'templates/default/_controller/site/header.tpl',
      1 => 1342686572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10740418575007c56e6cd8a4-17051688',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escapequote')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.escapequote.php';
?><!doctype html>
<html class="no-js">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
favicon.ico"/>
<title><?php if ($_smarty_tpl->getVariable('pageTitle')->value!=''){?><?php echo $_smarty_tpl->getVariable('pageTitle')->value;?>
 | <?php echo $_smarty_tpl->getVariable('setting')->value['site']['heading'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('setting')->value['site']['defaultPageTitle'];?>
<?php }?></title>
<meta name="author" content="Vo Duy Tuan, tuanmaster2002@yahoo.com" />
<meta name="keywords" content="<?php echo (($tmp = @$_smarty_tpl->getVariable('pageKeyword')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('setting')->value['site']['defaultPageKeyword'] : $tmp);?>
" />
<meta name="description" content="<?php echo smarty_modifier_escapequote((($tmp = @$_smarty_tpl->getVariable('pageDescription')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('setting')->value['site']['defaultPageDescription'] : $tmp));?>
" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
		
<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
min/?g=css&ver=<?php echo $_smarty_tpl->getVariable('setting')->value['site']['cssversion'];?>
" media="screen" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
min/?g=jquery&ver=<?php echo $_smarty_tpl->getVariable('setting')->value['site']['jsversion'];?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
min/?g=js&ver=<?php echo $_smarty_tpl->getVariable('setting')->value['site']['jsversion'];?>
"></script>

</head>
<body>
	
	<header class="clearfix">
	

		<div class="wrapper">
			<a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
" id="logo"><img  src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
site/litphotologo.png" alt="Zeni"></a>
			
			<nav>
				<ul id="nav" class="sf-menu">
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=='index'){?> class="current-menu-item"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
">GALLERY</a>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fullCategoryList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
?>
								<?php if ($_smarty_tpl->getVariable('category')->value->parentid==0&&$_smarty_tpl->getVariable('category')->value->enable==1){?><li><a href="<?php echo $_smarty_tpl->getVariable('category')->value->getPhotoCategoryPath();?>
" title="<?php echo $_smarty_tpl->getVariable('category')->value->title;?>
"><?php echo $_smarty_tpl->getVariable('category')->value->title;?>
</a></li><?php }?>
							<?php }} ?>
							
						</ul>
					</li>
					<li<?php if ($_smarty_tpl->getVariable('controller')->value=='about'){?> class="current-menu-item"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
about.php">ABOUT</a></li>
					<li><a href="http://github.com/voduytuan/litphoto">DOWNLOAD (Github)</a></li>
				</ul>
			</nav>
			<div id="combo-holder"></div>
		</div>
	</header>
	
	
	<!-- MAIN -->
	<div id="main">	
		<div class="wrapper clearfix">

	