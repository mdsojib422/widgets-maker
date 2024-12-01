<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function block_widgets_maker() {
	register_block_type( __DIR__ . '/build',[
        'render_callback' => 'render_widgetsmaker_block',
    ] );
}
add_action( 'init', 'block_widgets_maker' );

function render_widgetsmaker_block( $attributes ) {
    // Extract the widgetsmakerId from attributes
    $widgetsmakerId = isset( $attributes['widgetsmakerId'] ) ? $attributes['widgetsmakerId'] : '';

    if ( empty( $widgetsmakerId ) ) {
        return '<p>' . esc_html__( 'Please select a widget to display.', 'widgets-maker' ) . '</p>';
    }

    // Generate the shortcode
    $shortcode = sprintf( '[widgetsm id="%s"]', esc_attr( $widgetsmakerId ) );

    // Execute the shortcode and capture the output
    $renderedShortcode = do_shortcode( $shortcode );

    // Return the rendered output
    return sprintf(
        '<div class="widgetsmaker-widget">%s</div>',
        $renderedShortcode
    );
}