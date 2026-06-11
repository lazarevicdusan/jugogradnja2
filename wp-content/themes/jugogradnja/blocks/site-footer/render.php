<?php
/**
 * Site Footer block — render.php
 *
 * Four-column footer on #253D86 background, matching Figma node 683:1636 (footer section).
 * Col 1: white logo + tagline | Col 2: nav links | Col 3: services | Col 4: contact
 * Bottom bar: copyright + legal links
 */
defined( 'ABSPATH' ) || exit;

$t  = get_template_directory_uri();
$h  = esc_url( home_url( '/' ) );
$lw = esc_url( $t . '/assets/images/icons/logo-white-full.svg' );
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
      <a class="site-footer__logo" href="<?= $h ?>" aria-label="<?= esc_attr__( 'Jugogradnja — početna stranica', 'jugogradnja' ) ?>">
        <img src="<?= $lw ?>" width="315" height="49" alt="Jugogradnja" loading="lazy">
      </a>
      <p class="site-footer__tagline">Радимо. Градимо. Од 1992. године</p>
    </div>

    <nav class="site-footer__col" aria-label="<?= esc_attr__( 'Meni u podgrađu', 'jugogradnja' ) ?>">
      <p class="site-footer__heading">Навигација</p>
      <ul class="site-footer__links" role="list">
        <li><a href="<?= $u( '/o-nama/' ) ?>">О нама</a></li>
        <li><a href="<?= $u( '/reference/' ) ?>">Референце</a></li>
        <li><a href="<?= $u( '/nekretnine/' ) ?>">Некретнине</a></li>
        <li><a href="<?= $u( '/sofeiya/' ) ?>">Sofeiya</a></li>
        <li><a href="<?= $u( '/velux/' ) ?>">VELUX</a></li>
        <li><a href="<?= $u( '/karijera/' ) ?>">Каријера</a></li>
        <li><a href="<?= $u( '/kontakt/' ) ?>">Контакт</a></li>
      </ul>
    </nav>

    <nav class="site-footer__col" aria-label="<?= esc_attr__( 'Usluge u podgrađu', 'jugogradnja' ) ?>">
      <p class="site-footer__heading">Услуге</p>
      <ul class="site-footer__links" role="list">
        <li><a href="<?= $u( '/usluge/inzenjering/' ) ?>">Инжењеринг</a></li>
        <li><a href="<?= $u( '/usluge/visokogradnja/' ) ?>">Висоградња</a></li>
        <li><a href="<?= $u( '/usluge/rekonstrukcija/' ) ?>">Реконструкција и адаптација</a></li>
        <li><a href="<?= $u( '/usluge/enterijer/' ) ?>">Услуге ентеријера</a></li>
      </ul>
    </nav>

    <div class="site-footer__col">
      <p class="site-footer__heading">Контакт</p>
      <ul class="site-footer__contact" role="list">

        <li class="site-footer__contact-item">
          <img src="<?= $ico['location'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div class="site-footer__contact-text">
            <span class="site-footer__contact-label">Седиште</span>
            <span>Пуковника Пејовића 7а, Београд</span>
            <span class="site-footer__contact-hours">08:00 – 16:00</span>
            <span class="site-footer__contact-label">Малопродаја</span>
            <span>Светозара Никчевића 66</span>
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
    <p class="site-footer__copy">© <?= esc_html( $year ) ?> Југоградња д.о.о. Сва права задржана.</p>
    <nav class="site-footer__legal" aria-label="<?= esc_attr__( 'Pravni linkovi', 'jugogradnja' ) ?>">
      <a href="<?= $u( '/politika-privatnosti/' ) ?>">Политика приватности</a>
      <a href="<?= $u( '/uslovi-koriscenja/' ) ?>">Услови коришћења</a>
    </nav>
  </div>
</footer>
