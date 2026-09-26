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


/**
 * Custom ACF location rule for a specific Service Direction term.
 */
function argokov_acf_location_rule_types( $choices ) {
	$choices['Argokov']['service_direction_slug'] = 'Направление услуг';
	return $choices;
}
add_filter( 'acf/location/rule_types', 'argokov_acf_location_rule_types' );

function argokov_acf_location_rule_values_service_direction( $choices ) {
	$terms = get_terms(
		array(
			'taxonomy'   => 'service_direction',
			'hide_empty' => false,
		)
	);

	if ( is_wp_error( $terms ) ) {
		return $choices;
	}

	foreach ( $terms as $term ) {
		$choices[ $term->slug ] = $term->name;
	}

	return $choices;
}
add_filter( 'acf/location/rule_values/service_direction_slug', 'argokov_acf_location_rule_values_service_direction' );

function argokov_acf_location_rule_match_service_direction( $match, $rule, $options ) {
	$term_id = 0;

	if ( ! empty( $options['term_id'] ) ) {
		$term_id = (int) $options['term_id'];
	} elseif ( ! empty( $_GET['tag_ID'] ) ) {
		$term_id = (int) $_GET['tag_ID'];
	} elseif ( ! empty( $_POST['tag_ID'] ) ) {
		$term_id = (int) $_POST['tag_ID'];
	}

	if ( ! $term_id ) {
		return false;
	}

	$term = get_term( $term_id, 'service_direction' );

	if ( ! $term || is_wp_error( $term ) ) {
		return false;
	}

	$is_match = $term->slug === $rule['value'];

	return '!=' === $rule['operator'] ? ! $is_match : $is_match;
}
add_filter( 'acf/location/rule_match/service_direction_slug', 'argokov_acf_location_rule_match_service_direction', 10, 3 );
