<?php get_header(); ?>

<main id="author" class="main">

  <?php
  // #author-profile
  // 現在のページ番号を取得
  $current_page = max(1, get_query_var('paged'));

  $author_id = get_queried_object_id();

  $user_display = get_field('cast_display', 'user_' . $author_id);
  // cast_displayがshowの場合のみ表示
  if ($user_display == 'show') {
    $user_images = array();
    for ($i = 1; $i <= 10; $i++) {
      $user_img = get_field('cast_img_' . $i, 'user_' . $author_id);
      if ($user_img) {
        $user_images[] = $user_img;
      }
    }
    $user_name = get_field('cast_name', 'user_' . $author_id);
    $user_age = get_field('cast_age', 'user_' . $author_id);
    $user_blood_type = get_field('cast_blood_type', 'user_' . $author_id);
    $user_height = get_field('cast_height', 'user_' . $author_id);
    $user_hobby = get_field('cast_hobby', 'user_' . $author_id);
    $user_self_introduction = get_field('cast_self_introduction', 'user_' . $author_id);
  }
  ?>
  <?php if ($current_page == 1) : ?>
    <h2 class="single__cast__title">
      <img src="<?= get_template_directory_uri() ?>/assets/img/single-cast/single_cast_title.png" alt="キャスト紹介">
    </h2>

    <a href="<?= home_url('/archive-cast') ?>" class="single__cast__link common__width common__link">
      <p class="cast__link__text">他のキャストを見る</p>
    </a>

    <?php
    // #cast-profile
    $swiper_id = '';
    $active = '';
    if (!(count($user_images) < 3)) {
      $swiper_id = 'single-cast-swiper';
      $active = 'active';
    }
    ?>
    <section id="cast-profile" class="cast">
      <div class="cast__name">
        <?= $user_name ?>
      </div>
      <div class="swiper__container">
        <div id="<?= $swiper_id ?>" class="swiper single_cast">
          <ul class="cast__img__list swiper-wrapper <?= $active ?>">
            <?php foreach ($user_images as $index => $user_img) : ?>
              <li class="cast__img__item swiper-slide">
                <img src="<?= $user_img; ?>" alt="プロフィール画像 <?= $index + 1; ?>">
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="swiper-pagination"></div>
      </div>

      <ul class="cast__list grid__container common__width">
        <li class="cast__item grid__item">
          <h3 class="cast__item__title">誕生日（年齢）</h3>
          <p class="cast__item__text">
            <?= $user_age ?>
          </p>
        </li>
        <li class="cast__item grid__item">
          <h3 class="cast__item__title">血液型</h3>
          <p class="cast__item__text">
            <?= $user_blood_type ?>
          </p>
        </li>
        <li class="cast__item grid__item">
          <h3 class="cast__item__title">身長</h3>
          <p class="cast__item__text">
            <?= $user_height ?>cm
          </p>
        </li>
        <li class="cast__item grid__item">
          <h3 class="cast__item__title">趣味・特技</h3>
          <p class="cast__item__text">
            <?= $user_hobby ?>
          </p>
        </li>
        <li class="cast__item grid__item">
          <h3 class="cast__item__title">自己紹介</h3>
          <p class="cast__item__text">
            <?= $user_self_introduction ?>
          </p>
        </li>
      </ul>
    </section>
  <?php endif; ?>

  <?php include(get_template_directory() . '/element/section/archive-blog-cast-author.php'); ?>

</main>

<?php get_footer(); ?>