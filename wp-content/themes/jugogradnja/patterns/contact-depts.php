<?php
/**
 * Title: Контакт - департмани
 * Slug: jugogradnja/contact-depts
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();
$depts = [
    [
        'title' => __( 'Продаја', 'jugogradnja' ),
        'email' => 'prodaja@jugogradnja.rs',
        'phone' => '+381 64 811 58 68',
        'icon'  => $t . '/assets/images/icons/icon-dept-prodaja.svg',
    ],
    [
        'title' => __( 'Општи упити', 'jugogradnja' ),
        'email' => 'gradnja@jugogradnja.rs',
        'phone' => '+381 11 624 80 75',
        'icon'  => $t . '/assets/images/icons/icon-dept-upiti.svg',
    ],
    [
        'title' => __( 'Извођење радова', 'jugogradnja' ),
        'email' => 'gradnja@jugogradnja.rs',
        'phone' => '+381 11 624 80 75',
        'icon'  => $t . '/assets/images/icons/icon-dept-izvodjenje.svg',
    ],
    [
        'title' => __( 'VELUX системи', 'jugogradnja' ),
        'email' => 'prodaja@jugogradnja.rs',
        'phone' => '+381 64 811 58 68',
        'icon'  => $t . '/assets/images/icons/icon-dept-velux.svg',
    ],
];
?>
<!-- wp:html -->
<section class="jg-contact-depts">
  <div class="jg-contact-depts__inner">
    <h2 class="jg-section-heading" style="text-align:center"><?= esc_html__( 'Департмани', 'jugogradnja' ) ?></h2>
    <div class="jg-dept-grid">
      <?php foreach ( $depts as $d ) : ?>
      <div class="jg-dept-card">
        <div class="jg-dept-card__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $d['icon'] ) ?>" width="28" height="28" alt="" loading="lazy">
        </div>
        <h3 class="jg-dept-card__title"><?= esc_html( $d['title'] ) ?></h3>
        <div class="jg-dept-card__links">
          <a class="jg-dept-card__link" href="mailto:<?= esc_attr( $d['email'] ) ?>"><?= esc_html( $d['email'] ) ?></a>
          <a class="jg-dept-card__link" href="tel:<?= esc_attr( preg_replace( '/\s+/', '', $d['phone'] ) ) ?>"><?= esc_html( $d['phone'] ) ?></a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
