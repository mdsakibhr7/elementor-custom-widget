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

class Elementor_Customs_Widget_Plugin {

	public function __construct() {
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_styles' ) );
		add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'elementor/widgets/register', array( $this, 'register_customs_widget' ) );
	}

	public function enqueue_styles() {
		wp_enqueue_style( 'widget-style', plugins_url( '/assets/css/style.css', __FILE__ ) );

	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'widget-script', plugins_url( '/assets/js/script.js', __FILE__ ), array( 'jquery' ), '', true );
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
	public function register_customs_widget( $widgets_manager ) {
		require_once( __DIR__ . '/widgets/list-widget.php' );

		$widgets_manager->register( new \Elementor_Our_Team_Widget() );
	}
}

new Elementor_Customs_Widget_Plugin();
