<?php
$args = array(
  'post_type' => 'cast',
  'posts_per_page' => -1,
  'order' => 'DESC', //DESCかASC
);
$wp_query = new WP_Query($args);
?>

<?php get_header(); ?>

<section id="cast" class="cast common__section">
  <h2 class="cast__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_title.png" alt="キャスト">
  </h2>
  <?php if ($wp_query->have_posts()) : ?>
    <ul class="cast__list grid__container common__width">
      <?php while ($wp_query->have_posts()) :
        $wp_query->the_post(); ?>
        <li class="cast__item">
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

<?php get_footer(); ?>