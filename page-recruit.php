<?php get_header(); ?>

<h2 class="recruit__title">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit_title.png" alt="求人情報">
</h2>

<section id="banner" class="banner">
  <a href="<?= home_url('/recruit') ?>" class="banner__img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img.png" alt="キャスト募集中">
  </a>
</section>

<section class="recruitmenttype">
  <h2 class="recruitmenttype__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruitmenttype_title.png" alt="募集職種">
  </h2>
  <ul class="recruitmenttype__list grid__container common__width">
    <li class="recruitmenttype__item grid__item">
      <a href="<?= home_url('/recruit/counter-lady') ?>" class="recruitmenttype__item__link common__link">
        <p class="recruitmenttype__item__link__text">カウンターレディー</p>
      </a>
    </li>
    <li class="recruitmenttype__item grid__item">
      <a href="<?= home_url('/recruit?param=employee-candidate') ?>" class="recruitmenttype__item__link common__link">
        <p class="recruitmenttype__item__link__text">社員候補</p>
      </a>
    </li>
    <li class="recruitmenttype__item grid__item">
      <a href="<?= home_url('/recruit/feed-driver') ?>" class="recruitmenttype__item__link common__link">
        <p class="recruitmenttype__item__link__text">送りドライバー</p>
      </a>
    </li>
    <li class="recruitmenttype__item grid__item">
      <a href="<?= home_url('/recruit/waiter') ?>" class="recruitmenttype__item__link common__link">
        <p class="recruitmenttype__item__link__text">ウェイター・ウェイトレス</p>
      </a>
    </li>
  </ul>
</section>

<?php
$allowed_params = ['counter-lady', 'employee-candidate'];

if (isset($_GET['param']) && in_array($_GET['param'], $allowed_params)) {
  get_template_part('element/recruit/' . $_GET['param']);
}
?>

<?php get_template_part('element/recruit/form'); ?>


<?php get_footer(); ?>