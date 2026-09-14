<?php
/**
 * Title: Контакт - информације
 * Slug: jugogradnja/contact-info
 * Categories: jugogradnja
 * Inserter: true
 */
$t         = get_template_directory_uri();
$icon_loc  = $t . '/assets/images/icons/icon-location-lg.svg';
$icon_tel  = $t . '/assets/images/icons/icon-phone-lg.svg';
$icon_mail = $t . '/assets/images/icons/icon-email-lg.svg';
?>
<!-- wp:html -->
<section class="jg-contact-info">
  <div class="jg-contact-info__inner">
    <h2 class="jg-section-heading" style="text-align:center"><?= esc_html__( 'Контакт информације', 'jugogradnja' ) ?></h2>
    <div class="jg-info-grid jg-info-grid--5">

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $icon_loc ) ?>" width="32" height="32" alt="" loading="lazy">
        </div>
        <h3 class="jg-info-item__title"><?= esc_html__( 'Канцеларије', 'jugogradnja' ) ?></h3>
        <p class="jg-info-item__text"><?= esc_html__( 'Пуковника Пејовића 1а, Београд', 'jugogradnja' ) ?></p>
        <p class="jg-info-item__text"><?= esc_html__( 'Радно време: 08:00 - 16:00', 'jugogradnja' ) ?></p>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $icon_loc ) ?>" width="32" height="32" alt="" loading="lazy">
        </div>
        <h3 class="jg-info-item__title"><?= esc_html__( 'Малопродаја', 'jugogradnja' ) ?></h3>
        <p class="jg-info-item__text"><?= esc_html__( 'Светолика Никачевића бб, Београд', 'jugogradnja' ) ?></p>
        <p class="jg-info-item__text"><?= esc_html__( '(Искључење са аутопута за ТВ Прва и Б92)', 'jugogradnja' ) ?></p>
        <p class="jg-info-item__text"><?= esc_html__( 'Радно време: 07:00 - 15:00', 'jugogradnja' ) ?></p>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $icon_loc ) ?>" width="32" height="32" alt="" loading="lazy">
        </div>
        <h3 class="jg-info-item__title"><?= esc_html__( 'Регистарска адреса', 'jugogradnja' ) ?></h3>
        <p class="jg-info-item__text"><?= esc_html__( 'Др Велизара Косановића бр. 22, Београд', 'jugogradnja' ) ?></p>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $icon_tel ) ?>" width="32" height="32" alt="" loading="lazy">
        </div>
        <h3 class="jg-info-item__title"><?= esc_html__( 'Телефон', 'jugogradnja' ) ?></h3>
        <a class="jg-info-item__text jg-info-item__link" href="tel:+381116248075">+381 11 624 80 75</a>
        <a class="jg-info-item__text jg-info-item__link" href="tel:+381648115868">+381 64 811 58 68</a>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $icon_mail ) ?>" width="32" height="32" alt="" loading="lazy">
        </div>
        <h3 class="jg-info-item__title"><?= esc_html__( 'Емаил', 'jugogradnja' ) ?></h3>
        <a class="jg-info-item__text jg-info-item__link" href="mailto:prodaja@jugogradnja.rs">prodaja@jugogradnja.rs</a>
        <a class="jg-info-item__text jg-info-item__link" href="mailto:gradnja@jugogradnja.rs">gradnja@jugogradnja.rs</a>
      </div>

    </div>
  </div>
</section>
<!-- /wp:html -->
