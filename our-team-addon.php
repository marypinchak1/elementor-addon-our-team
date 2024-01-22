<?php
/**
 * Plugin Name: Our Team Elementor Addon
 * Description: Custom Elementor addon to display team members.
 * Version: 1.0
 * Author: Mariia Pinchak
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Our_Team_Elementor_Addon
{

    public function __construct()
    {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    public function register_widgets()
    {
        // Include widget file
        require_once('widgets/our-team-widget.php');

        // Register widget
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Our_Team_Widget());
    }

    public function enqueue_styles()
    {
        // Add styles
        wp_enqueue_style('our-team-addon-styles', plugins_url('css/styles.css', __FILE__));
    }
}

new Our_Team_Elementor_Addon();