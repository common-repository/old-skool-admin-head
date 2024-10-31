<?php
/*
Plugin Name: Old Skool Admin Head
Plugin URI: https://github.com/jawittdesigns/Old-Skool-Admin-Head
Version: 1.1
Description: Plugin Template
Author: Jason Witt
Author URI:
License: GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
* 
* Old Skool Admin Head
*
* Disable the WordPress 3.3 Toolbar and Restoring the 3.2 Head
*
* @author Jason Witt <jawittdesigns@gmail.com>
* @copyright Copyright (c) 2011, Jason Witt
* @version Plugin Version 1.0 beta
* @license GPLv2 http://www.gnu.org/licenses/gpl-2.0.html
* @link https://github.com/jawittdesigns/Old-Skool-Admin-Head Old Skool Admin Head
* 
*/

/**
* 
* Check if Using SSL
*
* Checks if the WordPress Site is using SSL. 
*
* @return mixed 
* 
*/

if ( ! function_exists( 'is_ssl' ) ) {
	function is_ssl() {
		if ( isset($_SERVER['HTTPS']) ) {
			if ( 'on' == strtolower($_SERVER['HTTPS']) )
				return true;
				if ( '1' == $_SERVER['HTTPS'] )
					return true;
				} elseif ( 
				isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
				return true;
			}
		return false;
	}
}

/**
* 
* Get the Site's URL
*
* Checks the Site's version and if is using SSL. Returns URl in a Variable 
*
* @param $wp_content_url 
* 
*/

if ( version_compare( get_bloginfo( 'version' ) , '3.0' , '<' ) && is_ssl() ) {
	$wp_content_url = str_replace( 'http://' , 'https://' , get_option( 'siteurl' ) );
} else {
	$wp_content_url = get_option( 'siteurl' );
}

/**
* 
* Global Variables
*
* List the Global Variables
*
* @global $wp_plugin_name  plugin directory name
* @global $wp_content_dir  wp-content absolute path
* @global $wp_content_url  wp-content url
* @global $wp_plugin_url  plugin url
* @global $wp_plugin_dir  plugin directory absolute path
* @global $wp_plugin_version  plugin version
* @global $osah_options  registered settings global variable
* 
*/

$wp_plugin_name = '/old-skool-admin-head';
$wp_content_dir = ABSPATH . 'wp-content';
$wp_content_url .= '/wp-content';
$wp_plugin_url = $wp_content_url . '/plugins'.$wp_plugin_name;
$wp_plugin_dir = $wp_content_dir . '/plugins'.$wp_plugin_name;
$wp_plugin_version = '1.0';
$osah_options = get_option('osah_settings');

/**
* 
* Includes
*
* Files to Include
* 
*/

include($wp_plugin_dir.'/includes/class.register-settings.php');
include($wp_plugin_dir.'/includes/class.options.php');
include($wp_plugin_dir.'/includes/load-scripts/class.admin-js.php');
include($wp_plugin_dir.'/includes/class.admin.php');
include($wp_plugin_dir.'/includes/class.deactivate.php');
include($wp_plugin_dir.'/includes/functions/class.dis-admin-bar.php');

/**
* 
* Class Instances
*
* Variables for Class Instances 
*
*/

$osah_regSettingsClass = new osah_regSettingsClass();
$osah_defaultOptions = new osah_defaultOptions();
$osah_load_admin_jsClass = new osah_load_admin_jsClass();
$osah_optionsLinkClass = new osah_optionsLinkClass();
$osah_deactivateClass = new osah_deactivateClass();
$osah_disableAdminBarClass = new osah_disableAdminBarClass();

/**
* 
* Actions And Filters
*
*
*/

add_action('admin_init', array($osah_regSettingsClass,'osah_registerSettings')); 
register_activation_hook(__FILE__, array($osah_defaultOptions,'osah_defaultOptionsArray'));
add_action( 'admin_enqueue_scripts',array($osah_load_admin_jsClass,'osah_load_admin_js') );
add_action('admin_menu', array($osah_optionsLinkClass,'osah_optionsLink'));
register_deactivation_hook ( __FILE__, array($osah_deactivateClass,'osah_deactivate'));
add_action ( 'init',array($osah_disableAdminBarClass,'osah_disableAdminBar' ) );
?>