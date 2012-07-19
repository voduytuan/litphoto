<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo Categories</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<a class="pull-right btn btn-success" href="{$conf.rooturl_admin}{$controller}/add">{$lang.controller.head_add}</a>

<div class="page-header" rel="menu_photocategory"><h1>{$lang.controller.head_list}</h1></div>


<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">{$lang.controller.title_list} {if $formData.search != ''}| {$lang.controller.title_listSearch} {/if}({$total})</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			
			
			

			{include file="`$smartyControllerGroupContainer`notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning}

			<form action="" method="post" name="manage" class="form-inline" onsubmit="return confirm('Are You Sure ?');">
				<input type="hidden" name="ftoken" value="{$smarty.session.photocategoryBulkToken}" />
				<table class="table table-striped">
		
				{if $categories|@count > 0}
					<thead>
						<tr>
						   <th width="40"><input class="check-all" type="checkbox" /></th>
							<th width="30">ID</th>
							<th width="100">Display Order</th>
							<th>{$lang.controller.formTitleLabel}</th>	
			                         <th width="100">{$lang.controller.formShowLabel}</th>
							<th width="120">{$lang.controller.formDateModifiedLabel}</th>
							<th width="140"></th>
						</tr>
					</thead>
		
					<tfoot>
						<tr>
							<td colspan="8">
								<div class="pagination">
								   {assign var="pageurl" value="page/::PAGE::"}
									{paginate count=$totalPage curr=$curPage lang=$paginateLang max=10 url="`$paginateurl``$pageurl`"}
								</div> <!-- End .pagination -->
					
					
								<div class="bulk-actions align-left">
									<select name="fbulkaction">
										<option value="">{$lang.default.bulkActionSelectLabel}</option>
										<option value="delete">{$lang.default.bulkActionDeletetLabel}</option>
									</select>
									<input type="submit" name="fsubmitbulk" class="btn" value="{$lang.default.bulkActionSubmit}" />
									<input type="submit" name="fchangeorder" class="btn" value="{$lang.default.formChangeOrderSubmit}" />
								</div>
					
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
					<tbody>
					{foreach item=category from=$categories}
		
						<tr>
							<td><input type="checkbox" name="fbulkid[]" value="{$category->id}" {if in_array($category->id, $formData.fbulkid)}checked="checked"{/if}/></td>
							<td style="font-weight:bold;">{$category->id}</td>
							<td><input type="text" value="{$category->displayorder}" name="fdisplayorder[{$category->id}]" class="input-mini" /></td>
							<td><a href="{$conf.rooturl_admin}{$controller}/edit/id/{$category->id}/redirect/{$redirectUrl}">{$category->title}</a>
								{if $category->sub|@count > 0}
									<ul>
										{foreach item=subcat from=$category->sub}
											<li><a href="{$conf.rooturl_admin}{$controller}/edit/id/{$subcat->id}/redirect/{$redirectUrl}">{$subcat->title}</a></li>
										{/foreach}
									</ul>
								{/if}
							</td>
				 
							<td class="td_center">{if $category->enable == 1}<span class="label label-success">{$lang.default.formYesLabel}</span>{else}<span class="label label-important">{$lang.default.formNoLabel}</span>{/if}</td>
							<td>{$category->datecreated|date_format:$lang.default.dateFormatSmarty}</td>
							<td><a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}{$controller}/edit/id/{$category->id}/redirect/{$redirectUrl}" class="btn btn-mini"><i class="icon-pencil"></i> {$lang.default.formEditLabel}</a> &nbsp;
								<a title="{$lang.default.formActionDeleteTooltip}" href="javascript:delm('{$conf.rooturl_admin}{$controller}/delete/id/{$category->id}/redirect/{$redirectUrl}?token={$smarty.session.securityToken}');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> {$lang.default.formDeleteLabel}</a>
							</td>
						</tr>
			

					{/foreach}
					</tbody>
		
	  
				{else}
					<tr>
						<td colspan="10"> {$lang.default.notfound}</td>
					</tr>
				{/if}
	
				</table>
			</form>

		</div><!-- end #tab 1 -->

	</div>
</div>
			
			
			


