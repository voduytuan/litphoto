<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo Category</a> <span class="divider">/</span></li>
	<li class="active">{$lang.controller.head_add}</li>
</ul>

<div class="page-header" rel="menu_photocategory"><h1>{$lang.controller.head_add}</h1></div>

<div class="navgoback"><a href="{$redirectUrl}">{$lang.default.formBackLabel}</a></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="{$smarty.session.photocategoryAddToken}" />


	{include file="`$smartyControllerGroupContainer`notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning}
	
	<div class="control-group">
		<label class="control-label" for="fparentid">Parent Category</label>
		<div class="controls">
			<select id="fparentid" name="fparentid">
				<option value="0">- - - - - - - - - - - - - - - - - - -</option>
				{foreach item=parentCat from=$parentCategories}
					<option value="{$parentCat->id}" title="{$parentCat->title}" {if $parentCat->id == $formData.fparentid}selected="selected"{/if}>{$parentCat->title}</option>
				{/foreach}
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="ftitle">Title <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ftitle" id="ftitle" value="{$formData.formData|@htmlspecialchars}">
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
		<input type="submit" name="fsubmit" value="{$lang.default.formAddSubmit}" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : {$lang.default.formRequiredLabel}</span>
	</div>	
	
</form>


