<?php
namespace WidgetsMaker;
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Admin {
    public static $instance = '';

    /**
     * Singleton Instance
     * @return $instance
     */
    public static function Instance() {
        if ( self::$instance == null ) {
            self::$instance = new Admin();
        }
        return self::$instance;
    }
    public function __construct() {
        add_action( 'admin_menu', [$this, 'widgetsm_options_page'] );
        add_action( 'admin_enqueue_scripts', [$this, 'widgetsm_options_page_assets'] );
    }

    public function widgetsm_options_page_assets( $screen ) {
        if ( $screen !== 'toplevel_page_widgetsmaker' ) {
            return;
        }
        wp_enqueue_style( 'widgetsm-options-page', WIDGETSM_URL . 'assets/css/widgetsm-main.css' ); 
        wp_enqueue_script( 'widgetsm-options-page', WIDGETSM_URL . 'assets/js/widgetsm-main.js', [], time(), true );

        $obj = [
            'redirectUrl'=> admin_url('admin.php?page=widgetsmaker'),
            'ajax_url' => admin_url("admin-ajax.php"),
            'nonce'   => wp_create_nonce( 'widgetsm_nonce' ),
            
        ];
        
        wp_localize_script("widgetsm-options-page",'widgetsm',$obj);

    }

    public function widgetsm_options_page() {
        add_menu_page(
            __( "WidgetsMaker", "widgets-maker" ),
            __( "WidgetsMaker", "widgets-maker" ),
            'manage_options', // Capability
            'widgetsmaker', // Menu slug
            [$this, 'widgetsm_options_page_display'],
            'dashicons-admin-generic', // Icon
            20
        );

    }

    public function widgetsm_options_page_display() {
        HandleRequest::storedToken($_GET);
        wp_nonce_field('widgetsm_options_save', 'widgetsm_options_nonce');
        include_once WIDGETSM_PATH . 'view/options.php';
    }

}
