<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo Category</a> <span class="divider">/</span></li>
	<li class="active">{$lang.controller.head_edit}</li>
</ul>

<div class="page-header" rel="menu_photocategory"><h1>{$lang.controller.head_edit}</h1></div>

<div class="navgoback"><a href="{$redirectUrl}">{$lang.default.formBackLabel}</a></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="{$smarty.session.photocategoryEditToken}" />


	{include file="`$smartyControllerGroupContainer`notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning}
	
	<div class="control-group">
		<label class="control-label" for="fparentid">Parent Category</label>
		<div class="controls">
			<select id="fparentid" name="fparentid">
				<option value="0">- - - - - - - - - - - - - - - - - - -</option>
				{foreach item=parentCat from=$parentCategories}
					{if $parentCat->id != $formData.fid}
					<option value="{$parentCat->id}" title="{$parentCat->title}" {if $parentCat->id == $formData.fparentid}selected="selected"{/if}>{$parentCat->title}</option>
					{/if}
				{/foreach}
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="ftitle">Title <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ftitle" id="ftitle" value="{$formData.ftitle|@htmlspecialchars}">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fslug">SEO URL Slug</label>
		<div class="controls">
			<input type="text" name="fslug" id="fslug" value="{$formData.fslug|@htmlspecialchars}">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fdescription">Description</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="fdescription" id="fdescription">{$formData.fdescription|@htmlspecialchars}</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fenable">{$lang.controller.formShowLabel}</label>
		<div class="controls">
			<select class="input-small" name="fenable" id="fenable">
				<option value="1">{$lang.default.formYesLabel}</option>
				<option value="0" {if $formData.fenable == '0'}selected="selected"{/if}>{$lang.default.formNoLabel}</option>
			</select>
		</div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="{$lang.default.formUpdateSubmit}" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : {$lang.default.formRequiredLabel}</span>
	</div>	
	
</form>


<hr />

<!--- SUBCATEGORY LISTING -->
<div class="well">
	<a class="pull-right btn btn-success" href="{$conf.rooturl_admin}{$controller}/add/parentid/{$formData.fid}">{$lang.controller.head_addsub}</a>

	<h3>{$formData.ftitle} :: {$lang.controller.title_subcat} ({$subcategories|@count})</h3>



<form action="{$conf.rooturl_admin}{$controller}?returncategory={$formData.fid}" method="post" name="manage" class="form-inline" onsubmit="return confirm('Are You Sure ?');">
	<input type="hidden" name="ftoken" value="{$smarty.session.photocategoryBulkToken}" />
	<table class="table table-striped">
		
	{if $subcategories|@count > 0}
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
						<input type="submit" name="fsubmitbulk" class="btn btn-primary" value="{$lang.default.bulkActionSubmit}" />
						<input type="submit" name="fchangeorder" class="btn" value="{$lang.default.formChangeOrderSubmit}" />
					</div>
					
					<div class="clear"></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
		{foreach item=category from=$subcategories}
		
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
</div>

