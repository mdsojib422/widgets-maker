<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
use WidgetsMaker\HandleRequest;
use \Elementor\Controls_Manager;
use \Elementor\Widget_Base;

class Widmaker_Widgets extends Widget_Base {

    /**
     * @return string
     */
    public function get_name() {
        return 'widmaker_shortcode';
    }

    /**
     * @return string
     */
    public function get_title() {
        return esc_html__( 'Widgets Maker', "widgets-maker" );
    }

    /**
     * @return string
     */
    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    /**
     * @return string[]
     */
    public function get_categories() {
        return ['basic'];
    }

    /**
     * @return string[]
     */
    public function get_keywords() {
        return ['oembed', 'url', 'link'];
    }

    /**
     * @return void
     */
    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Forms', "widgets-maker" ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'select_widmaker',
            [
                'label'       => esc_html__( 'Select Form', "widgets-maker" ),
                'label_block' => true,
                'type'        => Controls_Manager::SELECT,
                'default'     => 'select_option',
                'options'     => $this->getWdigets(),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * @return array
     */
    public function getWdigets() {
        $widmaker_widgets = HandleRequest::getApplicationData();
        $selectOption = [];
        $selectOption['select_option'] = esc_html__( "Select Widgets", "widgets-maker" );
        foreach ( $widmaker_widgets->application as $widget ) {
            $selectOption[$widget->id] = $widget->widget_name;
        }
        return $selectOption;
    }

    /**
     * @return void
     */
    protected function render() {
        $settings = $this->get_settings_for_display();      
        $wid = $settings['select_widmaker'];
        if ( "select_option" != $wid ) {
            echo do_shortcode( "[widgetsm id='$wid' title='']" );
        } else {
            printf( "<h4>%s:</h4>", esc_html__( "Please select a form", 'widgets-maker' ) );
        }
    }
}