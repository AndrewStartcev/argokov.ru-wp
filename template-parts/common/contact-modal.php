<?php
/**
 * Shared contact modal.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

$form = argokov_contact_form_shortcode();
?>
<div class="contact-modal" id="contact-modal" role="presentation" hidden>
	<section class="contact-modal__panel" role="dialog" aria-modal="true" aria-labelledby="contact-modal-title">
		<header class="contact-modal__header">
			<div>
				<p class="section-eyebrow"><?php echo esc_html( argokov_option( 'contact_modal_eyebrow', 'Обсудить задачу' ) ); ?></p>
				<h2 id="contact-modal-title"><?php echo esc_html( argokov_option( 'contact_modal_title', 'Расскажите о проекте' ) ); ?></h2>
				<p><?php echo esc_html( argokov_option( 'contact_modal_text', 'Можно отправить ссылку, описание или готовое техническое задание. Изучим и предложим следующий шаг.' ) ); ?></p>
			</div>
			<button class="contact-modal__close" type="button" aria-label="Закрыть форму">
				<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m7 7 10 10M17 7 7 17"></path></svg>
			</button>
		</header>

		<div class="contact-modal__form">
			<?php if ( $form ) : ?>
				<?php echo do_shortcode( $form ); ?>
			<?php else : ?>
				<p>Форма настраивается. Пока можно написать на <a href="<?php echo esc_url( 'mailto:' . sanitize_email( argokov_option( 'site_email', 'mail@argokov.ru' ) ) ); ?>"><?php echo esc_html( argokov_option( 'site_email', 'mail@argokov.ru' ) ); ?></a>.</p>
			<?php endif; ?>
		</div>
	</section>
</div>
