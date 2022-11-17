<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Custom Admin Css
if ( ! function_exists( 'shopeo_wp_core_admin_css' ) ) {
	function shopeo_wp_core_admin_css() {
		wp_enqueue_style( 'shopeo-wp-core-admin-style', plugins_url( '/assets/css/admin.css', SHOPEO_WP_CORE_PLUGIN_FILE ) );
	}
}

add_action( 'admin_enqueue_scripts', 'shopeo_wp_core_admin_css' );

// Custom Login Logo
if ( ! function_exists( 'shopeo_wp_core_custom_admin_head' ) ) {
	function shopeo_wp_core_custom_admin_head() {
		echo '<link rel="icon" href="' . plugins_url( '/assets/images/logo_bg.png', SHOPEO_WP_CORE_PLUGIN_FILE ) . '" sizes="32x32" />';
		echo '<link rel="icon" href="' . plugins_url( '/assets/images/logo_bg.png', SHOPEO_WP_CORE_PLUGIN_FILE ) . '" sizes="192x192" />';
		echo '<link rel="apple-touch-icon" href="' . plugins_url( '/assets/images/logo_bg.png', SHOPEO_WP_CORE_PLUGIN_FILE ) . '" />';
	}
}

add_action( 'admin_head', 'shopeo_wp_core_custom_admin_head' );

if ( ! function_exists( 'shopeo_wp_core_custom_admin_title' ) ) {
	function shopeo_wp_core_custom_admin_title( $title ) {
		return str_replace( 'WordPress', 'SHOPEO', $title );
	}
}

add_filter( 'admin_title', 'shopeo_wp_core_custom_admin_title' );

// Custom Admin Footer Text
if ( ! function_exists( 'shopeo_wp_core_custom_admin_footer_text' ) ) {
	function shopeo_wp_core_custom_admin_footer_text( $text ) {
		$text = sprintf(
				__( 'Powered by <a target="_blank" href="%s">SHOPEO</a>.', 'shopeo-wp-core' ),
				'https://shopeo.cn/'
		);

		return '<span id="footer-thankyou">' . $text . '</span>';
	}
}
add_filter( 'admin_footer_text', 'shopeo_wp_core_custom_admin_footer_text' );

// Custom Update Right Now Text
if ( ! function_exists( 'shopeo_wp_core_update_right_now_text' ) ) {
	function shopeo_wp_core_update_right_now_text( $text ) {
		$content = __( 'SHOPEO %1$s running %2$s theme.', 'shopeo-wp-core' );

		return $content;
	}
}

add_filter( 'update_right_now_text', 'shopeo_wp_core_update_right_now_text' );

// Remove WordPress ToolBar
if ( ! function_exists( 'shopeo_wp_core_remove_wordpress_tool_bar' ) ) {
	function shopeo_wp_core_remove_wordpress_tool_bar( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'wp-logo' );
	}
}

add_action( 'admin_bar_menu', 'shopeo_wp_core_remove_wordpress_tool_bar', 999 );

// Add Shopeo ToolBar

if ( ! function_exists( 'shopeo_wp_core_add_shopeo_tool_bar' ) ) {
	function shopeo_wp_core_add_shopeo_tool_bar( $wp_admin_bar ) {

		$wp_logo_menu_args = array(
				'id'    => 'shopeo_bar',
				'title' => '<span class="ab-icon" aria-hidden="true"></span><span class="screen-reader-text">' . __( 'About SHOPEO', 'shopeo-wp-core' ) . '</span>',
				'href'  => 'https://shopeo.cn'
		);

		$wp_admin_bar->add_node( $wp_logo_menu_args );

		$wp_admin_bar->add_node( array(
				'parent' => 'shopeo_bar',
				'id'     => 'shopeo_about_bar',
				'title'  => __( 'About SHOPEO', 'shopeo-wp-core' ),
				'href'   => 'https://shopeo.cn'
		) );

		$wp_admin_bar->add_group( array(
				'parent' => 'shopeo_bar',
				'id'     => 'shopeo-bar-external',
				'meta'   => array(
						'class' => 'ab-sub-secondary',
				),
		) );

		$wp_admin_bar->add_node( array(
				'parent' => 'shopeo-bar-external',
				'id'     => 'shopeo_website',
				'title'  => 'shopeo.cn',
				'href'   => 'https://shopeo.cn'
		) );
	}
}

add_action( 'admin_bar_menu', 'shopeo_wp_core_add_shopeo_tool_bar', 1 );

// Remove WordPress Events and News Panel and Welcome Panel
if ( ! function_exists( 'shopeo_wp_core_remove_dashboard_wordpress_events_panel' ) ) {
	function shopeo_wp_core_remove_dashboard_wordpress_events_panel() {
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
	}
}
add_action( 'wp_dashboard_setup', 'shopeo_wp_core_remove_dashboard_wordpress_events_panel' );

// SHOPEO Welcome Panel
if ( ! function_exists( 'shopeo_wp_core_welcome_panel' ) ) {
	function shopeo_wp_core_welcome_panel() {
		?>
		<div class="welcome-panel-content">
			<div class="welcome-panel-header">
				<div class="welcome-panel-header-image">

				</div>
				<h2><?php _e( 'Welcome to SHOPEO!', 'shopeo-wp-core' ); ?></h2>
				<p>
					<a target="_blank"
					   href="https://shopeo.cn"><?php _e( 'Website Development plan, Search Engine Optimization, Company Registration.', 'shopeo-wp-core' ); ?></a>
				</p>
			</div>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<div class="welcome-panel-icon-pages"></div>
					<div class="welcome-panel-column-content">
						<h3><?php _e( 'Website Development', 'shopeo-wp-core' ); ?></h3>
						<p><?php _e( 'Create an exclusive brand that truly meets the needs of the enterprise, has unique charm and is easy to spread in the data age, and creates a high-quality website dedicated to the enterprise.', 'shopeo-wp-core' ); ?></p>
						<a target="_blank"
						   href="https://shopeo.cn"><?php _e( 'View Service', 'shopeo-wp-core' ); ?></a>
					</div>
				</div>
				<div class="welcome-panel-column">
					<div class="welcome-panel-icon-layout"></div>
					<div class="welcome-panel-column-content">
						<h3><?php _e( 'Search Engine Optimization', 'shopeo-wp-core' ); ?></h3>
						<p><?php _e( 'Years of online marketing experience to help you build sustainable brand planning and business strategies, from brand development and creative planning to SEO optimization.', 'shopeo-wp-core' ); ?></p>
						<a target="_blank"
						   href="https://shopeo.cn"><?php _e( 'View Service', 'shopeo-wp-core' ); ?></a>
					</div>
				</div>
				<div class="welcome-panel-column">
					<div class="welcome-panel-icon-styles"></div>
					<div class="welcome-panel-column-content">
						<h3><?php _e( 'Company Registration', 'shopeo-wp-core' ); ?></h3>
						<p><?php _e( 'Provide comprehensive accounting, tax and financial planning services, and provide overseas company registration services for Chinese enterprises and individuals.', 'shopeo-wp-core' ); ?></p>
						<a target="_blank"
						   href="https://shopeo.cn"><?php _e( 'View Service', 'shopeo-wp-core' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

add_action( 'welcome_panel', 'shopeo_wp_core_welcome_panel' );

// SHOPEO Blog Panel
if ( ! function_exists( 'shopeo_blog_rss_output' ) ) {
	function shopeo_blog_rss_output( $widget_id, $feeds ) {
		foreach ( $feeds as $type => $args ) {
			$args['type'] = $type;
			echo '<div class="rss-widget">';
			wp_widget_rss_output( $args['url'], $args );
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'shopeo_blog_widget' ) ) {
	function shopeo_blog_widget() {
		$feeds = array(
				'blog' => array(
						'link'         => 'https://shopeo.cn',
						'url'          => 'https://shopeo.cn/feed/?' . time(),
						'title'        => __( 'SHOPEO Blog', 'shopeo-wp-core' ),
						'items'        => 10,
						'show_summary' => 0,
						'show_author'  => 0,
						'show_date'    => 0,
				),
		);
		shopeo_blog_rss_output( 'shopeo_blog_widget', $feeds );
	}
}

if ( ! function_exists( 'shopeo_wp_core_blog_panel' ) ) {
	function shopeo_wp_core_blog_panel() {
		wp_add_dashboard_widget( 'shopeo_blog_widget', __( 'SHOPEO Blog', 'shopeo-wp-core' ), 'shopeo_blog_widget' );
	}
}

add_action( 'wp_dashboard_setup', 'shopeo_wp_core_blog_panel' );

// Remove WordPress Version from Mate
remove_action( 'wp_head', 'wp_generator' );

// Remove WordPress Version form RSS
if ( ! function_exists( 'shopeo_wp_core_remove_wp_version_rss' ) ) {
	function shopeo_wp_core_remove_wp_version_rss() {
		return '';
	}
}
add_filter( 'the_generator', 'shopeo_wp_core_remove_wp_version_rss' );
