<?php 
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div id="applications" class="widgetsm-tab-content">
    <div class='main__header'>
        <h2>Your Applications</h2>
    </div>

    <div class="widgetsm-table-wrapper">
        <?php if(!empty($widgetsm_applications)): ?>
        <table class="app-table">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>Application Name</th>
                    <th>Shortcode</th>
                    <th>Preview</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (is_array( $widgetsm_applications->application ) ) {
                        $i = 1;
                        foreach ( $widgetsm_applications->application as $app ) {
                ?>
                <tr>
                    <td><?php echo esc_html($i); ?></td>
                    <td><h4><?php echo esc_html($app->widget_name); ?></h4></td>
                    <td>
                    <span class='shortcode copiable_wrap'>
                    <input type='text' onfocus='this.select();' readonly='readonly' value='[widgetsm id="<?php echo esc_html($app->id); ?>"]' class='copiable_input' >
                    <span class='tooltip'>Click To Copy</span>
                    </span>
                    </td>
                    <td>
                        <a href="https://widgetsmaker.com/review/show/<?php echo esc_html($app->id); ?>" class="preview" target="_blank">
                            <img height="40" src="<?php echo esc_url(WIDGETSM_URL . '/assets/img/preview.png'); ?>" alt="">
                        </a>
                    </td>
                </tr>
                <?php
                        $i++;
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php else:  ?>
            <div class="widgetsm-warning"><p>Connect your application to retrieve the application widget.</p></div>
        <?php endif; ?>
    </div>

</div>