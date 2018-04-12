<?php
add_editor_style( 'lib/css/editor-style.css' );

include_once('lib/fns/disable-emojis.php');
include_once('lib/fns/enqueues.php');
include_once('lib/fns/header.php');

remove_action('template_redirect', 'wp_old_slug_redirect');

/**
 * Adds editor styles based on the current page template.
 *
 * Hooked to `admin_enqueue_scripts`.
 *
 * @uses add_editor_style()
 * @since 1.0.0
 *
 * @return void
 */
function hemingway_child_add_editor_styles() {
    global $post;

    $template = basename( get_page_template() );

    switch ( $template ) {
    	case 'nosidebar-page.php':
    		add_editor_style( 'lib/css/editor-style_nosidebar.css' );
    		break;
    }
}
add_action( 'admin_enqueue_scripts', 'hemingway_child_add_editor_styles' );

/**
 * Adjust content_width value for woocommerce page template.
 */
function hemingway_child_content_width() {
	if ( is_page_template( 'woocommerce.php' ) ) {
		$GLOBALS['content_width'] = 780;
	}
}
add_action( 'template_redirect', 'hemingway_rewritten_content_width', 11 );

/**
 * Declaring WooCommerce Support
 *
 * @since 1.0.1
 *
 * @return void
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
?>