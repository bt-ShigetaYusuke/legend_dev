<?php
// #cast-blog
$user_query = new WP_User_Query(array(
  'meta_key' => 'cast_blog_display',
  'meta_value' => 'show'
));

$author_ids = array();
if (!empty($user_query->get_results())) {
  foreach ($user_query->get_results() as $user) {
    $author_ids[] = $user->ID;
  }
}

// cast_blog_displayがshowのユーザーが1件もヒットしなかった場合、cast-blogセクションごと非表示に
if (!empty($author_ids)) :

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'author__in' => $author_ids,
  );

  $the_query = new WP_Query($args);

  // 投稿が一件もない場合、cast-blogセクションごと非表示に
  if ($the_query->have_posts()) :
?>
    <section id="cast-blog" class="cast__blog common__section">
      <h2 class="cast__blog__title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ" width="375" height="106">
      </h2>
      <ul class="cast__blog__list common__width">
        <?php while ($the_query->have_posts()) : $the_query->the_post();
          // 文字数制限
          $title = get_the_title();
          $title = wp_trim_words(get_the_title(), 16, '…');
          $content = get_the_content('', false, '');
          $content = wp_strip_all_tags($content);
          $content = wp_trim_words($content, 42, '…');
          $author_id = get_the_author_meta('ID');
          $user_name = get_field('cast_name', 'user_' . $author_id);
        ?>
          <li class="cast__blog__item">
            <a href="<?php the_permalink(); ?>" class="cast__blog__item__link grid__container">
              <div class="grid__item">
                <div class="cast__blog__item__img">
                  <?php the_post_thumbnail(array(75, 75)); ?>
                </div>
              </div>
              <div class="grid__item">
                <h3 class="cast__blog__item__title">
                  <?= $title ?>
                </h3>
                <div class="cast__blog__item__content">
                  <?= $content ?>
                </div>
                <p class="cast__blog__item__date">
                  <?= get_the_date('Y.m.d(D)') ?>
                </p>
                <p class="cast__blog__item__author">
                  <small>ビキニガールズバー&nbsp;レジェンド</small><?= $user_name ?>
                </p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
      <a href="<?= home_url('/archive-blog') ?>" class="cast__blog__button">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_button.png" alt="もっと見る" width="375" height="375" loading="lazy">
      </a>

      <?php include(get_template_directory() . '/element/tag-list.php'); ?>

      <?php include(get_template_directory() . '/element/link-archive-tag.php'); ?>

    </section>
<?php
  endif;
  wp_reset_postdata();
endif;
?>