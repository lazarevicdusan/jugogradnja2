<?php
/**
 * Title: О нама - херо
 * Slug: jugogradnja/about-intro
 * Categories: jugogradnja
 * Inserter: true
 */
$t   = get_template_directory_uri();
$img = esc_url( $t . '/assets/images/photos/about-hero.webp' );
?>
<!-- wp:html -->
<section class="jg-about-hero">
  <div class="jg-about-hero__bg">
    <img src="<?= $img ?>" width="1919" height="865" alt="<?= esc_attr__( 'Градилиште Југоградње', 'jugogradnja' ) ?>" loading="eager" fetchpriority="high">
  </div>
  <div class="jg-about-hero__overlay">
    <h1 class="jg-about-hero__title"><?= esc_html__( 'Радимо. Градимо. Од 1992. године', 'jugogradnja' ) ?></h1>
    <p class="jg-about-hero__sub"><?= esc_html__( 'Градимо поверење, стварамо трајне вредности', 'jugogradnja' ) ?></p>
  </div>
</section>
<!-- /wp:html -->
