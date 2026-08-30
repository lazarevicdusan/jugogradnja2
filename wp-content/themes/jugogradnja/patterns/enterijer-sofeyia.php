<?php
/**
 * Title: Ентеријер - Sofeyia партнер
 * Slug: jugogradnja/enterijer-sofeyia
 * Categories: jugogradnja
 * Inserter: true
 */
$t    = get_template_directory_uri();
$logo = esc_url( $t . '/assets/images/photos/sofeyia-logo.png' );
?>
<!-- wp:html -->
<section class="jg-ent-sofeyia">
  <div class="jg-ent-sofeyia__inner">
    <img class="jg-ent-sofeyia__logo"
         src="<?= $logo ?>"
         alt="Sofeyia"
         width="250" height="86"
         loading="lazy">
    <a class="jg-btn jg-btn--gold jg-ent-sofeyia__btn" href="#">САЗНАЈ ВИШЕ</a>
  </div>
</section>
<!-- /wp:html -->
