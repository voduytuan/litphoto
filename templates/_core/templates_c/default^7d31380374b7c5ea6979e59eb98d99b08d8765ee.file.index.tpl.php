<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 13:58:49
         compiled from "templates/default/_controller/admin/photocomment/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:436311465007b029abcf89-47424988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d31380374b7c5ea6979e59eb98d99b08d8765ee' => 
    array (
      0 => 'templates/default/_controller/admin/photocomment/index.tpl',
      1 => 1342681110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '436311465007b029abcf89-47424988',
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
">Photo Comment</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>


<div class="page-header" rel="menu_photocomment"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_list'];?>
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
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formViewAll'];?>
</a></li>
		<?php }?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			
			<form class="form-inline" action="" method="post" onsubmit="return confirm('Are You Sure ?');">
				<table class="table table-striped" cellpadding="5" width="100%">
					<?php if (count($_smarty_tpl->getVariable('photocomments')->value)>0){?>
						<thead>
							<tr>
							   <th width="40"><input class="check-all" type="checkbox" /></th>
								<th align="left" width="30"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/id/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='id'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>">ID</a></th>	
	                            <th align="center" width="120">Poster</th>
	                            <th align="left">Comment</th>		
								<th>Status</th>
	                            <th align="left" width="80">Photo</th>
	                            <th width="150">Date created</th>
								<th width="140"></th>
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
					<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('photocomments')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>

							<tr>
								<td align="center"><input type="checkbox" name="fbulkid[]" value="<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
" <?php if (in_array($_smarty_tpl->getVariable('comment')->value->id,$_smarty_tpl->getVariable('formData')->value['fbulkid'])){?>checked="checked"<?php }?>/></td>
								<td style="font-weight:bold;"><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
comment/edit/id/<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
</a></td>

	                            <td class="td_left"><strong><?php echo $_smarty_tpl->getVariable('comment')->value->fullname;?>
<br /><small><?php echo $_smarty_tpl->getVariable('comment')->value->email;?>
</small></strong><br /><small><a class="ip2location" target="_blank" href="http://www.ip2location.com/<?php echo $_smarty_tpl->getVariable('comment')->value->ipaddress;?>
" title="Trace this IP Address"><?php echo $_smarty_tpl->getVariable('comment')->value->ipaddress;?>
</a></small></td>
								<td><strong><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/index/photoid/<?php echo $_smarty_tpl->getVariable('comment')->value->photo->id;?>
" title="View all comments of this photo"><?php echo $_smarty_tpl->getVariable('comment')->value->photo->title;?>
</a></strong><br />
	                            	<small><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('comment')->value->text);?>
</small>
	                            </td>
								<td><?php if ($_smarty_tpl->getVariable('comment')->value->isStatus('pending')){?><span class="label label-warning">Pending</span><?php }else{ ?><span class="label label-success">Show</span><?php }?></td>
	                            <td class="td_left"><a target="_blank" href="<?php echo $_smarty_tpl->getVariable('comment')->value->photo->getImage();?>
" title="Go to Photo Page"><img src="<?php echo $_smarty_tpl->getVariable('comment')->value->photo->getSmallImage();?>
" alt="cover" style="border:1px solid #ccc;" width="80" /></a></td>



	                            <td class="td_center" ><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('comment')->value->datecreated,"%H:%M, %e/%m/%Y");?>
</td>

								<td><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/edit/id/<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
" class="btn btn-mini"><i class="icon-pencil"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formEditLabel'];?>
</a> &nbsp;
									<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/delete/id/<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
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
				Keyword:
				
				<input type="text" name="fkeyword" id="fkeyword" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fkeyword']);?>
" class="text-input" />
				
				<select name="fsearchin" id="fsearchin">
					<option value="">- - - - - - - - - - - - -</option>
					<option value="fullname" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=='fullname'){?>selected="selected"<?php }?>>Fullname</option>
					<option value="email" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=='email'){?>selected="selected"<?php }?>>Email</option>
					<option value="website" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=='website'){?>selected="selected"<?php }?>>Website</option>
					<option value="text" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=='text'){?>selected="selected"<?php }?>>Text</option>
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
		var path = rooturl_admin + "photocomment/index";
		
		var id = $("#fid").val();
		if(parseInt(id) > 0)
		{
			path += "/id/" + id;
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










