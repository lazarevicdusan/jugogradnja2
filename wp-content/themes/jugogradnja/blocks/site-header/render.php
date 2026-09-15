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

// Look up a post's translation into $target_lang directly via WPML's
// translation-pairing table (trid), bypassing the wpml_object_id /
// wpml_permalink filters - those proved unreliable for the reverse
// (non-default -> default language) direction on this site.
$jg_find_translated_permalink = static function ( int $post_id, string $target_lang ): ?string {
    global $wpdb;
    $element_type = 'post_' . get_post_type( $post_id );
    $trid = $wpdb->get_var( $wpdb->prepare(
        "SELECT trid FROM {$wpdb->prefix}icl_translations WHERE element_id = %d AND element_type = %s",
        $post_id, $element_type
    ) );
    if ( ! $trid ) {
        return null;
    }
    $target_id = $wpdb->get_var( $wpdb->prepare(
        "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid = %d AND language_code = %s",
        $trid, $target_lang
    ) );
    if ( ! $target_id ) {
        return null;
    }
    $permalink = get_permalink( (int) $target_id );
    return $permalink ?: null;
};

$current_id = defined( 'ICL_SITEPRESS_VERSION' ) ? get_queried_object_id() : 0;

// English URL (WPML or fallback). A raw home_url( '/en/' ) string gets
// silently rewritten back to the current language's root by WPML's own
// home_url filters, so use wpml_permalink on the unambiguous
// home_url( '/' ) instead for the homepage case.
$en_url = esc_url(
    defined( 'ICL_SITEPRESS_VERSION' )
        ? apply_filters( 'wpml_permalink', home_url( '/' ), 'en' )
        : home_url( '/en/' )
);
if ( $current_id ) {
    $en_permalink = $jg_find_translated_permalink( $current_id, 'en' );
    if ( $en_permalink ) {
        $en_url = esc_url( $en_permalink );
    }
}

// Serbian URL - only needed when currently viewing the English site, so
// the "СР" button can actually navigate back instead of just toggling
// the Cyrillic/Latin script cookie.
$sr_nav_url = esc_url( home_url( '/' ) );
if ( $is_en ) {
    if ( $current_id ) {
        $sr_permalink = $jg_find_translated_permalink( $current_id, 'sr' );
        if ( $sr_permalink ) {
            $sr_nav_url = esc_url( $sr_permalink );
        }
    } elseif ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
        $sr_nav_url = esc_url( apply_filters( 'wpml_permalink', home_url( '/' ), 'sr' ) );
    }
}

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
          <a class="site-nav__link" href="<?= $u( '/o-nama/' ) ?>"<?= $is_current( '/o-nama/' ) ?>><?= esc_html__( 'О нама', 'jugogradnja' ) ?></a>
          <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-label="<?= esc_attr__( 'Proširi podmeni O nama', 'jugogradnja' ) ?>">
            <img src="<?= $chv ?>" width="8" height="4" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/karijere/' ) ?>"<?= $is_current( '/karijere/' ) ?>><?= esc_html__( 'Каријере', 'jugogradnja' ) ?></a></li>
          </ul>
        </li>

        <li class="site-nav__item has-dropdown">
          <a class="site-nav__link" href="<?= $u( '/usluge/' ) ?>"<?= $is_current( '/usluge/' ) ?>><?= esc_html__( 'Услуге', 'jugogradnja' ) ?></a>
          <button class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-label="<?= esc_attr__( 'Proširi podmeni Usluge', 'jugogradnja' ) ?>">
            <img src="<?= $chv ?>" width="8" height="4" alt="" aria-hidden="true">
          </button>
          <ul class="site-nav__dropdown" role="list">
            <li><a href="<?= $u( '/investicije/' ) ?>"<?= $is_current( '/investicije/' ) ?>><?= esc_html__( 'Инвестиције и развој пројеката', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/izgradnja/' ) ?>"<?= $is_current( '/izgradnja/' ) ?>><?= esc_html__( 'Изградња објеката', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/rekonstrukcija/' ) ?>"<?= $is_current( '/rekonstrukcija/' ) ?>><?= esc_html__( 'Реконструкција и санација', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/enterijer/' ) ?>"<?= $is_current( '/enterijer/' ) ?>><?= esc_html__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?></a></li>
          </ul>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/reference/' ) ?>"<?= $is_current( '/reference/' ) ?>><?= esc_html__( 'Референце', 'jugogradnja' ) ?></a>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/nekretnine/' ) ?>"<?= $is_current( '/nekretnine/' ) ?>><?= esc_html__( 'Некретнине', 'jugogradnja' ) ?></a>
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
            <li><a href="<?= $u( '/velux-osnovni/' ) ?>"<?= $is_current( '/velux-osnovni/' ) ?>><?= esc_html__( 'Основни', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/velux-standard/' ) ?>"<?= $is_current( '/velux-standard/' ) ?>><?= esc_html__( 'Стандард', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/velux-komfor/' ) ?>"<?= $is_current( '/velux-komfor/' ) ?>><?= esc_html__( 'Комфор', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/velux-komfor-plus/' ) ?>"<?= $is_current( '/velux-komfor-plus/' ) ?>><?= esc_html__( 'Комфор Плус', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/velux-roletne/' ) ?>"<?= $is_current( '/velux-roletne/' ) ?>><?= esc_html__( 'Ролетне', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $u( '/velux-vodic/' ) ?>"<?= $is_current( '/velux-vodic/' ) ?>><?= esc_html__( 'Водич за куповину', 'jugogradnja' ) ?></a></li>
          </ul>
        </li>

        <li class="site-nav__item">
          <a class="site-nav__link" href="<?= $u( '/kontakt/' ) ?>"<?= $is_current( '/kontakt/' ) ?>><?= esc_html__( 'Контакт', 'jugogradnja' ) ?></a>
        </li>

      </ul>
    </nav>

    <div class="site-header__lang" aria-label="<?= esc_attr__( 'Izbor pisma i jezika', 'jugogradnja' ) ?>">
      <?php if ( $is_en ) : ?>
      <a class="lang-btn lang-btn--script" href="<?= $sr_nav_url ?>" data-notranslit>
        <?= esc_html( $sr_label ) ?>
      </a>
      <?php else : ?>
      <button class="lang-btn lang-btn--script" data-script-toggle="<?= esc_attr( $sr_target ) ?>" data-notranslit type="button">
        <?= esc_html( $sr_label ) ?>
      </button>
      <?php endif; ?>
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
        <a class="mobile-drawer__link" href="<?= $u( '/o-nama/' ) ?>" tabindex="-1"<?= $is_current( '/o-nama/' ) ?>><?= esc_html__( 'О нама', 'jugogradnja' ) ?></a>
        <button class="mobile-drawer__chevron" aria-expanded="false" aria-label="<?= esc_attr__( 'Proširi O nama', 'jugogradnja' ) ?>" tabindex="-1">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <ul class="mobile-drawer__sub" hidden role="list">
        <li><a href="<?= $u( '/karijere/' ) ?>" tabindex="-1"<?= $is_current( '/karijere/' ) ?>><?= esc_html__( 'Каријере', 'jugogradnja' ) ?></a></li>
      </ul>
    </div>

    <!-- Услуге accordion -->
    <div class="mobile-drawer__item mobile-drawer__item--has-sub">
      <div class="mobile-drawer__row">
        <a class="mobile-drawer__link" href="<?= $u( '/usluge/' ) ?>" tabindex="-1"<?= $is_current( '/usluge/' ) ?>><?= esc_html__( 'Услуге', 'jugogradnja' ) ?></a>
        <button class="mobile-drawer__chevron" aria-expanded="false" aria-label="<?= esc_attr__( 'Proširi Usluge', 'jugogradnja' ) ?>" tabindex="-1">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      <ul class="mobile-drawer__sub" hidden role="list">
        <li><a href="<?= $u( '/investicije/' ) ?>" tabindex="-1"<?= $is_current( '/investicije/' ) ?>><?= esc_html__( 'Инвестиције и развој пројеката', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/izgradnja/' ) ?>" tabindex="-1"<?= $is_current( '/izgradnja/' ) ?>><?= esc_html__( 'Изградња објеката', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/rekonstrukcija/' ) ?>" tabindex="-1"<?= $is_current( '/rekonstrukcija/' ) ?>><?= esc_html__( 'Реконструкција и санација', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/enterijer/' ) ?>" tabindex="-1"<?= $is_current( '/enterijer/' ) ?>><?= esc_html__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?></a></li>
      </ul>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/reference/' ) ?>" tabindex="-1"<?= $is_current( '/reference/' ) ?>><?= esc_html__( 'Референце', 'jugogradnja' ) ?></a>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/nekretnine/' ) ?>" tabindex="-1"<?= $is_current( '/nekretnine/' ) ?>><?= esc_html__( 'Некретнине', 'jugogradnja' ) ?></a>
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
        <li><a href="<?= $u( '/velux-osnovni/' ) ?>" tabindex="-1"><?= esc_html__( 'Основни', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/velux-standard/' ) ?>" tabindex="-1"><?= esc_html__( 'Стандард', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/velux-komfor/' ) ?>" tabindex="-1"><?= esc_html__( 'Комфор', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/velux-komfor-plus/' ) ?>" tabindex="-1"><?= esc_html__( 'Комфор Плус', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/velux-roletne/' ) ?>" tabindex="-1"><?= esc_html__( 'Ролетне', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $u( '/velux-vodic/' ) ?>" tabindex="-1"><?= esc_html__( 'Водич за куповину', 'jugogradnja' ) ?></a></li>
      </ul>
    </div>

    <div class="mobile-drawer__item">
      <a class="mobile-drawer__link" href="<?= $u( '/kontakt/' ) ?>" tabindex="-1"<?= $is_current( '/kontakt/' ) ?>><?= esc_html__( 'Контакт', 'jugogradnja' ) ?></a>
    </div>

    <!-- Language toggle -->
    <div class="mobile-drawer__item mobile-drawer__item--lang">
      <?php if ( $is_en ) : ?>
      <a class="mobile-drawer__lang-btn lang-btn--script" href="<?= $sr_nav_url ?>" data-notranslit tabindex="-1">
        <?= esc_html( $sr_label ) ?>
      </a>
      <?php else : ?>
      <button class="mobile-drawer__lang-btn lang-btn--script" data-script-toggle="<?= esc_attr( $sr_target ) ?>" data-notranslit type="button" tabindex="-1">
        <?= esc_html( $sr_label ) ?>
      </button>
      <?php endif; ?>
      <span class="mobile-drawer__lang-sep" aria-hidden="true">|</span>
      <a class="mobile-drawer__lang-btn<?= $is_en ? ' is-active' : '' ?>" href="<?= $en_url ?>" tabindex="-1">EN</a>
    </div>

  </nav>

</div>
