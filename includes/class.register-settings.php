<?php
/**
* 
* Register Settings
*
* Function that Register Settins
*
* @global string $osah_options  registered settings global variable
* 
*/

if (!class_exists('osah_regSettingsClass')) { //checks is osah_regSettingsClass class exists

	class osah_regSettingsClass { // begin osah_regSettingsClass class
	
		function __construct() { // the constructor
		}
		
		public function osah_registerSettings() { // begin osah_registerSettings function
		
			register_setting('osah_settingsGroup', 'osah_settings');
			
		} // end osah_registerSettings function
		
	} // end osah_regSettingsClass class
	
}
?>