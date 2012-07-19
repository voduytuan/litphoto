<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>

<a class="pull-right btn btn-success" href="{$conf.rooturl_admin}{$controller}/add/redirect/{$redirectUrl}">{$lang.controller.head_add}</a>

<div class="page-header" rel="menu_photo_list"><h1>{$lang.controller.head_list}</h1></div>


<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">{$lang.controller.title_list} {if $formData.search != ''}| {$lang.controller.title_listSearch} {/if}({$total})</a></li>
		<li><a href="#tab2" data-toggle="tab">{$lang.default.filterLabel}</a></li>
		{if $formData.search != ''}
			<li><a href="{$conf.rooturl_admin}{$controller}">{$lang.default.formViewAll}</a></li>
		{/if}
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			
			
			{include file="`$smartyControllerGroupContainer`notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning}
			
			<form class="form-inline" action="" method="post" onsubmit="return confirm('Are You Sure ?');">
				<table class="table table-striped" cellpadding="5" width="100%">
					{if $photos|@count > 0}
						<thead>
							<tr>
							   <th width="40"><input class="check-all" type="checkbox" /></th>
								<th width="30"><a href="{$filterUrl}sortby/id/sorttype/{if $formData.sortby eq 'id'}{if $formData.sorttype|upper neq 'DESC'}DESC{else}ASC{/if}{/if}">ID</a></th>	
	                            <th width="80">Photo</th>
								<th><a href="{$filterUrl}sortby/title/sorttype/{if $formData.sortby eq 'title'}{if $formData.sorttype|upper neq 'DESC'}DESC{else}ASC{/if}{/if}">Title</a></th>	
								<th>Category</th>	
								<th>Uploader</th>
								<th>Comment</th>
								<th width="100">Enable</th>	
								<th width="150">Date Uploaded</th>	
								<th width="140"></th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan="9">
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
									</div>

									
									<div class="clear"></div>
								</td>
							</tr>
						</tfoot>
						<tbody>
					{foreach item=photo from=$photos}

							<tr>
								<td align="center"><input type="checkbox" name="fbulkid[]" value="{$photo->id}" {if in_array($photo->id, $formData.fbulkid)}checked="checked"{/if}/></td>
								<td style="font-weight:bold;"><a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}photo/edit/id/{$photo->id}/redirect/{$redirectUrl}">{$photo->id}</a></td>
	                            <td>
	                            	<a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}{$controller}/edit/id/{$photo->id}/redirect/{$redirectUrl}"><img src="{$photo->getSmallImage()}" style="border:1px solid #ccc;" width="80" /></a>
	                            </td>
								<td>
	                            	<a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}{$controller}/edit/id/{$photo->id}/redirect/{$redirectUrl}"><b>{$photo->title}</b></a>
	                            </td>
								<td>
									<a href="{$conf.rooturl_admin}{$controller}/index/category/{$photo->category->id}" title="View all photo in this Category">{$photo->category->title}</a>
								</td>
								<td><a href="{$conf.rooturl_admin}user/edit/id/{$photo->uid}" title="Edit this User">{$photo->actor->fullname}</a></td>
								<td align="center">{if $photo->countcomment > 0}<a href="{$conf.rooturl_admin}photocomment/index/photoid/{$photo->id}" title="View all comments of this photo"><span class="badge badge-info">{$photo->countcomment}</span></a>{else}0{/if}</td>
								<td>{if $photo->enable == 1}<span class="label label-success">{$lang.default.formYesLabel}</span>{else}<span class="label label-important">{$lang.default.formNoLabel}</span>{/if}</td>
								<td align="center">{$photo->datecreated|date_format:$lang.default.dateFormatTimeSmarty}</td>
	                            <td><a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}{$controller}/edit/id/{$photo->id}/redirect/{$redirectUrl}" class="btn btn-mini"><i class="icon-pencil"></i> {$lang.default.formEditLabel}</a> &nbsp;
									<a title="{$lang.default.formActionDeleteTooltip}" href="javascript:delm('{$conf.rooturl_admin}{$controller}/delete/id/{$photo->id}/redirect/{$redirectUrl}?token={$smarty.session.securityToken}');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> {$lang.default.formDeleteLabel}</a>
							</tr>


					{/foreach}
					</tbody>


					{else}
						<tr>
							<td colspan="9"> {$lang.default.notfound}</td>
						</tr>
					{/if}
					
					
				
				</table>
			</form>
			
			
		</div><!-- end #tab 1 -->
		<div class="tab-pane" id="tab2">
			<form class="form-inline" action="" method="post" style="padding:0px;margin:0px;" onsubmit="return false;">
	
				ID: 
				<input type="text" name="fid" id="fid" size="8" value="{$formData.fid|@htmlspecialchars}" class="input-mini" /> - 
				Keyword:
				
				<input type="text" name="fkeyword" id="fkeyword" size="20" value="{$formData.fkeyword|@htmlspecialchars}" />
				
				<select name="fsearchin" id="fsearchin">
					<option value="">- - - - - - - - - - - - -</option>
					<option value="title" {if $formData.fsearchin eq 'title'}selected="selected"{/if}>Title</option>
					<option value="description" {if $formData.fsearchin eq 'description'}selected="selected"{/if}>Description</option>
				</select>
				
				<input type="button" value="{$lang.default.filterSubmit}" class="btn btn-primary" onclick="gosearch();"  />
		
			</form>
		</div><!-- end #tab2 -->
	</div>
</div>









{literal}
<script type="text/javascript">
	function gosearch()
	{
		var path = rooturl_admin + "photo/index";
		
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
{/literal}






