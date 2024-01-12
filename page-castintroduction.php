<?php
// WP_Queryのパラメータを設定
$args = array(
  'post_type' => 'post', // 投稿タイプ
  'posts_per_page' => 5, // 表示する投稿数
);

// WP_Queryオブジェクトを生成
$the_query = new WP_Query($args);
?>

<!-- ループ -->
<?php if ($the_query->have_posts()): ?>
  <?php while ($the_query->have_posts()): ?>
    <?php $the_query->the_post(); ?>
    <h2>
      <?php echo get_the_title(); ?>
    </h2>
    <p>
      <?php echo get_the_excerpt(); ?>
    </p>
  <?php endwhile; ?>
<?php else: ?>
  <p>投稿が見つかりませんでした。</p>
<?php endif; ?>

<!-- ループ後のリセット -->
<?php wp_reset_postdata(); ?>