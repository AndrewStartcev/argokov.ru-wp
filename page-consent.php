<?php
/**
 * Legal page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/common/legal-page' );
endwhile;

get_footer();
