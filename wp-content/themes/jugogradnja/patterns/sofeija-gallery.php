<?php
/**
 * Title: Sofeija Gallery
 * Slug: jugogradnja/sofeija-gallery
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();
$base = $t . '/assets/images/sofeija/';

/*
 * Each category has a 'thumb' (the grid card image) and 'images' (the
 * lightbox gallery). Add more images to the 'images' array as assets
 * become available - the lightbox will show prev/next automatically.
 */
/* All sofeija images available as placeholders */
$all = array_map( fn($f) => $base . $f, [
    'gallery-1.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 'gallery-4.jpg',
    'gallery-5.jpg', 'gallery-6.jpg', 'gallery-7.jpg', 'gallery-8.jpg',
    'gallery-zidni.jpg',
] );

/* translators: %d is the image number within the category (1, 2, 3...) */
$alt_fmt = __( '%1$s %2$d', 'jugogradnja' );

$labels = [
    'kuhinjski'  => __( 'Кухињски елементи', 'jugogradnja' ),
    'plakari'    => __( 'Плакари', 'jugogradnja' ),
    'odlaganje'  => __( 'Елементи за одлагање', 'jugogradnja' ),
    'kupatilski' => __( 'Купатилски ормарићи', 'jugogradnja' ),
    'vratni'     => __( 'Вратни панели', 'jugogradnja' ),
    'vitrine'    => __( 'Витрине за вино', 'jugogradnja' ),
    'zidni'      => __( 'Зидни панели', 'jugogradnja' ),
    'komadani'   => __( 'Комадани намештај', 'jugogradnja' ),
    'dodaci'     => __( 'Додаци', 'jugogradnja' ),
];

$items = [
    [
        'label'  => $labels['kuhinjski'],
        'thumb'  => 'gallery-1.jpg',
        'images' => [
            [ 'src' => $all[0], 'alt' => sprintf( $alt_fmt, $labels['kuhinjski'], 1 ) ],
            [ 'src' => $all[1], 'alt' => sprintf( $alt_fmt, $labels['kuhinjski'], 2 ) ],
            [ 'src' => $all[2], 'alt' => sprintf( $alt_fmt, $labels['kuhinjski'], 3 ) ],
            [ 'src' => $all[3], 'alt' => sprintf( $alt_fmt, $labels['kuhinjski'], 4 ) ],
        ],
    ],
    [
        'label'  => $labels['plakari'],
        'thumb'  => 'gallery-2.jpg',
        'images' => [
            [ 'src' => $all[1], 'alt' => sprintf( $alt_fmt, $labels['plakari'], 1 ) ],
            [ 'src' => $all[2], 'alt' => sprintf( $alt_fmt, $labels['plakari'], 2 ) ],
            [ 'src' => $all[3], 'alt' => sprintf( $alt_fmt, $labels['plakari'], 3 ) ],
        ],
    ],
    [
        'label'  => $labels['odlaganje'],
        'thumb'  => 'gallery-3.jpg',
        'images' => [
            [ 'src' => $all[2], 'alt' => sprintf( $alt_fmt, $labels['odlaganje'], 1 ) ],
            [ 'src' => $all[3], 'alt' => sprintf( $alt_fmt, $labels['odlaganje'], 2 ) ],
            [ 'src' => $all[4], 'alt' => sprintf( $alt_fmt, $labels['odlaganje'], 3 ) ],
            [ 'src' => $all[5], 'alt' => sprintf( $alt_fmt, $labels['odlaganje'], 4 ) ],
        ],
    ],
    [
        'label'  => $labels['kupatilski'],
        'thumb'  => 'gallery-4.jpg',
        'images' => [
            [ 'src' => $all[3], 'alt' => sprintf( $alt_fmt, $labels['kupatilski'], 1 ) ],
            [ 'src' => $all[4], 'alt' => sprintf( $alt_fmt, $labels['kupatilski'], 2 ) ],
            [ 'src' => $all[0], 'alt' => sprintf( $alt_fmt, $labels['kupatilski'], 3 ) ],
        ],
    ],
    [
        'label'  => $labels['vratni'],
        'thumb'  => 'gallery-5.jpg',
        'images' => [
            [ 'src' => $all[4], 'alt' => sprintf( $alt_fmt, $labels['vratni'], 1 ) ],
            [ 'src' => $all[5], 'alt' => sprintf( $alt_fmt, $labels['vratni'], 2 ) ],
            [ 'src' => $all[6], 'alt' => sprintf( $alt_fmt, $labels['vratni'], 3 ) ],
            [ 'src' => $all[7], 'alt' => sprintf( $alt_fmt, $labels['vratni'], 4 ) ],
        ],
    ],
    [
        'label'  => $labels['vitrine'],
        'thumb'  => 'gallery-6.jpg',
        'images' => [
            [ 'src' => $all[5], 'alt' => sprintf( $alt_fmt, $labels['vitrine'], 1 ) ],
            [ 'src' => $all[6], 'alt' => sprintf( $alt_fmt, $labels['vitrine'], 2 ) ],
            [ 'src' => $all[7], 'alt' => sprintf( $alt_fmt, $labels['vitrine'], 3 ) ],
        ],
    ],
    [
        'label'  => $labels['zidni'],
        'thumb'  => 'gallery-zidni.jpg',
        'images' => [
            [ 'src' => $all[8], 'alt' => sprintf( $alt_fmt, $labels['zidni'], 1 ) ],
            [ 'src' => $all[0], 'alt' => sprintf( $alt_fmt, $labels['zidni'], 2 ) ],
            [ 'src' => $all[1], 'alt' => sprintf( $alt_fmt, $labels['zidni'], 3 ) ],
            [ 'src' => $all[2], 'alt' => sprintf( $alt_fmt, $labels['zidni'], 4 ) ],
        ],
    ],
    [
        'label'  => $labels['komadani'],
        'thumb'  => 'gallery-7.jpg',
        'images' => [
            [ 'src' => $all[6], 'alt' => sprintf( $alt_fmt, $labels['komadani'], 1 ) ],
            [ 'src' => $all[7], 'alt' => sprintf( $alt_fmt, $labels['komadani'], 2 ) ],
            [ 'src' => $all[8], 'alt' => sprintf( $alt_fmt, $labels['komadani'], 3 ) ],
        ],
    ],
    [
        'label'  => $labels['dodaci'],
        'thumb'  => 'gallery-8.jpg',
        'images' => [
            [ 'src' => $all[7], 'alt' => sprintf( $alt_fmt, $labels['dodaci'], 1 ) ],
            [ 'src' => $all[8], 'alt' => sprintf( $alt_fmt, $labels['dodaci'], 2 ) ],
            [ 'src' => $all[5], 'alt' => sprintf( $alt_fmt, $labels['dodaci'], 3 ) ],
            [ 'src' => $all[6], 'alt' => sprintf( $alt_fmt, $labels['dodaci'], 4 ) ],
        ],
    ],
];
?>
<section class="jg-sofeija-gallery">
	<div class="jg-sofeija-gallery__inner">
		<h2 class="jg-sofeija-gallery__heading"><?= esc_html__( 'Комплетно уређење по мери', 'jugogradnja' ) ?></h2>
		<div class="jg-sofeija-gallery__grid">
			<?php foreach ( $items as $item ) :
				$gallery_json = wp_json_encode( $item['images'] );
			?>
			<div class="jg-sofeija-gallery__card"
				 data-gallery="<?= esc_attr( $gallery_json ) ?>"
				 data-label="<?= esc_attr( $item['label'] ) ?>"
				 role="button"
				 tabindex="0"
				 aria-label="<?= esc_attr( sprintf( /* translators: %s is the gallery category name, e.g. "Плакари" */ __( '%s - отвори галерију', 'jugogradnja' ), $item['label'] ) ) ?>">
				<img src="<?= esc_url( $base . $item['thumb'] ) ?>"
					 alt="<?= esc_attr( $item['label'] ) ?>"
					 width="460" height="300" loading="lazy">
				<div class="jg-sofeija-gallery__label"><?= esc_html( $item['label'] ) ?></div>
				<div class="jg-sofeija-gallery__hover-icon" aria-hidden="true">
					<svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Lightbox modal -->
<div id="jg-sof-backdrop" class="jg-sof-backdrop" hidden></div>
<div id="jg-sof-modal" class="jg-sof-modal" role="dialog" aria-modal="true" aria-label="<?= esc_attr__( 'Галерија', 'jugogradnja' ) ?>" hidden>
	<button class="jg-sof-modal__close" aria-label="<?= esc_attr__( 'Затвори', 'jugogradnja' ) ?>">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M18 6L6 18M6 6l12 12" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
		</svg>
	</button>
	<div class="jg-sof-modal__stage">
		<button class="jg-sof-modal__prev" aria-label="<?= esc_attr__( 'Претходна слика', 'jugogradnja' ) ?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 18l-6-6 6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		<div class="jg-sof-modal__wrap">
			<img class="jg-sof-modal__img" src="" alt="">
		</div>
		<button class="jg-sof-modal__next" aria-label="<?= esc_attr__( 'Следећа слика', 'jugogradnja' ) ?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M9 18l6-6-6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
	</div>
	<div class="jg-sof-modal__caption"></div>
	<div class="jg-sof-modal__dots"></div>
</div>
