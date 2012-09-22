<?php /* Smarty version Smarty-3.0.7, created on 2012-07-18 17:35:47
         compiled from "templates/default/_controller/admin/sessionmanager/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5132552745006918335d514-21988702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c080b91196cbfaaaf8f70df72170f527dca82328' => 
    array (
      0 => 'templates/default/_controller/admin/sessionmanager/index.tpl',
      1 => 1342607741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5132552745006918335d514-21988702',
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
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menusessionmanager'];?>
</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<div class="page-header" rel="menu_sessionmanager"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menusessionmanager'];?>
</h1></div>


<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">Listing</a></li>
		<li><a href="#tab2" data-toggle="tab"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterLabel'];?>
</a></li>
		<?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/<?php echo $_smarty_tpl->getVariable('action')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formViewAll'];?>
</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('action')->value=='index'){?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/indexfull">Full Session</a></li>
		<?php }else{ ?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/index">Distinct IP Session (Exclude Same IP)</a></li>
		<?php }?>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<h3><?php if ($_smarty_tpl->getVariable('action')->value=='index'){?>Distinct<?php }?> Sessions <?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>| Search result <?php }?>(<?php echo $_smarty_tpl->getVariable('total')->value;?>
)</h3>
			
			<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			<form action="" method="post" name="manage" onsubmit="return confirm('Are You Sure ?');">
				<table class="table table-striped">
					
				<?php if (count($_smarty_tpl->getVariable('entries')->value)>0){?>
					<thead>
						<tr>
							<th align="center" width="10"><input class="check-all" type="checkbox" /></th>
							<th align="left"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formSessionIdLabel'];?>
</th>
							<th width="160" align="center"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/ip/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='ip'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formIpAddressLabel'];?>
</a></th>
							<th width="10" align="center"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/agent/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='agent'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formBrowserLabel'];?>
</a></th>
							<th width="10" align="center"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formOsLabel'];?>
</th>
							<th width="110" align="center"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/controller/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='controller'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formPageLabel'];?>
</a></th>
							<th align="center" width="100"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/userid/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='userid'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formLoggedInLabel'];?>
</a></th>
							<th align="center" width="120"><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/dateexpired/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='dateexpired'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formDateExpiredLabel'];?>
</a></th>
							
							<th width="70"></th>
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
									<input type="submit" name="btnDel" class="btn btn-danger" value="<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['deleteSelected'];?>
" />
								</div>
								
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
					<tbody>
				<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('entries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value){
?>
					
						<tr>
							<td align="center"><input type="checkbox" name="delid[]" value="<?php echo $_smarty_tpl->getVariable('entry')->value->id;?>
"/></td>
							<td align="left"><a href="javascript:void(0)" onclick="openEditWindow('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/detail/sid/<?php echo $_smarty_tpl->getVariable('entry')->value->id;?>
/<?php if ($_smarty_tpl->getVariable('formData')->value['fip']!=''){?>fip/<?php echo $_smarty_tpl->getVariable('formData')->value['fip'];?>
/<?php }?><?php if ($_smarty_tpl->getVariable('formData')->value['fsession']!=''){?>fsession/<?php echo $_smarty_tpl->getVariable('formData')->value['fsession'];?>
<?php }?>');" title="<?php echo $_smarty_tpl->getVariable('entry')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('entry')->value->id;?>
</a></td>
							<td align="center" style="font-weight:bold;font-family:'Courier New', Courier, monospace;font-size:14px;">
								<?php echo $_smarty_tpl->getVariable('entry')->value->ipaddress;?>

							</td>
							<td align="center"><img alt="<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('entry')->value->browser->getBrowser(), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('entry')->value->browser->getBrowser(),SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('entry')->value->browser->getBrowser()));?>
" title="<?php echo $_smarty_tpl->getVariable('entry')->value->browser->getBrowser();?>
 <?php echo $_smarty_tpl->getVariable('entry')->value->browser->getVersion();?>
" src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
browsers/<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('entry')->value->browser->getBrowser(), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('entry')->value->browser->getBrowser(),SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('entry')->value->browser->getBrowser()));?>
.png" /></td>
							<td align="center"><img alt="<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('entry')->value->browser->getPlatform(), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('entry')->value->browser->getPlatform(),SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('entry')->value->browser->getPlatform()));?>
" title="<?php echo $_smarty_tpl->getVariable('entry')->value->browser->getPlatform();?>
" src="<?php echo $_smarty_tpl->getVariable('imageDir')->value;?>
browsers/<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('entry')->value->browser->getPlatform(), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('entry')->value->browser->getPlatform(),SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('entry')->value->browser->getPlatform()));?>
.png" width="16" /></td>
							<td align="center">[<b><?php echo $_smarty_tpl->getVariable('entry')->value->controller;?>
&nbsp;</b>/<?php echo $_smarty_tpl->getVariable('entry')->value->action;?>
]</td>
							<td align="center"><?php if ($_smarty_tpl->getVariable('entry')->value->actor->id>0){?><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/edit/id/<?php echo $_smarty_tpl->getVariable('entry')->value->actor->id;?>
" title="<?php echo $_smarty_tpl->getVariable('entry')->value->actor->fullname;?>
"><?php echo $_smarty_tpl->getVariable('entry')->value->actor->fullname;?>
 (#<?php echo $_smarty_tpl->getVariable('entry')->value->actor->id;?>
)</a><?php }else{ ?>--<?php }?></td>
							<td align="center"><span title="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('entry')->value->dateexpired,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
"><?php if ($_smarty_tpl->getVariable('entry')->value->isExpired()){?><span class="label label-important"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formExpiredLabel'];?>
</span><?php }else{ ?><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('entry')->value->dateexpired,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
<?php }?></span></td>
							
							<td width="140">
								<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDetailTooltip'];?>
" onclick="openEditWindow('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/detail/sid/<?php echo $_smarty_tpl->getVariable('entry')->value->id;?>
/<?php if ($_smarty_tpl->getVariable('formData')->value['fip']!=''){?>fip/<?php echo $_smarty_tpl->getVariable('formData')->value['fip'];?>
/<?php }?><?php if ($_smarty_tpl->getVariable('formData')->value['fsession']!=''){?>fsession/<?php echo $_smarty_tpl->getVariable('formData')->value['fsession'];?>
<?php }?>');" class="btn btn-mini"><i class="icon-info-sign"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDetailLabel'];?>
</a> &nbsp;
								<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/kill/sid/<?php echo $_smarty_tpl->getVariable('entry')->value->id;?>
/<?php if ($_smarty_tpl->getVariable('formData')->value['fip']!=''){?>fip/<?php echo $_smarty_tpl->getVariable('formData')->value['fip'];?>
/<?php }?><?php if ($_smarty_tpl->getVariable('formData')->value['fsession']!=''){?>fsession/<?php echo $_smarty_tpl->getVariable('formData')->value['fsession'];?>
<?php }?>');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDeleteLabel'];?>
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
			<form action="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager/<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="form-inline">
					<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formSessionIdLabel'];?>
:
					<input type="text" name="fsession"  id="fsession" value="<?php echo $_smarty_tpl->getVariable('formData')->value['fsession'];?>
"/>
					<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formIpAddressLabel'];?>
:
					<input type="text" name="fip"  id="fip" value="<?php echo $_smarty_tpl->getVariable('formData')->value['fip'];?>
" />
					
					<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterSubmit'];?>
" class="btn btn-primary" />
					<input type="button" name="fclear" onclick="$('#fsession').val('').focus();$('#fip').val('');" class="btn" value="Clear" /></td>       
					
				</tr>
			</table>
			</form>
			
			
			
		</div><!-- end #tab2 -->
	</div>
</div>



<script type="text/javascript">

function openEditWindow(url)
{
	var width = 900;
	var height = 500;
	
	if(screen.width != null && screen.height != null)
	{
		width = screen.width - 10;
		height = screen.height - 20;
	}
	else
	{
		width = $(window).width();
		height = $(window).height();
	}
	
	window.open(url, '', 'toolbar=0,scrollbars=yes,resizable=yes,width='+width+',height='+height+',top=0,left=0');
}



</script>





