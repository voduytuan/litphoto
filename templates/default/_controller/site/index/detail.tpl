

		<!-- posts list -->
		<div id="posts-list" class="single-post">
    		<h2 class="page-heading"><span>Photo</span></h2>	
			
			<!-- blog view -->
			
			<article class="format-standard">
				<div class="entry-date"><div class="number">{$myPhoto->datecreated|date_format:"%d"}</div> <div class="year">{$myPhoto->datecreated|date_format:"%b, %Y"}</div></div>
				<div class="feature-image">
					<a href="{$myPhoto->getImage()}" data-rel="prettyPhoto" rel="prettyPhoto"><img src="{$myPhoto->getMediumImage()}" alt="{$myPhoto->title}" /></a>
				</div>
				<h2  class="post-heading"><a href="{$myPhoto->getPhotoPath()}">{$myPhoto->title}</a></h2>
				<div class="excerpt">{$myPhoto->description}</div>
				<div class="meta">
					<div class="categories">In <a href="{$myPhoto->category->getPhotoCategoryPath()}">{$myPhoto->category->title}</a></div>
					<div class="comments"><a href="#comments-wrap">{if $myPhoto->countcomment > 1}{$myPhoto->countcomment} comments{else}{$myPhoto->countcomment} comment{/if}</a></div>
					<div class="user"><a href="{$conf.rooturl}about.php">By {$myPhoto->actor->fullname}</a></div>
				</div>
			
			
				<!-- comments list -->
				<div id="comments-wrap">
					<h3 class="heading">{if $comments|@count > 1}{$comments|@count} comments{else}{$comments|@count} comment{/if}</h3>
					<ol class="commentlist">
					    {foreach item=comment from=$comments}
							{if $comment->isStatus('pending')}
								<li class="comment" style="color:#ccc;"><small><em>This comment (ID #{$comment->id}) is waiting for moderating.<div class="clearfix"></div><br /></em></small></li>
							{else}
								<li class="comment thread-even depth-1" id="li-comment-{$comment->id}">
							
									<div id="comment-1" class="comment-body clearfix">
								     	<img alt='' src='http://www.gravatar.com/avatar/{$comment->email|trim|lower|md5}?s=60&amp;d=&amp;r=G' class='avatar avatar-35 photo' height='35' width='35' />      
								     	<div class="comment-author vcard">{$comment->fullname}</div>
								        <div class="comment-meta commentmetadata">
									  		<span class="comment-date">{$comment->datecreated|date_format}</span>
										</div>
								  		<div class="comment-inner">
									   		<p>{$comment->text|nl2br}</p>
								 		</div>
							     	</div>
								</li>
							{/if}
						{/foreach}
					   
						
						
					</ol>
					<!-- page-navigation -->
					<div class="pagination pagination-right">
						{assign var="pageurl" value="page-::PAGE::"}
						{paginate count=$totalPage curr=$curPage lang=$paginateLang max=6 url="`$paginateurl``$pageurl``$paginatesuffix`"}
					</div>
					<!--ENDS pagination -->
				</div>
				<!-- ENDS comments list -->
				
				
				<!-- Respond -->	
			
				
							
				<div id="respond">
					{include file="notify.tpl" notifyError=$error notifySuccess=$success}
					<br />
					<form action="{$myPhoto->getPhotoPath()}#respond" method="post" id="commentform">
						<h3 class="heading">LEAVE A REPLY</h3>
						<input type="text" name="ffullname" id="ffullname" value="{$formData.ffullname}" tabindex="1" />
						<label for="ffullname">Your Name <small>*</small></label><br/>
					
						<input type="text" name="femail" id="femail" value="{$formData.femail}" tabindex="2" />
						<label for="femail">Email <small>*</small> <span>(not published)</span></label><br/>
					
						<input type="text" name="fwebsite" id="fwebsite" value="{$formData.fwebsite}" tabindex="3" />
						<label for="fwebsite">Website</label>
					
						<textarea name="ftext" id="ftext"  tabindex="4">{$formData.ftext}</textarea>
						
						<span><img  id="captchaImage" src="{$conf.rooturl}site/captcha" width="150" height="70" /></span>
						<br />
						<input type="text" name="fcaptcha" id="fcaptcha" value="" tabindex="2" />
						<label for="fcaptcha">Type the code in the above image <small>*</small> (<a href="javascript:void(0)" onclick="javascript:reloadCaptchaImage();" title="Get new code" style="color:#09f;"><small>Get New Code</small></a>) </label><br/>
							
						<p><input name="fsubmit" type="submit" id="submit" tabindex="5" value="Post" /></p>
					</form>
				</div>
				<div class="clearfix"></div>
				<!-- ENDS Respond -->
	
        		</article>




   			{foreach item=photo from=$photos}
			<article class="format-standard">
				<div class="entry-date"><div class="number">{$photo->datecreated|date_format:"%d"}</div> <div class="year">{$photo->datecreated|date_format:"%b, %Y"}</div></div>
				<div class="feature-image">
					<a href="{$photo->getImage()}" data-rel="prettyPhoto" rel="prettyPhoto"><img src="{$photo->getMediumImage()}" alt="{$photo->title}" /></a>
				</div>
				<h2  class="post-heading"><a href="{$photo->getPhotoPath()}">{$photo->title}</a></h2>
				<div class="excerpt">{$photo->description}</div>
				<a href="{$photo->getPhotoPath()}" class="read-more">continue &#8594;</a>
				<div class="meta">
					<div class="categories">In <a href="{$photo->category->getPhotoCategoryPath()}">{$photo->category->title}</a></div>
					<div class="comments"><a href="#">{if $photo->countcomment > 1}{$photo->countcomment} comments{else}{$photo->countcomment} comment{/if}</a></div>
					<div class="user"><a href="{$conf.rooturl}about">By {$photo->actor->fullname}</a></div>
				</div>
			</article>
			{/foreach}

			<!-- page-navigation -->
			<div class="pagination pagination-right">
				{assign var="pageurl" value="page-::PAGE::"}
				{paginate count=$totalPage curr=$curPage lang=$paginateLang max=6 url="`$paginateurl``$pageurl``$paginatesuffix`"}
			</div>
			<!--ENDS pagination -->
    	</div>
    	<!-- ENDS posts list -->

		{include file="`$smartyControllerGroupContainer`sidebar.tpl"}
		
		
{literal}
	<script type="text/javascript">
		
		function reloadCaptchaImage()
		{
			var timestamp = new Date();

			$("#captchaImage").attr('src', "{/literal}{$conf.rooturl}{literal}site/captcha?random=" + timestamp.getTime());
		}
	</script>

{/literal}
	
	        	
			
		