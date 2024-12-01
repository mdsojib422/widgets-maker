<?php 
namespace WidgetsMaker;

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


class API {

    public static $instance = '';

    public function __construct(){
        add_action( 'rest_api_init', [$this, 'register_api_handler'] );
    }

     /**
     * Singleton Instance
     * @return $instance
     */
    public static function Instance() {
        if ( self::$instance == null ) {
            self::$instance = new API();
        }
        return self::$instance;
    }

    public function register_api_handler() {
        register_rest_route( 'widmaker/v1', '/widmaker-options', array(
            'methods'  => 'GET',
            'callback' => 'get_widmaker_blocks_options',
            'permission_callback' => '__return_true',
        ) );


        register_rest_route( 'widmaker/v1', '/render-shortcode', [
            'methods'  => 'GET',
            'callback' => [$this,'render_widget_shortcode'],
            'args'     => [
                'widget_id' => [
                    'required' => true,
                    'validate_callback' => function( $param ) {
                        return is_string( $param );
                    },
                ],
            ],
        ]);
    }    
   

    public  function render_widget_shortcode( $request ) {
        $widget_id = $request->get_param( 'widget_id' );       
        $shortcode = sprintf( '[widgetsm id="%s"]', esc_attr( $widget_id ) );
        $rendered  = do_shortcode( $shortcode );    
        return rest_ensure_response( $rendered );
    }
}






