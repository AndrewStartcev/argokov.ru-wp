<?php
/**
 * About page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$founder_name  = argokov_option( 'site_founder_name', 'Андрей Старцев' );
	$founder_photo = argokov_option( 'site_founder_photo', array() );
	$founder_url   = argokov_image_url( $founder_photo, 'assets/images/andrey-startsev.png' );

	$facts = argokov_rows(
		'about_facts',
		array(
			array( 'value' => '10+ лет', 'label' => 'в веб-разработке' ),
			array( 'value' => 'Иркутск', 'label' => 'работаем по России' ),
			array( 'value' => 'Прямой контакт', 'label' => 'с ведущим разработчиком' ),
		)
	);

	$timeline = argokov_rows(
		'about_timeline',
		array(
			array( 'year' => '2015', 'title' => 'Первый коммерческий сайт', 'text' => 'Путь начался с HTML и самостоятельного обучения. Первым заказом стал лендинг: три месяца работы и первый настоящий опыт общения с заказчиком.' ),
			array( 'year' => '2019', 'title' => 'Фриланс и разные рынки', 'text' => 'Работа на Kwork дала десятки разноплановых задач и проекты для клиентов из России, Израиля, США и Испании. Именно здесь сформировался подход к коммуникации и ведению проектов.' ),
			array( 'year' => '2021', 'title' => 'Сложнее обычных сайтов', 'text' => 'К сайтам добавились веб-приложения: серверная логика, API, геопозиция, фотоотчёты и развитие продукта после запуска.' ),
			array( 'year' => 'Сейчас', 'title' => 'Студия «Аргоков»', 'text' => 'Разрабатываем сайты и веб-сервисы, принимаем проекты на поддержку и подключаем профильных специалистов только там, где это действительно нужно задаче.' ),
		)
	);

	$roles = argokov_rows(
		'about_roles',
		array(
			array( 'label' => 'Постоянная роль', 'title' => 'Разработка и техническое руководство', 'text' => 'Оценка, архитектура, код, интеграции, контроль качества и связь с клиентом.' ),
			array( 'label' => 'Под задачу', 'title' => 'Дизайн, SEO и смежная экспертиза', 'text' => 'Подключаются тогда, когда их работа нужна для результата и зафиксирована в составе проекта.' ),
		)
	);

	$values = argokov_rows(
		'about_values',
		array(
			array( 'number' => '01', 'title' => 'Сначала разобраться', 'text' => 'Не оцениваем сложный проект по одной ссылке и не меняем код вслепую.' ),
			array( 'number' => '02', 'title' => 'Предлагать нужное', 'text' => 'Не добавляем функциональность ради суммы в смете — решение должно помогать бизнесу.' ),
			array( 'number' => '03', 'title' => 'Не рисковать сайтом', 'text' => 'Работаем через копии, резервные копии и контроль версий, когда это позволяет проект.' ),
			array( 'number' => '04', 'title' => 'Отвечать за результат', 'text' => 'Не исчезаем при сложностях: объясняем ситуацию, предлагаем варианты и доводим согласованную задачу.' ),
		)
	);
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span>
		</nav>
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'about_hero_eyebrow', 'О студии' ) ); ?></p>
		<h1><?php echo esc_html( argokov_field( 'about_hero_title', 'Разработка, в которой' ) ); ?> <span><?php echo esc_html( argokov_field( 'about_hero_title_accent', 'есть личная ответственность' ) ); ?></span></h1>
		<p><?php echo esc_html( argokov_field( 'about_hero_text', '«Аргоков» — студия Андрея Старцева из Иркутска. Разрабатываем и поддерживаем сайты по всей России, напрямую обсуждаем технические решения и собираем команду под задачу, а не ради количества людей в проекте.' ) ); ?></p>
	</section>

	<section class="about-main surface" aria-labelledby="about-founder">
		<div class="about-main__photo">
			<?php if ( $founder_url ) : ?><img src="<?php echo esc_url( $founder_url ); ?>" alt="<?php echo esc_attr( $founder_name . ', основатель студии Аргоков' ); ?>" loading="lazy" decoding="async" sizes="(max-width: 960px) 100vw, 42vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"><?php endif; ?>
		</div>
		<div class="about-main__content">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'about_founder_eyebrow', 'Основатель и ведущий разработчик' ) ); ?></p>
			<h2 id="about-founder"><?php echo esc_html( argokov_field( 'about_founder_title', $founder_name ) ); ?></h2>
			<?php echo wp_kses_post( argokov_field( 'about_founder_text', '<p>В веб-разработке с 2015 года. Начинал с вёрстки и небольших лендингов, затем перешёл к CMS, серверной части и веб-приложениям. Большую часть знаний получил на реальных проектах: находил решение, проверял его на практике и возвращался к коду, чтобы сделать лучше.</p><p>Сегодня Андрей лично участвует в оценке, архитектуре и ключевых технических решениях. Дизайнеры, SEO-специалисты и другие исполнители подключаются по необходимости, но ответственность за согласованный результат не растворяется между подрядчиками.</p>' ) ); ?>
			<blockquote><?php echo esc_html( argokov_field( 'about_founder_quote', 'Наша задача — не продать клиенту больше часов и функций, а найти решение его проблемы и честно объяснить, что действительно нужно проекту.' ) ); ?></blockquote>
			<?php $interview_url = argokov_field( 'about_interview_url', 'https://blog.kwork.ru/interview/andrej-starcev-moya-osnovnaya-zadacha-ne-zarabotat-dengi-a-pomoch-reshit-problemu' ); ?>
			<?php if ( $interview_url ) : ?><a class="about-interview-link text-link" href="<?php echo esc_url( $interview_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( argokov_field( 'about_interview_label', 'Прочитать интервью на Kwork' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?>
			<?php if ( $facts ) : ?><div class="about-facts"><?php foreach ( $facts as $fact ) : ?><span><strong><?php echo esc_html( $fact['value'] ?? '' ); ?></strong><?php echo esc_html( $fact['label'] ?? '' ); ?></span><?php endforeach; ?></div><?php endif; ?>
		</div>
	</section>

	<section class="about-story surface" aria-labelledby="about-story-title">
		<header class="development-heading">
			<div>
				<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'about_story_eyebrow', 'История' ) ); ?></p>
				<h2 id="about-story-title"><?php echo esc_html( argokov_field( 'about_story_title', 'От первого лендинга до собственной студии' ) ); ?></h2>
			</div>
			<p><?php echo esc_html( argokov_field( 'about_story_copy', 'Не идеальная легенда из презентации, а путь через практику, сложные задачи и постоянное обучение.' ) ); ?></p>
		</header>
		<ol class="about-timeline">
			<?php foreach ( $timeline as $item ) : ?>
				<li><span><?php echo esc_html( $item['year'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></li>
			<?php endforeach; ?>
		</ol>
	</section>

	<section class="about-model surface" aria-labelledby="about-model-title">
		<div class="about-model__intro">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'about_model_eyebrow', 'Как устроена студия' ) ); ?></p>
			<h2 id="about-model-title"><?php echo esc_html( argokov_field( 'about_model_title', 'Компактная команда без лишних уровней' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'about_model_text', 'У проекта есть человек, который понимает его технически и отвечает на вопросы без пересказа через цепочку менеджеров. Когда задача требует отдельной экспертизы, подключаем проверенного специалиста и заранее объясняем его роль.' ) ); ?></p>
			<a href="<?php echo esc_url( home_url( '/process/' ) ); ?>" class="text-link"><?php echo esc_html( argokov_field( 'about_model_link_label', 'Посмотреть процесс работы' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</div>
		<div class="about-model__roles">
			<?php foreach ( $roles as $role ) : ?><article><span><?php echo esc_html( $role['label'] ?? '' ); ?></span><h3><?php echo esc_html( $role['title'] ?? '' ); ?></h3><p><?php echo esc_html( $role['text'] ?? '' ); ?></p></article><?php endforeach; ?>
		</div>
	</section>

	<section class="values-section surface" aria-labelledby="about-values-title">
		<header class="development-heading"><div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'about_values_eyebrow', 'Наш подход' ) ); ?></p><h2 id="about-values-title"><?php echo esc_html( argokov_field( 'about_values_title', 'Что считаем нормальной работой' ) ); ?></h2></div></header>
		<div class="values-grid">
			<?php foreach ( $values as $value ) : ?><article><span><?php echo esc_html( $value['number'] ?? '' ); ?></span><h3><?php echo esc_html( $value['title'] ?? '' ); ?></h3><p><?php echo esc_html( $value['text'] ?? '' ); ?></p></article><?php endforeach; ?>
		</div>
		<a href="<?php echo esc_url( home_url( '/process/' ) ); ?>" class="text-link"><?php echo esc_html( argokov_field( 'about_values_link_label', 'Как устроена работа' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</section>

	<section class="inner-cta surface">
		<div>
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'about_cta_eyebrow', 'Познакомились' ) ); ?></p>
			<h2><?php echo esc_html( argokov_field( 'about_cta_title', 'Теперь расскажи о своей задаче' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'about_cta_text', 'Посмотрим сайт или материалы, зададим вопросы и предложим следующий понятный шаг.' ) ); ?></p>
		</div>
		<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'about_cta_button_label', 'Обсудить задачу' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</section>
	<?php
endwhile;

get_footer();
