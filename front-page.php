<?php
/**
 * Front page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/proof' );
	get_template_part( 'template-parts/home/directions' );
	get_template_part( 'template-parts/home/cases' );
	get_template_part( 'template-parts/home/legacy' );
	get_template_part( 'template-parts/home/process' );
	get_template_part( 'template-parts/home/formats' );
	get_template_part( 'template-parts/home/studio' );
	get_template_part( 'template-parts/home/faq' );
	get_template_part( 'template-parts/home/materials' );
	get_template_part( 'template-parts/home/contact' );

endwhile;

get_footer();
