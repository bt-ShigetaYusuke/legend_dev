<?php
// #cast-blog
$user_query = new WP_User_Query(array(
  'meta_key' => 'cast_display',
  'meta_value' => 'show'
));

$author_ids = array();
if (!empty($user_query->get_results())) {
  foreach ($user_query->get_results() as $user) {
    $author_ids[] = $user->ID;
  }
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 20,
  'author__in' => $author_ids,
  'paged' => $paged,
);

$the_query = new WP_Query($args);
?>

<section id="cast-blog" class="cast__blog">
  <h2 class="cast__blog__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ">
  </h2>
  <?php if ($the_query->have_posts()) : ?>
    <ul class="cast__blog__list grid__container common__width">
      <?php while ($the_query->have_posts()) : $the_query->the_post();
        // 文字数制限
        $title = get_the_title();
        $title = wp_trim_words(get_the_title(), 18, '…');
        $content = get_the_content('', false, '');
        $content = wp_strip_all_tags($content);
        $author_id = get_the_author_meta('ID');
        $user_name = get_field('cast_name', 'user_' . $author_id);
      ?>
        <li class="cast__blog__item grid__item">
          <a href="<?php the_permalink(); ?>" class="cast__blog__item__link grid__container">
            <div class="grid__item">
              <div class="cast__blog__item__img">
                <?php the_post_thumbnail(); ?>
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
  <?php else : ?>
    <div class="cast__blog__error">
      <p>お探しの記事は見つかりませんでした。</p>
    </div>
  <?php endif; ?>

  <?php include(get_template_directory() . '/element/tag-list.php'); ?>

  <?php include(get_template_directory() . '/element/link-archive-tag.php'); ?>

  <?php
  $big = 999999999;

  echo paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $the_query->max_num_pages,
    'type' => 'list'
  ));
  wp_reset_postdata();
  ?>