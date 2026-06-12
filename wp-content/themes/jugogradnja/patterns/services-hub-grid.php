<?php
/**
 * Title: Услуге — четири стуба
 * Slug: jugogradnja/services-hub-grid
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();

$cards = [
    [
        'img'   => $t . '/assets/images/photos/service-inzenjering.webp',
        'imgsm' => $t . '/assets/images/photos/service-inzenjering-sm.webp',
        'title' => 'Изградња објеката',
        'url'   => home_url( '/usluge/inzenjering/' ),
        'alt'   => 'Изградња објеката',
    ],
    [
        'img'   => $t . '/assets/images/photos/service-visokogradnja.webp',
        'imgsm' => $t . '/assets/images/photos/service-visokogradnja-sm.webp',
        'title' => 'Реконструкција и санација',
        'url'   => home_url( '/usluge/visokogradnja/' ),
        'alt'   => 'Реконструкција и санација',
    ],
    [
        'img'   => $t . '/assets/images/photos/service-investicije.webp',
        'imgsm' => $t . '/assets/images/photos/service-investicije-sm.webp',
        'title' => 'Инвестиције и развој пројеката',
        'url'   => home_url( '/usluge/rekonstrukcija/' ),
        'alt'   => 'Инвестиције и развој пројеката',
    ],
    [
        'img'   => $t . '/assets/images/photos/service-enterijer.webp',
        'imgsm' => $t . '/assets/images/photos/service-enterijer-sm.webp',
        'title' => 'Дизајн и опремање ентеријера',
        'url'   => home_url( '/usluge/enterijer/' ),
        'alt'   => 'Дизајн и опремање ентеријера',
    ],
];
?>
<!-- wp:html -->
<section class="jg-services jg-services--hub">
  <div class="jg-services__inner">
    <h2 class="jg-section-heading" style="text-align:center">Четири стуба нашег пословања</h2>
    <div class="jg-services__grid">
      <?php foreach ( $cards as $card ) : ?>
      <a class="jg-service-card" href="<?= esc_url( $card['url'] ) ?>">
        <picture>
          <source media="(max-width:640px)" srcset="<?= esc_url( $card['imgsm'] ) ?>" type="image/webp">
          <img class="jg-service-card__img" src="<?= esc_url( $card['img'] ) ?>" alt="<?= esc_attr( $card['alt'] ) ?>" width="688" height="500" loading="lazy">
        </picture>
        <div class="jg-service-card__overlay" aria-hidden="true"></div>
        <div class="jg-service-card__body">
          <h3 class="jg-service-card__title"><?= esc_html( $card['title'] ) ?></h3>
          <span class="jg-service-card__cta">Детаљније →</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
