<?php get_header(); ?>


<section id="first-view" class="first-view">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
</section>

<section id="banner" class="banner">

</section>

<section id="about" class="about">

</section>

<section id="cast" class="cast">

</section>

<section id="fee-system" class="fee-system">

</section>

<section id="access" class="access">

</section>

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
              <?php // the_modified_date(); ?>
              <h3 class="cast__blog__item__title">
                <?php the_title(); ?>
              </h3>
              <div class="cast__blog__item__content">
                <?php the_content(); ?>
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