<?php
/**
 * One-time base content seeder.
 *
 * Creates the initial content model from data/base-content.json.
 * Existing non-empty ACF fields, Rank Math fields and page content are preserved.
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

function argokov_base_content_apply_seo( $post_id, $seo ) {
	$post_id = (int) $post_id;

	if ( ! $post_id || ! is_array( $seo ) ) {
		return;
	}

	if ( ! empty( $seo['title'] ) && ! get_post_meta( $post_id, 'rank_math_title', true ) ) {
		update_post_meta( $post_id, 'rank_math_title', sanitize_text_field( $seo['title'] ) );
	}

	if ( ! empty( $seo['description'] ) && ! get_post_meta( $post_id, 'rank_math_description', true ) ) {
		update_post_meta( $post_id, 'rank_math_description', sanitize_textarea_field( $seo['description'] ) );
	}
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

	if ( 'material' === $post_type ) {
		$postarr['comment_status'] = 'open';
	}

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
			argokov_base_content_update_field_if_empty( $field_name, $value, $post_id );
		}
	}

	if ( ! empty( $item['seo'] ) ) {
		argokov_base_content_apply_seo( $post_id, $item['seo'] );
	}

	return $post_id;
}

function argokov_base_content_apply_resolved_fields( $post_id, $fields, $entity_ids ) {
	if ( ! $post_id || ! is_array( $fields ) ) {
		return;
	}

	foreach ( $fields as $field_name => $value ) {
		$value = argokov_base_content_resolve_value( $value, $entity_ids );
		argokov_base_content_update_field_if_empty( $field_name, $value, $post_id );
	}
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

	update_post_meta( $page_id, '_argokov_base_content_key', 'home' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_id );

	return $page_id;
}

function argokov_base_content_upsert_page( $page_data, $entity_ids, $page_ids = array() ) {
	if ( empty( $page_data['key'] ) || empty( $page_data['title'] ) || empty( $page_data['slug'] ) ) {
		return 0;
	}

	$page_id = argokov_base_content_find_item(
		'page',
		(string) $page_data['key'],
		(string) $page_data['slug']
	);

	$parent_id = 0;

	if ( ! empty( $page_data['parent_key'] ) ) {
		$parent_key = sanitize_key( $page_data['parent_key'] );

		if ( ! empty( $page_ids[ $parent_key ] ) ) {
			$parent_id = (int) $page_ids[ $parent_key ];
		}
	}

	if ( ! $page_id ) {
		$result = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_title'   => (string) $page_data['title'],
				'post_name'    => (string) $page_data['slug'],
				'post_content' => isset( $page_data['content'] ) ? (string) $page_data['content'] : '',
				'post_parent'  => $parent_id,
			),
			true
		);

		if ( is_wp_error( $result ) || ! $result ) {
			return 0;
		}

		$page_id = (int) $result;
	} else {
		$page = get_post( $page_id );

		if ( $page && isset( $page_data['content'] ) && '' === trim( (string) $page->post_content ) ) {
			wp_update_post(
				wp_slash(
					array(
						'ID'           => $page_id,
						'post_content' => (string) $page_data['content'],
					)
				)
			);
		}
	}

	if ( $parent_id && (int) wp_get_post_parent_id( $page_id ) !== $parent_id ) {
		wp_update_post(
			array(
				'ID'          => $page_id,
				'post_parent' => $parent_id,
			)
		);
	}

	update_post_meta(
		$page_id,
		'_argokov_base_content_key',
		sanitize_key( $page_data['key'] )
	);

	if ( ! empty( $page_data['template'] ) ) {
		update_post_meta(
			$page_id,
			'_wp_page_template',
			sanitize_file_name( $page_data['template'] )
		);
	}

	if ( ! empty( $page_data['fields'] ) && is_array( $page_data['fields'] ) ) {
		foreach ( $page_data['fields'] as $field_name => $value ) {
			$value = argokov_base_content_resolve_value( $value, $entity_ids );
			argokov_base_content_update_field_if_empty( $field_name, $value, $page_id );
		}
	}

	if ( ! empty( $page_data['seo'] ) ) {
		argokov_base_content_apply_seo( $page_id, $page_data['seo'] );
	}

	return $page_id;
}

function argokov_base_content_create_menu( $name, $location, $items ) {
	$locations = get_theme_mod( 'nav_menu_locations', array() );

	if ( ! empty( $locations[ $location ] ) ) {
		return;
	}

	$menu = wp_get_nav_menu_object( $name );

	if ( $menu ) {
		$menu_id = (int) $menu->term_id;
	} else {
		$menu_id = wp_create_nav_menu( $name );

		if ( is_wp_error( $menu_id ) ) {
			return;
		}
	}

	$existing = wp_get_nav_menu_items( $menu_id );
	$existing = is_array( $existing ) ? $existing : array();

	if ( ! $existing ) {
		foreach ( $items as $item ) {
			if ( empty( $item['label'] ) || empty( $item['path'] ) ) {
				continue;
			}

			$url = 0 === strpos( $item['path'], 'http' )
				? $item['path']
				: home_url( $item['path'] );

			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'  => (string) $item['label'],
					'menu-item-url'    => $url,
					'menu-item-status' => 'publish',
					'menu-item-type'   => 'custom',
				)
			);
		}
	}

	$locations[ $location ] = (int) $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

function argokov_base_content_seed_menus() {
	argokov_base_content_create_menu(
		'Основное меню',
		'primary',
		array(
			array( 'label' => 'Услуги', 'path' => '/services/' ),
			array( 'label' => 'Разработка', 'path' => '/development/' ),
			array( 'label' => 'Поддержка', 'path' => '/support/' ),
			array( 'label' => 'Кейсы', 'path' => '/cases/' ),
			array( 'label' => 'Статьи', 'path' => '/materials/' ),
			array( 'label' => 'Студия', 'path' => '/about/' ),
			array( 'label' => 'Контакты', 'path' => '/contacts/' ),
		)
	);

	argokov_base_content_create_menu(
		'Мобильное меню',
		'mobile',
		array(
			array( 'label' => 'Услуги', 'path' => '/services/' ),
			array( 'label' => 'Разработка', 'path' => '/development/' ),
			array( 'label' => 'Поддержка', 'path' => '/support/' ),
			array( 'label' => 'Статьи', 'path' => '/materials/' ),
			array( 'label' => 'Кейсы', 'path' => '/cases/' ),
			array( 'label' => 'О студии', 'path' => '/about/' ),
			array( 'label' => 'Как работаем', 'path' => '/process/' ),
			array( 'label' => 'Частые вопросы', 'path' => '/faq/' ),
			array( 'label' => 'Контакты', 'path' => '/contacts/' ),
		)
	);

	argokov_base_content_create_menu(
		'Подвал — услуги',
		'footer_services',
		array(
			array( 'label' => 'Все услуги', 'path' => '/services/' ),
			array( 'label' => 'Разработка сайтов', 'path' => '/development/' ),
			array( 'label' => 'Поддержка сайтов', 'path' => '/support/' ),
			array( 'label' => 'Доработка сайтов', 'path' => '/#improvements' ),
			array( 'label' => 'Интернет-магазины', 'path' => '/development/#types' ),
			array( 'label' => 'Интеграции', 'path' => '/development/#included' ),
			array( 'label' => 'Техническое SEO', 'path' => '/development/#seo' ),
			array( 'label' => 'Сложные проекты', 'path' => '/#improvements' ),
		)
	);

	argokov_base_content_create_menu(
		'Подвал — студия',
		'footer_studio',
		array(
			array( 'label' => 'Кейсы', 'path' => '/cases/' ),
			array( 'label' => 'О студии', 'path' => '/about/' ),
			array( 'label' => 'Как работаем', 'path' => '/process/' ),
			array( 'label' => 'Материалы', 'path' => '/materials/' ),
			array( 'label' => 'Частые вопросы', 'path' => '/faq/' ),
			array( 'label' => 'Контакты', 'path' => '/contacts/' ),
		)
	);
}

function argokov_base_content_seed_wp_options( $options ) {
	if ( ! is_array( $options ) ) {
		return;
	}

	$allowed = array( 'blogname', 'blogdescription' );

	foreach ( $allowed as $option_name ) {
		if ( ! array_key_exists( $option_name, $options ) ) {
			continue;
		}

		$current = get_option( $option_name, '' );

		if ( '' === trim( (string) $current ) || ( 'blogname' === $option_name && 'Мой сайт' === $current ) ) {
			update_option( $option_name, sanitize_text_field( $options[ $option_name ] ) );
		}
	}
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

	$version        = isset( $data['version'] ) ? (int) $data['version'] : 1;
	$seeded_version = (int) get_option( 'argokov_base_content_seed_version', 0 );

	if ( $seeded_version >= $version ) {
		return;
	}

	if ( ! empty( $data['wp_options'] ) ) {
		argokov_base_content_seed_wp_options( $data['wp_options'] );
	}

	$entity_ids = array(
		'case'     => array(),
		'material' => array(),
	);

	if ( ! empty( $data['options'] ) && is_array( $data['options'] ) ) {
		foreach ( $data['options'] as $field_name => $value ) {
			argokov_base_content_update_field_if_empty( $field_name, $value, 'option' );
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

	/*
	 * Relationship fields can reference entities that did not exist when the
	 * first pass created the records. Apply fields again after every entity ID
	 * is known; non-empty values remain untouched.
	 */
	if ( ! empty( $data['cases'] ) && is_array( $data['cases'] ) ) {
		foreach ( $data['cases'] as $case ) {
			$key = ! empty( $case['key'] ) ? sanitize_key( $case['key'] ) : '';

			if ( $key && ! empty( $entity_ids['case'][ $key ] ) && ! empty( $case['fields'] ) ) {
				argokov_base_content_apply_resolved_fields(
					$entity_ids['case'][ $key ],
					$case['fields'],
					$entity_ids
				);
			}
		}
	}

	if ( ! empty( $data['materials'] ) && is_array( $data['materials'] ) ) {
		foreach ( $data['materials'] as $material ) {
			$key = ! empty( $material['key'] ) ? sanitize_key( $material['key'] ) : '';

			if ( $key && ! empty( $entity_ids['material'][ $key ] ) && ! empty( $material['fields'] ) ) {
				argokov_base_content_apply_resolved_fields(
					$entity_ids['material'][ $key ],
					$material['fields'],
					$entity_ids
				);
			}
		}
	}

	if ( ! empty( $data['home'] ) && is_array( $data['home'] ) ) {
		$home_id = argokov_base_content_home_page( $data['home'] );

		if ( $home_id ) {
			if ( ! empty( $data['home']['fields'] ) && is_array( $data['home']['fields'] ) ) {
				foreach ( $data['home']['fields'] as $field_name => $value ) {
					$value = argokov_base_content_resolve_value( $value, $entity_ids );
					argokov_base_content_update_field_if_empty( $field_name, $value, $home_id );
				}
			}

			if ( ! empty( $data['home']['seo'] ) ) {
				argokov_base_content_apply_seo( $home_id, $data['home']['seo'] );
			}
		}
	}

	$page_ids = array();

	if ( ! empty( $data['pages'] ) && is_array( $data['pages'] ) ) {
		foreach ( $data['pages'] as $page_data ) {
			$page_id = argokov_base_content_upsert_page( $page_data, $entity_ids, $page_ids );

			if ( $page_id && ! empty( $page_data['key'] ) ) {
				$page_ids[ sanitize_key( $page_data['key'] ) ] = $page_id;
			}
		}
	}

	if ( ! empty( $page_ids['privacy'] ) ) {
		update_option( 'wp_page_for_privacy_policy', (int) $page_ids['privacy'] );
	}

	argokov_base_content_seed_menus();

	update_option( 'argokov_base_content_seed_version', $version );

	flush_rewrite_rules( false );
}
add_action( 'admin_init', 'argokov_seed_base_content', 50 );
