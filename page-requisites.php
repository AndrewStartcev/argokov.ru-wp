<?php
/**
 * Requisites page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$groups       = argokov_rows( 'req_groups', array() );
	$operator     = argokov_option( 'site_operator_name', 'ИП Андрей Старцев' );
	$email        = argokov_option( 'site_email', 'mail@argokov.ru' );
	$phone        = argokov_option( 'site_phone', '+7 999 000-00-00' );
	$location     = argokov_option( 'site_location_short', 'Иркутск · вся Россия' );
	?>
	<section class="requisites-hero surface">
		<div class="requisites-hero__content">
			<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span></nav>
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'req_hero_eyebrow', 'Документы и оплата' ) ); ?></p>
			<h1><?php echo esc_html( argokov_field( 'req_hero_title', 'Реквизиты' ) ); ?> <span><?php echo esc_html( argokov_field( 'req_hero_title_accent', 'студии «Аргоков»' ) ); ?></span></h1>
			<p><?php echo esc_html( argokov_field( 'req_hero_text', 'Данные для заключения договора, выставления счёта и проведения оплаты. Актуальную карточку предприятия можно скачать в удобном формате.' ) ); ?></p>
		</div>

		<div class="requisites-hero__identity" aria-label="Краткие данные компании">
			<span class="requisites-hero__mark" aria-hidden="true">А</span>
			<div>
				<small><?php echo esc_html( argokov_field( 'req_identity_type', 'Юридическое лицо' ) ); ?></small>
				<strong><?php echo esc_html( $operator ); ?></strong>
				<p>Студия разработки и поддержки сайтов</p>
			</div>
			<span class="requisites-hero__verified"><i aria-hidden="true"></i><?php echo esc_html( argokov_field( 'req_identity_note', 'Работаем официально' ) ); ?></span>
		</div>
	</section>

	<section class="company-details surface" aria-label="Реквизиты компании">
		<div class="company-details__main">
			<?php foreach ( $groups as $index => $group ) : ?>
				<?php $items = isset( $group['items'] ) && is_array( $group['items'] ) ? $group['items'] : array(); ?>
				<section class="company-details__group" aria-labelledby="details-<?php echo esc_attr( $index + 1 ); ?>">
					<header><span><?php echo esc_html( $group['number'] ?? sprintf( '%02d', $index + 1 ) ); ?></span><h2 id="details-<?php echo esc_attr( $index + 1 ); ?>"><?php echo esc_html( $group['title'] ?? '' ); ?></h2></header>
					<dl>
						<?php foreach ( $items as $item ) : ?>
							<?php
							$label = $item['label'] ?? '';
							$value = $item['value'] ?? '';

							if ( '{email}' === $value ) {
								$value_html = '<a href="' . esc_url( 'mailto:' . sanitize_email( $email ) ) . '">' . esc_html( $email ) . '</a>';
							} elseif ( '{phone}' === $value ) {
								$value_html = '<a href="' . esc_url( 'tel:' . argokov_phone_href( $phone ) ) . '">' . esc_html( $phone ) . '</a>';
							} elseif ( '{location}' === $value ) {
								$value_html = esc_html( $location );
							} elseif ( '{operator}' === $value ) {
								$value_html = esc_html( $operator );
							} else {
								$value_html = esc_html( $value );
							}
							?>
							<div><dt><?php echo esc_html( $label ); ?></dt><dd><?php echo wp_kses_post( $value_html ); ?></dd></div>
						<?php endforeach; ?>
					</dl>
				</section>
			<?php endforeach; ?>
		</div>

		<aside class="company-documents">
			<div class="company-documents__sheet" aria-hidden="true"><span>АРГОКОВ</span><strong>Карточка<br>предприятия</strong><small>PDF · DOCX</small></div>
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'req_docs_eyebrow', 'Файлы для бухгалтерии' ) ); ?></p>
			<h2><?php echo esc_html( argokov_field( 'req_docs_title', 'Скачать карточку предприятия' ) ); ?></h2>
			<p><?php echo esc_html( argokov_field( 'req_docs_text', 'Все реквизиты в одном документе — для договора, счёта или добавления контрагента.' ) ); ?></p>

			<div class="company-documents__links">
				<?php $pdf = argokov_field( 'req_pdf_url', '' ); ?>
				<?php $docx = argokov_field( 'req_docx_url', '' ); ?>
				<?php if ( $pdf ) : ?><a class="button" href="<?php echo esc_url( $pdf ); ?>" download><span><strong>Скачать PDF</strong><small>для просмотра и печати</small></span><svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?>
				<?php if ( $docx ) : ?><a href="<?php echo esc_url( $docx ); ?>" download><span><strong>Скачать DOCX</strong><small>редактируемый документ</small></span><svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a><?php endif; ?>
			</div>

			<div class="company-documents__note"><span><?php echo esc_html( argokov_field( 'req_docs_note_title', 'Актуальность данных' ) ); ?></span><p><?php echo esc_html( argokov_field( 'req_docs_note_text', 'Перед оплатой рекомендуем сверять реквизиты со счётом или договором.' ) ); ?></p></div>
		</aside>
	</section>

	<section class="requisites-help surface">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'req_cta_eyebrow', 'Нужен документ' ) ); ?></p><h2><?php echo esc_html( argokov_field( 'req_cta_title', 'Не нашли нужные данные?' ) ); ?></h2><p><?php echo esc_html( argokov_field( 'req_cta_text', 'Напиши нам — отправим карточку предприятия или подготовим документы для бухгалтерии.' ) ); ?></p></div>
		<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'req_cta_button_label', 'Написать нам' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</section>
	<?php
endwhile;

get_footer();
