<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function argokov_field( $name, $default = '', $post_id = false ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}

	if ( false === $post_id && is_tax( 'service_direction' ) ) {
		$term = get_queried_object();

		if ( $term instanceof WP_Term ) {
			$post_id = 'service_direction_' . $term->term_id;
		}
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


class Argokov_Nested_Menu_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$variant = ! empty( $args->argokov_variant ) ? $args->argokov_variant : 'desktop';
		$class   = 'mobile' === $variant ? 'mobile-nav__submenu' : 'site-nav__submenu';
		$output .= '<div class="' . esc_attr( $class ) . '">';
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</div>';
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$variant      = ! empty( $args->argokov_variant ) ? $args->argokov_variant : 'desktop';
		$has_children = ! empty( $args->has_children );
		$current      = ! empty( $item->current ) || ! empty( $item->current_item_ancestor );
		$attributes   = ' href="' . esc_url( $item->url ) . '"';

		if ( $current ) {
			$attributes .= ' aria-current="page"';
		}

		if ( 0 === $depth && $has_children ) {
			$class = 'mobile' === $variant ? 'mobile-nav__item mobile-nav__item--parent' : 'site-nav__item site-nav__item--parent';
			$output .= '<div class="' . esc_attr( $class ) . '">';
		}

		$output .= '<a' . $attributes . '>' . esc_html( $item->title );

		if ( 0 === $depth && $has_children && 'desktop' === $variant ) {
			$output .= '<svg class="site-nav__chevron" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4"></path></svg>';
		}

		$output .= '</a>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( 0 === $depth && ! empty( $args->has_children ) ) {
			$output .= '</div>';
		}
	}
}

function argokov_render_nested_menu_fallback( $items, $variant = 'desktop' ) {
	foreach ( $items as $item ) {
		$url      = isset( $item['url'] ) ? $item['url'] : '/';
		$label    = isset( $item['label'] ) ? $item['label'] : '';
		$children = ! empty( $item['children'] ) && is_array( $item['children'] ) ? $item['children'] : array();

		if ( $children ) {
			$item_class = 'mobile' === $variant ? 'mobile-nav__item mobile-nav__item--parent' : 'site-nav__item site-nav__item--parent';
			$sub_class  = 'mobile' === $variant ? 'mobile-nav__submenu' : 'site-nav__submenu';

			echo '<div class="' . esc_attr( $item_class ) . '">';
		}

		echo '<a href="' . esc_url( home_url( $url ) ) . '">' . esc_html( $label );

		if ( $children && 'desktop' === $variant ) {
			echo '<svg class="site-nav__chevron" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4"></path></svg>';
		}

		echo '</a>';

		if ( $children ) {
			echo '<div class="' . esc_attr( $sub_class ) . '">';

			foreach ( $children as $child ) {
				echo '<a href="' . esc_url( home_url( $child['url'] ?? '/' ) ) . '">' . esc_html( $child['label'] ?? '' ) . '</a>';
			}

			echo '</div></div>';
		}
	}
}

function argokov_render_nested_menu( $location, $fallback_items, $variant = 'desktop' ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location'  => $location,
				'container'       => false,
				'items_wrap'      => '%3$s',
				'depth'           => 2,
				'fallback_cb'     => false,
				'walker'          => new Argokov_Nested_Menu_Walker(),
				'argokov_variant' => $variant,
			)
		);
		return;
	}

	argokov_render_nested_menu_fallback( $fallback_items, $variant );
}


/**
 * Build desktop mega-menu data from Service CPT and service directions.
 *
 * @param int $services_per_direction Maximum visible services per direction.
 * @return array<int,array<string,mixed>>
 */
function argokov_service_mega_menu_data( $services_per_direction = 6 ) {
	$directions = get_terms(
		array(
			'taxonomy'   => 'service_direction',
			'hide_empty' => false,
			'orderby'    => 'term_id',
			'order'      => 'ASC',
		)
	);

	if ( is_wp_error( $directions ) || ! $directions ) {
		return array();
	}

	$result = array();

	foreach ( $directions as $direction ) {
		$service_posts = get_posts(
			array(
				'post_type'      => 'service',
				'post_status'    => 'publish',
				'posts_per_page' => max( 1, (int) $services_per_direction ),
				'orderby'        => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'order'          => 'ASC',
				'no_found_rows'  => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'service_direction',
						'field'    => 'term_id',
						'terms'    => array( $direction->term_id ),
					),
				),
			)
		);

		$services = array();

		foreach ( $service_posts as $service_post ) {
			$services[] = array(
				'id'    => (int) $service_post->ID,
				'title' => get_the_title( $service_post ),
				'url'   => get_permalink( $service_post ),
			);
		}

		$result[] = array(
			'term'     => $direction,
			'title'    => $direction->name,
			'url'      => get_term_link( $direction ),
			'services' => $services,
			'total'    => (int) $direction->count,
		);
	}

	return $result;
}


function argokov_menu_top_level_links( $location, $fallback_items = array() ) {
	$locations = get_nav_menu_locations();

	if ( ! empty( $locations[ $location ] ) ) {
		$items = wp_get_nav_menu_items( (int) $locations[ $location ] );

		if ( is_array( $items ) ) {
			$result = array();

			foreach ( $items as $item ) {
				if ( (int) $item->menu_item_parent !== 0 ) {
					continue;
				}

				$result[] = array(
					'label' => $item->title,
					'url'   => $item->url,
				);
			}

			if ( $result ) {
				return $result;
			}
		}
	}

	$result = array();

	foreach ( $fallback_items as $item ) {
		$result[] = array(
			'label' => $item['label'] ?? '',
			'url'   => home_url( $item['url'] ?? '/' ),
		);
	}

	return $result;
}

function argokov_is_services_menu_url( $url ) {
	$path = wp_parse_url( (string) $url, PHP_URL_PATH );
	$path = '/' . trim( (string) $path, '/' ) . '/';

	return '/services/' === $path;
}


function argokov_menu_url_is_current( $url ) {
	$target_path  = wp_parse_url( (string) $url, PHP_URL_PATH );
	$current_path = wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH );

	$target_path  = '/' . trim( (string) $target_path, '/' ) . '/';
	$current_path = '/' . trim( (string) $current_path, '/' ) . '/';

	return $target_path === $current_path;
}
