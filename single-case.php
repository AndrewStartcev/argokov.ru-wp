<?php
/**
 * Single case.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$case = argokov_case_data( get_the_ID() );
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ?: home_url( '/cases/' ) ); ?>">Кейсы</a><span>/</span>
			<span><?php the_title(); ?></span>
		</nav>

		<p class="section-eyebrow"><?php echo esc_html( $case['type'] ?? 'Кейс' ); ?></p>
		<h1><?php the_title(); ?></h1>
		<?php if ( ! empty( $case['lead'] ) ) : ?><p><?php echo esc_html( $case['lead'] ); ?></p><?php endif; ?>
	</section>

	<section class="cases-catalog surface" aria-labelledby="case-work-title">
		<header class="development-heading">
			<div><p class="section-eyebrow">Работа над проектом</p><h2 id="case-work-title">Что сделали</h2></div>
			<p>Показываем техническую часть проекта без выдуманной легенды: задачи, стек и фактическую работу.</p>
		</header>

		<div class="case-card">
			<?php if ( ! empty( $case['work'] ) ) : ?>
				<div class="case-card__work">
					<span>Выполненные задачи</span>
					<ul><?php foreach ( $case['work'] as $item ) : ?><li><?php echo esc_html( $item['text'] ?? '' ); ?></li><?php endforeach; ?></ul>
				</div>
			<?php endif; ?>

			<footer class="case-card__footer">
				<?php if ( ! empty( $case['technologies'] ) ) : ?>
					<div class="tag-list"><?php foreach ( $case['technologies'] as $technology ) : ?><span><?php echo esc_html( $technology['text'] ?? '' ); ?></span><?php endforeach; ?></div>
				<?php endif; ?>

				<?php if ( ! empty( $case['url'] ) ) : ?>
					<a href="<?php echo esc_url( $case['url'] ); ?>" target="_blank" rel="noopener noreferrer">Открыть сайт <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
				<?php endif; ?>
			</footer>
		</div>
	</section>

	<section class="inner-cta surface">
		<div>
			<p class="section-eyebrow"><?php echo esc_html( argokov_option( 'case_cta_eyebrow', 'Похожая задача' ) ); ?></p>
			<h2><?php echo esc_html( argokov_option( 'case_cta_title', 'Обсудим твой проект' ) ); ?></h2>
			<p><?php echo esc_html( argokov_option( 'case_cta_text', 'Пришли ссылку или описание задачи. Посмотрим вводные и предложим понятный следующий шаг.' ) ); ?></p>
		</div>
		<a class="button" href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>"><?php echo esc_html( argokov_option( 'case_cta_button_label', 'Связаться' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</section>
	<?php
endwhile;

get_footer();
