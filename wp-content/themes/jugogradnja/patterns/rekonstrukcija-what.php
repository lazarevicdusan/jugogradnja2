<?php
/**
 * Title: Реконструкција - Шта радимо
 * Slug: jugogradnja/rekonstrukcija-what
 * Categories: jugogradnja
 * Inserter: true
 */
$t        = get_template_directory_uri();
$services = [
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-rekonstrukcija.svg',
        'title' => __( 'Реконструкција објеката', 'jugogradnja' ),
        'desc'  => __( 'Обнова јавних установа и пословних зграда у складу са потребама корисника.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-sanacija.svg',
        'title' => __( 'Санација објеката под заштитом', 'jugogradnja' ),
        'desc'  => __( 'Интервенције и очување објеката под заштитом уз поштовање конзерваторских услова и првобитног изгледа.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-adaptacija.svg',
        'title' => __( 'Адаптација јавних и пословних простора', 'jugogradnja' ),
        'desc'  => __( 'Функционално преуређење и модернизација ентеријера ради боље искоришћености капацитета.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-rek-energetska.svg',
        'title' => __( 'Енергетска ефикасност', 'jugogradnja' ),
        'desc'  => __( 'Уградња савремених материјала и система који омогућавају економично коришћење енергије уз дугорочну исплативост.', 'jugogradnja' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-inv-services jg-inv-services--gray">
  <div class="jg-inv-services__inner">
    <h2 class="jg-inv-services__heading"><?= esc_html__( 'Шта радимо', 'jugogradnja' ) ?></h2>
    <div class="jg-inv-services__grid">
      <?php foreach ( $services as $s ) : ?>
      <div class="jg-inv-service-card">
        <div class="jg-inv-service-card__icon-wrap">
          <img src="<?= esc_url( $s['icon'] ) ?>" alt="" aria-hidden="true">
        </div>
        <h3 class="jg-inv-service-card__title"><?= esc_html( $s['title'] ) ?></h3>
        <p class="jg-inv-service-card__desc"><?= esc_html( $s['desc'] ) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
