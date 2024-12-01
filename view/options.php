<?php

use WidgetsMaker\HandleRequest;

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$widgetsm_applications = HandleRequest::getApplicationData();
?>
<div class="widgetsm-options-panel">
    <header class="widgetsm-options-panel-header">
        <h1><?php esc_html_e( "Widgets Maker", 'widgets-maker' );?></h1>
    </header>
    <div class='container'>
        <div class='sidepanel'>
            <div class='widgetsm-tab-item widgetsm-active-tab'>            
                Connect
            </div>
            <div class='widgetsm-tab-item '>              
                Applications
            </div>
        </div>
        <div class='main'>
            <?php include_once 'tabs/connects.php' ?>
            <?php include_once 'tabs/applications.php' ?>            
        </div>
    </div>

</div>