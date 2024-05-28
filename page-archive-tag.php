<?php get_header() ?>

<main id="archive-tag" class="archive__tag main">

  <?php
  // すべてのタグを取得し、投稿数が多い順に並べ替える
  $tags = get_tags(array(
    'orderby' => 'count',
    'order'   => 'DESC'
  ));
  ?>
  <section>
    <?php if ($tags) : ?>
      <ul class="common__tag__list">
        <?php foreach ($tags as $tag) : ?>
          <li class="common__tag__list__item">
            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
              <?php echo esc_html($tag->name); ?> (<?php echo $tag->count; ?>)
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </section>

</main>

<?php get_footer() ?>