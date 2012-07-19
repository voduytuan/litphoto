<!doctype html>
<html class="no-js">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="{$conf.rooturl}favicon.ico"/>
<title>{if $pageTitle != ''}{$pageTitle} | {$setting.site.heading}{else}{$setting.site.defaultPageTitle}{/if}</title>
<meta name="author" content="Vo Duy Tuan, tuanmaster2002@yahoo.com" />
<meta name="keywords" content="{$pageKeyword|default:$setting.site.defaultPageKeyword}" />
<meta name="description" content="{$pageDescription|default:$setting.site.defaultPageDescription|escapequote}" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
		
<link type="text/css" rel="stylesheet" href="{$currentTemplate}min/?g=css&ver={$setting.site.cssversion}" media="screen" />
<script type="text/javascript" src="{$currentTemplate}min/?g=jquery&ver={$setting.site.jsversion}"></script>
<script type="text/javascript" src="{$currentTemplate}min/?g=js&ver={$setting.site.jsversion}"></script>

</head>
<body>
	
	<header class="clearfix">
	

		<div class="wrapper">
			<a href="{$conf.rooturl}" id="logo"><img  src="{$imageDir}site/litphotologo.png" alt="Zeni"></a>
			
			<nav>
				<ul id="nav" class="sf-menu">
					<li{if $controller == 'index'} class="current-menu-item"{/if}><a href="{$conf.rooturl}">GALLERY</a>
						<ul>
							{foreach item=category from=$fullCategoryList}
								{if $category->parentid == 0 && $category->enable == 1}<li><a href="{$category->getPhotoCategoryPath()}" title="{$category->title}">{$category->title}</a></li>{/if}
							{/foreach}
							
						</ul>
					</li>
					<li{if $controller == 'about'} class="current-menu-item"{/if}><a href="{$conf.rooturl}about.php">ABOUT</a></li>
					<li><a href="http://github.com/voduytuan/litphoto">DOWNLOAD (Github)</a></li>
				</ul>
			</nav>
			<div id="combo-holder"></div>
		</div>
	</header>
	
	
	<!-- MAIN -->
	<div id="main">	
		<div class="wrapper clearfix">

	