<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$location_short    = argokov_option( 'site_location_short', 'Иркутск · вся Россия' );
$location_full     = argokov_option( 'site_location_full', 'Иркутск · работаем по всей России' );
$availability      = argokov_option( 'site_availability_short', 'Обращения 24/7' );
$availability_full = argokov_option( 'site_availability_full', 'Принимаем обращения 24/7' );
$phone             = argokov_option( 'site_phone', '+7 999 000-00-00' );
$email             = argokov_option( 'site_email', 'mail@argokov.ru' );
$service_mega_menu = argokov_service_mega_menu_data( 6 );

if ( ! $service_mega_menu ) {
	$service_mega_menu = array(
		array(
			'title' => 'Разработка',
			'url' => home_url( '/services/development/' ),
			'services' => array(
				array( 'title' => 'Корпоративные сайты', 'url' => home_url( '/services/development/corporate-sites/' ) ),
				array( 'title' => 'Интернет-магазины', 'url' => home_url( '/services/development/internet-shops/' ) ),
				array( 'title' => 'Веб-сервисы и кабинеты', 'url' => home_url( '/services/development/web-services/' ) ),
				array( 'title' => 'Техническое SEO', 'url' => home_url( '/services/development/technical-seo/' ) ),
				array( 'title' => 'CRM, 1С и интеграции', 'url' => home_url( '/services/development/integrations/' ) ),
			),
			'total' => 5,
		),
		array(
			'title' => 'Поддержка',
			'url' => home_url( '/services/support/' ),
			'services' => array(
				array( 'title' => 'Разовая доработка', 'url' => home_url( '/services/support/one-time-improvement/' ) ),
				array( 'title' => 'Приём чужого проекта', 'url' => home_url( '/services/support/project-takeover/' ) ),
			),
			'total' => 2,
		),
	);
}

$services_menu_active = is_post_type_archive( 'service' ) || is_singular( 'service' ) || is_tax( 'service_direction' );

$mega_menu_eyebrow     = argokov_option( 'mega_menu_eyebrow', 'Услуги' );
$mega_menu_title       = argokov_option( 'mega_menu_title', 'Разработка и поддержка сайтов' );
$mega_menu_all_label   = argokov_option( 'mega_menu_all_label', 'Все услуги' );
$mega_menu_cta_eyebrow = argokov_option( 'mega_menu_cta_eyebrow', 'Не знаешь, что выбрать?' );
$mega_menu_cta_title   = argokov_option( 'mega_menu_cta_title', 'Разберём задачу и подскажем, с чего начать' );
$mega_menu_cta_text    = argokov_option( 'mega_menu_cta_text', 'Пришли ссылку на сайт или коротко опиши задачу. Сначала изучим проект, потом предложим решение.' );
$mega_menu_cta_button  = argokov_option( 'mega_menu_cta_button', 'Получить консультацию' );
$mega_menu_cta_note    = argokov_option( 'mega_menu_cta_note', 'Можно обратиться даже без готового ТЗ' );

$primary_menu = array(
	array(
		'url'      => '/services/',
		'label'    => 'Услуги',
		'children' => array(
			array( 'url' => '/services/development/', 'label' => 'Разработка' ),
			array( 'url' => '/services/support/', 'label' => 'Поддержка' ),
		),
	),
	array( 'url' => '/cases/', 'label' => 'Кейсы' ),
	array( 'url' => '/process/', 'label' => 'Как работаем' ),
	array( 'url' => '/materials/', 'label' => 'Статьи' ),
	array( 'url' => '/faq/', 'label' => 'Вопросы' ),
	array( 'url' => '/about/', 'label' => 'Студия' ),
	array( 'url' => '/contacts/', 'label' => 'Контакты' ),
);

$mobile_menu = $primary_menu;

$primary_links = argokov_menu_top_level_links( 'primary', $primary_menu );
$mobile_links  = argokov_menu_top_level_links( 'mobile', $mobile_menu );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		(() => {
			const key = "argokov-color-theme";
			let theme;
			try {
				const saved = localStorage.getItem(key);
				theme = saved === "light" || saved === "dark"
					? saved
					: matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark";
			} catch {
				theme = matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark";
			}
			document.documentElement.dataset.theme = theme;
			document.documentElement.style.colorScheme = theme;
		})();
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="site-shell">
	<div class="site-shell__ambient" aria-hidden="true"></div>
	<div class="site-shell__container">
		<header class="site-header surface">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="Аргоков — на главную">
				<svg aria-hidden="true" class="brand__mark" viewBox="0 0 48 48" fill="none">
					<path class="brand__mark-shape" d="M24 3 43 25h-8.6L24 12.8 13.6 25H5L24 3Z"></path>
					<path class="brand__mark-shape" d="m3 44 12.9-15.6 8.1 7.9V46l-6.2-6.1-3.4-3.3L8.7 44H3Z"></path>
					<path class="brand__mark-shape" d="m45 44-12.9-15.6-8.1 7.9V46l6.2-6.1 3.4-3.3 5.7 7.4H45Z"></path>
					<circle class="brand__mark-core" cx="24" cy="25" r="5.2"></circle>
				</svg>
				<span class="brand__copy"><span class="brand__name"><?php echo esc_html( get_bloginfo( 'name' ) ?: 'Аргоков' ); ?><span>.</span></span><span class="brand__description"><?php echo esc_html( get_bloginfo( 'description' ) ?: 'Разработка и поддержка сайтов' ); ?></span></span>
			</a>

			<nav class="site-nav" aria-label="Основная навигация">
				<?php foreach ( $primary_links as $menu_link ) : ?>
					<?php if ( argokov_is_services_menu_url( $menu_link['url'] ?? '' ) ) : ?>
						<div class="site-nav__mega-item<?php echo $services_menu_active ? ' is-current' : ''; ?>">
							<a class="site-nav__mega-trigger" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ?: home_url( '/services/' ) ); ?>" aria-haspopup="true" aria-expanded="false"<?php if ( $services_menu_active ) : ?> aria-current="page"<?php endif; ?>>
								<?php echo esc_html( $menu_link['label'] ?: 'Услуги' ); ?>
								<svg class="site-nav__chevron" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4"></path></svg>
							</a>

							<div class="site-nav__mega" aria-label="Меню услуг">
								<div class="site-nav__mega-main">
									<div class="site-nav__mega-heading">
										<div>
											<span><?php echo esc_html( $mega_menu_eyebrow ); ?></span>
											<strong><?php echo esc_html( $mega_menu_title ); ?></strong>
										</div>
										<a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ?: home_url( '/services/' ) ); ?>"><?php echo esc_html( $mega_menu_all_label ); ?>
											<svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg>
										</a>
									</div>

									<div class="site-nav__mega-groups">
										<?php foreach ( $service_mega_menu as $group ) : ?>
											<section class="site-nav__mega-group">
												<a class="site-nav__mega-group-title" href="<?php echo esc_url( $group['url'] ?? home_url( '/services/' ) ); ?>">
													<?php echo esc_html( $group['title'] ?? 'Услуги' ); ?>
													<svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg>
												</a>

												<?php if ( ! empty( $group['services'] ) ) : ?>
													<div class="site-nav__mega-links">
														<?php foreach ( $group['services'] as $service_item ) : ?>
															<a href="<?php echo esc_url( $service_item['url'] ?? '#' ); ?>"><?php echo esc_html( $service_item['title'] ?? '' ); ?></a>
														<?php endforeach; ?>
													</div>
												<?php endif; ?>

												<?php if ( ! empty( $group['total'] ) && (int) $group['total'] > count( $group['services'] ?? array() ) ) : ?>
													<a class="site-nav__mega-more" href="<?php echo esc_url( $group['url'] ?? home_url( '/services/' ) ); ?>">Ещё <?php echo esc_html( (int) $group['total'] - count( $group['services'] ?? array() ) ); ?> услуг</a>
												<?php endif; ?>
											</section>
										<?php endforeach; ?>
									</div>
								</div>

								<aside class="site-nav__mega-cta">
									<span class="site-nav__mega-cta-label"><?php echo esc_html( $mega_menu_cta_eyebrow ); ?></span>
									<strong><?php echo esc_html( $mega_menu_cta_title ); ?></strong>
									<p><?php echo esc_html( $mega_menu_cta_text ); ?></p>
									<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( $mega_menu_cta_button ); ?>
										<svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg>
									</a>
									<small><?php echo esc_html( $mega_menu_cta_note ); ?></small>
								</aside>
							</div>
						</div>
					<?php else : ?>
						<a href="<?php echo esc_url( $menu_link['url'] ?? '#' ); ?>"<?php if ( argokov_menu_url_is_current( $menu_link['url'] ?? '' ) ) : ?> aria-current="page"<?php endif; ?>><?php echo esc_html( $menu_link['label'] ?? '' ); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</nav>
			<div class="site-header__right">
				<div class="site-header__info">
					<div class="site-header__location">
						<span><?php echo esc_html( $location_short ); ?></span><span class="availability"><span class="availability__dot" aria-hidden="true"></span><?php echo esc_html( $availability ); ?></span>
					</div>
					<div class="site-header__contacts">
						<a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
					</div>
				</div>

				<div class="site-header__actions">
					<a class="button button--compact" href="#contact" data-contact-modal="true">
						<span class="button__label button__label--desktop">Обсудить задачу</span><span class="button__label button__label--mobile">Обсудить</span>
						<svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg>
					</a>

					<details class="mobile-nav">
						<summary aria-label="Открыть меню"><span></span><span></span><span></span></summary>
						<div class="mobile-nav__panel surface">
							<nav aria-label="Мобильная навигация">
								<?php foreach ( $mobile_links as $menu_link ) : ?>
									<?php if ( argokov_is_services_menu_url( $menu_link['url'] ?? '' ) ) : ?>
										<details class="mobile-nav__services">
											<summary>
												<span><?php echo esc_html( $menu_link['label'] ?: 'Услуги' ); ?></span>
												<svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="m4 6 4 4 4-4"></path></svg>
											</summary>
											<div class="mobile-nav__service-groups">
												<?php foreach ( $service_mega_menu as $group ) : ?>
													<div class="mobile-nav__service-group">
														<a class="mobile-nav__service-title" href="<?php echo esc_url( $group['url'] ?? home_url( '/services/' ) ); ?>"><?php echo esc_html( $group['title'] ?? '' ); ?></a>
														<?php foreach ( $group['services'] ?? array() as $service_item ) : ?>
															<a class="mobile-nav__service-link" href="<?php echo esc_url( $service_item['url'] ?? '#' ); ?>"><?php echo esc_html( $service_item['title'] ?? '' ); ?></a>
														<?php endforeach; ?>
													</div>
												<?php endforeach; ?>
												<a class="mobile-nav__all-services" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ?: home_url( '/services/' ) ); ?>"><?php echo esc_html( $mega_menu_all_label ); ?></a>
											</div>
										</details>
									<?php else : ?>
										<a href="<?php echo esc_url( $menu_link['url'] ?? '#' ); ?>"<?php if ( argokov_menu_url_is_current( $menu_link['url'] ?? '' ) ) : ?> aria-current="page"<?php endif; ?>><?php echo esc_html( $menu_link['label'] ?? '' ); ?></a>
									<?php endif; ?>
								<?php endforeach; ?>
							</nav>
							<div class="mobile-nav__meta">
								<span><?php echo esc_html( $location_full ); ?></span><span class="availability"><span class="availability__dot" aria-hidden="true"></span><?php echo esc_html( $availability_full ); ?></span><a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
							</div>
						</div>
					</details>
				</div>
			</div>
		</header>
