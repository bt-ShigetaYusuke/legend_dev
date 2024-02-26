<?php get_header(); ?>
<?php
// #cast-profile
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
  if (!(count($user_images) <= 3)) {
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

<?php
// #cast-blog
$author_id = get_queried_object_id();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'author' => $author_id,
  'paged' => $paged,
);

$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>
  <section class="cast__blog">
    <h2 class="cast__blog__title">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ" width="375" height="106">
    </h2>
    <ul class="cast__blog__list common__width">
      <?php while ($the_query->have_posts()) : $the_query->the_post();
        // 文字数制限
        $title = get_the_title();
        $title = wp_trim_words(get_the_title(), 18, '…');
        $content = get_the_content('', false, '');
        $content = wp_strip_all_tags($content);
        $cast_name = get_field('cast_name', 'user_' . $author_id);
      ?>
        <li class="cast__blog__item">
          <a href="<?php the_permalink(); ?>" class="cast__blog__item__link grid__container">
            <div class="grid__item">
              <div class="cast__blog__item__img">
                <?php the_post_thumbnail(array(75, 75)); ?>
              </div>
            </div>
            <div class="grid__item">
              <h3 class="cast__blog__item__title">
                <?= $title ?>
              </h3>
              <div class="cast__blog__item__content">
                <?= $content ?>
              </div>
              <p class="cast__blog__item__author">
                <?= $cast_name ?>
              </p>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php
    $big = 999999999;

    echo paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $the_query->max_num_pages,
      'type' => 'list'
    ));
    wp_reset_postdata();
    ?>
  </section>
<?php endif; ?>

<?php get_footer(); ?>