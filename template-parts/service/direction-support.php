<?php
/**
 * Support service direction.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;


	$hero_proof = argokov_rows(
		'support_hero_proof',
		array(
			array( 'value' => 'Чужой проект — не проблема', 'label' => 'начинаем с диагностики' ),
			array( 'value' => 'Прямой контакт', 'label' => 'с ведущим разработчиком' ),
			array( 'value' => 'По всей России', 'label' => 'принимаем обращения 24/7' ),
		)
	);

	$signals = argokov_rows(
		'support_signals',
		array(
			array( 'label' => 'Работоспособность', 'value' => 'Проверяем', 'tone' => 'ok' ),
			array( 'label' => 'Резервные копии', 'value' => 'Контролируем', 'tone' => 'ok' ),
			array( 'label' => 'Ошибки и логи', 'value' => 'Разбираем причины', 'tone' => 'normal' ),
			array( 'label' => 'План развития', 'value' => 'Двигаемся по приоритетам', 'tone' => 'amber' ),
		)
	);

	$directions = argokov_rows(
		'support_directions',
		array(
			array( 'number' => '01', 'title' => 'Исправление ошибок', 'text' => 'Находим причину сбоя, а не маскируем симптом. Восстанавливаем формы, страницы, обмены и отдельные функции.', 'features' => array( array( 'text' => 'Ошибки PHP и JavaScript' ), array( 'text' => 'Проблемы после обновлений' ), array( 'text' => 'Сбои форм и интеграций' ) ) ),
			array( 'number' => '02', 'title' => 'Доработка сайта', 'text' => 'Добавляем новые страницы, компоненты и бизнес-логику без обязательного переписывания всего проекта.', 'features' => array( array( 'text' => 'Новый функционал' ), array( 'text' => 'Интерфейсы и адаптив' ), array( 'text' => 'Личные кабинеты и API' ) ) ),
			array( 'number' => '03', 'title' => 'Техническое обслуживание', 'text' => 'Поддерживаем рабочее состояние сайта и уменьшаем риск неприятных сюрпризов в эксплуатации.', 'features' => array( array( 'text' => 'Обновления и резервные копии' ), array( 'text' => 'Скорость и безопасность' ), array( 'text' => 'Домены, SSL и сервер' ) ) ),
			array( 'number' => '04', 'title' => 'Развитие и SEO-задачи', 'text' => 'Реализуем рекомендации SEO-команды и развиваем сайт под новые направления, города и услуги.', 'features' => array( array( 'text' => 'Посадочные страницы' ), array( 'text' => 'Schema.org и шаблоны' ), array( 'text' => 'Аналитика и конверсии' ) ) ),
		)
	);

	$for_items = argokov_rows(
		'support_for_items',
		array(
			array( 'number' => '01', 'title' => 'Предыдущий подрядчик пропал', 'text' => 'Нет документации, накопились вопросы и некому отвечать за техническую часть.' ),
			array( 'number' => '02', 'title' => 'Сайт работает нестабильно', 'text' => 'Появляются ошибки, ломаются формы, обмены или отдельные сценарии пользователей.' ),
			array( 'number' => '03', 'title' => 'Нужны постоянные доработки', 'text' => 'Маркетинг, SEO и продажи регулярно приносят задачи, которым нужна техническая реализация.' ),
			array( 'number' => '04', 'title' => 'Проект старый и сложный', 'text' => 'CMS устарела, код самописный, много зависимостей — и никто не хочет в этом разбираться.' ),
		)
	);

	$formats = argokov_rows(
		'support_formats',
		array(
			array( 'label' => 'Разовая задача', 'variant' => 'default', 'title' => 'Когда нужно починить или добавить конкретную функцию', 'text' => 'Изучаем проблему, оцениваем работу и закрываем задачу без обязательной ежемесячной поддержки.', 'features' => array( array( 'text' => 'Фиксируем ожидаемый результат' ), array( 'text' => 'Согласуем оценку до начала' ), array( 'text' => 'Передаём выполненную работу' ) ) ),
			array( 'label' => 'Регулярная поддержка', 'variant' => 'accent', 'title' => 'Когда задачи по сайту появляются каждый месяц', 'text' => 'Погружаемся в проект и последовательно закрываем технические, контентные и продуктовые задачи.', 'features' => array( array( 'text' => 'Общий список приоритетов' ), array( 'text' => 'Планирование доступного времени' ), array( 'text' => 'Понятный отчёт по работам' ) ) ),
			array( 'label' => 'Технический партнёр', 'variant' => 'default', 'title' => 'Когда бизнесу или агентству нужен свой разработчик', 'text' => 'Подключаемся к команде, общаемся с SEO, дизайном и маркетингом и отвечаем за техническую реализацию.', 'features' => array( array( 'text' => 'Прямое общение со специалистами' ), array( 'text' => 'Сохраняем знания о проекте' ), array( 'text' => 'Развиваем без постоянного старта с нуля' ) ) ),
		)
	);

	$start_steps = argokov_rows(
		'support_start_steps',
		array(
			array( 'number' => '01', 'title' => 'Получаем доступы и материалы', 'text' => 'Нужны CMS, хостинг или сервер, репозиторий и описание известных проблем. Запрашиваем только то, что действительно необходимо.' ),
			array( 'number' => '02', 'title' => 'Делаем техническую диагностику', 'text' => 'Проверяем код, логи, резервные копии, обновления, интеграции и критичные риски. Ничего не меняем вслепую.' ),
			array( 'number' => '03', 'title' => 'Формируем порядок работ', 'text' => 'Отделяем срочное от желательного и объясняем, что можно исправить сразу, а что безопаснее делать поэтапно.' ),
			array( 'number' => '04', 'title' => 'Берём проект в работу', 'text' => 'Фиксируем изменения, проверяем результат и постепенно собираем понятную техническую историю сайта.' ),
		)
	);

	$safety = argokov_rows(
		'support_safety_items',
		array(
			array( 'number' => '01', 'title' => 'Копия до изменений', 'text' => 'Сохраняем состояние проекта перед потенциально рискованной работой.' ),
			array( 'number' => '02', 'title' => 'Фиксация изменений', 'text' => 'Понимаем, что и зачем было изменено и как вернуть предыдущую версию.' ),
			array( 'number' => '03', 'title' => 'Проверка сценариев', 'text' => 'Тестируем формы, оплату, интеграции и другие важные функции.' ),
			array( 'number' => '04', 'title' => 'Работа по NDA', 'text' => 'Можем закрепить конфиденциальность данных и устройства проекта.' ),
		)
	);

	$tech = argokov_rows(
		'support_tech_tags',
		array(
			array( 'text' => 'WordPress' ),
			array( 'text' => '1С-Битрикс' ),
			array( 'text' => 'WooCommerce' ),
			array( 'text' => 'OpenCart' ),
			array( 'text' => 'MODX' ),
			array( 'text' => 'PHP' ),
			array( 'text' => 'Laravel' ),
			array( 'text' => 'JavaScript' ),
			array( 'text' => 'Самописный код' ),
		)
	);

	$matrix = argokov_rows(
		'support_estimate_matrix',
		array(
			array( 'label' => 'Разовая задача', 'value' => 'Оценка по составу работ' ),
			array( 'label' => 'Регулярные задачи', 'value' => 'Планируемый объём в месяц' ),
			array( 'label' => 'Сложный проект', 'value' => 'Диагностика и работа по этапам' ),
			array( 'label' => 'Критичная ситуация', 'value' => 'Приоритет и сроки согласуем отдельно' ),
		)
	);

	$cases = argokov_selected_cases( 'support_cases_selected', 2 );

	$faq = argokov_rows(
		'support_faq',
		array(
			array( 'question' => 'Берёте ли вы на поддержку сайты, которые делали не вы?', 'answer' => 'Да. Большая часть задач поддержки начинается именно с чужого проекта. Берём WordPress, 1С-Битрикс, интернет-магазины, самописные CMS и доисторический код, если можем получить необходимые доступы и безопасно разобраться в системе.' ),
			array( 'question' => 'Можно обратиться только с одной задачей?', 'answer' => 'Да. Не обязательно сразу переходить на абонентское сопровождение. Можно начать с ошибки, интеграции, новой страницы или технической диагностики, а формат дальнейшей работы выбрать по результату.' ),
			array( 'question' => 'Как быстро вы начинаете работу?', 'answer' => 'Сначала оцениваем критичность и текущую загрузку. Обращения принимаем круглосуточно, но конкретное время реакции и начала работ согласуем отдельно. Для регулярной поддержки приоритеты и порядок реакции фиксируем заранее.' ),
			array( 'question' => 'Что входит в техническую поддержку сайта?', 'answer' => 'Исправление ошибок, обновления CMS и окружения, резервные копии, контроль безопасности, доработка функционала, интеграции, улучшение скорости, реализация SEO-задач и помощь с содержимым. Точный состав зависит от проекта и выбранного формата.' ),
			array( 'question' => 'Как вы работаете с доступами и рабочим сайтом?', 'answer' => 'Запрашиваем минимально необходимые доступы, перед изменениями делаем копию и по возможности проверяем работу на тестовой среде. Критичные действия и риски согласуем до внедрения. Для закрытых проектов можем работать по NDA.' ),
			array( 'question' => 'Можно ли передать задачи от SEO-агентства или внутренней команды?', 'answer' => 'Да. Работаем напрямую с SEO-специалистами, дизайнерами и маркетологами: уточняем технические требования, предлагаем безопасный способ реализации и возвращаем результат без потери деталей через менеджеров.' ),
			array( 'question' => 'От чего зависит стоимость поддержки?', 'answer' => 'От состояния сайта, стека, качества исходного кода, срочности, необходимого времени реакции, количества интеграций и объёма задач. После первичного знакомства предлагаем разовую оценку или удобный регулярный формат.' ),
		)
	);
	?>

	<section class="support-hero surface" aria-labelledby="support-title">
		<div class="support-hero__content">
			<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Услуги</a><span>/</span><span><?php echo esc_html( single_term_title( '', false ) ); ?></span></nav>
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_hero_eyebrow', 'Любая CMS · самописные сайты · доисторический код' ) ); ?></p>
			<h1 id="support-title"><?php echo esc_html( argokov_field( 'support_hero_title', 'Техническая поддержка' ) ); ?> <span><?php echo esc_html( argokov_field( 'support_hero_title_accent', 'и развитие сайтов' ) ); ?></span></h1>
			<p class="support-hero__lead"><?php echo esc_html( argokov_field( 'support_hero_lead', 'Берём на себя техническую сторону готового сайта: исправляем ошибки, внедряем новые функции, поддерживаем интеграции и последовательно развиваем проект.' ) ); ?></p>
			<div class="support-hero__actions">
				<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'support_hero_primary_label', 'Передать сайт на поддержку' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
				<a class="text-link" href="#directions"><?php echo esc_html( argokov_field( 'support_hero_secondary_label', 'Что можем сделать' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			</div>
			<div class="support-hero__proof"><?php foreach ( $hero_proof as $item ) : ?><span><strong><?php echo esc_html( $item['value'] ?? '' ); ?></strong> <?php echo esc_html( $item['label'] ?? '' ); ?></span><?php endforeach; ?></div>
		</div>

		<aside class="support-hero__visual" aria-label="Состояние проекта под контролем">
			<div class="support-visual__heading"><div><span><?php echo esc_html( argokov_field( 'support_visual_eyebrow', 'Технический контур' ) ); ?></span><strong><?php echo esc_html( argokov_field( 'support_visual_title', 'Сайт под контролем' ) ); ?></strong></div><i aria-hidden="true"></i></div>
			<div class="support-signals">
				<?php foreach ( $signals as $signal ) : ?>
					<?php
					$tone  = $signal['tone'] ?? 'normal';
					$class = 'support-signal';
					if ( 'ok' === $tone ) {
						$class .= ' support-signal--ok';
					} elseif ( 'amber' === $tone ) {
						$class .= ' support-signal--amber';
					}
					?>
					<article><span><?php echo esc_html( $signal['label'] ?? '' ); ?></span><strong><?php echo esc_html( $signal['value'] ?? '' ); ?></strong><i class="<?php echo esc_attr( $class ); ?>"></i></article>
				<?php endforeach; ?>
			</div>
			<div class="support-visual__footer"><span><?php echo esc_html( argokov_field( 'support_visual_footer_label', 'CMS' ) ); ?></span><strong><?php echo esc_html( argokov_field( 'support_visual_footer_value', 'WordPress · Битрикс · custom' ) ); ?></strong></div>
		</aside>
	</section>

	<section class="development-section surface" id="directions" aria-labelledby="directions-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_directions_eyebrow', 'Задачи поддержки' ) ); ?></p><h2 id="directions-title"><?php echo esc_html( argokov_field( 'support_directions_title', 'Не только следим, чтобы сайт не упал' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'support_directions_copy', 'Поддержка — это техническая работа с живым проектом: от срочного исправления ошибки до регулярного развития вместе с бизнесом.' ) ); ?></p>
		</header>
		<div class="development-types support-directions">
			<?php foreach ( $directions as $item ) : ?>
				<article class="development-type"><span class="development-card-number"><?php echo esc_html( $item['number'] ?? '' ); ?></span><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p><?php if ( ! empty( $item['features'] ) ) : ?><ul><?php foreach ( $item['features'] as $feature ) : ?><li><?php echo esc_html( $feature['text'] ?? '' ); ?></li><?php endforeach; ?></ul><?php endif; ?></article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="support-for surface" aria-labelledby="support-for-title">
		<div class="support-for__intro">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_for_eyebrow', 'Когда мы полезны' ) ); ?></p>
			<h2 id="support-for-title"><?php echo esc_html( argokov_field( 'support_for_title', 'Подключаемся там, где проект нельзя просто остановить' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'support_for_text', 'Не требуем переписывать сайт с нуля ради удобства разработчика. Сначала выясняем, что уже работает и что мешает бизнесу двигаться дальше.' ) ); ?></p>
		</div>
		<div class="support-for__list"><?php foreach ( $for_items as $item ) : ?><article><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></article><?php endforeach; ?></div>
	</section>

	<section class="development-section surface" id="formats" aria-labelledby="formats-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_formats_eyebrow', 'Форматы работы' ) ); ?></p><h2 id="formats-title"><?php echo esc_html( argokov_field( 'support_formats_title', 'Поддержка под реальный объём задач' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'support_formats_copy', 'Не заставляем покупать большой тариф. Формат можно выбрать после первой задачи и менять по мере развития проекта.' ) ); ?></p>
		</header>
		<div class="support-formats">
			<?php foreach ( $formats as $item ) : ?>
				<?php $class = 'support-format' . ( ( $item['variant'] ?? 'default' ) === 'accent' ? ' support-format--accent' : '' ); ?>
				<article class="<?php echo esc_attr( $class ); ?>"><span><?php echo esc_html( $item['label'] ?? '' ); ?></span><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p><?php if ( ! empty( $item['features'] ) ) : ?><ul><?php foreach ( $item['features'] as $feature ) : ?><li><?php echo esc_html( $feature['text'] ?? '' ); ?></li><?php endforeach; ?></ul><?php endif; ?></article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="support-start surface" id="start" aria-labelledby="support-start-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_start_eyebrow', 'Как берём сайт на поддержку' ) ); ?></p><h2 id="support-start-title"><?php echo esc_html( argokov_field( 'support_start_title', 'Сначала разбираемся, затем меняем' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'support_start_copy', 'Особенно важно для старых сайтов: одно необдуманное обновление может задеть продажи, данные или интеграции.' ) ); ?></p>
		</header>
		<ol class="support-start__steps"><?php foreach ( $start_steps as $item ) : ?><li><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></li><?php endforeach; ?></ol>
	</section>

	<section class="support-safety surface" aria-labelledby="safety-title">
		<div class="support-safety__content">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_safety_eyebrow', 'Безопасная работа' ) ); ?></p>
			<h2 id="safety-title"><?php echo esc_html( argokov_field( 'support_safety_title', 'Не правим рабочий сайт вслепую' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'support_safety_text', 'Перед изменениями оцениваем риск, сохраняем возможность отката и проверяем критичные сценарии. Если проект позволяет — используем тестовую среду и систему контроля версий.' ) ); ?></p>
			<blockquote><?php echo esc_html( argokov_field( 'support_safety_quote', 'Доступы, резервная копия и понятный план изменений — обязательная основа, а не дополнительная услуга.' ) ); ?></blockquote>
		</div>
		<div class="support-safety__grid"><?php foreach ( $safety as $item ) : ?><article><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><strong><?php echo esc_html( $item['title'] ?? '' ); ?></strong><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></article><?php endforeach; ?></div>
	</section>

	<section class="development-tech surface" aria-labelledby="support-tech-title">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_tech_eyebrow', 'CMS и технологии' ) ); ?></p><h2 id="support-tech-title"><?php echo esc_html( argokov_field( 'support_tech_title', 'WordPress — основа, но поддерживаем не только его' ) ); ?></h2><p><?php echo esc_html( argokov_field( 'support_tech_text', 'Не отказываем только потому, что сайт собран на другой CMS или давно не обновлялся. Сначала смотрим код и инфраструктуру, затем честно говорим, можем ли отвечать за результат.' ) ); ?></p></div>
		<div class="development-tech__list"><?php foreach ( $tech as $tag ) : ?><span><?php echo esc_html( $tag['text'] ?? '' ); ?></span><?php endforeach; ?></div>
	</section>

	<section class="support-estimate surface" aria-labelledby="support-estimate-title">
		<div class="support-estimate__content">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_estimate_eyebrow', 'Стоимость поддержки' ) ); ?></p>
			<h2 id="support-estimate-title"><?php echo esc_html( argokov_field( 'support_estimate_title', 'Оцениваем не CMS, а состояние и задачи проекта' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'support_estimate_text', 'Два сайта на WordPress могут отличаться по сложности в десятки раз. Смотрим код, интеграции, риски и нужную скорость реакции — после этого предлагаем разовую оценку или регулярный формат.' ) ); ?></p>
			<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'support_estimate_button_label', 'Оценить поддержку' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</div>
		<div class="support-estimate__matrix"><?php foreach ( $matrix as $item ) : ?><div><span><?php echo esc_html( $item['label'] ?? '' ); ?></span><strong><?php echo esc_html( $item['value'] ?? '' ); ?></strong></div><?php endforeach; ?></div>
	</section>

	<section class="development-section surface" id="support-cases" aria-labelledby="support-cases-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_cases_eyebrow', 'Проекты на поддержке' ) ); ?></p><h2 id="support-cases-title"><?php echo esc_html( argokov_field( 'support_cases_title', 'Знаем сайт целиком и развиваем годами' ) ); ?></h2></div>
			<a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ?: home_url( '/cases/' ) ); ?>" class="text-link">Все кейсы <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</header>
		<div class="development-cases">
			<?php foreach ( $cases as $case ) : ?>
				<article><span><?php echo esc_html( $case['type'] ?? '' ); ?></span><h3><?php echo esc_html( $case['title'] ?? '' ); ?></h3><p><?php echo esc_html( $case['lead'] ?? '' ); ?></p><?php if ( ! empty( $case['technologies'] ) ) : ?><div><?php foreach ( $case['technologies'] as $tech_item ) : ?><span><?php echo esc_html( $tech_item['text'] ?? '' ); ?></span><?php endforeach; ?></div><?php endif; ?><?php if ( ! empty( $case['url'] ) ) : ?><a href="<?php echo esc_url( $case['url'] ); ?>" target="_blank" rel="noopener noreferrer">Открыть сайт <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?></article>
			<?php endforeach; ?>
		</div>
		<p class="development-cases__note"><?php echo esc_html( argokov_field( 'support_cases_note', 'Не все проекты можем показывать из-за NDA. По запросу расскажем о релевантном опыте без раскрытия закрытых данных.' ) ); ?></p>
	</section>

	<section class="development-section surface" id="support-faq" aria-labelledby="support-faq-title">
		<header class="development-heading"><div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'support_faq_eyebrow', 'Частые вопросы' ) ); ?></p><h2 id="support-faq-title"><?php echo esc_html( argokov_field( 'support_faq_title', 'До передачи сайта на поддержку' ) ); ?></h2></div></header>
		<div class="development-faq"><?php foreach ( $faq as $item ) : ?><details><summary><?php echo esc_html( $item['question'] ?? '' ); ?><span>+</span></summary><p><?php echo esc_html( $item['answer'] ?? '' ); ?></p></details><?php endforeach; ?></div>
	</section>

	<?php get_template_part( 'template-parts/service/direction-services' ); ?>

	<?php
	get_template_part(
		'template-parts/common/contact-section',
		null,
		array(
			'eyebrow'  => argokov_field( 'support_contact_eyebrow', 'Начнём с сайта' ),
			'title'    => argokov_field( 'support_contact_title', 'Пришлите ссылку и опишите задачу' ),
			'text'     => argokov_field( 'support_contact_text', 'Можно написать, что сломалось, какие доработки нужны или почему ищешь нового разработчика. Изучим вводные и предложим безопасный первый шаг.' ),
			'title_id' => 'support-contact-title',
		)
	);

