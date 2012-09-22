<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 19:31:40
         compiled from "templates/default/_controller/admin/photocategory/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20478018195006acac46abf2-77665993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1612d09ba0cb58336d53159c067062bcb4607cce' => 
    array (
      0 => 'templates/default/_controller/admin/photocategory/edit.tpl',
      1 => 1342614697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20478018195006acac46abf2-77665993',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_paginate')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.paginate.php';
if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.date_format.php';
?><ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
">Photo Category</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</li>
</ul>

<div class="page-header" rel="menu_photocategory"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_edit'];?>
</h1></div>

<div class="navgoback"><a href="<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formBackLabel'];?>
</a></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['photocategoryEditToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	<div class="control-group">
		<label class="control-label" for="fparentid">Parent Category</label>
		<div class="controls">
			<select id="fparentid" name="fparentid">
				<option value="0">- - - - - - - - - - - - - - - - - - -</option>
				<?php  $_smarty_tpl->tpl_vars['parentCat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('parentCategories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['parentCat']->key => $_smarty_tpl->tpl_vars['parentCat']->value){
?>
					<?php if ($_smarty_tpl->getVariable('parentCat')->value->id!=$_smarty_tpl->getVariable('formData')->value['fid']){?>
					<option value="<?php echo $_smarty_tpl->getVariable('parentCat')->value->id;?>
" title="<?php echo $_smarty_tpl->getVariable('parentCat')->value->title;?>
" <?php if ($_smarty_tpl->getVariable('parentCat')->value->id==$_smarty_tpl->getVariable('formData')->value['fparentid']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('parentCat')->value->title;?>
</option>
					<?php }?>
				<?php }} ?>
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="ftitle">Title <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ftitle" id="ftitle" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ftitle']);?>
">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fslug">SEO URL Slug</label>
		<div class="controls">
			<input type="text" name="fslug" id="fslug" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fslug']);?>
">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fdescription">Description</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="fdescription" id="fdescription"><?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fdescription']);?>
</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fenable"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formShowLabel'];?>
</label>
		<div class="controls">
			<select class="input-small" name="fenable" id="fenable">
				<option value="1"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formYesLabel'];?>
</option>
				<option value="0" <?php if ($_smarty_tpl->getVariable('formData')->value['fenable']=='0'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formNoLabel'];?>
</option>
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


<hr />

<!--- SUBCATEGORY LISTING -->
<div class="well">
	<a class="pull-right btn btn-success" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/add/parentid/<?php echo $_smarty_tpl->getVariable('formData')->value['fid'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_addsub'];?>
</a>

	<h3><?php echo $_smarty_tpl->getVariable('formData')->value['ftitle'];?>
 :: <?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_subcat'];?>
 (<?php echo count($_smarty_tpl->getVariable('subcategories')->value);?>
)</h3>



<form action="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
?returncategory=<?php echo $_smarty_tpl->getVariable('formData')->value['fid'];?>
" method="post" name="manage" class="form-inline" onsubmit="return confirm('Are You Sure ?');">
	<input type="hidden" name="ftoken" value="<?php echo $_SESSION['photocategoryBulkToken'];?>
" />
	<table class="table table-striped">
		
	<?php if (count($_smarty_tpl->getVariable('subcategories')->value)>0){?>
		<thead>
			<tr>
			   <th width="40"><input class="check-all" type="checkbox" /></th>
				<th width="30">ID</th>
				<th width="100">Display Order</th>
				<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formTitleLabel'];?>
</th>	
                         <th width="100"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formShowLabel'];?>
</th>
				<th width="120"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formDateModifiedLabel'];?>
</th>
				<th width="140"></th>
			</tr>
		</thead>
		
		<tfoot>
			<tr>
				<td colspan="8">
					<div class="pagination">
					   <?php $_smarty_tpl->tpl_vars["pageurl"] = new Smarty_variable("page/::PAGE::", null, null);?>
						<?php echo smarty_function_paginate(array('count'=>$_smarty_tpl->getVariable('totalPage')->value,'curr'=>$_smarty_tpl->getVariable('curPage')->value,'lang'=>$_smarty_tpl->getVariable('paginateLang')->value,'max'=>10,'url'=>($_smarty_tpl->getVariable('paginateurl')->value).($_smarty_tpl->getVariable('pageurl')->value)),$_smarty_tpl);?>

					</div> <!-- End .pagination -->
					
					
					<div class="bulk-actions align-left">
						<select name="fbulkaction">
							<option value=""><?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionSelectLabel'];?>
</option>
							<option value="delete"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionDeletetLabel'];?>
</option>
						</select>
						<input type="submit" name="fsubmitbulk" class="btn btn-primary" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionSubmit'];?>
" />
						<input type="submit" name="fchangeorder" class="btn" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formChangeOrderSubmit'];?>
" />
					</div>
					
					<div class="clear"></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcategories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
?>
		
			<tr>
				<td><input type="checkbox" name="fbulkid[]" value="<?php echo $_smarty_tpl->getVariable('category')->value->id;?>
" <?php if (in_array($_smarty_tpl->getVariable('category')->value->id,$_smarty_tpl->getVariable('formData')->value['fbulkid'])){?>checked="checked"<?php }?>/></td>
				<td style="font-weight:bold;"><?php echo $_smarty_tpl->getVariable('category')->value->id;?>
</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->getVariable('category')->value->displayorder;?>
" name="fdisplayorder[<?php echo $_smarty_tpl->getVariable('category')->value->id;?>
]" class="input-mini" /></td>
				<td><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/edit/id/<?php echo $_smarty_tpl->getVariable('category')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('category')->value->title;?>
</a>
					<?php if (count($_smarty_tpl->getVariable('category')->value->sub)>0){?>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['subcat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category')->value->sub; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subcat']->key => $_smarty_tpl->tpl_vars['subcat']->value){
?>
								<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/edit/id/<?php echo $_smarty_tpl->getVariable('subcat')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('subcat')->value->title;?>
</a></li>
							<?php }} ?>
						</ul>
					<?php }?>
				</td>
				 
				<td class="td_center"><?php if ($_smarty_tpl->getVariable('category')->value->enable==1){?><span class="label label-success"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formYesLabel'];?>
</span><?php }else{ ?><span class="label label-important"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formNoLabel'];?>
</span><?php }?></td>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('category')->value->datecreated,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatSmarty']);?>
</td>
				<td><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/edit/id/<?php echo $_smarty_tpl->getVariable('category')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
" class="btn btn-mini"><i class="icon-pencil"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formEditLabel'];?>
</a> &nbsp;
					<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/delete/id/<?php echo $_smarty_tpl->getVariable('category')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
?token=<?php echo $_SESSION['securityToken'];?>
');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDeleteLabel'];?>
</a>
				</td>
			</tr>
			

		<?php }} ?>
		</tbody>
		
	  
	<?php }else{ ?>
		<tr>
			<td colspan="10"> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['notfound'];?>
</td>
		</tr>
	<?php }?>
	
	</table>
</form>
</div>

