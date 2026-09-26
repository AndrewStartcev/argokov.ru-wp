<?php
/**
 * ACF Local JSON.
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function argokov_acf_json_save_point( $path ) {
	return get_template_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'argokov_acf_json_save_point' );

function argokov_acf_json_load_point( $paths ) {
	$paths[] = get_template_directory() . '/acf-json';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'argokov_acf_json_load_point' );
