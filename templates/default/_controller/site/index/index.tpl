	
	

	{if $myPhotoCategory->id == 0}
		<!-- posts list -->
		<div id="posts-list">
    		<h2 class="page-heading"><span>Latest Photos</span></h2>	
			
			{if $photos|@count == 0}
				No Photo.
			{/if}
			
			<!-- blog view -->
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
					<div class="comments"><a href="{$photo->getPhotoPath()}#comments-wrap">{if $photo->countcomment > 1}{$photo->countcomment} comments{else}{$photo->countcomment} comment{/if}</a></div>
					<div class="user"><a href="{$conf.rooturl}about.php">By {$photo->actor->fullname}</a></div>
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
	{else}
		<h2 class="page-heading"><span>{$myPhotoCategory->title}</span></h2>	
	
		{if $photos|@count == 0}
			No Photo.
		{/if}
		
		<!-- thumbs -->
		<div class="portfolio-thumbs clearfix" >
			{foreach item=photo from=$photos}
			<figure class="item">
    			<figcaption>
					<strong>{$photo->title}</strong>
					<span>{$photo->description}</span>
					<em>{$photo->datecreated|date_format:"%B %d, %Y"}</em>
					<a href="{$photo->getPhotoPath()}" class="opener"></a>
        		</figcaption>
        		
        		<a href="{$photo->getPhotoPath()}" class="thumb"><img src="{$photo->getSmallImage()}" alt="{$photo->title}" /></a>
    		</figure>
			{/foreach}
        </div>
		<!-- ends thumbs-->
		
		<!-- page-navigation -->
		<div class="pagination pagination-right">
			{assign var="pageurl" value="page-::PAGE::"}
			{paginate count=$totalPage curr=$curPage lang=$paginateLang max=6 url="`$paginateurl``$pageurl``$paginatesuffix`"}
		</div>
		<!--ENDS pagination -->
	{/if}
				
	        	
	        	
			
		