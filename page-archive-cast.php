<?php get_header(); ?>

<?php
// #cast
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'paged' => $paged,
  'number' => 30,
);
$user_query = new WP_User_Query($args);
$users = $user_query->get_results();
$display_users = array();

foreach ($users as $user) {
  $user_id = $user->ID;
  $cast_display = get_field('cast_display', 'user_' . $user_id);
  // cast_displayがshowの場合のみ表示
  if ($cast_display == 'show') {
    $cast_top_img = get_field('cast_top_image', 'user_' . $user_id);
    $cast_name = get_field('cast_name', 'user_' . $user_id);
    $display_users[] = array(
      'top_image' => $cast_top_img,
      'name' => $cast_name,
      'link' => get_author_posts_url($user_id)
    );
  }
}
?>
<section id="cast" class="cast">
  <h2 class="cast__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_title.png" alt="キャスト">
  </h2>
  <ul class="cast__list grid__container common__width">
    <?php foreach ($display_users as $user) : ?>
      <li class="cast__item grid__item">
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
</section>

<div class="pagination">
  <?php
  $total_users = $user_query->get_total();
  $total_pages = ceil($total_users / 30);
  echo paginate_links(array(
    'total' => $total_pages,
    'current' => $paged,
    'type' => 'list',
  ));
  ?>
</div>

<?php get_footer(); ?>