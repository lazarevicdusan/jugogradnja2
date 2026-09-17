<?php
/**
 * Title: Četiri stuba - mreža usluga
 * Slug: jugogradnja/services-grid
 * Categories: jugogradnja
 * Inserter: true
 */
$t = get_template_directory_uri();

// Resolve a Page's permalink in the current WPML language via its trid,
// rather than a hardcoded home_url() path - these had also drifted from
// the real page slugs entirely (e.g. /usluge/inzenjering/ instead of the
// actual /izgradnja/ page).
$jg_service_url = static function ( int $sr_post_id, string $fallback_path ): string {
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

$services = [
    [
        'img'   => $t . '/assets/images/photos/service-inzenjering.webp',
        'imgsm' => $t . '/assets/images/photos/service-inzenjering-sm.webp',
        'title' => __( 'Изградња објеката', 'jugogradnja' ),
        'url'   => $jg_service_url( 8, '/izgradnja/' ),
        'alt'   => __( 'Инжењеринг', 'jugogradnja' ),
    ],
    [
        'img'   => $t . '/assets/images/photos/service-visokogradnja.webp',
        'imgsm' => $t . '/assets/images/photos/service-visokogradnja-sm.webp',
        'title' => __( 'Реконструкција и санација', 'jugogradnja' ),
        'url'   => $jg_service_url( 9, '/rekonstrukcija/' ),
        'alt'   => __( 'Висоградња', 'jugogradnja' ),
    ],
    [
        'img'   => $t . '/assets/images/photos/service-investicije.webp',
        'imgsm' => $t . '/assets/images/photos/service-investicije-sm.webp',
        'title' => __( 'Инвестиције и развој пројеката', 'jugogradnja' ),
        'url'   => $jg_service_url( 7, '/investicije/' ),
        'alt'   => __( 'Реконструкција и адаптација', 'jugogradnja' ),
    ],
    [
        'img'   => $t . '/assets/images/photos/service-enterijer.webp',
        'imgsm' => $t . '/assets/images/photos/service-enterijer-sm.webp',
        'title' => __( 'Дизајн и опремање ентеријера', 'jugogradnja' ),
        'url'   => $jg_service_url( 10, '/enterijer/' ),
        'alt'   => __( 'Услуге ентеријера', 'jugogradnja' ),
    ],
];
?>
<!-- wp:html -->
<section class="jg-services">
  <div class="jg-services__inner">
    <h2 class="jg-section-heading"><?= esc_html__( 'Четири стуба нашег пословања', 'jugogradnja' ) ?></h2>
    <div class="jg-services__grid">
      <?php foreach ( $services as $svc ) : ?>
      <a class="jg-service-card" href="<?= esc_url( $svc['url'] ) ?>">
        <picture>
          <source media="(max-width:640px)" srcset="<?= esc_url( $svc['imgsm'] ) ?>" type="image/webp">
          <img class="jg-service-card__img" src="<?= esc_url( $svc['img'] ) ?>" alt="<?= esc_attr( $svc['alt'] ) ?>" width="688" height="500" loading="lazy">
        </picture>
        <div class="jg-service-card__overlay" aria-hidden="true"></div>
        <div class="jg-service-card__body">
          <h3 class="jg-service-card__title"><?= esc_html( $svc['title'] ) ?></h3>
          <span class="jg-service-card__cta"><?= esc_html__( 'Детаљније →', 'jugogradnja' ) ?></span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /wp:html -->
