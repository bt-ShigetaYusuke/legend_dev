<?php get_header(); ?>


<section id="first-view" class="first-view">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
</section>

<section id="banner" class="banner">

</section>

<section id="about" class="about">

</section>

<?php
$args = array(
  'post_type' => 'cast',
  'posts_per_page' => 50,
);

$the_query = new WP_Query($args);
?>

<section id="cast" class="cast">
  <h2 class="cast__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_title.png" alt="キャスト">
  </h2>
  <?php if ($the_query->have_posts()): ?>
    <div class="swiper mySwiper">
      <ul class="cast__list swiper-wrapper">
        <?php while ($the_query->have_posts()):
          $the_query->the_post(); ?>
          <li class="cast__item swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <div class="cast__item__img">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="cast__name">
                <?php the_field('cast_name'); ?>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</section>

<section id="fee-system" class="fee-system">

</section>

<section id="access" class="access">

</section>

<?php // 文字数制限
$title = get_the_title();
$title = wp_trim_words(get_the_title(), 18, '…');
$content = get_the_content('', false, '');
$content = wp_strip_all_tags($content);
?>

<section id="cast-blog" class="cast__blog">
  <h2 class="cast__blog__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ">
  </h2>
  <?php if (have_posts()): ?>
    <ul class="cast__blog__list common__width">
      <?php while (have_posts()):
        the_post(); ?>
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
    </ul>
  <?php else: ?>
    <div class="cast__blog__error">
      <p>お探しの記事は見つかりませんでした。</p>
    </div>
  <?php endif; ?>
  <a href="" class="cast__blog__button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_button.png" alt="もっと見る">
  </a>
</section>

<?php get_footer(); ?>