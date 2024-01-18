<?php get_header(); ?>

<section class="post common__width">
  <article class="post__article">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) :
        the_post(); ?>
        <?php the_post_thumbnail(); ?>
        <h2>
          <?php the_title(); ?>
        </h2>
        <p>
          <?php the_content(); ?>
        </p>
        <p class="post__article__author__name">
          <?php the_author_meta('nickname'); ?>
        </p>
      <?php endwhile; ?>
    <?php else : ?>
      <div class="error">
        <p>お探しの記事は見つかりませんでした。</p>
      </div>
    <?php endif; ?>
  </article>
</section>

<?php get_footer(); ?>