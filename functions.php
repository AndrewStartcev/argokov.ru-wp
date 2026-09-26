<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

foreach ( array(
	'/functions/theme-support.php',
	'/functions/assets.php',
	'/functions/acf.php',
	'/functions/helpers.php',
	'/functions/remove-functions.php',
	'/functions/post-types.php',
) as $argokov_file ) {
	require_once get_template_directory() . $argokov_file;
}
