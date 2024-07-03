<?php
/*
Plugin Name: UFO Booking Addons
Description: A plugin to display booking widget.
Version: 1.0
Author: UnikForce IT
License: GPL2
*/

// Ensure this file is loaded within WordPress.
defined('ABSPATH') || exit;

if( !function_exists( 'ufobooking_enqueue_scripts' ) ){
    function ufobooking_enqueue_scripts(){
        wp_enqueue_style( 'ufobooking-addons-style', plugins_url( '/assets/ufobooking.css' , __FILE__ ), array(), '', 'all' );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'ufobooking-addons-script',  plugins_url( '/assets/ufobooking.js' , __FILE__ ), array( 'jquery'), '', true );

        $ajax_url = admin_url( 'admin-ajax.php' );
        $UFO_ADDON_DATA = array(
            'ajaxurl'   => $ajax_url,
            'site_url'  => site_url(),
        );
        wp_localize_script( 'ufobooking-addons-script', 'UFO_ADDON_DATA', $UFO_ADDON_DATA );
    }
}
add_action( 'wp_enqueue_scripts', 'ufobooking_enqueue_scripts' );

add_action('elementor/frontend/after_register_scripts', 'ufo_register_frontend_scripts', 10);
function ufo_register_frontend_scripts() {
    wp_enqueue_script( 'ufobooking-addons-editor',  plugins_url( '/assets/editor.js' , __FILE__ ), array( 'jquery'), '', true );
}

require_once( __DIR__ . '/helper.php' );

// Include the Elementor widget class.
function register_new_widgets( $widgets_manager ) {
    require_once( __DIR__ . '/widget/booking/index.php' );
}
add_action( 'elementor/widgets/register', 'register_new_widgets' );
