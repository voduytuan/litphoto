<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 20:55:52
         compiled from "templates/default/_controller/admin/user/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3379078655006c0687c6103-63487412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5449ace40bd3a8193e8e1d147d7896d23a040523' => 
    array (
      0 => 'templates/default/_controller/admin/user/index.tpl',
      1 => 1342619751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3379078655006c0687c6103-63487412',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_paginate')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.paginate.php';
if (!is_callable('smarty_function_html_options')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.html_options.php';
?><ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menuuser'];?>
</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<a class="pull-right btn btn-success" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/add"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</a>

<div class="page-header" rel="menu_user_list"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_list'];?>
</h1></div>


<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_list'];?>
 <?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>| <?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_listSearch'];?>
 <?php }?>(<?php echo $_smarty_tpl->getVariable('total')->value;?>
)</a></li>
		<li><a href="#tab2" data-toggle="tab"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterLabel'];?>
</a></li>
		<?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formViewAll'];?>
</a></li>
		<?php }?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			
			<form class="form-inline" action="" method="post" onsubmit="return confirm('Are You Sure ?');">
				<table class="table table-striped" cellpadding="5" width="100%">
					
				<?php if (count($_smarty_tpl->getVariable('users')->value)>0){?>
					<thead>
						<tr>
						   <th width="40"><input class="check-all" type="checkbox" /></th>
							<th align="left" width="30"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/id/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='id'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>">ID</a></th>	
							<th align="left"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/email/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='email'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>">Email</a></th>		
                            <th align="center"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/group/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='group'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>">Group</a></th>
							<th align="left"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/fullname/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='fullname'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>">Full Name</a></th>				
							<th width="200"></th>
						</tr>
					</thead>
					
					<tfoot>
						<tr>
							<td colspan="9">
								
								
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
								</div>
								
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
					<tbody>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('users')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
					
						<tr>
							<td align="center"><input type="checkbox" name="fbulkid[]" value="<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
" <?php if (in_array($_smarty_tpl->getVariable('user')->value->id,$_smarty_tpl->getVariable('formData')->value['fbulkid'])){?>checked="checked"<?php }?>/></td>
							<td style="font-weight:bold;"><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/edit/id/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->id;?>
</a></td>
							<td><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/edit/id/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('user')->value->email;?>
</a></td>
                            <td align="center"><?php echo $_smarty_tpl->getVariable('user')->value->groupname($_smarty_tpl->getVariable('user')->value->groupid);?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('user')->value->fullname;?>
</td>
							<td><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/edit/id/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
" class="btn btn-mini"><i class="icon-pencil"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formEditLabel'];?>
</a> &nbsp;
								<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/delete/id/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
?token=<?php echo $_SESSION['securityToken'];?>
');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDeleteLabel'];?>
</a>
						</tr>
						
					
				<?php }} ?>
				</tbody>
					
				  
				<?php }else{ ?>
					<tr>
						<td colspan="9"> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['notfound'];?>
</td>
					</tr>
				<?php }?>
				
				</table>
			</form>
			
			
		</div><!-- end #tab 1 -->
		<div class="tab-pane" id="tab2">
			<form class="form-inline" action="" method="post" style="padding:0px;margin:0px;" onsubmit="return false;">
	
				ID: 
				<input type="text" name="fid" id="fid" size="8" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fid']);?>
" class="input-mini" /> - 
				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formKeywordLabel'];?>
:
				
				<input type="text" name="fkeyword" id="fkeyword" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fkeyword']);?>
" class="" />
				
				<select name="fsearchin" id="fsearchin">
					<option value="">- - - - - - - - - - - - -</option>
					<option value="email" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=='email'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formKeywordInEmailLabel'];?>
</option>
					<option value="fullname" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=='fullname'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formKeywordInFullnameLabel'];?>
</option>
				</select>
				
				<select name="fgroupid" id="fgroupid">
					<option value="">- - in Group - -</option>
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->getVariable('userGroups')->value,'selected'=>$_smarty_tpl->getVariable('formData')->value['fgroupid']),$_smarty_tpl);?>

				</select>
				
				
				<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterSubmit'];?>
" class="btn btn-primary" onclick="gosearch();"  />
		
			</form>
		</div><!-- end #tab2 -->
	</div>
</div>




<script type="text/javascript">
	function gosearch()
	{
		var path = rooturl_admin + "user/index";
		
		var id = $("#fid").val();
		if(parseInt(id) > 0)
		{
			path += "/id/" + id;
		}
		
		var groupid = $("#fgroupid").val();
		if(parseInt(groupid) > 0)
		{
			path += "/groupid/" + groupid;
		}
		
		var keyword = $("#fkeyword").val();
		if(keyword.length > 0)
		{
			path += "/keyword/" + keyword;
		}
		
		var keywordin = $("#fsearchin").val();
		if(keywordin.length > 0)
		{
			path += "/searchin/" + keywordin;
		}
		
				
		document.location.href= path;
	}
</script>







