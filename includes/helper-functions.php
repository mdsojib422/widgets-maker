<?php
/*
 * Functions For WidgetsMaker
 *
 */

use WidgetsMaker\HandleRequest;

function handle_widgetsm_disconnect_apps() {
    check_ajax_referer( 'widgetsm_nonce', 'nonce' );
    if ( delete_option( "widgetsm_token" ) ) {
        // Return a success message
        wp_send_json_success( [ 'message' => 'Successfully disconnected!' ] );
    }

    exit;
}
add_action( 'wp_ajax_widgetsm_disconnect_apps', 'handle_widgetsm_disconnect_apps' );

/* Sync data */
function handle_widgetsm_sync_apps_data() {
    check_ajax_referer( 'widgetsm_nonce', 'nonce' );
    HandleRequest::syncAllData();   
    // Return a success message
    wp_send_json_success( [ 'message' => 'Sync Data Successfully!' ] );
    
}
add_action( 'wp_ajax_widgetsm_sync_apps_data', 'handle_widgetsm_sync_apps_data' );

function get_widmaker_blocks_options(){
   $apps =  HandleRequest::getApplicationData();
   $options = [];
   foreach($apps->application as $app){  
    $options[] = [
        'label' => $app->widget_name,
        'value' => $app->id
    ];       
   }   
   return $options;
}