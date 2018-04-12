<?php

namespace HemingwayChild\fns;

function enqueue_scripts(){
  wp_dequeue_style( 'hemingway-rewritten-style' );
  wp_enqueue_style( 'hemingway-child', get_stylesheet_directory_uri() . '/lib/css/main.css', [], filemtime( get_stylesheet_directory() . '/lib/css/main.css' ) );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts', 20 );