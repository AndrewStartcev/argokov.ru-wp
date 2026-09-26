<?php
/**
 * Services page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$filters = argokov_rows(
		'services_filters',
		array(
			array( 'key' => 'all', 'label' => 'Все услуги' ),
			array( 'key' => 'development', 'label' => 'Разработка' ),
			array( 'key' => 'support', 'label' => 'Поддержка' ),
			array( 'key' => 'seo', 'label' => 'SEO' ),
			array( 'key' => 'integration', 'label' => 'Интеграции' ),
		)
	);

	$service_url_map = array(
		'Корпоративные сайты'          => '/services/development/corporate-sites/',
		'Интернет-магазины'            => '/services/development/internet-shops/',
		'Веб-сервисы и кабинеты'       => '/services/development/web-services/',
		'Техническая поддержка сайтов' => '/services/support/',
		'Разовая доработка'             => '/services/support/one-time-improvement/',
		'Приём чужого проекта'          => '/services/support/project-takeover/',
		'Технические задачи SEO'        => '/services/development/technical-seo/',
		'CRM, 1С и внешние сервисы'     => '/services/development/integrations/',
	);

	$hub_items = array(
		array(
			'category'       => 'development',
			'category_label' => 'Направление',
			'title'          => 'Разработка сайтов',
			'text'           => 'Проектируем и запускаем корпоративные сайты, интернет-магазины и веб-сервисы. От структуры и дизайна до CMS, интеграций и запуска.',
			'tags'           => array( array( 'text' => 'Корпоративные сайты' ), array( 'text' => 'Магазины' ), array( 'text' => 'Веб-сервисы' ) ),
			'url'            => '/services/development/',
		),
		array(
			'category'       => 'support',
			'category_label' => 'Направление',
			'title'          => 'Поддержка и развитие',
			'text'           => 'Принимаем готовые сайты, исправляем ошибки, добавляем функционал и ведём проект дальше — в том числе после других разработчиков.',
			'tags'           => array( array( 'text' => 'Доработки' ), array( 'text' => 'Поддержка' ), array( 'text' => 'Сложные проекты' ) ),
			'url'            => '/services/support/',
		),
	);

	$items = argokov_rows(
		'services_items',
		array(
			array(
				'number' => '01',
				'category' => 'development',
				'category_label' => 'Разработка',
				'title' => 'Корпоративные сайты',
				'text' => 'Структура, дизайн, разработка, CMS, интеграции и запуск сайта для компании.',
				'tags' => array( array( 'text' => 'WordPress' ), array( 'text' => 'Под ключ' ), array( 'text' => 'SEO-основа' ) ),
				'url' => '/services/development/corporate-sites/',
			),
			array(
				'number' => '02',
				'category' => 'development',
				'category_label' => 'Разработка',
				'title' => 'Интернет-магазины',
				'text' => 'Каталог, фильтры, корзина, оплата, доставка и обмен данными с учётной системой.',
				'tags' => array( array( 'text' => 'WooCommerce' ), array( 'text' => '1С' ), array( 'text' => 'CRM' ) ),
				'url' => '/services/development/internet-shops/',
			),
			array(
				'number' => '03',
				'category' => 'development',
				'category_label' => 'Разработка',
				'title' => 'Веб-сервисы и кабинеты',
				'text' => 'Нестандартная бизнес-логика, роли пользователей, личные кабинеты и API.',
				'tags' => array( array( 'text' => 'PHP' ), array( 'text' => 'React' ), array( 'text' => 'API' ) ),
				'url' => '/services/development/web-services/',
			),
			array(
				'number' => '04',
				'category' => 'support',
				'category_label' => 'Поддержка',
				'title' => 'Техническая поддержка сайтов',
				'text' => 'Регулярные задачи, контроль состояния, исправления и развитие готового проекта.',
				'tags' => array( array( 'text' => 'WordPress' ), array( 'text' => 'Битрикс' ), array( 'text' => 'Custom' ) ),
				'url' => '/services/support/',
			),
			array(
				'number' => '05',
				'category' => 'support',
				'category_label' => 'Поддержка',
				'title' => 'Разовая доработка',
				'text' => 'Исправление ошибки, новый блок, функция или интеграция без обязательного абонентского договора.',
				'tags' => array( array( 'text' => 'PHP' ), array( 'text' => 'JavaScript' ), array( 'text' => 'CMS' ) ),
				'url' => '/services/support/one-time-improvement/',
			),
			array(
				'number' => '06',
				'category' => 'support',
				'category_label' => 'Поддержка',
				'title' => 'Приём чужого проекта',
				'text' => 'Восстанавливаем техническую картину сайта без документации и прежней команды.',
				'tags' => array( array( 'text' => 'Диагностика' ), array( 'text' => 'Аудит' ), array( 'text' => 'NDA' ) ),
				'url' => '/services/support/project-takeover/',
			),
			array(
				'number' => '07',
				'category' => 'seo',
				'category_label' => 'SEO и данные',
				'title' => 'Технические задачи SEO',
				'text' => 'Шаблоны метаданных, индексация, скорость, редиректы и масштабируемые посадочные страницы.',
				'tags' => array( array( 'text' => 'SEO' ), array( 'text' => 'CWV' ), array( 'text' => 'Метаданные' ) ),
				'url' => '/services/development/technical-seo/',
			),
			array(
				'number' => '08',
				'category' => 'integration',
				'category_label' => 'Интеграции',
				'title' => 'CRM, 1С и внешние сервисы',
				'text' => 'Связываем сайт с CRM, оплатой, доставкой, телефонией и внешними API.',
				'tags' => array( array( 'text' => 'REST API' ), array( 'text' => 'CRM' ), array( 'text' => '1С' ) ),
				'url' => '/services/development/integrations/',
			),
		)
	);

	$has_development_hub = (bool) array_filter( $items, static function ( $item ) {
		return isset( $item['title'] ) && 'Разработка сайтов' === $item['title'];
	} );
	$has_support_hub = (bool) array_filter( $items, static function ( $item ) {
		return isset( $item['title'] ) && 'Поддержка и развитие' === $item['title'];
	} );

	if ( ! $has_support_hub ) {
		array_unshift( $items, $hub_items[1] );
	}

	if ( ! $has_development_hub ) {
		array_unshift( $items, $hub_items[0] );
	}
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span></nav>
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'services_hero_eyebrow', 'Все направления' ) ); ?></p>
		<h1><?php echo esc_html( argokov_field( 'services_hero_title', 'Услуги для сайта' ) ); ?> <span><?php echo esc_html( argokov_field( 'services_hero_title_accent', 'на любом этапе' ) ); ?></span></h1>
		<p><?php echo esc_html( argokov_field( 'services_hero_text', 'Разрабатываем новые сайты, принимаем готовые проекты на поддержку и решаем отдельные технические задачи. Фильтр помогает быстро найти нужное направление.' ) ); ?></p>
	</section>

	<section class="catalog-section surface" aria-labelledby="services-title">
		<header class="development-heading">
			<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'services_catalog_eyebrow', 'Каталог услуг' ) ); ?></p><h2 id="services-title"><?php echo esc_html( argokov_field( 'services_catalog_title', 'От первого запуска до постоянного развития' ) ); ?></h2></div>
			<p><?php echo esc_html( argokov_field( 'services_catalog_copy', 'Каталог строим как систему SEO-страниц: направления ведут к отдельным услугам, которые можно расширять под конкретные задачи, технологии и условия проекта.' ) ); ?></p>
		</header>

		<?php if ( $filters ) : ?>
			<div class="catalog-filter" role="group" aria-label="Фильтр услуг">
				<?php foreach ( $filters as $index => $filter ) : ?>
					<?php
					$key = $filter['key'] ?? '';
					$count = 'all' === $key ? count( $items ) : count( array_filter( $items, static function ( $item ) use ( $key ) { return isset( $item['category'] ) && $item['category'] === $key; } ) );
					?>
					<button type="button" class="<?php echo 0 === $index ? 'is-active' : ''; ?>" aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>" data-filter="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $filter['label'] ?? '' ); ?><span><?php echo (int) $count; ?></span></button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="services-grid" aria-live="polite">
			<?php foreach ( $items as $item_index => $item ) : ?>
				<?php
				$item_title = $item['title'] ?? '';
				$item_url   = isset( $service_url_map[ $item_title ] )
					? $service_url_map[ $item_title ]
					: ( $item['url'] ?? '' );
				?>
				<article class="service-catalog-card" data-category="<?php echo esc_attr( $item['category'] ?? '' ); ?>">
					<div class="service-catalog-card__top"><span><?php echo esc_html( sprintf( '%02d', $item_index + 1 ) ); ?></span><small><?php echo esc_html( $item['category_label'] ?? '' ); ?></small></div>
					<h3><?php echo esc_html( $item_title ); ?></h3>
					<p><?php echo esc_html( $item['text'] ?? '' ); ?></p>
					<?php if ( ! empty( $item['tags'] ) && is_array( $item['tags'] ) ) : ?><div class="service-catalog-card__tags"><?php foreach ( $item['tags'] as $tag ) : ?><span><?php echo esc_html( $tag['text'] ?? '' ); ?></span><?php endforeach; ?></div><?php endif; ?>
					<?php if ( $item_url ) : ?><a href="<?php echo esc_url( home_url( $item_url ) ); ?>">Подробнее <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="inner-cta surface">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'services_cta_eyebrow', 'Не нашли задачу' ) ); ?></p><h2><?php echo esc_html( argokov_field( 'services_cta_title', 'Пришли ссылку на сайт — разберёмся' ) ); ?></h2><p><?php echo esc_html( argokov_field( 'services_cta_text', 'Не обязательно подбирать правильное название услуги. Сначала поймём задачу и предложим подходящий формат.' ) ); ?></p></div>
		<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'services_cta_button_label', 'Обсудить задачу' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</section>
	<?php
endwhile;

get_footer();
