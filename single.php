<?php get_header(); ?>

<main id="single" class="main">

  <?php
  $post_id = get_queried_object_id();
  $post = get_post($post_id);
  $author_id = $post->post_author;
  $user_name = get_field('cast_name', 'user_' . $author_id);
  ?>
  <section class="post common__width">
    <article class="post__article">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) :
          the_post();
        ?>
          <div>
            <?php the_post_thumbnail(); ?>
          </div>
          <h2>
            <?php the_title(); ?>
          </h2>
          <p>
            <?php the_content(); ?>
          </p>
          <ul class="common__tag__list">
            <?php
            $tags = get_the_tags();
            if ($tags) {
              foreach ($tags as $tag) {
                echo '<li class="common__tag__list__item"><a href="' . get_tag_link($tag->term_id) . '">#&nbsp;' . $tag->name . '</a></li>';
              }
            }
            ?>
          </ul>
          <p class="post__article__date">
            <?= get_the_date('Y.m.d(D)') ?>
          </p>
          <p class="post__article__author__name">
            <small>ビキニガールズバー&nbsp;レジェンド</small><?= $user_name ?>
          </p>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="error">
          <p>お探しの記事は見つかりませんでした。</p>
        </div>
      <?php endif; ?>
    </article>
  </section>

  <?php
  $post_link = get_author_posts_url($author_id);
  ?>
  <a href="<?php echo $post_link; ?>" class="common__link common__width">
    <p class=""><?= $user_name ?>のプロフィールを見る</p>
  </a>

  <?php wp_reset_postdata(); ?>

</main>

<?php get_footer(); ?>