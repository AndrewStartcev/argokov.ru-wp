<?php
/**
 * Development service direction.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;


	$hero_proof = argokov_rows(
		'dev_hero_proof',
		array(
			array( 'value' => '10 лет', 'label' => 'в веб-разработке' ),
			array( 'value' => 'Любой стек', 'label' => 'под задачу' ),
			array( 'value' => 'После запуска', 'label' => 'можем развивать сайт' ),
		)
	);

	$visual_steps = argokov_rows(
		'dev_visual_steps',
		array(
			array( 'number' => '01', 'title' => 'Структура', 'text' => 'под спрос и задачи бизнеса' ),
			array( 'number' => '02', 'title' => 'Интерфейс', 'text' => 'ведёт человека к действию' ),
			array( 'number' => '03', 'title' => 'Код', 'text' => 'понятный и расширяемый' ),
			array( 'number' => '04', 'title' => 'Данные', 'text' => 'аналитика и интеграции' ),
		)
	);

	$visual_tags = argokov_rows(
		'dev_visual_tags',
		array(
			array( 'text' => 'Корпоративные' ),
			array( 'text' => 'Магазины' ),
			array( 'text' => 'Сервисы' ),
		)
	);

	$types = argokov_rows(
		'dev_types',
		array(
			array( 'number' => '01', 'title' => 'Корпоративный сайт', 'text' => 'Показывает услуги и экспертизу компании, помогает получать обращения из поиска и рекламы.', 'features' => array( array( 'text' => 'Продуманная структура' ), array( 'text' => 'Услуги и кейсы' ), array( 'text' => 'Формы и интеграции' ) ) ),
			array( 'number' => '02', 'title' => 'Интернет-магазин', 'text' => 'Продаёт товары онлайн: от удобного каталога до оплаты, доставки и обмена данными с учётной системой.', 'features' => array( array( 'text' => 'Каталог и фильтры' ), array( 'text' => 'Корзина и оплата' ), array( 'text' => '1С, CRM и доставка' ) ) ),
			array( 'number' => '03', 'title' => 'Сайт услуг', 'text' => 'Собирает спрос вокруг конкретного направления и последовательно приводит посетителя к заявке.', 'features' => array( array( 'text' => 'Сильное предложение' ), array( 'text' => 'Посадочные страницы' ), array( 'text' => 'Аналитика обращений' ) ) ),
			array( 'number' => '04', 'title' => 'Портал или веб-сервис', 'text' => 'Решает нестандартную задачу бизнеса: личные кабинеты, роли, внутренние процессы и внешние API.', 'features' => array( array( 'text' => 'Бизнес-логика' ), array( 'text' => 'Личные кабинеты' ), array( 'text' => 'Интеграции по API' ) ) ),
		)
	);

	$included = argokov_rows(
		'dev_included',
		array(
			array( 'number' => '01', 'title' => 'Аналитика и структура', 'text' => 'Разбираемся в продукте, аудитории и задачах. Собираем понятную карту будущего сайта.' ),
			array( 'number' => '02', 'title' => 'Прототип и содержание', 'text' => 'Прорабатываем сценарии страниц и заранее определяем, какие материалы понадобятся.' ),
			array( 'number' => '03', 'title' => 'Дизайн и адаптив', 'text' => 'Создаём индивидуальный интерфейс и проверяем его на компьютерах, планшетах и телефонах.' ),
			array( 'number' => '04', 'title' => 'Разработка и CMS', 'text' => 'Верстаем, программируем и настраиваем удобное управление содержимым без привязки к шаблону.' ),
			array( 'number' => '05', 'title' => 'Интеграции', 'text' => 'Подключаем CRM, 1С, оплату, доставку, телефонию, формы и внешние сервисы по API.' ),
			array( 'number' => '06', 'title' => 'SEO и аналитика', 'text' => 'Закладываем техническую основу для продвижения и настраиваем измерение важных действий.' ),
			array( 'number' => '07', 'title' => 'Тестирование и запуск', 'text' => 'Проверяем сценарии, переносим сайт на сервер, подключаем домен и контролируем запуск.' ),
		)
	);

	$seo_items = argokov_rows(
		'dev_seo_checklist',
		array(
			array( 'number' => '01', 'text' => 'Логичная иерархия и человекопонятные URL' ),
			array( 'number' => '02', 'text' => 'Управляемые Title, Description и заголовки' ),
			array( 'number' => '03', 'text' => 'Schema.org для подходящих типов страниц' ),
			array( 'number' => '04', 'text' => 'Адаптивность, скорость и Core Web Vitals' ),
			array( 'number' => '05', 'text' => 'Sitemap, robots, canonical и перенаправления' ),
			array( 'number' => '06', 'text' => 'Метрика, цели и события для важных действий' ),
		)
	);

	$stages = argokov_rows(
		'dev_stages',
		array(
			array( 'number' => '01', 'title' => 'Знакомимся с задачей', 'text' => 'Смотрим материалы и текущие процессы, уточняем цели и ограничения.' ),
			array( 'number' => '02', 'title' => 'Фиксируем состав работ', 'text' => 'Определяем страницы, функции, интеграции, этапы и критерии готовности.' ),
			array( 'number' => '03', 'title' => 'Проектируем', 'text' => 'Собираем структуру и прототипы ключевых страниц до начала дизайна и кода.' ),
			array( 'number' => '04', 'title' => 'Создаём сайт', 'text' => 'Последовательно делаем дизайн, адаптивную вёрстку, CMS и программную часть.' ),
			array( 'number' => '05', 'title' => 'Проверяем и запускаем', 'text' => 'Тестируем на устройствах, переносим данные, подключаем аналитику и открываем сайт.' ),
			array( 'number' => '06', 'title' => 'Остаёмся рядом', 'text' => 'Исправляем найденное после запуска, обучаем работе с сайтом и можем развивать его дальше.' ),
		)
	);

	$tech = argokov_rows(
		'dev_tech_tags',
		array(
			array( 'text' => 'WordPress' ),
			array( 'text' => '1С-Битрикс' ),
			array( 'text' => 'WooCommerce' ),
			array( 'text' => 'PHP' ),
			array( 'text' => 'Laravel' ),
			array( 'text' => 'React' ),
			array( 'text' => 'REST API' ),
			array( 'text' => 'Самописные CMS' ),
		)
	);

	$factors = argokov_rows(
		'dev_estimate_factors',
		array(
			array( 'text' => 'Количество и типы страниц' ),
			array( 'text' => 'Глубина индивидуального дизайна' ),
			array( 'text' => 'Бизнес-логика и роли пользователей' ),
			array( 'text' => 'Интеграции и перенос данных' ),
			array( 'text' => 'Готовность текстов и материалов' ),
			array( 'text' => 'Требования к скорости и безопасности' ),
		)
	);

	$cases = argokov_selected_cases( 'dev_cases_selected', 2 );

	$faq = argokov_rows(
		'dev_faq',
		array(
			array( 'question' => 'Сколько стоит разработка сайта?', 'answer' => 'Стоимость зависит от числа и сложности страниц, индивидуальности дизайна, бизнес-логики, интеграций и готовности материалов. После короткого знакомства разбираем задачу и даём поэтапную оценку — без цены, придуманной до изучения проекта.' ),
			array( 'question' => 'Сколько времени занимает создание сайта?', 'answer' => 'Срок определяется составом работ и скоростью согласований. Небольшой сайт и интернет-магазин с интеграциями требуют разного процесса, поэтому календарный план формируем после структуры и списка функций.' ),
			array( 'question' => 'Можно заказать создание сайта под ключ?', 'answer' => 'Да. Берём на себя аналитику, структуру, прототипы, дизайн, разработку, интеграции, техническую SEO-подготовку, тестирование и запуск. От клиента нужны знания о бизнесе и своевременная обратная связь.' ),
			array( 'question' => 'На какой CMS будет работать сайт?', 'answer' => 'Подбираем технологию под задачу. Основной стек — WordPress, но работаем с 1С-Битрикс, WooCommerce, PHP-фреймворками и самописными системами. Если CMS не нужна, не навязываем её.' ),
			array( 'question' => 'Будет ли сайт готов к SEO-продвижению?', 'answer' => 'На старте закладываем понятную иерархию, индексируемый контент, метаданные, человекопонятные адреса, мобильную версию, скорость и аналитику. Позиции не обещаем заранее: на них влияют конкуренция, контент и дальнейшее продвижение.' ),
			array( 'question' => 'Что происходит после запуска?', 'answer' => 'Передаём доступы и инструкции, контролируем сайт после публикации и исправляем относящиеся к разработке замечания. При необходимости берём проект на техническую поддержку и дальнейшее развитие.' ),
		)
	);
	?>

	<section class="development-hero surface" aria-labelledby="development-title">
		<div class="development-hero__content">
			<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Услуги</a><span>/</span><span><?php echo esc_html( single_term_title( '', false ) ); ?></span></nav>
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_hero_eyebrow', 'Сайты для бизнеса по всей России' ) ); ?></p>
			<h1 id="development-title"><?php echo esc_html( argokov_field( 'dev_hero_title', 'Разработка сайтов' ) ); ?> <span><?php echo esc_html( argokov_field( 'dev_hero_title_accent', 'от структуры до запуска' ) ); ?></span></h1>
			<p class="development-hero__lead"><?php echo esc_html( argokov_field( 'dev_hero_lead', 'Проектируем и разрабатываем корпоративные сайты, интернет-магазины и веб-сервисы. Берём на себя интерфейс, код, интеграции, техническую SEO-подготовку и запуск.' ) ); ?></p>
			<div class="development-hero__actions">
				<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'dev_hero_primary_label', 'Обсудить разработку' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
				<a href="#cases" class="text-link"><?php echo esc_html( argokov_field( 'dev_hero_secondary_label', 'Смотреть кейсы' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			</div>
			<div class="development-hero__proof">
				<?php foreach ( $hero_proof as $item ) : ?><span><strong><?php echo esc_html( $item['value'] ?? '' ); ?></strong> <?php echo esc_html( $item['label'] ?? '' ); ?></span><?php endforeach; ?>
			</div>
		</div>

		<div class="development-hero__visual" aria-label="Из чего складывается сайт">
			<p><?php echo esc_html( argokov_field( 'dev_visual_label', 'Собираем проект как систему' ) ); ?></p>
			<div class="development-stack">
				<?php foreach ( $visual_steps as $item ) : ?><article><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><strong><?php echo esc_html( $item['title'] ?? '' ); ?></strong><small><?php echo esc_html( $item['text'] ?? '' ); ?></small></article><?php endforeach; ?>
			</div>
			<div class="development-hero__tags"><?php foreach ( $visual_tags as $tag ) : ?><span><?php echo esc_html( $tag['text'] ?? '' ); ?></span><?php endforeach; ?></div>
		</div>
	</section>

	<section class="development-section surface" id="types" aria-labelledby="types-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_types_eyebrow', 'Форматы' ) ); ?></p><h2 id="types-title"><?php echo esc_html( argokov_field( 'dev_types_title', 'Разрабатываем сайты под конкретную задачу' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'dev_types_copy', 'Не начинаем с выбора шаблона или CMS. Сначала определяем, какую работу сайт должен выполнять для бизнеса.' ) ); ?></p>
		</header>
		<div class="development-types">
			<?php foreach ( $types as $item ) : ?>
				<article class="development-type"><span class="development-card-number"><?php echo esc_html( $item['number'] ?? '' ); ?></span><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p><?php if ( ! empty( $item['features'] ) ) : ?><ul><?php foreach ( $item['features'] as $feature ) : ?><li><?php echo esc_html( $feature['text'] ?? '' ); ?></li><?php endforeach; ?></ul><?php endif; ?></article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="development-section surface" id="included" aria-labelledby="included-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_included_eyebrow', 'Что входит в работу' ) ); ?></p><h2 id="included-title"><?php echo esc_html( argokov_field( 'dev_included_title', 'Один проект — от первого разговора до запуска' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'dev_included_copy', 'Не передаём клиенту набор несвязанных макетов. Соединяем содержание, интерфейс и техническую часть в работающий сайт.' ) ); ?></p>
		</header>
		<div class="development-included">
			<?php foreach ( $included as $item ) : ?><article><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></article><?php endforeach; ?>
		</div>
	</section>

	<section class="development-seo surface" id="seo" aria-labelledby="seo-title">
		<div class="development-seo__content">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_seo_eyebrow', 'Основа для продвижения' ) ); ?></p>
			<h2 id="seo-title"><?php echo esc_html( argokov_field( 'dev_seo_title', 'Сайт готовим к SEO ещё до запуска' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'dev_seo_text', 'Структуру, шаблоны страниц и технические требования продумываем во время разработки. Поэтому SEO-команде не приходится начинать с переделки нового сайта.' ) ); ?></p>
			<blockquote><?php echo esc_html( argokov_field( 'dev_seo_quote', 'Не обещаем позиции до запуска. Создаём техническую основу, которую можно последовательно развивать контентом и продвижением.' ) ); ?></blockquote>
		</div>
		<div class="development-seo__checklist">
			<?php foreach ( $seo_items as $item ) : ?><div><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div><?php endforeach; ?>
		</div>
	</section>

	<section class="development-section surface" id="stages" aria-labelledby="stages-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_stages_eyebrow', 'Как устроена работа' ) ); ?></p><h2 id="stages-title"><?php echo esc_html( argokov_field( 'dev_stages_title', 'Понятный процесс без прыжка сразу в дизайн' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'dev_stages_copy', 'Каждый этап заканчивается конкретным результатом. Ты видишь, что сделано, что согласуем и что идёт следующим.' ) ); ?></p>
		</header>
		<ol class="development-stages">
			<?php foreach ( $stages as $item ) : ?><li><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></li><?php endforeach; ?>
		</ol>
	</section>

	<section class="development-tech surface" aria-labelledby="tech-title">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_tech_eyebrow', 'Технологии' ) ); ?></p><h2 id="tech-title"><?php echo esc_html( argokov_field( 'dev_tech_title', 'WordPress — основа, но не ограничение' ) ); ?></h2><p><?php echo esc_html( argokov_field( 'dev_tech_text', 'Выбираем стек под функции, нагрузку, команду клиента и дальнейшее развитие. Можем сделать новый сайт, подключиться к существующей системе или интегрировать несколько решений.' ) ); ?></p></div>
		<div class="development-tech__list"><?php foreach ( $tech as $tag ) : ?><span><?php echo esc_html( $tag['text'] ?? '' ); ?></span><?php endforeach; ?></div>
	</section>

	<section class="development-estimate surface" aria-labelledby="estimate-title">
		<div class="development-estimate__content">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_estimate_eyebrow', 'Стоимость и сроки' ) ); ?></p>
			<h2 id="estimate-title"><?php echo esc_html( argokov_field( 'dev_estimate_title', 'Сначала разбираемся — затем называем цену' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'dev_estimate_text', 'Одинаковое число страниц не означает одинаковый объём работы. Изучим задачу, выделим этапы и подготовим оценку, которую можно проверить и обсудить.' ) ); ?></p>
			<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'dev_estimate_button_label', 'Получить оценку' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</div>
		<div class="development-estimate__factors">
			<p><?php echo esc_html( argokov_field( 'dev_estimate_factors_title', 'На оценку влияют' ) ); ?></p>
			<ul><?php foreach ( $factors as $factor ) : ?><li><?php echo esc_html( $factor['text'] ?? '' ); ?></li><?php endforeach; ?></ul>
		</div>
	</section>

	<section class="development-section surface" id="cases" aria-labelledby="cases-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_cases_eyebrow', 'Выбранные проекты' ) ); ?></p><h2 id="cases-title"><?php echo esc_html( argokov_field( 'dev_cases_title', 'Сайты, которые продолжают работать и развиваться' ) ); ?></h2></div>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ?: home_url( '/cases/' ) ); ?>" class="text-link"><?php echo esc_html( argokov_field( 'dev_cases_link_label', 'Все кейсы' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</header>
		<div class="development-cases">
			<?php foreach ( $cases as $case ) : ?>
				<article>
					<span><?php echo esc_html( $case['type'] ?? '' ); ?></span>
					<h3><?php echo esc_html( $case['title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $case['lead'] ?? '' ); ?></p>
					<?php if ( ! empty( $case['technologies'] ) ) : ?><div><?php foreach ( $case['technologies'] as $tech_item ) : ?><span><?php echo esc_html( $tech_item['text'] ?? '' ); ?></span><?php endforeach; ?></div><?php endif; ?>
					<?php if ( ! empty( $case['url'] ) ) : ?><a href="<?php echo esc_url( $case['url'] ); ?>" target="_blank" rel="noopener noreferrer">Открыть сайт <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="development-cases__note"><?php echo esc_html( argokov_field( 'dev_cases_note', 'Часть проектов защищена NDA, поэтому показываем не всё. По запросу подберём релевантный опыт без раскрытия закрытых данных.' ) ); ?></p>
	</section>

	<section class="development-section surface" id="faq" aria-labelledby="development-faq-title">
		<header class="development-heading"><div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'dev_faq_eyebrow', 'Частые вопросы' ) ); ?></p><h2 id="development-faq-title"><?php echo esc_html( argokov_field( 'dev_faq_title', 'О разработке сайта до начала проекта' ) ); ?></h2></div></header>
		<div class="development-faq">
			<?php foreach ( $faq as $item ) : ?><details><summary><?php echo esc_html( $item['question'] ?? '' ); ?><span>+</span></summary><p><?php echo esc_html( $item['answer'] ?? '' ); ?></p></details><?php endforeach; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/service/direction-services' ); ?>

	<?php
	get_template_part(
		'template-parts/common/contact-section',
		null,
		array(
			'eyebrow'  => argokov_field( 'dev_contact_eyebrow', 'Начнём с задачи' ),
			'title'    => argokov_field( 'dev_contact_title', 'Расскажите, какой сайт нужен' ),
			'text'     => argokov_field( 'dev_contact_text', 'Можно прислать описание, ссылку на пример или готовое техническое задание. Изучим материалы, зададим вопросы и предложим следующий шаг.' ),
			'title_id' => 'development-contact-title',
		)
	);

