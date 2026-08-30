<?php
/**
 * Title: Контакт - форма и мапа
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
      <?php if ( isset( $_GET['jg_sent'] ) && 'contact' === $_GET['jg_sent'] ) : ?>
      <div class="jg-form-notice jg-form-notice--success">Хвала! Ваша порука је успешно послата.</div>
      <?php elseif ( isset( $_GET['jg_error'] ) && 'contact' === $_GET['jg_error'] ) : ?>
      <div class="jg-form-notice jg-form-notice--error">Дошло је до грешке. Молимо покушајте поново.</div>
      <?php endif; ?>
      <form class="jg-form" id="contact-form" method="post" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>">
        <input type="hidden" name="action" value="jg_contact">
        <input type="hidden" name="_wpnonce" value="<?= esc_attr( $nonce_action ) ?>">
        <input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-name">Име и презиме *</label>
          <input class="jg-form__input" id="jg-name" type="text" name="jg_name" placeholder="Унесите своје ime и презиме" required autocomplete="name">
        </div>
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-email">Емаил *</label>
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
<!-- /wp:html -->
