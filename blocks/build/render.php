<?php
/**
 * Server-side rendering for the copyright block.
 *
 * Variables exposed:
 * - $attributes (array): Block attributes.
 * - $content (string): Block default content.
 * - $block (WP_Block): Block instance.
 *
 * @package block-developer-examples
 */



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

