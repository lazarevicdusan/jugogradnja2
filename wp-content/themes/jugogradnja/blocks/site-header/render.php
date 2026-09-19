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

// Latin logo wordmark for the English site only
$logo_webp = $is_en ? esc_url( $t . '/assets/images/icons/logo-color-en.webp' ) : '';
if ( $is_en ) {
    $lc = esc_url( $t . '/assets/images/icons/logo-color-en.png' );
}

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
    // get_permalink() is itself filtered by WPML to always return the URL
    // in the CURRENTLY active language, regardless of which post ID is
    // passed in - so asking it for a different-language post's permalink
    // while browsing in another language just hands back the current
    // page's own URL. Temporarily switch WPML's active language first,
    // as WPML's own docs recommend for exactly this situation.
    $switched = has_action( 'wpml_switch_language' );
    if ( $switched ) {
        do_action( 'wpml_switch_language', $target_lang );
    }
    $permalink = get_permalink( (int) $target_id );
    if ( $switched ) {
        do_action( 'wpml_switch_language', null );
    }
    return $permalink ?: null;
};

$current_id = defined( 'ICL_SITEPRESS_VERSION' ) ? get_queried_object_id() : 0;

// Base URL for the current request when there's no singular post to look
// up a translation for (post type archives, the blog-posts front page,
// etc.) - used as the basis for the wpml_permalink fallback below instead
// of always defaulting to the homepage.
$current_base_url = home_url( '/' );
if ( ! $current_id && is_post_type_archive() ) {
    $archive_link = get_post_type_archive_link( get_query_var( 'post_type' ) );
    if ( $archive_link ) {
        $current_base_url = $archive_link;
    }
}

// English URL (WPML or fallback). A raw home_url( '/en/' ) string gets
// silently rewritten back to the current language's root by WPML's own
// home_url filters, so use wpml_permalink on the unambiguous current
// base URL instead.
$en_url = esc_url(
    defined( 'ICL_SITEPRESS_VERSION' )
        ? apply_filters( 'wpml_permalink', $current_base_url, 'en' )
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
        $sr_nav_url = esc_url( apply_filters( 'wpml_permalink', $current_base_url, 'sr' ) );
    }
}

// URL helper
$u = static fn( string $path ): string => esc_url( home_url( $path ) );

// Language-aware resolver for the four service pages - a raw home_url()
// path only exists for the Serbian original and gets mangled by WPML's
// own home_url filters when viewed in another language.
$jg_page_url = static function ( int $sr_post_id, string $fallback_path ) {
    if ( ! defined( 'ICL_SITEPRESS_VERSION' ) || ! function_exists( 'wpml_get_current_language' ) ) {
        return home_url( $fallback_path );
    }
    $current_lang = wpml_get_current_language();
    if ( 'sr' === $current_lang ) {
        return get_permalink( $sr_post_id ) ?: home_url( $fallback_path );
    }
    global $wpdb;
    $trid = $wpdb->get_var( $wpdb->prepare(
        "SELECT trid FROM {$wpdb->prefix}icl_translations WHERE element_id = %d AND element_type = 'post_page'",
        $sr_post_id
    ) );
    $target_id = $trid ? $wpdb->get_var( $wpdb->prepare(
        "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid = %d AND language_code = %s",
        $trid, $current_lang
    ) ) : null;
    if ( ! $target_id ) {
        return home_url( $fallback_path );
    }
    do_action( 'wpml_switch_language', $current_lang );
    $permalink = get_permalink( (int) $target_id );
    do_action( 'wpml_switch_language', null );
    return $permalink ?: home_url( $fallback_path );
};
$investicije_url    = esc_url( $jg_page_url( 7, '/investicije/' ) );
$izgradnja_url      = esc_url( $jg_page_url( 8, '/izgradnja/' ) );
$rekonstrukcija_url = esc_url( $jg_page_url( 9, '/rekonstrukcija/' ) );
$enterijer_url      = esc_url( $jg_page_url( 10, '/enterijer/' ) );

// Current path for aria-current
$req_path = trailingslashit( strtok( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH ), '?' ) );
$is_current = static fn( string $path ): string => ( $req_path === trailingslashit( $path ) ) ? ' aria-current="page"' : '';
?>
<header class="site-header" id="site-header" role="banner">
  <div class="site-header__inner">

    <a class="site-header__logo" href="<?= $h ?>" aria-label="<?= esc_attr__( 'Jugogradnja - početna stranica', 'jugogradnja' ) ?>">
      <?php if ( $logo_webp ) : ?>
      <picture>
        <source srcset="<?= $logo_webp ?>" type="image/webp">
        <img src="<?= $lc ?>" width="320" height="50" alt="Jugogradnja" loading="eager" fetchpriority="high">
      </picture>
      <?php else : ?>
      <img src="<?= $lc ?>" width="320" height="50" alt="Jugogradnja" loading="eager" fetchpriority="high">
      <?php endif; ?>
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
            <li><a href="<?= $investicije_url ?>"<?= $is_current( '/investicije/' ) ?>><?= esc_html__( 'Инвестиције и развој пројеката', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $izgradnja_url ?>"<?= $is_current( '/izgradnja/' ) ?>><?= esc_html__( 'Изградња објеката', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $rekonstrukcija_url ?>"<?= $is_current( '/rekonstrukcija/' ) ?>><?= esc_html__( 'Реконструкција и санација', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= $enterijer_url ?>"<?= $is_current( '/enterijer/' ) ?>><?= esc_html__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?></a></li>
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
            <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-osnovni' ) ) ?>"<?= $is_current( '/velux-osnovni/' ) ?>><?= esc_html__( 'Основни', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-standard' ) ) ?>"<?= $is_current( '/velux-standard/' ) ?>><?= esc_html__( 'Стандард', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-komfor' ) ) ?>"<?= $is_current( '/velux-komfor/' ) ?>><?= esc_html__( 'Комфор', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-komfor-plus' ) ) ?>"<?= $is_current( '/velux-komfor-plus/' ) ?>><?= esc_html__( 'Комфор Плус', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-roletne' ) ) ?>"<?= $is_current( '/velux-roletne/' ) ?>><?= esc_html__( 'Ролетне', 'jugogradnja' ) ?></a></li>
            <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-vodic' ) ) ?>"<?= $is_current( '/velux-vodic/' ) ?>><?= esc_html__( 'Водич за куповину', 'jugogradnja' ) ?></a></li>
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
      <?php if ( $logo_webp ) : ?>
      <picture>
        <source srcset="<?= $logo_webp ?>" type="image/webp">
        <img src="<?= $lc ?>" width="200" height="32" alt="Jugogradnja">
      </picture>
      <?php else : ?>
      <img src="<?= $lc ?>" width="200" height="32" alt="Jugogradnja">
      <?php endif; ?>
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
        <li><a href="<?= $investicije_url ?>" tabindex="-1"<?= $is_current( '/investicije/' ) ?>><?= esc_html__( 'Инвестиције и развој пројеката', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $izgradnja_url ?>" tabindex="-1"<?= $is_current( '/izgradnja/' ) ?>><?= esc_html__( 'Изградња објеката', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $rekonstrukcija_url ?>" tabindex="-1"<?= $is_current( '/rekonstrukcija/' ) ?>><?= esc_html__( 'Реконструкција и санација', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= $enterijer_url ?>" tabindex="-1"<?= $is_current( '/enterijer/' ) ?>><?= esc_html__( 'Дизајн и опремање ентеријера', 'jugogradnja' ) ?></a></li>
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
        <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-osnovni' ) ) ?>" tabindex="-1"><?= esc_html__( 'Основни', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-standard' ) ) ?>" tabindex="-1"><?= esc_html__( 'Стандард', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-komfor' ) ) ?>" tabindex="-1"><?= esc_html__( 'Комфор', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-komfor-plus' ) ) ?>" tabindex="-1"><?= esc_html__( 'Комфор Плус', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-roletne' ) ) ?>" tabindex="-1"><?= esc_html__( 'Ролетне', 'jugogradnja' ) ?></a></li>
        <li><a href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-vodic' ) ) ?>" tabindex="-1"><?= esc_html__( 'Водич за куповину', 'jugogradnja' ) ?></a></li>
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
