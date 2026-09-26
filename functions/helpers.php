<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function argokov_field( $name, $default = '', $post_id = false ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}

	$value = get_field( $name, $post_id );

	return ( null === $value || false === $value || '' === $value ) ? $default : $value;
}

function argokov_option( $name, $default = '' ) {
	return argokov_field( $name, $default, 'option' );
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


function argokov_asset( $path ) {
	return get_theme_file_uri( ltrim( (string) $path, '/' ) );
}

function argokov_image_url( $image, $fallback = '' ) {
	if ( is_array( $image ) && ! empty( $image['url'] ) ) {
		return $image['url'];
	}

	if ( is_numeric( $image ) ) {
		$url = wp_get_attachment_image_url( (int) $image, 'full' );
		if ( $url ) {
			return $url;
		}
	}

	return $fallback ? argokov_asset( $fallback ) : '';
}

function argokov_image_alt( $image, $fallback = '' ) {
	if ( is_array( $image ) && ! empty( $image['alt'] ) ) {
		return $image['alt'];
	}

	if ( is_numeric( $image ) ) {
		$alt = get_post_meta( (int) $image, '_wp_attachment_image_alt', true );
		if ( $alt ) {
			return $alt;
		}
	}

	return $fallback;
}

function argokov_rows( $name, $fallback = array(), $post_id = false ) {
	$rows = argokov_field( $name, array(), $post_id );
	return is_array( $rows ) && $rows ? $rows : $fallback;
}


function argokov_case_data( $case_id ) {
	$case_id = (int) $case_id;

	if ( ! $case_id || 'case' !== get_post_type( $case_id ) ) {
		return array();
	}

	return array(
		'id'           => $case_id,
		'title'        => get_the_title( $case_id ),
		'type'         => argokov_field( 'case_type', '', $case_id ),
		'lead'         => argokov_field( 'case_lead', get_the_excerpt( $case_id ), $case_id ),
		'work'         => argokov_rows( 'case_work', array(), $case_id ),
		'technologies' => argokov_rows( 'case_technologies', array(), $case_id ),
		'url'          => argokov_field( 'case_website_url', '', $case_id ),
		'permalink'    => get_permalink( $case_id ),
	);
}

function argokov_selected_cases( $field_name, $limit = 3, $post_id = false ) {
	$selected = argokov_field( $field_name, array(), $post_id );
	$items    = array();

	if ( is_array( $selected ) ) {
		foreach ( $selected as $case_id ) {
			$item = argokov_case_data( $case_id );

			if ( $item ) {
				$items[] = $item;
			}

			if ( count( $items ) >= $limit ) {
				break;
			}
		}
	}

	if ( $items ) {
		return $items;
	}

	$posts = get_posts(
		array(
			'post_type'      => 'case',
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
			'no_found_rows'  => true,
		)
	);

	foreach ( $posts as $post ) {
		$item = argokov_case_data( $post->ID );

		if ( $item ) {
			$items[] = $item;
		}
	}

	return $items;
}


function argokov_material_cover_url( $material_id, $size = 'large' ) {
	$material_id = (int) $material_id;
	$thumbnail_id = get_post_thumbnail_id( $material_id );

	if ( $thumbnail_id ) {
		$url = wp_get_attachment_image_url( $thumbnail_id, $size );

		if ( $url ) {
			return $url;
		}
	}

	$slug = get_post_field( 'post_name', $material_id );
	$map  = array(
		'tehnicheskaya-podderzhka-sayta'         => 'assets/images/material-support-cover.webp',
		'razrabotchik-perestal-otvechat'         => 'assets/images/material-developer-silent-cover.png',
		'dorabotka-sayta-ili-novaya-razrabotka' => 'assets/images/material-rebuild-cover.webp',
	);

	return isset( $map[ $slug ] ) ? argokov_asset( $map[ $slug ] ) : '';
}

function argokov_material_cover_alt( $material_id ) {
	$material_id  = (int) $material_id;
	$thumbnail_id = get_post_thumbnail_id( $material_id );

	if ( $thumbnail_id ) {
		$alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

		if ( $alt ) {
			return $alt;
		}
	}

	return get_the_title( $material_id );
}
