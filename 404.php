<?php get_header(); ?>

<?php
#first-view
?>
<section id="first-view" class="firstview">
  <div class="firstview__logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="BIKINI GIRLS BAR LEGEND" width="375" height="170">
  </div>
</section>

<div class="common__width">
  お探しのページは見つかりませんでした。
  <a href="<?= home_url() ?>">▸トップページへ戻る</a>
</div>

<?php
#banner
?>
<section id="banner" class="banner">
  <a href="<?= home_url('/recruit?param=counter-lady') ?>" class="banner__img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img.png" alt="キャスト募集中" width="375" height="153" loading="lazy">
  </a>
</section>

<?php get_footer(); ?>