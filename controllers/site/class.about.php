<?php

Class Controller_Site_About Extends Controller_Site_Base 
{
	function indexAction() 
	{
		
		$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'index.tpl'); 
		
		$this->registry->smarty->assign(array('contents' => $contents,
										'pageTitle' => 'About Litphoto',
										'pageKeyword' => 'Litphoto, litpi, about, photo blog, blog, photoblog',
										'pageDescription' => 'About Litphoto, an open source photoblog written on PHP and MySQL.',
										));
		
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer.'index.tpl');
		
		
	} 
	
	
	
	
}

?>