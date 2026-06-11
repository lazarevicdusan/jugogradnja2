<?php
/**
 * Title: Hero — Početna
 * Slug: jugogradnja/hero
 * Categories: jugogradnja
 * Inserter: true
 */
$img    = esc_url( get_template_directory_uri() . '/assets/images/photos/hero.webp' );
$imgsm  = esc_url( get_template_directory_uri() . '/assets/images/photos/hero-sm.webp' );
$ref    = esc_url( home_url( '/reference/' ) );
?>
<!-- wp:html -->
<section class="jg-hero">
  <picture>
    <source media="(max-width:768px)" srcset="<?= $imgsm ?>" type="image/webp">
    <img class="jg-hero__bg" src="<?= $img ?>" alt="" width="1920" height="893" loading="eager" fetchpriority="high" decoding="async">
  </picture>
  <div class="jg-hero__overlay" aria-hidden="true"></div>
  <div class="jg-hero__content">
    <h1 class="jg-hero__title">Радимо. Градимо. Већ 30 година</h1>
    <p class="jg-hero__sub">Више од 30 година инжењерске прецизности у служби модерне архитектуре.</p>
    <a class="jg-btn-outline" href="<?= $ref ?>">ИСТРАЖИТЕ ПРОЈЕКТЕ</a>
  </div>
  <div class="jg-hero__scroll" aria-hidden="true">
    <div class="jg-hero__scroll-bar"></div>
  </div>
</section>
<!-- /wp:html -->
