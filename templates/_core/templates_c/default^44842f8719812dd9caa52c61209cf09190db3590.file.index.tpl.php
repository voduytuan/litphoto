<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 20:56:31
         compiled from "templates/default/_controller/admin/log/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5993257595006c08f308997-94598012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44842f8719812dd9caa52c61209cf09190db3590' => 
    array (
      0 => 'templates/default/_controller/admin/log/index.tpl',
      1 => 1342619790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5993257595006c08f308997-94598012',
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
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menulog'];?>
</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<div class="page-header" rel="menu_log"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_list'];?>
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
log"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formViewAll'];?>
</a></li>
		<?php }?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			
			<form class="form-inline" action="" method="post" onsubmit="return confirm('Are You Sure ?');">
				<table class="table table-striped" cellpadding="5" width="100%">
					<?php if (count($_smarty_tpl->getVariable('logs')->value)>0){?>
						<thead>
							<tr>
							   <th width="40"><input class="check-all" type="checkbox" /></th>
								<th width="30">ID</th>
								<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formDatecreatedLabel'];?>
</th>
								<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formEmailLabel'];?>
</th>
								<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formTypeLabel'];?>
</th>
								<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formIpLabel'];?>
</th>
								<th></th>
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
									</div>

									
									<div class="clear"></div>
								</td>
							</tr>
						</tfoot>
						<tbody>
					<?php  $_smarty_tpl->tpl_vars['log'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('logs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['log']->key => $_smarty_tpl->tpl_vars['log']->value){
?>

							<tr>
								<td align="center"><input type="checkbox" name="fbulkid[]" value="<?php echo $_smarty_tpl->getVariable('log')->value->id;?>
" <?php if (in_array($_smarty_tpl->getVariable('log')->value->id,$_smarty_tpl->getVariable('formData')->value['fbulkid'])){?>checked="checked"<?php }?>/></td>
								<td align="center"><?php echo $_smarty_tpl->getVariable('log')->value->id;?>
</td>
								<td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('log')->value->datecreated,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
</td>
								<td align="left"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log/index/uid/<?php echo $_smarty_tpl->getVariable('log')->value->uid;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('log')->value->email;?>
</a></td>
								<td align="center"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log/index/type/<?php echo $_smarty_tpl->getVariable('log')->value->type;?>
"><?php echo $_smarty_tpl->getVariable('log')->value->type;?>
</a></td>
								<td align="center"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log/index/ip/<?php echo $_smarty_tpl->getVariable('log')->value->ipaddress;?>
"><?php echo $_smarty_tpl->getVariable('log')->value->ipaddress;?>
</a></td>

								<td align="center"><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDetailTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log/detail/id/<?php echo $_smarty_tpl->getVariable('log')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
" class="btn btn-mini"><i class="icon-info-sign"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDetailLabel'];?>
</a> &nbsp;
									<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log/delete/id/<?php echo $_smarty_tpl->getVariable('log')->value->id;?>
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
							<td colspan="10"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['notfound'];?>
</td>
						</tr>
					<?php }?>
					
					
				
				</table>
			</form>
			
			
		</div><!-- end #tab 1 -->
		<div class="tab-pane" id="tab2">
			<form class="form-inline" action="" method="post" onsubmit="return false;">
	
				User ID:
				<input type="text" name="fuid" id="fuid" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fuid']);?>
" class="input-mini" /> -

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formTypeLabel'];?>
:
				<input type="text" name="ftype" id="ftype" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ftype']);?>
" class="" /> -


				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formIpLabel'];?>
:
				<input type="text" name="fip" id="fip" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fip']);?>
" class="" /> -

				
				<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterSubmit'];?>
" class="btn btn-primary" onclick="gosearch();"  />
		
			</form>
		</div><!-- end #tab2 -->
	</div>
</div>




<script type="text/javascript">
	function gosearch()
	{
		var path = rooturl_admin + "log/index";
		
		
		var uid = $("#fuid").val();
		if(uid.length > 0)
		{
			path += "/uid/" + uid;
		}
		
		var type = $("#ftype").val();
		if(type.length > 0)
		{
			path += "/type/" + type;
		}
		
		
		
	
		var ip = $("#fip").val();
		if(ip.length > 0)
		{
			path += "/ip/" + ip;
		}
		
		
		
		
		document.location.href= path;
	}
</script>











