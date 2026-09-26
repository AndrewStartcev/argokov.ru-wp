<?php
/**
 * Site header.
 *
 * @package Argokov
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
				<a href="/services/">Услуги</a><a href="/development/">Разработка</a><a href="/support/">Поддержка</a><a href="/cases/">Кейсы</a><a href="/materials/">Статьи</a><a href="/about/">Студия</a><a href="/contacts/">Контакты</a>
			</nav>

			<div class="site-header__right">
				<div class="site-header__info">
					<div class="site-header__location">
						<span>Иркутск · вся Россия</span><span class="availability"><span class="availability__dot" aria-hidden="true"></span>Обращения 24/7</span>
					</div>
					<div class="site-header__contacts">
						<a href="tel:+79990000000">+7 999 000-00-00</a><a href="mailto:mail@argokov.ru">mail@argokov.ru</a>
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
								<a href="/services/">Услуги</a><a href="/development/">Разработка</a><a href="/support/">Поддержка</a><a href="/materials/">Статьи</a><a href="/cases/">Кейсы</a><a href="/about/">О студии</a><a href="/process/">Как работаем</a><a href="/faq/">Частые вопросы</a><a href="/contacts/">Контакты</a>
							</nav>
							<div class="mobile-nav__meta">
								<span>Иркутск · работаем по всей России</span><span class="availability"><span class="availability__dot" aria-hidden="true"></span>Принимаем обращения 24/7</span><a href="tel:+79990000000">+7 999 000-00-00</a><a href="mailto:mail@argokov.ru">mail@argokov.ru</a>
							</div>
						</div>
					</details>
				</div>
			</div>
		</header>
