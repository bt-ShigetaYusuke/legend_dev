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

<?php get_footer(); ?>