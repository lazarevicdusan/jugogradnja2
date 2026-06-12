<?php
/**
 * Title: Инвестиције — Херо
 * Slug: jugogradnja/investicije-hero
 * Categories: jugogradnja
 * Inserter: true
 */
$t    = get_template_directory_uri();
$hero = esc_url( $t . '/assets/images/photos/investicije-hero.jpg' );
?>
<!-- wp:html -->
<section class="jg-svc-hero" aria-label="Инвестиције и развој пројеката">
  <div class="jg-svc-hero__img-wrap">
    <img class="jg-svc-hero__img"
         src="<?= $hero ?>"
         alt=""
         width="1920" height="865"
         loading="eager"
         fetchpriority="high">
  </div>
  <div class="jg-svc-hero__overlay">
    <div class="jg-svc-hero__content">
      <h1 class="jg-svc-hero__title">Инвестиције и развој пројеката</h1>
      <p class="jg-svc-hero__sub">Развој и реализација инвестиционих пројеката, од иницијалне идеје до потпуне изведбе, уз контролу свих фаза, поштовање рокова и дефинисаних стандарда квалитета.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->
