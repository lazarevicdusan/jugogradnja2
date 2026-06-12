<?php
/**
 * Title: Изградња — Шта градимо
 * Slug: jugogradnja/izgradnja-what
 * Categories: jugogradnja
 * Inserter: true
 */
$t          = get_template_directory_uri();
$icon_check = esc_url( $t . '/assets/images/icons/icon-check-gold.svg' );

$categories = [
    [
        'icon'  => $t . '/assets/images/icons/icon-izgr-stambeni.svg',
        'title' => 'Стамбени и пословни комплекси',
        'items' => [
            'Вишеспратне стамбене зграде',
            'Стамбено-пословне целине са пратећим садржајима',
            'Пословни простори и комерцијални центри',
        ],
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-izgr-javna.svg',
        'title' => 'Јавна и спортска инфраструктура',
        'items' => [
            'Клинички центри и болнице',
            'Домови здравља',
            'Образовне установе – школе и дечји вртићи',
            'Спортске сале и спортско-рекреативни центри',
        ],
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-izgr-industrija.svg',
        'title' => 'Индустрија и развој капацитета',
        'items' => [
            'Изградња индустријских погона',
            'Доградња објеката са сложеним техничким захтевима',
            'Проширење производних капацитета',
        ],
    ],
];
?>
<!-- wp:html -->
<section class="jg-izgr-what">
  <div class="jg-izgr-what__inner">
    <h2 class="jg-izgr-what__heading">Шта градимо</h2>
    <div class="jg-izgr-what__list">
      <?php foreach ( $categories as $cat ) : ?>
      <div class="jg-izgr-cat-card">
        <div class="jg-izgr-cat-card__header">
          <div class="jg-izgr-cat-card__icon-wrap">
            <img src="<?= esc_url( $cat['icon'] ) ?>" width="28" height="28" alt="" aria-hidden="true">
          </div>
          <h3 class="jg-izgr-cat-card__title"><?= esc_html( $cat['title'] ) ?></h3>
        </div>
        <ul class="jg-izgr-cat-card__items">
          <?php foreach ( $cat['items'] as $item ) : ?>
          <li class="jg-izgr-cat-card__item">
            <img src="<?= $icon_check ?>" width="20" height="20" alt="" aria-hidden="true">
            <span><?= esc_html( $item ) ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
