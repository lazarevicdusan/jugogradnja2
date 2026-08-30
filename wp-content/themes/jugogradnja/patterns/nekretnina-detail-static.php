<?php
/**
 * Title: Некретнина - Детаљ (статично)
 * Slug: jugogradnja/nekretnina-detail-static
 * Categories: jugogradnja
 * Inserter: false
 */

$t          = get_template_directory_uri();
$icon_area  = esc_url( $t . '/assets/images/icons/icon-prop-area.svg' );
$icon_rooms = esc_url( $t . '/assets/images/icons/icon-prop-rooms.svg' );
$icon_bed   = esc_url( $t . '/assets/images/icons/icon-prop-bed.svg' );
$icon_pin   = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_check = esc_url( $t . '/assets/images/icons/icon-check-gold.svg' );
$icon_euro  = esc_url( $t . '/assets/images/icons/icon-prop-euro.svg' );
$archive    = esc_url( home_url( '/nekretnine/' ) );
$uploads    = esc_url( content_url( 'uploads/' ) );

$slug = get_post_field( 'post_name', get_the_ID() );

$data = [
  'luksuzan-trosoban-stan' => [
    'title'    => 'Луксузан трособан стан',
    'tip'      => 'Станови',
    'status'   => [ 'label' => 'На продају', 'color' => '#22c55e' ],
    'cena'     => '185.000',
    'lokacija' => 'Дедиње, Београд',
    'povrsina' => '95',
    'sobe'     => '3',
    'spavace'  => '2',
    'sprat'    => '4/6',
    'godina'   => '2023',
    'grejanje' => 'Централно грејање',
    'parking'  => '1 место',
    'excerpt'  => 'Луксузан трособан стан у престижном крају Дедиња са врхунском опремом.',
    'thumb'    => '',
  ],
  'porodicna-kuca-sa-bazenom' => [
    'title'    => 'Породична кућа са базеном',
    'tip'      => 'Куће',
    'status'   => null,
    'cena'     => '420.000',
    'lokacija' => 'Нови Београд',
    'povrsina' => '280',
    'sobe'     => '5',
    'spavace'  => '4',
    'sprat'    => '',
    'godina'   => '2022',
    'grejanje' => '',
    'parking'  => '',
    'excerpt'  => 'Модерна породична кућа са базеном и великим двориштем.',
    'thumb'    => '',
  ],
  'poslovni-prostor-u-centru' => [
    'title'    => 'Пословни простор у центру',
    'tip'      => 'Пословни простор',
    'status'   => [ 'label' => 'На продају', 'color' => '#22c55e' ],
    'cena'     => '450.000',
    'lokacija' => 'Центар, Београд',
    'povrsina' => '185',
    'sobe'     => '6',
    'spavace'  => '0',
    'sprat'    => '3/8',
    'godina'   => '2021',
    'grejanje' => 'Централно грејање',
    'parking'  => '2 места',
    'excerpt'  => 'Луксузан пословни простор у пешачкој зони са одличном осветљеношћу и савременим дизајном.',
    'thumb'    => $uploads . '2026/06/nkr-45-1.jpg',
  ],
];

if ( ! isset( $data[ $slug ] ) ) {
  echo '<p style="padding:120px 24px;text-align:center">Некретнина није пронађена.</p>';
  return;
}

$p = $data[ $slug ];
?>
<!-- wp:html -->
<div class="jg-prop-single">

  <div class="jg-prop-back">
    <div class="jg-prop-back__inner">
      <a class="jg-prop-back__link" href="<?= $archive ?>">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
          <path d="M10 13L5 8L10 3" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Назад на некретнине
      </a>
    </div>
  </div>

  <?php if ( $p['thumb'] ) : ?>
  <div class="jg-prop-gallery">
    <div class="jg-prop-gallery__inner">
      <div class="jg-prop-gallery__main">
        <div class="jg-prop-gallery__slides">
          <div class="jg-prop-gallery__slide is-active">
            <img src="<?= esc_url( $p['thumb'] ) ?>" width="1200" height="700" alt="<?= esc_attr( $p['title'] ) ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="jg-prop-single__content">
    <div class="jg-prop-single__content-inner">

      <div class="jg-prop-single__badges">
        <?php if ( $p['tip'] ) : ?>
        <span class="jg-prop-badge jg-prop-badge--type"><?= esc_html( $p['tip'] ) ?></span>
        <?php endif; ?>
        <?php if ( $p['status'] ) : ?>
        <span class="jg-prop-badge jg-prop-badge--status" style="background:<?= esc_attr( $p['status']['color'] ) ?>"><?= esc_html( $p['status']['label'] ) ?></span>
        <?php endif; ?>
      </div>

      <h1 class="jg-prop-single__title"><?= esc_html( $p['title'] ) ?></h1>

      <div class="jg-prop-single__location">
        <img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
        <span><?= esc_html( $p['lokacija'] ) ?></span>
      </div>

      <div class="jg-prop-single__stats">
        <div class="jg-prop-single__stat-tile">
          <img src="<?= $icon_area ?>" width="32" height="32" alt="" aria-hidden="true">
          <span class="jg-prop-single__stat-value"><?= esc_html( $p['povrsina'] ) ?> м²</span>
          <span class="jg-prop-single__stat-label">Површина</span>
        </div>
        <div class="jg-prop-single__stat-tile">
          <img src="<?= $icon_rooms ?>" width="32" height="32" alt="" aria-hidden="true">
          <span class="jg-prop-single__stat-value"><?= esc_html( $p['sobe'] ) ?></span>
          <span class="jg-prop-single__stat-label">Собе</span>
        </div>
        <?php if ( $p['spavace'] !== '0' ) : ?>
        <div class="jg-prop-single__stat-tile">
          <img src="<?= $icon_bed ?>" width="32" height="32" alt="" aria-hidden="true">
          <span class="jg-prop-single__stat-value"><?= esc_html( $p['spavace'] ) ?></span>
          <span class="jg-prop-single__stat-label">Спаваће собе</span>
        </div>
        <?php endif; ?>
      </div>

      <div class="jg-prop-single__price-bar">
        <img src="<?= $icon_euro ?>" width="20" height="20" alt="" aria-hidden="true">
        <span><?= esc_html( $p['cena'] ) ?></span>
      </div>

      <div class="jg-prop-single__section">
        <h2 class="jg-prop-single__section-heading">Опис</h2>
        <div class="jg-prop-single__description">
          <p><?= esc_html( $p['excerpt'] ) ?></p>
        </div>
      </div>

      <?php if ( $p['sprat'] || $p['godina'] || $p['grejanje'] || $p['parking'] ) : ?>
      <div class="jg-prop-single__section">
        <h2 class="jg-prop-single__section-heading">Додатне информације</h2>
        <div class="jg-prop-single__info-grid">
          <?php if ( $p['sprat'] ) : ?>
          <div class="jg-prop-single__info-row">
            <span class="jg-prop-single__info-label">Спрат</span>
            <span class="jg-prop-single__info-value"><?= esc_html( $p['sprat'] ) ?></span>
          </div>
          <?php endif; ?>
          <?php if ( $p['godina'] ) : ?>
          <div class="jg-prop-single__info-row">
            <span class="jg-prop-single__info-label">Година изградње</span>
            <span class="jg-prop-single__info-value"><?= esc_html( $p['godina'] ) ?></span>
          </div>
          <?php endif; ?>
          <?php if ( $p['grejanje'] ) : ?>
          <div class="jg-prop-single__info-row">
            <span class="jg-prop-single__info-label">Грејање</span>
            <span class="jg-prop-single__info-value"><?= esc_html( $p['grejanje'] ) ?></span>
          </div>
          <?php endif; ?>
          <?php if ( $p['parking'] ) : ?>
          <div class="jg-prop-single__info-row">
            <span class="jg-prop-single__info-label">Паркинг</span>
            <span class="jg-prop-single__info-value"><?= esc_html( $p['parking'] ) ?></span>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>

  <div class="jg-prop-single__interest">
    <div class="jg-prop-single__interest-inner">
      <h2 class="jg-prop-single__interest-heading">Заинтересовани за ову некретнину?</h2>
      <p class="jg-prop-single__interest-sub">Контактирајте нас за додатне информације или закажите обилазак некретнине.</p>
      <div class="jg-prop-single__interest-actions">
        <a class="jg-btn jg-btn--gold" href="<?= esc_url( home_url( '/kontakt/' ) ) ?>">КОНТАКТИРАЈТЕ НАС</a>
        <a class="jg-btn jg-btn--outline-navy" href="<?= $archive ?>">ПОГЛЕДАЈТЕ ЈОШ НЕКРЕТНИНА</a>
      </div>
    </div>
  </div>

</div>
<!-- /wp:html -->
