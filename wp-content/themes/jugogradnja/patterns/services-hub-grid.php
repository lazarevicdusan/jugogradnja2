<?php
/**
 * Title: Услуге — четири стуба
 * Slug: jugogradnja/services-hub-grid
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();

$cards = [
    [
        'img'   => $t . '/assets/images/photos/service-inzenjering.webp',
        'title' => 'Инжењеринг',
        'desc'  => 'Развој идејних решења и комплетне техничке документације.',
        'url'   => home_url( '/usluge/inzenjering/' ),
    ],
    [
        'img'   => $t . '/assets/images/photos/service-visokogradnja.webp',
        'title' => 'Извођење радова (Високоградња)',
        'desc'  => 'Специјализовани за болнице, школе, стамбене зграде и индустријске хале.',
        'url'   => home_url( '/usluge/visokogradnja/' ),
    ],
    [
        'img'   => $t . '/assets/images/photos/service-investicije.webp',
        'title' => 'Реконструкција и адаптација',
        'desc'  => 'Очување архитектонског наслеђа уз имплементацију модерних технологија.',
        'url'   => home_url( '/usluge/rekonstrukcija/' ),
    ],
    [
        'img'   => $t . '/assets/images/photos/service-enterijer.webp',
        'title' => 'Унутрашње уређење',
        'desc'  => 'Креирамо функционална уметничка дела која одражавају ваш идентитет.',
        'url'   => home_url( '/usluge/enterijer/' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-services jg-services--hub">
  <div class="jg-services__inner">
    <h2 class="jg-section-heading" style="text-align:center">Четири стуба наше експертизе</h2>
    <div class="jg-services__grid">
      <?php foreach ( $cards as $card ) : ?>
      <a class="jg-service-card" href="<?= esc_url( $card['url'] ) ?>">
        <img class="jg-service-card__img" src="<?= esc_url( $card['img'] ) ?>" alt="<?= esc_attr( $card['title'] ) ?>" width="688" height="500" loading="lazy">
        <div class="jg-service-card__overlay" aria-hidden="true"></div>
        <div class="jg-service-card__body">
          <h3 class="jg-service-card__title"><?= esc_html( $card['title'] ) ?></h3>
          <p class="jg-service-card__desc"><?= esc_html( $card['desc'] ) ?></p>
          <span class="jg-service-card__cta">Сазнајте више →</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
