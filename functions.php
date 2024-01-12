<?php
function theme_enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_scripts() {
  wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
  wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/assets/js/main.js');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );