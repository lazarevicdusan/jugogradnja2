<?php
/**
 * Title: Инвестиције - Шта нудимо
 * Slug: jugogradnja/investicije-services
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();
$services = [
    [
        'icon'  => $t . '/assets/images/icons/icon-inv-stambeni.svg',
        'title' => __( 'Стамбени објекти', 'jugogradnja' ),
        'desc'  => __( 'Стамбени објекти на пажљиво одабраним локацијама, у понуди као изграђени и одмах усељиви, као и објекти у различитим фазама изградње, представљају могућност сигурног инвестирања.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-inv-poslovni.svg',
        'title' => __( 'Пословни простор', 'jugogradnja' ),
        'desc'  => __( 'Савремени и функционални пословни простор прилагођен потребама корисника на привлачним локацијама.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-inv-vikend.svg',
        'title' => __( 'Викенд насеља', 'jugogradnja' ),
        'desc'  => __( 'Наш нови викенд-комплекс у природи дизајниран је као спој одмора у природи и изузетне прилике за дугорочно улагање.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-inv-zemljiste.svg',
        'title' => __( 'Грађевинско земљиште', 'jugogradnja' ),
        'desc'  => __( 'Нудимо стратешко партнерство за развој атрактивне парцеле од 5 хектара на ободу Новог Београда, идеалне за изградњу услужног, спортско-рекреативног или угоститељског комплекса.', 'jugogradnja' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-inv-services">
  <div class="jg-inv-services__inner">
    <h2 class="jg-inv-services__heading"><?= esc_html__( 'Шта нудимо', 'jugogradnja' ) ?></h2>
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
