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
$allowed_params = ['counter-lady', 'employee-candidate', 'feed-driver', 'waiter'];

if (isset($_GET['param']) && in_array($_GET['param'], $allowed_params)) {
  get_template_part('element/recruit/' . $_GET['param']);
}
?>

<section class="recruitapply common__section">
  <h2 class="recruitapply__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/recruitapply_title.png" alt="まずはお気軽にお問い合わせください!">
  </h2>
  <ul class="recruitapply__list">
    <li class="recruitapply__item">
      <a href="tel:<?= get_phone_number() ?>" class="recruitapply__item__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/recruitapply_item_link_01.png" alt="電話で応募">
      </a>
    </li>
    <li class="recruitapply__item">
      <a href="<?= get_sns_line_url() ?>" class="recruitapply__item__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/recruitapply_item_link_02.png" alt="LINEで応募">
      </a>
    </li>
    <li class="recruitapply__item">
      <a href="mailto:<?= get_recruit_email() ?>" class="recruitapply__item__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/recruitapply_item_link_03.png" alt="メールで応募">
      </a>
    </li>
    <li class="recruitapply__item">
      <a href="#recruit-form" class="recruitapply__item__link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/recruitapply_item_link_04.png" alt="WEBから応募">
      </a>
    </li>
  </ul>
</section>

<section id="recruit-form" class="recruit__form">
  <h2 class="recruit__form__title common__width">WEBから応募</h2>
  <p class="recruit__form__text__top common__width">以下の応募フォームに必要事項を入力のうえ、ご応募ください。</p>
  <?php get_template_part('element/recruit/form'); ?>
</section>



<?php get_footer(); ?>