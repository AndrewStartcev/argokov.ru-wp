<?php
/**
 * Theme support.
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function argokov_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary'         => 'Основное меню',
			'mobile'          => 'Мобильное меню',
			'footer_services' => 'Подвал — услуги',
			'footer_studio'   => 'Подвал — студия',
		)
	);
}
add_action( 'after_setup_theme', 'argokov_setup' );


function argokov_admin_footer_text() {
	return sprintf(
		'Разработка сайта <a href="%s" target="_blank" rel="noopener noreferrer">%s</a>',
		esc_url( 'https://starcev.agency/' ),
		esc_html( 'Андрей Старцев' )
	);
}
add_filter( 'admin_footer_text', 'argokov_admin_footer_text' );
