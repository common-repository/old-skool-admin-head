<?php
/**
* 
* Includes
*
* Files to Include
* 
*/

include($wp_plugin_dir.'/admin/admin-page.php'); 

/**
* 
* Include CSS
*
* Include CSS for the Admin Options Page
* 
* @global string $wp_plugin_dir  plugin directory absolute path
* @global string $wp_plugin_url  plugin url
*
*/

if (!class_exists('osah_load_admin_cssClass')) { //checks is osah_load_admin_cssClass class exists	

	class osah_load_admin_cssClass { // begin osah_load_admin_cssClass class
	
		function __construct() { // the constructor	
		}
		
		public function osah_load_admin_css() { // begin osah_load_admin_css function	
			
			// global variables
			global $wp_plugin_dir, $wp_plugin_url;
			
			// admin-style.css variable
			$osah_cssFile = $wp_plugin_dir . '/css/admin-style.css';
			
			// Load admin-style.css stylesheet
			if ( file_exists($osah_cssFile) ) { // checks if admin-style.css file exists
			
				wp_register_script('osah_admincss',$wp_plugin_url . '/css/admin-style.css');
				wp_enqueue_script( 'osah_admincss');
				
			}		
			
		} // begin osah_load_admin_css function
		
	} // end osah_load_admincssClass class
	
}

/**
* 
* Include CSS
*
* Include CSS for the Admin Options Page
* 
*
*/

if (!class_exists('osah_optionsLinkClass')) { //checks is osah_optionsLinkClass class exists

	class osah_optionsLinkClass { // begin osah_optionsLinkClass class
	
		function __construct() { // the constructor	
		}
		
		public function osah_optionsLink() { // begin osah_load_admin_css function
		
			/**
			* 
			* Class Instances
			*
			* Variables for Class Instances 
			*
			*/
			
			$osah_load_admin_cssClass = new osah_load_admin_cssClass();
			$osah_adminPageClass = new osah_adminPageClass();
			
			// add_options_page() variable
			$osah_options_css = add_options_page('Old Skool', 'Old Skool Admin', 'manage_options', 'osha-options', array($osah_adminPageClass,'osah_adminPage'));
			
			// initiate admin_print_styles
			add_action( 'admin_print_styles-' . $osah_options_css, array($osah_load_admin_cssClass,'osah_load_admin_css' ));
			
		} // end osah_load_admin_css function
		
	} // end osah_optionsLinkClass class
	
}
?>