<?php
// #cast-blog
$author_id = get_queried_object_id();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'author' => $author_id,
  'paged' => $paged,
);

$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>
  <section class="cast__blog">
    <h2 class="cast__blog__title">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ" width="375" height="106">
    </h2>
    <ul class="cast__blog__list common__width">
      <?php while ($the_query->have_posts()) : $the_query->the_post();
        // 文字数制限
        $title = get_the_title();
        $title = wp_trim_words(get_the_title(), 18, '…');
        $content = get_the_content('', false, '');
        $content = wp_strip_all_tags($content);
        $cast_name = get_field('cast_name', 'user_' . $author_id);
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
  </section>
<?php endif; ?>