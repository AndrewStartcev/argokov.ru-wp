<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function argokov_acf_json_save_point( $path ) {
	return get_template_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'argokov_acf_json_save_point' );

function argokov_acf_json_load_point( $paths ) {
	$path = get_template_directory() . '/acf-json';

	if ( ! in_array( $path, $paths, true ) ) {
		$paths[] = $path;
	}

	return $paths;
}
add_filter( 'acf/settings/load_json', 'argokov_acf_json_load_point' );

function argokov_register_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		array(
			'page_title' => 'Настройки Аргоков',
			'menu_title' => 'Аргоков',
			'menu_slug'  => 'argokov-settings',
			'capability' => 'manage_options',
			'redirect'   => false,
			'position'   => 3,
			'icon_url'   => 'dashicons-admin-site-alt3',
		)
	);
}
add_action( 'acf/init', 'argokov_register_options_page' );
