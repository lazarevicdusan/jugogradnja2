<?php
/**
 * Title: Референце - статистика
 * Slug: jugogradnja/reference-stats
 * Categories: jugogradnja
 * Inserter: true
 */
$stats = [
    [ 'count' => 500,  'suffix' => '+',     'label' => __( 'Пројеката', 'jugogradnja' ) ],
    [ 'count' => 34,   'suffix' => '+',     'label' => __( 'Година искуства', 'jugogradnja' ) ],
    [ 'count' => 100,  'suffix' => '.000+', 'label' => __( 'м² изграђено', 'jugogradnja' ) ],
];
?>
<!-- wp:html -->
<section class="jg-ref-stats">
  <div class="jg-ref-stats__inner">
    <?php foreach ( $stats as $s ) : ?>
    <div class="jg-ref-stats__item">
      <span class="jg-ref-stats__value jg-stat__number"
            data-count="<?= esc_attr( $s['count'] ) ?>"
            data-suffix="<?= esc_attr( $s['suffix'] ) ?>"
      ><?= esc_html( $s['count'] . $s['suffix'] ) ?></span>
      <span class="jg-ref-stats__label"><?= esc_html( $s['label'] ) ?></span>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<!-- /wp:html -->
