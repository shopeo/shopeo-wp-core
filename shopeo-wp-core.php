<?php
/**
 * Plugin Name: SHOPEO WP Core
 * Plugin URI: https://wordpress.org/plugins/shopeo-wp-core
 * Description: The easy way to customize your WordPress <code>wp-login.php</code> screen!
 * Author: Shopeo
 * Version: 0.0.2
 * Author URI: https://shopeo.cn
 * License: GPL2+
 * Text Domain: shopeo-wp-core
 * Domain Path: /languages
 * Requires at least: 5.9
 * Requires PHP: 5.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define SHOPEO_WP_CORE_PLUGIN_FILE.
if ( ! defined( 'SHOPEO_WP_CORE_PLUGIN_FILE' ) ) {
	define( 'SHOPEO_WP_CORE_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'SHOPEO_WP_CORE_PLUGIN_BASE' ) ) {
	define( 'SHOPEO_WP_CORE_PLUGIN_BASE', plugin_basename( SHOPEO_WP_CORE_PLUGIN_FILE ) );
}

if ( ! defined( 'SHOPEO_WP_CORE_PATH' ) ) {
	define( 'SHOPEO_WP_CORE_PATH', plugin_dir_path( SHOPEO_WP_CORE_PLUGIN_FILE ) );
}

if ( ! function_exists( 'shopeo_wp_core_activate' ) ) {
	function shopeo_wp_core_activate() {

	}
}

register_activation_hook( __FILE__, 'shopeo_wp_core_activate' );

if ( ! function_exists( 'shopeo_wp_core_deactivate' ) ) {
	function shopeo_wp_core_deactivate() {

	}
}

register_deactivation_hook( __FILE__, 'shopeo_wp_core_deactivate' );

// Load text domain
if ( ! function_exists( 'shopeo_wp_core_load_textdomain' ) ) {
	function shopeo_wp_core_load_textdomain() {
		load_plugin_textdomain( 'shopeo-wp-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

add_action( 'init', 'shopeo_wp_core_load_textdomain' );

require_once __DIR__ . "/includes/login-style.php";
require_once __DIR__ . "/includes/admin-style.php";
