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
}
add_action( 'init', 'argokov_register_post_types' );


function argokov_flush_rewrite_rules() {
	argokov_register_post_types();
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
}
add_action( 'pre_get_posts', 'argokov_order_content_archives' );
