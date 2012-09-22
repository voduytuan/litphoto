<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 23:36:57
         compiled from "templates/default/_controller/admin/photocomment/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2996306985006e629436923-19034655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd926b14eaa44ba4e5e067257beb6795c26472d0f' => 
    array (
      0 => 'templates/default/_controller/admin/photocomment/edit.tpl',
      1 => 1342629416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2996306985006e629436923-19034655',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.html_options.php';
?><ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
">Photo Comment</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</li>
</ul>

<div class="page-header" rel="menu_photocomment"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</h1></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['photocommentEditToken'];?>
" />

	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	<div class="control-group">
		<label class="control-label" for="ffullname">Photo</label>
		<div class="controls">
			<span class="help-block"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photo/edit/id/<?php echo $_smarty_tpl->getVariable('myPhotoComment')->value->photo->id;?>
" title="Edit this photo"><?php echo $_smarty_tpl->getVariable('myPhotoComment')->value->photo->title;?>
</a></span>
			<a href="<?php echo $_smarty_tpl->getVariable('myPhotoComment')->value->photo->getImage();?>
" title="View Large Image" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('myPhotoComment')->value->photo->getSmallImage();?>
" /></a>
		</div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="ffullname">Fullname</label>
		<div class="controls">
			<input type="text" name="ffullname" id="ffullname" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ffullname']);?>
" class="">
		</div>
	</div>
		
	<div class="control-group">
		<label class="control-label" for="femail">Email</label>
		<div class="controls">
			<input type="text" name="femail" id="femail" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['femail']);?>
" class="">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fwebsite">Website</label>
		<div class="controls">
			<input type="text" name="fwebsite" id="fwebsite" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fwebsite']);?>
" class="">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="ftext">Comment text</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="ftext" id="ftext"><?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ftext']);?>
</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fstatus">Status</label>
		<div class="controls">
			<select id="fstatus" name="fstatus">
				<?php echo smarty_function_html_options(array('selected'=>$_smarty_tpl->getVariable('formData')->value['fstatus'],'options'=>$_smarty_tpl->getVariable('statusList')->value),$_smarty_tpl);?>

			</select>
		</div>
	</div>
		
				
				
	
			
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formUpdateSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>
           
		
</form>









