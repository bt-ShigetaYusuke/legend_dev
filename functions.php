<?php
// アイキャッチ画像
function setup_theme()
{
  add_theme_support('post-thumbnails');
  // set_post_thumbnail(500, 500, true);
}
add_action('after_setup_theme', 'setup_theme');

function set_default_thumbnail_image($html)
{
  if ("" === $html) {
    $html = '<img src="' . get_template_directory_uri() . '/assets/img/logo.png" alt="デフォルトのアイキャッチ画像" />';
  }
  return $html;
}
add_filter('post_thumbnail_html', 'set_default_thumbnail_image');

// css読み込み
function theme_enqueue_styles()
{
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400..700&display=swap');
  wp_enqueue_style('swiper-min', get_template_directory_uri() . '/assets/css/swiper.min.css');
  wp_enqueue_style('theme-reset', get_template_directory_uri() . '/assets/css/reset.css');
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// fontsの読み込みパフォーマンス向上
function theme_resource_hints($urls, $relation_type)
{
  if ($relation_type === 'preconnect') {
    $urls[] = array(
      'href' => 'https://fonts.googleapis.com',
      'crossorigin' => '',
    );
    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin' => 'anonymous',
    );
  }
  return $urls;
}
add_filter('wp_resource_hints', 'theme_resource_hints', 10, 2);

// js読み込み
function theme_enqueue_scripts()
{
  wp_enqueue_script('swiper-min', get_template_directory_uri() . '/assets/js/swiper.min.js');
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');