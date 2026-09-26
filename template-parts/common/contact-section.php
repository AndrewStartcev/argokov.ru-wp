<?php
/**
 * Shared contact section.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

$eyebrow  = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : 'Начнём с задачи';
$title    = isset( $args['title'] ) ? (string) $args['title'] : 'Расскажите, что нужно сделать';
$text     = isset( $args['text'] ) ? (string) $args['text'] : '';
$title_id = isset( $args['title_id'] ) ? sanitize_html_class( $args['title_id'] ) : 'contact-title';

$phone        = argokov_option( 'site_phone', '+7 999 000-00-00' );
$email        = argokov_option( 'site_email', 'mail@argokov.ru' );
$location     = argokov_option( 'site_location_full', 'Иркутск · работаем по всей России' );
$availability = argokov_option( 'site_availability_full', 'Принимаем обращения 24/7' );
$form         = argokov_contact_form_shortcode();
?>
<section class="contact surface" id="contact" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
	<div class="contact__main">
		<p class="section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<h2 id="<?php echo esc_attr( $title_id ); ?>"><?php echo esc_html( $title ); ?></h2>
		<?php if ( $text ) : ?><p><?php echo esc_html( $text ); ?></p><?php endif; ?>

		<div class="contact__direct">
			<a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><span>Телефон</span><strong><?php echo esc_html( $phone ); ?></strong></a>
			<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><span>Почта</span><strong><?php echo esc_html( $email ); ?></strong></a>
		</div>

		<div class="contact__location">
			<i aria-hidden="true"></i><span><?php echo esc_html( $location ); ?></span><span><?php echo esc_html( $availability ); ?></span>
		</div>
	</div>

	<?php if ( $form ) : ?>
		<?php echo do_shortcode( $form ); ?>
	<?php else : ?>
		<div class="contact__form contact__form--unavailable">
			<p><strong>Форма временно недоступна.</strong></p>
			<p>Напиши на <a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a> или позвони по номеру <a href="<?php echo esc_url( 'tel:' . argokov_phone_href( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>.</p>
		</div>
	<?php endif; ?>
</section>
