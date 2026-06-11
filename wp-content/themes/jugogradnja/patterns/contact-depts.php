<?php
/**
 * Title: Контакт — департмани
 * Slug: jugogradnja/contact-depts
 * Categories: jugogradnja
 * Inserter: true
 */
$depts = [
    [
        'title'  => 'Продаја',
        'email'  => 'prodaja@jugogradnja.rs',
        'phone'  => '+381 64 811 58 68',
        'icon'   => '<path d="M20 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Z" stroke="currentColor" stroke-width="2"/><path d="m22 9-10 7L2 9" stroke="currentColor" stroke-width="2"/>',
    ],
    [
        'title'  => 'Општи упити',
        'email'  => 'gradnja@jugogradnja.rs',
        'phone'  => '+381 11 2630 375',
        'icon'   => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="2"/>',
    ],
    [
        'title'  => 'Извођење радова',
        'email'  => 'gradnja@jugogradnja.rs',
        'phone'  => '+381 11 2630 375',
        'icon'   => '<rect x="2" y="3" width="20" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8 21h8M12 17v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
    ],
    [
        'title'  => 'VELUX системи',
        'email'  => 'prodaja@jugogradnja.rs',
        'phone'  => '+381 64 811 58 68',
        'icon'   => '<rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/><path d="M3 9h18M9 21V9" stroke="currentColor" stroke-width="2"/>',
    ],
];
?>
<!-- wp:html -->
<section class="jg-contact-depts">
  <div class="jg-contact-depts__inner">
    <h2 class="jg-section-heading" style="text-align:center">Департмани</h2>
    <div class="jg-dept-grid">
      <?php foreach ( $depts as $d ) : ?>
      <div class="jg-dept-card">
        <div class="jg-dept-card__icon-wrap" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" color="#C5A059"><?= $d['icon'] ?></svg>
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
