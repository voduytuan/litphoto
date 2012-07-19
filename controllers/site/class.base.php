<?php

Abstract Class Controller_Site_Base Extends Controller_Core_Base 
{
	public function __construct($registry)
	{
		
		//for DEMO site - litphoto
		//get category list
		$fullCategoryList = Core_PhotoCategory::getFullCategories();
		$registry->smarty->assign(array(
			'fullCategoryList' => $fullCategoryList,
		));
		
		
		parent::__construct($registry);
		
		
	}
	
	
	
	protected function notfound()
	{
		
		die('Not found');
		exit();
	}
	
	protected function notpermission()
	{
		
		die('not permission');
		exit();
	}
	
}
?>