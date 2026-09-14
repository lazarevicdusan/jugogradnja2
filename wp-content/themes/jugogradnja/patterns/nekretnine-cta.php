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
    <h2 class="jg-nekretnine-cta__heading"><?= esc_html__( 'Нисте пронашли оно што тражите?', 'jugogradnja' ) ?></h2>
    <p class="jg-nekretnine-cta__sub"><?= esc_html__( 'Контактирајте нас и наш тим ће вам помоћи да пронађете савршену некретнину или продате вашу.', 'jugogradnja' ) ?></p>
    <a class="jg-btn jg-btn--gold jg-nekretnine-cta__btn" href="<?= $contact_url ?>"><?= esc_html__( 'КОНТАКТИРАЈТЕ НАС', 'jugogradnja' ) ?></a>
  </div>
</section>
<!-- /wp:html -->
