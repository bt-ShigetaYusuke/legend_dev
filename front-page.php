<?php get_header(); ?>

<?php
// #first-view
$firstview_images = array();
for ($i = 1; $i <= 10; $i++) {
  $firstview_image = get_field('top_firstview_image_' . $i);
  if ($firstview_image) {
    $firstview_images[] = $firstview_image;
  }
}
?>
<section id="first-view" class="firstview">
  <div class="firstview__logo">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="BIKINI GIRLS BAR LEGEND" width="375" height="170">
  </div>
  <div id="top-first-view-swiper" class="firstview__swiper swiper">
    <ul class="firstview__img__list swiper-wrapper">
      <?php foreach ($firstview_images as $index => $firstview_image) : ?>
        <li class="firstview__img__item swiper-slide">
          <img src="<?= $firstview_image; ?>" alt="ファーストビュー<?= $index + 1; ?>" width="375" height="290">
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="firstview__text">
    <p class="firstview__text__01">東京都府中市府中町1-6-1 古沢ビルB1（府中駅 徒歩1分）</p>
    <p class="firstview__text__02">open <span class="large"><?= get_business_hours_start() ?></span> > close <span class="large"><?= get_business_hours_end() ?></span></p>
  </div>
</section>

<?php
// #banner
?>
<section id="banner" class="banner">
  <a href="<?= home_url('/recruit?param=counter-lady') ?>" class="banner__img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img.png" alt="キャスト募集中" width="375" height="153" loading="lazy">
  </a>
</section>

<?php
// #about
?>
<section id="about" class="about">
  <div class="about__text common__width">
    <p class="about__text__01">
      府中の水着ガールズバー LEGEND ～レジェンド～ は、<br>
      明るく元気でセクシーな水着姿のキャストがおもてなしします。府中には多くのキャバクラやラウンジが存在する中で、LEGENDは他にはない独自のエクスペリエンスを提供しています。<br>
      料金システムは良心的で、気軽に楽しめるようになっており、リラックスした雰囲気の中で心地よい時間を過ごすことができます。<br>
      店内は広く落ち着いた雰囲気で、女の子たちのセクシーな魅力が空間に刺激を加え、楽しさとワクワクが融合しています。カウンター席だけでなくテーブル席もあるユニークで魅力的なガールズバーは、
    </p>
    <p class="about__text__02">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about_text_02.png" alt="府中でLEGEND～レジェンド～だけです。" width="375" height="375">
    </p>
  </div>
</section>

<?php
// #cast
$args = array(
  'post_type' => 'cast',
  'posts_per_page' => -1,
);

$the_query = new WP_Query($args);
?>
<section id="cast" class="cast common__section">
  <h2 class="cast__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_title.png" alt="キャスト" width="375" height="106" loading="lazy">
  </h2>
  <?php if ($the_query->have_posts()) : ?>
    <div id="top-cast-swiper" class="top__cast__swiper swiper">
      <ul class="cast__list swiper-wrapper">
        <?php while ($the_query->have_posts()) :
          $the_query->the_post(); ?>
          <li class="cast__item swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <div class="cast__item__img">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="cast__name">
                <?php the_field('cast_name'); ?>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
  <a href="<?= home_url('/archive-cast') ?>" class="cast__link common__width common__link">
    <p class="cast__link__text">全てのキャストを見る</p>
  </a>
</section>

<?php
// #fee-system
?>
<section id="fee-system" class="feesystem common__section">
  <h2 class="feesystem__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/feesystem_title.png" alt="料金システム" width="375" height="106">
  </h2>
  <div class="feesystem__img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/feesystem_img_01.png" alt="" width="368" height="186">
  </div>
  <table class="feesystem__table">
    <thead>
      <tr>
        <th class="feesystem__table__th">サービス</th>
        <th class="feesystem__table__th">価格</th>
      </tr>
    </thead>
    <tbody>
      <tr class="feesystem__table__tr">
        <td class="feesystem__table__td__01">1SET 45分</td>
        <td class="feesystem__table__td__02">¥4,000</td>
      </tr>
      <tr class="feesystem__table__tr">
        <td class="feesystem__table__td__01">延長30分</td>
        <td class="feesystem__table__td__02">¥3,000</td>
      </tr>
      <tr class="feesystem__table__tr">
        <td class="feesystem__table__td__01">延長60分</td>
        <td class="feesystem__table__td__02">¥6,000</td>
      </tr>
    </tbody>
  </table>
  <div class="feesystem__supplement">
    <p class="feesystem__supplement__01">TAX/SERVICE 20%</p>
    <p class="feesystem__supplement__02">生ビール、ウイスキー、焼酎、サワー、各種カクテル飲み放題</p>
  </div>
  <a href="<?= home_url('/drink-menu') ?>" class="feesystem__link common__link">
    <p class="feesystem__link__text">メニューを見る</p>
  </a>
  <div class="feesystem__asterisk">
    <p class="feesystem__asterisk__01">※インボイス制度対応</p>
    <p class="feesystem__asterisk__02">※クレジットカード取扱いあり（クレジットカード手数料はございません）</p>
  </div>
  <div class="feesystem__payment">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/feesystem_payment.png" alt="VISA Mastercard JCB AMEX Diners" width="375" height="375">
  </div>
</section>

<?php
// #access
?>
<section id="access" class="access common__section">
  <h2 class="access__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/access_title.png" alt="店舗情報・アクセス" width="375" height="106">
  </h2>
  <table class="access__table">
    <thead>
      <tr>
        <th class="access__table__th">項目</th>
        <th class="access__table__th">詳細</th>
      </tr>
    </thead>
    <tbody>
      <tr class="access__table__tr">
        <th class="access__table__th">[店　　名]</th>
        <td class="access__table__td large">LEGEND　～レジェンド～</td>
      </tr>
      <tr class="access__table__tr">
        <th class="access__table__th">[住　　所]</th>
        <td class="access__table__td">東京都府中市府中町1-6-1 古沢ビルB1</td>
      </tr>
      <tr class="access__table__tr">
        <th class="access__table__th">[営業時間]</th>
        <td class="access__table__td"><?= get_business_hours_range() ?></td>
      </tr>
      <tr class="access__table__tr">
        <th class="access__table__th">[電話番号]</th>
        <td class="access__table__td"><?= get_phone_number() ?></td>
      </tr>
      <tr class="access__table__tr">
        <th class="access__table__th">[最寄り駅]</th>
        <td class="access__table__td">京王線「府中駅」 徒歩１分</td>
      </tr>
    </tbody>
  </table>
  <div class="access__list__container flex__container">
    <ul class="access__contact__list flex__item grid__container">
      <li class="access__contact__item grid__item">
        <a href="<?= MAP_URL_LEGEND ?>" target="_blank" class="access__contact__item__link">
          <i class="fa-solid fa-location-dot"></i>
        </a>
      </li>
      <li class="access__contact__item grid__item">
        <a href="tel:<?= get_phone_number() ?>" class="access__contact__item__link">
          <i class="fa-solid fa-phone"></i>
        </a>
      </li>
    </ul>
    <ul class="access__sns__list flex__item grid__container">
      <li class="access__sns__item grid__item">
        <a href="<?= get_sns_line_url() ?>" class="access__sns__item__link">
          <i class="fa-brands fa-line"></i>
        </a>
      </li>
      <li class="access__sns__item grid__item">
        <a href="<?= get_sns_instagram_url() ?>" class="access__sns__item__link">
          <i class="fa-brands fa-instagram"></i>
        </a>
      </li>
      <li class="access__sns__item grid__item">
        <a href="<?= get_sns_tiktok_url() ?>" class="access__sns__item__link">
          <i class="fa-brands fa-tiktok"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="access__map common__width">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.2558333345746!2d139.47476547623106!3d35.67070213055162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018e4fb4913a45b%3A0xdacbfd5e171ef2a2!2zQ0xVQiBMRUdFTkQgKOODrOOCuOOCp-ODs-ODiSk!5e0!3m2!1sja!2sjp!4v1705383417778!5m2!1sja!2sjp" width="600" height="450" style="border:0;" loading="lazy" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>

<?php
// #cast-blog
$args = array(
  'post_type' => 'post',
  // 'category_name' => 'cast',
  'posts_per_page' => 5,
);

$the_query = new WP_Query($args);
?>
<section id="cast-blog" class="cast__blog common__section">
  <h2 class="cast__blog__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_title.png" alt="キャスト ブログ" width="375" height="106">
  </h2>
  <?php if ($the_query->have_posts()) : ?>
    <ul class="cast__blog__list common__width">
      <?php while ($the_query->have_posts()) : $the_query->the_post();
        // 文字数制限
        $title = get_the_title();
        $title = wp_trim_words(get_the_title(), 18, '…');
        $content = get_the_content('', false, '');
        $content = wp_strip_all_tags($content);
      ?>
        <li class="cast__blog__item">
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
              <p class="cast__blog__item__author">
                <?php the_author_meta('nickname'); ?>
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
  <?php wp_reset_postdata(); ?>
  <a href="<?= home_url('/archive-blog') ?>" class="cast__blog__button">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cast_blog_button.png" alt="もっと見る" width="375" height="375" loading="lazy">
  </a>
</section>

<?php get_footer(); ?>