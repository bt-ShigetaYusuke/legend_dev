<?php
$items = range(1, 11);
?>

<section id="counterlady" class="counterlady">
  <h2 class="counterlady__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/counterlady/counterlady_title.png" alt="募集職種">
  </h2>
  <ul class="counterlady__label__list grid__container common__width">
    <?php foreach ($items as $item) : ?>
      <li class="counterlady__label__item grid__item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/counterlady/counterlady_label_item_<?php printf('%02d', $item); ?>.jpg" alt="">
      </li>
    <?php endforeach; ?>
  </ul>
  <ul class="conterlady__workingstyle__list">
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">給与</h3>
      <p class="conterlady__workingstyle__item__text">
        最低時給3,500円~
        各種バックと合わせた平均時給は5,500円以上となります!!
        出勤日数や頑張りに応じてどんどん時給はあがります！
        ・指名バックは売り上げの10%
        ・フリーのドリンクバック10%~20%
        ・待機時給カット一切なし
      </p>
    </li>
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">勤務時間</h3>
      <p class="conterlady__workingstyle__item__text">
        19時~24時（金、土は若干延長）
        週6でも週1でも月1でも何でもOK！遅出勤で3時間だけとかでも
        女の子の都合に合わせて働いていただけます。
        ・体験入店や、店内見学、または面接だけでも歓迎です。
        ・相談だけで他店と比較していただいても構いません。
      </p>
    </li>
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">待遇</h3>
      <div class="grid__container">
        <p class="conterlady__workingstyle__item__text grid__item">・ノルマや営業一切ナシ</p>
        <p class="conterlady__workingstyle__item__text grid__item">・送り代 500円</p>
        <p class="conterlady__workingstyle__item__text grid__item">・貸衣装あり</p>
        <p class="conterlady__workingstyle__item__text grid__item">・日払いOK</p>
        <p class="conterlady__workingstyle__item__text grid__item">・週1~出勤OK</p>
        <p class="conterlady__workingstyle__item__text grid__item">・自由出勤OK</p>
        <p class="conterlady__workingstyle__item__text grid__item">・短期OK</p>
        <p class="conterlady__workingstyle__item__text grid__item">・終電上がりOK</p>
        <p class="conterlady__workingstyle__item__text grid__item">・学生歓迎</p>
        <p class="conterlady__workingstyle__item__text grid__item">・体験入店歓迎</p>
      </div>
    </li>
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">店休日</h3>
      <p class="conterlady__workingstyle__item__text">年末年始、その他店舗が決めた日</p>
    </li>
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">勤務地</h3>
      <div class="grid__container">
        <p class="conterlady__workingstyle__item__text">
          東京都府中市府中町1-6-1 古沢ビルB1
          京王線「府中駅」徒歩1分
        </p>
        <div class="conterlady__workingstyle__item__map">
          <i class="fa-solid fa-location-dot"></i>map
        </div>
      </div>
    </li>
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">体験入店</h3>
      <p class="conterlady__workingstyle__item__text">
        カウンターレディーの体験入店を随時受け付けております。
        時給3,500円
        通常のガールズバーと違い水着が衣装です。
        そのため時給は他店よりも高額になっています。
      </p>
    </li>
    <li class="conterlady__workingstyle__item">
      <h3 class="conterlady__workingstyle__item__title">採用までの流れ</h3>
      <p class="conterlady__workingstyle__item__text">
        1. 電話、LINE、メールにてお問い合わせください
        2. 面接、体験入店
        3. 採用
      </p>
    </li>
  </ul>
</section>