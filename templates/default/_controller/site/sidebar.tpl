<!-- sidebar -->
<aside id="sidebar">
	
	<ul>
		<li class="block">
    		<h4>CATEGORIES</h4>
			<ul style="list-style-type:square;list-style-position:inner;">
				{foreach item=category from=$fullCategoryList}
					{if $category->enable == 1}<li class="cat-item" style="margin-left:{math equation="x*2" x=$category->level}0px;"><a href="{$category->getPhotoCategoryPath()}" title="{$category->title}">{$category->title}</a></li>{/if}
				{/foreach}
				
				
			</ul>
		</li>
		
	</ul>
	
	<em id="corner"></em>
</aside>
<!-- ENDS sidebar -->