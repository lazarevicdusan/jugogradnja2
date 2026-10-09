<?php
/**
 * Title: Sofeija Gallery
 * Slug: jugogradnja/sofeija-gallery
 * Categories: jugogradnja
 */
$t    = get_template_directory_uri();
$base = $t . '/assets/images/sofeija/gallery/';

/* translators: %d is the image number within the category (1, 2, 3...) */
$alt_fmt = __( '%1$s %2$d', 'jugogradnja' );

$labels = [
    'kuhinja'      => __( 'Кухињски елементи', 'jugogradnja' ),
    'plakari'      => __( 'Плакари', 'jugogradnja' ),
    'kupatilo'     => __( 'Купатилски ормарићи', 'jugogradnja' ),
    'opustanje'    => __( 'Простор за опуштање', 'jugogradnja' ),
    'radni'        => __( 'Радни простор', 'jugogradnja' ),
    'spavace'      => __( 'Спаваће собе', 'jugogradnja' ),
    'trpezarija'   => __( 'Трпезарија', 'jugogradnja' ),
    'zidni'        => __( 'Зидни панели', 'jugogradnja' ),
    'dodaci'       => __( 'Додаци', 'jugogradnja' ),
];

/*
 * Each category lists its own image filenames (first one doubles as the
 * grid thumbnail). Add/remove filenames here as assets change - the
 * lightbox shows prev/next automatically based on how many are listed.
 */
$files = [
    'kuhinja'    => [ 'kuhinja-1.png', 'kuhinja-2.png', 'kuhinja-3.jpg', 'kuhinja-4.jpg', 'kuhinja-5.jpg', 'kuhinja-6.jpg' ],
    'plakari'    => [ 'plakari-1.jpg', 'plakari-2.jpg', 'plakari-3.jpg', 'plakari-4.jpg', 'plakari-5.jpg', 'plakari-6.jpg' ],
    'kupatilo'   => [ 'kupatilo-1.jpg', 'kupatilo-2.jpg', 'kupatilo-3.jpg' ],
    'opustanje'  => [ 'opustanje-1.jpg', 'opustanje-2.jpg', 'opustanje-3.jpg', 'opustanje-4.jpg', 'opustanje-5.jpg', 'opustanje-6.jpg', 'opustanje-7.jpg' ],
    'radni'      => [ 'radni-prostor-1.jpg', 'radni-prostor-2.jpg', 'radni-prostor-3.jpg' ],
    'spavace'    => [ 'spavace-sobe-1.jpg', 'spavace-sobe-2.jpg', 'spavace-sobe-3.jpg', 'spavace-sobe-4.jpg', 'spavace-sobe-5.jpg' ],
    'trpezarija' => [ 'trpezarija-1.jpg', 'trpezarija-2.jpg', 'trpezarija-3.jpg', 'trpezarija-4.jpg', 'trpezarija-5.jpg', 'trpezarija-6.jpg' ],
    'zidni'      => [ 'zidni-paneli-1.jpeg', 'zidni-paneli-2.jpeg', 'zidni-paneli-3.jpg', 'zidni-paneli-4.jpeg' ],
    'dodaci'     => [ 'dodaci-1.jpg', 'dodaci-2.jpg', 'dodaci-3.jpg', 'dodaci-4.jpg', 'dodaci-5.jpg', 'dodaci-6.jpg', 'dodaci-7.jpg' ],
];

$items = [];
foreach ( $files as $key => $filenames ) {
    $label  = $labels[ $key ];
    $images = [];
    foreach ( $filenames as $i => $filename ) {
        $images[] = [
            'src' => $base . $filename,
            'alt' => sprintf( $alt_fmt, $label, $i + 1 ),
        ];
    }
    $items[] = [
        'label'  => $label,
        'thumb'  => $filenames[0],
        'images' => $images,
    ];
}
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
