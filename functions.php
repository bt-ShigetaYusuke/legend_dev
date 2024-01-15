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

// css読み込み
function theme_enqueue_styles()
{
  $styles = array(
    'google-fonts' => 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400..700&display=swap',
    'swiper-min' => get_template_directory_uri() . '/assets/css/swiper.min.css',
    'theme-reset' => get_template_directory_uri() . '/assets/css/reset.css',
    'common-style' => get_template_directory_uri() . '/assets/css/common.css',
  );

  if (is_front_page() || is_home()) {
    $styles['top-style'] = get_template_directory_uri() . '/assets/css/top.css';
  }
  if (is_singular('cast')) {
    $styles['cast-style'] = get_template_directory_uri() . '/assets/css/single-cast.css';
  }
  if (is_post_type_archive('cast')) {
    $styles['archive-cast-style'] = get_template_directory_uri() . '/assets/css/archive-cast.css';
  }

  foreach ($styles as $id => $url) {
    wp_enqueue_style($id, $url);
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// js読み込み
function theme_enqueue_scripts()
{
  wp_enqueue_script('swiper-min', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), false, true);
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// カスタム投稿タイプ
add_action('init', 'create_post_type');

function create_post_type()
{
  register_post_type(
    'cast',
    array(
      'label' => 'キャスト',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_position' => 5,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions',
      ),
    )
  );
}

function assign_cast_id($post_id, $post, $update)
{
  // キャストタイプの投稿と新規投稿のみに適用
  if ($post->post_type == 'cast' && !$update) {
    // 最後のキャストIDを取得
    $args = array(
      'post_type' => 'cast',
      'posts_per_page' => 1,
      'orderby' => 'meta_value_num',
      'meta_key' => 'cast_id',
      'order' => 'DESC'
    );
    $last_cast = new WP_Query($args);

    $last_id = ($last_cast->have_posts()) ? (int) get_post_meta($last_cast->posts[0]->ID, 'cast_id', true) : 0;

    // IDを生成
    $cast_id = $last_id + 1;
    update_post_meta($post_id, 'cast_id', $cast_id);
  }
}