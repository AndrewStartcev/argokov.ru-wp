<?php
/**
 * Contacts page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$phone        = argokov_option( 'site_phone', '+7 999 000-00-00' );
	$email        = argokov_option( 'site_email', 'mail@argokov.ru' );
	$location     = argokov_option( 'site_location_short', 'Иркутск · вся Россия' );
	$availability = argokov_option( 'site_availability_full', 'Принимаем обращения 24/7' );
	$form         = trim( (string) argokov_option( 'site_contact_form_shortcode', '' ) );
	$links        = argokov_rows(
		'contacts_links',
		array(
			array( 'label' => 'Услуги', 'url' => '/services/' ),
			array( 'label' => 'Кейсы', 'url' => '/cases/' ),
			array( 'label' => 'Как работаем', 'url' => '/process/' ),
			array( 'label' => 'Частые вопросы', 'url' => '/faq/' ),
		)
	);
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span></nav>
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'contacts_hero_eyebrow', 'Контакты' ) ); ?></p>
		<h1><?php echo esc_html( argokov_field( 'contacts_hero_title', 'Расскажи о задаче' ) ); ?> <span><?php echo esc_html( argokov_field( 'contacts_hero_title_accent', 'удобным способом' ) ); ?></span></h1>
		<p><?php echo esc_html( argokov_field( 'contacts_hero_text', 'Работаем из Иркутска с проектами по всей России. Можно прислать ссылку, описание проблемы, макет или готовое техническое задание.' ) ); ?></p>
	</section>

	<section class="contacts-page surface">
		<div class="contacts-page__methods">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'contacts_main_eyebrow', 'Связаться напрямую' ) ); ?></p>
			<h2><?php echo esc_html( argokov_field( 'contacts_main_title', 'Андрей ответит лично' ) ); ?></h2>
			<div>
				<a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><span>Телефон</span><strong><?php echo esc_html( $phone ); ?></strong></a>
				<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><span>Почта</span><strong><?php echo esc_html( $email ); ?></strong></a>
				<span><small>Город</small><strong><?php echo esc_html( $location ); ?></strong></span>
				<span><small>Обращения</small><strong><?php echo esc_html( $availability ); ?></strong></span>
			</div>
			<?php $note = argokov_field( 'contacts_main_note', '' ); ?>
			<?php if ( $note ) : ?><p><?php echo esc_html( $note ); ?></p><?php endif; ?>
		</div>

		<?php if ( $form ) : ?>
			<?php echo do_shortcode( $form ); ?>
		<?php else : ?>
			<form class="contact__form" aria-label="Форма для обсуждения задачи">
				<div class="contact-form__row">
					<label class="contact-form__field"><span>Имя</span><input type="text" autocomplete="name" placeholder="Как к вам обращаться" name="name"></label>
					<label class="contact-form__field"><span>Телефон</span><input type="tel" autocomplete="tel" placeholder="+7 999 000-00-00" required name="phone"></label>
				</div>
				<label class="contact-form__field"><span>Описание задачи</span><textarea name="task" rows="5" placeholder="Ссылка на сайт, что нужно сделать и какой результат хотите получить" required></textarea></label>
				<label class="contact-form__file"><span>Прикрепить файл</span><small>PDF, DOCX, XLSX, JPG, PNG или ZIP · до 10 МБ</small><input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.zip" name="file"></label>
				<label class="contact-form__consent"><input type="checkbox" required name="consent"><span>Даю <a href="<?php echo esc_url( home_url( '/consent/' ) ); ?>">согласие на обработку персональных данных</a> и подтверждаю, что ознакомлен с <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">политикой обработки персональных данных</a>.</span></label>
				<div class="contact-form__submit"><button class="button" type="button">Отправить задачу <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></button><p>Ответим, уточним детали и предложим следующий шаг.</p></div>
			</form>
		<?php endif; ?>
	</section>

	<section class="contacts-links surface">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'contacts_links_eyebrow', 'Перед обращением' ) ); ?></p><h2><?php echo esc_html( argokov_field( 'contacts_links_title', 'Можно сначала изучить подход' ) ); ?></h2></div>
		<nav>
			<?php foreach ( $links as $link ) : ?>
				<a href="<?php echo esc_url( home_url( $link['url'] ?? '/' ) ); ?>"><?php echo esc_html( $link['label'] ?? '' ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			<?php endforeach; ?>
		</nav>
	</section>
	<?php
endwhile;

get_footer();
