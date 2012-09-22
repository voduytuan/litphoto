<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 23:53:28
         compiled from "templates/default/_controller/admin/photocategory/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16446036205006ea0825e3f9-69270386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3b2f58604268f7e38f0ba7cf9343186dc303a8d' => 
    array (
      0 => 'templates/default/_controller/admin/photocategory/index.tpl',
      1 => 1342630406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16446036205006ea0825e3f9-69270386',
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
">Photo Categories</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<a class="pull-right btn btn-success" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/add"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</a>

<div class="page-header" rel="menu_photocategory"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_list'];?>
</h1></div>


<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_list'];?>
 <?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>| <?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_listSearch'];?>
 <?php }?>(<?php echo $_smarty_tpl->getVariable('total')->value;?>
)</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			
			
			

			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

			<form action="" method="post" name="manage" class="form-inline" onsubmit="return confirm('Are You Sure ?');">
				<input type="hidden" name="ftoken" value="<?php echo $_SESSION['photocategoryBulkToken'];?>
" />
				<table class="table table-striped">
		
				<?php if (count($_smarty_tpl->getVariable('categories')->value)>0){?>
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
									<input type="submit" name="fsubmitbulk" class="btn" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionSubmit'];?>
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
 $_from = $_smarty_tpl->getVariable('categories')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

		</div><!-- end #tab 1 -->

	</div>
</div>
			
			
			


