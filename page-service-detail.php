<?php
/**
 * Generic service detail page.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();

	$benefits = argokov_rows( 'service_benefits', array() );
	$scope    = argokov_rows( 'service_scope', array() );
	$process  = argokov_rows( 'service_process', array() );
	$faq      = argokov_rows( 'service_faq', array() );

	$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
	?>
	<section class="inner-hero surface">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a>
			<?php foreach ( $ancestors as $ancestor_id ) : ?>
				<span>/</span><a href="<?php echo esc_url( get_permalink( $ancestor_id ) ); ?>"><?php echo esc_html( get_the_title( $ancestor_id ) ); ?></a>
			<?php endforeach; ?>
			<span>/</span><span><?php the_title(); ?></span>
		</nav>
		<p class="section-eyebrow"><?php echo esc_html( argokov_field( 'service_hero_eyebrow', 'Услуга' ) ); ?></p>
		<h1><?php echo esc_html( argokov_field( 'service_hero_title', get_the_title() ) ); ?><?php $accent = argokov_field( 'service_hero_title_accent', '' ); ?><?php if ( $accent ) : ?> <span><?php echo esc_html( $accent ); ?></span><?php endif; ?></h1>
		<p><?php echo esc_html( argokov_field( 'service_hero_lead', '' ) ); ?></p>
	</section>

	<?php if ( $benefits ) : ?>
		<section class="development-section surface" aria-labelledby="service-benefits-title">
			<header class="development-heading">
				<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'service_benefits_eyebrow', 'Когда подходит' ) ); ?></p><h2 id="service-benefits-title"><?php echo esc_html( argokov_field( 'service_benefits_title', 'Для каких задач нужна эта услуга' ) ); ?></h2></div>
				<p><?php echo esc_html( argokov_field( 'service_benefits_copy', '' ) ); ?></p>
			</header>
			<div class="development-types">
				<?php foreach ( $benefits as $item ) : ?>
					<article class="development-type"><span class="development-card-number"><?php echo esc_html( $item['number'] ?? '' ); ?></span><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $scope ) : ?>
		<section class="development-section surface" aria-labelledby="service-scope-title">
			<header class="development-heading">
				<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'service_scope_eyebrow', 'Состав работ' ) ); ?></p><h2 id="service-scope-title"><?php echo esc_html( argokov_field( 'service_scope_title', 'Что входит в работу' ) ); ?></h2></div>
				<p><?php echo esc_html( argokov_field( 'service_scope_copy', '' ) ); ?></p>
			</header>
			<div class="development-included">
				<?php foreach ( $scope as $item ) : ?><article><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></article><?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( $process ) : ?>
		<section class="development-section surface" aria-labelledby="service-process-title">
			<header class="development-heading">
				<div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'service_process_eyebrow', 'Процесс' ) ); ?></p><h2 id="service-process-title"><?php echo esc_html( argokov_field( 'service_process_title', 'Как проходит работа' ) ); ?></h2></div>
				<p><?php echo esc_html( argokov_field( 'service_process_copy', '' ) ); ?></p>
			</header>
			<ol class="development-stages">
				<?php foreach ( $process as $item ) : ?><li><span><?php echo esc_html( $item['number'] ?? '' ); ?></span><div><h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3><p><?php echo esc_html( $item['text'] ?? '' ); ?></p></div></li><?php endforeach; ?>
			</ol>
		</section>
	<?php endif; ?>

	<?php if ( $faq ) : ?>
		<section class="development-section surface" aria-labelledby="service-faq-title">
			<header class="development-heading"><div><p class="section-eyebrow"><?php echo esc_html( argokov_field( 'service_faq_eyebrow', 'Частые вопросы' ) ); ?></p><h2 id="service-faq-title"><?php echo esc_html( argokov_field( 'service_faq_title', 'До начала работы' ) ); ?></h2></div></header>
			<div class="development-faq">
				<?php foreach ( $faq as $item ) : ?><details><summary><?php echo esc_html( $item['question'] ?? '' ); ?><span>+</span></summary><p><?php echo esc_html( $item['answer'] ?? '' ); ?></p></details><?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php
	get_template_part(
		'template-parts/common/contact-section',
		null,
		array(
			'eyebrow'  => argokov_field( 'service_contact_eyebrow', 'Обсудить задачу' ),
			'title'    => argokov_field( 'service_contact_title', 'Расскажите о проекте' ),
			'text'     => argokov_field( 'service_contact_text', 'Пришлите ссылку, описание задачи или техническое задание. Изучим вводные и предложим следующий шаг.' ),
			'title_id' => 'service-contact-title',
		)
	);
endwhile;

get_footer();
