<?php
/**
 * Remove WordPress features that are not used by this custom ACF theme.
 *
 * Keep SEO responsibilities in Rank Math and keep comments available
 * for materials. This file only removes unused core UI/output.
 *
 * @package Argokov
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove unnecessary wp_head() output.
 *
 * The main RSS feed remains available through automatic-feed-links.
 * Rank Math owns canonical, robots, Open Graph, sitemap and SEO schema.
 */
$argokov_wp_head_actions = array(
	array( 'wlwmanifest_link', 10 ),
	array( 'rsd_link', 10 ),
	array( 'wp_generator', 10 ),
	array( 'wp_shortlink_wp_head', 10 ),
	array( 'adjacent_posts_rel_link_wp_head', 10 ),
	array( 'feed_links_extra', 3 ),
	array( 'wp_oembed_add_discovery_links', 10 ),
	array( 'wp_oembed_add_host_js', 10 ),
	array( 'rest_output_link_wp_head', 10 ),
);

foreach ( $argokov_wp_head_actions as $argokov_wp_head_action ) {
	remove_action(
		'wp_head',
		$argokov_wp_head_action[0],
		$argokov_wp_head_action[1]
	);
}

unset( $argokov_wp_head_actions, $argokov_wp_head_action );

remove_action( 'template_redirect', 'wp_shortlink_header', 11 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

add_filter( 'the_generator', '__return_empty_string' );

/**
 * Disable WordPress emoji assets.
 */
$argokov_emoji_actions = array(
	array( 'wp_head', 'print_emoji_detection_script', 7 ),
	array( 'admin_print_scripts', 'print_emoji_detection_script', 10 ),
	array( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles', 10 ),
	array( 'admin_print_styles', 'wp_enqueue_emoji_styles', 10 ),
	array( 'wp_print_styles', 'print_emoji_styles', 10 ),
	array( 'admin_print_styles', 'print_emoji_styles', 10 ),
);

foreach ( $argokov_emoji_actions as $argokov_emoji_action ) {
	remove_action(
		$argokov_emoji_action[0],
		$argokov_emoji_action[1],
		$argokov_emoji_action[2]
	);
}

unset( $argokov_emoji_actions, $argokov_emoji_action );

$argokov_emoji_filters = array(
	array( 'wp_mail', 'wp_staticize_emoji_for_email' ),
	array( 'the_content_feed', 'wp_staticize_emoji' ),
	array( 'comment_text_rss', 'wp_staticize_emoji' ),
);

foreach ( $argokov_emoji_filters as $argokov_emoji_filter ) {
	remove_filter(
		$argokov_emoji_filter[0],
		$argokov_emoji_filter[1]
	);
}

unset( $argokov_emoji_filters, $argokov_emoji_filter );

/**
 * This is a custom classic theme controlled by PHP templates and ACF.
 * Gutenberg, block patterns and block frontend CSS are not used.
 */
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

function argokov_disable_block_patterns() {
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'argokov_disable_block_patterns', 100 );

add_filter( 'should_load_remote_block_patterns', '__return_false' );

function argokov_remove_block_styles() {
	$styles = array(
		'wp-block-library',
		'wp-block-library-theme',
		'global-styles',
		'classic-theme-styles',
	);

	foreach ( $styles as $style ) {
		wp_dequeue_style( $style );
	}
}
add_action( 'wp_enqueue_scripts', 'argokov_remove_block_styles', 100 );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_stored_styles' );
remove_action( 'wp_footer', 'wp_enqueue_stored_styles', 1 );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles' );
remove_action( 'enqueue_block_assets', 'wp_enqueue_classic_theme_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * XML-RPC is not used by this project.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Keep the admin focused on the entities actually used by the site.
 *
 * Native Posts are replaced by the Material CPT.
 * Comments stay because materials may use them.
 */
function argokov_remove_admin_menu_pages() {
	remove_menu_page( 'edit.php' );

	$menu_pages = array(
		'site-editor.php',
		'font-library.php',
	);

	foreach ( $menu_pages as $menu_page ) {
		remove_menu_page( $menu_page );
	}

	$submenu_pages = array(
		array( 'themes.php', 'site-editor.php' ),
		array( 'themes.php', 'font-library.php' ),
		array( 'themes.php', 'widgets.php' ),
		array( 'themes.php', 'customize.php' ),
		array( 'themes.php', 'theme-editor.php' ),
		array( 'plugins.php', 'plugin-editor.php' ),
	);

	foreach ( $submenu_pages as $submenu_page ) {
		remove_submenu_page( $submenu_page[0], $submenu_page[1] );
	}
}
add_action( 'admin_menu', 'argokov_remove_admin_menu_pages', 999 );

/**
 * Remove admin-bar links to features hidden above.
 */
function argokov_clean_admin_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'customize' );
	$wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'argokov_clean_admin_bar', 999 );

/**
 * Remove dashboard widgets that do not belong to the project workflow.
 * Site Health and Activity remain available.
 */
function argokov_clean_dashboard() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
}
add_action( 'wp_dashboard_setup', 'argokov_clean_dashboard' );

/**
 * Remove the WordPress version from admin footer.
 */
function argokov_admin_footer_version() {
	return '';
}
add_filter( 'update_footer', 'argokov_admin_footer_version', 100 );


/**
 * Comments belong only to materials.
 */
function argokov_limit_comments_support() {
	foreach ( array( 'page', 'case' ) as $post_type ) {
		remove_post_type_support( $post_type, 'comments' );
		remove_post_type_support( $post_type, 'trackbacks' );
	}
}
add_action( 'init', 'argokov_limit_comments_support', 100 );

/**
 * Remove the generic WordPress welcome panel.
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );
