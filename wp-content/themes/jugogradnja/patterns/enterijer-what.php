<?php
/**
 * Title: Ентеријер - Шта опремамо
 * Slug: jugogradnja/enterijer-what
 * Categories: jugogradnja
 * Inserter: true
 */
$t        = get_template_directory_uri();
$services = [
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-stambeni.svg',
        'title' => __( 'Стамбени ентеријери', 'jugogradnja' ),
        'desc'  => __( 'Комплетно опремање пројеката. Опремање хотела, апартмана, стамбених и пословних објеката по пројектним захтевима инвеститора.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-namestaj.svg',
        'title' => __( 'Намештај по мери и ентеријерска решења', 'jugogradnja' ),
        'desc'  => __( 'Дизајнирамо и израђујемо кухиње, плакаре, гардеробере, собна врата, зидне облоге и купатилски намештај прилагођен вашем простору.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-projektovanje.svg',
        'title' => __( 'Пројектовање и извођење радова', 'jugogradnja' ),
        'desc'  => __( 'Свеобухватна решења на једном месту: архитектонски дизајн, стручно планирање, грађевински и инсталатерски радови, као и финални завршни радови уз контролу квалитета.', 'jugogradnja' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-inv-services jg-ent-what">
  <div class="jg-inv-services__inner">
    <h2 class="jg-inv-services__heading"><?= esc_html__( 'Шта опремамо', 'jugogradnja' ) ?></h2>
    <div class="jg-inv-services__grid jg-inv-services__grid--3col">
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
    <p class="jg-ent-what__quote"><?= esc_html__( 'Наш циљ је да сваки простор буде функционалан, леп и место где се људи осећају пријатно и инспирисано.', 'jugogradnja' ) ?></p>
  </div>
</section>
<!-- /wp:html -->
