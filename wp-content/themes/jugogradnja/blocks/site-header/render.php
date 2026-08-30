<?php
/**
 * Site Header block - render.php
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
    $sr_label  = 'СР';  // Cyrillic label (actual Cyrillic characters) - click switches back to Cyrillic
    $sr_target = 'cyrillic';
} else {
    $sr_label  = 'SR';  // Latin label - click switches to Latin
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

    <a class="site-header__logo" href="<?= $h ?>" aria-label="<?= esc_attr__( 'Jugogradnja - početna stranica', 'jugogradnja' ) ?>">
      <img src="<?= $lc ?>" width="320" height="50" alt="Jugogradnja" loading="eager" fetchpriority="high">
    </a>

    <nav class="site-nav" id="site-nav" aria-label="<?= esc_attr__( 'Primarni meni', 'jugogradnja' ) ?>">
      <ul class="site-nav__list" role="list">

        <li class="site-nav__item has-dropdown">
          <a class="site-nav__link" href="<?= $u( '/o-nama/' ) ?>"<?= $is_current( '/o-nama/' ) ?>>О нама</a>
          <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-label="<?= esc_attr__( 'Proširi podmeni O nama', 'jugogradnja' ) ?>">
            <img src="<?= $chv ?>" width="8" height="4" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/karijere/' ) ?>"<?= $is_current( '/karijere/' ) ?>>Каријере</a></li>
          </ul>
        </li>

        <li class="site-nav__item has-dropdown">
          <a class="site-nav__link" href="<?= $u( '/usluge/' ) ?>"<?= $is_current( '/usluge/' ) ?>>Услуге</a>
          <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-label="<?= esc_attr__( 'Proširi podmeni Usluge', 'jugogradnja' ) ?>">
            <img src="<?= $chv ?>" width="8" height="4" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/investicije/' ) ?>"<?= $is_current( '/investicije/' ) ?>>Инвестиције и развој пројеката</a></li>
            <li><a href="<?= $u( '/izgradnja/' ) ?>"<?= $is_current( '/izgradnja/' ) ?>>Изградња објеката</a></li>
            <li><a href="<?= $u( '/rekonstrukcija/' ) ?>"<?= $is_current( '/rekonstrukcija/' ) ?>>Реконструкција и санација</a></li>
            <li><a href="<?= $u( '/enterijer/' ) ?>"<?= $is_current( '/enterijer/' ) ?>>Дизајн и опремање ентеријера</a></li>
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
            <img src="<?= $chv ?>" width="8" height="4" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/velux-osnovni/' ) ?>"<?= $is_current( '/velux-osnovni/' ) ?>>Основни</a></li>
            <li><a href="<?= $u( '/velux-standard/' ) ?>"<?= $is_current( '/velux-standard/' ) ?>>Стандард</a></li>
            <li><a href="<?= $u( '/velux-komfor/' ) ?>"<?= $is_current( '/velux-komfor/' ) ?>>Комфор</a></li>
            <li><a href="<?= $u( '/velux-komfor-plus/' ) ?>"<?= $is_current( '/velux-komfor-plus/' ) ?>>Комфор Плус</a></li>
            <li><a href="<?= $u( '/velux-roletne/' ) ?>"<?= $is_current( '/velux-roletne/' ) ?>>Ролетне</a></li>
            <li><a href="<?= $u( '/velux-vodic/' ) ?>"<?= $is_current( '/velux-vodic/' ) ?>>Водич за куповину</a></li>
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

  <!-- Drawer header bar -->
  <div class="mobile-drawer__head">
    <a class="mobile-drawer__logo" href="<?= $h ?>" tabindex="-1">
      <img src="<?= $lc ?>" width="200" height="32" alt="Jugogradnja">
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

  <!-- Navigation -->
  <nav class="mobile-drawer__nav" aria-label="<?= esc_attr__( 'Mobilni meni', 'jugogradnja' ) ?>">

    <!-- О нама accordion (mirrors desktop: sub = Каријере) -->
    <div class="mobile-drawer__item mobile-drawer__item--has-sub">
      <div class="mobile-drawer__row">
        <a class="mobile-drawer__link" href="<?= $u( '/o-nama/' ) ?>" tabindex="-1"<?= $is_current( '/o-nama/' ) ?>>О нама</a>
        <button class="mobile-drawer__chevron" aria-expanded="false" aria-label="<?= esc_attr__( 'Proširi O nama', 'jugogradnja' ) ?>" tabindex="-1">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <ul class="mobile-drawer__sub" hidden role="list">
        <li><a href="<?= $u( '/karijere/' ) ?>" tabindex="-1"<?= $is_current( '/karijere/' ) ?>>Каријере</a></li>
      </ul>
    </div>

    <!-- Услуге accordion -->
    <div class="mobile-drawer__item mobile-drawer__item--has-sub">
      <div class="mobile-drawer__row">
        <a class="mobile-drawer__link" href="<?= $u( '/usluge/' ) ?>" tabindex="-1"<?= $is_current( '/usluge/' ) ?>>Услуге</a>
        <button class="mobile-drawer__chevron" aria-expanded="false" aria-label="<?= esc_attr__( 'Proširi Usluge', 'jugogradnja' ) ?>" tabindex="-1">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <ul class="mobile-drawer__sub" hidden role="list">
        <li><a href="<?= $u( '/investicije/' ) ?>" tabindex="-1"<?= $is_current( '/investicije/' ) ?>>Инвестиције и развој пројеката</a></li>
        <li><a href="<?= $u( '/izgradnja/' ) ?>" tabindex="-1"<?= $is_current( '/izgradnja/' ) ?>>Изградња објеката</a></li>
        <li><a href="<?= $u( '/rekonstrukcija/' ) ?>" tabindex="-1"<?= $is_current( '/rekonstrukcija/' ) ?>>Реконструкција и санација</a></li>
        <li><a href="<?= $u( '/enterijer/' ) ?>" tabindex="-1"<?= $is_current( '/enterijer/' ) ?>>Дизајн и опремање ентеријера</a></li>
      </ul>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/reference/' ) ?>" tabindex="-1"<?= $is_current( '/reference/' ) ?>>Референце</a>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/nekretnine/' ) ?>" tabindex="-1"<?= $is_current( '/nekretnine/' ) ?>>Некретнине</a>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/sofeiya/' ) ?>" tabindex="-1"<?= $is_current( '/sofeiya/' ) ?>>Sofeiya</a>
    </div>

    <!-- VELUX accordion -->
    <div class="mobile-drawer__item mobile-drawer__item--has-sub">
      <div class="mobile-drawer__row">
        <a class="mobile-drawer__link" href="<?= $u( '/velux/' ) ?>" tabindex="-1"<?= $is_current( '/velux/' ) ?>>VELUX</a>
        <button class="mobile-drawer__chevron" aria-expanded="false" aria-label="<?= esc_attr__( 'Proširi VELUX', 'jugogradnja' ) ?>" tabindex="-1">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <ul class="mobile-drawer__sub" hidden role="list">
        <li><a href="<?= $u( '/velux-osnovni/' ) ?>" tabindex="-1">Основни</a></li>
        <li><a href="<?= $u( '/velux-standard/' ) ?>" tabindex="-1">Стандард</a></li>
        <li><a href="<?= $u( '/velux-komfor/' ) ?>" tabindex="-1">Комфор</a></li>
        <li><a href="<?= $u( '/velux-komfor-plus/' ) ?>" tabindex="-1">Комфор Плус</a></li>
        <li><a href="<?= $u( '/velux-roletne/' ) ?>" tabindex="-1">Ролетне</a></li>
        <li><a href="<?= $u( '/velux-vodic/' ) ?>" tabindex="-1">Водич за куповину</a></li>
      </ul>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/kontakt/' ) ?>" tabindex="-1"<?= $is_current( '/kontakt/' ) ?>>Контакт</a>
    </div>

    <!-- Language toggle -->
    <div class="mobile-drawer__item mobile-drawer__item--lang">
      <button class="mobile-drawer__lang-btn lang-btn--script" data-script-toggle="<?= esc_attr( $sr_target ) ?>" type="button" tabindex="-1">
        <?= esc_html( $sr_label ) ?>
      </button>
      <span class="mobile-drawer__lang-sep" aria-hidden="true">|</span>
      <a class="mobile-drawer__lang-btn<?= $is_en ? ' is-active' : '' ?>" href="<?= $en_url ?>" tabindex="-1">EN</a>
    </div>

  </nav>

</div>
