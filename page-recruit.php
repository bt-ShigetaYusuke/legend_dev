<?php
// paramによってリンク変更
$params = ['counter-lady', 'feed-driver', 'waiter'];
$links = [];

foreach ($params as $param) {
  if (isset($_GET['param']) && $_GET['param'] == $param) {
    $links[$param] = '#' . $param;
  } else {
    $links[$param] = home_url('/recruit?param=' . $param);
  }
}
?>

<?php get_header(); ?>

<main id="page-recruit" class="main">

  <h2 class="recruit__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit_title.png" alt="求人情報">
  </h2>

  <section class="banner">
    <a href="<?= $links['counter-lady'] ?>" class="banner__img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_img.png" alt="キャスト募集中">
    </a>
  </section>

  <section class="recruitmenttype">
    <h2 class="recruitmenttype__title">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruitmenttype_title.png" alt="募集職種">
    </h2>
    <ul class="recruitmenttype__list grid__container common__width">
      <?php
      $job_titles = [
        'counter-lady' => 'カウンターレディー',
        'feed-driver' => '送りドライバー',
        'waiter' => 'ウェイター・ウェイトレス'
      ];
      foreach ($job_titles as $param => $title) : ?>
        <li class="recruitmenttype__item grid__item">
          <a href="<?= $links[$param] ?>" class="recruitmenttype__item__link common__link">
            <p class="recruitmenttype__item__link__text"><?= $title ?></p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>

  <?php
  // paramによって各テンプレートを呼び出す
  if (isset($_GET['param']) && in_array($_GET['param'], $params)) {
    get_template_part('element/recruit/' . $_GET['param']);
  }
  ?>

  <?php
  // #recruit-apply
  $recruit_apply_items = [
    'phone' => [
      'link' => 'tel:' . get_phone_number(),
      'img' => get_template_directory_uri() . '/assets/img/recruit/recruitapply_item_link_01.png',
      'alt' => '電話で応募'
    ],
    'line' => [
      'link' => get_sns_line_url(),
      'img' => get_template_directory_uri() . '/assets/img/recruit/recruitapply_item_link_02.png',
      'alt' => 'LINEで応募'
    ],
    // 'mail' => [
    //   'link' => 'mailto:' . get_recruit_email(),
    //   'img' => get_template_directory_uri() . '/assets/img/recruit/recruitapply_item_link_03.png',
    //   'alt' => 'メールで応募'
    // ],
    // 'form' => [
    //   'link' => '#recruit-form',
    //   'img' => get_template_directory_uri() . '/assets/img/recruit/recruitapply_item_link_04.png',
    //   'alt' => 'WEBから応募'
    // ],
  ];
  ?>

  <?php
  // #recruit-apply
  ?>
  <section id="recruit-apply" class="recruitapply">
    <h2 class="recruitapply__title">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/recruitapply_title.png" alt="まずはお気軽にお問い合わせください!">
    </h2>
    <ul class="recruitapply__list">
      <?php foreach ($recruit_apply_items as $item) : ?>
        <li class="recruitapply__item">
          <a href="<?= $item['link'] ?>" class="recruitapply__item__link">
            <img src="<?= $item['img'] ?>" alt="<?= $item['alt'] ?>">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>

  <?php
  // #recruit-form
  /*
<section id="recruit-form" class="recruit__form">
  <h2 class="recruit__form__title common__width">WEBから応募</h2>
  <p class="recruit__form__text__top common__width">以下の応募フォームに必要事項を入力のうえ、ご応募ください。</p>
  <?php // contact-form7
  get_template_part('element/recruit/form');
  ?>
</section>
*/
  ?>

</main>

<?php get_footer(); ?>