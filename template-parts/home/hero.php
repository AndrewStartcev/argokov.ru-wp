<?php
defined( 'ABSPATH' ) || exit;

$layers = argokov_rows(
	'home_hero_layers',
	array(
		array( 'number' => '01', 'title' => 'Новый сайт', 'text' => 'Проектирование, дизайн, разработка и запуск', 'style' => 'interface' ),
		array( 'number' => '02', 'title' => 'Доработка', 'text' => 'Новый функционал, страницы и интеграции', 'style' => 'content' ),
		array( 'number' => '03', 'title' => 'Сложный проект', 'text' => 'Старые CMS, самописные решения и доисторический код', 'style' => 'connections' ),
		array( 'number' => '04', 'title' => 'Поддержка и развитие', 'text' => 'Исправления, обновления и задачи от SEO-команды', 'style' => 'support' ),
	)
);

$notes = argokov_rows(
	'home_hero_notes',
	array(
		array( 'text' => 'Погружаемся в проект' ),
		array( 'text' => 'знаем его целиком' ),
		array( 'text' => 'отвечаем за результат' ),
	)
);

$founder_name  = argokov_option( 'site_founder_name', 'Андрей Старцев' );
$founder_role  = argokov_option( 'site_founder_role', 'Основатель и ведущий разработчик' );
$founder_note  = argokov_option( 'site_founder_note', 'Лично отвечаю за архитектуру и качество проектов' );
$founder_photo = argokov_option( 'site_founder_photo', array() );
$founder_url   = argokov_image_url( $founder_photo, 'assets/images/andrey-startsev.png' );
?>
<section class="hero" aria-labelledby="hero-title">
	<article class="hero__content surface">
		<p class="eyebrow"><?php echo esc_html( argokov_field( 'home_hero_eyebrow', 'Разработка · поддержка · сложные доработки' ) ); ?></p>

		<h1 id="hero-title">
			<?php echo esc_html( argokov_field( 'home_hero_title', 'Разработка и поддержка сайтов' ) ); ?>
			<span><?php echo esc_html( argokov_field( 'home_hero_title_accent', 'для бизнеса' ) ); ?></span>
		</h1>

		<p class="hero__lead"><?php echo esc_html( argokov_field( 'home_hero_lead', 'Создаём новые сайты и берём на поддержку существующие — на любой CMS или с самописным кодом. Разбираемся даже в старых и сложных проектах, исправляем накопленные проблемы и развиваем дальше.' ) ); ?></p>

		<div class="hero__actions">
			<a class="button" href="#contact" data-contact-modal="true"><?php echo esc_html( argokov_field( 'home_hero_button_label', 'Обсудить задачу' ) ); ?><svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
		</div>

		<div class="hero__author">
			<img src="<?php echo esc_url( $founder_url ); ?>" alt="<?php echo esc_attr( $founder_name ); ?>" width="52" height="52" loading="lazy" decoding="async" class="hero__author-photo">
			<div><strong><?php echo esc_html( $founder_name ); ?></strong><span><?php echo esc_html( $founder_role ); ?></span></div>
			<p><?php echo esc_html( $founder_note ); ?></p>
		</div>
	</article>

	<aside class="hero__visual surface" aria-label="<?php echo esc_attr( argokov_field( 'home_hero_visual_eyebrow', 'С чем можно обратиться' ) ); ?>">
		<div class="hero__visual-heading">
			<div>
				<span><?php echo esc_html( argokov_field( 'home_hero_visual_eyebrow', 'С чем можно обратиться' ) ); ?></span>
				<h2><?php echo esc_html( argokov_field( 'home_hero_visual_title', 'Работаем с проектами на любом этапе' ) ); ?></h2>
			</div>
			<span class="hero__visual-index"><?php echo esc_html( sprintf( '01—%02d', count( $layers ) ) ); ?></span>
		</div>

		<div class="work-layers">
			<?php foreach ( $layers as $layer ) : ?>
				<?php
				$style = isset( $layer['style'] ) ? sanitize_html_class( $layer['style'] ) : 'interface';
				if ( ! in_array( $style, array( 'interface', 'content', 'connections', 'support' ), true ) ) {
					$style = 'interface';
				}
				?>
				<div class="work-layer work-layer--<?php echo esc_attr( $style ); ?>">
					<div class="work-layer__heading">
						<span><?php echo esc_html( $layer['number'] ?? '' ); ?></span><strong><?php echo esc_html( $layer['title'] ?? '' ); ?></strong>
					</div>
					<div class="work-layer__preview" aria-hidden="true">
						<span class="work-layer__line work-layer__line--long"></span><span class="work-layer__line"></span><span class="work-layer__line work-layer__line--short"></span>
					</div>
					<p><?php echo esc_html( $layer['text'] ?? '' ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $notes ) : ?>
			<p class="hero__visual-note">
				<?php foreach ( $notes as $index => $note ) : ?>
					<?php if ( $index > 0 ) : ?><span>·</span><?php endif; ?>
					<?php echo esc_html( $note['text'] ?? '' ); ?>
				<?php endforeach; ?>
			</p>
		<?php endif; ?>
	</aside>
</section>
