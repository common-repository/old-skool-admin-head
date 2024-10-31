<div class="osah_disAdminBarForm">

  <?php settings_fields('osah_settingsGroup'); //  set the fields to  osah_settingsGroup ?>
  
  <h2><?php _e('Old Skool Admin Head', 'osah_domain'); ?> </h2>
  
  <table width="100%" class="osah_disAdminBar_form">
  
  <colgroup><col style="width:10px"/></colgroup>
  <colgroup><col /></colgroup>
  <colgroup><col style="width:10px"/></colgroup>
  <colgroup><col /></colgroup>
  
  <tr>
    <td>
    	<input type="checkbox" id="osah_settings[osah_disAdminBar]" name="osah_settings[osah_disAdminBar]" class="hcu_frmelm " value="1"  <?php if(isset($osah_options['osah_disAdminBar'])) { checked(1, $osah_options['osah_disAdminBar']); } ?>/>
    </td>
    <td>
    	<label class="description" for="osah_settings[osah_disAdminBar]"><?php _e('Disable Toolbar', 'osah_domain'); ?></label>
    </td>
  </tr>
  
  <tr>
    <td>
    	<input type="checkbox" id="osah_settings[osah_restoreHead]" name="osah_settings[osah_restoreHead]" class="hcu_frmelm " value="1"  <?php if(isset($osah_options['osah_restoreHead'])) { checked(1, $osah_options['osah_restoreHead']); } ?>/>
    </td>
    <td>
    	<label class="description" for="osah_settings[osah_restoreHead]"><?php _e('Restore Admin Head', 'osah_domain'); ?></label>
    </td>
  </tr>
  </table>
  
  <p class="submit">
  	<input type="submit" class="button-primary" value="<?php _e('Save Options', 'osah_domain'); ?>" />
  </p>
  
</div>