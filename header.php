<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<?php bloginfo('charset'); ?>">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <title>
    <?php bloginfo('name'); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body>
  <header class="header">
    <div class="header__list__container grid__container">
      <div id="header-hamburger" class="header__hamburger grid__item">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="header__contact__list grid__item grid__container">
        <li class="header__contact__item">
          <a href="" class="header__contact__item__link">
            <i class="fa-solid fa-location-dot"></i>
          </a>
        </li>
        <li class="header__contact__item">
          <a href="" class="header__contact__item__link">
            <i class="fa-solid fa-phone"></i>
          </a>
        </li>
      </ul>
      <ul class="header__sns__list grid__item grid__container">
        <li class="header__sns__item">
          <a href="" class="header__sns__item__link">
            <i class="fa-brands fa-line"></i>
          </a>
        </li>
        <li class="header__sns__item">
          <a href="" class="header__sns__item__link">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
        <li class="header__sns__item">
          <a href="" class="header__sns__item__link">
            <i class="fa-brands fa-tiktok"></i>
          </a>
        </li>
      </ul>
    </div>

    <div id="header-overlay" class="header__overlay"></div>
    <nav id="header-nav" class="header__nav">
      <div id="header-hamburger-close" class="header__hamburger__close">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="header__nav__list">
        <li class="header__nav__item"><a href="#" class="header__nav__item__link">TOP</a></li>
        <li class="header__nav__item"><a href="#" class="header__nav__item__link">キャスト</a></li>
        <li class="header__nav__item"><a href="#" class="header__nav__item__link">料金システム</a></li>
        <li class="header__nav__item"><a href="#" class="header__nav__item__link">店舗情報・アクセス</a></li>
        <li class="header__nav__item"><a href="#" class="header__nav__item__link">求人情報</a></li>
        <li class="header__nav__item"><a href="#" class="header__nav__item__link">キャストブログ</a></li>
      </ul>
      <ul class="header__nav__contact__info__list">
        <li class="header__nav__contact__info__item">
          <p class="header__nav__contact__info__item__title">電話番号</p>
          <p class="header__nav__contact__info__item__text"><span class="large">090-1234-5678</span></p>
        </li>
        <li class="header__nav__contact__info__item">
          <p class="header__nav__contact__info__item__title">営業時間</p>
          <p class="header__nav__contact__info__item__text"><span class="large">19:00~24:00</span>（日曜・年末年始休み）</p>
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
          <li href="#" class="header__nav__contact__item grid__item">
            <a class="header__nav__contact__item__link">
              <i class="fa-solid fa-location-dot"></i>
            </a>
          </li>
          <li class="header__nav__contact__item grid__item">
            <a href="#" class="header__nav__contact__item__link">
              <i class="fa-solid fa-phone"></i>
            </a>
          </li>
        </ul>
        <ul class="header__nav__sns__list flex__item grid__container">
          <li class="header__nav__sns__item grid__item">
            <a href="#" class="header__nav__sns__item__link">
              <i class="fa-brands fa-line"></i>
            </a>
          </li>
          <li class="header__nav__sns__item grid__item">
            <a href="#" class="header__nav__sns__item__link">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </li>
          <li class="header__nav__sns__item grid__item">
            <a href="#" class="header__nav__sns__item__link">
              <i class="fa-brands fa-tiktok"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>