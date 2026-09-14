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
      <h2 class="jg-contact-form-card__heading"><?= esc_html__( 'Контакт форма', 'jugogradnja' ) ?></h2>
      <p class="jg-contact-form-card__sub"><?= esc_html__( 'Пошаљите нам поруку и одговорићемо вам у најкраћем року', 'jugogradnja' ) ?></p>
      <?php if ( isset( $_GET['jg_sent'] ) && 'contact' === $_GET['jg_sent'] ) : ?>
      <div class="jg-form-notice jg-form-notice--success"><?= esc_html__( 'Хвала! Ваша порука је успешно послата.', 'jugogradnja' ) ?></div>
      <?php elseif ( isset( $_GET['jg_error'] ) && 'contact' === $_GET['jg_error'] ) : ?>
      <div class="jg-form-notice jg-form-notice--error"><?= esc_html__( 'Дошло је до грешке. Молимо покушајте поново.', 'jugogradnja' ) ?></div>
      <?php endif; ?>
      <form class="jg-form" id="contact-form" method="post" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>">
        <input type="hidden" name="action" value="jg_contact">
        <input type="hidden" name="_wpnonce" value="<?= esc_attr( $nonce_action ) ?>">
        <input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-name"><?= esc_html__( 'Име и презиме *', 'jugogradnja' ) ?></label>
          <input class="jg-form__input" id="jg-name" type="text" name="jg_name" placeholder="<?= esc_attr__( 'Унесите своје ime и презиме', 'jugogradnja' ) ?>" required autocomplete="name">
        </div>
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-email"><?= esc_html__( 'Емаил *', 'jugogradnja' ) ?></label>
          <input class="jg-form__input" id="jg-email" type="email" name="jg_email" placeholder="vasa@email.com" required autocomplete="email">
        </div>
        <div class="jg-form__group">
          <label class="jg-form__label" for="jg-message"><?= esc_html__( 'Порука *', 'jugogradnja' ) ?></label>
          <textarea class="jg-form__textarea" id="jg-message" name="jg_message" placeholder="<?= esc_attr__( 'Унесите вашу поруку...', 'jugogradnja' ) ?>" required></textarea>
        </div>
        <button class="jg-form__submit" type="submit"><?= esc_html__( 'ПОШАЉИТЕ ПОРУКУ', 'jugogradnja' ) ?></button>
      </form>
    </div>
  </div>
</section>
<!-- /wp:html -->
