<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 19:44:58
         compiled from "templates/default/_controller/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21025936695006afca0f99c2-83121746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '363865d4f1b3a6db312c9db889d188ddd8cba4e7' => 
    array (
      0 => 'templates/default/_controller/admin/header.tpl',
      1 => 1342615481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21025936695006afca0f99c2-83121746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title><?php echo $_smarty_tpl->getVariable('lang')->value['default']['adminPanel'];?>
 &raquo; <?php echo (($tmp = @$_smarty_tpl->getVariable('pageTitle')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('lang')->value['default']['menuDashboard'] : $tmp);?>
</title>
		
		<!-- Bootstrap Stylesheet -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
	  
		<!-- Bootstrap Responsive Stylesheet -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/bootstrap/css/bootstrap-responsive.min.css" type="text/css" media="screen" />
        
		<!-- Customized Admin Stylesheet -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/css/admin/mystyle.css" type="text/css" media="screen" />
        
		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/js/jquery.js"></script>
		
		<!-- Bootstrap Js -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/bootstrap/js/bootstrap.min.js"></script>
		
		
		<!-- customized admin -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/js/admin/admin.js"></script>
		
		
        <script type="text/javascript">
		var rooturl = "<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
";
		var rooturl_admin = "<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
";
		var controllerGroup = "<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
";
		var currentTemplate = "<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
";
		var delConfirm = "Are You Sure?";
		var delPromptYes = "Type YES to continue";
		</script>
		
	</head>
    
    <body>
	
		<div class="navbar navbar-fixed-top">
		   <div class="navbar-inner">
	        <div class="container-fluid">
	          <a class="brand" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
" title="Go to Dashboard">Litpi Control Panel</a>
	          <div class="btn-group pull-right">
	            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
	              <i class="icon-user"></i> <?php echo $_smarty_tpl->getVariable('me')->value->fullname;?>

	              <span class="caret"></span>
	            </a>
	            <ul class="dropdown-menu">
	              <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/edit/id/<?php echo $_smarty_tpl->getVariable('me')->value->id;?>
"><i class="icon-pencil"></i> Edit Profile</a></li>
				  <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/changepassword/id/<?php echo $_smarty_tpl->getVariable('me')->value->id;?>
"><i class="icon-lock"></i> Change Password</a></li>
	              <li class="divider"></li>
	              <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
site/logout"><i class="icon-off"></i> Sign Out</a></li>
	            </ul>
	          </div>
	          <div class="nav-collapse">
			    <ul class="nav">
	              <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
">Website</a></li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
		
		<div class="container-fluid">
		  <div class="row-fluid">
	        <div class="span2">
	          <div class="well sidebar-nav">
	            <ul class="nav nav-list" id="sidebar">
	              <li class="nav-header"><i class="icon-user"></i> User</li>
	              <li id="menu_user_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user">View all users</a></li>
				  <li id="menu_log"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log">Moderator Log</a></li>
				
	              <li class="nav-header"><i class="icon-picture"></i> Photo</li>
				  <li id="menu_photo_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photo">View all photos</a></li>
				  <li id="menu_photo_add"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photo/add">Upload photo</a></li>
				  <li id="menu_photocategory"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photocategory">Categories</a></li>
				  <li id="menu_photocomment"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photocomment">Comments</a></li>
				
				  <li class="nav-header"><i class="icon-wrench"></i> Utility</li>
	              <li id="menu_language"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
language">Language Editor</a></li>
	              <li id="menu_sessionmanager"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager">Session Manager</a></li>
	
				  
	            </ul>
	          </div><!--/.well -->
	        </div><!--/span-->
	        <div class="span10" id="container">
