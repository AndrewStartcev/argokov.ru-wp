<?php
/**
 * Process page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$steps = argokov_rows( 'process_steps', array() );
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span></nav>
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'process_hero_eyebrow', 'Как работаем' ) ); ?></p>
		<h1><?php echo esc_html( argokov_field( 'process_hero_title', 'Понятный процесс' ) ); ?> <span><?php echo esc_html( argokov_field( 'process_hero_title_accent', 'без прыжка сразу в код' ) ); ?></span></h1>
		<p><?php echo esc_html( argokov_field( 'process_hero_text', 'Этапы зависят от масштаба задачи, но принцип один: сначала разобраться и зафиксировать результат, затем безопасно реализовать и проверить.' ) ); ?></p>
	</section>

	<section class="process-page surface" aria-labelledby="process-page-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'process_steps_eyebrow', 'Восемь шагов' ) ); ?></p><h2 id="process-page-title"><?php echo esc_html( argokov_field( 'process_steps_title', 'От первого обращения до развития сайта' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'process_steps_copy', 'Для небольшой доработки некоторые этапы занимают один разговор. Для нового сайта превращаются в отдельные части проекта.' ) ); ?></p>
		</header>

		<ol class="process-page-list">
			<?php foreach ( $steps as $step ) : ?>
				<li>
					<span><?php echo esc_html( $step['number'] ?? '' ); ?></span>
					<div>
						<h2><?php echo esc_html( $step['title'] ?? '' ); ?></h2>
						<p><?php echo esc_html( $step['text'] ?? '' ); ?></p>
						<?php if ( ! empty( $step['result'] ) ) : ?><strong><?php echo esc_html( $step['result'] ); ?></strong><?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</section>

	<section class="inner-cta surface">
		<div>
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'process_cta_eyebrow', 'Начать работу' ) ); ?></p>
			<h2><?php echo esc_html( argokov_field( 'process_cta_title', 'Достаточно ссылки и краткого описания' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'process_cta_text', 'Не нужно заранее готовить идеальное ТЗ. Сначала зададим вопросы и определим следующий шаг.' ) ); ?></p>
		</div>
		<a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>" class="button"><?php echo esc_html( argokov_field( 'process_cta_button_label', 'Связаться' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</section>
	<?php
endwhile;

get_footer();
