<?php
/**
 * Plugin Name: Elementor Customs Widget
 * Description: Customs widget for Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-list-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


public function __construct() {
    parent::__construct();

    // Enqueue CSS and JS
    add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_styles' ) );
    add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
}

public function enqueue_styles() {
    wp_enqueue_style( 'my-elementor-widget-style', plugins_url( '/assets/css/widget-style.css', __FILE__ ) );
}

public function enqueue_scripts() {
    wp_enqueue_script( 'my-elementor-widget-script', plugins_url( '/assets/js/widget-script.js', __FILE__ ), array( 'jquery' ), '', true );
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 *
 * @return void
 * @since 1.0.0
 */
function register_customs_widget( $widgets_manager ) {
	require_once( __DIR__ . '/widgets/list-widget.php' );

	$widgets_manager->register( new \Elementor_Our_Team_Widget() );
}

add_action( 'elementor/widgets/register', 'register_customs_widget' );