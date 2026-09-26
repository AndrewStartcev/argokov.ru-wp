<?php
defined( 'ABSPATH' ) || exit;

$phone             = argokov_option( 'site_phone', '+7 999 000-00-00' );
$email             = argokov_option( 'site_email', 'mail@argokov.ru' );
$location          = argokov_option( 'site_location_full', 'Иркутск · работаем по всей России' );
$availability      = argokov_option( 'site_availability_full', 'Принимаем обращения 24/7' );
$form_shortcode    = trim( (string) argokov_option( 'site_contact_form_shortcode', '' ) );
?>
<section class="contact surface" id="contact" aria-labelledby="contact-title">
	<div class="contact__main">
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_contact_eyebrow', 'Начнём с задачи' ) ); ?></p>
		<h2 id="contact-title"><?php echo esc_html( argokov_field( 'home_contact_title', 'Расскажите, что нужно сделать' ) ); ?></h2>
		<p><?php echo esc_html( argokov_field( 'home_contact_text', 'Можно прислать ссылку на сайт, кратко описать проблему или приложить готовое техническое задание. Изучим материалы, зададим уточняющие вопросы и предложим следующий шаг.' ) ); ?></p>

		<div class="contact__direct">
			<a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><span>Телефон</span><strong><?php echo esc_html( $phone ); ?></strong></a>
			<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><span>Почта</span><strong><?php echo esc_html( $email ); ?></strong></a>
		</div>

		<div class="contact__location">
			<i aria-hidden="true"></i><span><?php echo esc_html( $location ); ?></span><span><?php echo esc_html( $availability ); ?></span>
		</div>
	</div>

	<?php if ( $form_shortcode ) : ?>
		<?php echo do_shortcode( $form_shortcode ); ?>
	<?php else : ?>
		<form class="contact__form" aria-label="Форма для обсуждения задачи">
			<div class="contact-form__row">
				<label class="contact-form__field"><span>Имя</span><input type="text" autocomplete="name" placeholder="Как к вам обращаться" name="name"></label>
				<label class="contact-form__field"><span>Телефон</span><input type="tel" autocomplete="tel" placeholder="+7 999 000-00-00" required name="phone"></label>
			</div>

			<label class="contact-form__field"><span>Описание задачи</span><textarea name="task" rows="5" placeholder="Ссылка на сайт, что нужно сделать и какой результат хотите получить" required></textarea></label>

			<label class="contact-form__file"><span>Прикрепить файл</span><small>PDF, DOCX, XLSX, JPG, PNG или ZIP · до 10 МБ</small><input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.zip" name="file"></label>

			<label class="contact-form__consent"><input type="checkbox" required name="consent"><span>Даю <a href="<?php echo esc_url( home_url( '/consent/' ) ); ?>">согласие на обработку персональных данных</a> и подтверждаю, что ознакомлен с <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">политикой обработки персональных данных</a>.</span></label>

			<div class="contact-form__submit">
				<button class="button" type="button">Отправить задачу <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></button>
				<p>Ответим, уточним детали и предложим следующий шаг.</p>
			</div>
		</form>
	<?php endif; ?>
</section>
