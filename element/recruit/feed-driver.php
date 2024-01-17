<?php
$items = range(1, 11);
?>

<section id="feed-driver" class="feeddriver common__recruit__section">
  <h2 class="feeddriver__title common__title">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/feed-driver/feeddriver_title.png" alt="送りドライバー">
  </h2>
  <ul class="feeddriver__label__list grid__container common__width common__jobtype__label__list">
    <?php foreach ($items as $item) : ?>
      <li class="feeddriver__label__item grid__item common__jobtype__label__item">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit/feed-driver/feeddriver_label_item_<?php printf('%02d', $item); ?>.jpg" alt="">
      </li>
    <?php endforeach; ?>
  </ul>
  <p class="feeddriver__text__top common__width common__jobtype__text__top">
    お客様とお話をしたりお酒を作ったりしていただきます。<br>
    普通のキャバクラと同じです。<br>
    <span class="--asterisk">※お触りやキス等など一切ありません！</span>
  </p>
  <ul class="feeddriver__workingstyle__list common__width common__jobtype__workingstyle__list">
    <li class="feeddriver__workingstyle__item common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">給与</h3>
      <p class="feeddriver__workingstyle__item__text common__jobtype__workingstyle__item__text">
        最低時給<span class="--large">3,500</span>円~<br>
        各種バックと合わせた平均時給は5,500円以上となります!!<br>
        出勤日数や頑張りに応じてどんどん時給はあがります！<br>
        ・指名バックは売り上げの10%<br>
        ・フリーのドリンクバック10%~20%<br>
        ・待機時給カット一切なし
      </p>
    </li>
    <li class="feeddriver__workingstyle__item common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">勤務時間</h3>
      <p class="feeddriver__workingstyle__item__text common__jobtype__workingstyle__item__text">
        <span class="--large">19時~24時</span>（金、土は若干延長）<br>
        週6でも週1でも月1でも何でもOK! 遅出勤で3時間だけとかでも<br>
        女の子の都合に合わせて働いていただけます。<br>
        ・体験入店や、店内見学、または面接だけでも歓迎です。<br>
        ・相談だけで他店と比較していただいても構いません。<br>
      </p>
    </li>
    <li class="feeddriver__workingstyle__item __treatment common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">待遇</h3>
      <div class="grid__container">
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・ノルマや営業一切ナシ</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・送り代 500円</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・貸衣装あり</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・日払いOK</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・週1~出勤OK</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・自由出勤OK</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・短期OK</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・終電上がりOK</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・学生歓迎</p>
        <p class="feeddriver__workingstyle__item__text grid__item common__jobtype__workingstyle__item__text">・体験入店歓迎</p>
      </div>
    </li>
    <li class="feeddriver__workingstyle__item common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">店休日</h3>
      <p class="feeddriver__workingstyle__item__text common__jobtype__workingstyle__item__text">年末年始、その他店舗が決めた日</p>
    </li>
    <li class="feeddriver__workingstyle__item __location common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">勤務地</h3>
      <div class="grid__container">
        <p class="feeddriver__workingstyle__item__text common__jobtype__workingstyle__item__text">
          東京都府中市府中町1-6-1 古沢ビルB1<br>
          京王線「府中駅」徒歩1分
        </p>
        <div class="feeddriver__workingstyle__item__map">
          <i class="fa-solid fa-location-dot"></i>map
        </div>
      </div>
    </li>
    <li class="feeddriver__workingstyle__item common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">体験入店</h3>
      <p class="feeddriver__workingstyle__item__textcommon__jobtype__workingstyle__item__text">
        カウンターレディーの体験入店を随時受け付けております。<br>
        時給<span class="--large">3,500</span>円<br>
        通常のガールズバーと違い水着が衣装です。<br>
        そのため時給は他店よりも高額になっています。
      </p>
    </li>
    <li class="feeddriver__workingstyle__item common__jobtype__workingstyle__item">
      <h3 class="feeddriver__workingstyle__item__title common__jobtype__workingstyle__item__title">採用までの流れ</h3>
      <p class="feeddriver__workingstyle__item__text common__jobtype__workingstyle__item__text">
        1. 電話、LINE、メールにてお問い合わせください<br>
        2. 面接、体験入店<br>
        3. 採用
      </p>
    </li>
  </ul>
</section>