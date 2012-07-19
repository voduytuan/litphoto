<?php

	/**
	* Cac setting cho website
	*/

    //format
	//$setting['group']['entry'] = value;
	
	$setting['site']['heading'] = 'Litphoto';
	$setting['site']['smartyCompileCheck'] = true;	//true if development phase, false when go to live production
	$setting['site']['jsversion'] = '4';	//true if using cache, false if not
	$setting['site']['cssversion'] = '4';	//true if using cache, false if not
	$setting['site']['profilertrigger'] = 'xprofiler';	//GET/POST/COOKIE element to trigger the profiling data
	
	$setting['resourcehost']['general'] = $conf['rooturl'] . 'templates/default/';
	

	
	$setting['photo']['recordPerPage'] = 10;
	$setting['photo']['imageDirectory'] = 'uploads/photos/';
	$setting['photo']['validExtension'] = array('JPG', 'JPEG', 'PNG', 'GIF');
	$setting['photo']['validMaxFileSize'] = 10 * 1024 * 1024;	//size in byte
	$setting['photo']['imageMaxWidth'] = '1200';
	$setting['photo']['imageMaxHeight'] = '1200';
	$setting['photo']['imageMediumWidth'] = '540';
	$setting['photo']['imageMediumHeight'] = '1000';
	$setting['photo']['imageThumbWidth'] = '300';
	$setting['photo']['imageThumbHeight'] = '200';
	$setting['photo']['imageThumbRatio'] = '3:2';
	$setting['photo']['imageQuality'] = '95';
	$setting['photocomment']['recordPerPage'] = 20;	
	
	
		
?>
