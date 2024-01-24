<?php get_header(); ?>

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

<?php
$author_id = get_the_author_meta('ID');
$cast_args = array(
  'post_type' => 'cast',
  'author' => $author_id,
  'posts_per_page' => 1,
);

$cast_query = new WP_Query($cast_args);

if ($cast_query->have_posts()) :
  $cast_query->the_post();
  $post_link = get_permalink();
endif;
?>

<?php if (!empty($post_link)) : ?>
  <a href="<?php echo $post_link; ?>" class="common__link common__width">
    <p class=""><?= the_author_meta('nickname'); ?>のプロフィールを見る</p>
  </a>
<?php endif; ?>

<?php wp_reset_postdata(); ?>


<?php get_footer(); ?>