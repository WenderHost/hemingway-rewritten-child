<?php

namespace HemingwayChild\fns;

/**
 * If a page or post has a featured image set, use that instead of the custom header
 */
function featured_image_headers() {
  remove_action('wp_head','hemingway_rewritten_featured_image_headers',999);

  global $post;

  if ( ( ! hemingway_rewritten_jetpack_featured_image_display() ) || is_archive() || is_search() || is_home() )
    return;
  error_log('get_post_type() = ' . get_post_type() );

  if( 'event' == get_post_type() )
    return;

  if ( is_page() && has_post_thumbnail() ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hemingway-rewritten-header' );
    $image = $image[0];
  }
  elseif ( is_single() && hemingway_rewritten_has_post_thumbnail() ) {
    $image = hemingway_rewritten_get_attachment_image_src( $post->ID, get_post_thumbnail_id( $post->ID ), 'hemingway-rewritten-header' );
  }
  else {
    return;
  }

  ?>
  <style type="text/css" id="featured-header-image">
    .site-header-image {
      background-image: url( <?php echo esc_url( $image ); ?> );
    }
  </style>
  <?php
}
//Late priority to override custom headers if set
add_action( 'wp_head', __NAMESPACE__ . '\\featured_image_headers', 998 );