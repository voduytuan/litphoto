<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 14:38:06
         compiled from "templates/default/_controller/site/index/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13090410765007b95e473184-75037057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2cb26303f52a2b863148489c94be30c1a20b5e5' => 
    array (
      0 => 'templates/default/_controller/site/index/detail.tpl',
      1 => 1342683484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13090410765007b95e473184-75037057',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_nl2br')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.nl2br.php';
if (!is_callable('smarty_function_paginate')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.paginate.php';
?>

		<!-- posts list -->
		<div id="posts-list" class="single-post">
    		<h2 class="page-heading"><span>Photo</span></h2>	
			
			<!-- blog view -->
			
			<article class="format-standard">
				<div class="entry-date"><div class="number"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('myPhoto')->value->datecreated,"%d");?>
</div> <div class="year"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('myPhoto')->value->datecreated,"%b, %Y");?>
</div></div>
				<div class="feature-image">
					<a href="<?php echo $_smarty_tpl->getVariable('myPhoto')->value->getImage();?>
" data-rel="prettyPhoto" rel="prettyPhoto"><img src="<?php echo $_smarty_tpl->getVariable('myPhoto')->value->getMediumImage();?>
" alt="<?php echo $_smarty_tpl->getVariable('myPhoto')->value->title;?>
" /></a>
				</div>
				<h2  class="post-heading"><a href="<?php echo $_smarty_tpl->getVariable('myPhoto')->value->getPhotoPath();?>
"><?php echo $_smarty_tpl->getVariable('myPhoto')->value->title;?>
</a></h2>
				<div class="excerpt"><?php echo $_smarty_tpl->getVariable('myPhoto')->value->description;?>
</div>
				<div class="meta">
					<div class="categories">In <a href="<?php echo $_smarty_tpl->getVariable('myPhoto')->value->category->getPhotoCategoryPath();?>
"><?php echo $_smarty_tpl->getVariable('myPhoto')->value->category->title;?>
</a></div>
					<div class="comments"><a href="#comments-wrap"><?php if ($_smarty_tpl->getVariable('myPhoto')->value->countcomment>1){?><?php echo $_smarty_tpl->getVariable('myPhoto')->value->countcomment;?>
 comments<?php }else{ ?><?php echo $_smarty_tpl->getVariable('myPhoto')->value->countcomment;?>
 comment<?php }?></a></div>
					<div class="user"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
about.php">By <?php echo $_smarty_tpl->getVariable('myPhoto')->value->actor->fullname;?>
</a></div>
				</div>
			
			
				<!-- comments list -->
				<div id="comments-wrap">
					<h3 class="heading"><?php if (count($_smarty_tpl->getVariable('comments')->value)>1){?><?php echo count($_smarty_tpl->getVariable('comments')->value);?>
 comments<?php }else{ ?><?php echo count($_smarty_tpl->getVariable('comments')->value);?>
 comment<?php }?></h3>
					<ol class="commentlist">
					    <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('comments')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
							<?php if ($_smarty_tpl->getVariable('comment')->value->isStatus('pending')){?>
								<li class="comment" style="color:#ccc;"><small><em>This comment (ID #<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
) is waiting for moderating.<div class="clearfix"></div><br /></em></small></li>
							<?php }else{ ?>
								<li class="comment thread-even depth-1" id="li-comment-<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
">
							
									<div id="comment-1" class="comment-body clearfix">
								     	<img alt='' src='http://www.gravatar.com/avatar/<?php echo md5(((mb_detect_encoding(trim($_smarty_tpl->getVariable('comment')->value->email), 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower(trim($_smarty_tpl->getVariable('comment')->value->email),SMARTY_RESOURCE_CHAR_SET) : strtolower(trim($_smarty_tpl->getVariable('comment')->value->email))));?>
?s=60&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
								     	<div class="comment-author vcard"><?php echo $_smarty_tpl->getVariable('comment')->value->fullname;?>
</div>
								        <div class="comment-meta commentmetadata">
									  		<span class="comment-date"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('comment')->value->datecreated);?>
</span>
										</div>
								  		<div class="comment-inner">
									   		<p><?php echo smarty_modifier_nl2br($_smarty_tpl->getVariable('comment')->value->text);?>
</p>
								 		</div>
							     	</div>
								</li>
							<?php }?>
						<?php }} ?>
					   
						
						
					</ol>
					<!-- page-navigation -->
					<div class="pagination pagination-right">
						<?php $_smarty_tpl->tpl_vars["pageurl"] = new Smarty_variable("page-::PAGE::", null, null);?>
						<?php echo smarty_function_paginate(array('count'=>$_smarty_tpl->getVariable('totalPage')->value,'curr'=>$_smarty_tpl->getVariable('curPage')->value,'lang'=>$_smarty_tpl->getVariable('paginateLang')->value,'max'=>6,'url'=>($_smarty_tpl->getVariable('paginateurl')->value).($_smarty_tpl->getVariable('pageurl')->value).($_smarty_tpl->getVariable('paginatesuffix')->value)),$_smarty_tpl);?>

					</div>
					<!--ENDS pagination -->
				</div>
				<!-- ENDS comments list -->
				
				
				<!-- Respond -->	
			
				
							
				<div id="respond">
					<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
					<br />
					<form action="<?php echo $_smarty_tpl->getVariable('myPhoto')->value->getPhotoPath();?>
#respond" method="post" id="commentform">
						<h3 class="heading">LEAVE A REPLY</h3>
						<input type="text" name="ffullname" id="ffullname" value="<?php echo $_smarty_tpl->getVariable('formData')->value['ffullname'];?>
" tabindex="1" />
						<label for="ffullname">Your Name <small>*</small></label><br/>
					
						<input type="text" name="femail" id="femail" value="<?php echo $_smarty_tpl->getVariable('formData')->value['femail'];?>
" tabindex="2" />
						<label for="femail">Email <small>*</small> <span>(not published)</span></label><br/>
					
						<input type="text" name="fwebsite" id="fwebsite" value="<?php echo $_smarty_tpl->getVariable('formData')->value['fwebsite'];?>
" tabindex="3" />
						<label for="fwebsite">Website</label>
					
						<textarea name="ftext" id="ftext"  tabindex="4"><?php echo $_smarty_tpl->getVariable('formData')->value['ftext'];?>
</textarea>
						
						<span><img  id="captchaImage" src="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
site/captcha" width="150" height="70" /></span>
						<br />
						<input type="text" name="fcaptcha" id="fcaptcha" value="" tabindex="2" />
						<label for="fcaptcha">Type the code in the above image <small>*</small> (<a href="javascript:void(0)" onclick="javascript:reloadCaptchaImage();" title="Get new code" style="color:#09f;"><small>Get New Code</small></a>) </label><br/>
							
						<p><input name="fsubmit" type="submit" id="submit" tabindex="5" value="Post" /></p>
					</form>
				</div>
				<div class="clearfix"></div>
				<!-- ENDS Respond -->
	
        		</article>




   			<?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('photos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
?>
			<article class="format-standard">
				<div class="entry-date"><div class="number"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('photo')->value->datecreated,"%d");?>
</div> <div class="year"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('photo')->value->datecreated,"%b, %Y");?>
</div></div>
				<div class="feature-image">
					<a href="<?php echo $_smarty_tpl->getVariable('photo')->value->getImage();?>
" data-rel="prettyPhoto" rel="prettyPhoto"><img src="<?php echo $_smarty_tpl->getVariable('photo')->value->getMediumImage();?>
" alt="<?php echo $_smarty_tpl->getVariable('photo')->value->title;?>
" /></a>
				</div>
				<h2  class="post-heading"><a href="<?php echo $_smarty_tpl->getVariable('photo')->value->getPhotoPath();?>
"><?php echo $_smarty_tpl->getVariable('photo')->value->title;?>
</a></h2>
				<div class="excerpt"><?php echo $_smarty_tpl->getVariable('photo')->value->description;?>
</div>
				<a href="<?php echo $_smarty_tpl->getVariable('photo')->value->getPhotoPath();?>
" class="read-more">continue &#8594;</a>
				<div class="meta">
					<div class="categories">In <a href="<?php echo $_smarty_tpl->getVariable('photo')->value->category->getPhotoCategoryPath();?>
"><?php echo $_smarty_tpl->getVariable('photo')->value->category->title;?>
</a></div>
					<div class="comments"><a href="#"><?php if ($_smarty_tpl->getVariable('photo')->value->countcomment>1){?><?php echo $_smarty_tpl->getVariable('photo')->value->countcomment;?>
 comments<?php }else{ ?><?php echo $_smarty_tpl->getVariable('photo')->value->countcomment;?>
 comment<?php }?></a></div>
					<div class="user"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
about">By <?php echo $_smarty_tpl->getVariable('photo')->value->actor->fullname;?>
</a></div>
				</div>
			</article>
			<?php }} ?>

			<!-- page-navigation -->
			<div class="pagination pagination-right">
				<?php $_smarty_tpl->tpl_vars["pageurl"] = new Smarty_variable("page-::PAGE::", null, null);?>
				<?php echo smarty_function_paginate(array('count'=>$_smarty_tpl->getVariable('totalPage')->value,'curr'=>$_smarty_tpl->getVariable('curPage')->value,'lang'=>$_smarty_tpl->getVariable('paginateLang')->value,'max'=>6,'url'=>($_smarty_tpl->getVariable('paginateurl')->value).($_smarty_tpl->getVariable('pageurl')->value).($_smarty_tpl->getVariable('paginatesuffix')->value)),$_smarty_tpl);?>

			</div>
			<!--ENDS pagination -->
    	</div>
    	<!-- ENDS posts list -->

		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."sidebar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		
		

	<script type="text/javascript">
		
		function reloadCaptchaImage()
		{
			var timestamp = new Date();

			$("#captchaImage").attr('src', "<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
site/captcha?random=" + timestamp.getTime());
		}
	</script>


	
	        	
			
		