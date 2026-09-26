<?php
/**
 * Materials archive.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

$topics = array();

$topic_posts = get_posts(
	array(
		'post_type'      => 'material',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'no_found_rows'  => true,
	)
);

foreach ( $topic_posts as $topic_post_id ) {
	$topic = trim( (string) argokov_field( 'material_topic', '', $topic_post_id ) );

	if ( $topic && ! in_array( $topic, $topics, true ) ) {
		$topics[] = $topic;
	}
}
?>
<section class="materials-hero surface" aria-labelledby="materials-page-title">
	<nav class="breadcrumbs" aria-label="Хлебные крошки"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span>Статьи</span></nav>
	<p class="section-eyebrow"><?php echo esc_html( argokov_option( 'materials_archive_eyebrow', 'Практика веб-разработки' ) ); ?></p>
	<h1 id="materials-page-title"><?php echo esc_html( argokov_option( 'materials_archive_title', 'Статьи о разработке,' ) ); ?> <span><?php echo esc_html( argokov_option( 'materials_archive_title_accent', 'поддержке и развитии сайтов' ) ); ?></span></h1>
	<p><?php echo esc_html( argokov_option( 'materials_archive_text', 'Разбираем реальные технические ситуации: как принять чужой проект, не потерять данные, оценить доработки и подготовить сайт к продвижению.' ) ); ?></p>

	<?php if ( $topics ) : ?>
		<div class="materials-categories" aria-label="Темы материалов">
			<span>Все материалы</span>
			<?php foreach ( $topics as $topic ) : ?><span><?php echo esc_html( $topic ); ?></span><?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>

<section class="materials-catalog surface" aria-labelledby="latest-title">
	<header class="development-heading">
		<div><p class="section-eyebrow"><?php echo esc_html( argokov_option( 'materials_catalog_eyebrow', 'Новые материалы' ) ); ?></p><h2 id="latest-title"><?php echo esc_html( argokov_option( 'materials_catalog_title', 'Полезно владельцу сайта и команде' ) ); ?></h2></div>
		<p><?php echo esc_html( argokov_option( 'materials_catalog_text', 'Пишем о том, с чем сталкиваемся в проектах: конкретно, честно и с понятным следующим действием.' ) ); ?></p>
	</header>

	<div class="materials-grid">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			$material_id = get_the_ID();
			$cover       = argokov_material_cover_url( $material_id );
			$cover_alt   = argokov_material_cover_alt( $material_id );
			$topic       = argokov_field( 'material_topic', 'Материал', $material_id );
			$reading     = (int) argokov_field( 'material_reading_time', 0, $material_id );
			?>
			<article class="material-card">
				<a href="<?php the_permalink(); ?>" class="material-card__cover" aria-label="<?php echo esc_attr( 'Читать: ' . get_the_title() ); ?>">
					<?php if ( $cover ) : ?><img src="<?php echo esc_url( $cover ); ?>" alt="<?php echo esc_attr( $cover_alt ); ?>" loading="lazy" decoding="async" sizes="(max-width: 720px) 100vw, 33vw" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover"><?php endif; ?>
				</a>

				<div class="material-card__body">
					<div class="material-card__top"><span><?php echo esc_html( $topic ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></time></div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					<footer class="material-card__footer">
						<div class="material-card__metrics"><?php if ( $reading ) : ?><span><?php echo esc_html( $reading . ' минут' ); ?></span><?php endif; ?></div>
						<a href="<?php the_permalink(); ?>" class="material-card__link">Читать статью <svg aria-hidden="true" class="arrow" viewBox="0 0 24 24" fill="none"><path d="M5 12h13M13 7l5 5-5 5"></path></svg></a>
					</footer>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
