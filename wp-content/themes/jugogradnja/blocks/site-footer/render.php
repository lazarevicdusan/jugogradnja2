<?php
/**
 * Site Footer block - render.php
 *
 * Four-column footer on #253D86 background, matching Figma node 683:1636 (footer section).
 * Col 1: white logo + tagline | Col 2: nav links | Col 3: services | Col 4: contact
 * Bottom bar: copyright + legal links
 */
defined( 'ABSPATH' ) || exit;

$t  = get_template_directory_uri();
$h  = esc_url( home_url( '/' ) );

// Latin wordmark logo on the English site only, matching the header.
$is_en_footer = defined( 'ICL_SITEPRESS_VERSION' )
    && function_exists( 'wpml_get_current_language' )
    && 'en' === wpml_get_current_language();
$lw          = esc_url( $t . '/assets/images/icons/logo-white-full.svg' );
$lw_webp     = '';
if ( $is_en_footer ) {
    $lw      = esc_url( $t . '/assets/images/icons/logo-white-en-full.png' );
    $lw_webp = esc_url( $t . '/assets/images/icons/logo-white-en-full.webp' );
}

$ico = [
    'location' => esc_url( $t . '/assets/images/icons/icon-location.svg' ),
    'phone'    => esc_url( $t . '/assets/images/icons/icon-phone.svg' ),
    'email'    => esc_url( $t . '/assets/images/icons/icon-email.svg' ),
];

$u = static fn( string $path ): string => esc_url( home_url( $path ) );

$year = gmdate( 'Y' );
?>
<footer class="site-footer" role="contentinfo">
  <div class="site-footer__grid">

    <div class="site-footer__col site-footer__col--brand">
      <a class="site-footer__logo" href="<?= $h ?>" aria-label="<?= esc_attr__( 'Jugogradnja - početna stranica', 'jugogradnja' ) ?>">
        <?php if ( $lw_webp ) : ?>
        <picture>
          <source srcset="<?= $lw_webp ?>" type="image/webp">
          <img src="<?= $lw ?>" width="315" height="49" alt="Jugogradnja" loading="lazy">
        </picture>
        <?php else : ?>
        <img src="<?= $lw ?>" width="315" height="49" alt="Jugogradnja" loading="lazy">
        <?php endif; ?>
      </a>
      <p class="site-footer__tagline"><?= esc_html__( 'Радимо. Градимо. Од 1992. године', 'jugogradnja' ) ?></p>
    </div>

    <nav class="site-footer__col" aria-label="<?= esc_attr__( 'Meni u podgrađu', 'jugogradnja' ) ?>">
      <p class="site-footer__heading"><?= esc_html__( 'Навигација', 'jugogradnja' ) ?></p>
      <ul class="site-footer__links" role="list">
        <li><a href="<?= $u( '/o-nama/' ) ?>"><?= esc_html__( 'О нама', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/reference/' ) ?>"><?= esc_html__( 'Референце', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/nekretnine/' ) ?>"><?= esc_html__( 'Некретнине', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/sofeiya/' ) ?>">Sofeiya</a></li>
        <li><a href="<?= $u( '/velux/' ) ?>">VELUX</a></li>
        <li><a href="<?= $u( '/karijera/' ) ?>"><?= esc_html__( 'Каријера', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/kontakt/' ) ?>"><?= esc_html__( 'Контакт', 'jugogradnja' ) ?></a></li>
      </ul>
    </nav>

    <nav class="site-footer__col" aria-label="<?= esc_attr__( 'Usluge u podgrađu', 'jugogradnja' ) ?>">
      <p class="site-footer__heading"><?= esc_html__( 'Услуге', 'jugogradnja' ) ?></p>
      <ul class="site-footer__links" role="list">
        <li><a href="<?= $u( '/investicije/' ) ?>"><?= esc_html__( 'Инвестиције и развој пројеката', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/izgradnja/' ) ?>"><?= esc_html__( 'Изградња објеката', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/rekonstrukcija/' ) ?>"><?= esc_html__( 'Реконструкција и санација', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/enterijer/' ) ?>"><?= esc_html__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?></a></li>
      </ul>
    </nav>

    <div class="site-footer__col">
      <p class="site-footer__heading"><?= esc_html__( 'Контакт', 'jugogradnja' ) ?></p>
      <ul class="site-footer__contact" role="list">

        <li class="site-footer__contact-item">
          <img src="<?= $ico['location'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div class="site-footer__contact-text">
            <span class="site-footer__contact-label"><?= esc_html__( 'Седиште', 'jugogradnja' ) ?></span>
            <span><?= esc_html__( 'Пуковника Пејовића 1а, Београд', 'jugogradnja' ) ?></span>
            <span class="site-footer__contact-hours">08:00 – 16:00</span>
            <span class="site-footer__contact-label"><?= esc_html__( 'Малопродаја', 'jugogradnja' ) ?></span>
            <span><?= esc_html__( 'Светолика Никачевића бб', 'jugogradnja' ) ?></span>
            <span class="site-footer__contact-hours">07:00 – 15:00</span>
          </div>
        </li>

        <li class="site-footer__contact-item">
          <img src="<?= $ico['phone'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div class="site-footer__contact-text">
            <a href="tel:+381116248075">+381 11 624 80 75</a>
            <a href="tel:+381648115868">+381 64 811 58 68</a>
          </div>
        </li>

        <li class="site-footer__contact-item">
          <img src="<?= $ico['email'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div class="site-footer__contact-text">
            <a href="mailto:gradnja@jugogradnja.rs">gradnja@jugogradnja.rs</a>
            <a href="mailto:prodaja@jugogradnja.rs">prodaja@jugogradnja.rs</a>
          </div>
        </li>

      </ul>
    </div>

  </div>

  <div class="site-footer__bar">
    <p class="site-footer__copy"><?= esc_html( sprintf( __( '© %s Југоградња д.о.о. Сва права задржана.', 'jugogradnja' ), $year ) ) ?></p>
    <!-- Politika privatnosti / Uslovi koriscenja links removed until those pages have real content -->

  </div>
</footer>
