<?php
/**
 * FAQ page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$filters = argokov_rows(
		'faq_page_filters',
		array(
			array( 'key' => 'all', 'label' => 'Все вопросы' ),
			array( 'key' => 'start', 'label' => 'Начало' ),
			array( 'key' => 'development', 'label' => 'Разработка' ),
			array( 'key' => 'support', 'label' => 'Поддержка' ),
			array( 'key' => 'process', 'label' => 'Процесс' ),
			array( 'key' => 'money', 'label' => 'Стоимость' ),
		)
	);

	$items = argokov_rows( 'faq_page_items', array() );
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span></nav>
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'faq_page_hero_eyebrow', 'Частые вопросы' ) ); ?></p>
		<h1><?php echo esc_html( argokov_field( 'faq_page_hero_title', 'Коротко отвечаем' ) ); ?> <span><?php echo esc_html( argokov_field( 'faq_page_hero_title_accent', 'до начала работы' ) ); ?></span></h1>
		<p><?php echo esc_html( argokov_field( 'faq_page_hero_text', 'Выбери тему или посмотри все вопросы. Если ситуация не подходит под готовый ответ, напиши — разберём отдельно.' ) ); ?></p>
	</section>

	<section class="faq-page surface" aria-labelledby="faq-page-title">
		<header class="development-heading"><div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'faq_page_eyebrow', 'Вопросы и ответы' ) ); ?></p><h2 id="faq-page-title"><?php echo esc_html( argokov_field( 'faq_page_title', 'О разработке, поддержке и процессе' ) ); ?></h2></div></header>

		<?php if ( $filters ) : ?>
			<div class="catalog-filter faq-filter" role="group" aria-label="Фильтр вопросов">
				<?php foreach ( $filters as $index => $filter ) : ?>
					<?php
					$key   = $filter['key'] ?? '';
					$count = 'all' === $key ? count( $items ) : count( array_filter( $items, static function ( $item ) use ( $key ) { return isset( $item['category'] ) && $item['category'] === $key; } ) );
					?>
					<button type="button" class="<?php echo 0 === $index ? 'is-active' : ''; ?>" aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>" data-filter="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $filter['label'] ?? '' ); ?><span><?php echo (int) $count; ?></span></button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="faq-page-list" aria-live="polite">
			<?php foreach ( $items as $item ) : ?>
				<details data-category="<?php echo esc_attr( $item['category'] ?? '' ); ?>">
					<summary><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><strong><?php echo esc_html( $item['question'] ?? '' ); ?></strong><i aria-hidden="true">+</i></summary>
					<p><?php echo esc_html( $item['answer'] ?? '' ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</section>
	<?php
endwhile;

get_footer();
