/*  Login Dropdown
----------------------------------------------------------*/
var $j = jQuery.noConflict();
$j(function () {
	$j('#user_info').click(function () {
		
		if ($j('#wp_user').hasClass('active')){
			$j('#wp_user').removeClass('active');
			$j('#user_info_links').slideUp(200, function() {
    		$j('#user_info_links').removeClass('active');
  		});
		} else {
				$j('#wp_user').addClass('active');
				$j('#user_info_links').slideDown(200, function() {
    		$j('#user_info_links').addClass('active');
  		});
		}
	});
});