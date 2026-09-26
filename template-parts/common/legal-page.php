<?php
/**
 * Legal page content.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

$revision = argokov_field( 'legal_revision_date', '' );

if ( $revision ) {
	$timestamp = strtotime( $revision );
} else {
	$timestamp = get_post_modified_time( 'U', false, get_the_ID() );
}
?>
<article class="legal-page surface">
	<nav class="breadcrumbs" aria-label="Хлебные крошки">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a><span>/</span><span><?php the_title(); ?></span>
	</nav>

	<header>
		<p class="section-eyebrow">Юридическая информация</p>
		<h1><?php the_title(); ?></h1>
		<p>Редакция от <time datetime="<?php echo esc_attr( wp_date( 'Y-m-d', $timestamp ) ); ?>"><?php echo esc_html( wp_date( 'j F Y', $timestamp ) ); ?></time></p>
	</header>

	<div class="legal-page__content">
		<?php the_content(); ?>
	</div>
</article>
