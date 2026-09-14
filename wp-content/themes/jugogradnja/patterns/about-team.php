<?php
/**
 * Title: О нама - тим
 * Slug: jugogradnja/about-team
 * Categories: jugogradnja
 * Inserter: true
 */
$t   = get_template_directory_uri();
$img = esc_url( $t . '/assets/images/photos/about-team.webp' );

$depts = [
  [ __( 'Техничка припрема', 'jugogradnja' ),          esc_url( $t . '/assets/images/icons/dept-tehnicka.svg' ) ],
  [ __( 'Грађевинска оператива', 'jugogradnja' ),      esc_url( $t . '/assets/images/icons/dept-gradevinska.svg' ) ],
  [ __( 'Логистика', 'jugogradnja' ),                  esc_url( $t . '/assets/images/icons/dept-logistika.svg' ) ],
  [ __( 'Инвестиције', 'jugogradnja' ),                esc_url( $t . '/assets/images/icons/dept-investicije.svg' ) ],
  [ __( 'Финансије и администрација', 'jugogradnja' ), esc_url( $t . '/assets/images/icons/dept-finansije.svg' ) ],
  [ __( 'Контрола пословања', 'jugogradnja' ),         esc_url( $t . '/assets/images/icons/dept-kontrola.svg' ) ],
];
?>
<!-- wp:html -->
<section class="jg-about-team">
  <div class="jg-about-team__wrap">

    <h2 class="jg-about-team__heading"><?= esc_html__( 'Наш тим', 'jugogradnja' ) ?></h2>

    <div class="jg-about-team__inner">

      <div class="jg-about-team__image">
        <img src="<?= $img ?>" width="552" height="500"
             alt="<?= esc_attr__( 'Тим инжењера Југоградње', 'jugogradnja' ) ?>" loading="lazy">
      </div>

      <div class="jg-about-team__content">
        <p class="jg-about-team__body"><?= esc_html__( 'Иза Југоградње стоји искусан менаџерски тим и организација развијана током више од три деценије пословања. Компанија је структурирана кроз кључне секторе - техничку припрему, грађевинску оперативу, логистику, инвестиције, финансије и администрацију, контролу пословања, као и малопродају - што обезбеђује контролу квалитета и ефикасну реализацију у свакој фази пројекта.', 'jugogradnja' ) ?></p>
        <p class="jg-about-team__body"><?= esc_html__( 'Југоградња се ослања на сопствени тим искусних инжењера, мајстора и радника са вишедеценијским искуством у предузећу, као и на стални тим стручних коопераната који гарантују квалитет и поуздану реализацију сваког пројекта.', 'jugogradnja' ) ?></p>

        <div class="jg-dept-cards">
          <?php foreach ( $depts as $d ) : ?>
          <div class="jg-dept-card">
            <img src="<?= $d[1] ?>" width="32" height="32"
                 alt="" aria-hidden="true" class="jg-dept-card__icon">
            <span class="jg-dept-card__label"><?= esc_html( $d[0] ) ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- /wp:html -->

<!-- wp:html -->
<section class="jg-cta-banner">
  <div class="jg-cta-banner__inner">
    <p class="jg-cta-banner__heading"><?= esc_html__( 'Тражите посао - погледајте нашу страницу Каријере', 'jugogradnja' ) ?></p>
    <a href="/karijere" class="jg-btn jg-btn--gold"><?= esc_html__( 'Каријере', 'jugogradnja' ) ?></a>
  </div>
</section>
<!-- /wp:html -->
