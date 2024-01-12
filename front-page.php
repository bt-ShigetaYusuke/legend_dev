<?php get_header(); ?>

<section class="first-view">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
</section>

<section class="banner">

</section>

<section class="about">

</section>

<section class="cast">

</section>

<section class="fee-system">

</section>

<section class="access">

</section>

<section class="cast-blog">
  <h2 class="cast-blog-title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ">
  </h2>
  <?php if (have_posts()): ?>
    <?php while (have_posts()):
      the_post(); ?>
      <ul class="cast-blog-list">
        <li class="cast-blog-item">
          <div class="cast-blog-item-img">
            <?php the_post_thumbnail(); ?>
          </div>
          <?php // the_modified_date(); ?>
          <h3 class="cast-blog-item-title">
            <?php the_title(); ?>
          </h3>
          <p class="cast-blog-item-content">
            <?php the_content(); ?>
          </p>
          <p class="cast-blog-item-author">
            <?php the_author_meta('nickname'); ?>
          </p>
          <a href="<?php the_permalink(); ?>" class="cast-blog-item-link">
            この投稿を読む
          </a>
        </li>
      </ul>
    <?php endwhile; ?>
  <?php else: ?>
    <div class="cast-blog-error">
      <p>お探しの記事は見つかりませんでした。</p>
    </div>
  <?php endif; ?>
  <a href="" class="cast-blog-button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_button.png" alt="もっと見る">
  </a>
</section>

<?php get_footer(); ?>