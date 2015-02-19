<?php
add_editor_style( 'lib/css/editor-style.css' );

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
?>