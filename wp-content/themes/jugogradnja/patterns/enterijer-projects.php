<?php
/**
 * Title: Ентеријер — Наши пројекти
 * Slug: jugogradnja/enterijer-projects
 * Categories: jugogradnja
 * Inserter: true
 */
$t        = get_template_directory_uri();
$icon_pin = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_cal = esc_url( $t . '/assets/images/icons/icon-proj-calendar.svg' );

$projects = [
    [
        'img'      => $t . '/assets/images/photos/proj-dedinje.jpg',
        'title'    => 'Стамбена зграда на Дедињу',
        'location' => 'Београд, Дедиње',
        'year'     => '2023',
        'desc'     => 'Луксузна стамбена зграда са 18 станова на најелитнијој локацији у Београду.',
    ],
    [
        'img'      => $t . '/assets/images/photos/proj-old-palace.jpg',
        'title'    => 'Хотел Old Palace',
        'location' => 'Београд',
        'year'     => '2021',
        'desc'     => 'Комплетна реконструкција историјског хотела са очувањем оригиналне фасаде.',
    ],
    [
        'img'      => $t . '/assets/images/photos/proj-terazije.jpg',
        'title'    => 'Пословна зграда Теразије',
        'location' => 'Београд, Теразије',
        'year'     => '2020',
        'desc'     => 'Реконструкција и адаптација пословног простора у центру Београда.',
    ],
];
$ref_url = esc_url( get_permalink( get_page_by_path( 'reference' ) ) );
?>
<!-- wp:html -->
<section class="jg-inv-projects">
  <div class="jg-inv-projects__inner">
    <h2 class="jg-inv-projects__heading">Наши пројекти ентеријера</h2>

    <div class="jg-inv-projects__grid">
      <?php foreach ( $projects as $p ) : ?>
      <a class="jg-inv-proj-card" href="<?= $ref_url ?>">
        <div class="jg-inv-proj-card__img-wrap">
          <img class="jg-inv-proj-card__img"
               src="<?= esc_url( $p['img'] ) ?>"
               alt="<?= esc_attr( $p['title'] ) ?>"
               width="470" height="262"
               loading="lazy">
        </div>
        <div class="jg-inv-proj-card__body">
          <h3 class="jg-inv-proj-card__title"><?= esc_html( $p['title'] ) ?></h3>
          <div class="jg-inv-proj-card__meta">
            <div class="jg-inv-proj-card__meta-row">
              <img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
              <span><?= esc_html( $p['location'] ) ?></span>
            </div>
            <div class="jg-inv-proj-card__meta-row">
              <img src="<?= $icon_cal ?>" width="16" height="16" alt="" aria-hidden="true">
              <span><?= esc_html( $p['year'] ) ?></span>
            </div>
          </div>
          <p class="jg-inv-proj-card__desc"><?= esc_html( $p['desc'] ) ?></p>
          <span class="jg-inv-proj-card__more">Детаљи &rarr;</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="jg-inv-projects__cta">
      <a class="jg-btn jg-btn--gold" href="<?= $ref_url ?>">
        ПОГЛЕДАЈТЕ СВЕ ПРОЈЕКТЕ
      </a>
    </div>
  </div>
</section>
<!-- /wp:html -->
