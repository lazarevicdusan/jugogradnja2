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
        'title' => 'Стабилно и дугорочно запослење',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-briefcase.svg',
        'title' => 'Рад на великим и значајним пројектима',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-growth.svg',
        'title' => 'Могућност напредовања',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-book.svg',
        'title' => 'Континуиране обуке и усавршавање',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-team.svg',
        'title' => 'Подршку стручног тима',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-career-check.svg',
        'title' => 'Савремене услове рада',
    ],
];
?>
<!-- wp:html -->
<section class="jg-careers-benefits">
  <div class="jg-careers-benefits__inner">
    <h2 class="jg-section-heading" style="text-align:center">Шта нудимо</h2>
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
