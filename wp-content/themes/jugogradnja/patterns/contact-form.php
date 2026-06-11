<?php
/**
 * Title: Контакт — форма и мапа
 * Slug: jugogradnja/contact-form
 * Categories: jugogradnja
 * Inserter: true
 */
$nonce_action = wp_create_nonce( 'jg_contact_form' );
?>
<!-- wp:html -->
<section class="jg-contact-form-section">
  <div class="jg-contact-form-section__inner">
    <div class="jg-contact-form-card">
      <h2 class="jg-contact-form-card__heading">Контакт форма</h2>
      <p class="jg-contact-form-card__sub">Пошаљите нам поруку и одговорићемо вам у најкраћем року</p>
      <form class="jg-form" method="post" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>">
        <input type="hidden" name="action" value="jg_contact">
        <input type="hidden" name="_wpnonce" value="<?= esc_attr( $nonce_action ) ?>">
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-name">Ime i prezime *</label>
          <input class="jg-form__input" id="jg-name" type="text" name="jg_name" placeholder="Унесите ваше ime i prezime" required autocomplete="name">
        </div>
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-email">Имејл *</label>
          <input class="jg-form__input" id="jg-email" type="email" name="jg_email" placeholder="vasa@email.com" required autocomplete="email">
        </div>
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-message">Порука *</label>
          <textarea class="jg-form__textarea" id="jg-message" name="jg_message" placeholder="Унесите вашу поруку..." required></textarea>
        </div>
        <button class="jg-form__submit" type="submit">ПОШАЉИТЕ ПОРУКУ</button>
      </form>
    </div>
  </div>
</section>

<section class="jg-contact-map">
  <div class="jg-contact-map__inner">
    <h2 class="jg-section-heading" style="text-align:center">Пронађите нас</h2>
    <div class="jg-map-wrapper">
      <iframe
        src="https://maps.google.com/maps?q=Пуковника+Пејовића+7а+Београд&output=embed"
        title="Локација Југоградња"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
      </iframe>
    </div>
    <div class="jg-map-addresses">
      <p class="jg-map-address">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="#253D86" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
        <span><strong>Канцеларије:</strong> Пуковника Пејовића 7а, Београд (08:00 – 16:00)</span>
      </p>
      <p class="jg-map-address">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="#253D86" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
        <span><strong>Стовариште:</strong> Светолика Никачевића бб (07:00 – 15:00)</span>
      </p>
    </div>
  </div>
</section>
<!-- /wp:html -->
