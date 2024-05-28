<?php
// #fee-system
?>
<section id="feesystem" class="feesystem common__section">
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