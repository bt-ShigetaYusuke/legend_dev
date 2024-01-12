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
    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="overlay"></div>
    <nav class="menu">
      <div class="hamburger-close">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul>
        <li><a href="#">メニュー1</a></li>
        <li><a href="#">メニュー2</a></li>
        <li><a href="#">メニュー3</a></li>
      </ul>
    </nav>
  </header>