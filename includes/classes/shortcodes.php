<?php
namespace WidgetsMaker;
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Shortcode {
    protected $token = '';
    public function __construct() {
        if ( !shortcode_exists( "widgetsm" ) ) {
            add_shortcode( "widgetsm", [$this, "widgetsm_callback_fun"] );
            $this->token = get_option( "widgetsm_token" );
            add_action( "wp_enqueue_scripts", [$this, 'widgetsm_assets'] );
        }
    }
    public function widgetsm_assets() {
        wp_enqueue_script( "widgetsm-frontend", WIDGETSM_URL . '/assets/js/frontend.js', ['jquery'], WIDGETSM_VERSION, true );
    }
    public function widgetsm_callback_fun( $atts ) {
        $atts = shortcode_atts(
            [
                'id'     => '',
                'width'  => '100%',
                'height' => '900px',
            ], $atts
        );
        ob_start();
        if ( !empty( $this->token ) ) {
            echo '<div class="widgetsm-wrapper">';
            printf( "<div class='widgetsm-iframe-box' data-data='%s'></div>", wp_json_encode($atts) );
            echo "</div>";

        } else {
            echo '<div class="widgetsm-warning"><p>Connect your application to retrieve the application widget.</p></div>';
        }
        return ob_get_clean();

    }

}