<?php
/**
 * Title: Ентеријер - Херо
 * Slug: jugogradnja/enterijer-hero
 * Categories: jugogradnja
 * Inserter: true
 */
$t    = get_template_directory_uri();
$hero = esc_url( $t . '/assets/images/photos/enterijer-hero.jpg' );
?>
<!-- wp:html -->
<section class="jg-svc-hero" aria-label="Дизајн и опремање ентеријера">
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
      <h1 class="jg-svc-hero__title">Дизајн и опремање ентеријера</h1>
      <p class="jg-svc-hero__sub">Комплетно опремање ваших инвестиционих пројеката (хотела, стамбених и пословних зграда) висококвалитетним уградним намештајем по мери, у сарадњи са реномираним глобалним партнерима.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->
