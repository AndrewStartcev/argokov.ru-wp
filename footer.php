<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

$location        = argokov_option( 'site_location_short', 'Иркутск · вся Россия' );
$availability    = argokov_option( 'site_availability_full', 'Принимаем обращения 24/7' );
$phone           = argokov_option( 'site_phone', '+7 999 000-00-00' );
$email           = argokov_option( 'site_email', 'mail@argokov.ru' );
$telegram_url    = argokov_option( 'site_telegram_url', '' );
$vk_url          = argokov_option( 'site_vk_url', '' );
$description     = argokov_option( 'site_footer_description', 'Разрабатываем новые сайты, поддерживаем существующие и берёмся за сложные доработки.' );
$operator_name   = argokov_option( 'site_operator_name', 'ИП Андрей Старцев' );
$operator_detail = argokov_option( 'site_operator_details', 'ИНН и ОГРНИП добавим перед запуском' );

$footer_services = array(
	array( '/services/', 'Все услуги' ),
	array( '/development/', 'Разработка сайтов' ),
	array( '/support/', 'Поддержка сайтов' ),
	array( '/#improvements', 'Доработка сайтов' ),
	array( '/development/#types', 'Интернет-магазины' ),
	array( '/development/#included', 'Интеграции' ),
	array( '/development/#seo', 'Техническое SEO' ),
	array( '/#improvements', 'Сложные проекты' ),
);

$footer_studio = array(
	array( '/cases/', 'Кейсы' ),
	array( '/about/', 'О студии' ),
	array( '/process/', 'Как работаем' ),
	array( '/materials/', 'Материалы' ),
	array( '/faq/', 'Частые вопросы' ),
	array( '/contacts/', 'Контакты' ),
);
?>
		<footer class="site-footer surface">
			<div class="site-footer__modules">
				<section class="footer-module site-footer__brand">
					<div class="site-footer__brand-heading">
						<svg aria-hidden="true" class="site-footer__brand-mark" viewBox="0 0 48 48" fill="none">
							<path d="M24 3 43 25h-8.6L24 12.8 13.6 25H5L24 3Z"></path>
							<path d="m3 44 12.9-15.6 8.1 7.9V46l-6.2-6.1-3.4-3.3L8.7 44H3Z"></path>
							<path d="m45 44-12.9-15.6-8.1 7.9V46l6.2-6.1 3.4-3.3 5.7 7.4H45Z"></path>
							<circle cx="24" cy="25" r="5.2"></circle>
						</svg>
						<div><strong><?php echo esc_html( get_bloginfo( 'name' ) ?: 'Аргоков' ); ?><span>.</span></strong><small><?php echo esc_html( get_bloginfo( 'description' ) ?: 'Разработка и поддержка сайтов' ); ?></small></div>
					</div>
					<p><?php echo esc_html( $description ); ?></p>
					<div class="site-footer__brand-meta">
						<span><?php echo esc_html( $location ); ?></span><span class="availability"><span class="availability__dot" aria-hidden="true"></span><?php echo esc_html( $availability ); ?></span>
					</div>
				</section>

				<nav class="footer-module site-footer__nav site-footer__nav--services" aria-label="Услуги">
					<span class="footer-module__title">Услуги</span>
					<div><?php argokov_render_flat_menu( 'footer_services', $footer_services ); ?></div>
				</nav>

				<nav class="footer-module site-footer__nav site-footer__nav--studio" aria-label="Студия">
					<span class="footer-module__title">Студия</span>
					<div><?php argokov_render_flat_menu( 'footer_studio', $footer_studio ); ?></div>
				</nav>

				<section class="footer-module site-footer__contacts">
					<span class="footer-module__title">Связаться</span>
					<div class="site-footer__contacts-main">
						<span>Напишите удобным способом</span><a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
					</div>
					<div class="site-footer__messengers" aria-label="Мессенджеры и социальные сети">
						<span><?php if ( $telegram_url ) : ?><a href="<?php echo esc_url( $telegram_url ); ?>" target="_blank" rel="noopener noreferrer">Telegram</a><?php else : ?>Telegram<?php endif; ?></span>
						<span><?php if ( $vk_url ) : ?><a href="<?php echo esc_url( $vk_url ); ?>" target="_blank" rel="noopener noreferrer">ВКонтакте</a><?php else : ?>ВКонтакте<?php endif; ?></span>
					</div>
					<a class="site-footer__contact-link" href="#contact" data-contact-modal="true">Обсудить задачу
						<svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg>
					</a>
				</section>
			</div>

			<div class="site-footer__legal">
				<div class="site-footer__operator">
					<span>Оператор сайта</span><strong><?php echo esc_html( $operator_name ); ?></strong><small><?php echo esc_html( $operator_detail ); ?></small>
				</div>
				<div class="site-footer__documents" aria-label="Юридическая информация">
					<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">Политика обработки персональных данных</a><a href="<?php echo esc_url( home_url( '/consent/' ) ); ?>">Согласие на обработку персональных данных</a><a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>">Использование cookie</a><a href="<?php echo esc_url( home_url( '/requisites/' ) ); ?>">Реквизиты</a>
				</div>
				<div class="site-footer__copyright">
					<span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Аргоков</span><span>Сайты с ответственностью за результат</span>
				</div>
			</div>
		</footer>
	</div>

	<button type="button" class="theme-toggle" aria-label="Включить светлую тему" aria-pressed="false">
		<svg class="theme-toggle__sun" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="3.3"></circle><path d="M12 2.8v2M12 19.2v2M2.8 12h2M19.2 12h2M5.5 5.5l1.4 1.4M17.1 17.1l1.4 1.4M18.5 5.5l-1.4 1.4M6.9 17.1l-1.4 1.4"></path></svg>
		<svg class="theme-toggle__moon" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19.2 15.1A7.8 7.8 0 0 1 8.9 4.8 7.8 7.8 0 1 0 19.2 15.1Z"></path></svg>
	</button>
	<button type="button" class="scroll-top" aria-label="Вернуться в начало страницы">
		<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m7 14 5-5 5 5"></path></svg>
	</button>
</main>

<?php get_template_part( 'template-parts/common/contact-modal' ); ?>
<?php wp_footer(); ?>
</body>
</html>
