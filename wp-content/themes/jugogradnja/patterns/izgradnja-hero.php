<?php
/**
 * Title: Изградња — Херо
 * Slug: jugogradnja/izgradnja-hero
 * Categories: jugogradnja
 * Inserter: true
 */
$t    = get_template_directory_uri();
$hero = esc_url( $t . '/assets/images/photos/izgradnja-hero.jpg' );
?>
<!-- wp:html -->
<section class="jg-svc-hero" aria-label="Изградња објеката">
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
      <h1 class="jg-svc-hero__title">Изградња објеката</h1>
      <p class="jg-svc-hero__sub">Реализујемо изградњу објеката кроз јасно дефинисан процес — од припреме и планирања до завршних радова. Ослањајући се на дугогодишње искуство и контролу сваке фазе, обезбеђујемо поуздану реализацију, квалитет изведених радова и поштовање рокова.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->
