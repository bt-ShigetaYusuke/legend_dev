<?php
// すべてのタグを投稿数の多い順に取得し、上位10件のみ取得
$tags = get_tags(array(
  'orderby' => 'count',
  'order' => 'DESC',
));
?>
<?php if ($tags) : ?>
  <ul class="common__tag__list common__width">
    <?php foreach ($tags as $tag) : ?>
      <li class="common__tag__list__item">
        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
          #&nbsp;<?php echo esc_html($tag->name); ?> (<?php echo $tag->count; ?>)
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>