<?php
/**
 * Services assigned to the current direction term.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

$term = get_queried_object();

if ( ! $term instanceof WP_Term || 'service_direction' !== $term->taxonomy ) {
	return;
}

$services = new WP_Query(
	array(
		'post_type'      => 'service',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => 'service_direction',
				'field'    => 'term_id',
				'terms'    => array( $term->term_id ),
			),
		),
	)
);

if ( ! $services->have_posts() ) {
	return;
}
?>
<section class="development-section surface" aria-labelledby="direction-services-title">
	<header class="development-heading">
		<div><p class="section-eyebrow">Услуги направления</p><h2 id="direction-services-title">Конкретные задачи, с которыми можно обратиться</h2></div>
		<p>Каждая услуга имеет отдельную страницу с собственным содержанием, метаданными и внутренними ссылками.</p>
	</header>

	<div class="services-grid">
		<?php while ( $services->have_posts() ) : $services->the_post(); ?>
			<?php
			$service_id = get_the_ID();
			$lead       = argokov_field( 'service_hero_lead', get_the_excerpt( $service_id ), $service_id );
			$scope      = argokov_rows( 'service_scope', array(), $service_id );
			?>
			<article class="service-catalog-card">
				<div class="service-catalog-card__top"><span>Услуга</span><small><?php echo esc_html( $term->name ); ?></small></div>
				<h3><?php the_title(); ?></h3>
				<p><?php echo esc_html( $lead ); ?></p>

				<?php if ( $scope ) : ?>
					<div class="service-catalog-card__tags">
						<?php foreach ( array_slice( $scope, 0, 3 ) as $item ) : ?>
							<?php if ( ! empty( $item['title'] ) ) : ?><span><?php echo esc_html( $item['title'] ); ?></span><?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>">Подробнее <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php
wp_reset_postdata();
