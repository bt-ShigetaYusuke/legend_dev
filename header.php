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

<body>
  <header>
    <div id="header-hamburger" class="header__hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div id="header-overlay" class="header__overlay"></div>
    <nav id="header-menu" class="header__menu">
      <div id="header-hamburger-close" class="header__hamburger__close">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="header__menu__list">
        <li class="header__menu__item"><a href="#" class="header__menu__item__link">メニュー1</a></li>
        <li class="header__menu__item"><a href="#" class="header__menu__item__link">メニュー2</a></li>
        <li class="header__menu__item"><a href="#" class="header__menu__item__link">メニュー3</a></li>
      </ul>
    </nav>
  </header>