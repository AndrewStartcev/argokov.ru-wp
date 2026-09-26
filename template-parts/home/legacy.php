<?php
defined( 'ABSPATH' ) || exit;

$intro_default = '<p>Берём на техническую поддержку корпоративные сайты, интернет-магазины и веб-сервисы на WordPress, 1С-Битрикс, других CMS и с самописным кодом. Исправляем ошибки, добавляем функции, подключаем интеграции и выполняем технические задачи SEO.</p><p>Полностью переделывать сайт нужно не всегда. Сначала определяем, что можно сохранить и безопасно развивать дальше.</p>';

$services = argokov_rows(
	'home_legacy_services',
	array(
		array( 'number' => '01', 'text' => 'Исправить ошибки и восстановить работу сайта' ),
		array( 'number' => '02', 'text' => 'Добавить новые разделы и функции' ),
		array( 'number' => '03', 'text' => 'Ускорить загрузку и повысить безопасность' ),
		array( 'number' => '04', 'text' => 'Выполнить рекомендации SEO-специалиста' ),
		array( 'number' => '05', 'text' => 'Подключить CRM, 1С, оплату и внешние сервисы' ),
		array( 'number' => '06', 'text' => 'Обновить CMS, плагины, PHP и серверное окружение' ),
	)
);

$projects = argokov_rows(
	'home_legacy_projects',
	array(
		array( 'number' => '01', 'text' => 'Старый сайт на WordPress или 1С-Битрикс' ),
		array( 'number' => '02', 'text' => 'Самописный проект без документации' ),
		array( 'number' => '03', 'text' => 'Интернет-магазин со сложными интеграциями' ),
		array( 'number' => '04', 'text' => 'Сайт после нескольких подрядчиков' ),
		array( 'number' => '05', 'text' => 'Проект, от которого отказался прежний разработчик' ),
		array( 'number' => '06', 'text' => 'Любой другой сайт, к коду которого есть доступ' ),
	)
);

$stack = argokov_rows(
	'home_legacy_stack',
	array(
		array( 'text' => 'WordPress' ),
		array( 'text' => '1С-Битрикс' ),
		array( 'text' => 'WooCommerce' ),
		array( 'text' => 'OpenCart' ),
		array( 'text' => 'MODX' ),
		array( 'text' => 'Laravel' ),
		array( 'text' => 'PHP' ),
		array( 'text' => 'Самописный код' ),
	)
);
?>
<section class="home-section legacy surface" id="improvements" aria-labelledby="legacy-title">
	<div class="legacy__content">
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_legacy_eyebrow', 'Сложные и старые проекты' ) ); ?></p>
		<h2 id="legacy-title"><?php echo esc_html( argokov_field( 'home_legacy_title', 'Доработка и поддержка сайтов, за которые другие не берутся' ) ); ?></h2>

		<div class="legacy__intro">
			<?php echo wp_kses_post( argokov_field( 'home_legacy_intro', $intro_default ) ); ?>
		</div>

		<div class="legacy__services">
			<h3><?php echo esc_html( argokov_field( 'home_legacy_services_title', 'Что можем сделать' ) ); ?></h3>
			<ul>
				<?php foreach ( $services as $item ) : ?>
					<li><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<aside class="legacy__project-types" aria-labelledby="project-types-title">
		<div class="legacy__project-types-header">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_legacy_projects_eyebrow', 'Можно передать нам' ) ); ?></p>
			<h3 id="project-types-title"><?php echo esc_html( argokov_field( 'home_legacy_projects_title', 'С каким проектом можно обратиться' ) ); ?></h3>
		</div>

		<ul>
			<?php foreach ( $projects as $item ) : ?>
				<li><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></li>
			<?php endforeach; ?>
		</ul>
	</aside>

	<div class="legacy__footer">
		<div class="legacy__platforms">
			<p><?php echo esc_html( argokov_field( 'home_legacy_stack_title', 'Технологии и платформы' ) ); ?></p>
			<div class="legacy__stack" aria-label="<?php echo esc_attr( argokov_field( 'home_legacy_stack_title', 'Технологии и платформы' ) ); ?>">
				<?php foreach ( $stack as $technology ) : ?><span><?php echo esc_html( $technology['text'] ?? '' ); ?></span><?php endforeach; ?>
			</div>
		</div>

		<div class="legacy__action">
			<p><?php echo esc_html( argokov_field( 'home_legacy_action_text', 'Не нашли свою CMS? Всё равно пришли ссылку — сначала изучим проект, а не будем отказывать по названию технологии.' ) ); ?></p>
			<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'home_legacy_action_label', 'Обсудить доработку' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</div>
	</div>
</section>
