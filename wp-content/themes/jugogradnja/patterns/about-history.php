<?php
/**
 * Title: О нама - историја
 * Slug: jugogradnja/about-history
 * Categories: jugogradnja
 * Inserter: true
 */
$milestones = [
  [ '1992', __( 'Оснивање предузећа', 'jugogradnja' ) ],
  [ '1994', __( 'Формирање стоваришта и арматурног погона', 'jugogradnja' ) ],
  [ '1998', __( 'Потписано заступање бренда VELUX и продаја кровних прозора', 'jugogradnja' ) ],
  [ '2000', __( 'Улазак на тржиште јавних набавки', 'jugogradnja' ) ],
  [ '2009', __( 'Сертификације по ISO стандардима и интегрисаном систему управљања квалитетом', 'jugogradnja' ) ],
  [ '2010', __( 'Почетак учешћа на ЕУ тендерима у Србији', 'jugogradnja' ) ],
  [ '2015', __( 'Велике лиценце за извођење објеката под заштитом и од изузетног значаја', 'jugogradnja' ) ],
  [ '2022', __( 'Генерални извођач на пројектима преко 10.000.000 €', 'jugogradnja' ) ],
  [ '2025', __( 'Потписано заступање бренда SOFEYIA за опремање ентеријера', 'jugogradnja' ) ],
  [ __( 'данас', 'jugogradnja' ), __( 'Више од 500 реализованих пројеката, искусно лидерство и менаџмент', 'jugogradnja' ) ],
];
?>
<!-- wp:html -->
<section class="jg-about-history">
  <div class="jg-about-history__inner">
    <h2 class="jg-section-heading"><?= esc_html__( 'Историја компаније', 'jugogradnja' ) ?></h2>
    <p class="jg-about-history__lead"><?= esc_html__( 'Од пројектовања до реализације, водимо пројекте кроз све фазе - уз контролу квалитета, рокова и трошкова. Више од три деценије искуства гарантује поуздану и сигурну реализацију.', 'jugogradnja' ) ?></p>

    <div class="jg-timeline">
      <div class="jg-timeline__line" aria-hidden="true"></div>
      <?php foreach ( $milestones as $m ) : ?>
      <div class="jg-timeline__item">
        <div class="jg-timeline__dot" aria-hidden="true"></div>
        <p class="jg-timeline__entry"><?= esc_html( $m[0] . ' - ' . $m[1] ); ?></p>
      </div>
      <?php endforeach; ?>
      <div class="jg-timeline__tail" aria-hidden="true">
        <span></span><span></span><span></span>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
