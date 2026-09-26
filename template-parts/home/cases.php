<?php
defined( 'ABSPATH' ) || exit;

$selected = argokov_field( 'home_cases_selected', array() );
$cases    = array();

if ( is_array( $selected ) && $selected ) {
	foreach ( $selected as $case_id ) {
		$case_id = (int) $case_id;
		if ( ! $case_id || 'case' !== get_post_type( $case_id ) ) {
			continue;
		}

		$cases[] = array(
			'title'        => get_the_title( $case_id ),
			'type'         => argokov_field( 'case_type', '', $case_id ),
			'lead'         => argokov_field( 'case_lead', get_the_excerpt( $case_id ), $case_id ),
			'work'         => argokov_rows( 'case_work', array(), $case_id ),
			'technologies' => argokov_rows( 'case_technologies', array(), $case_id ),
			'url'          => argokov_field( 'case_website_url', '', $case_id ),
		);
	}
}

if ( ! $cases ) {
	$cases = array(
		array(
			'title' => 'Урал Медикал Групп',
			'type'  => 'Медицина · развитие',
			'lead'  => 'Развиваем сайт сети медицинских центров: от структуры городов и услуг до интеграций и технического SEO.',
			'work'  => array(
				array( 'text' => 'Архитектура услуг, городов и специалистов' ),
				array( 'text' => 'Формы записи и интеграция с CRM' ),
				array( 'text' => 'Schema.org и техническое SEO' ),
				array( 'text' => 'Новые разделы и постоянные доработки' ),
			),
			'technologies' => array(
				array( 'text' => 'WordPress' ),
				array( 'text' => 'PHP' ),
				array( 'text' => 'ACF' ),
			),
			'url' => 'https://www.medgrup.online/',
		),
		array(
			'title' => 'Кровельная компания «МИК»',
			'type'  => 'Строительство · разработка',
			'lead'  => 'Разработали сайт кровельной компании и продолжаем развивать его под новые услуги и задачи бизнеса.',
			'work'  => array(
				array( 'text' => 'Структура услуг и посадочных страниц' ),
				array( 'text' => 'Интерактивный расчёт стоимости' ),
				array( 'text' => 'Гибкие блоки для самостоятельного наполнения' ),
				array( 'text' => 'Формы заявок и технические доработки' ),
			),
			'technologies' => array(
				array( 'text' => 'WordPress' ),
				array( 'text' => 'ACF' ),
				array( 'text' => 'JavaScript' ),
			),
			'url' => 'https://www.pvhkrovlya.ru/',
		),
	);
}
?>
<section class="home-section cases surface" id="work" aria-labelledby="cases-title">
	<header class="section-heading">
		<div class="section-heading__main">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_cases_eyebrow', 'Выбранные проекты' ) ); ?></p>
			<h2 id="cases-title"><?php echo esc_html( argokov_field( 'home_cases_title', 'Показываем не макеты, а выполненную работу' ) ); ?></h2>
		</div>
		<p class="section-heading__copy"><?php echo esc_html( argokov_field( 'home_cases_copy', 'Коротко о задаче, нашей роли и том, что было сделано внутри проекта.' ) ); ?></p>
		<span class="section-heading__index"><?php echo esc_html( argokov_field( 'home_cases_index', '03' ) ); ?></span>
	</header>

	<div class="cases__list">
		<?php foreach ( $cases as $index => $case ) : ?>
			<article class="case-card">
				<div class="case-card__meta">
					<span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><span><?php echo esc_html( $case['type'] ?? '' ); ?></span>
				</div>

				<h3><?php echo esc_html( $case['title'] ?? '' ); ?></h3>
				<p class="case-card__lead"><?php echo esc_html( $case['lead'] ?? '' ); ?></p>

				<?php if ( ! empty( $case['work'] ) ) : ?>
					<div class="case-card__work">
						<span>Что сделали</span>
						<ul>
							<?php foreach ( $case['work'] as $item ) : ?>
								<li><?php echo esc_html( $item['text'] ?? '' ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<footer class="case-card__footer">
					<?php if ( ! empty( $case['technologies'] ) ) : ?>
						<div class="tag-list">
							<?php foreach ( $case['technologies'] as $technology ) : ?>
								<span><?php echo esc_html( $technology['text'] ?? '' ); ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $case['url'] ) ) : ?>
						<a href="<?php echo esc_url( $case['url'] ); ?>" target="_blank" rel="noopener noreferrer">Открыть сайт <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
					<?php endif; ?>
				</footer>
			</article>
		<?php endforeach; ?>
	</div>

	<div class="section-action">
		<p><?php echo esc_html( argokov_field( 'home_cases_note', 'Часть проектов не публикуем: работаем по NDA и соблюдаем договорённости с клиентами. О релевантном опыте можем рассказать лично — без раскрытия закрытых данных.' ) ); ?></p>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ?: home_url( '/cases/' ) ); ?>"><?php echo esc_html( argokov_field( 'home_cases_link_label', 'Смотреть все кейсы' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</div>
</section>
