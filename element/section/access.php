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