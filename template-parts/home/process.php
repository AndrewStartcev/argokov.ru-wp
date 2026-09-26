<?php
defined( 'ABSPATH' ) || exit;

$steps = argokov_rows(
	'home_process_steps',
	array(
		array( 'number' => '01', 'title' => 'Слушаем задачу', 'text' => 'Уточняем цель, ограничения и что для бизнеса будет считаться результатом.' ),
		array( 'number' => '02', 'title' => 'Изучаем проект', 'text' => 'Проверяем код, CMS, интеграции и риски. Не оцениваем вслепую.' ),
		array( 'number' => '03', 'title' => 'Согласовываем решение', 'text' => 'Фиксируем объём, порядок работ, сроки и понятную оценку.' ),
		array( 'number' => '04', 'title' => 'Работаем на копии', 'text' => 'Делаем резервную копию, используем контроль версий и не рискуем рабочим сайтом.' ),
		array( 'number' => '05', 'title' => 'Проверяем и запускаем', 'text' => 'Тестируем результат, переносим изменения и остаёмся на связи после запуска.' ),
	)
);

$notes = argokov_rows(
	'home_process_notes',
	array(
		array( 'text' => 'Резервные копии' ),
		array( 'text' => 'Контроль версий' ),
		array( 'text' => 'Тестирование' ),
		array( 'text' => 'Фиксация договорённостей' ),
	)
);
?>
<section class="home-section process surface" id="process" aria-labelledby="process-title">
	<header class="section-heading">
		<div class="section-heading__main">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_process_eyebrow', 'Как устроена работа' ) ); ?></p>
			<h2 id="process-title"><?php echo esc_html( argokov_field( 'home_process_title', 'Понятный процесс без сюрпризов' ) ); ?></h2>
		</div>
		<p class="section-heading__copy"><?php echo esc_html( argokov_field( 'home_process_copy', 'На каждом этапе видно, что происходит с проектом, зачем это делается и что будет дальше.' ) ); ?></p>
		<span class="section-heading__index"><?php echo esc_html( argokov_field( 'home_process_index', '04' ) ); ?></span>
	</header>

	<div class="process__list">
		<?php foreach ( $steps as $step ) : ?>
			<article class="process-card">
				<span class="process-card__number"><?php echo esc_html( $step['number'] ?? '' ); ?></span>
				<h3><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
				<p><?php echo esc_html( $step['text'] ?? '' ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>

	<?php if ( $notes ) : ?>
		<div class="process__note">
			<?php foreach ( $notes as $note ) : ?><span><?php echo esc_html( $note['text'] ?? '' ); ?></span><?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>
