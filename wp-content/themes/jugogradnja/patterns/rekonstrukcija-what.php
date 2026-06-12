<?php
/**
 * Title: Реконструкција — Шта радимо
 * Slug: jugogradnja/rekonstrukcija-what
 * Categories: jugogradnja
 * Inserter: true
 */
$t        = get_template_directory_uri();
$services = [
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-rekonstrukcija.svg',
        'title' => 'Реконструкција објеката',
        'desc'  => 'Обнова јавних установа и пословних зграда у складу са потребама корисника.',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-sanacija.svg',
        'title' => 'Санација објеката под заштитом',
        'desc'  => 'Интервенције и очување објеката под заштитом уз поштовање конзерваторских услова и првобитног изгледа.',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-adaptacija.svg',
        'title' => 'Адаптација јавних и пословних простора',
        'desc'  => 'Функционално преуређење и модернизација ентеријера ради боље искоришћености капацитета.',
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-energetska.svg',
        'title' => 'Енергетска ефикасност',
        'desc'  => 'Уградња савремених материјала и система који омогућавају економично коришћење енергије уз дугорочну исплативост.',
    ],
];
?>
<!-- wp:html -->
<section class="jg-inv-services">
  <div class="jg-inv-services__inner">
    <h2 class="jg-inv-services__heading">Шта радимо</h2>
    <div class="jg-inv-services__grid">
      <?php foreach ( $services as $s ) : ?>
      <div class="jg-inv-service-card">
        <div class="jg-inv-service-card__icon-wrap">
          <img src="<?= esc_url( $s['icon'] ) ?>" width="32" height="32" alt="" aria-hidden="true">
        </div>
        <h3 class="jg-inv-service-card__title"><?= esc_html( $s['title'] ) ?></h3>
        <p class="jg-inv-service-card__desc"><?= esc_html( $s['desc'] ) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
