<?php
/*
Plugin Name: Excursion Booking
Plugin URI: http://plugins.rmweblab.com/excursion-booking/
Description: Excursion Booking is short trip related booking system.
Author: RM Web Lab
Version: 1.0
Author URI: https://rmweblab.com
Copyright: © 2017 RM Web Lab.
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: excursion_booking
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main StarfishRM clas set up for us
 */
class ExcursionBooking{

	/**
	 * Constructor
	 */
	public function __construct() {
		define( 'EXRB_VERSION', '1.0' );
		define( 'EXRB_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
		define( 'EXRB_MAIN_FILE', __FILE__ );
		define( 'EXRB_BASE_FOLDER', dirname( __FILE__ ) );

		// Actions
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
    add_action( 'plugins_loaded', array( $this, 'init' ), 0 );
    add_action( 'admin_menu', array( $this, 'exrb_plugin_admin_menu' ) );
		//add_action( 'single_template', array( $this, 'exrb_process_review_page_template' ) );
	}

	/**
	 * Init localisations and hook
	 */
	public function init() {
		//Excursion Booked Order Items
		require_once('inc/excursion-settings-process.php');
		//Excursion Booked Order Items
		require_once('inc/excursion-orders.php');
		//Excursion items for booking
		require_once('inc/excursion-items.php');
		// Localisation
		load_plugin_textdomain( 'excursion_booking', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	}

	/**
	 * Add relevant links to plugins page
	 * @param  array $links
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		$plugin_links = array(
			'<a href="' . admin_url( 'edit.php?post_type=excursion_booking_review&page=excursion_booking-settings' ) . '">' . __( 'Settings', 'excursion_booking' ) . '</a>',
		);
		return array_merge( $plugin_links, $links );
	}

  /**
	 * Add admin settings menu
	 */
	public function exrb_plugin_admin_menu() {
		add_submenu_page( 'edit.php?post_type=exrb_order', __( 'Settings', 'excursion_booking' ), __( 'Settings', 'excursion_booking' ), 'administrator', 'excursion-booking-settings', array(	$this,	'excursion_booking_settings_plugin_page'));
	}

	public function excursion_booking_settings_plugin_page(){
		//Plugin settings
		require_once('inc/excursion-settings.php');
	}

}

new ExcursionBooking();
