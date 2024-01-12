<?php get_header(); ?>

<article class="post">
  <?php if (have_posts()): ?>
    <?php while (have_posts()):
      the_post(); ?>
      <section class="post-item">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail();
        }
        ?>
        <h2>
          <?php the_title(); ?>
        </h2>
        <p>
          <?php the_content(); ?>
        </p>
        <p class="author-name">
          <?php the_author_meta('nickname'); ?>
        </p>
        <a href="<?php the_permalink(); ?>">この投稿を読む</a>
      </section>
    <?php endwhile; ?>
  <?php else: ?>
    <div class="error">
      <p>お探しの記事は見つかりませんでした。</p>
    </div>
  <?php endif; ?>
</article>

<?php get_footer(); ?>