<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo Comment</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>


<div class="page-header" rel="menu_photocomment"><h1>{$lang.controller.head_list}</h1></div>


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
					{if $photocomments|@count > 0}
						<thead>
							<tr>
							   <th width="40"><input class="check-all" type="checkbox" /></th>
								<th align="left" width="30"><a href="{$filterUrl}sortby/id/sorttype/{if $formData.sortby eq 'id'}{if $formData.sorttype|upper neq 'DESC'}DESC{else}ASC{/if}{/if}">ID</a></th>	
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
					{foreach item=comment from=$photocomments}

							<tr>
								<td align="center"><input type="checkbox" name="fbulkid[]" value="{$comment->id}" {if in_array($comment->id, $formData.fbulkid)}checked="checked"{/if}/></td>
								<td style="font-weight:bold;"><a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}comment/edit/id/{$comment->id}/redirect/{$redirectUrl}">{$comment->id}</a></td>

	                            <td class="td_left"><strong>{$comment->fullname}<br /><small>{$comment->email}</small></strong><br /><small><a class="ip2location" target="_blank" href="http://www.ip2location.com/{$comment->ipaddress}" title="Trace this IP Address">{$comment->ipaddress}</a></small></td>
								<td><strong><a href="{$conf.rooturl_admin}{$controller}/index/photoid/{$comment->photo->id}" title="View all comments of this photo">{$comment->photo->title}</a></strong><br />
	                            	<small>{$comment->text|strip_tags}</small>
	                            </td>
								<td>{if $comment->isStatus('pending')}<span class="label label-warning">Pending</span>{else}<span class="label label-success">Show</span>{/if}</td>
	                            <td class="td_left"><a target="_blank" href="{$comment->photo->getImage()}" title="Go to Photo Page"><img src="{$comment->photo->getSmallImage()}" alt="cover" style="border:1px solid #ccc;" width="80" /></a></td>



	                            <td class="td_center" >{$comment->datecreated|date_format:"%H:%M, %e/%m/%Y"}</td>

								<td><a title="{$lang.default.formActionEditTooltip}" href="{$conf.rooturl_admin}{$controller}/edit/id/{$comment->id}/redirect/{$redirectUrl}" class="btn btn-mini"><i class="icon-pencil"></i> {$lang.default.formEditLabel}</a> &nbsp;
									<a title="{$lang.default.formActionDeleteTooltip}" href="javascript:delm('{$conf.rooturl_admin}{$controller}/delete/id/{$comment->id}/redirect/{$redirectUrl}?token={$smarty.session.securityToken}');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> {$lang.default.formDeleteLabel}</a>
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
				
				<input type="text" name="fkeyword" id="fkeyword" size="20" value="{$formData.fkeyword|@htmlspecialchars}" class="text-input" />
				
				<select name="fsearchin" id="fsearchin">
					<option value="">- - - - - - - - - - - - -</option>
					<option value="fullname" {if $formData.fsearchin eq 'fullname'}selected="selected"{/if}>Fullname</option>
					<option value="email" {if $formData.fsearchin eq 'email'}selected="selected"{/if}>Email</option>
					<option value="website" {if $formData.fsearchin eq 'website'}selected="selected"{/if}>Website</option>
					<option value="text" {if $formData.fsearchin eq 'text'}selected="selected"{/if}>Text</option>
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
{/literal}









