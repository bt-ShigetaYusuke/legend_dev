<?php
const MAP_URL_LEGEND = 'https://www.google.com/maps/place/%E3%80%92183-0055+%E6%9D%B1%E4%BA%AC%E9%83%BD%E5%BA%9C%E4%B8%AD%E5%B8%82%E5%BA%9C%E4%B8%AD%E7%94%BA%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%96%E2%88%92%EF%BC%91+%E5%8F%A4%E6%B2%A2%E3%83%93%E3%83%AB/@35.6725208,139.4807786,18.55z/data=!4m6!3m5!1s0x6018e4fb49659f27:0xb8a358616054c535!8m2!3d35.6723727!4d139.4811455!16s%2Fg%2F12hxf5hh8?hl=ja&entry=ttu';
const MAP_URL_JEWEL = 'https://maps.app.goo.gl/RtSB5ZzmueuktVw9A';

// ログイン画面のロゴ変更
function login_logo()
{
  echo '<style type="text/css">
		.login h1 a {
			background-image: url(' . get_template_directory_uri() . '/assets/img/fav.png);
			width: 100px;
			height: 100px;
			background-size: cover;
			background-position: center top;
		}
		</style>';
}
add_action('login_head', 'login_logo');

// 投稿ページのmeta keyword設定
function add_meta_keywords()
{
  if (is_singular('post')) {
    global $post;
    $keywords = 'ガールズバー,キャストブログ,水着,ビキニ,府中,レジェンド,legend';

    echo '<meta name="keywords" content="' . $keywords . '">';
  }
  if (is_author()) {
    global $post;
    $keywords = 'ガールズバー,キャスト,水着,ビキニ,府中,レジェンド,legend';

    echo '<meta name="keywords" content="' . $keywords . '">';
  }
}
add_action('wp_head', 'add_meta_keywords');

// アイキャッチ画像
function setup_theme()
{
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(500, 500, true);
}
add_action('after_setup_theme', 'setup_theme');

// defaultのサムネイル画像
function set_default_thumbnail_image($html, $post_id)
{
  $width = 75;
  $height = 75;

  if ("" === $html) {
    if (has_category('cast', $post_id)) {
      $html = '<img src="' . get_template_directory_uri() . '/assets/img/defalt_post_cast.png" alt="" width="' . $width . '" height="' . $height . '" />';
    } else {
      $html = '<img src="' . get_template_directory_uri() . '/assets/img/logo.png" alt="" width="' . $width . '" height="' . $height . '" />';
    }
  }
  return $html;
}
add_filter('post_thumbnail_html', 'set_default_thumbnail_image', 10, 2);

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

  if (is_front_page() || is_home() || is_404()) {
    $styles['top-style'] = get_template_directory_uri() . '/assets/css/top.css';
  }
  if (is_author()) {
    $styles['author-style'] = get_template_directory_uri() . '/assets/css/author.css';
  }
  if (is_singular('post')) {
    $styles['single-style'] = get_template_directory_uri() . '/assets/css/single.css';
  }
  if (is_page('recruit')) {
    $styles['page-recruit-style'] = get_template_directory_uri() . '/assets/css/page-recruit.css';
  }
  if (is_page('drink-menu')) {
    $styles['page-drink-menu-style'] = get_template_directory_uri() . '/assets/css/page-drink-menu.css';
  }
  if (is_page('archive-blog')) {
    $styles['page-archive-blog-style'] = get_template_directory_uri() . '/assets/css/page-archive-blog.css';
  }
  if (is_page('archive-cast')) {
    $styles['page-archive-cast-style'] = get_template_directory_uri() . '/assets/css/page-archive-cast.css';
  }
  if (is_page('manual-cast') || is_page('manual-post') || is_page('manual-admin')) {
    $styles['page-manual-style'] = get_template_directory_uri() . '/assets/css/page-manual.css';
  }

  foreach ($styles as $id => $url) {
    wp_enqueue_style($id, $url);
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// js読み込み
function theme_enqueue_scripts()
{
  if (!is_page('manual-cast') && !is_page('manual-post') && !is_page('manual-admin')) {
    wp_enqueue_script('swiper-min', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), false, true);
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
  }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

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
  // sns
  $sns_line_url = get_option('sns_line_url', '');
  $sns_instagram_url = get_option('sns_instagram_url', '');
  $sns_tiktok_url = get_option('sns_tiktok_url', '');
  $recruit_email = get_option('recruit_email', '');
?>
  <h2 style="color: blue;">店舗情報</h2>
  <form method="post" action="options.php">
    <?php
    // この関数WordPressのセキュリティ機能を利用するために必要
    settings_fields('custom_menu_group');
    ?>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">営業時間（開始）</th>
        <td><input type="text" name="business_hours_start" value="<?php echo esc_attr($business_hours_start); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">営業時間（終了）</th>
        <td><input type="text" name="business_hours_end" value="<?php echo esc_attr($business_hours_end); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">電話番号</th>
        <td><input type="text" name="phone_number" value="<?php echo esc_attr($phone_number); ?>" /></td>
      </tr>
    </table>
    <h2 style="color: blue;">SNSのURL</h2>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">LINEのURL</th>
        <td><input type="text" name="sns_line_url" value="<?php echo esc_attr($sns_line_url); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">InstagramのURL</th>
        <td><input type="text" name="sns_instagram_url" value="<?php echo esc_attr($sns_instagram_url); ?>" /></td>
      </tr>
      <tr valign="top">
        <th scope="row">TikTokのURL</th>
        <td><input type="text" name="sns_tiktok_url" value="<?php echo esc_attr($sns_tiktok_url); ?>" /></td>
      </tr>
    </table>
    <h2 style="color: blue;">求人募集</h2>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">求人募集用メールアドレス</th>
        <td><input type="text" name="recruit_email" value="<?php echo esc_attr($recruit_email); ?>" /></td>
      </tr>
    </table>
    <?php
    submit_button();
    ?>
  </form>
<?php
}

// 管理画面の初期化時に実行
add_action('admin_init', 'custom_menu_init');
function custom_menu_init()
{
  // 設定を登録
  register_setting('custom_menu_group', 'business_hours_start');
  register_setting('custom_menu_group', 'business_hours_end');
  register_setting('custom_menu_group', 'phone_number');
  register_setting('custom_menu_group', 'sns_line_url');
  register_setting('custom_menu_group', 'sns_instagram_url');
  register_setting('custom_menu_group', 'sns_tiktok_url');
  register_setting('custom_menu_group', 'recruit_email');
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

// Line
function get_sns_line_url()
{
  return get_option('sns_line_url', '');
}

// Instagram
function get_sns_instagram_url()
{
  return get_option('sns_instagram_url', '');
}

// TikTok
function get_sns_tiktok_url()
{
  return get_option('sns_tiktok_url', '');
}

// 求人募集のメールアドレス
function get_recruit_email()
{
  return get_option('recruit_email', '');
}
