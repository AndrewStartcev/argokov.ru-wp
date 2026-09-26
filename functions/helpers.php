<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function argokov_option( $name, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $name, 'option' );
		if ( null !== $value && '' !== $value && false !== $value ) {
			return $value;
		}
	}
	return $default;
}

function argokov_phone_href( $phone ) {
	return preg_replace( '/[^0-9+]/', '', (string) $phone );
}

class Argokov_Flat_Menu_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		if ( $depth > 0 ) {
			return;
		}

		$attributes = ' href="' . esc_url( $item->url ) . '"';

		if ( ! empty( $item->current ) || ! empty( $item->current_item_ancestor ) ) {
			$attributes .= ' aria-current="page"';
		}

		$output .= '<a' . $attributes . '>' . esc_html( $item->title ) . '</a>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

function argokov_render_flat_menu( $location, $fallback_items ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location' => $location,
				'container'      => false,
				'items_wrap'     => '%3$s',
				'depth'          => 1,
				'fallback_cb'    => false,
				'walker'         => new Argokov_Flat_Menu_Walker(),
			)
		);
		return;
	}

	foreach ( $fallback_items as $item ) {
		$url   = isset( $item[0] ) ? $item[0] : '/';
		$label = isset( $item[1] ) ? $item[1] : '';

		printf(
			'<a href="%1$s">%2$s</a>',
			esc_url( home_url( $url ) ),
			esc_html( $label )
		);
	}
}
