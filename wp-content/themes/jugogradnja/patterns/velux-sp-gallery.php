<?php
/**
 * Title: VELUX Subpage Gallery
 * Slug: jugogradnja/velux-sp-gallery
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

$uri_path  = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$segments  = array_values( array_filter( explode( '/', $uri_path ) ) );
$page_slug = end( $segments ) ?: '';
$slug_short = str_replace( 'velux-', '', $page_slug );
?>
<section class="jg-velux-sp-gallery">
	<div class="jg-velux-sp-gallery__inner">
		<h2 class="jg-velux-sp-gallery__heading">Галерија производа</h2>
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
