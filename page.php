<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<section class="inner-hero surface">
	<h1><?php the_title(); ?></h1>
</section>
<section class="surface">
	<?php
	while ( have_posts() ) {
		the_post();
		the_content();
	}
	?>
</section>
<?php get_footer(); ?>
