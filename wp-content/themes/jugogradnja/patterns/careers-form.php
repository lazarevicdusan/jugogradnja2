<?php
/**
 * Title: Каријере — Пријава
 * Slug: jugogradnja/careers-form
 * Categories: jugogradnja
 * Inserter: true
 */
?>
<!-- wp:html -->
<section class="jg-careers-form">
  <div class="jg-careers-form__inner">
    <h2 class="jg-careers-form__heading">Пошаљите пријаву</h2>
    <div class="jg-careers-form__card">
      <form class="jg-apply-form" method="post" enctype="multipart/form-data" novalidate>
        <?php wp_nonce_field( 'jg_apply_form', 'jg_apply_nonce' ); ?>
        <div class="jg-apply-form__row jg-apply-form__row--2col">
          <div class="jg-apply-form__field">
            <label class="jg-apply-form__label" for="apply-name">Ime i prezime <span aria-hidden="true">*</span></label>
            <input class="jg-apply-form__input" type="text" id="apply-name" name="apply_name" required autocomplete="name" placeholder="Ваше ime">
          </div>
          <div class="jg-apply-form__field">
            <label class="jg-apply-form__label" for="apply-email">Емаил адреса <span aria-hidden="true">*</span></label>
            <input class="jg-apply-form__input" type="email" id="apply-email" name="apply_email" required autocomplete="email" placeholder="vasa@email.com">
          </div>
        </div>
        <div class="jg-apply-form__row jg-apply-form__row--2col">
          <div class="jg-apply-form__field">
            <label class="jg-apply-form__label" for="apply-phone">Телефон</label>
            <input class="jg-apply-form__input" type="tel" id="apply-phone" name="apply_phone" autocomplete="tel" placeholder="+381 11 123 4567">
          </div>
          <div class="jg-apply-form__field">
            <label class="jg-apply-form__label" for="apply-position">Позиција за коју конкуришете <span aria-hidden="true">*</span></label>
            <input class="jg-apply-form__input" type="text" id="apply-position" name="apply_position" required placeholder="Грађевински инжењер">
          </div>
        </div>
        <div class="jg-apply-form__field">
          <label class="jg-apply-form__label" for="apply-motivation">Мотивационо писмо</label>
          <textarea class="jg-apply-form__textarea" id="apply-motivation" name="apply_motivation" rows="6" placeholder="Зашто желите да радите са нама..."></textarea>
        </div>
        <div class="jg-apply-form__field">
          <label class="jg-apply-form__label" for="apply-cv">CV (PDF) са фотографијом</label>
          <div class="jg-apply-form__upload-area">
            <input class="jg-apply-form__file" type="file" id="apply-cv" name="apply_cv" accept=".pdf">
            <label class="jg-apply-form__upload-label" for="apply-cv">
              <span class="jg-apply-form__upload-icon" aria-hidden="true">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><polyline points="17 8 12 3 7 8" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><line x1="12" y1="3" x2="12" y2="15" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
              <span class="jg-apply-form__upload-text">Кликните или превуците фајл овде</span>
              <span class="jg-apply-form__upload-hint">Радна биографија на српском језику са фотографијом</span>
            </label>
          </div>
        </div>
        <button class="jg-apply-form__submit" type="submit">ПОШАЉИТЕ ПРИЈАВУ</button>
      </form>
    </div>
  </div>
</section>
<!-- /wp:html -->
