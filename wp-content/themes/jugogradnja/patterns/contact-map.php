<?php
/**
 * Title: Контакт - Пронађите нас
 * Slug: jugogradnja/contact-map
 * Categories: jugogradnja
 * Inserter: true
 */
?>
<!-- wp:html -->
<section class="jg-contact-map">
  <div class="jg-contact-map__inner">
    <h2 class="jg-contact-map__heading"><?= esc_html__( 'Пронађите нас', 'jugogradnja' ) ?></h2>
    <div class="jg-contact-map__grid">

      <div class="jg-contact-map__item">
        <div class="jg-contact-map__frame-wrap">
          <iframe
            class="jg-contact-map__iframe"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2821.6083577193012!2d20.478707699999994!3d44.7670733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a70b400000001%3A0x47ca2e53009ca70f!2z0IjRg9Cz0L7Qs9GA0LDQtNGa0LAg0JHQtdC-0LPRgNCw0LQg0LQu0L4u0L4uIC8vIEp1Z29ncmFkbmphIEJlb2dyYWQgZC5vLm8u!5e1!3m2!1sen!2sus!4v1774960246809!5m2!1sen!2sus"
            width="100%" height="100%"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="<?= esc_attr__( 'Канцеларије - Пуковника Пејовића 1а, Београд', 'jugogradnja' ) ?>"></iframe>
        </div>
        <p class="jg-contact-map__label">
          <svg class="jg-contact-map__pin" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <path d="M10 2C7.24 2 5 4.24 5 7c0 3.75 5 11 5 11s5-7.25 5-11c0-2.76-2.24-5-5-5zm0 6.5A1.5 1.5 0 1 1 10 5a1.5 1.5 0 0 1 0 3z" fill="#C5A059"/>
          </svg>
          <span><strong><?= esc_html__( 'Канцеларије:', 'jugogradnja' ) ?></strong> <?= esc_html__( 'Пуковника Пејовића 1а, Београд (08:00 – 16:00)', 'jugogradnja' ) ?></span>
        </p>
      </div>

      <div class="jg-contact-map__item">
        <div class="jg-contact-map__frame-wrap">
          <iframe
            class="jg-contact-map__iframe"
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1064.6582280034884!2d20.335757928604487!3d44.836540998184375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDTCsDUwJzExLjYiTiAyMMKwMjAnMTEuMSJF!5e1!3m2!1sen!2sus!4v1775046432069!5m2!1sen!2sus"
            width="100%" height="100%"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="<?= esc_attr__( 'Малопродаја - Светолика Никачевића бб, Београд', 'jugogradnja' ) ?>"></iframe>
        </div>
        <p class="jg-contact-map__label">
          <svg class="jg-contact-map__pin" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <path d="M10 2C7.24 2 5 4.24 5 7c0 3.75 5 11 5 11s5-7.25 5-11c0-2.76-2.24-5-5-5zm0 6.5A1.5 1.5 0 1 1 10 5a1.5 1.5 0 0 1 0 3z" fill="#C5A059"/>
          </svg>
          <span><strong><?= esc_html__( 'Малопродаја:', 'jugogradnja' ) ?></strong> <?= esc_html__( 'Светолика Никачевића бб (07:00 – 15:00)', 'jugogradnja' ) ?></span>
        </p>
      </div>

    </div>
  </div>
</section>
<!-- /wp:html -->
