<?php get_header(); ?>

<section class="post common__width">
  <article class="post__article">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) :
        the_post();

        $author_id = get_the_author_meta('ID');
        $args = array(
          'post_type'     => 'cast',
          'author'        =>  $author_id,
          'orderby'       =>  'post_date',
          'order'         =>  'DESC',
          'posts_per_page' => 1,
        );

        $current_user_posts = get_posts($args);
      ?>
        <div>
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
          <?php elseif ($current_user_posts) : ?>
            <?php echo get_the_post_thumbnail($current_user_posts[0]->ID, 'thumbnail', ['class' => '', 'alt' => '']); ?>
          <?php endif; ?>
        </div>
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