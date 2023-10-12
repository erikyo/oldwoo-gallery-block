<?php
/**
 * Plugin Name: Oldwoo gallery block
 * Plugin URI: https://github.com/erikyo/oldwoo-gallery-block
 * Description: oldwoo-gallery-block
 * Version: 0.0.1
 * Author: codekraft
 * Text Domain: oldwoo-gallery-block
 * Domain Path: /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Defines the path to be used for includes.
define( '___PATH__', plugin_dir_path( __FILE__ ) );
// Defines the URL to the plugin.
define( '___URL__', plugin_dir_url( __FILE__ ) );

/**
 * Generates the gallery markup for the oldwoo_gallery_block.
 *
 * @throws Exception if wc_get_product() fails to retrieve the product.
 * @return string The gallery markup.
 */
function oldwoo_gallery_block_callback() {
	$product = wc_get_product();
	// Get the first image.
	ob_start();
	// get the image template
	include_once ___PATH__ . 'template/product-image.php';
	// return the gallery markup
	return ob_get_clean();
}

/**
 * Register the block
 *
 * @since 2.0.0
 */
add_action(
	'init',
	function () {
		register_block_type(
			___PATH__ . 'block.json',
			array( 'render_callback' => 'oldwoo_gallery_block_callback' )
		);
	}
);

add_action(
	'admin_enqueue_scripts',
	function () {
		$asset = include ___PATH__ . 'build/oldwoo-gallery-block.asset.php';
		wp_enqueue_script( 'oldwoo-gallery-block', ___URL__ . 'build/oldwoo-gallery-block.js', $asset['dependencies'], $asset['version'], true );
	}
);

function enqueue_gallery_scripts() {
	if ( is_product() ) {
		/**
		 * class-wc-frontend-scripts.php 411
		 */
		wp_enqueue_script( 'wc-single-product', null, array( 'jquery' ), false, true );
		wp_enqueue_script( 'flexslider', null, array( 'jquery' ), false, true );
		wp_enqueue_script( 'photoswipe-ui-default', null, array( 'jquery' ), false, true );
		wp_enqueue_script( 'zoom', null, array( 'jquery' ), false, true );
		wp_enqueue_style( 'woocommerce-general' );
		wp_enqueue_style( 'woocommerce-layout' );
		wp_enqueue_style( 'photoswipe-default-skin' );
		add_action( 'wp_footer', 'woocommerce_photoswipe' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_gallery_scripts' );
