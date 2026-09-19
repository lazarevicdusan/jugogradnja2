<?php
/**
 * Title: VELUX Subpage Features
 * Slug: jugogradnja/velux-subpage-features
 * Categories: jugogradnja
 */
// Resolve the SERBIAN (source) slug regardless of current language, since
// the $configs keys below are the Serbian slugs - the English pages have
// different slugs (e.g. velux-komfor-plus -> velux-comfort-plus) which
// would otherwise fail to match. get_queried_object_id() returns 0 in
// this pattern's rendering context, so look the current post up by its
// own URL slug instead of relying on the main query object.
$page_slug  = '';
$url_path   = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$url_segs   = array_values( array_filter( explode( '/', $url_path ) ) );
$url_slug   = end( $url_segs ) ?: '';
$current_post = $url_slug ? get_page_by_path( $url_slug ) : null;
$current_id = $current_post ? $current_post->ID : 0;
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
    $page_slug = $url_slug;
}

$configs = [
	'velux-osnovni' => [
		'desc'     => __( 'Основни серија VELUX кровних прозора нуди купцима приступачне прозоре без компромиса по питању квалитета. Ова серија пружа све битне функционалности и нуди вам широку понуду: било да желите горње или доње управљање, дрвени или прозор без додатног одржавања.', 'jugogradnja' ),
		'features' => [
			['icon' => 'box',     'title' => __( 'Двоструко застакљење', 'jugogradnja' ), 'desc' => __( 'Одлична термичка изолација', 'jugogradnja' )],
			['icon' => 'options', 'title' => __( 'Две опције материјала', 'jugogradnja' ), 'desc' => __( 'Дрво или полиуретан', 'jugogradnja' )],
			['icon' => 'shield',  'title' => __( '10 година гаранције', 'jugogradnja' ),  'desc' => __( 'На све прозоре', 'jugogradnja' )],
		],
	],
	'velux-standard' => [
		'desc'     => __( 'Стандард серија VELUX кровних прозора је идеална за власнике поткровља који су спремни да инвестирају у додатну енергетску ефикасност и комфор. То укључује изузетно приступачно троструко стакло, које вам олакшава да свој дом држите топлим.', 'jugogradnja' ),
		'features' => [
			['icon' => 'energy',  'title' => __( 'Троструко застакљење', 'jugogradnja' ), 'desc' => __( 'Максимална изолација', 'jugogradnja' )],
			['icon' => 'box',     'title' => __( 'Две опције', 'jugogradnja' ),            'desc' => __( 'Дрво или полиуретан', 'jugogradnja' )],
			['icon' => 'options', 'title' => __( 'Уштеда енергије', 'jugogradnja' ),       'desc' => __( 'До 30% мање трошкова', 'jugogradnja' )],
			['icon' => 'shield',  'title' => __( '10 година гаранције', 'jugogradnja' ),   'desc' => __( 'На све прозоре', 'jugogradnja' )],
		],
	],
	'velux-komfor' => [
		'desc'     => __( 'Комфор серија обухвата панорамске прозоре који пружају непроцењив поглед на природу, као и прозоре на даљинско управљање са електричним или соларним напајањем. Савршено решење за модеран дом.', 'jugogradnja' ),
		'features' => [
			['icon' => 'panorama',  'title' => __( 'Панорамски прозори', 'jugogradnja' ),    'desc' => __( 'Максимални поглед на природу', 'jugogradnja' )],
			['icon' => 'remote',    'title' => __( 'Даљинско управљање', 'jugogradnja' ),   'desc' => __( 'Електро/соларно напајање', 'jugogradnja' )],
		],
	],
	'velux-komfor-plus' => [
		'desc'     => __( 'Комфор Плус серија нуди врхунске кровне прозоре са побољшаним карактеристикама стакла који вам гарантују енергетску ефикасност и модерна решења. Изаберите између обичних, панорамских или електро прозора са сигурносним стаклом.', 'jugogradnja' ),
		'features' => [
			['icon' => 'touch',    'title' => __( 'Обични прозори', 'jugogradnja' ),   'desc' => __( 'Са сигурносним стаклом', 'jugogradnja' )],
			['icon' => 'panorama', 'title' => __( 'Панорамски', 'jugogradnja' ),        'desc' => __( 'Максимални поглед', 'jugogradnja' )],
			['icon' => 'remote',   'title' => __( 'Електро', 'jugogradnja' ),           'desc' => __( 'Са сигурносним стаклом', 'jugogradnja' )],
		],
	],
];

$cfg = $configs[ $page_slug ] ?? $configs['velux-osnovni'];

$icons = [
	'box'      => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><path d="M14.6667 28.9733C15.0721 29.2074 15.5319 29.3306 16 29.3306C16.4681 29.3306 16.9279 29.2074 17.3333 28.9733L26.6667 23.64C27.0717 23.4062 27.408 23.07 27.6421 22.6651C27.8761 22.2603 27.9995 21.801 28 21.3333V10.6667C27.9995 10.199 27.8761 9.73975 27.6421 9.33488C27.408 8.93002 27.0717 8.59382 26.6667 8.36L17.3333 3.02667C16.9279 2.79262 16.4681 2.6694 16 2.6694C15.5319 2.6694 15.0721 2.79262 14.6667 3.02667L5.33333 8.36C4.92835 8.59382 4.59197 8.93002 4.35795 9.33488C4.12392 9.73975 4.00048 10.199 4 10.6667V21.3333C4.00048 21.801 4.12392 22.2603 4.35795 22.6651C4.59197 23.07 4.92835 23.4062 5.33333 23.64L14.6667 28.9733Z" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 29.3333V16" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.38667 9.33333L16 16L27.6133 9.33333" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 5.69333L22 12.56" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'options'  => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><path d="M26.6667 17.3333C26.6667 24 22 27.3333 16.4533 29.2667C16.1629 29.3651 15.8474 29.3604 15.56 29.2533C10 27.3333 5.33333 24 5.33333 17.3333V8C5.33333 7.64638 5.47381 7.30724 5.72386 7.05719C5.97391 6.80714 6.31304 6.66667 6.66667 6.66667C9.33333 6.66667 12.6667 5.06667 14.9867 3.04C15.2691 2.79866 15.6285 2.66607 16 2.66607C16.3715 2.66607 16.7309 2.79866 17.0133 3.04C19.3467 5.08 22.6667 6.66667 25.3333 6.66667C25.687 6.66667 26.0261 6.80714 26.2761 7.05719C26.5262 7.30724 26.6667 7.64638 26.6667 8V17.3333Z" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'shield'   => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><path d="M20.636 17.1867L22.656 28.5547C22.6786 28.6885 22.6598 28.8261 22.6022 28.949C22.5445 29.0719 22.4507 29.1743 22.3332 29.2424C22.2158 29.3105 22.0804 29.3412 21.9451 29.3303C21.8098 29.3194 21.681 29.2674 21.576 29.1813L16.8027 25.5987C16.5722 25.4265 16.2923 25.3335 16.0047 25.3335C15.717 25.3335 15.4371 25.4265 15.2067 25.5987L10.4253 29.18C10.3204 29.2659 10.1918 29.3178 10.0567 29.3287C9.9215 29.3396 9.78623 29.3091 9.66888 29.2412C9.55154 29.1732 9.4577 29.0711 9.39989 28.9484C9.34208 28.8258 9.32305 28.6884 9.34533 28.5547L11.364 17.1867" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 18.6667C20.4183 18.6667 24 15.0849 24 10.6667C24 6.24839 20.4183 2.66667 16 2.66667C11.5817 2.66667 8 6.24839 8 10.6667C8 15.0849 11.5817 18.6667 16 18.6667Z" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'layers'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M2 9l10 5 10-5M2 15l10 5 10-5M12 4L2 9l10 5 10-5-10-5z" stroke="#C5A059" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'energy'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M13 2L4 14h8l-1 8 9-12h-7l1-8z" stroke="#C5A059" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'panorama' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H28V12" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 28H4V20" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M27.9998 4L18.6665 13.3333" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 28.0003L13.3333 18.667" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'remote'   => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.5333 25.4665C1.3333 20.2665 1.3333 11.7332 6.5333 6.5332" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.4001 21.5999C7.33343 18.5333 7.33343 13.4666 10.4001 10.2666" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.0002 18.6663C17.4729 18.6663 18.6668 17.4724 18.6668 15.9997C18.6668 14.5269 17.4729 13.333 16.0002 13.333C14.5274 13.333 13.3335 14.5269 13.3335 15.9997C13.3335 17.4724 14.5274 18.6663 16.0002 18.6663Z" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M21.6001 10.4004C24.6668 13.4671 24.6668 18.5337 21.6001 21.7337" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M25.4668 6.5332C30.6668 11.7332 30.6668 20.1332 25.4668 25.3332" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'variants' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="2" y="3" width="6" height="8" rx="1" stroke="#C5A059" stroke-width="1.5"/><rect x="9" y="3" width="6" height="5" rx="1" stroke="#C5A059" stroke-width="1.5"/><rect x="16" y="3" width="6" height="8" rx="1" stroke="#C5A059" stroke-width="1.5"/><line x1="2" y1="16" x2="22" y2="16" stroke="#C5A059" stroke-width="1.5" stroke-linecap="round"/></svg>',
	'glass'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#C5A059" stroke-width="1.5"/><line x1="7" y1="3" x2="7" y2="21" stroke="#C5A059" stroke-width="1.3" stroke-linecap="round"/><line x1="12" y1="3" x2="12" y2="21" stroke="#C5A059" stroke-width="1.3" stroke-linecap="round"/></svg>',
	'touch'    => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 14.6667V8C20 6.53333 18.8 5.33333 17.3333 5.33333C15.8667 5.33333 14.6667 6.53333 14.6667 8V14.6667" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.6667 9.33333C14.6667 7.86667 13.4667 6.66667 12 6.66667C10.5333 6.66667 9.33333 7.86667 9.33333 9.33333V14.6667" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.33333 14.6667C9.33333 13.2 8.13333 12 6.66667 12C5.2 12 4 13.2 4 14.6667V20C4 25.5333 8.46667 29.3333 14.6667 29.3333C20.8667 29.3333 25.3333 25.5333 25.3333 20V14.6667C25.3333 13.2 24.1333 12 22.6667 12C21.2 12 20 13.2 20 14.6667" stroke="#C5A059" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
];
?>
<section class="jg-velux-sp-features">
	<div class="jg-velux-sp-features__inner">
		<p class="jg-velux-sp-features__desc"><?= esc_html( $cfg['desc'] ) ?></p>
		<div class="jg-velux-sp-features__grid" data-cols="<?= count( $cfg['features'] ) ?>">
			<?php foreach ( $cfg['features'] as $f ) : ?>
			<div class="jg-velux-sp-features__card">
				<div class="jg-velux-sp-features__icon"><?= $icons[ $f['icon'] ] ?? $icons['shield'] ?></div>
				<h3 class="jg-velux-sp-features__title"><?= esc_html( $f['title'] ) ?></h3>
				<p class="jg-velux-sp-features__text"><?= esc_html( $f['desc'] ) ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
