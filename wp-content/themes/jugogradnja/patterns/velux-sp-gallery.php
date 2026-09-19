<?php
/**
 * Title: VELUX Subpage Gallery
 * Slug: jugogradnja/velux-sp-gallery
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

// Resolve the SERBIAN (source) slug regardless of current language, since
// the $configs keys below and the image filenames on disk are named after
// the Serbian originals - the English pages have different slugs
// (e.g. velux-komfor-plus -> velux-comfort-plus) which would otherwise
// fail to match.
$page_slug  = '';
$current_id = get_queried_object_id();
if ( $current_id ) {
    $sr_ref_id = $current_id;
    if ( defined( 'ICL_SITEPRESS_VERSION' ) && function_exists( 'wpml_get_current_language' ) && 'sr' !== wpml_get_current_language() ) {
        global $wpdb;
        $element_type = 'post_' . get_post_type( $current_id );
        $trid = $wpdb->get_var( $wpdb->prepare(
            "SELECT trid FROM {$wpdb->prefix}icl_translations WHERE element_id = %d AND element_type = %s",
            $current_id, $element_type
        ) );
        if ( $trid ) {
            $sr_id = $wpdb->get_var( $wpdb->prepare(
                "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE trid = %d AND language_code = 'sr'",
                $trid
            ) );
            if ( $sr_id ) {
                $sr_ref_id = (int) $sr_id;
            }
        }
    }
    $ref_post = get_post( $sr_ref_id );
    if ( $ref_post ) {
        $page_slug = $ref_post->post_name;
    }
}
if ( ! $page_slug ) {
    // Fallback: derive from the request URI (original behavior).
    $uri_path  = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
    $segments  = array_values( array_filter( explode( '/', $uri_path ) ) );
    $page_slug = end( $segments ) ?: '';
}
$slug_short = str_replace( 'velux-', '', $page_slug );
?>
<section class="jg-velux-sp-gallery">
	<div class="jg-velux-sp-gallery__inner">
		<h2 class="jg-velux-sp-gallery__heading"><?= esc_html__( 'Галерија производа', 'jugogradnja' ) ?></h2>
		<div class="jg-velux-sp-gallery__grid">
			<div class="jg-velux-sp-gallery__item">
				<img src="<?= $t ?>/assets/images/velux/product-<?= esc_attr( $slug_short ) ?>.jpg" alt="" width="800" height="364" loading="lazy">
			</div>
			<div class="jg-velux-sp-gallery__item">
				<img src="<?= $t ?>/assets/images/velux/hero-bg.jpg" alt="" width="800" height="364" loading="lazy">
			</div>
			<div class="jg-velux-sp-gallery__item">
				<img src="<?= $t ?>/assets/images/velux/subpage-hero-bg.jpg" alt="" width="800" height="364" loading="lazy">
			</div>
		</div>
	</div>
</section>
