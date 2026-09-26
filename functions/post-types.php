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
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-media-document',
			'has_archive'  => 'materials',
			'rewrite'      => array(
				'slug'       => 'materials',
				'with_front' => false,
			),
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments' ),
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
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);
}
add_action( 'init', 'argokov_register_post_types' );
