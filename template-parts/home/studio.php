<?php
defined( 'ABSPATH' ) || exit;

$founder_name  = argokov_option( 'site_founder_name', 'Андрей Старцев' );
$founder_role  = argokov_option( 'site_founder_role', 'Основатель и ведущий разработчик' );
$founder_photo = argokov_option( 'site_founder_photo', array() );
$founder_url   = argokov_image_url( $founder_photo, 'assets/images/andrey-startsev.png' );

$facts = argokov_rows(
	'home_studio_facts',
	array(
		array( 'value' => '10 лет', 'label' => 'в веб-разработке' ),
		array( 'value' => 'Иркутск', 'label' => 'работаем по всей России' ),
		array( 'value' => 'Лично', 'label' => 'погружаемся в каждый проект' ),
	)
);
?>
<section class="home-section studio surface" id="studio" aria-labelledby="studio-title">
	<div class="studio__photo">
		<img src="<?php echo esc_url( $founder_url ); ?>" alt="<?php echo esc_attr( $founder_name . ', основатель студии Аргоков' ); ?>" loading="lazy" decoding="async" sizes="(max-width: 960px) 100vw, 42vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover">
		<div class="studio__photo-caption">
			<span><?php echo esc_html( $founder_name ); ?></span><span><?php echo esc_html( $founder_role ); ?></span>
		</div>
	</div>

	<div class="studio__content">
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_studio_eyebrow', 'О студии' ) ); ?></p>
		<h2 id="studio-title"><?php echo esc_html( argokov_field( 'home_studio_title', 'Аргоков — студия с личной ответственностью' ) ); ?></h2>
		<p class="studio__lead"><?php echo esc_html( argokov_field( 'home_studio_lead', 'Мы работаем как студия, а не как случайный набор исполнителей. Андрей лично ведёт архитектуру и отвечает за техническое качество, а под задачу подключаются нужные специалисты.' ) ); ?></p>
		<blockquote><?php echo esc_html( argokov_field( 'home_studio_quote', 'Название «Аргоков» связано с важной для нас семейной историей. Для студии оно означает силу, ответственность и работу, за которую не стыдно.' ) ); ?></blockquote>

		<?php if ( $facts ) : ?>
			<div class="studio__facts">
				<?php foreach ( $facts as $fact ) : ?>
					<div><strong><?php echo esc_html( $fact['value'] ?? '' ); ?></strong><span><?php echo esc_html( $fact['label'] ?? '' ); ?></span></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<a class="text-link" href="#contact"><?php echo esc_html( argokov_field( 'home_studio_link_label', 'Познакомиться с нами' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</div>
</section>
