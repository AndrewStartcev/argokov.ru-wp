<?php
/**
 * Services archive.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

$directions = get_terms(
	array(
		'taxonomy'   => 'service_direction',
		'hide_empty' => false,
		'orderby'    => 'term_id',
	)
);

if ( is_wp_error( $directions ) ) {
	$directions = array();
}
?>
<section class="inner-hero surface">
	<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span>Услуги</span></nav>
	<p class="section-eyebrow"><?php echo esc_html( argokov_option( 'services_hero_eyebrow', 'Все направления' ) ); ?></p>
	<h1><?php echo esc_html( argokov_option( 'services_hero_title', 'Услуги для сайта' ) ); ?> <span><?php echo esc_html( argokov_option( 'services_hero_title_accent', 'на любом этапе' ) ); ?></span></h1>
	<p><?php echo esc_html( argokov_option( 'services_hero_text', 'Разрабатываем новые сайты, принимаем готовые проекты на поддержку и решаем отдельные технические задачи.' ) ); ?></p>
</section>

<?php if ( $directions ) : ?>
	<section class="catalog-section surface" aria-labelledby="service-directions-title">
		<header class="development-heading">
			<div><p class="section-eyebrow">Направления</p><h2 id="service-directions-title">Сначала выбери направление задачи</h2></div>
			<p>Разработка и поддержка — верхний уровень каталога. Внутри каждого направления находятся отдельные услуги под конкретные задачи.</p>
		</header>

		<div class="services-grid">
			<?php foreach ( $directions as $index => $direction ) : ?>
				<?php
				$context = 'service_direction_' . $direction->term_id;
				$lead    = '';

				if ( 'development' === $direction->slug ) {
					$lead = argokov_field( 'dev_hero_lead', '', $context );
				} elseif ( 'support' === $direction->slug ) {
					$lead = argokov_field( 'support_hero_lead', '', $context );
				}

				if ( ! $lead ) {
					$lead = $direction->description;
				}
				?>
				<article class="service-catalog-card service-catalog-card--direction" data-category="<?php echo esc_attr( $direction->slug ); ?>">
					<div class="service-catalog-card__top"><span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><small>Направление</small></div>
					<h3><?php echo esc_html( $direction->name ); ?></h3>
					<p><?php echo esc_html( $lead ); ?></p>
					<a href="<?php echo esc_url( get_term_link( $direction ) ); ?>">Все услуги направления <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>

<section class="catalog-section surface" aria-labelledby="services-title">
	<header class="development-heading">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_option( 'services_catalog_eyebrow', 'Каталог услуг' ) ); ?></p><h2 id="services-title"><?php echo esc_html( argokov_option( 'services_catalog_title', 'От первого запуска до постоянного развития' ) ); ?></h2></div>
		<p><?php echo esc_html( argokov_option( 'services_catalog_copy', 'Каждая услуга — отдельная SEO-страница с собственным содержанием, метаданными и связями с направлением.' ) ); ?></p>
	</header>

	<?php if ( $directions ) : ?>
		<div class="catalog-filter" role="group" aria-label="Фильтр услуг">
			<button type="button" class="is-active" aria-pressed="true" data-filter="all">Все услуги<span><?php echo (int) wp_count_posts( 'service' )->publish; ?></span></button>
			<?php foreach ( $directions as $direction ) : ?>
				<button type="button" aria-pressed="false" data-filter="<?php echo esc_attr( $direction->slug ); ?>"><?php echo esc_html( $direction->name ); ?><span><?php echo (int) $direction->count; ?></span></button>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<div class="services-grid" aria-live="polite">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				$terms          = wp_get_post_terms( get_the_ID(), 'service_direction' );
				$direction      = ! is_wp_error( $terms ) && $terms ? reset( $terms ) : null;
				$direction_slug = $direction ? $direction->slug : '';
				$direction_name = $direction ? $direction->name : 'Услуга';
				$lead           = argokov_field( 'service_hero_lead', get_the_excerpt() );
				$scope          = argokov_rows( 'service_scope', array() );
				?>
				<article class="service-catalog-card" data-category="<?php echo esc_attr( $direction_slug ); ?>">
					<div class="service-catalog-card__top"><span><?php echo esc_html( sprintf( '%02d', (int) $wp_query->current_post + 1 ) ); ?></span><small><?php echo esc_html( $direction_name ); ?></small></div>
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html( $lead ); ?></p>

					<?php if ( $scope ) : ?>
						<div class="service-catalog-card__tags">
							<?php foreach ( array_slice( $scope, 0, 3 ) as $scope_item ) : ?>
								<?php if ( ! empty( $scope_item['title'] ) ) : ?><span><?php echo esc_html( $scope_item['title'] ); ?></span><?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<a href="<?php the_permalink(); ?>">Подробнее <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<p>Услуги добавляются в отдельном разделе «Услуги» в админке.</p>
		<?php endif; ?>
	</div>
</section>

<section class="inner-cta surface">
	<div><p class="section-eyebrow"><?php echo esc_html( argokov_option( 'services_cta_eyebrow', 'Не нашли задачу' ) ); ?></p><h2><?php echo esc_html( argokov_option( 'services_cta_title', 'Пришли ссылку на сайт — разберёмся' ) ); ?></h2><p><?php echo esc_html( argokov_option( 'services_cta_text', 'Не обязательно подбирать правильное название услуги. Сначала поймём задачу и предложим подходящий формат.' ) ); ?></p></div>
	<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_option( 'services_cta_button_label', 'Обсудить задачу' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
</section>
<?php
get_footer();
