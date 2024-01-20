<footer class="footer">
  <div class="footer__list__container flex__container">
    <ul class="footer__contact__list flex__item grid__container">
      <li class="footer__contact__item grid__item">
        <a href="<?= MAP_URL_LEGEND ?>" target="_blank" class="footer__contact__item__link">
          <i class="fa-solid fa-location-dot"></i>
        </a>
      </li>
      <li class="footer__contact__item grid__item">
        <a href="tel:<?= get_phone_number() ?>" class="footer__contact__item__link">
          <i class="fa-solid fa-phone"></i>
        </a>
      </li>
    </ul>
    <ul class="footer__sns__list flex__item grid__container">
      <li class="footer__sns__item grid__item">
        <a href="<?= get_sns_line_url() ?>" class="footer__sns__item__link">
          <i class="fa-brands fa-line"></i>
        </a>
      </li>
      <li class="footer__sns__item grid__item">
        <a href="<?= get_sns_instagram_url() ?>" class="footer__sns__item__link">
          <i class="fa-brands fa-instagram"></i>
        </a>
      </li>
      <li class="footer__sns__item grid__item">
        <a href="<?= get_sns_tiktok_url() ?>" class="footer__sns__item__link">
          <i class="fa-brands fa-tiktok"></i>
        </a>
      </li>
    </ul>
  </div>
  <p class="footer__copyright">Copyright © CLUB LEGEND All Rights Reserved.</p>
  <?php wp_footer(); ?>
</footer>
</body>

</html>