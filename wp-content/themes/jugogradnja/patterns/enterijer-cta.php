<?php
/**
 * Title: Ентеријер - Позив на акцију
 * Slug: jugogradnja/enterijer-cta
 * Categories: jugogradnja
 * Inserter: true
 */
$contact_url = esc_url( get_permalink( get_page_by_path( 'kontakt' ) ) );
?>
<!-- wp:html -->
<section class="jg-ent-cta">
  <div class="jg-ent-cta__inner">
    <h2 class="jg-ent-cta__heading">Претворите свој простор у инспирацију</h2>
    <p class="jg-ent-cta__sub">Остварите ентеријер који спаја стил, удобност и функционалност. Наш тим обезбеђује стручност, квалитет и пажњу на сваки детаљ, од прве идеје до финалне имплементације.</p>
    <div class="jg-ent-cta__contacts">
      <a class="jg-ent-cta__contact-link" href="tel:+381116248075">
        <span class="jg-ent-cta__contact-emoji" aria-hidden="true">📞</span>
        <span>Позовите нас: <strong>011 624-80-75</strong></span>
      </a>
      <span class="jg-ent-cta__divider" aria-hidden="true">|</span>
      <a class="jg-ent-cta__contact-link" href="mailto:gradnja@jugogradnja.rs">
        <span class="jg-ent-cta__contact-emoji" aria-hidden="true">✉️</span>
        <span>Е-пошта: <strong>gradnja@jugogradnja.rs</strong></span>
      </a>
    </div>
    <p class="jg-ent-cta__note">Или оставите упит и кренимо заједно ка вашем савршеном простору.</p>
    <a class="jg-btn jg-btn--gold jg-ent-cta__btn" href="<?= $contact_url ?>">
      ЗАТРАЖИТЕ ПОНУДУ
    </a>
  </div>
</section>
<!-- /wp:html -->
