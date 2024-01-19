<?php
$cast_images = array();
for ($i = 1; $i <= 10; $i++) {
  $cast_img = get_field('cast_img_' . $i);
  if ($cast_img) {
    $cast_images[] = $cast_img;
  }
}
?>

<?php get_header(); ?>

<h2 class="single__cast__title">
  <img src="<?= get_template_directory_uri() ?>/assets/img/single-cast/single_cast_title.png" alt="キャスト紹介">
</h2>

<a href="<?= home_url('/archive-cast') ?>" class="single__cast__link common__width common__link">
  <p class="cast__link__text">他のキャストを見る</p>
</a>

<article class="cast">
  <?php while (have_posts()) :
    the_post(); ?>
    <div class="cast__name">
      <?php the_field('cast_name'); ?>
    </div>
    <div class="swiper__container">
      <div id="single-cast-swiper" class="swiper single_cast">
        <ul class="cast__img__list swiper-wrapper">
          <?php foreach ($cast_images as $index => $cast_img) : ?>
            <li class="cast__img__item swiper-slide">
              <img src="<?= $cast_img; ?>" alt="プロフィール画像 <?= $index + 1; ?>">
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
          <?php the_field('cast_age'); ?>
        </p>
      </li>
      <li class="cast__item grid__item">
        <h3 class="cast__item__title">血液型</h3>
        <p class="cast__item__text">
          <?php the_field('cast_blood_type'); ?>
        </p>
      </li>
      <li class="cast__item grid__item">
        <h3 class="cast__item__title">身長</h3>
        <p class="cast__item__text">
          <?php the_field('cast_height'); ?>cm
        </p>
      </li>
      <li class="cast__item grid__item">
        <h3 class="cast__item__title">趣味・特技</h3>
        <p class="cast__item__text">
          <?php the_field('cast_hobby'); ?>
        </p>
      </li>
      <li class="cast__item grid__item">
        <h3 class="cast__item__title">自己紹介</h3>
        <p class="cast__item__text">
          <?php the_field('cast_self_introduction'); ?>
        </p>
      </li>
    </ul>
  <?php endwhile; ?>
</article>

<?php
// 現在の投稿の投稿者のIDを取得
$author_id = get_the_author_meta('ID');

$args = array(
  'post_type' => 'post',
  'posts_per_page' => 5,
  'order' => 'DESC',
  'author' => $author_id,
);
$wp_query = new WP_Query($args);
?>

<article class="cast__blog">
  <h2 class="cast__blog__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/single-cast/cast_blog_title.png" alt="このキャストのブログ">
  </h2>
  <ul class="cast__blog__list common__width">
    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) :
        $wp_query->the_post();
        // 文字数制限
        $title = get_the_title();
        $title = wp_trim_words(get_the_title(), 18, '…');
        $content = get_the_content('', false, '');
        $content = wp_strip_all_tags($content);
      ?>
        <li class="cast__blog__item">
          <a href="<?php the_permalink(); ?>" class="cast__blog__item__link grid__container">
            <div class="grid__item">
              <div class="cast__blog__item__img">
                <?php the_post_thumbnail(); ?>
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
                <?php the_author_meta('nickname'); ?>
              </p>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
  </ul>
  <?php wp_reset_postdata(); ?>
  <a href="<?= home_url('/archive-blog') ?>" class="cast__blog__button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_button.png" alt="もっと見る">
  </a>
</article>

<?php get_footer(); ?>