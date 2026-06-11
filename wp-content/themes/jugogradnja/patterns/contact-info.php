<?php
/**
 * Title: Контакт — информације
 * Slug: jugogradnja/contact-info
 * Categories: jugogradnja
 * Inserter: true
 */
$icon_loc  = '<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>';
$icon_tel  = '<path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z" fill="currentColor"/>';
$icon_mail = '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" fill="none"/><path d="m22 6-10 7L2 6" stroke="currentColor" stroke-width="2"/>';
?>
<!-- wp:html -->
<section class="jg-contact-info">
  <div class="jg-contact-info__inner">
    <h2 class="jg-section-heading" style="text-align:center">Контакт информације</h2>
    <div class="jg-info-grid">

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <svg width="32" height="32" viewBox="0 0 24 24" color="#C5A059"><?= $icon_loc ?></svg>
        </div>
        <h3 class="jg-info-item__title">Канцеларије</h3>
        <p class="jg-info-item__text">Пуковника Пејовића 7а, Београд</p>
        <p class="jg-info-item__text">Радно време: 08:00 – 16:00</p>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <svg width="32" height="32" viewBox="0 0 24 24" color="#C5A059"><?= $icon_loc ?></svg>
        </div>
        <h3 class="jg-info-item__title">Стовариште</h3>
        <p class="jg-info-item__text">Светолика Никачевића бб, Београд</p>
        <p class="jg-info-item__text">(Искључење са аутопута за ТВ Прва и Б92)</p>
        <p class="jg-info-item__text">Радно време: 07:00 – 15:00</p>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <svg width="32" height="32" viewBox="0 0 24 24" color="#C5A059"><?= $icon_tel ?></svg>
        </div>
        <h3 class="jg-info-item__title">Телефон</h3>
        <a class="jg-info-item__text jg-info-item__link" href="tel:+381112630375">+381 11 2630 375</a>
        <a class="jg-info-item__text jg-info-item__link" href="tel:+381648115868">+381 64 811 58 68</a>
      </div>

      <div class="jg-info-item">
        <div class="jg-info-item__icon-wrap" aria-hidden="true">
          <svg width="32" height="32" viewBox="0 0 24 24" color="#C5A059"><?= $icon_mail ?></svg>
        </div>
        <h3 class="jg-info-item__title">Имејл</h3>
        <a class="jg-info-item__text jg-info-item__link" href="mailto:gradnja@jugogradnja.rs">gradnja@jugogradnja.rs</a>
        <a class="jg-info-item__text jg-info-item__link" href="mailto:prodaja@jugogradnja.rs">prodaja@jugogradnja.rs</a>
      </div>

    </div>
  </div>
</section>
<!-- /wp:html -->
