<?php
get_header();

if ( have_posts() ) :
  while ( have_posts() ) : the_post();
    // ここで各投稿の内容を表示します
    the_title();
    the_content();
  endwhile;
endif;

get_footer();