<?php
/**
 * Project content types.
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function argokov_register_post_types() {
	register_post_type(
		'material',
		array(
			'labels' => array(
				'name'          => 'Материалы',
				'singular_name' => 'Материал',
				'add_new_item'  => 'Добавить материал',
				'edit_item'     => 'Редактировать материал',
			),
			'public'       => true,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-media-document',
			'has_archive'  => 'materials',
			'rewrite'      => array(
				'slug'       => 'materials',
				'with_front' => false,
			),
			'supports'     => array( 'title', 'excerpt', 'thumbnail', 'comments' ),
		)
	);

	register_post_type(
		'case',
		array(
			'labels' => array(
				'name'          => 'Кейсы',
				'singular_name' => 'Кейс',
				'add_new_item'  => 'Добавить кейс',
				'edit_item'     => 'Редактировать кейс',
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'has_archive'  => 'cases',
			'rewrite'      => array(
				'slug'       => 'cases',
				'with_front' => false,
			),
			'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'service_direction',
		array( 'service' ),
		array(
			'labels' => array(
				'name'          => 'Направления услуг',
				'singular_name' => 'Направление',
				'add_new_item'  => 'Добавить направление',
				'edit_item'     => 'Редактировать направление',
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'         => 'services',
				'with_front'   => false,
				'hierarchical' => true,
			),
		)
	);

	register_post_type(
		'service',
		array(
			'labels' => array(
				'name'               => 'Услуги',
				'singular_name'      => 'Услуга',
				'add_new'            => 'Добавить услугу',
				'add_new_item'       => 'Добавить услугу',
				'edit_item'          => 'Редактировать услугу',
				'new_item'           => 'Новая услуга',
				'view_item'          => 'Открыть услугу',
				'search_items'       => 'Найти услугу',
				'not_found'          => 'Услуги не найдены',
				'not_found_in_trash' => 'В корзине услуг нет',
				'all_items'          => 'Все услуги',
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-hammer',
			'has_archive'  => 'services',
			'rewrite'      => false,
			'supports'     => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
			'taxonomies'   => array( 'service_direction' ),
		)
	);
}
add_action( 'init', 'argokov_register_post_types' );

/**
 * Service URLs:
 * /services/{direction}/{service}/
 */
function argokov_service_permalink( $permalink, $post ) {
	if ( 'service' !== $post->post_type ) {
		return $permalink;
	}

	$terms = wp_get_post_terms(
		$post->ID,
		'service_direction',
		array(
			'orderby' => 'term_id',
			'order'   => 'ASC',
		)
	);

	if ( is_wp_error( $terms ) || ! $terms ) {
		return home_url( '/services/' . $post->post_name . '/' );
	}

	$term = reset( $terms );

	return home_url(
		user_trailingslashit(
			'services/' . $term->slug . '/' . $post->post_name
		)
	);
}
add_filter( 'post_type_link', 'argokov_service_permalink', 10, 2 );

function argokov_service_rewrite_rules() {
	add_rewrite_rule(
		'^services/([^/]+)/([^/]+)/?$',
		'index.php?service=$matches[2]&service_direction=$matches[1]',
		'top'
	);
}
add_action( 'init', 'argokov_service_rewrite_rules', 20 );

function argokov_flush_rewrite_rules() {
	argokov_register_post_types();
	argokov_service_rewrite_rules();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'argokov_flush_rewrite_rules' );

function argokov_order_content_archives( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( 'material' ) ) {
		$query->set( 'posts_per_page', 12 );
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
	}

	if ( $query->is_post_type_archive( 'case' ) ) {
		$query->set( 'posts_per_page', 12 );
		$query->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'DESC' ) );
	}

	if ( $query->is_post_type_archive( 'service' ) || $query->is_tax( 'service_direction' ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', array( 'menu_order' => 'ASC', 'title' => 'ASC' ) );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'argokov_order_content_archives' );


function argokov_service_admin_direction_filter( $post_type ) {
	if ( 'service' !== $post_type ) {
		return;
	}

	$selected = isset( $_GET['service_direction'] ) ? sanitize_text_field( wp_unslash( $_GET['service_direction'] ) ) : '';

	wp_dropdown_categories(
		array(
			'show_option_all' => 'Все направления',
			'taxonomy'        => 'service_direction',
			'name'            => 'service_direction',
			'orderby'         => 'name',
			'selected'        => $selected,
			'hierarchical'    => true,
			'hide_empty'      => false,
			'value_field'     => 'slug',
		)
	);
}
add_action( 'restrict_manage_posts', 'argokov_service_admin_direction_filter' );
