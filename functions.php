<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

foreach ( array(
	'/functions/theme-support.php',
	'/functions/assets.php',
	'/functions/acf.php',
	'/functions/base-content.php',
	'/functions/comments.php',
	'/functions/helpers.php',
	'/functions/contact-form.php',
	'/functions/remove-functions.php',
	'/functions/post-types.php',
	'/functions/redirects.php',
) as $argokov_file ) {
	require_once get_template_directory() . $argokov_file;
}
