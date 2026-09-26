<?php
/**
 * Styles and scripts.
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function argokov_enqueue_assets() {
	$theme_dir = get_template_directory();
	$theme_uri = get_template_directory_uri();

	wp_enqueue_style(
		'argokov-main',
		$theme_uri . '/assets/css/style.css',
		array(),
		file_exists( $theme_dir . '/assets/css/style.css' ) ? (string) filemtime( $theme_dir . '/assets/css/style.css' ) : null
	);

	wp_enqueue_style(
		'argokov-theme',
		get_stylesheet_uri(),
		array( 'argokov-main' ),
		(string) wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'argokov-main',
		$theme_uri . '/assets/js/main.js',
		array(),
		file_exists( $theme_dir . '/assets/js/main.js' ) ? (string) filemtime( $theme_dir . '/assets/js/main.js' ) : null,
		true
	);

	wp_script_add_data( 'argokov-main', 'strategy', 'defer' );
}
add_action( 'wp_enqueue_scripts', 'argokov_enqueue_assets' );
