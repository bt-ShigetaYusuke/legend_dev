<?php
$cast_images = array();
for ($i = 1; $i <= 10; $i++) {
  $cast_img = get_field('cast_img_' . $i);
  if ($cast_img) {
    $cast_images[] = $cast_img;
  }
}
?>

<?php get_header(); ?>

<article id="cast" class="cast">
  <?php while (have_posts()):
    the_post(); ?>
    <div class="cast__name">
      <?php the_field('cast_name'); ?>
    </div>
    <div class="swiper mySwiper">
      <ul class="cast__img__list swiper-wrapper">
        <?php foreach ($cast_images as $index => $cast_img): ?>
          <li class="cast__img__item swiper-slide">
            <img src="<?= $cast_img; ?>" alt="プロフィール画像 <?= $index + 1; ?>">
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php // pagenationが入る; ?>

    <ul class="cast__list grid__container">
      <li class="cast__item grid__item">
        <?php the_field('cast_age'); ?>
      </li>
      <li class="cast__item grid__item">
        <?php the_field('cast_blood_type'); ?>
      </li>
      <li class="cast__item grid__item">
        <?php the_field('cast_height'); ?>cm
      </li>
      <li class="cast__item grid__item">
        <?php the_field('cast_hobby'); ?>
      </li>
      <li class="cast__item grid__item">
        <?php the_field('cast_self_introduction'); ?>
      </li>
    </ul>
  <?php endwhile; ?>
</article>

<?php
// 現在の投稿の投稿者のIDを取得
$author_id = get_the_author_meta('ID');

$post_id = get_the_ID();
$post_author_id = get_post_field('post_author', $post_id);

$args = array(
  'post_type' => 'post',
  'posts_per_page' => 5,
  'order' => 'DESC',
  'author' => $author_id,
);
$wp_query = new WP_Query($args);

print('id' . $author_id);
print('post-id' . $post_author_id);
?>

<article id="cast-blog" class="cast__blog">
  <?php if ($wp_query->have_posts()): ?>
    <?php while ($wp_query->have_posts()):
      $wp_query->the_post(); ?>
      <h2>
        <?php echo get_the_title(); ?>
      </h2>
    <?php endwhile; ?>
  <?php else: ?>

  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</article>

<?php get_footer(); ?>