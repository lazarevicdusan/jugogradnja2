<?php
/**
 * Title: О нама — тим и експертиза
 * Slug: jugogradnja/about-team
 * Categories: jugogradnja
 * Inserter: true
 */
$t   = get_template_directory_uri();
$img = esc_url( $t . '/assets/images/photos/about-team.webp' );
?>
<!-- wp:html -->
<section class="jg-about-team">
  <div class="jg-about-team__inner">
    <div class="jg-about-team__content">
      <h2 class="jg-section-heading" style="text-align:left">Тим и експертиза</h2>
      <div class="jg-about-team__text">
        <p class="jg-about-team__body"><strong>Југоградња се ослања на тим искусних инжењера и стручних извођача</strong> који су основни покретачи квалитета наших радова. Сваки члан тима поседује релевантне лиценце и континуирано унапређује знања кроз обуке, сајмове и стручне курсеве.</p>
        <p class="jg-about-team__body">Наши инжењери и техничари раде у складу са најновијим стандардима и методологијама, обезбеђујући прецизност, ефикасност и поузданост у сваком пројекту. Тимски рад, искуство и стручност омогућавају нам да успешно реализујемо и најзахтевније грађевинске и инжењерске пројекте, а клијентима гарантујемо комплетан и професионалан сервис.</p>
        <div class="jg-team-stats">
          <div class="jg-team-stat">
            <svg class="jg-team-stat__icon" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="16" r="13" stroke="currentColor" stroke-width="2"/><path d="M16 8v8l5 3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <span class="jg-team-stat__value">30+</span>
            <span class="jg-team-stat__label">Година искуства</span>
          </div>
          <div class="jg-team-stat">
            <svg class="jg-team-stat__icon" viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect x="4" y="8" width="24" height="18" rx="1" stroke="currentColor" stroke-width="2"/><path d="M10 8V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="2"/><path d="M4 16h24" stroke="currentColor" stroke-width="2"/></svg>
            <span class="jg-team-stat__value">7</span>
            <span class="jg-team-stat__label">ISO сертификата</span>
          </div>
          <div class="jg-team-stat">
            <svg class="jg-team-stat__icon" viewBox="0 0 32 32" fill="none" aria-hidden="true"><path d="M16 4l2.83 8.72H28l-7.42 5.39 2.83 8.72L16 21.44l-7.42 5.39 2.83-8.72L4 12.72h9.17Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
            <span class="jg-team-stat__value">100%</span>
            <span class="jg-team-stat__label">Лиценцирани</span>
          </div>
        </div>
      </div>
    </div>
    <div class="jg-about-team__image">
      <img src="<?= $img ?>" width="552" height="500" alt="Тим инжењера Југоградње" loading="lazy">
    </div>
  </div>
</section>
<!-- /wp:html -->
