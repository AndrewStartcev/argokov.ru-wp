<?php
defined( 'ABSPATH' ) || exit;

$formats = argokov_rows(
	'home_formats',
	array(
		array(
			'label' => 'Точечно',
			'variant' => 'default',
			'title' => 'Разовая задача',
			'text' => 'Исправление ошибки, новый блок, интеграция, ускорение или техническая SEO-задача.',
			'features' => array(
				array( 'text' => 'Понятный объём' ),
				array( 'text' => 'Согласованная оценка' ),
				array( 'text' => 'Приёмка результата' ),
			),
			'button_label' => 'Обсудить задачу',
		),
		array(
			'label' => 'Комплексно',
			'variant' => 'primary',
			'title' => 'Проект под ключ',
			'text' => 'Берём ответственность за путь от идеи и структуры до разработки, интеграций и запуска.',
			'features' => array(
				array( 'text' => 'Единая команда' ),
				array( 'text' => 'Поэтапная работа' ),
				array( 'text' => 'Поддержка после запуска' ),
			),
			'button_label' => 'Обсудить проект',
		),
		array(
			'label' => 'Регулярно',
			'variant' => 'default',
			'title' => 'Постоянная поддержка',
			'text' => 'Ведём очередь задач, следим за техническим состоянием и развиваем сайт вместе с бизнесом.',
			'features' => array(
				array( 'text' => 'Знаем проект целиком' ),
				array( 'text' => 'Планируем задачи' ),
				array( 'text' => 'Всегда есть ответственный' ),
			),
			'button_label' => 'Передать сайт',
		),
	)
);
?>
<section class="home-section formats surface" aria-labelledby="formats-title">
	<header class="section-heading">
		<div class="section-heading__main">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_formats_eyebrow', 'Форматы сотрудничества' ) ); ?></p>
			<h2 id="formats-title"><?php echo esc_html( argokov_field( 'home_formats_title', 'Подключаемся так, как удобно проекту' ) ); ?></h2>
		</div>
		<p class="section-heading__copy"><?php echo esc_html( argokov_field( 'home_formats_copy', 'Можно начать с одной задачи, заказать проект целиком или передать сайт на постоянное развитие.' ) ); ?></p>
		<span class="section-heading__index"><?php echo esc_html( argokov_field( 'home_formats_index', '05' ) ); ?></span>
	</header>

	<div class="formats__list">
		<?php foreach ( $formats as $format ) : ?>
			<?php $primary = ( $format['variant'] ?? 'default' ) === 'primary' ? ' format-card--primary' : ''; ?>
			<article class="format-card<?php echo esc_attr( $primary ); ?>">
				<span class="format-card__label"><?php echo esc_html( $format['label'] ?? '' ); ?></span>
				<h3><?php echo esc_html( $format['title'] ?? '' ); ?></h3>
				<p><?php echo esc_html( $format['text'] ?? '' ); ?></p>

				<?php if ( ! empty( $format['features'] ) && is_array( $format['features'] ) ) : ?>
					<ul>
						<?php foreach ( $format['features'] as $feature ) : ?>
							<li><?php echo esc_html( $feature['text'] ?? '' ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<a href="#contact" data-contact-modal="true"><?php echo esc_html( $format['button_label'] ?? 'Обсудить задачу' ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			</article>
		<?php endforeach; ?>
	</div>
</section>
