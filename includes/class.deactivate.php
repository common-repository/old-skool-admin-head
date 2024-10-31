<?php
/**
* 
* Deactivation
*
* Functions to Run on Deativation
*
* @global string $osah_options  registered settings global variable
* 
*/

if (!class_exists('osah_deactivateClass')) { //checks is osah_deactivateClass class exists

	class osah_deactivateClass { // begin osah_deactivateClass class
	
		function __construct() { // the constructor
		}
		
		public function osah_deactivate() { // begin osah_deactivate function
		
			delete_option('osah_settings');
			
		} // end osah_deactivateClass class
		
	} // end osah_deactivateClass class
	
}
?>