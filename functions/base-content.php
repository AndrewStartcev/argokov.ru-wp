<?php
/**
 * One-time base content seeder.
 *
 * Seeds the initial homepage, cases and materials from data/base-content.json.
 * It runs automatically once after the theme code is deployed and ACF Pro is available.
 * Existing non-empty ACF values are preserved.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

function argokov_base_content_data() {
	$file = get_template_directory() . '/data/base-content.json';

	if ( ! is_readable( $file ) ) {
		return array();
	}

	$data = json_decode( file_get_contents( $file ), true );

	return is_array( $data ) ? $data : array();
}

function argokov_base_content_is_empty( $value ) {
	return null === $value || false === $value || '' === $value || array() === $value;
}

function argokov_base_content_update_field_if_empty( $field_name, $value, $post_id = false ) {
	if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
		return;
	}

	$current = get_field( $field_name, $post_id );

	if ( argokov_base_content_is_empty( $current ) ) {
		update_field( $field_name, $value, $post_id );
	}
}

function argokov_base_content_find_item( $post_type, $key, $slug ) {
	$existing = get_posts(
		array(
			'post_type'      => $post_type,
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_argokov_base_content_key',
			'meta_value'     => sanitize_key( $key ),
			'no_found_rows'  => true,
		)
	);

	if ( $existing ) {
		return (int) $existing[0];
	}

	if ( $slug ) {
		$post = get_page_by_path( $slug, OBJECT, $post_type );

		if ( $post ) {
			return (int) $post->ID;
		}
	}

	return 0;
}

function argokov_base_content_upsert_item( $item, $post_type ) {
	if ( empty( $item['key'] ) || empty( $item['title'] ) || empty( $item['slug'] ) ) {
		return 0;
	}

	$post_id = argokov_base_content_find_item(
		$post_type,
		(string) $item['key'],
		(string) $item['slug']
	);

	$postarr = array(
		'post_type'   => $post_type,
		'post_status' => 'publish',
		'post_title'  => (string) $item['title'],
		'post_name'   => (string) $item['slug'],
	);

	if ( isset( $item['excerpt'] ) ) {
		$postarr['post_excerpt'] = (string) $item['excerpt'];
	}

	if ( ! empty( $item['date'] ) ) {
		$postarr['post_date']     = (string) $item['date'];
		$postarr['post_date_gmt'] = get_gmt_from_date( (string) $item['date'] );
	}

	if ( $post_id ) {
		$postarr['ID'] = $post_id;
		$result        = wp_update_post( wp_slash( $postarr ), true );
	} else {
		$result = wp_insert_post( wp_slash( $postarr ), true );
	}

	if ( is_wp_error( $result ) || ! $result ) {
		return 0;
	}

	$post_id = (int) $result;

	update_post_meta(
		$post_id,
		'_argokov_base_content_key',
		sanitize_key( $item['key'] )
	);

	if ( ! empty( $item['fields'] ) && is_array( $item['fields'] ) ) {
		foreach ( $item['fields'] as $field_name => $value ) {
			argokov_base_content_update_field_if_empty(
				$field_name,
				$value,
				$post_id
			);
		}
	}

	return $post_id;
}

function argokov_base_content_resolve_value( $value, $entity_ids ) {
	if ( is_array( $value ) ) {
		$resolved = array();

		foreach ( $value as $key => $item ) {
			$resolved[ $key ] = argokov_base_content_resolve_value( $item, $entity_ids );
		}

		return $resolved;
	}

	if ( ! is_string( $value ) || 0 !== strpos( $value, '@' ) ) {
		return $value;
	}

	if ( preg_match( '/^@(case|material):([a-z0-9_-]+)$/', $value, $matches ) ) {
		$type = $matches[1];
		$key  = $matches[2];

		return isset( $entity_ids[ $type ][ $key ] )
			? (int) $entity_ids[ $type ][ $key ]
			: 0;
	}

	return $value;
}

function argokov_base_content_home_page( $home_data ) {
	$page_id = (int) get_option( 'page_on_front' );

	if ( $page_id && 'page' !== get_post_type( $page_id ) ) {
		$page_id = 0;
	}

	if ( ! $page_id && ! empty( $home_data['slug'] ) ) {
		$page = get_page_by_path( (string) $home_data['slug'] );

		if ( $page ) {
			$page_id = (int) $page->ID;
		}
	}

	if ( ! $page_id ) {
		$page_id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_title'   => ! empty( $home_data['title'] ) ? (string) $home_data['title'] : 'Главная',
				'post_name'    => ! empty( $home_data['slug'] ) ? (string) $home_data['slug'] : 'glavnaya',
				'post_content' => '',
			),
			true
		);

		if ( is_wp_error( $page_id ) ) {
			return 0;
		}
	}

	$page_id = (int) $page_id;

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_id );

	return $page_id;
}

function argokov_seed_base_content() {
	if ( ! is_admin() || wp_doing_ajax() || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( ! function_exists( 'update_field' ) || ! function_exists( 'get_field' ) ) {
		return;
	}

	$data = argokov_base_content_data();

	if ( ! $data ) {
		return;
	}

	$version         = isset( $data['version'] ) ? (int) $data['version'] : 1;
	$seeded_version  = (int) get_option( 'argokov_base_content_seed_version', 0 );

	if ( $seeded_version >= $version ) {
		return;
	}

	$entity_ids = array(
		'case'     => array(),
		'material' => array(),
	);

	if ( ! empty( $data['options'] ) && is_array( $data['options'] ) ) {
		foreach ( $data['options'] as $field_name => $value ) {
			argokov_base_content_update_field_if_empty(
				$field_name,
				$value,
				'option'
			);
		}
	}

	if ( ! empty( $data['cases'] ) && is_array( $data['cases'] ) ) {
		foreach ( $data['cases'] as $case ) {
			$case_id = argokov_base_content_upsert_item( $case, 'case' );

			if ( $case_id && ! empty( $case['key'] ) ) {
				$entity_ids['case'][ sanitize_key( $case['key'] ) ] = $case_id;
			}
		}
	}

	if ( ! empty( $data['materials'] ) && is_array( $data['materials'] ) ) {
		foreach ( $data['materials'] as $material ) {
			$material_id = argokov_base_content_upsert_item( $material, 'material' );

			if ( $material_id && ! empty( $material['key'] ) ) {
				$entity_ids['material'][ sanitize_key( $material['key'] ) ] = $material_id;
			}
		}
	}

	if ( empty( $data['home'] ) || ! is_array( $data['home'] ) ) {
		return;
	}

	$home_id = argokov_base_content_home_page( $data['home'] );

	if ( ! $home_id ) {
		return;
	}

	if ( ! empty( $data['home']['fields'] ) && is_array( $data['home']['fields'] ) ) {
		foreach ( $data['home']['fields'] as $field_name => $value ) {
			$value = argokov_base_content_resolve_value( $value, $entity_ids );

			argokov_base_content_update_field_if_empty(
				$field_name,
				$value,
				$home_id
			);
		}
	}

	if ( ! empty( $data['home']['seo'] ) && is_array( $data['home']['seo'] ) ) {
		if ( ! empty( $data['home']['seo']['title'] ) && ! get_post_meta( $home_id, 'rank_math_title', true ) ) {
			update_post_meta(
				$home_id,
				'rank_math_title',
				sanitize_text_field( $data['home']['seo']['title'] )
			);
		}

		if ( ! empty( $data['home']['seo']['description'] ) && ! get_post_meta( $home_id, 'rank_math_description', true ) ) {
			update_post_meta(
				$home_id,
				'rank_math_description',
				sanitize_textarea_field( $data['home']['seo']['description'] )
			);
		}
	}

	update_option( 'argokov_base_content_seed_version', $version );

	flush_rewrite_rules( false );
}
add_action( 'admin_init', 'argokov_seed_base_content', 50 );
