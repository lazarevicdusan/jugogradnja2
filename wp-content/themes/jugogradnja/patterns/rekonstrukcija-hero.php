<?php
/**
 * Title: Реконструкција — Херо
 * Slug: jugogradnja/rekonstrukcija-hero
 * Categories: jugogradnja
 * Inserter: true
 */
$t    = get_template_directory_uri();
$hero = esc_url( $t . '/assets/images/photos/rekonstrukcija-hero.jpg' );
?>
<!-- wp:html -->
<section class="jg-svc-hero" aria-label="Реконструкција и адаптација">
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
      <h1 class="jg-svc-hero__title">Реконструкција и адаптација</h1>
      <p class="jg-svc-hero__sub">Од конструктивних санација до потпуне пренамене простора, радове изводимо уз очување конструктивне стабилности и усклађеност са савременим техничким стандардима. Кроз контролу сваке фазе извођења обезбеђујемо квалитет, поштовање прописа и дугорочну вредност објекта.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->
