<?php
/**
 * Argokov theme bootstrap.
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$argokov_includes = array(
	'/functions/theme-support.php',
	'/functions/assets.php',
	'/functions/acf.php',
	'/functions/post-types.php',
);

foreach ( $argokov_includes as $argokov_file ) {
	require_once get_template_directory() . $argokov_file;
}
