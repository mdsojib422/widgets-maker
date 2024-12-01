<?php

use WidgetsMaker\HandleRequest;

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$userInfo = HandleRequest::savedUserInformation();
?>
<div id="widgetsm-connect" class="widgetsm-tab-content">
    <div class='main__header'>
        <h2>Connect With <a href="https://widgetsmaker.com" target="_blank">Widgets Maker</a></h2>
        <div class="widgetsm-connect-with">
            <?php echo empty($userInfo) ? '<button id="widgetsm-connect-btn" class="widgetsm-btn">Connect With Apps</button>' : '<a id="widgetsm-sync" href="#">Sync Data <img src=" '. esc_url(admin_url('images/spinner.gif')).'" alt="" srcset=""> </a><button id="widgetsm-discount" class="widgetsm-btn">Disconnect</button>';  ?>
        </div>
    </div>
    <div class='main__content'>        
        <?php 
            if(!empty($userInfo)):        
        ?>
        <div class="widgetsm-card">           
            <div class="widgetsm-user-details">
                <div class="user-details">
                    <div class="widgetsm-userid-label"><h4>#<?php echo esc_html($userInfo->id); ?></h4></div>
                    <div class="user-info">
                        <img src="<?php echo esc_attr(WIDGETSM_URL . '/assets/img/person.png'); ?>" alt="User Avatar" class="avatar">
                        <div class="info">
                            <h2><?php echo esc_html($userInfo->name); ?></h2>
                            <p><?php echo esc_html($userInfo->email); ?></p>
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="widgetsm-subscription-details">
                <div class="subscription-details">
                    <h3>Subscription Details</h3>
                    <p class="plan-name"><?php echo esc_html($userInfo->payment[0]->plan_name); ?> Plan</p>
                    <span class="status active">Active</span>
                    <?php if($userInfo->payment[0]->paid_till): ?>
                    <p>Next Billing: <?php echo esc_html($userInfo->payment[0]->paid_till);  ?></p>
                    <?php else: ?>
                   
                    <?php endif; ?>
                    <p class="mansub-btn">
                        <a href="<?php echo esc_url('https://widgetsmaker.com/login'); ?>" target="_blank" class="manage-btn">Manage Subscription</a>
                    </p>
                </div>
            </div>
        </div>
        
        <?php else: ?>
            <div class="widgetsm-warning"><p>Connect your application to retrieve the user and plan information.</p></div>
        <?php endif; ?>
    </div>
</div>