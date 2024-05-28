<?php
// #cast
$users = get_users();
$display_users = array();

foreach ($users as $user) {
  $user_id = $user->ID;
  $cast_display = get_field('cast_display', 'user_' . $user_id);
  // cast_displayがshowの場合のみ表示
  if ($cast_display == 'show') {
    $cast_top_img = get_field('cast_top_image', 'user_' . $user_id);
    $cast_name = get_field('cast_name', 'user_' . $user_id);
    $display_users[] = array(
      'name' => $cast_name,
      'top_image' => $cast_top_img,
      'link' => get_author_posts_url($user_id)
    );
  }
}

// cast_displayがshowのユーザーが1件もヒットしなかった場合、castセクションごと非表示に
if (!empty($display_users)) :
  $swiper_id = '';
  $active = '';
  if (!(count($display_users) < 3)) {
    $swiper_id = 'top-cast-swiper';
    $active = 'active';
  }
?>
  <section id="cast" class="cast common__section">
    <h2 class="cast__title">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_title.png" alt="キャスト" width="375" height="106" loading="lazy">
    </h2>
    <div id="<?= $swiper_id ?>" class="top__cast__swiper swiper">
      <ul class="cast__list swiper-wrapper <?= $active ?>">
        <?php foreach ($display_users as $user) : ?>
          <li class="cast__item swiper-slide">
            <a href="<?= $user['link'] ?>">
              <div class="cast__item__img">
                <img src="<?= $user['top_image'] ?>" alt="">
              </div>
              <div class="cast__name">
                <?= $user['name'] ?>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <a href="<?= home_url('/archive-cast') ?>" class="cast__link common__width common__link">
      <p class="cast__link__text">全てのキャストを見る</p>
    </a>
  </section>
<?php endif; ?>