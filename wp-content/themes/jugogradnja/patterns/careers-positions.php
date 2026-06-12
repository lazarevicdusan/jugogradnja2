<?php
/**
 * Title: Каријере — Отворене позиције
 * Slug: jugogradnja/careers-positions
 * Categories: jugogradnja
 * Inserter: true
 */
$positions_url = esc_url( home_url( '/karijera/' ) );

$positions = [
    'Инжењер техничке припреме',
    'Машински инжењер',
    'Електроинжењер',
    'Шеф градилишта',
];
?>
<!-- wp:html -->
<section class="jg-careers-positions">
  <div class="jg-careers-positions__inner">
    <h2 class="jg-section-heading" style="text-align:center">Отворене позиције</h2>
    <div class="jg-positions-grid">
      <?php foreach ( $positions as $pos ) : ?>
      <a class="jg-position-card" href="<?= $positions_url ?>">
        <span class="jg-position-card__title"><?= esc_html( $pos ) ?></span>
        <span class="jg-position-card__arrow" aria-hidden="true">→</span>
      </a>
      <?php endforeach; ?>
    </div>
    <div class="jg-careers-positions__cta">
      <a class="jg-careers-positions__all-link" href="<?= $positions_url ?>">Погледајте све позиције →</a>
    </div>
  </div>
</section>
<!-- /wp:html -->
