<?php
defined( 'ABSPATH' ) || exit;

$items = argokov_rows(
	'home_proof_items',
	array(
		array( 'number' => '01', 'title' => '10 лет в веб-разработке', 'text' => 'Запускаем с нуля и подключаемся к готовому проекту' ),
		array( 'number' => '02', 'title' => 'Любые CMS и самописные сайты', 'text' => 'WordPress — основной стек, но не ограничение' ),
		array( 'number' => '03', 'title' => 'Прямой контакт с разработкой', 'text' => 'Без потери деталей между менеджерами' ),
	)
);
?>
<?php if ( $items ) : ?>
	<section class="proof" aria-label="Ключевые преимущества">
		<?php foreach ( $items as $item ) : ?>
			<article class="proof__item surface">
				<span class="proof__number"><?php echo esc_html( $item['number'] ?? '' ); ?></span>
				<div>
					<strong><?php echo esc_html( $item['title'] ?? '' ); ?></strong>
					<p><?php echo esc_html( $item['text'] ?? '' ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</section>
<?php endif; ?>
