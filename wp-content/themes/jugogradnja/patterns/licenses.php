<?php
/**
 * Title: Licence i standardi
 * Slug: jugogradnja/licenses
 * Categories: jugogradnja
 * Inserter: true
 */
$t       = get_template_directory_uri();
$icon    = esc_url( $t . '/assets/images/icons/icon-cert.svg' );
$pks     = esc_url( $t . '/assets/images/icons/cert-pks-logo.png' );
$sme     = esc_url( $t . '/assets/images/icons/cert-excellent-sme.png' );
$ref_url = esc_url( home_url( '/reference/' ) );

$iso_list = [
    'ISO 9001:2015',
    'ISO 14001:2015',
    'ISO 45001:2018',
    'ISO 22301:2012',
    'ISO 27001:2013',
    'ISO 37001:2016',
    'ISO 50001:2011',
];

$licence_list = [
    'ИО9ОА1',
    'ІО91А1',
    'ІО90А2',
];
?>
<!-- wp:html -->
<section class="jg-licenses">
  <div class="jg-licenses__inner">

    <div class="jg-section-header">
      <h2 class="jg-section-heading">Лиценце и стандарди</h2>
      <p class="jg-section-sub">Осим презентованих стандарда и лиценци можете погледати <a href="<?= $ref_url ?>">актуелне пројекте</a> наше компаније.</p>
    </div>

    <div class="jg-licenses__grid">

      <div class="jg-cert-card">
        <div class="jg-cert-card__icon-wrap">
          <div class="jg-cert-card__icon-bg">
            <img src="<?= $icon ?>" width="32" height="32" alt="" aria-hidden="true">
          </div>
        </div>
        <h3 class="jg-cert-card__title">Сертификати квалитета</h3>
        <ul class="jg-cert-card__list">
          <?php foreach ( $iso_list as $iso ) : ?>
          <li><?= esc_html( $iso ) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="jg-cert-card">
        <div class="jg-cert-card__icon-wrap">
          <div class="jg-cert-card__icon-bg">
            <img src="<?= $icon ?>" width="32" height="32" alt="" aria-hidden="true">
          </div>
        </div>
        <h3 class="jg-cert-card__title">Велике лиценце</h3>
        <ul class="jg-cert-card__list jg-cert-card__list--license">
          <?php foreach ( $licence_list as $lic ) : ?>
          <li><?= esc_html( $lic ) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="jg-cert-card">
        <div class="jg-cert-card__icon-wrap jg-cert-card__icon-wrap--logo">
          <img src="<?= $pks ?>" width="144" height="64" alt="Привредна комора Србије" loading="lazy">
        </div>
        <h3 class="jg-cert-card__title">Сертификат ПКС</h3>
        <div class="jg-cert-card__badge">
          <img src="<?= $sme ?>" width="280" height="116" alt="Excellent SME сертификат" loading="lazy">
        </div>
      </div>

    </div>
  </div>
</section>
<!-- /wp:html -->
