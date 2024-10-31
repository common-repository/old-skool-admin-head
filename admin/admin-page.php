<?php
/**
* 
* Admin Options Page
*
* Build the Adim Options Page. Include Options Forms
*
* @global string $wp_plugin_dir  plugin directory absolute path
* @global string $osah_options  registered settings global variable
* 
*/
/*----------------------------------------------------------*/
if (!class_exists('osah_adminPageClass')) { //checks is osah_adminPageClass class exists	

	class osah_adminPageClass { // begin osah_adminPageClass class
	
		function __construct() { // the constructor	
		}
		
		public function osah_adminPage() { // begin osah_adminPage function
		
			// global variables
			global $osah_options , $wp_plugin_dir;
			
			// output the HTML for the options page
			ob_start();?> 
			<div class="wrap">
      	 <form method="post" enctype="multipart/form-data" action="options.php">
				<?php include($wp_plugin_dir.'/admin/dis-admin-form.php'); ?>
				<hr />
        </form>
			</div>
			<?php
			echo ob_get_clean();
			
		} // end osah_adminPage function
		
	} // end osah_adminPageClass class
	
}
?>