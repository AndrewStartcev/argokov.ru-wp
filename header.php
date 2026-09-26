<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$location_short    = argokov_option( 'site_location_short', 'Иркутск · вся Россия' );
$location_full     = argokov_option( 'site_location_full', 'Иркутск · работаем по всей России' );
$availability      = argokov_option( 'site_availability_short', 'Обращения 24/7' );
$availability_full = argokov_option( 'site_availability_full', 'Принимаем обращения 24/7' );
$phone             = argokov_option( 'site_phone', '+7 999 000-00-00' );
$email             = argokov_option( 'site_email', 'mail@argokov.ru' );

$primary_menu = array(
	array( '/services/', 'Услуги' ),
	array( '/development/', 'Разработка' ),
	array( '/support/', 'Поддержка' ),
	array( '/cases/', 'Кейсы' ),
	array( '/materials/', 'Статьи' ),
	array( '/about/', 'Студия' ),
	array( '/contacts/', 'Контакты' ),
);

$mobile_menu = array(
	array( '/services/', 'Услуги' ),
	array( '/development/', 'Разработка' ),
	array( '/support/', 'Поддержка' ),
	array( '/materials/', 'Статьи' ),
	array( '/cases/', 'Кейсы' ),
	array( '/about/', 'О студии' ),
	array( '/process/', 'Как работаем' ),
	array( '/faq/', 'Частые вопросы' ),
	array( '/contacts/', 'Контакты' ),
);
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ); ?>" type="image/svg+xml">
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
				<span class="brand__copy"><span class="brand__name">Аргоков<span>.</span></span><span class="brand__description">Разработка и поддержка сайтов</span></span>
			</a>

			<nav class="site-nav" aria-label="Основная навигация">
				<?php argokov_render_flat_menu( 'primary', $primary_menu ); ?>
			</nav>

			<div class="site-header__right">
				<div class="site-header__info">
					<div class="site-header__location">
						<span><?php echo esc_html( $location_short ); ?></span><span class="availability"><span class="availability__dot" aria-hidden="true"></span><?php echo esc_html( $availability ); ?></span>
					</div>
					<div class="site-header__contacts">
						<a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a>
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
								<?php argokov_render_flat_menu( 'mobile', $mobile_menu ); ?>
							</nav>
							<div class="mobile-nav__meta">
								<span><?php echo esc_html( $location_full ); ?></span><span class="availability"><span class="availability__dot" aria-hidden="true"></span><?php echo esc_html( $availability_full ); ?></span><a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a>
							</div>
						</div>
					</details>
				</div>
			</div>
		</header>
