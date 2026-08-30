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

$items = [
    [
        'label'  => 'Кухињски елементи',
        'thumb'  => 'gallery-1.jpg',
        'images' => [
            [ 'src' => $all[0], 'alt' => 'Кухињски елементи 1' ],
            [ 'src' => $all[1], 'alt' => 'Кухињски елементи 2' ],
            [ 'src' => $all[2], 'alt' => 'Кухињски елементи 3' ],
            [ 'src' => $all[3], 'alt' => 'Кухињски елементи 4' ],
        ],
    ],
    [
        'label'  => 'Плакари',
        'thumb'  => 'gallery-2.jpg',
        'images' => [
            [ 'src' => $all[1], 'alt' => 'Плакари 1' ],
            [ 'src' => $all[2], 'alt' => 'Плакари 2' ],
            [ 'src' => $all[3], 'alt' => 'Плакари 3' ],
        ],
    ],
    [
        'label'  => 'Елементи за одлагање',
        'thumb'  => 'gallery-3.jpg',
        'images' => [
            [ 'src' => $all[2], 'alt' => 'Елементи за одлагање 1' ],
            [ 'src' => $all[3], 'alt' => 'Елементи за одлагање 2' ],
            [ 'src' => $all[4], 'alt' => 'Елементи за одлагање 3' ],
            [ 'src' => $all[5], 'alt' => 'Елементи за одлагање 4' ],
        ],
    ],
    [
        'label'  => 'Купатилски ормарићи',
        'thumb'  => 'gallery-4.jpg',
        'images' => [
            [ 'src' => $all[3], 'alt' => 'Купатилски ормарићи 1' ],
            [ 'src' => $all[4], 'alt' => 'Купатилски ормарићи 2' ],
            [ 'src' => $all[0], 'alt' => 'Купатилски ормарићи 3' ],
        ],
    ],
    [
        'label'  => 'Вратни панели',
        'thumb'  => 'gallery-5.jpg',
        'images' => [
            [ 'src' => $all[4], 'alt' => 'Вратни панели 1' ],
            [ 'src' => $all[5], 'alt' => 'Вратни панели 2' ],
            [ 'src' => $all[6], 'alt' => 'Вратни панели 3' ],
            [ 'src' => $all[7], 'alt' => 'Вратни панели 4' ],
        ],
    ],
    [
        'label'  => 'Витрине за вино',
        'thumb'  => 'gallery-6.jpg',
        'images' => [
            [ 'src' => $all[5], 'alt' => 'Витрине за вино 1' ],
            [ 'src' => $all[6], 'alt' => 'Витрине за вино 2' ],
            [ 'src' => $all[7], 'alt' => 'Витрине за вино 3' ],
        ],
    ],
    [
        'label'  => 'Зидни панели',
        'thumb'  => 'gallery-zidni.jpg',
        'images' => [
            [ 'src' => $all[8], 'alt' => 'Зидни панели 1' ],
            [ 'src' => $all[0], 'alt' => 'Зидни панели 2' ],
            [ 'src' => $all[1], 'alt' => 'Зидни панели 3' ],
            [ 'src' => $all[2], 'alt' => 'Зидни панели 4' ],
        ],
    ],
    [
        'label'  => 'Комадани намештај',
        'thumb'  => 'gallery-7.jpg',
        'images' => [
            [ 'src' => $all[6], 'alt' => 'Комадани намештај 1' ],
            [ 'src' => $all[7], 'alt' => 'Комадани намештај 2' ],
            [ 'src' => $all[8], 'alt' => 'Комадани намештај 3' ],
        ],
    ],
    [
        'label'  => 'Додаци',
        'thumb'  => 'gallery-8.jpg',
        'images' => [
            [ 'src' => $all[7], 'alt' => 'Додаци 1' ],
            [ 'src' => $all[8], 'alt' => 'Додаци 2' ],
            [ 'src' => $all[5], 'alt' => 'Додаци 3' ],
            [ 'src' => $all[6], 'alt' => 'Додаци 4' ],
        ],
    ],
];
?>
<section class="jg-sofeija-gallery">
	<div class="jg-sofeija-gallery__inner">
		<h2 class="jg-sofeija-gallery__heading">Комплетно уређење по мери</h2>
		<div class="jg-sofeija-gallery__grid">
			<?php foreach ( $items as $item ) :
				$gallery_json = wp_json_encode( $item['images'] );
			?>
			<div class="jg-sofeija-gallery__card"
				 data-gallery="<?= esc_attr( $gallery_json ) ?>"
				 data-label="<?= esc_attr( $item['label'] ) ?>"
				 role="button"
				 tabindex="0"
				 aria-label="<?= esc_attr( $item['label'] ) ?> - отвори галерију">
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
<div id="jg-sof-modal" class="jg-sof-modal" role="dialog" aria-modal="true" aria-label="Галерија" hidden>
	<button class="jg-sof-modal__close" aria-label="Затвори">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M18 6L6 18M6 6l12 12" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
		</svg>
	</button>
	<div class="jg-sof-modal__stage">
		<button class="jg-sof-modal__prev" aria-label="Претходна слика">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 18l-6-6 6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		<div class="jg-sof-modal__wrap">
			<img class="jg-sof-modal__img" src="" alt="">
		</div>
		<button class="jg-sof-modal__next" aria-label="Следећа слика">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M9 18l6-6-6-6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
	</div>
	<div class="jg-sof-modal__caption"></div>
	<div class="jg-sof-modal__dots"></div>
</div>
