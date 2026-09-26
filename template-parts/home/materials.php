<?php
defined( 'ABSPATH' ) || exit;

$selected  = argokov_field( 'home_materials_selected', array() );
$materials = array();

if ( is_array( $selected ) && $selected ) {
	foreach ( $selected as $material_id ) {
		$material_id = (int) $material_id;
		if ( ! $material_id || 'material' !== get_post_type( $material_id ) ) {
			continue;
		}

		$thumbnail_id  = get_post_thumbnail_id( $material_id );
		$thumbnail_url = $thumbnail_id ? wp_get_attachment_image_url( $thumbnail_id, 'large' ) : '';
		$thumbnail_alt = $thumbnail_id ? get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ) : '';

		if ( ! $thumbnail_url ) {
			$material_slug = get_post_field( 'post_name', $material_id );
			$cover_map     = array(
				'tehnicheskaya-podderzhka-sayta'          => 'assets/images/material-support-cover.webp',
				'razrabotchik-perestal-otvechat'          => 'assets/images/material-developer-silent-cover.png',
				'dorabotka-sayta-ili-novaya-razrabotka'  => 'assets/images/material-rebuild-cover.webp',
			);

			if ( isset( $cover_map[ $material_slug ] ) ) {
				$thumbnail_url = argokov_asset( $cover_map[ $material_slug ] );
			}
		}

		$materials[] = array(
			'title'        => get_the_title( $material_id ),
			'url'          => get_permalink( $material_id ),
			'topic'        => argokov_field( 'material_topic', 'Материал', $material_id ),
			'date'         => get_the_date( 'j F Y', $material_id ),
			'datetime'     => get_the_date( 'Y-m-d', $material_id ),
			'description'  => get_the_excerpt( $material_id ),
			'reading_time' => (int) argokov_field( 'material_reading_time', 0, $material_id ),
			'comments'     => (int) get_comments_number( $material_id ),
			'image_url'    => $thumbnail_url,
			'image_alt'    => $thumbnail_alt ?: get_the_title( $material_id ),
		);
	}
}

if ( ! $materials ) {
	$materials = array(
		array(
			'title' => 'Техническая поддержка сайта: что входит и когда она нужна',
			'url' => home_url( '/materials/tehnicheskaya-podderzhka-sayta/' ),
			'topic' => 'Поддержка сайтов',
			'date' => '18 августа 2026',
			'datetime' => '2026-08-18',
			'description' => 'Разбираем, какие задачи входят в поддержку сайта, чем разовая доработка отличается от сопровождения и когда бизнесу нужен постоянный разработчик.',
			'reading_time' => 8,
			'comments' => 0,
			'image_url' => argokov_asset( 'assets/images/material-support-cover.webp' ),
			'image_alt' => 'Рабочее место специалиста по технической поддержке сайтов',
		),
		array(
			'title' => 'Что делать, если прежний разработчик перестал отвечать',
			'url' => home_url( '/materials/razrabotchik-perestal-otvechat/' ),
			'topic' => 'Сложные проекты',
			'date' => '23 августа 2026',
			'datetime' => '2026-08-23',
			'description' => 'Как безопасно передать сайт новому специалисту, восстановить доступы и продолжить работу, даже если документации не осталось.',
			'reading_time' => 6,
			'comments' => 0,
			'image_url' => argokov_asset( 'assets/images/material-developer-silent-cover.png' ),
			'image_alt' => 'Оставленное рабочее место разработчика и материалы проекта',
		),
		array(
			'title' => 'Доработка существующего сайта или разработка нового: что выбрать',
			'url' => home_url( '/materials/dorabotka-sayta-ili-novaya-razrabotka/' ),
			'topic' => 'Разработка сайтов',
			'date' => '9 августа 2026',
			'datetime' => '2026-08-09',
			'description' => 'Сравниваем риски, стоимость и сроки двух подходов, чтобы принять решение на основе состояния проекта, а не эмоций.',
			'reading_time' => 9,
			'comments' => 0,
			'image_url' => argokov_asset( 'assets/images/material-rebuild-cover.webp' ),
			'image_alt' => 'Сравнение доработки существующего сайта и новой разработки',
		),
	);
}
?>
<section class="home-section materials surface" id="materials" aria-labelledby="materials-title">
	<header class="section-heading">
		<div class="section-heading__main">
			<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'home_materials_eyebrow', 'Полезные материалы' ) ); ?></p>
			<h2 id="materials-title"><?php echo esc_html( argokov_field( 'home_materials_title', 'Разбираем разработку, поддержку и развитие сайтов' ) ); ?></h2>
		</div>
		<p class="section-heading__copy"><?php echo esc_html( argokov_field( 'home_materials_copy', 'Практические материалы о технической поддержке, доработках, безопасности и SEO — без пересказа очевидных вещей.' ) ); ?></p>
		<span class="section-heading__index"><?php echo esc_html( argokov_field( 'home_materials_index', '06' ) ); ?></span>
	</header>

	<div class="materials__list">
		<?php foreach ( $materials as $material ) : ?>
			<article class="material-card">
				<a class="material-card__cover" href="<?php echo esc_url( $material['url'] ?? '#' ); ?>" aria-label="<?php echo esc_attr( 'Читать: ' . ( $material['title'] ?? '' ) ); ?>">
					<?php if ( ! empty( $material['image_url'] ) ) : ?>
						<img src="<?php echo esc_url( $material['image_url'] ); ?>" alt="<?php echo esc_attr( $material['image_alt'] ?? '' ); ?>" loading="lazy" decoding="async" sizes="(max-width: 620px) 100vw, (max-width: 960px) 80vw, 33vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover">
					<?php endif; ?>
				</a>

				<div class="material-card__body">
					<div class="material-card__top">
						<span><?php echo esc_html( $material['topic'] ?? '' ); ?></span>
						<time datetime="<?php echo esc_attr( $material['datetime'] ?? '' ); ?>"><?php echo esc_html( $material['date'] ?? '' ); ?></time>
					</div>

					<h3><a href="<?php echo esc_url( $material['url'] ?? '#' ); ?>"><?php echo esc_html( $material['title'] ?? '' ); ?></a></h3>
					<p><?php echo esc_html( $material['description'] ?? '' ); ?></p>

					<footer class="material-card__footer">
						<div class="material-card__metrics">
							<?php if ( ! empty( $material['reading_time'] ) ) : ?><span><?php echo esc_html( (int) $material['reading_time'] . ' минут' ); ?></span><?php endif; ?>
							<?php if ( ! empty( $material['comments'] ) ) : ?><span><?php echo esc_html( (int) $material['comments'] . ' комментариев' ); ?></span><?php endif; ?>
						</div>
						<a class="material-card__link" href="<?php echo esc_url( $material['url'] ?? '#' ); ?>">Читать <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
					</footer>
				</div>
			</article>
		<?php endforeach; ?>
	</div>

	<div class="materials__all">
		<a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'material' ) ?: home_url( '/materials/' ) ); ?>"><?php echo esc_html( argokov_field( 'home_materials_link_label', 'Смотреть все статьи' ) ); ?> <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
	</div>
</section>
