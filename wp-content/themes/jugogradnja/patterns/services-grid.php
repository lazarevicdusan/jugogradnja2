<?php
/**
 * Title: Četiri stuba — mreža usluga
 * Slug: jugogradnja/services-grid
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();
$services = [
    [
        'img'   => $t . '/assets/images/photos/service-inzenjering.webp',
        'imgsm' => $t . '/assets/images/photos/service-inzenjering-sm.webp',
        'title' => 'Инжењеринг',
        'url'   => home_url( '/usluge/inzenjering/' ),
        'alt'   => 'Инжењеринг',
    ],
    [
        'img'   => $t . '/assets/images/photos/service-visokogradnja.webp',
        'imgsm' => $t . '/assets/images/photos/service-visokogradnja-sm.webp',
        'title' => 'Висоградња',
        'url'   => home_url( '/usluge/visokogradnja/' ),
        'alt'   => 'Висоградња',
    ],
    [
        'img'   => $t . '/assets/images/photos/service-investicije.webp',
        'imgsm' => $t . '/assets/images/photos/service-investicije-sm.webp',
        'title' => 'Реконструкција и адаптација',
        'url'   => home_url( '/usluge/rekonstrukcija/' ),
        'alt'   => 'Реконструкција и адаптација',
    ],
    [
        'img'   => $t . '/assets/images/photos/service-enterijer.webp',
        'imgsm' => $t . '/assets/images/photos/service-enterijer-sm.webp',
        'title' => 'Услуге ентеријера',
        'url'   => home_url( '/usluge/enterijer/' ),
        'alt'   => 'Услуге ентеријера',
    ],
];
?>
<!-- wp:html -->
<section class="jg-services">
  <div class="jg-services__inner">
    <h2 class="jg-section-heading">Четири стуба наше експертизе</h2>
    <div class="jg-services__grid">
      <?php foreach ( $services as $svc ) : ?>
      <a class="jg-service-card" href="<?= esc_url( $svc['url'] ) ?>">
        <picture>
          <source media="(max-width:640px)" srcset="<?= esc_url( $svc['imgsm'] ) ?>" type="image/webp">
          <img class="jg-service-card__img" src="<?= esc_url( $svc['img'] ) ?>" alt="<?= esc_attr( $svc['alt'] ) ?>" width="688" height="500" loading="lazy">
        </picture>
        <div class="jg-service-card__overlay" aria-hidden="true"></div>
        <div class="jg-service-card__body">
          <h3 class="jg-service-card__title"><?= esc_html( $svc['title'] ) ?></h3>
          <span class="jg-service-card__cta">Детаљније →</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
