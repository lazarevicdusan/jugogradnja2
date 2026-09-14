<?php
/**
 * Title: Каријере - Отворене позиције
 * Slug: jugogradnja/careers-positions
 * Categories: jugogradnja
 * Inserter: true
 */
$positions_url = esc_url( home_url( '/karijera/pozicije/' ) );

$positions = [
    __( 'Инжењер техничке припреме', 'jugogradnja' ),
    __( 'Машински инжењер', 'jugogradnja' ),
    __( 'Електроинжењер', 'jugogradnja' ),
    __( 'Шеф градилишта', 'jugogradnja' ),
];
?>
<!-- wp:html -->
<section class="jg-careers-positions">
  <div class="jg-careers-positions__inner">
    <h2 class="jg-careers-positions__heading"><?= esc_html__( 'Отворене позиције', 'jugogradnja' ) ?></h2>
    <div class="jg-positions-grid">
      <?php foreach ( $positions as $pos ) : ?>
      <a class="jg-position-card" href="<?= $positions_url ?>">
        <span class="jg-position-card__bullet" aria-hidden="true"></span>
        <span class="jg-position-card__title"><?= esc_html( $pos ) ?></span>
      </a>
      <?php endforeach; ?>
    </div>
    <div class="jg-careers-positions__cta">
      <a class="jg-careers-positions__all-link" href="<?= $positions_url ?>"><?= esc_html__( 'Погледајте све позиције →', 'jugogradnja' ) ?></a>
    </div>
  </div>
</section>
<!-- /wp:html -->
