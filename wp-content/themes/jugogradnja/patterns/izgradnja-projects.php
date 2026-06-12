<?php
/**
 * Title: Изградња — Наши грађевински пројекти
 * Slug: jugogradnja/izgradnja-projects
 * Categories: jugogradnja
 * Inserter: true
 */
$t        = get_template_directory_uri();
$icon_pin = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_cal = esc_url( $t . '/assets/images/icons/icon-proj-calendar.svg' );

$projects = [
    [
        'img'      => $t . '/assets/images/photos/proj-romuliana.jpg',
        'title'    => 'Ромулијана',
        'location' => 'Аранђеловац',
        'year'     => '2024–2025',
        'desc'     => 'Укупна БРГП објекта је преко 8.500 метара квадратних, од чега је новоградња (6. спрат и анекси) преко 1.000 квадрата.',
    ],
    [
        'img'      => $t . '/assets/images/photos/proj-nemacki-vrtic.jpg',
        'title'    => 'Немачки вртић у Сање Живановић',
        'location' => 'Београд',
        'year'     => '2024–2025',
        'desc'     => 'Новоградња станова у центру Београда. У мирној улици, на само 400м од парка Мали Ташмајдан.',
    ],
    [
        'img'      => $t . '/assets/images/photos/proj-vladetina22-izgradnja.jpg',
        'title'    => 'Владетина 22',
        'location' => 'Београд, Дубровачка',
        'year'     => '2024–2025',
        'desc'     => 'Изградња стамбено-пословног објекта спратности 2По+П+5+Пс у „срцу" Дорћола.',
    ],
];
$ref_url = esc_url( get_permalink( get_page_by_path( 'reference' ) ) );
?>
<!-- wp:html -->
<section class="jg-inv-projects">
  <div class="jg-inv-projects__inner">
    <h2 class="jg-inv-projects__heading">Наши грађевински пројекти</h2>

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
