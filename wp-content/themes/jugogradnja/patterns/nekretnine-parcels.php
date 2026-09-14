<?php
/**
 * Title: Некретнине - Тражимо парцеле
 * Slug: jugogradnja/nekretnine-parcels
 * Categories: jugogradnja
 * Inserter: true
 */
$contact_url = esc_url( home_url( '/kontakt/' ) );
?>
<!-- wp:html -->
<section class="jg-parcels">
  <div class="jg-parcels__inner">

    <!-- Left: text -->
    <div class="jg-parcels__text">
      <span class="jg-parcels__tag"><?= esc_html__( 'ПОЗИВ ВЛАСНИЦИМА', 'jugogradnja' ) ?></span>
      <h2 class="jg-parcels__heading"><?= esc_html__( 'Тражимо парцеле за изградњу', 'jugogradnja' ) ?></h2>
      <p class="jg-parcels__para"><?= esc_html__( 'Ако поседујете грађевинску парцелу и размишљате о продаји или сарадњи, можете нас контактирати. Југоградња је стално у потрази за квалитетним локацијама за нове пројекте.', 'jugogradnja' ) ?></p>

      <ul class="jg-parcels__checklist">
        <li class="jg-parcels__check-item">
          <span class="jg-parcels__check-icon" aria-hidden="true">✓</span>
          <div>
            <strong class="jg-parcels__check-title"><?= esc_html__( 'Брза процена', 'jugogradnja' ) ?></strong>
            <p class="jg-parcels__check-desc"><?= esc_html__( 'Професионална процена вредности ваше парцеле у најкраћем року', 'jugogradnja' ) ?></p>
          </div>
        </li>
        <li class="jg-parcels__check-item">
          <span class="jg-parcels__check-icon" aria-hidden="true">✓</span>
          <div>
            <strong class="jg-parcels__check-title"><?= esc_html__( 'Поуздан партнер', 'jugogradnja' ) ?></strong>
            <p class="jg-parcels__check-desc"><?= esc_html__( 'Више од 30 година искуства у грађевинској индустрији', 'jugogradnja' ) ?></p>
          </div>
        </li>
        <li class="jg-parcels__check-item">
          <span class="jg-parcels__check-icon" aria-hidden="true">✓</span>
          <div>
            <strong class="jg-parcels__check-title"><?= esc_html__( 'Флексибилни услови', 'jugogradnja' ) ?></strong>
            <p class="jg-parcels__check-desc"><?= esc_html__( 'Разматрамо различите моделе сарадње и куповине', 'jugogradnja' ) ?></p>
          </div>
        </li>
      </ul>
    </div>

    <!-- Right: contact card -->
    <div class="jg-parcels__card">
      <h3 class="jg-parcels__card-heading"><?= esc_html__( 'Контактирајте нас', 'jugogradnja' ) ?></h3>
      <p class="jg-parcels__card-sub"><?= esc_html__( 'Шаљите нам информације о вашој парцели на:', 'jugogradnja' ) ?></p>

      <div class="jg-parcels__contact-items">
        <div class="jg-parcels__contact-item">
          <span class="jg-parcels__contact-label"><?= esc_html__( 'Емаил за парцеле', 'jugogradnja' ) ?></span>
          <a class="jg-parcels__contact-value" href="mailto:prodaja@jugogradnja.rs">prodaja@jugogradnja.rs</a>
        </div>
        <div class="jg-parcels__contact-item">
          <span class="jg-parcels__contact-label"><?= esc_html__( 'Телефон', 'jugogradnja' ) ?></span>
          <a class="jg-parcels__contact-value" href="tel:+381648115868">+381 64 811 58 68</a>
        </div>
      </div>

      <div class="jg-parcels__attach">
        <h4 class="jg-parcels__attach-heading"><?= esc_html__( 'Молимо приложите:', 'jugogradnja' ) ?></h4>
        <ul class="jg-parcels__attach-list">
          <li><?= esc_html__( 'Локацију парцеле', 'jugogradnja' ) ?></li>
          <li><?= esc_html__( 'Површину (м²)', 'jugogradnja' ) ?></li>
          <li><?= esc_html__( 'Број парцеле и катастарску општини', 'jugogradnja' ) ?></li>
          <li><?= esc_html__( 'Документацију (по могућности)', 'jugogradnja' ) ?></li>
          <li><?= esc_html__( 'Ваша ценовна очекивања', 'jugogradnja' ) ?></li>
        </ul>
      </div>
    </div>

  </div>
</section>
<!-- /wp:html -->
