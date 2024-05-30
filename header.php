<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<?php bloginfo('charset'); ?>">
  <title>
    <?php bloginfo('name'); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header" class="header">
    <h1><?php wp_title(''); ?></h1>
    <div class="header__list__container grid__container">
      <div id="header-hamburger" class="header__hamburger grid__item">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="header__contact__list grid__item grid__container">
        <li class="header__contact__item">
          <a href="<?= MAP_URL_LEGEND ?>" target="_blank" class="header__contact__item__link">
            <i class="fa-solid fa-location-dot"></i>
          </a>
        </li>
        <li class="header__contact__item">
          <a href="tel:<?= get_phone_number() ?>" class="header__contact__item__link">
            <i class="fa-solid fa-phone"></i>
          </a>
        </li>
      </ul>
      <div class="header__logo">
        <a href="<?= home_url() ?>" class="header__logo__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header_logo.png" alt="LEGEND" width="129" height="36">
        </a>
      </div>
      <ul class="header__sns__list grid__item grid__container">
        <li class="header__sns__item">
          <a href="<?= get_sns_line_url() ?>" class="header__sns__item__link">
            <i class="fa-brands fa-line"></i>
          </a>
        </li>
        <li class="header__sns__item">
          <a href="<?= get_sns_instagram_url() ?>" class="header__sns__item__link">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
        <li class="header__sns__item">
          <a href="<?= get_sns_tiktok_url() ?>" class="header__sns__item__link">
            <i class="fa-brands fa-tiktok"></i>
          </a>
        </li>
      </ul>
    </div>

    <div id="header-overlay" class="header__overlay"></div>

    <?php
    # header-nav
    // cast_displayがshowのユーザーが一件もヒットしない場合、メニューから「キャスト」と「キャストブログ」を非表示に
    $user_query = new WP_User_Query(array(
      'meta_key' => 'cast_display',
      'meta_value' => 'show'
    ));

    $author_ids = array();
    if (!empty($user_query->get_results())) {
      foreach ($user_query->get_results() as $user) {
        $author_ids[] = $user->ID;
      }
    }

    // キャストブログの投稿があるかどうかを確認
    $has_posts = false;
    foreach ($author_ids as $author_id) {
      $temp_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'author' => $author_id,
      ));
      if ($temp_query->have_posts()) {
        $has_posts = true;
        break; // 投稿が見つかったらループを抜ける
      }
    }
    ?>
    <nav id="header-nav" class="header__nav">
      <div id="header-hamburger-close" class="header__hamburger__close">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="header__nav__list">
        <li class="header__nav__item"><a href="<?= home_url() ?>" class="header__nav__item__link">TOP</a></li>
        <?php if (!empty($author_ids)) : ?>
          <li class="header__nav__item"><a href="<?= home_url('#cast') ?>" class="header__nav__item__link">キャスト</a></li>
        <?php endif; ?>
        <li class="header__nav__item"><a href="<?= home_url('#fee-system') ?>" class="header__nav__item__link">料金システム</a></li>
        <li class="header__nav__item"><a href="<?= home_url('#access') ?>" class="header__nav__item__link">店舗情報・アクセス</a></li>
        <li class="header__nav__item"><a href="<?= home_url('recruit?param=counter-lady') ?>" class="header__nav__item__link">求人情報</a></li>
        <?php if (!empty($author_ids) && $has_posts) : ?>
          <li class="header__nav__item"><a href="<?= home_url('#cast-blog') ?>" class="header__nav__item__link">キャストブログ</a></li>
        <?php endif; ?>
      </ul>
      <ul class="header__nav__contact__info__list">
        <li class="header__nav__contact__info__item">
          <p class="header__nav__contact__info__item__title">電話番号</p>
          <a href="tel:<?= get_phone_number() ?>" class="header__nav__contact__info__item__text">
            <span class="large">
              <?= get_phone_number() ?>
            </span></a>
        </li>
        <li class="header__nav__contact__info__item">
          <p class="header__nav__contact__info__item__title">営業時間</p>
          <p class="header__nav__contact__info__item__text">
            <span class="large">
              <?= get_business_hours_range() ?>
            </span>（年中無休）
          </p>
        </li>
        <li class="header__nav__contact__info__item">
          <p class="header__nav__contact__info__item__title">住所</p>
          <p class="header__nav__contact__info__item__text">
            東京都府中市府中町1-6-1 古沢ビルB1<br>
            京王線「府中駅」徒歩1分
          </p>
        </li>
      </ul>
      <div class="header__nav__list__container flex__container">
        <ul class="header__nav__contact__list flex__item grid__container">
          <li class="header__nav__contact__item grid__item">
            <a href="<?= MAP_URL_LEGEND ?>" target="_blank" class="header__nav__contact__item__link">
              <i class="fa-solid fa-location-dot"></i>
            </a>
          </li>
          <li class="header__nav__contact__item grid__item">
            <a href="tel:<?= get_phone_number() ?>" class="header__nav__contact__item__link">
              <i class="fa-solid fa-phone"></i>
            </a>
          </li>
        </ul>
        <ul class="header__nav__sns__list flex__item grid__container">
          <li class="header__nav__sns__item grid__item">
            <a href="<?= get_sns_line_url() ?>" class="header__nav__sns__item__link">
              <i class="fa-brands fa-line"></i>
            </a>
          </li>
          <li class="header__nav__sns__item grid__item">
            <a href="<?= get_sns_instagram_url() ?>" class="header__nav__sns__item__link">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </li>
          <li class="header__nav__sns__item grid__item">
            <a href="<?= get_sns_tiktok_url() ?>" class="header__nav__sns__item__link">
              <i class="fa-brands fa-tiktok"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>