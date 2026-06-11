<?php
/**
 * Title: О нама — тим
 * Slug: jugogradnja/about-team
 * Categories: jugogradnja
 * Inserter: true
 */
$t   = get_template_directory_uri();
$img = esc_url( $t . '/assets/images/photos/about-team.webp' );

$t = get_template_directory_uri();
$depts = [
  [ 'Техничка припрема',          esc_url( $t . '/assets/images/icons/dept-tehnicka.png' ) ],
  [ 'Грађевинска оператива',      esc_url( $t . '/assets/images/icons/dept-gradevinska.png' ) ],
  [ 'Логистика',                  esc_url( $t . '/assets/images/icons/dept-logistika.png' ) ],
  [ 'Инвестиције',                esc_url( $t . '/assets/images/icons/dept-investicije.png' ) ],
  [ 'Финансије и администрација', esc_url( $t . '/assets/images/icons/dept-finansije.png' ) ],
  [ 'Контрола пословања',         esc_url( $t . '/assets/images/icons/dept-kontrola.png' ) ],
];
?>
<!-- wp:html -->
<section class="jg-about-team">
  <div class="jg-about-team__inner">

    <div class="jg-about-team__image">
      <img src="<?= $img ?>" width="552" height="500" alt="Тим инжењера Југоградње" loading="lazy">
    </div>

    <div class="jg-about-team__content">
      <h2 class="jg-section-heading" style="text-align:left">Наш тим</h2>
      <p class="jg-about-team__body">Иза Југоградње стоји искусан менаџерски тим и организација развијана током више од три деценије пословања. Компанија је структурирана кроз кључне секторе — техничку припрему, грађевинску оперативу, логистику, инвестиције, финансије и администрацију, контролу пословања, као и малопродају — што обезбеђује контролу квалитета и ефикасну реализацију у свакој фази пројекта.</p>
      <p class="jg-about-team__body">Југоградња се ослања на сопствени тим искусних инжењера, мајстора и радника са вишедеценијским искуством у предузећу, као и на стални тим стручних коопераната који гарантују квалитет и поуздану реализацију сваког пројекта.</p>

      <div class="jg-dept-cards">
        <?php foreach ( $depts as $d ) : ?>
        <div class="jg-dept-card">
          <img src="<?= $d[1] ?>" width="32" height="32" alt="" aria-hidden="true" class="jg-dept-card__icon">
          <span class="jg-dept-card__label"><?= esc_html( $d[0] ); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<section class="jg-cta-banner">
  <div class="jg-cta-banner__inner">
    <p class="jg-cta-banner__heading">Тражите посао — погледајте нашу страницу Каријере</p>
    <a href="/karijere" class="jg-btn jg-btn--gold">Каријере</a>
  </div>
</section>
<!-- /wp:html -->
