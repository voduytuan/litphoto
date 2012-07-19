<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo Comment</a> <span class="divider">/</span></li>
	<li class="active">{$lang.controller.head_edit}</li>
</ul>

<div class="page-header" rel="menu_photocomment"><h1>{$lang.controller.head_edit}</h1></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="{$smarty.session.photocommentEditToken}" />

	{include file="`$smartyControllerGroupContainer`notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning}

	<div class="control-group">
		<label class="control-label" for="ffullname">Photo</label>
		<div class="controls">
			<span class="help-block"><a href="{$conf.rooturl_admin}photo/edit/id/{$myPhotoComment->photo->id}" title="Edit this photo">{$myPhotoComment->photo->title}</a></span>
			<a href="{$myPhotoComment->photo->getImage()}" title="View Large Image" target="_blank"><img src="{$myPhotoComment->photo->getSmallImage()}" /></a>
		</div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="ffullname">Fullname</label>
		<div class="controls">
			<input type="text" name="ffullname" id="ffullname" value="{$formData.ffullname|@htmlspecialchars}" class="">
		</div>
	</div>
		
	<div class="control-group">
		<label class="control-label" for="femail">Email</label>
		<div class="controls">
			<input type="text" name="femail" id="femail" value="{$formData.femail|@htmlspecialchars}" class="">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fwebsite">Website</label>
		<div class="controls">
			<input type="text" name="fwebsite" id="fwebsite" value="{$formData.fwebsite|@htmlspecialchars}" class="">
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="ftext">Comment text</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="ftext" id="ftext">{$formData.ftext|@htmlspecialchars}</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fstatus">Status</label>
		<div class="controls">
			<select id="fstatus" name="fstatus">
				{html_options selected=$formData.fstatus options=$statusList}
			</select>
		</div>
	</div>
		
				
				
	
			
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="{$lang.default.formUpdateSubmit}" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : {$lang.default.formRequiredLabel}</span>
	</div>
           
		
</form>









