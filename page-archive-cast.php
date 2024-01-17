<?php
$args = array(
  'post_type' => 'cast',
  'posts_per_page' => 5,
  'order' => 'DESC', //DESCかASC
  // 'orderby' => ‘どの値を基準に記事を並べるか’,
  // 'paged' => $paged, ページ番号、これがないとページナビがバグる
);
$wp_query = new WP_Query($args);
?>

<?php get_header(); ?>

<?php if ($wp_query->have_posts()) : ?>
  <?php while ($wp_query->have_posts()) :
    $wp_query->the_post(); ?>
    <h2>
      <?php echo get_the_title(); ?>
    </h2>
    <p>
      <?php echo get_the_excerpt(); ?>
    </p>
    <div class="cast__blog__item__img">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php endwhile; ?>
<?php else : ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>