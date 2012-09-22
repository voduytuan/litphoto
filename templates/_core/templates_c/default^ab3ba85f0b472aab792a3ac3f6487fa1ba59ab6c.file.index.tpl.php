<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 14:45:42
         compiled from "templates/default/_controller/site/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18560599025007bb26e752f7-67703522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab3ba85f0b472aab792a3ac3f6487fa1ba59ab6c' => 
    array (
      0 => 'templates/default/_controller/site/index/index.tpl',
      1 => 1342683941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18560599025007bb26e752f7-67703522',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_paginate')) include '/Library/WebServer/Documents/www/litpiproject/litpifw/libs/smarty/plugins/function.paginate.php';
?>	
	

	<?php if ($_smarty_tpl->getVariable('myPhotoCategory')->value->id==0){?>
		<!-- posts list -->
		<div id="posts-list">
    		<h2 class="page-heading"><span>Latest Photos</span></h2>	
			
			<?php if (count($_smarty_tpl->getVariable('photos')->value)==0){?>
				No Photo.
			<?php }?>
			
			<!-- blog view -->
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
					<div class="comments"><a href="<?php echo $_smarty_tpl->getVariable('photo')->value->getPhotoPath();?>
#comments-wrap"><?php if ($_smarty_tpl->getVariable('photo')->value->countcomment>1){?><?php echo $_smarty_tpl->getVariable('photo')->value->countcomment;?>
 comments<?php }else{ ?><?php echo $_smarty_tpl->getVariable('photo')->value->countcomment;?>
 comment<?php }?></a></div>
					<div class="user"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
about.php">By <?php echo $_smarty_tpl->getVariable('photo')->value->actor->fullname;?>
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
	<?php }else{ ?>
		<h2 class="page-heading"><span><?php echo $_smarty_tpl->getVariable('myPhotoCategory')->value->title;?>
</span></h2>	
	
		<?php if (count($_smarty_tpl->getVariable('photos')->value)==0){?>
			No Photo.
		<?php }?>
		
		<!-- thumbs -->
		<div class="portfolio-thumbs clearfix" >
			<?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('photos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
?>
			<figure class="item">
    			<figcaption>
					<strong><?php echo $_smarty_tpl->getVariable('photo')->value->title;?>
</strong>
					<span><?php echo $_smarty_tpl->getVariable('photo')->value->description;?>
</span>
					<em><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('photo')->value->datecreated,"%B %d, %Y");?>
</em>
					<a href="<?php echo $_smarty_tpl->getVariable('photo')->value->getPhotoPath();?>
" class="opener"></a>
        		</figcaption>
        		
        		<a href="<?php echo $_smarty_tpl->getVariable('photo')->value->getPhotoPath();?>
" class="thumb"><img src="<?php echo $_smarty_tpl->getVariable('photo')->value->getSmallImage();?>
" alt="<?php echo $_smarty_tpl->getVariable('photo')->value->title;?>
" /></a>
    		</figure>
			<?php }} ?>
        </div>
		<!-- ends thumbs-->
		
		<!-- page-navigation -->
		<div class="pagination pagination-right">
			<?php $_smarty_tpl->tpl_vars["pageurl"] = new Smarty_variable("page-::PAGE::", null, null);?>
			<?php echo smarty_function_paginate(array('count'=>$_smarty_tpl->getVariable('totalPage')->value,'curr'=>$_smarty_tpl->getVariable('curPage')->value,'lang'=>$_smarty_tpl->getVariable('paginateLang')->value,'max'=>6,'url'=>($_smarty_tpl->getVariable('paginateurl')->value).($_smarty_tpl->getVariable('pageurl')->value).($_smarty_tpl->getVariable('paginatesuffix')->value)),$_smarty_tpl);?>

		</div>
		<!--ENDS pagination -->
	<?php }?>
				
	        	
	        	
			
		