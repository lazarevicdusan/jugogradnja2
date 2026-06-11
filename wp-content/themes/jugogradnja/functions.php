<?php
/**
 * Jugogradnja block theme — functions.php
 *
 * Performance-first setup:
 * - Remove WordPress bloat (emoji, oEmbed, XML-RPC, REST-API generator header).
 * - Enable per-block stylesheet loading.
 * - Self-hosted font preloads for above-the-fold weights.
 * - Defer non-critical JS.
 * - Register custom post types, taxonomies, and block categories.
 * - Transliteration filter for Cyrillic → Latin script toggle.
 * - WPML integration hooks (activated when WPML is present).
 */

defined( 'ABSPATH' ) || exit;

// ──────────────────────────────────────────────
// 1. PERFORMANCE — remove default bloat
// ──────────────────────────────────────────────

add_action( 'init', function () {
	// Emoji
	remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles',     'print_emoji_styles' );
	remove_action( 'admin_print_styles',  'print_emoji_styles' );
	remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss',    'wp_staticize_emoji' );
	remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email' );
	add_filter( 'emoji_svg_url', '__return_false' );

	// oEmbed
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );

	// Generator / version leaks
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	add_filter( 'the_generator', '__return_empty_string' );
} );

// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Remove X-Pingback header
add_filter( 'wp_headers', function ( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
} );

// Per-block stylesheet loading (FSE / block themes need this too)
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

// ──────────────────────────────────────────────
// 2. THEME SETUP
// ──────────────────────────────────────────────

add_action( 'after_setup_theme', function () {
	add_theme_support( 'block-template-parts' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'responsive-embeds' );

	// Menus
	register_nav_menus( [
		'primary' => __( 'Primarni meni', 'jugogradnja' ),
		'footer'  => __( 'Meni u podnožju', 'jugogradnja' ),
		'legal'   => __( 'Pravni meni', 'jugogradnja' ),
	] );

	// Image sizes
	add_image_size( 'jugogradnja-hero',    1920, 900,  true );
	add_image_size( 'jugogradnja-hero-sm',  768, 600,  true );
	add_image_size( 'jugogradnja-card',     800, 500,  true );
	add_image_size( 'jugogradnja-card-sm',  400, 250,  true );
	add_image_size( 'jugogradnja-thumb',    400, 300,  true );
} );

// ──────────────────────────────────────────────
// 3. SCRIPTS & STYLES
// ──────────────────────────────────────────────

add_action( 'wp_enqueue_scripts', function () {
	$ver = wp_get_theme()->get( 'Version' );
	$uri = get_template_directory_uri();

	// Base stylesheet
	wp_enqueue_style( 'jugogradnja-style', get_stylesheet_uri(), [], $ver );

	// Global base styles (body offset, resets, utilities)
	wp_enqueue_style( 'jugogradnja-global', $uri . '/assets/css/global.css', [ 'jugogradnja-style' ], $ver );

	// Header + footer styles (always needed)
	wp_enqueue_style( 'jugogradnja-header', $uri . '/assets/css/header.css', [ 'jugogradnja-global' ], $ver );
	wp_enqueue_style( 'jugogradnja-footer', $uri . '/assets/css/footer.css', [ 'jugogradnja-global' ], $ver );

	// Theme JS (deferred)
	wp_enqueue_script( 'jugogradnja-main', $uri . '/assets/js/main.js', [], $ver, true );

	// Pass REST nonce to JS
	wp_localize_script( 'jugogradnja-main', 'jgData', [
		'nonce' => wp_create_nonce( 'wp_rest' ),
	] );
} );

// Defer non-critical scripts
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if ( 'jugogradnja-main' === $handle ) {
		return str_replace( ' src', ' defer src', $tag );
	}
	return $tag;
}, 10, 2 );

// ──────────────────────────────────────────────
// 4. FONT PRELOADS (above-the-fold weights only)
// ──────────────────────────────────────────────

add_action( 'wp_head', function () {
	$font_dir = get_template_directory_uri() . '/assets/fonts/';
	$preloads = [
		'montserrat-700.woff2',
		'roboto-300.woff2',
	];
	foreach ( $preloads as $font ) {
		printf(
			'<link rel="preload" href="%s%s" as="font" type="font/woff2" crossorigin="anonymous">' . "\n",
			esc_url( $font_dir ),
			esc_attr( $font )
		);
	}
}, 2 );

// ──────────────────────────────────────────────
// 5. CUSTOM POST TYPES
// ──────────────────────────────────────────────

add_action( 'init', function () {

	// projekat — Reference / Projekti
	register_post_type( 'projekat', [
		'labels' => [
			'name'               => __( 'Reference', 'jugogradnja' ),
			'singular_name'      => __( 'Projekat', 'jugogradnja' ),
			'add_new_item'       => __( 'Dodaj projekat', 'jugogradnja' ),
			'edit_item'          => __( 'Uredi projekat', 'jugogradnja' ),
			'view_item'          => __( 'Pogledaj projekat', 'jugogradnja' ),
			'search_items'       => __( 'Pretraži projekte', 'jugogradnja' ),
			'not_found'          => __( 'Nema projekata.', 'jugogradnja' ),
		],
		'public'             => true,
		'has_archive'        => true,
		'rewrite'            => [ 'slug' => 'reference' ],
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-building',
		'menu_position'      => 5,
	] );

	// nekretnina — Real estate
	register_post_type( 'nekretnina', [
		'labels' => [
			'name'          => __( 'Nekretnine', 'jugogradnja' ),
			'singular_name' => __( 'Nekretnina', 'jugogradnja' ),
			'add_new_item'  => __( 'Dodaj nekretninu', 'jugogradnja' ),
			'edit_item'     => __( 'Uredi nekretninu', 'jugogradnja' ),
			'view_item'     => __( 'Pogledaj nekretninu', 'jugogradnja' ),
			'not_found'     => __( 'Nema nekretnina.', 'jugogradnja' ),
		],
		'public'             => true,
		'has_archive'        => true,
		'rewrite'            => [ 'slug' => 'nekretnine' ],
		'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-admin-home',
		'menu_position'      => 6,
	] );

	// pozicija — Job positions
	register_post_type( 'pozicija', [
		'labels' => [
			'name'          => __( 'Karijera pozicije', 'jugogradnja' ),
			'singular_name' => __( 'Pozicija', 'jugogradnja' ),
			'add_new_item'  => __( 'Dodaj poziciju', 'jugogradnja' ),
			'edit_item'     => __( 'Uredi poziciju', 'jugogradnja' ),
			'view_item'     => __( 'Pogledaj poziciju', 'jugogradnja' ),
			'not_found'     => __( 'Nema otvorenih pozicija.', 'jugogradnja' ),
		],
		'public'             => true,
		'has_archive'        => true,
		'rewrite'            => [ 'slug' => 'karijera/pozicije' ],
		'supports'           => [ 'title', 'editor', 'custom-fields' ],
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-id',
		'menu_position'      => 7,
	] );

	// Taxonomies
	register_taxonomy( 'kategorija_projekta', 'projekat', [
		'labels'        => [ 'name' => __( 'Kategorije projekata', 'jugogradnja' ), 'singular_name' => __( 'Kategorija projekta', 'jugogradnja' ) ],
		'public'        => true,
		'rewrite'       => [ 'slug' => 'kategorija-projekta' ],
		'show_in_rest'  => true,
		'hierarchical'  => true,
	] );

	register_taxonomy( 'tip_nekretnine', 'nekretnina', [
		'labels'        => [ 'name' => __( 'Tipovi nekretnina', 'jugogradnja' ), 'singular_name' => __( 'Tip nekretnine', 'jugogradnja' ) ],
		'public'        => true,
		'rewrite'       => [ 'slug' => 'tip-nekretnine' ],
		'show_in_rest'  => true,
		'hierarchical'  => true,
	] );
} );

// ──────────────────────────────────────────────
// 6. CYRILLIC → LATIN TRANSLITERATION
// ──────────────────────────────────────────────

/**
 * Standard Serbian Cyrillic → Latin (Gaj's alphabet) mapping.
 * Applied via a session flag; WPML language URL takes precedence for English.
 */
function jugogradnja_cyr_to_lat( string $str ): string {
	$map = [
		// Upper
		'А'=>'A','Б'=>'B','В'=>'V','Г'=>'G','Д'=>'D','Ђ'=>'Đ','Е'=>'E',
		'Ж'=>'Ž','З'=>'Z','И'=>'I','Ј'=>'J','К'=>'K','Л'=>'L','Љ'=>'Lj',
		'М'=>'M','Н'=>'N','Њ'=>'Nj','О'=>'O','П'=>'P','Р'=>'R','С'=>'S',
		'Т'=>'T','Ћ'=>'Ć','У'=>'U','Ф'=>'F','Х'=>'H','Ц'=>'C','Ч'=>'Č',
		'Џ'=>'Dž','Ш'=>'Š',
		// Lower
		'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','ђ'=>'đ','е'=>'e',
		'ж'=>'ž','з'=>'z','и'=>'i','ј'=>'j','к'=>'k','л'=>'l','љ'=>'lj',
		'м'=>'m','н'=>'n','њ'=>'nj','о'=>'o','п'=>'p','р'=>'r','с'=>'s',
		'т'=>'t','ћ'=>'ć','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'č',
		'џ'=>'dž','ш'=>'š',
	];
	return strtr( $str, $map );
}

/**
 * Determine current script from cookie (default: cyrillic).
 */
function jugogradnja_current_script(): string {
	return ( isset( $_COOKIE['jg_script'] ) && $_COOKIE['jg_script'] === 'latin' ) ? 'latin' : 'cyrillic';
}

/**
 * Apply transliteration to text if Latin script is active.
 * Hooked to the_title, the_content, and widget_title when needed.
 */
function jugogradnja_maybe_transliterate( string $text ): string {
	if ( jugogradnja_current_script() === 'latin' ) {
		return jugogradnja_cyr_to_lat( $text );
	}
	return $text;
}

// Apply transliteration to rendered content when Latin is active.
// We hook at a late priority so WPML's language filters run first.
add_filter( 'the_title',     'jugogradnja_maybe_transliterate', 20 );
add_filter( 'the_content',   'jugogradnja_maybe_transliterate', 20 );
add_filter( 'widget_title',  'jugogradnja_maybe_transliterate', 20 );
add_filter( 'nav_menu_item_title', 'jugogradnja_maybe_transliterate', 20 );

// REST endpoint to set the script cookie (used by the JS toggle).
add_action( 'rest_api_init', function () {
	register_rest_route( 'jugogradnja/v1', '/set-script', [
		'methods'             => 'POST',
		'callback'            => function ( WP_REST_Request $req ) {
			$script = $req->get_param( 'script' );
			if ( ! in_array( $script, [ 'cyrillic', 'latin' ], true ) ) {
				return new WP_Error( 'invalid_script', 'Invalid script value.', [ 'status' => 400 ] );
			}
			// Cookie set server-side so it works without JS on next load.
			setcookie( 'jg_script', $script, [
				'expires'  => time() + YEAR_IN_SECONDS,
				'path'     => '/',
				'secure'   => is_ssl(),
				'httponly' => false, // needs to be readable by JS for the toggle state
				'samesite' => 'Lax',
			] );
			return [ 'script' => $script ];
		},
		'permission_callback' => '__return_true',
	] );
} );

// ──────────────────────────────────────────────
// 7. WPML INTEGRATION (loads only when WPML active)
// ──────────────────────────────────────────────

add_action( 'plugins_loaded', function () {
	if ( ! defined( 'ICL_SITEPRESS_VERSION' ) ) {
		return;
	}

	// Translatable CPTs and taxonomies — register with WPML
	add_filter( 'wpml_translatable_documents', function ( $types ) {
		$types['projekat']  = [ 'language_independent' => false ];
		$types['nekretnina'] = [ 'language_independent' => false ];
		$types['pozicija']  = [ 'language_independent' => false ];
		return $types;
	} );
} );

// ──────────────────────────────────────────────
// 8. BLOCK CATEGORY
// ──────────────────────────────────────────────

add_filter( 'block_categories_all', function ( $categories ) {
	return array_merge(
		[
			[
				'slug'  => 'jugogradnja',
				'title' => 'Jugogradnja',
				'icon'  => 'building',
			],
		],
		$categories
	);
}, 10, 1 );

// ──────────────────────────────────────────────
// 9. SECURITY HARDENING
// ──────────────────────────────────────────────

// Hide login errors
add_filter( 'login_errors', fn() => __( 'Pogrešni podaci.', 'jugogradnja' ) );

// Disable file editing via admin
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

// ──────────────────────────────────────────────
// 10. CUSTOM BLOCKS
// ──────────────────────────────────────────────

add_action( 'init', function () {
	$blocks_dir = get_template_directory() . '/blocks';

	register_block_type( $blocks_dir . '/site-header' );
	register_block_type( $blocks_dir . '/site-footer' );
} );

// ──────────────────────────────────────────────
// 11. SVG UPLOAD SUPPORT
// ──────────────────────────────────────────────

add_filter( 'upload_mimes', function ( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
} );

// Verify SVGs on upload (basic security check)
add_filter( 'wp_check_filetype_and_ext', function ( $data, $file, $filename, $mimes ) {
	if ( ! $data['type'] ) {
		$ext = pathinfo( $filename, PATHINFO_EXTENSION );
		if ( in_array( $ext, [ 'svg', 'svgz' ], true ) ) {
			$data['type'] = 'image/svg+xml';
			$data['ext']  = $ext;
		}
	}
	return $data;
}, 10, 4 );
