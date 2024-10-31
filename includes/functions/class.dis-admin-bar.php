<?php
/**
* 
* Old Skool Admin Head Core Function
*
* Disables the WordPress vs. 3.3 toolbar and re-creates 
* the admin head from the earlier WordPress 3.0 series.
* Creates a admin notice to set the options
*
* @global bool $osah_options  registered settings
* @global string $wp_plugin_url  plugin url
* 
*/

if (!class_exists('osah_disableAdminBarClass')) { //checks is osah_disableAdminBarClass class exists

	class osah_disableAdminBarClass { // begin osah_disableAdminBarClass class
	
		function __construct() { // the constructor	
		}
		
		public function osah_disableAdminBar() { // begin osah_disableAdminBar function
		
			// global variables
			global $osah_options;
			
			if(isset($osah_options['osah_disAdminBar'])) { // checks if osah_disAdminBar setting is set
			
				if($osah_options['osah_disAdminBar'] == true) { // if osah_disAdminBar settingvalue is 'true'
				
					remove_action( 'admin_footer', 'wp_admin_bar_render', 1000 );
					
				}
				
			}
			
			if(isset($osah_options['osah_restoreHead'])) { // checks if osah_restoreHead setting is set
			
				if($osah_options['osah_restoreHead'] == true) { // if osah_restoreHead settingvalue is 'true'
					
					function osah_restoreHeader() { // begin osah_restoreHeader function
						
						// global variables
						global $wp_plugin_url;
						
						// get logged in user's info
						$user_id = get_current_user_id();
						$profile_url = get_edit_profile_url( $user_id );
						$current_user = wp_get_current_user();
						$avatar = get_avatar( $user_id, 16 );
						$howdy = sprintf( __('Howdy, %1$s '), $current_user->display_name );
						
						// output the html for the admin head 
						echo'
						<div id="wphead">
						
							<div id="ab_icon">
								<img src="'.$wp_plugin_url .'/images/wp-logo.png" width="16" height="16" alt="WP-Logo" /> 
							</div>
							
							<div id="wp_site_title">
								<a href="' . home_url() . '" title="' . __( get_bloginfo('name') ) . '" target="_blank">
									' . __( get_bloginfo('name') ) . '
								</a>
							</div>
							
							<div  id="wp_user">
							
								<div id="user_info">'.
									$howdy . ' <a href="'.$profile_url.'" title="Profile"> </a>';
									
									if ( is_multisite() && is_super_admin() ) { 
									
										if ( !is_network_admin() ) { 
										
											echo '
											| <a href="' . network_admin_url() . '" title="' . esc_attr__('Network Admin') . '">
											' . __('Network Admin'). '
											</a>'; 
										} else { 
										
											echo '
											| <a href="' . get_dashboard_url( get_current_user_id() ) . '" title="' . esc_attr__('Site Admin') . '">
											' . __('Site Admin') . '
											</a>'; 
										} 
									}
									
									echo'
								</div>
									
								<div id="user_info_arrow">
								</div>
								
								<div id="user_info_links">
									<ul>
										<li>
											<a href="'.$profile_url.'" title="Profile">Your Profile</a>
										</li>
										<li>
											<a href="' . wp_logout_url() . '">Log Out</a>
										</li>
									</ul>
								</div>
									
							</div>
	
						</div>';
						
					} // end osah_restoreHeader function
					
					// initiate osah_restoreHeader function
					add_action( 'in_admin_header', 'osah_restoreHeader' );
					
				}
				
			}
			
		} // end osah_disableAdminBar function
		
	} // end osah_disableAdminBarClass class
}
?>
