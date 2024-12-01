<?php
/**
 * Plugin Name:       Widgets Maker
 * Description:       This plugin is used to integrate with widgetsmaker service.
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Glossy It
 * Author URI:        https://www.glossyit.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       widgets-maker
 * Domain Path:       /languages
 */

use WidgetsMaker\HandleRequest;

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if ( !class_exists( "WidgetsMaker" ) ) {

    final class WidgetsMaker {

        /**
         * Instance Of WidgetsMaker
         *
         * @var [instance]
         */
        private static $instance = null;

        /**
         * Container Of Classes
         *
         * @var array
         */
        public $controllers = [];

        /**
         * Construct of WidgetsMaker
         */
        function __construct() {
            add_action( "plugin_loaded", [$this, "init"] );
            //add_action("enqueue_block_editor_assets",[$this, 'blocks_assets']);
        }

        /**
         * Singleton Instance
         * @return $instance
         */
        public static function Instance() {
            if ( self::$instance == null ) {
                self::$instance = new WidgetsMaker();
            }
            return self::$instance;
        }

        function blocks_assets(){

             wp_enqueue_script('widget-maker-blocks',plugins_url( 'blocks/build/index.js', __FILE__ ),array(  'wp-blocks', 'wp-element', 'wp-editor', 'wp-components'  ));

            wp_localize_script("widget-maker-blocks",'widmkr',HandleRequest::getApplicationData());


        }

        /**
         * Initialization
         * @return void
         */
        public function init() {
            // Fire on plugins load and ready the textdomain for the plugin.
            $this->widgetsm_load_textdomain();
            //define constants for plugin
            $this->defineConstants();
            // Included Required Files
            $this->includeFiles();
            // Instantiate Classes
            $this->instantiateClasses();
        }

        /**
         * Define Constant
         * @return void
         */
        public function defineConstants() {
            if ( !defined( "WIDGETSM_URL" ) ) {
                define( "WIDGETSM_URL", plugin_dir_url( __FILE__ ) );
            }
            if ( !defined( "WIDGETSM_VERSION" ) ) {
                define( "WIDGETSM_VERSION", '1.0.0' );
            }
            if ( !defined( "WIDGETSM_PATH" ) ) {
                define( "WIDGETSM_PATH", plugin_dir_path( __FILE__ ) );
            }
            if ( !defined( "WIDGETSM_CLASS_PATH" ) ) {
                define( "WIDGETSM_CLASS_PATH", plugin_dir_path( __FILE__ ) . 'includes/classes/' );
            }
        }

        /**
         * Included Required Files
         */
        public function includeFiles() {
            require_once WIDGETSM_PATH . "/includes/helper-functions.php";           
            require_once WIDGETSM_PATH . "/blocks/widgets-maker-block.php";
            require_once WIDGETSM_CLASS_PATH . "handlerequest.php";
            //Class File
            require_once WIDGETSM_CLASS_PATH . "admin.php";
            require_once WIDGETSM_CLASS_PATH . "shortcodes.php";
            require_once WIDGETSM_PATH . "/includes/elementor/widmaker-elementor.php";
            require_once WIDGETSM_CLASS_PATH . "api.php";
        }

        /**
         * Instantiate Classes
         *
         * @return void
         */
        public function instantiateClasses() {
            if ( is_admin() ) {
                $this->controllers['admin'] = WidgetsMaker\Admin::Instance();                
            }
            $this->controllers['api'] = WidgetsMaker\API::Instance();
            $this->controllers['shortcode'] = new WidgetsMaker\Shortcode();
        }

        /**
         * Plugin Language file
         * @return void
         */
        public function widgetsm_load_textdomain() {
            load_plugin_textdomain( "widgets-maker", false, dirname( __FILE__ ) . "/languages" );
        }

    }

}

if ( !function_exists( 'widgetsm_init' ) ) {
        function widgetsm_init() {
            // globals
            global $widgetsm;
            // initialize
            if ( !isset( $widgetsm ) ) {
                $widgetsm = new \WidgetsMaker();
            }
            return $widgetsm;
        }
}

// initialize
widgetsm_init();
