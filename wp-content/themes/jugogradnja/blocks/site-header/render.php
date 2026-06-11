<?php
/**
 * Site Header block — render.php
 *
 * Outputs the global header (fixed, 80px), primary nav with two dropdown menus
 * (Услуге, VELUX), the Cyrillic/Latin script toggle, and the full mobile drawer.
 *
 * Mobile drawer matches Figma node 4577:10283.
 * Desktop header matches Figma node 683:1903 / Navigation 683:1906.
 */
defined( 'ABSPATH' ) || exit;

$t   = get_template_directory_uri();
$h   = esc_url( home_url( '/' ) );
$lc  = esc_url( $t . '/assets/images/icons/logo-color.svg' );
$lw  = esc_url( $t . '/assets/images/icons/logo-white-full.svg' );
$chv = esc_url( $t . '/assets/images/icons/icon-chevron-down.svg' );
$ico = [
    'location' => esc_url( $t . '/assets/images/icons/icon-location.svg' ),
    'phone'    => esc_url( $t . '/assets/images/icons/icon-phone.svg' ),
    'email'    => esc_url( $t . '/assets/images/icons/icon-email.svg' ),
];

// Validate script cookie
$script = sanitize_key( $_COOKIE['jg_script'] ?? 'cyrillic' );
if ( ! in_array( $script, [ 'cyrillic', 'latin' ], true ) ) {
    $script = 'cyrillic';
}

// WPML language detection
$is_en = defined( 'ICL_SITEPRESS_VERSION' )
    && function_exists( 'wpml_get_current_language' )
    && 'en' === wpml_get_current_language();

// Script toggle label and target
if ( $is_en ) {
    $sr_label  = 'СР';
    $sr_target = 'cyrillic';
} elseif ( 'latin' === $script ) {
    $sr_label  = 'ср';  // Cyrillic label — click switches back to Cyrillic
    $sr_target = 'cyrillic';
} else {
    $sr_label  = 'Sr';  // Latin label — click switches to Latin
    $sr_target = 'latin';
}

// English URL (WPML or fallback)
$en_url = esc_url(
    defined( 'ICL_SITEPRESS_VERSION' )
        ? apply_filters( 'wpml_permalink', get_permalink() ?: home_url( '/' ), 'en' )
        : home_url( '/' )
);

// URL helper
$u = static fn( string $path ): string => esc_url( home_url( $path ) );

// Current path for aria-current
$req_path = trailingslashit( strtok( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH ), '?' ) );
$is_current = static fn( string $path ): string => ( $req_path === trailingslashit( $path ) ) ? ' aria-current="page"' : '';
?>
<header class="site-header" id="site-header" role="banner">
  <div class="site-header__inner">

    <a class="site-header__logo" href="<?= $h ?>" aria-label="<?= esc_attr__( 'Jugogradnja — početna stranica', 'jugogradnja' ) ?>">
      <img src="<?= $lc ?>" width="320" height="50" alt="Jugogradnja" loading="eager" fetchpriority="high">
    </a>

    <nav class="site-nav" id="site-nav" aria-label="<?= esc_attr__( 'Primarni meni', 'jugogradnja' ) ?>">
      <ul class="site-nav__list" role="list">

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/o-nama/' ) ?>"<?= $is_current( '/o-nama/' ) ?>>О нама</a>
        </li>

        <li class="site-nav__item has-dropdown">
          <a class="site-nav__link" href="<?= $u( '/usluge/' ) ?>"<?= $is_current( '/usluge/' ) ?>>Услуге</a>
          <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-label="<?= esc_attr__( 'Proširi podmeni Usluge', 'jugogradnja' ) ?>">
            <img src="<?= $chv ?>" width="12" height="12" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/usluge/inzenjering/' ) ?>">Инжењеринг</a></li>
            <li><a href="<?= $u( '/usluge/visokogradnja/' ) ?>">Висоградња</a></li>
            <li><a href="<?= $u( '/usluge/rekonstrukcija/' ) ?>">Реконструкција и адаптација</a></li>
            <li><a href="<?= $u( '/usluge/enterijer/' ) ?>">Услуге ентеријера</a></li>
          </ul>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/reference/' ) ?>"<?= $is_current( '/reference/' ) ?>>Референце</a>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/nekretnine/' ) ?>"<?= $is_current( '/nekretnine/' ) ?>>Некретнине</a>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/sofeiya/' ) ?>"<?= $is_current( '/sofeiya/' ) ?>>Sofeiya</a>
        </li>

        <li class="site-nav__item has-dropdown">
          <a class="site-nav__link" href="<?= $u( '/velux/' ) ?>"<?= $is_current( '/velux/' ) ?>>VELUX</a>
          <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-label="<?= esc_attr__( 'Proširi podmeni VELUX', 'jugogradnja' ) ?>">
            <img src="<?= $chv ?>" width="12" height="12" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/velux/osnovni/' ) ?>">Основни</a></li>
            <li><a href="<?= $u( '/velux/prozori/' ) ?>">Прозори (троструко стакло)</a></li>
            <li><a href="<?= $u( '/velux/komfor/' ) ?>">Комфор</a></li>
            <li><a href="<?= $u( '/velux/komfor-plus/' ) ?>">Комфор Плус</a></li>
            <li><a href="<?= $u( '/velux/roletne/' ) ?>">Ролетне</a></li>
            <li><a href="<?= $u( '/velux/vodic/' ) ?>">Водич за куповину</a></li>
          </ul>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/kontakt/' ) ?>"<?= $is_current( '/kontakt/' ) ?>>Контакт</a>
        </li>

      </ul>
    </nav>

    <div class="site-header__lang" aria-label="<?= esc_attr__( 'Izbor pisma i jezika', 'jugogradnja' ) ?>">
      <button class="lang-btn lang-btn--script" data-script-toggle="<?= esc_attr( $sr_target ) ?>" type="button">
        <?= esc_html( $sr_label ) ?>
      </button>
      <span class="lang-sep" aria-hidden="true">|</span>
      <a class="lang-btn<?= $is_en ? ' lang-btn--active' : '' ?>" href="<?= $en_url ?>">EN</a>
    </div>

    <button class="nav-toggle" id="nav-toggle"
            aria-expanded="false"
            aria-controls="mobile-drawer"
            aria-label="<?= esc_attr__( 'Otvori navigacioni meni', 'jugogradnja' ) ?>">
      <svg width="24" height="18" viewBox="0 0 24 18" fill="none" aria-hidden="true">
        <line x1="0" y1="1"  x2="24" y2="1"  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        <line x1="0" y1="9"  x2="24" y2="9"  stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        <line x1="0" y1="17" x2="24" y2="17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </button>

  </div>
</header>

<div class="mobile-drawer-overlay" id="mobile-drawer-overlay" aria-hidden="true"></div>

<div class="mobile-drawer"
     id="mobile-drawer"
     role="dialog"
     aria-modal="true"
     aria-label="<?= esc_attr__( 'Navigacioni meni', 'jugogradnja' ) ?>"
     aria-hidden="true">

  <div class="mobile-drawer__inner">

    <div class="mobile-drawer__head">
      <a class="mobile-drawer__logo" href="<?= $h ?>" tabindex="-1">
        <img src="<?= $lw ?>" width="315" height="49" alt="Jugogradnja">
      </a>
      <button class="mobile-drawer__close"
              aria-label="<?= esc_attr__( 'Zatvori meni', 'jugogradnja' ) ?>"
              aria-controls="mobile-drawer">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
          <line x1="18" y1="6"  x2="6"  y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          <line x1="6"  y1="6"  x2="18" y2="18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
    </div>

    <p class="mobile-drawer__tagline">Радимо. Градимо. Од 1992. године</p>

    <div class="mobile-drawer__section">
      <p class="mobile-drawer__section-title">Навигација</p>
      <ul class="mobile-drawer__nav" role="list">
        <li><a href="<?= $h ?>" tabindex="-1">Почетна</a></li>
        <li><a href="<?= $u( '/o-nama/' ) ?>" tabindex="-1">О нама</a></li>
        <li><a href="<?= $u( '/usluge/' ) ?>" tabindex="-1">Услуге</a></li>
        <li><a href="<?= $u( '/reference/' ) ?>" tabindex="-1">Референце</a></li>
        <li><a href="<?= $u( '/nekretnine/' ) ?>" tabindex="-1">Некретнине</a></li>
        <li><a href="<?= $u( '/sofeiya/' ) ?>" tabindex="-1">Sofeiya</a></li>
        <li><a href="<?= $u( '/velux/' ) ?>" tabindex="-1">VELUX</a></li>
        <li><a href="<?= $u( '/kontakt/' ) ?>" tabindex="-1">Контакт</a></li>
      </ul>
    </div>

    <div class="mobile-drawer__section">
      <p class="mobile-drawer__section-title">Услуге</p>
      <ul class="mobile-drawer__nav" role="list">
        <li><a href="<?= $u( '/usluge/inzenjering/' ) ?>" tabindex="-1">Инжењеринг</a></li>
        <li><a href="<?= $u( '/usluge/visokogradnja/' ) ?>" tabindex="-1">Висоградња</a></li>
        <li><a href="<?= $u( '/usluge/rekonstrukcija/' ) ?>" tabindex="-1">Реконструкција и адаптација</a></li>
        <li><a href="<?= $u( '/usluge/enterijer/' ) ?>" tabindex="-1">Услуге ентеријера</a></li>
      </ul>
    </div>

    <div class="mobile-drawer__section">
      <p class="mobile-drawer__section-title">Контакт</p>
      <ul class="mobile-drawer__contact" role="list">
        <li>
          <img src="<?= $ico['location'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div>
            <span class="label">Седиште:</span>
            <span>Пуковника Пејовића 7а, Београд</span>
            <span class="hours">08:00 – 16:00</span>
            <span class="label">Малопродаја:</span>
            <span>Светозара Никчевића 66</span>
            <span class="hours">07:00 – 15:00</span>
          </div>
        </li>
        <li>
          <img src="<?= $ico['phone'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div>
            <a href="tel:+381116248075" tabindex="-1">+381 11 624 80 75</a>
            <a href="tel:+381648115868" tabindex="-1">+381 64 811 58 68</a>
          </div>
        </li>
        <li>
          <img src="<?= $ico['email'] ?>" width="16" height="16" alt="" aria-hidden="true">
          <div>
            <a href="mailto:gradnja@jugogradnja.rs" tabindex="-1">gradnja@jugogradnja.rs</a>
            <a href="mailto:prodaja@jugogradnja.rs" tabindex="-1">prodaja@jugogradnja.rs</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="mobile-drawer__lang">
      <button class="lang-btn lang-btn--script" data-script-toggle="<?= esc_attr( $sr_target ) ?>" type="button" tabindex="-1">
        <?= esc_html( $sr_label ) ?>
      </button>
      <span class="lang-sep" aria-hidden="true">|</span>
      <a class="lang-btn" href="<?= $en_url ?>" tabindex="-1">EN</a>
    </div>

  </div>

  <div class="mobile-drawer__footer">
    <p>© 2026 Југоградња д.о.о. Сва права задржана.</p>
    <div class="mobile-drawer__legal">
      <a href="<?= $u( '/politika-privatnosti/' ) ?>" tabindex="-1">Политика приватности</a>
      <a href="<?= $u( '/uslovi-koriscenja/' ) ?>" tabindex="-1">Услови коришћења</a>
    </div>
  </div>

</div>
