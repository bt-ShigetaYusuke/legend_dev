<?php get_header() ?>

<main id="archive-tag" class="archive__tag main">

  <?php
  // すべてのタグを取得
  $tags = get_tags();
  ?>

  <?php if ($tags) : ?>
    <ul class="tag__list">
      <?php foreach ($tags as $tag) : ?>
        <li class="tag__list__item">
          <a class="cast__link common__link" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
            <p class="cast__link__text"><?php echo esc_html($tag->name); ?> (<?php echo $tag->count; ?>)</p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

</main>

<?php get_footer() ?>