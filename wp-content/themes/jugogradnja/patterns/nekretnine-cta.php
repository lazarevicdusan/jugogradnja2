<?php
/**
 * Title: Некретнине - CTA банер
 * Slug: jugogradnja/nekretnine-cta
 * Categories: jugogradnja
 * Inserter: true
 */
$contact_url = esc_url( home_url( '/kontakt/' ) );
?>
<!-- wp:html -->
<section class="jg-nekretnine-cta">
  <div class="jg-nekretnine-cta__inner">
    <h2 class="jg-nekretnine-cta__heading">Нисте пронашли оно што тражите?</h2>
    <p class="jg-nekretnine-cta__sub">Контактирајте нас и наш тим ће вам помоћи да пронађете савршену некретнину или продате вашу.</p>
    <a class="jg-btn jg-btn--gold jg-nekretnine-cta__btn" href="<?= $contact_url ?>">КОНТАКТИРАЈТЕ НАС</a>
  </div>
</section>
<!-- /wp:html -->
