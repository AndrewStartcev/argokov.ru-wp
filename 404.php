<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<section class="inner-hero surface">
	<p class="eyebrow">404</p>
	<h1>Страница не найдена</h1>
	<p>Возможно, адрес изменился или страница была удалена.</p>
	<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">На главную</a>
</section>
<?php get_footer(); ?>
