<?php
/**
 * Title: Каријере - Шта нудимо
 * Slug: jugogradnja/careers-benefits
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();
$benefits = [
    [
        'icon'  => $t . '/assets/images/icons/icon-career-medal.svg',
        'title' => __( 'Стабилно и дугорочно запослење', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-briefcase.svg',
        'title' => __( 'Рад на великим и значајним пројектима', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-growth.svg',
        'title' => __( 'Могућност напредовања', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-book.svg',
        'title' => __( 'Континуиране обуке и усавршавање', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-team.svg',
        'title' => __( 'Подршку стручног тима', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-check.svg',
        'title' => __( 'Савремене услове рада', 'jugogradnja' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-careers-benefits">
  <div class="jg-careers-benefits__inner">
    <h2 class="jg-section-heading" style="text-align:center"><?= esc_html__( 'Шта нудимо', 'jugogradnja' ) ?></h2>
    <div class="jg-benefits-grid">
      <?php foreach ( $benefits as $b ) : ?>
      <div class="jg-benefit-card">
        <div class="jg-benefit-card__icon-wrap" aria-hidden="true">
          <img src="<?= esc_url( $b['icon'] ) ?>" width="40" height="40" alt="" loading="lazy">
        </div>
        <h3 class="jg-benefit-card__title"><?= esc_html( $b['title'] ) ?></h3>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
