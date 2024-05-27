<?php get_header()?>

<?php
// すべてのタグを取得
$tags = get_tags();
?>

<?php if ($tags) : ?>
  <ul class="tag__list">
    <?php foreach ($tags as $tag) : ?>
      <li class="tag__list__item">
        <a class="tag__list__item__link" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
          <?php echo esc_html($tag->name); ?> (<?php echo $tag->count; ?>)
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php get_footer()?>