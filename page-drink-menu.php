<?php get_header(); ?>

<h2 class="title">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/drink-menu/drinkmenu_title.png" alt="ドリンクメニュー">
</h2>

<nav class="menu__nav common__width">
  <ul class="menu__nav__list">
    <li class="menu__nav__item">
      <a href="#all-you-can-drink" class="menu__nav__item__link">▸飲み放題メニュー</a>
      <a href="#special-menu" class="menu__nav__item__link">▸LEGEND SPECIAL MENU(有料)</a>
    </li>
  </ul>
</nav>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
    the_content();
  endwhile;
endif;
?>


<?php get_footer(); ?>