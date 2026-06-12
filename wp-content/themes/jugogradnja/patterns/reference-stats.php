<?php
/**
 * Title: Референце — статистика
 * Slug: jugogradnja/reference-stats
 * Categories: jugogradnja
 * Inserter: true
 */
$stats = [
    [ 'value' => '500+',      'label' => 'Пројеката' ],
    [ 'value' => '34+',       'label' => 'Година искуства' ],
    [ 'value' => '100.000+',  'label' => 'м² изграђено' ],
    [ 'value' => '100%',      'label' => 'Задовољних клијената' ],
];
?>
<!-- wp:html -->
<section class="jg-ref-stats">
  <div class="jg-ref-stats__inner">
    <?php foreach ( $stats as $s ) : ?>
    <div class="jg-ref-stats__item">
      <span class="jg-ref-stats__value"><?= esc_html( $s['value'] ) ?></span>
      <span class="jg-ref-stats__label"><?= esc_html( $s['label'] ) ?></span>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<!-- /wp:html -->
