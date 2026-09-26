<?php
/**
 * Single material.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$material_id   = get_the_ID();
	$topic         = argokov_field( 'material_topic', 'Материал', $material_id );
	$reading       = (int) argokov_field( 'material_reading_time', 0, $material_id );
	$lead          = argokov_field( 'material_lead', get_the_excerpt(), $material_id );
	$cover         = argokov_material_cover_url( $material_id, 'full' );
	$cover_alt     = argokov_material_cover_alt( $material_id );
	$blocks        = argokov_field( 'material_blocks', array(), $material_id );
	$founder_name  = argokov_option( 'site_founder_name', 'Андрей Старцев' );
	$founder_role  = argokov_option( 'site_founder_role', 'Основатель и ведущий разработчик' );
	$founder_photo = argokov_option( 'site_founder_photo', array() );
	$founder_url   = argokov_image_url( $founder_photo, 'assets/images/andrey-startsev.png' );

	$toc = array();

	if ( is_array( $blocks ) ) {
		foreach ( $blocks as $block ) {
			if ( isset( $block['acf_fc_layout'] ) && 'section' === $block['acf_fc_layout'] && ! empty( $block['title'] ) ) {
				$anchor = ! empty( $block['anchor'] ) ? sanitize_title( $block['anchor'] ) : sanitize_title( $block['title'] );
				$toc[]  = array(
					'anchor' => $anchor,
					'title'  => $block['title'],
				);
			}
		}
	}

	$related_ids = argokov_field( 'material_related', array(), $material_id );
	$related     = array();

	if ( is_array( $related_ids ) ) {
		foreach ( $related_ids as $related_id ) {
			$related_id = (int) $related_id;

			if ( $related_id && $related_id !== $material_id && 'publish' === get_post_status( $related_id ) ) {
				$related[] = $related_id;
			}
		}
	}

	if ( ! $related ) {
		$related = get_posts(
			array(
				'post_type'      => 'material',
				'post_status'    => 'publish',
				'posts_per_page' => 2,
				'post__not_in'   => array( $material_id ),
				'fields'         => 'ids',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'no_found_rows'  => true,
			)
		);
	}
	?>
	<article>
		<header class="article-hero surface">
			<nav class="breadcrumbs" aria-label="Хлебные крошки">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><a href="<?php echo esc_url( get_post_type_archive_link( 'material' ) ?: home_url( '/materials/' ) ); ?>">Статьи</a><span>/</span><span><?php the_title(); ?></span>
			</nav>

			<div class="article-hero__layout">
				<div class="article-hero__content">
					<p class="section-eyebrow"><?php echo esc_html( $topic ); ?></p>
					<h1><?php the_title(); ?></h1>
					<?php if ( $lead ) : ?><p class="article-hero__lead"><?php echo esc_html( $lead ); ?></p><?php endif; ?>

					<div class="article-meta">
						<div class="article-author">
							<?php if ( $founder_url ) : ?><img src="<?php echo esc_url( $founder_url ); ?>" alt="<?php echo esc_attr( $founder_name ); ?>" width="48" height="48" loading="lazy" decoding="async"><?php endif; ?>
							<div><strong><?php echo esc_html( $founder_name ); ?></strong><span><?php echo esc_html( $founder_role ); ?></span></div>
						</div>
						<div>
							<span>Опубликовано <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></time></span>
							<span>Обновлено <time datetime="<?php echo esc_attr( get_the_modified_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_modified_date( 'j F Y' ) ); ?></time></span>
							<?php if ( $reading ) : ?><span><?php echo esc_html( $reading . ' минут чтения' ); ?></span><?php endif; ?>
						</div>
					</div>
				</div>

				<?php if ( $cover ) : ?>
					<figure class="article-hero__cover"><img src="<?php echo esc_url( $cover ); ?>" alt="<?php echo esc_attr( $cover_alt ); ?>" loading="eager" fetchpriority="high" decoding="async" sizes="(max-width: 960px) 100vw, 44vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"></figure>
				<?php endif; ?>
			</div>
		</header>

		<div class="article-layout">
			<aside class="article-toc surface" aria-label="Содержание статьи">
				<strong>Содержание</strong>
				<?php if ( $toc ) : ?>
					<nav><?php foreach ( $toc as $index => $item ) : ?><a href="#<?php echo esc_attr( $item['anchor'] ); ?>"><span><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><?php echo esc_html( $item['title'] ); ?></a><?php endforeach; ?></nav>
				<?php endif; ?>
				<a href="<?php echo esc_url( home_url( '/support/' ) ); ?>">Передать сайт на поддержку <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			</aside>

			<div>
				<div class="article-content surface">
					<?php get_template_part( 'template-parts/material/blocks' ); ?>
				</div>

				<section class="article-author-box" aria-labelledby="about-author">
					<?php if ( $founder_url ) : ?><img src="<?php echo esc_url( $founder_url ); ?>" alt="<?php echo esc_attr( $founder_name ); ?>" width="92" height="92" loading="lazy" decoding="async"><?php endif; ?>
					<div>
						<p class="section-eyebrow">Об авторе</p>
						<h2 id="about-author"><?php echo esc_html( $founder_name ); ?></h2>
						<p><?php echo esc_html( argokov_option( 'site_author_bio', 'Веб-разработчик и основатель студии «Аргоков». Более 10 лет разрабатывает и принимает на поддержку сайты на WordPress, 1С-Битрикс и с самописным кодом.' ) ); ?></p>
						<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="text-link">О студии <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
					</div>
				</section>
			</div>
		</div>
	</article>

	<?php if ( $related ) : ?>
		<section class="article-related surface" aria-labelledby="related-title">
			<header>
				<div><p class="section-eyebrow">Читайте дальше</p><h2 id="related-title">Материалы по теме</h2></div>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'material' ) ?: home_url( '/materials/' ) ); ?>" class="text-link">Все статьи <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
			</header>
			<div>
				<?php foreach ( $related as $related_id ) : ?>
					<article>
						<span><?php echo esc_html( argokov_field( 'material_topic', 'Материал', $related_id ) ); ?></span>
						<h3><a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>"><?php echo esc_html( get_the_title( $related_id ) ); ?></a></h3>
						<p><?php echo esc_html( get_the_excerpt( $related_id ) ); ?></p>
						<small><?php echo esc_html( (int) argokov_field( 'material_reading_time', 0, $related_id ) . ' минут чтения' ); ?></small>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php comments_template(); ?>

	<?php
	get_template_part(
		'template-parts/common/contact-section',
		null,
		array(
			'eyebrow'  => argokov_field( 'material_contact_eyebrow', 'Нужно принять сайт', $material_id ),
			'title'    => argokov_field( 'material_contact_title', 'Разберёмся в проекте и вернём контроль', $material_id ),
			'text'     => argokov_field( 'material_contact_text', 'Пришли ссылку и кратко опиши ситуацию. Скажем, какие доступы понадобятся, с чего безопасно начать и можем ли взять сайт на поддержку.', $material_id ),
			'title_id' => 'article-contact-title',
		)
	);
endwhile;

get_footer();
