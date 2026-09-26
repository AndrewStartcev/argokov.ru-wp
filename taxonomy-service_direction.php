<?php
/**
 * Service direction archive.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

$term = get_queried_object();

if ( $term instanceof WP_Term && 'development' === $term->slug ) {
	get_template_part( 'template-parts/service/direction-development' );
} elseif ( $term instanceof WP_Term && 'support' === $term->slug ) {
	get_template_part( 'template-parts/service/direction-support' );
} else {
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>">Услуги</a><span>/</span><span><?php single_term_title(); ?></span></nav>
		<p class="section-eyebrow">Направление услуг</p>
		<h1><?php single_term_title(); ?></h1>
		<?php if ( term_description() ) : ?><div class="inner-hero__description"><?php echo wp_kses_post( term_description() ); ?></div><?php endif; ?>
	</section>

	<section class="catalog-section surface" aria-labelledby="direction-services-title">
		<header class="development-heading"><div><p class="section-eyebrow">Услуги направления</p><h2 id="direction-services-title">Что можем сделать</h2></div></header>
		<div class="services-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="service-catalog-card">
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html( argokov_field( 'service_hero_lead', get_the_excerpt() ) ); ?></p>
					<a href="<?php the_permalink(); ?>">Подробнее <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
				</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php
}

get_footer();
