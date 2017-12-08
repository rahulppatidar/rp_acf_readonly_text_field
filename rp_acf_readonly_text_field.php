<?php

/*
Plugin Name: RP Acf Readonly Text Field
Author: RahulPpatidar
Description: This plugin add readonly and disable readio button to acf text fields
*/

if( !class_exists('acf') ) {       
         add_action( 'admin_notices', 'rp_acf_admin_notice' );
         if(is_plugin_active(plugin_basename( __FILE__ ))){
        	 deactivate_plugins( plugin_basename( __FILE__ ) );
     	}
}

add_action('acf/render_field_settings/type=text', 'add_readonly_and_disabled_to_text_field');
  function add_readonly_and_disabled_to_text_field($field) {
    acf_render_field_setting( $field, array(
      'label'      => __('Read Only?','acf'),
      'instructions'  => '',
      'type'      => 'radio',
      'name'      => 'readonly',
      'choices'    => array(        
        0        => __("No",'acf'),
        1        => __("Yes",'acf'),
      ),
      'layout'  =>  'horizontal',
    ),false);
    acf_render_field_setting( $field, array(
      'label'      => __('Disabled?','acf'),
      'instructions'  => '',
      'type'      => 'radio',
      'name'      => 'disabled',
      'choices'    => array(       
        0        => __("No",'acf'),
        1        => __("Yes",'acf'),
      ),
      'layout'  =>  'horizontal',
    ),false);
  }


  function rp_acf_admin_notice() {
  	$rp_theme = wp_get_theme();
    	 if ( $rp_theme->exists() ){
    	 $rptextdomain=$rp_theme->get( 'TextDomain' );
    	}
    ?>
    <div class="notice error rp-acf-notice is-dismissible" >
    	 
        <p><?php _e( 'ACF is necessary for RP Acf Readonly Text Field plugin, install it now!', $rptextdomain ); ?></p>
    </div>


    <?php
}