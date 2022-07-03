<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Custom Login Css
if ( ! function_exists( 'shopeo_wp_core_login_css' ) ) {
	function shopeo_wp_core_login_css() {
		wp_enqueue_style( 'shopeo-wp-core-login-style', plugins_url( '/assets/css/login.css', SHOPEO_WP_CORE_PLUGIN_FILE ) );
	}
}

add_action( 'login_enqueue_scripts', 'shopeo_wp_core_login_css' );

// Custom Login Head
if ( ! function_exists( 'shopeo_wp_core_custom_login_head' ) ) {
	function shopeo_wp_core_custom_login_head() {
		echo '<link rel="icon" href="' . plugins_url( '/assets/images/logo_bg.png', SHOPEO_WP_CORE_PLUGIN_FILE ) . '" sizes="32x32" />';
		echo '<link rel="icon" href="' . plugins_url( '/assets/images/logo_bg.png', SHOPEO_WP_CORE_PLUGIN_FILE ) . '" sizes="192x192" />';
		echo '<link rel="apple-touch-icon" href="' . plugins_url( '/assets/images/logo_bg.png', SHOPEO_WP_CORE_PLUGIN_FILE ) . '" />';
	}
}

add_action( 'login_head', 'shopeo_wp_core_custom_login_head' );

// Custom Header Url
if ( ! function_exists( 'shopeo_wp_core_custom_login_url' ) ) {
	function shopeo_wp_core_custom_login_url( $url ) {
		return get_bloginfo( 'url' );
	}
}

add_filter( 'login_headerurl', 'shopeo_wp_core_custom_login_url' );

// Custom Header Text
if ( ! function_exists( 'shopeo_wp_core_custom_header_text' ) ) {
	function shopeo_wp_core_custom_header_text( $text ) {
		return get_bloginfo( 'name' );
	}
}

add_filter( 'login_headertext', 'shopeo_wp_core_custom_header_text' );

// Custom Login Title
if ( ! function_exists( 'shopeo_wp_core_custom_login_title' ) ) {
	function shopeo_wp_core_custom_login_title( $title ) {
		return str_replace( 'WordPress', 'SHOPEO', $title );
	}
}

add_filter( 'login_title', 'shopeo_wp_core_custom_login_title' );
