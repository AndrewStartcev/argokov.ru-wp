<?php
/**
 * Shared Contact Form 7 setup.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

/**
 * Keep the exact BEM markup from the form template.
 * CF7 wpautop inserts <p>/<br> and breaks the two-column layout.
 */
add_filter( 'wpcf7_autop_or_not', '__return_false' );

function argokov_contact_form_shortcode() {
	return trim( (string) argokov_option( 'site_contact_form_shortcode', '' ) );
}

function argokov_seed_contact_form() {
	if ( ! is_admin() || wp_doing_ajax() || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( ! function_exists( 'wpcf7_save_contact_form' ) || ! function_exists( 'update_field' ) ) {
		return;
	}

	if ( argokov_contact_form_shortcode() ) {
		return;
	}

	$form_id = (int) get_option( 'argokov_contact_form_id', 0 );

	if ( $form_id && 'wpcf7_contact_form' !== get_post_type( $form_id ) ) {
		$form_id = 0;
	}

	if ( ! $form_id ) {
		$existing = get_posts(
			array(
				'post_type'      => 'wpcf7_contact_form',
				'post_status'    => 'any',
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'meta_key'       => '_argokov_base_contact_form',
				'meta_value'     => '1',
				'no_found_rows'  => true,
			)
		);

		if ( $existing ) {
			$form_id = (int) $existing[0];
		}
	}

	if ( ! $form_id ) {
		$consent_url = home_url( '/consent/' );
		$privacy_url = home_url( '/privacy/' );

		$form_markup = '
<div class="contact-form__row">
	<label class="contact-form__field"><span>Имя</span>[text your-name autocomplete:name placeholder "Как к вам обращаться"]</label>
	<label class="contact-form__field"><span>Телефон</span>[tel* your-phone autocomplete:tel placeholder "+7 999 000-00-00"]</label>
</div>
<label class="contact-form__field"><span>Описание задачи</span>[textarea* your-task placeholder "Ссылка на сайт, что нужно сделать и какой результат хотите получить"]</label>
<label class="contact-form__file"><span>Прикрепить файл</span><small>PDF, DOCX, XLSX, JPG, PNG или ZIP · до 10 МБ</small>[file project-file limit:10mb filetypes:pdf|doc|docx|xls|xlsx|jpg|jpeg|png|zip]</label>
<div class="contact-form__consent">[acceptance privacy-consent]Даю <a href="' . esc_url( $consent_url ) . '">согласие на обработку персональных данных</a> и подтверждаю, что ознакомлен с <a href="' . esc_url( $privacy_url ) . '">политикой обработки персональных данных</a>.[/acceptance]</div>
<div class="contact-form__submit">[submit class:button "Отправить задачу"]<p>Ответим, уточним детали и предложим следующий шаг.</p></div>';

		$recipient = sanitize_email( get_option( 'admin_email' ) );

		$contact_form = wpcf7_save_contact_form(
			array(
				'id'     => -1,
				'title'  => 'Основная форма — Аргоков',
				'locale' => 'ru_RU',
				'form'   => $form_markup,
				'mail'   => array(
					'active'             => true,
					'subject'            => 'Новая заявка с сайта Аргоков',
					'sender'             => 'Аргоков <wordpress@[_site_domain]>',
					'recipient'          => $recipient,
					'body'               => "Имя: [your-name]\nТелефон: [your-phone]\n\nОписание задачи:\n[your-task]\n\nСтраница: [_url]",
					'additional_headers' => '',
					'attachments'        => '[project-file]',
					'use_html'           => false,
					'exclude_blank'      => false,
				),
				'additional_settings' => '',
			)
		);

		if ( $contact_form && method_exists( $contact_form, 'id' ) ) {
			$form_id = (int) $contact_form->id();

			if ( $form_id ) {
				update_post_meta( $form_id, '_argokov_base_contact_form', '1' );
				update_option( 'argokov_contact_form_id', $form_id );
			}
		}
	}

	if ( $form_id ) {
		$shortcode = sprintf(
			'[contact-form-7 id="%d" title="Основная форма — Аргоков" html_class="contact__form"]',
			$form_id
		);

		update_field( 'site_contact_form_shortcode', $shortcode, 'option' );
	}
}
add_action( 'admin_init', 'argokov_seed_contact_form', 60 );
