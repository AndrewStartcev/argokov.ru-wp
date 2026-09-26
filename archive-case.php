<?php
/**
 * Cases archive.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="inner-hero surface">
	<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span>Кейсы</span></nav>
	<p class="section-eyebrow">Выполненная работа</p>
	<h1>Кейсы <span>без красивых легенд</span></h1>
	<p>Показываем задачу, техническую работу и то, как проект развивается после запуска. Часть проектов не публикуем из-за NDA.</p>
</section>

<section class="cases-catalog surface" aria-labelledby="cases-page-title">
	<header class="development-heading">
		<div><p class="section-eyebrow">Выбранные проекты</p><h2 id="cases-page-title">Сайты, за которые продолжаем отвечать</h2></div>
		<p>Кейс для нас — не только макет. Важны архитектура, интеграции, управляемость и возможность развивать проект дальше.</p>
	</header>

	<div class="cases-page-grid">
		<?php
		$index = 0;

		while ( have_posts() ) :
			the_post();
			$index++;
			$case = argokov_case_data( get_the_ID() );
			?>
			<article>
				<div class="cases-page-card__number"><?php echo esc_html( sprintf( '%02d', $index ) ); ?></div>
				<div class="cases-page-card__content">
					<span><?php echo esc_html( $case['type'] ?? '' ); ?></span>
					<h2><?php the_title(); ?></h2>
					<p><?php echo esc_html( $case['lead'] ?? '' ); ?></p>

					<?php if ( ! empty( $case['work'] ) ) : ?>
						<h3>Что сделали</h3>
						<ul><?php foreach ( $case['work'] as $item ) : ?><li><?php echo esc_html( $item['text'] ?? '' ); ?></li><?php endforeach; ?></ul>
					<?php endif; ?>

					<?php if ( ! empty( $case['technologies'] ) ) : ?>
						<div><?php foreach ( $case['technologies'] as $technology ) : ?><span><?php echo esc_html( $technology['text'] ?? '' ); ?></span><?php endforeach; ?></div>
					<?php endif; ?>

					<?php if ( ! empty( $case['url'] ) ) : ?>
						<a href="<?php echo esc_url( $case['url'] ); ?>" target="_blank" rel="noopener noreferrer">Открыть сайт <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>

	<aside class="nda-note">
		<strong>Не все проекты можно показать публично</strong>
		<p>Работаем по NDA и соблюдаем договорённости. По запросу можем подобрать похожий опыт без раскрытия закрытых данных.</p>
		<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>">Запросить похожий кейс <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</aside>
</section>
<?php
get_footer();
