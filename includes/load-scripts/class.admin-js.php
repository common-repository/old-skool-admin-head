<?php
/**
* 
* Load JavaScript
*
* Load JavaScript for Admin Options Page
*
* @global string $wp_plugin_dir  plugin directory absolute path
* @global string $wp_plugin_url  plugin url
* @global bool $osah_options  registered settings
* 
*/

if (!class_exists('osah_load_admin_jsClass')) { //checks is osah_load_admin_jsClass class exists

	class osah_load_admin_jsClass { // begin osah_load_admin_jsClass class
	
		function __construct() { // the constructor	
		}
		
		public function osah_load_admin_js(){ // begin osah_load_admin_js function 
			
			// global variables
			global $wp_plugin_dir , $wp_plugin_url , $osah_options;
			
			/**
			* 
			* Settings Check
			*
			* Checks if osah_disAdminBar has been set to true.
			* If osah_disAdminBar has been set to true then dis-admin-bar.css stylesheet is added to head.
			*
			*/
			if(isset($osah_options['osah_restoreHead'])) { // checks if osah_disAdminBar setting is set
				if($osah_options['osah_restoreHead'] == true) { // if osah_disAdminBar settingvalue is 'true'
				
					// load dis-admin-bar.css stylesheet
					echo '<link type="text/css" rel="stylesheet" href="' . $wp_plugin_url . '/css/rest-admin-head.css" />' . "\n";
					
					// path to JavaScript file
					$osah_jsFile = $wp_plugin_dir . '/js/admin-scripts.js';
					
					// Load admin-scripts.js external JavaScript file
					if ( file_exists($osah_jsFile) ) {
						
						wp_register_script( 'osah_adminjs' , $wp_plugin_url . '/js/admin-scripts.js' , false , 1.0, true);
						wp_enqueue_script( 'osah_adminjs' );
						
					}
					
					wp_enqueue_script('jquery');
					
				}
				
			}
			if(isset($osah_options['osah_disAdminBar'])) { // checks if osah_disAdminBar setting is set
				if($osah_options['osah_disAdminBar'] == true) { // if osah_disAdminBar settingvalue is 'true'
				
					// load dis-admin-bar.css stylesheet
					echo '<link type="text/css" rel="stylesheet" href="' . $wp_plugin_url . '/css/dis-admin-bar.css" />' . "\n";
					
				}
				
			}
			
		} // end osah_load_admin_js function
		
	} // end osah_load_admin_jsClass class
	
}

?>