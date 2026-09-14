<?php
/**
 * Title: Ентеријер - Процес рада
 * Slug: jugogradnja/enterijer-process
 * Categories: jugogradnja
 * Inserter: true
 */
$t     = get_template_directory_uri();
$steps = [
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-koncept.svg',
        'title' => __( '1. Концепт и дизајн', 'jugogradnja' ),
        'desc'  => __( 'Кроз консултације анализирамо ваше потребе и заједно креирамо идејно решење које прати вашу визију.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-detalj.svg',
        'title' => __( '2. Детаљно пројектовање', 'jugogradnja' ),
        'desc'  => __( 'Израђујемо прецизне планове, дефинишемо функционалност сваког простора и пажљиво бирамо материјале.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-projektovanje.svg',
        'title' => __( '3. Извођење радова', 'jugogradnja' ),
        'desc'  => __( 'Наш тим стручњака реализује све грађевинске, занатске и инсталатерске радове, пратећи договорене рокове и стандарде квалитета.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-nadzor.svg',
        'title' => __( '4. Надзор и контрола квалитета', 'jugogradnja' ),
        'desc'  => __( 'Пратите сваки корак процеса, како би завршни резултат био савршен, функционалан и безбедан.', 'jugogradnja' ),
    ],
    [
        'icon'  => $t . '/assets/images/icons/icon-ent-zavrsno.svg',
        'title' => __( '5. Завршно опремање', 'jugogradnja' ),
        'desc'  => __( 'Уношење финалних детаља, монтажа ексклузивног Sofeyia уградног намештаја и предаја простора спремног за усељење.', 'jugogradnja' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-ent-process">
  <div class="jg-ent-process__inner">
    <h2 class="jg-ent-process__heading"><?= esc_html__( 'Процес рада', 'jugogradnja' ) ?></h2>
    <div class="jg-ent-process__list">
      <?php foreach ( $steps as $s ) : ?>
      <div class="jg-ent-process__step">
        <div class="jg-ent-process__icon-wrap">
          <img src="<?= esc_url( $s['icon'] ) ?>" width="32" height="32" alt="" aria-hidden="true">
        </div>
        <div class="jg-ent-process__content">
          <h3 class="jg-ent-process__title"><?= esc_html( $s['title'] ) ?></h3>
          <p class="jg-ent-process__desc"><?= esc_html( $s['desc'] ) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="jg-ent-process__quote"><?= esc_html__( 'Циљ нам је да сваки ентеријер буде не само леп, већ и високо функционалан, удобан и инспиративан.', 'jugogradnja' ) ?></p>
  </div>
</section>
<!-- /wp:html -->
