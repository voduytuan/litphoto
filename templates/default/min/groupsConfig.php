<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 **/

return array(
    'js' => array(
     	'../zeni/js/css3-mediaqueries.js',
		'../zeni/js/custom.js',
		'../zeni/js/tabs.js',
		'../zeni/js/superfish-1.4.8/js/hoverIntent.js',
		'../zeni/js/superfish-1.4.8/js/superfish.js',
		'../zeni/js/superfish-1.4.8/js/supersubs.js',
		'../zeni/js/poshytip-1.1/src/jquery.poshytip.min.js',
		'../zeni/js/jquery.flexslider-min.js',
		'../zeni/js/modernizr.js',
		'../zeni/js/moveform.js',
		'../zeni/js/prettyPhoto/js/jquery.prettyPhoto.js',
		),
    'jquery' => array(
     	'../js/jquery.js',
     	),
     'css' => array(
     	'../css/style.css',  
     	'../zeni/css/style.css',
		'../zeni/css/superfish.css',
		'../zeni/js/prettyPhoto/css/prettyPhoto.css',
		'../zeni/css/flexslider.css',
		'../zeni/css/lessframework.css',
		'../zeni/css/skin.css',
		'../zeni/css/comments.css',
		'../zeni/js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css',
		),
	 
    // custom source example
    /*'js2' => array(
        dirname(__FILE__) . '/../min_unit_tests/_test_files/js/before.js',
        // do NOT process this file
        new Minify_Source(array(
            'filepath' => dirname(__FILE__) . '/../min_unit_tests/_test_files/js/before.js',
            'minifier' => create_function('$a', 'return $a;')
        ))
    ),//*/

    /*'js3' => array(
        dirname(__FILE__) . '/../min_unit_tests/_test_files/js/before.js',
        // do NOT process this file
        new Minify_Source(array(
            'filepath' => dirname(__FILE__) . '/../min_unit_tests/_test_files/js/before.js',
            'minifier' => array('Minify_Packer', 'minify')
        ))
    ),//*/
);