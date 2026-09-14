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
<section class="jg-svc-hero" aria-label="<?= esc_attr__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?>">
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
      <h1 class="jg-svc-hero__title"><?= esc_html__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?></h1>
      <p class="jg-svc-hero__sub"><?= esc_html__( 'Комплетно опремање ваших инвестиционих пројеката (хотела, стамбених и пословних зграда) висококвалитетним уградним намештајем по мери, у сарадњи са реномираним глобалним партнерима.', 'jugogradnja' ) ?></p>
    </div>
  </div>
</section>
<!-- /wp:html -->
