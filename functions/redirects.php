<?php
/**
 * Project redirects.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

function argokov_legacy_service_redirects() {
	if ( is_admin() ) {
		return;
	}

	$path = wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH );
	$path = '/' . trim( (string) $path, '/' ) . '/';

	$redirects = array(
		'/development/' => '/services/development/',
		'/support/'     => '/services/support/',
	);

	if ( isset( $redirects[ $path ] ) ) {
		wp_safe_redirect( home_url( $redirects[ $path ] ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'argokov_legacy_service_redirects', 1 );
