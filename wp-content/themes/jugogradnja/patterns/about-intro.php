<?php
/**
 * Title: О нама — увод
 * Slug: jugogradnja/about-intro
 * Categories: jugogradnja
 * Inserter: true
 */
$t   = get_template_directory_uri();
$img = esc_url( $t . '/assets/images/photos/about-pros.webp' );
?>
<!-- wp:html -->
<section class="jg-about-intro">
  <div class="jg-about-intro__inner">

    <div class="jg-about-intro__text">
      <h1 class="jg-about-intro__heading">Градимо са поносом<br>више од 30 година</h1>
      <p class="jg-about-intro__body">Од грађевинских и инжењерских пројеката, од концепта и пројектовања до коначне реализације. Југоградња комбинује традицију и знање са модерним технологијама, пружајући квалитетна и функционална решења за стамбене, пословне и индустријске објекте.</p>
      <p class="jg-about-intro__body">Наша експертиза обухвата све фазе пројекта – пројектовање, надзор, извођење и консалтинг – што нам омогућава да пружимо комплетан сервис нашим клијентима. Захваљујући искусном тиму инжењера и стручних извођача, сваком пројекту приступамо са посвећеношћу, прецизношћу и одговорношћу, обезбеђујући дугорочну вредност и задовољство клијента.</p>
      <div class="jg-about-features">
        <div class="jg-about-feature">
          <span class="jg-about-feature__icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M7.5 13.5 4 10l-1 1 4.5 4.5L17 6l-1-1Z" fill="currentColor"/></svg>
          </span>
          <span class="jg-about-feature__text">
            <span class="jg-about-feature__title">Квалитет</span>
            <span class="jg-about-feature__sub">Компромис није опција</span>
          </span>
        </div>
        <div class="jg-about-feature">
          <span class="jg-about-feature__icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M7.5 13.5 4 10l-1 1 4.5 4.5L17 6l-1-1Z" fill="currentColor"/></svg>
          </span>
          <span class="jg-about-feature__text">
            <span class="jg-about-feature__title">Рокови</span>
            <span class="jg-about-feature__sub">Прецизност у сваком кораку</span>
          </span>
        </div>
        <div class="jg-about-feature">
          <span class="jg-about-feature__icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M7.5 13.5 4 10l-1 1 4.5 4.5L17 6l-1-1Z" fill="currentColor"/></svg>
          </span>
          <span class="jg-about-feature__text">
            <span class="jg-about-feature__title">Сигурност</span>
            <span class="jg-about-feature__sub">Заштита људи и простора</span>
          </span>
        </div>
        <div class="jg-about-feature">
          <span class="jg-about-feature__icon" aria-hidden="true">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M7.5 13.5 4 10l-1 1 4.5 4.5L17 6l-1-1Z" fill="currentColor"/></svg>
          </span>
          <span class="jg-about-feature__text">
            <span class="jg-about-feature__title">Екологија</span>
            <span class="jg-about-feature__sub">Одговорно према будућности</span>
          </span>
        </div>
      </div>
    </div>

    <div class="jg-about-intro__image">
      <img src="<?= $img ?>" width="704" height="600" alt="Тим стручњака Југоградње на градилишту" loading="eager">
    </div>

  </div>
</section>
<!-- /wp:html -->
