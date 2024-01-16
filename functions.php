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
    'font-awesome' => get_template_directory_uri() . '/assets/css/all.min.css',
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
  if (is_page('recruit')) {
    $styles['page-recruit-style'] = get_template_directory_uri() . '/assets/css/page-recruit.css';
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
        'author',
      ),
    )
  );
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}

// 管理画面カスタマイズ
function add_custom_menu()
{
  add_menu_page(
    '店舗情報',
    '店舗情報',
    'manage_options', // 権限
    'custom_menu_slug',
    'custom_menu_page_render', // 描画関数
    '', // アイコンURL
    99 // メニューの位置
  );
}
add_action('admin_menu', 'add_custom_menu');

function custom_menu_page_render()
{
  // 保存された情報を取得
  $business_hours_start = get_option('business_hours_start', '');
  $business_hours_end = get_option('business_hours_end', '');
  $phone_number = get_option('phone_number', '');

  echo '<h2>店舗情報</h2>';
  echo '<form method="post" action="options.php">';

  // この関数WordPressのセキュリティ機能を利用するために必要
  settings_fields('custom_menu_group');

  echo '<table class="form-table">';
  echo '<tr valign="top">';
  echo '<th scope="row">営業時間（開始）</th>';
  echo '<td><input type="text" name="business_hours_start" value="' . esc_attr($business_hours_start) . '" /></td>';
  echo '</tr>';
  echo '<tr valign="top">';
  echo '<th scope="row">営業時間（終了）</th>';
  echo '<td><input type="text" name="business_hours_end" value="' . esc_attr($business_hours_end) . '" /></td>';
  echo '</tr>';
  echo '<tr valign="top">';
  echo '<th scope="row">電話番号</th>';
  echo '<td><input type="text" name="phone_number" value="' . esc_attr($phone_number) . '" /></td>';
  echo '</tr>';
  echo '</table>';

  submit_button();

  echo '</form>';
}

// 管理画面の初期化時に実行
add_action('admin_init', 'custom_menu_init');
function custom_menu_init()
{
  // 設定を登録
  register_setting('custom_menu_group', 'business_hours_start');
  register_setting('custom_menu_group', 'business_hours_end');
  register_setting('custom_menu_group', 'phone_number');
}

// 営業時間（開始）を取得する関数
function get_business_hours_start()
{
  return get_option('business_hours_start', '');
}

// 営業時間（終了）を取得する関数
function get_business_hours_end()
{
  return get_option('business_hours_end', '');
}

// 営業時間（開始から終了）を取得する関数
function get_business_hours_range()
{
  $start = get_business_hours_start();
  $end = get_business_hours_end();
  return $start . ' ~ ' . $end;
}

// 電話番号を取得する関数
function get_phone_number()
{
  return get_option('phone_number', '');
}