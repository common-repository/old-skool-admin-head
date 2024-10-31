<?php
/**
* 
* Default Options
*
* Options that Will Be Set at Activation
*
* @global string $osah_options  registered settings global variable
* 
*/

if (!class_exists('osah_defaultOptions')) { //checks is osah_defaultOptions class exists

	class osah_defaultOptions { // begin osah_defaultOptions class	
	
		public function osah_defaultOptionsArray() { // begin osah_defaultOptionsArray function
			
			// global variables
			global $osah_options;
			
			// default options
			$osah_defaultArray = array(	
				'osah_disAdminBar' => false,
				'osah_restoreHead' => false
			);
		
			update_option('osah_settings', $osah_defaultArray);
		
		} // end osah_defaultOptionsArray function
		
	} // end osah_defaultOptions class
	
}
?>