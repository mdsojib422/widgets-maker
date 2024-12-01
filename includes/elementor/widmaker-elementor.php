<?php
// What are you trying to do?
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !class_exists( "WidMaker" ) ) {
    class WidMaker {

        private static $instance;

        public static function Instance() {
            if ( self::$instance === null ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * @return void
         */
        public function init() {
            if ( $this->met_requirement() && !empty( get_option( 'widgetsm_token' ) ) ) {
                add_action( 'elementor/widgets/register', [$this, "widmaker_elementor_shortcode"] );
            }
        }

        /**
         * @return bool
         */
        public function met_requirement() {

            if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * @param $widgets_manager
         * @return void
         */
        public function widmaker_elementor_shortcode( $widgets_manager ) {
            require_once __DIR__ . '/widgets/widmaker-widgets.php';
            $widgets_manager->register( new Widmaker_Widgets() );
        }
    }
}
$instance = WidMaker::Instance();
$instance->init();