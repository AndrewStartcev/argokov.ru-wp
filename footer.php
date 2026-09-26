<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
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
						<div><strong>Аргоков<span>.</span></strong><small>Разработка и поддержка сайтов</small></div>
					</div>
					<p>Разрабатываем новые сайты, поддерживаем существующие и берёмся за сложные доработки.</p>
					<div class="site-footer__brand-meta">
						<span>Иркутск · вся Россия</span><span class="availability"><span class="availability__dot" aria-hidden="true"></span>Принимаем обращения 24/7</span>
					</div>
				</section>

				<nav class="footer-module site-footer__nav site-footer__nav--services" aria-label="Услуги">
					<span class="footer-module__title">Услуги</span>
					<div>
						<a href="/services/">Все услуги</a><a href="/development/">Разработка сайтов</a><a href="/support/">Поддержка сайтов</a><a href="/#improvements">Доработка сайтов</a><a href="/development/#types">Интернет-магазины</a><a href="/development/#included">Интеграции</a><a href="/development/#seo">Техническое SEO</a><a href="/#improvements">Сложные проекты</a>
					</div>
				</nav>

				<nav class="footer-module site-footer__nav site-footer__nav--studio" aria-label="Студия">
					<span class="footer-module__title">Студия</span>
					<div>
						<a href="/cases/">Кейсы</a><a href="/about/">О студии</a><a href="/process/">Как работаем</a><a href="/materials/">Материалы</a><a href="/faq/">Частые вопросы</a><a href="/contacts/">Контакты</a>
					</div>
				</nav>

				<section class="footer-module site-footer__contacts">
					<span class="footer-module__title">Связаться</span>
					<div class="site-footer__contacts-main">
						<span>Напишите удобным способом</span><a href="tel:+79990000000">+7 999 000-00-00</a><a href="mailto:mail@argokov.ru">mail@argokov.ru</a>
					</div>
					<div class="site-footer__messengers" aria-label="Мессенджеры и социальные сети">
						<span>Telegram</span><span>ВКонтакте</span>
					</div>
					<a class="site-footer__contact-link" href="#contact" data-contact-modal="true">Обсудить задачу
						<svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg>
					</a>
				</section>
			</div>

			<div class="site-footer__legal">
				<div class="site-footer__operator">
					<span>Оператор сайта</span><strong>ИП Андрей Старцев</strong><small>ИНН и ОГРНИП добавим перед запуском</small>
				</div>
				<div class="site-footer__documents" aria-label="Юридическая информация">
					<a href="/privacy/">Политика обработки персональных данных</a><a href="/consent/">Согласие на обработку персональных данных</a><a href="/cookies/">Использование cookie</a><a href="/requisites/">Реквизиты</a>
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
<?php wp_footer(); ?>
</body>
</html>
