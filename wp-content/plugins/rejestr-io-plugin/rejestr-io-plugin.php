<?php

/**
 * @package Rejestr IO plugin
 */
/*
    Plugin Name: Rejestr IO Form plugin
    Plugin URI: https://example.com/
    Description: Entity data search form by tax identification number (NIP)
    Version: 1.0.0
    Author: Mateusz Skrzypiec
    Author URI: https://example.com
    */

define('PLUGIN_INC_DIR', plugin_dir_path(__FILE__) . '/inc');
define('PLUGIN_TEMPLATES_DIR', plugin_dir_path(__FILE__) . '/templates');

require_once(PLUGIN_INC_DIR . '/form-widget.php');
require_once(PLUGIN_INC_DIR . '/backend.php');



function widget($atts)
{

    global $wp_widget_factory;

    extract(shortcode_atts(array(
        'widget_name' => FALSE
    ), $atts));

    $widget_name = wp_specialchars($widget_name);

    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')) :
        $wp_class = 'WP_Widget_' . ucwords(strtolower($class));

        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')) :
            return '<p>' . sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"), '<strong>' . $class . '</strong>') . '</p>';
        else :
            $class = $wp_class;
        endif;
    endif;

    ob_start();
    the_widget($widget_name, $instance, array(
        'widget_id' => 'arbitrary-instance-' . $id,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('widget', 'widget');


/*[widget widget_name="RejestrIoWidget"]*/