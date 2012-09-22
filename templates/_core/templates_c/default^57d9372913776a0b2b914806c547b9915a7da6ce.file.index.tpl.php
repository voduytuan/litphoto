<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 15:27:19
         compiled from "templates/default/_controller/site/about/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14090142255007c4e75065b4-91555516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57d9372913776a0b2b914806c547b9915a7da6ce' => 
    array (
      0 => 'templates/default/_controller/site/about/index.tpl',
      1 => 1342686435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14090142255007c4e75065b4-91555516',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- floated content -->
<div class="floated-content">

	<h2 class="page-heading"><span>About</span></h2>
	
	<a href="http://bloghoctap.com" title="Go to my blog"><img src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
site/about.jpg" alt="" border="0" /></a>
	
	<p>This is my photo blog, created for the demonstration of Litpi PHP Framework.</p>
	
	<p>You can download full source code of this blog (<a href="http://github.com/voduytuan/litphoto" title="Click here to download">Litphoto</a>) or download the only <a href="http://www.litpi.com" title="Go to Litpi Official website">Litpi Framework</a> source code.</p>
	
	
</div>
<!-- ends floated content -->


<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."sidebar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	        	
	        	
			
		