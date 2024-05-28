<?php
// #first-view
$firstview_images = array();
for ($i = 1; $i <= 10; $i++) {
  $firstview_image = get_field('top_firstview_image_' . $i);
  if ($firstview_image) {
    $firstview_images[] = $firstview_image;
  }
}
?>
<section id="first-view" class="firstview">
  <div class="firstview__logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="BIKINI GIRLS BAR LEGEND" width="375" height="170">
  </div>
  <div id="top-first-view-swiper" class="firstview__swiper swiper">
    <ul class="firstview__img__list swiper-wrapper">
      <?php foreach ($firstview_images as $index => $firstview_image) : ?>
        <li class="firstview__img__item swiper-slide">
          <img src="<?= $firstview_image; ?>" alt="ファーストビュー<?= $index + 1; ?>" width="375" height="290">
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="firstview__text">
    <p class="firstview__text__01">東京都府中市府中町1-6-1 古沢ビルB1（府中駅 徒歩1分）</p>
    <p class="firstview__text__02">open <span class="large"><?= get_business_hours_start() ?></span> > close <span class="large"><?= get_business_hours_end() ?></span></p>
  </div>
</section>