<?php
/**
 * Jugogradnja block theme - functions.php
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
// 1. PERFORMANCE - remove default bloat
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

	// Pattern / section styles
	wp_enqueue_style( 'jugogradnja-patterns', $uri . '/assets/css/patterns.css', [ 'jugogradnja-global' ], $ver );

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
// 4a. FAVICON (theme-bundled, no media-library dependency)
// ──────────────────────────────────────────────

add_action( 'wp_head', function () {
	$dir = get_template_directory_uri() . '/assets/images/favicon/';
	printf( '<link rel="icon" href="%sfavicon-32.png" sizes="32x32">' . "\n", esc_url( $dir ) );
	printf( '<link rel="apple-touch-icon" href="%sapple-touch-icon.png">' . "\n", esc_url( $dir ) );
}, 1 );

// ──────────────────────────────────────────────
// 4b. SEO META TAGS (description, canonical, Open Graph, Twitter Card)
// ──────────────────────────────────────────────

/**
 * Build a plain-text description for the current page: post excerpt if
 * set, otherwise the first ~30 words of post content, falling back to
 * the site tagline on the homepage or any page without content.
 */
function jugogradnja_seo_description(): string {
	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
		if ( $excerpt ) {
			return wp_strip_all_tags( $excerpt );
		}
		global $post;
		if ( $post && $post->post_content ) {
			return wp_trim_words( wp_strip_all_tags( $post->post_content ), 30 );
		}
	}
	return get_bloginfo( 'description' ) ?: get_bloginfo( 'name' );
}

/**
 * Absolute URL of the current page's featured image (or the site-wide
 * fallback hero photo), for Open Graph / Twitter Card.
 */
function jugogradnja_seo_image(): string {
	if ( is_singular() && has_post_thumbnail() ) {
		$src = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		if ( $src ) {
			return $src;
		}
	}
	return get_template_directory_uri() . '/assets/images/photos/hero.jpg';
}

add_action( 'wp_head', function () {
	$description = esc_attr( jugogradnja_seo_description() );
	$title       = esc_attr( wp_get_document_title() );
	$url         = esc_url( is_singular() ? get_permalink() : home_url( add_query_arg( [], $_SERVER['REQUEST_URI'] ?? '/' ) ) );
	$image       = esc_url( jugogradnja_seo_image() );
	$site_name   = esc_attr( get_bloginfo( 'name' ) );
	$locale      = ( defined( 'ICL_SITEPRESS_VERSION' ) && function_exists( 'wpml_get_current_language' ) && 'en' === wpml_get_current_language() )
		? 'en_US' : 'sr_RS';

	echo "<meta name=\"description\" content=\"{$description}\">\n";
	echo "<link rel=\"canonical\" href=\"{$url}\">\n";

	echo "<meta property=\"og:type\" content=\"website\">\n";
	echo "<meta property=\"og:title\" content=\"{$title}\">\n";
	echo "<meta property=\"og:description\" content=\"{$description}\">\n";
	echo "<meta property=\"og:url\" content=\"{$url}\">\n";
	echo "<meta property=\"og:image\" content=\"{$image}\">\n";
	echo "<meta property=\"og:site_name\" content=\"{$site_name}\">\n";
	echo "<meta property=\"og:locale\" content=\"{$locale}\">\n";

	echo "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
	echo "<meta name=\"twitter:title\" content=\"{$title}\">\n";
	echo "<meta name=\"twitter:description\" content=\"{$description}\">\n";
	echo "<meta name=\"twitter:image\" content=\"{$image}\">\n";
}, 3 );

// ──────────────────────────────────────────────
// 4c. GOOGLE ANALYTICS (GA4)
// ──────────────────────────────────────────────

add_action( 'wp_head', function () {
	$ga_id = 'G-6BEDE9EE2X';
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?= esc_attr( $ga_id ) ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?= esc_js( $ga_id ) ?>');
	</script>
	<?php
}, 5 );

// ──────────────────────────────────────────────
// 5. CUSTOM POST TYPES
// ──────────────────────────────────────────────

// High-priority rewrite so /nekretnine/{slug}/ resolves to CPT single
// before WordPress tries to match it as a child of the 'nekretnine' page.
add_action( 'init', function () {
	add_rewrite_rule(
		'nekretnine/([^/]+)/?$',
		'index.php?nekretnina=$matches[1]',
		'top'
	);
} );

add_action( 'init', function () {

	// projekat - Reference / Projekti
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

	// nekretnina - Real estate
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

	// pozicija - Job positions
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
}, 5 );

// ──────────────────────────────────────────────
// 5a. POZICIJA META FIELDS
// ──────────────────────────────────────────────

add_action( 'init', function () {
	foreach ( [ '_pozicija_tip', '_pozicija_closed', '_pozicija_lokacija', '_pozicija_opis_uvod', '_pozicija_opis', '_pozicija_uslovi', '_pozicija_nudimo' ] as $key ) {
		register_post_meta( 'pozicija', $key, [
			'type'          => 'string',
			'single'        => true,
			'show_in_rest'  => true,
			'auth_callback' => '__return_true',
		] );
	}
} );

// ──────────────────────────────────────────────
// 5b. NEKRETNINA META FIELDS
// ──────────────────────────────────────────────

add_action( 'init', function () {
	$string_fields = [
		'_nekretnina_cena', '_nekretnina_povrsina', '_nekretnina_sobe',
		'_nekretnina_spavace', '_nekretnina_kupatilo', '_nekretnina_lokacija',
		'_nekretnina_godina', '_nekretnina_sprat', '_nekretnina_grejanje',
		'_nekretnina_parking', '_nekretnina_status', '_nekretnina_istaknuto',
		'_nekretnina_galerija', '_nekretnina_oprema', '_nekretnina_prostorije',
		'_nekretnina_blizina',
	];
	foreach ( $string_fields as $key ) {
		register_post_meta( 'nekretnina', $key, [
			'type'         => 'string',
			'single'       => true,
			'show_in_rest' => true,
			'auth_callback' => '__return_true',
		] );
	}
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
 * Transliterate a full rendered HTML page to Latin script.
 *
 * The site's visible text lives in two places: database content (post
 * titles/content, which WordPress runs through the_title/the_content) and
 * hardcoded Serbian strings baked directly into dozens of pattern/block PHP
 * files, echoed as raw HTML with no filter hook of their own. Rather than
 * hand-editing every pattern, this transliterates the *entire rendered page*
 * in one pass - so any current or future static string is covered for free.
 *
 * Only text nodes and a few attributes that hold visible text (alt,
 * aria-label, placeholder, title, value) are touched; <script>/<style>
 * contents are protected so JS/CSS is never mangled. strtr() is a no-op on
 * text with no Cyrillic characters, so nonces, class names, and English
 * strings pass through unchanged.
 */
function jugogradnja_transliterate_html( string $html ): string {
	$protected = [];
	$protect = function ( string $pattern ) use ( &$html, &$protected ) {
		$html = preg_replace_callback(
			$pattern,
			function ( $m ) use ( &$protected ) {
				$key = "\x01PROTECT" . count( $protected ) . "\x02";
				$protected[ $key ] = $m[0];
				return $key;
			},
			$html
		);
	};

	$protect( '#<(script|style)\b[^>]*>.*?</\1>#is' );
	// Elements explicitly opted out (e.g. the script-toggle button, whose
	// label is a literal "SR"/"СР" abbreviation, not prose to transliterate).
	$protect( '#<([a-z0-9]+)\b[^>]*\bdata-notranslit\b[^>]*>.*?</\1>#is' );

	foreach ( [ 'alt', 'aria-label', 'placeholder', 'title', 'value' ] as $attr ) {
		$html = preg_replace_callback(
			'/\b' . preg_quote( $attr, '/' ) . '="([^"]*)"/u',
			function ( $m ) use ( $attr ) {
				return $attr . '="' . jugogradnja_cyr_to_lat( $m[1] ) . '"';
			},
			$html
		);
	}

	$html = preg_replace_callback(
		'/>([^<]+)</u',
		function ( $m ) {
			return '>' . jugogradnja_cyr_to_lat( $m[1] ) . '<';
		},
		$html
	);

	if ( $protected ) {
		$html = strtr( $html, $protected );
	}

	return $html;
}

// Buffer the whole front-end HTML response and transliterate it when the
// visitor has picked Latin. Skipped for admin/REST/AJAX/cron, and for any
// WPML language other than Serbian (transliteration is script-only, not
// translation - English content should never pass through it).
add_action( 'template_redirect', function () {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
		return;
	}
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		return;
	}
	if ( jugogradnja_current_script() !== 'latin' ) {
		return;
	}
	if ( has_filter( 'wpml_current_language' ) ) {
		$lang = apply_filters( 'wpml_current_language', null );
		if ( $lang && 'sr' !== $lang ) {
			return;
		}
	}
	ob_start( 'jugogradnja_transliterate_html' );
}, 0 );

// Force Latin slugs for nekretnina and projekat CPTs on save.
add_filter( 'wp_insert_post_data', function ( array $data ): array {
	if ( ! in_array( $data['post_type'], [ 'nekretnina', 'projekat' ], true ) ) {
		return $data;
	}
	if ( empty( $data['post_name'] ) ) {
		return $data;
	}
	// Transliterate any Cyrillic characters in the slug, then re-sanitize.
	$latin_slug = jugogradnja_cyr_to_lat( urldecode( $data['post_name'] ) );
	$data['post_name'] = sanitize_title( $latin_slug );
	return $data;
}, 10, 1 );

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

	// Translatable CPTs and taxonomies - register with WPML
	add_filter( 'wpml_translatable_documents', function ( $types ) {
		$types['projekat']  = [ 'language_independent' => false ];
		$types['nekretnina'] = [ 'language_independent' => false ];
		$types['pozicija']  = [ 'language_independent' => false ];
		return $types;
	} );
} );

// ──────────────────────────────────────────────
// 8. BLOCK CATEGORY + PATTERN CATEGORY
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

// Register pattern category and all theme patterns.
add_action( 'init', function () {
	register_block_pattern_category( 'jugogradnja', [ 'label' => 'Jugogradnja' ] );

	$header_keys = [
		'title'       => 'Title',
		'slug'        => 'Slug',
		'description' => 'Description',
		'categories'  => 'Categories',
		'inserter'    => 'Inserter',
	];

	mb_internal_encoding( 'UTF-8' );
	$patterns_dir = get_template_directory() . '/patterns';
	foreach ( glob( $patterns_dir . '/*.php' ) ?: [] as $file ) {
		$headers = get_file_data( $file, $header_keys );
		if ( empty( $headers['slug'] ) || empty( $headers['title'] ) ) {
			continue;
		}

		ob_start();
		include $file;
		$content = ob_get_clean();

		$args = [
			'title'      => $headers['title'],
			'content'    => $content,
			'inserter'   => ( 'false' !== strtolower( $headers['inserter'] ?? 'true' ) ),
		];

		if ( ! empty( $headers['description'] ) ) {
			$args['description'] = $headers['description'];
		}

		if ( ! empty( $headers['categories'] ) ) {
			$args['categories'] = array_map( 'trim', explode( ',', $headers['categories'] ) );
		}

		register_block_pattern( $headers['slug'], $args );
	}
}, 9 );

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
	register_block_type( $blocks_dir . '/reference-grid' );
	register_block_type( $blocks_dir . '/pozicija-single', [
		'render_callback' => function ( $attributes, $content, $block ) {
			ob_start();
			include get_template_directory() . '/blocks/pozicija-single/render.php';
			return ob_get_clean();
		},
	] );
	register_block_type( $blocks_dir . '/pozicija-archive', [
		'render_callback' => function ( $attributes, $content, $block ) {
			ob_start();
			include get_template_directory() . '/blocks/pozicija-archive/render.php';
			return ob_get_clean();
		},
	] );
	register_block_type( $blocks_dir . '/nekretnina-single', [
		'render_callback' => function ( $attributes, $content, $block ) {
			ob_start();
			include get_template_directory() . '/blocks/nekretnina-single/render.php';
			return ob_get_clean();
		},
	] );
} );

// ──────────────────────────────────────────────
// 11. REFERENCE EXPAND SCRIPT
// ──────────────────────────────────────────────

add_action( 'wp_enqueue_scripts', function () {
	if ( ! is_admin() ) {
		$dir = get_template_directory();
		$uri = get_template_directory_uri();

		$reference_expand_path = $dir . '/assets/js/reference-expand.js';
		wp_enqueue_script(
			'jg-reference-expand',
			$uri . '/assets/js/reference-expand.js',
			[],
			file_exists( $reference_expand_path ) ? filemtime( $reference_expand_path ) : '1.0.0',
			[ 'strategy' => 'defer', 'in_footer' => true ]
		);

		$timeline_path = $dir . '/assets/js/timeline.js';
		wp_enqueue_script(
			'jg-timeline',
			$uri . '/assets/js/timeline.js',
			[],
			file_exists( $timeline_path ) ? filemtime( $timeline_path ) : '1.0.0',
			[ 'strategy' => 'defer', 'in_footer' => true ]
		);

		$sofeija_gallery_path = $dir . '/assets/js/sofeija-gallery.js';
		wp_enqueue_script(
			'jg-sofeija-gallery',
			$uri . '/assets/js/sofeija-gallery.js',
			[],
			file_exists( $sofeija_gallery_path ) ? filemtime( $sofeija_gallery_path ) : '1.5.0',
			[ 'in_footer' => true ]
		);
	}
} );

// ──────────────────────────────────────────────
// 12. SVG UPLOAD SUPPORT
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

// ──────────────────────────────────────────────
// 13. FORM HANDLERS
// ──────────────────────────────────────────────
//
// Temporary: all forms deliver to a single inbox for testing/preparation.
// Swap this for the real per-form recipient(s) before launch.
define( 'JG_FORMS_RECIPIENT', 'dusan@modulate.biz' );

// Simple honeypot: forms include a hidden field named jg_hp that a human
// never sees or fills in. If it arrives non-empty, silently drop the submit.
function jg_forms_is_bot(): bool {
	return ! empty( $_POST['jg_hp'] );
}

function jg_forms_redirect( string $key, string $status ): void {
	$referer = wp_get_referer() ?: home_url( '/' );
	$referer = remove_query_arg( [ 'jg_sent', 'jg_error' ], $referer );
	$param   = 'ok' === $status ? 'jg_sent' : 'jg_error';
	wp_safe_redirect( add_query_arg( $param, $key, $referer ) . '#' . $key . '-form' );
	exit;
}

// ── Contact page form ──────────────────────────
function jg_handle_contact_form(): void {
	if ( jg_forms_is_bot() ) {
		jg_forms_redirect( 'contact', 'ok' ); // Pretend success, drop silently.
	}
	if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'jg_contact_form' ) ) {
		jg_forms_redirect( 'contact', 'error' );
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['jg_name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['jg_email'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['jg_message'] ?? '' ) );

	if ( ! $name || ! is_email( $email ) || ! $message ) {
		jg_forms_redirect( 'contact', 'error' );
	}

	$subject = 'Нова порука са контакт форме - Jugogradnja';
	$body    = "Име и презиме: {$name}\nEmail: {$email}\n\nПорука:\n{$message}";
	$headers = [ 'Reply-To: ' . $email ];

	$sent = wp_mail( JG_FORMS_RECIPIENT, $subject, $body, $headers );
	jg_forms_redirect( 'contact', $sent ? 'ok' : 'error' );
}
add_action( 'admin_post_jg_contact', 'jg_handle_contact_form' );
add_action( 'admin_post_nopriv_jg_contact', 'jg_handle_contact_form' );

// ── Sofeija contact form ───────────────────────
function jg_handle_sofeija_form(): void {
	if ( jg_forms_is_bot() ) {
		jg_forms_redirect( 'sofeija', 'ok' );
	}
	if ( ! isset( $_POST['jg_sofeija_nonce'] ) || ! wp_verify_nonce( $_POST['jg_sofeija_nonce'], 'jg_sofeija_contact' ) ) {
		jg_forms_redirect( 'sofeija', 'error' );
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['sf_name'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['sf_phone'] ?? '' ) );
	$city    = sanitize_text_field( wp_unslash( $_POST['sf_city'] ?? '' ) );
	$company = sanitize_text_field( wp_unslash( $_POST['sf_company'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['sf_email'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['sf_message'] ?? '' ) );

	if ( ! $name || ! $phone || ! $city || ! is_email( $email ) ) {
		jg_forms_redirect( 'sofeija', 'error' );
	}

	$subject = 'Нови упит - Sofeija';
	$body    = "Име и презиме: {$name}\nТелефон: {$phone}\nГрад: {$city}\nФирма: {$company}\nEmail: {$email}\n\nПорука:\n{$message}";
	$headers = [ 'Reply-To: ' . $email ];

	$sent = wp_mail( JG_FORMS_RECIPIENT, $subject, $body, $headers );
	jg_forms_redirect( 'sofeija', $sent ? 'ok' : 'error' );
}
add_action( 'admin_post_jg_sofeija', 'jg_handle_sofeija_form' );
add_action( 'admin_post_nopriv_jg_sofeija', 'jg_handle_sofeija_form' );

// ── Careers application form (shared by careers page + single position page) ──
function jg_handle_apply_form(): void {
	if ( jg_forms_is_bot() ) {
		jg_forms_redirect( 'apply', 'ok' );
	}
	if ( ! isset( $_POST['jg_apply_nonce'] ) || ! wp_verify_nonce( $_POST['jg_apply_nonce'], 'jg_apply_form' ) ) {
		jg_forms_redirect( 'apply', 'error' );
	}

	$name       = sanitize_text_field( wp_unslash( $_POST['apply_name'] ?? '' ) );
	$email      = sanitize_email( wp_unslash( $_POST['apply_email'] ?? '' ) );
	$phone      = sanitize_text_field( wp_unslash( $_POST['apply_phone'] ?? '' ) );
	$position   = sanitize_text_field( wp_unslash( $_POST['apply_position'] ?? '' ) );
	$motivation = sanitize_textarea_field( wp_unslash( $_POST['apply_motivation'] ?? '' ) );

	if ( ! $name || ! is_email( $email ) || ! $position ) {
		jg_forms_redirect( 'apply', 'error' );
	}

	// apply_cv[] arrives as one array per property (PHP's native multi-file
	// $_FILES shape) - reshape into one array of per-file arrays, max 3.
	$attachments   = [];
	$cv_temp_paths = [];
	$cv_files      = [];
	if ( ! empty( $_FILES['apply_cv']['name'] ) && is_array( $_FILES['apply_cv']['name'] ) ) {
		$count = min( count( $_FILES['apply_cv']['name'] ), 3 );
		for ( $i = 0; $i < $count; $i++ ) {
			if ( '' === $_FILES['apply_cv']['name'][ $i ] ) {
				continue;
			}
			$cv_files[] = [
				'name'     => $_FILES['apply_cv']['name'][ $i ],
				'type'     => $_FILES['apply_cv']['type'][ $i ],
				'tmp_name' => $_FILES['apply_cv']['tmp_name'][ $i ],
				'error'    => $_FILES['apply_cv']['error'][ $i ],
				'size'     => $_FILES['apply_cv']['size'][ $i ],
			];
		}
	}

	if ( $cv_files ) {
		require_once ABSPATH . 'wp-admin/includes/file.php';
		foreach ( $cv_files as $file ) {
			if ( 'application/pdf' !== $file['type'] || $file['size'] > 5 * MB_IN_BYTES ) {
				jg_forms_redirect( 'apply', 'error' );
			}
			$upload = wp_handle_upload( $file, [ 'test_form' => false, 'mimes' => [ 'pdf' => 'application/pdf' ] ] );
			if ( isset( $upload['file'] ) ) {
				$cv_temp_paths[] = $upload['file'];
				$attachments[]   = $upload['file'];
			}
		}
	}

	$subject = 'Нова пријава за посао - ' . $position;
	$body    = "Име и презиме: {$name}\nEmail: {$email}\nТелефон: {$phone}\nПозиција: {$position}\n\nМотивационо писмо:\n{$motivation}";
	$headers = [ 'Reply-To: ' . $email ];

	$sent = wp_mail( JG_FORMS_RECIPIENT, $subject, $body, $headers, $attachments );

	// The uploaded CVs only need to survive long enough to attach to the
	// email above - delete them from the media directory either way.
	foreach ( $cv_temp_paths as $cv_temp_path ) {
		if ( file_exists( $cv_temp_path ) ) {
			wp_delete_file( $cv_temp_path );
		}
	}

	jg_forms_redirect( 'apply', $sent ? 'ok' : 'error' );
}
add_action( 'admin_post_jg_apply', 'jg_handle_apply_form' );
add_action( 'admin_post_nopriv_jg_apply', 'jg_handle_apply_form' );

// ── VELUX упит forms (прозори + ролетне) ───────
function jg_handle_velux_form(): void {
	if ( jg_forms_is_bot() ) {
		jg_forms_redirect( 'velux', 'ok' );
	}
	if ( ! isset( $_POST['jg_velux_nonce'] ) || ! wp_verify_nonce( $_POST['jg_velux_nonce'], 'jg_velux_upit' ) ) {
		jg_forms_redirect( 'velux', 'error' );
	}

	$tip   = 'roletne' === ( $_POST['upit_tip'] ?? '' ) ? 'roletne' : 'prozori';
	$name  = sanitize_text_field( wp_unslash( $_POST['ime'] ?? '' ) );
	$phone = sanitize_text_field( wp_unslash( $_POST['telefon'] ?? '' ) );
	$email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$note  = sanitize_textarea_field( wp_unslash( $_POST['napomena'] ?? '' ) );

	if ( ! $name || ! $phone || ! is_email( $email ) ) {
		jg_forms_redirect( 'velux', 'error' );
	}

	if ( 'prozori' === $tip ) {
		$subject = 'Нови упит - VELUX кровни прозори';
		$body    = sprintf(
			"Име и презиме: %s\nТелефон: %s\nEmail: %s\nТип прозора: %s\nМатеријал: %s\nРазмак између греда: %s\nБрој прозора: %s\n\nНапомена:\n%s",
			$name, $phone, $email,
			sanitize_text_field( wp_unslash( $_POST['tip_prozora'] ?? '' ) ),
			sanitize_text_field( wp_unslash( $_POST['materijal'] ?? '' ) ),
			sanitize_text_field( wp_unslash( $_POST['razmak'] ?? '' ) ),
			sanitize_text_field( wp_unslash( $_POST['broj'] ?? '' ) ),
			$note
		);
	} else {
		$subject = 'Нови упит - VELUX ролетне';
		$body    = sprintf(
			"Име и презиме: %s\nТелефон: %s\nEmail: %s\nТип ролетне: %s\nВеличина прозора: %s\nБоја: %s\n\nНапомена:\n%s",
			$name, $phone, $email,
			sanitize_text_field( wp_unslash( $_POST['tip_roletne'] ?? '' ) ),
			sanitize_text_field( wp_unslash( $_POST['velicina'] ?? '' ) ),
			sanitize_text_field( wp_unslash( $_POST['boja'] ?? '' ) ),
			$note
		);
	}
	$headers = [ 'Reply-To: ' . $email ];

	$sent = wp_mail( JG_FORMS_RECIPIENT, $subject, $body, $headers );
	jg_forms_redirect( 'velux', $sent ? 'ok' : 'error' );
}
add_action( 'admin_post_jg_velux', 'jg_handle_velux_form' );
add_action( 'admin_post_nopriv_jg_velux', 'jg_handle_velux_form' );
