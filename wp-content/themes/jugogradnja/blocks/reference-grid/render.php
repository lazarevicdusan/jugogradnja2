<?php
/**
 * Reference Grid block - sidebar filter + 2-col card grid with inline expand panel.
 * URL params: ?kategorija=<slug>  ?stranica=<n>
 */

// wpml_get_current_language() previously returned the wrong language here
// because the site-header block (rendered earlier in the page) called
// do_action( 'wpml_switch_language', null ) as a "reset", which actually
// reset WPML's active language to the site default (Serbian) instead of
// restoring the real current language - corrupting every language check
// that ran afterward, including this one. That reset bug is now fixed at
// its source (site-header.php / functions.php), so the normal WPML API
// is reliable again here.
$jg_current_lang = ( defined( 'ICL_SITEPRESS_VERSION' ) && function_exists( 'wpml_get_current_language' ) )
    ? wpml_get_current_language()
    : 'sr';

$per_page    = 6;
$active_slug = isset( $_GET['kategorija'] ) ? sanitize_title( $_GET['kategorija'] ) : '';
$page_num    = max( 1, isset( $_GET['stranica'] ) ? absint( $_GET['stranica'] ) : 1 );

// Deep link from other pages (?projekat=<post_name>): jump straight to the
// project's own category and the page of results it falls on, then let JS
// auto-open its detail panel. The project has no standalone page of its
// own - this archive + inline panel is the only place it's ever shown.
$deeplink_slug = isset( $_GET['proj'] ) ? sanitize_title( $_GET['proj'] ) : '';
if ( $deeplink_slug ) {
    $deeplink_post = get_page_by_path( $deeplink_slug, OBJECT, 'projekat' );
    if ( $deeplink_post && 'publish' === $deeplink_post->post_status ) {
        $dl_terms = get_the_terms( $deeplink_post->ID, 'kategorija_projekta' );
        $active_slug = ( $dl_terms && ! is_wp_error( $dl_terms ) ) ? $dl_terms[0]->slug : '';

        $dl_ids = get_posts( [
            'post_type'      => 'projekat',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => $active_slug ? [ [
                'taxonomy' => 'kategorija_projekta',
                'field'    => 'slug',
                'terms'    => $active_slug,
            ] ] : [],
            'meta_query'     => [
                'relation'      => 'OR',
                'godina_clause' => [ 'key' => 'godina', 'compare' => 'EXISTS' ],
                [ 'key' => 'godina', 'compare' => 'NOT EXISTS' ],
            ],
            'orderby'        => [ 'godina_clause' => 'DESC', 'date' => 'DESC' ],
            'suppress_filters' => false,
        ] );
        $dl_position = array_search( $deeplink_post->ID, $dl_ids, true );
        if ( false !== $dl_position ) {
            $page_num = (int) floor( $dl_position / $per_page ) + 1;
        }
    } else {
        $deeplink_slug = '';
    }
}

// suppress_filters is required here: WPML hooks get_terms() to only
// return the current language's terms, which on the English page means
// ONLY the empty English shadow terms (19-23) come back and nothing is
// left after filtering down to the source-language terms below. Fetch
// the raw, unfiltered set instead so the real (Serbian) terms are always
// available regardless of which language is currently active.
$terms = get_terms( [
    'taxonomy'         => 'kategorija_projekta',
    'hide_empty'       => false,
    'orderby'          => 'name',
    'suppress_filters' => true,
] );

// The English "translations" of this taxonomy's terms are WPML shadow
// terms used only for labels - actual projects are only ever assigned to
// the original Serbian term_taxonomy_id (wp_term_relationships never
// points at the English copies), so the English terms' own ->count is
// always 0 and filtering by them returns nothing. Always work from the
// original (source-language) terms, which hold the real counts and post
// relationships, and just swap in the current language's translated name
// for display.
$jg_cat_name_map = [];
if ( defined( 'ICL_SITEPRESS_VERSION' ) && ! is_wp_error( $terms ) ) {
    global $wpdb;
    $tt_ids = wp_list_pluck( $terms, 'term_taxonomy_id' );
    if ( $tt_ids ) {
        $placeholders = implode( ',', array_fill( 0, count( $tt_ids ), '%d' ) );
        $source_tt_ids = $wpdb->get_col( $wpdb->prepare(
            "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE element_type = 'tax_kategorija_projekta' AND source_language_code IS NULL AND element_id IN ({$placeholders})",
            $tt_ids
        ) );
        $source_tt_ids = array_map( 'intval', $source_tt_ids );
        $terms = array_values( array_filter( $terms, static fn( $t ) => in_array( (int) $t->term_taxonomy_id, $source_tt_ids, true ) ) );

        if ( 'en' === $jg_current_lang && $source_tt_ids ) {
            $placeholders2 = implode( ',', array_fill( 0, count( $source_tt_ids ), '%d' ) );
            $rows = $wpdb->get_results( $wpdb->prepare(
                "SELECT src.element_id AS source_tt_id, tr_term.name AS translated_name
                 FROM {$wpdb->prefix}icl_translations src
                 JOIN {$wpdb->prefix}icl_translations tgt ON tgt.trid = src.trid AND tgt.language_code = 'en'
                 JOIN {$wpdb->prefix}term_taxonomy tr_tt ON tr_tt.term_taxonomy_id = tgt.element_id
                 JOIN {$wpdb->prefix}terms tr_term ON tr_term.term_id = tr_tt.term_id
                 WHERE src.element_type = 'tax_kategorija_projekta' AND src.element_id IN ({$placeholders2})",
                $source_tt_ids
            ) );
            foreach ( $rows as $row ) {
                $jg_cat_name_map[ (int) $row->source_tt_id ] = $row->translated_name;
            }
        }
    }
}

$tax_query = [];
if ( $active_slug ) {
    $tax_query[] = [
        'taxonomy' => 'kategorija_projekta',
        'field'    => 'slug',
        'terms'    => $active_slug,
    ];
}

$query = new WP_Query( [
    'post_type'      => 'projekat',
    'post_status'    => 'publish',
    'posts_per_page' => $per_page,
    'paged'          => $page_num,
    'tax_query'      => $tax_query,
    // Sort by 'godina' without excluding posts that don't have it set -
    // a plain top-level 'meta_key' turns into an INNER JOIN filter and
    // silently drops posts lacking that meta, so union both cases here.
    'meta_query'     => [
        'relation'     => 'OR',
        'godina_clause' => [
            'key'     => 'godina',
            'compare' => 'EXISTS',
        ],
        [
            'key'     => 'godina',
            'compare' => 'NOT EXISTS',
        ],
    ],
    'orderby'        => [ 'godina_clause' => 'DESC', 'date' => 'DESC' ],
] );

$total_posts = $query->found_posts;
$total_pages = $query->max_num_pages;

// wp_count_posts() is a raw count that ignores WPML's per-language query
// filtering entirely, so it was summing Serbian + English projects
// together. Get a current-language-aware total via a lightweight query.
$all_lang_count_query = new WP_Query( [
    'post_type'      => 'projekat',
    'post_status'    => 'publish',
    'posts_per_page' => 1,
    'fields'         => 'ids',
    'no_found_rows'  => false,
] );
$all_categories_count = $all_lang_count_query->found_posts;

function jg_ref_filter_url( string $slug ): string {
    $base   = strtok( $_SERVER['REQUEST_URI'], '?' );
    $params = [];
    if ( $slug ) $params['kategorija'] = $slug;
    return esc_url( $base . ( $params ? '?' . http_build_query( $params ) : '' ) );
}

function jg_ref_cat_label( int $post_id ): string {
    global $jg_cat_name_map;
    $t = get_the_terms( $post_id, 'kategorija_projekta' );
    if ( ! $t || is_wp_error( $t ) ) {
        return '';
    }
    $name = $jg_cat_name_map[ (int) $t[0]->term_taxonomy_id ] ?? $t[0]->name;
    return esc_html( $name );
}
?>
<section class="jg-ref-grid-section">
  <div class="jg-ref-grid-section__inner">

    <!-- Sidebar -->
    <aside class="jg-ref-sidebar" aria-label="<?= esc_attr__( 'Филтер по категорији', 'jugogradnja' ) ?>">
      <h2 class="jg-ref-sidebar__heading"><?= esc_html__( 'Категорије', 'jugogradnja' ) ?></h2>
      <div class="jg-ref-sidebar__card">
      <ul class="jg-ref-sidebar__list" role="list">
        <li>
          <a class="jg-ref-sidebar__link<?= ! $active_slug ? ' is-active' : '' ?>"
             href="<?= jg_ref_filter_url( '' ) ?>">
            <?= esc_html__( 'Све категорије', 'jugogradnja' ) ?>
            <span class="jg-ref-sidebar__count"><?= esc_html( (string) $all_categories_count ) ?></span>
          </a>
        </li>
        <?php foreach ( $terms as $term ) : ?>
        <li>
          <a class="jg-ref-sidebar__link<?= $active_slug === $term->slug ? ' is-active' : '' ?>"
             href="<?= jg_ref_filter_url( $term->slug ) ?>">
            <?= esc_html( $jg_cat_name_map[ (int) $term->term_taxonomy_id ] ?? $term->name ) ?>
            <span class="jg-ref-sidebar__count"><?= esc_html( (string) $term->count ) ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      </div>
    </aside>

    <!-- Main grid -->
    <div class="jg-ref-main">
      <div id="jg-ref-results" data-deeplink="<?= esc_attr( $deeplink_slug ) ?>">
      <h2 class="jg-ref-main__heading">
        <?= esc_html__( 'Сви пројекти', 'jugogradnja' ) ?>
        <span class="jg-ref-main__count">(<?= esc_html( (string) $total_posts ) ?>)</span>
      </h2>

      <?php if ( $query->have_posts() ) : ?>
      <div class="jg-ref-card-grid" id="jg-ref-card-grid">

        <?php $card_index = 0; $first = null; while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php
          $post_id  = get_the_ID();
          $lokacija = get_post_meta( $post_id, 'lokacija', true );
          $godina   = get_post_meta( $post_id, 'godina',   true );
          $povrsina = get_post_meta( $post_id, 'povrsina', true );
          $excerpt  = get_the_excerpt();
          $content  = get_the_content();
          $thumb    = get_the_post_thumbnail_url( $post_id, 'large' ) ?: '';
          $cat      = jg_ref_cat_label( $post_id );
          // Build gallery from galeria_ids, excluding the hero/featured image
          // so the slideshow doesn't repeat the same photo shown above it.
          $gallery_imgs = [];
          $galeria_ids = get_post_meta( $post_id, 'galeria_ids', true );
          if ( $galeria_ids ) {
            foreach ( explode( ',', $galeria_ids ) as $gid ) {
              $gid = (int) trim( $gid );
              $gurl = wp_get_attachment_image_url( $gid, 'large' );
              if ( $gurl && $gurl !== $thumb && ! in_array( $gurl, $gallery_imgs, true ) ) $gallery_imgs[] = $gurl;
            }
          }
          if ( $card_index === 0 ) {
            $first = compact( 'post_id', 'lokacija', 'godina', 'povrsina', 'excerpt', 'content', 'thumb', 'cat', 'gallery_imgs' );
            $first['title'] = get_the_title();
          }
        ?>
        <article class="jg-ref-card"
                 data-index="<?= $card_index ?>"
                 data-id="<?= $post_id ?>"
                 data-slug="<?= esc_attr( get_post_field( 'post_name', $post_id ) ) ?>"
                 data-title="<?= esc_attr( get_the_title() ) ?>"
                 data-cat="<?= esc_attr( $cat ) ?>"
                 data-lokacija="<?= esc_attr( $lokacija ) ?>"
                 data-godina="<?= esc_attr( $godina ) ?>"
                 data-povrsina="<?= esc_attr( $povrsina ) ?>"
                 data-excerpt="<?= esc_attr( $excerpt ) ?>"
                 data-content="<?= esc_attr( wp_strip_all_tags( $content ) ) ?>"
                 data-thumb="<?= esc_attr( $thumb ) ?>"
                 data-gallery="<?= esc_attr( wp_json_encode( $gallery_imgs ) ) ?>">
          <button class="jg-ref-card__inner" aria-expanded="false" aria-label="<?= esc_attr( get_the_title() ) ?>">
            <div class="jg-ref-card__img-wrap">
              <?php if ( $thumb ) : ?>
              <img class="jg-ref-card__img" src="<?= esc_url( $thumb ) ?>"
                   alt="<?= esc_attr( get_the_title() ) ?>" width="440" height="330" loading="lazy">
              <?php else : ?>
              <div class="jg-ref-card__img-placeholder" aria-hidden="true"></div>
              <?php endif; ?>
              <?php if ( $cat ) : ?>
              <span class="jg-ref-card__badge"><?= $cat ?></span>
              <?php endif; ?>
            </div>
            <div class="jg-ref-card__body">
              <h3 class="jg-ref-card__title"><?= esc_html( get_the_title() ) ?></h3>
              <?php if ( $lokacija ) : ?>
              <p class="jg-ref-card__meta-row">
                <svg class="jg-ref-card__icon" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M13.3333 6.66667C13.3333 9.99533 9.64067 13.462 8.40067 14.5327C8.28515 14.6195 8.14453 14.6665 8 14.6665C7.85547 14.6665 7.71485 14.6195 7.59933 14.5327C6.35933 13.462 2.66667 9.99533 2.66667 6.66667C2.66667 5.25218 3.22857 3.89562 4.22876 2.89543C5.22896 1.89524 6.58551 1.33333 8 1.33333C9.41449 1.33333 10.771 1.89524 11.7712 2.89543C12.7714 3.89562 13.3333 5.25218 13.3333 6.66667Z" stroke="#C5A059" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 8.66667C9.10457 8.66667 10 7.77124 10 6.66667C10 5.5621 9.10457 4.66667 8 4.66667C6.89543 4.66667 6 5.5621 6 6.66667C6 7.77124 6.89543 8.66667 8 8.66667Z" stroke="#C5A059" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span><?= esc_html( $lokacija ) ?></span>
              </p>
              <?php endif; ?>
              <?php if ( $godina ) : ?>
              <p class="jg-ref-card__meta-row">
                <svg class="jg-ref-card__icon" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M5.33333 1.33333V4" stroke="#C5A059" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.6667 1.33333V4" stroke="#C5A059" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.6667 2.66667H3.33333C2.59695 2.66667 2 3.26362 2 4V13.3333C2 14.0697 2.59695 14.6667 3.33333 14.6667H12.6667C13.403 14.6667 14 14.0697 14 13.3333V4C14 3.26362 13.403 2.66667 12.6667 2.66667Z" stroke="#C5A059" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 6.66667H14" stroke="#C5A059" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span><?= esc_html( $godina ) ?></span>
              </p>
              <?php endif; ?>
              <span class="jg-ref-card__cta">
                <?= esc_html__( 'Погледај више', 'jugogradnja' ) ?>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M7.5 15L12.5 10L7.5 5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </div>
          </button>
        </article>
        <?php $card_index++; endwhile; wp_reset_postdata(); ?>

        <!-- Inline expand panel (moved by JS after clicked row; pre-open for design review) -->
        <div class="jg-ref-detail" id="jg-ref-detail" aria-live="polite" hidden>
          <div class="jg-ref-detail__inner">

            <div class="jg-ref-detail__header">
              <div class="jg-ref-detail__header-text">
                <span class="jg-ref-detail__cat"><?= $first ? esc_html( $first['cat'] ) : '' ?></span>
                <h3 class="jg-ref-detail__title"><?= $first ? esc_html( $first['title'] ) : '' ?></h3>
              </div>
              <button class="jg-ref-detail__close-x" aria-label="<?= esc_attr__( 'Затвори', 'jugogradnja' ) ?>">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M15 5L5 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 5L15 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </div>

            <div class="jg-ref-detail__media">
              <div class="jg-ref-detail__img-wrap">
                <img class="jg-ref-detail__img" src="<?= $first ? esc_url( $first['thumb'] ) : '' ?>" alt="<?= $first ? esc_attr( $first['title'] ) : '' ?>" width="530" height="299" loading="lazy"<?= ( ! $first || ! $first['thumb'] ) ? ' hidden' : '' ?>>
                <div class="jg-ref-detail__img-placeholder" aria-hidden="true"<?= ( $first && $first['thumb'] ) ? ' hidden' : '' ?>></div>
              </div>
              <div class="jg-ref-detail__meta">
                <div class="jg-ref-detail__meta-item jg-ref-detail__meta-lokacija"<?= ( ! $first || ! $first['lokacija'] ) ? ' hidden' : '' ?>>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M16.6667 8.33333C16.6667 12.4942 12.0508 16.8275 10.5008 18.1658C10.3564 18.2744 10.1807 18.3331 10 18.3331C9.81933 18.3331 9.64356 18.2744 9.49917 18.1658C7.94917 16.8275 3.33333 12.4942 3.33333 8.33333C3.33333 6.56522 4.03571 4.86953 5.28595 3.61929C6.5362 2.36905 8.23189 1.66667 10 1.66667C11.7681 1.66667 13.4638 2.36905 14.714 3.61929C15.9643 4.86953 16.6667 6.56522 16.6667 8.33333Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 10.8333C11.3807 10.8333 12.5 9.71405 12.5 8.33333C12.5 6.95262 11.3807 5.83333 10 5.83333C8.61929 5.83333 7.5 6.95262 7.5 8.33333C7.5 9.71405 8.61929 10.8333 10 10.8333Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <div class="jg-ref-detail__meta-text">
                    <span class="jg-ref-detail__meta-label"><?= esc_html__( 'Локација', 'jugogradnja' ) ?></span>
                    <span class="jg-ref-detail__meta-value jg-val-lokacija"><?= $first ? esc_html( $first['lokacija'] ) : '' ?></span>
                  </div>
                </div>
                <div class="jg-ref-detail__meta-item jg-ref-detail__meta-godina"<?= ( ! $first || ! $first['godina'] ) ? ' hidden' : '' ?>>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M6.66667 1.66667V5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3333 1.66667V5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.8333 3.33333H4.16667C3.24619 3.33333 2.5 4.07953 2.5 5V16.6667C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6667V5C17.5 4.07953 16.7538 3.33333 15.8333 3.33333Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.5 8.33333H17.5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <div class="jg-ref-detail__meta-text">
                    <span class="jg-ref-detail__meta-label"><?= esc_html__( 'Година', 'jugogradnja' ) ?></span>
                    <span class="jg-ref-detail__meta-value jg-val-godina"><?= $first ? esc_html( $first['godina'] ) : '' ?></span>
                  </div>
                </div>
                <div class="jg-ref-detail__meta-item jg-ref-detail__meta-povrsina"<?= ( ! $first || ! $first['povrsina'] ) ? ' hidden' : '' ?>>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 18.3333V3.33333C5 2.89131 5.17559 2.46738 5.48816 2.15482C5.80072 1.84226 6.22464 1.66667 6.66667 1.66667H13.3333C13.7754 1.66667 14.1993 1.84226 14.5118 2.15482C14.8244 2.46738 15 2.89131 15 3.33333V18.3333H5Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 10H3.33333C2.89131 10 2.46738 10.1756 2.15482 10.4882C1.84226 10.8007 1.66667 11.2246 1.66667 11.6667V16.6667C1.66667 17.1087 1.84226 17.5326 2.15482 17.8452C2.46738 18.1577 2.89131 18.3333 3.33333 18.3333H5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 7.5H16.6667C17.1087 7.5 17.5326 7.6756 17.8452 7.98816C18.1577 8.30072 18.3333 8.72464 18.3333 9.16667V16.6667C18.3333 17.1087 18.1577 17.5326 17.8452 17.8452C17.5326 18.1577 17.1087 18.3333 16.6667 18.3333H15" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 5H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 8.33333H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 11.6667H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 15H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <div class="jg-ref-detail__meta-text">
                    <span class="jg-ref-detail__meta-label"><?= esc_html__( 'Површина', 'jugogradnja' ) ?></span>
                    <span class="jg-ref-detail__meta-value jg-val-povrsina"><?= $first ? esc_html( $first['povrsina'] ) : '' ?></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="jg-ref-detail__about"<?= ( ! $first || ( ! $first['excerpt'] && ! wp_strip_all_tags( $first['content'] ) ) ) ? ' hidden' : '' ?>>
              <h4 class="jg-ref-detail__section-title"><?= esc_html__( 'О пројекту', 'jugogradnja' ) ?></h4>
              <p class="jg-ref-detail__about-text jg-val-content"><?= $first ? esc_html( $first['excerpt'] ?: wp_strip_all_tags( $first['content'] ) ) : '' ?></p>
            </div>

            <div class="jg-ref-detail__gallery"<?= ( ! $first || empty( $first['gallery_imgs'] ) ) ? ' hidden' : '' ?>>
              <h4 class="jg-ref-detail__section-title"><?= esc_html__( 'Галерија слика', 'jugogradnja' ) ?></h4>
              <div class="jg-ref-detail__slideshow">
                <div class="jg-ref-detail__slides">
                  <?php if ( $first ) : foreach ( $first['gallery_imgs'] as $i => $gi ) : ?>
                  <div class="jg-ref-detail__slide<?= $i === 0 ? ' is-active' : '' ?>">
                    <img class="jg-ref-detail__gallery-img" src="<?= esc_url( $gi ) ?>" alt="<?= esc_attr( $first['title'] ) ?>" loading="lazy">
                  </div>
                  <?php endforeach; endif; ?>
                </div>
                <button class="jg-ref-detail__slide-prev" aria-label="<?= esc_attr__( 'Претходна слика', 'jugogradnja' ) ?>">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <button class="jg-ref-detail__slide-next" aria-label="<?= esc_attr__( 'Следећа слика', 'jugogradnja' ) ?>">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
                <div class="jg-ref-detail__slide-dots">
                  <?php if ( $first ) : foreach ( $first['gallery_imgs'] as $i => $gi ) : ?>
                  <button class="jg-ref-detail__slide-dot<?= $i === 0 ? ' is-active' : '' ?>" aria-label="<?= esc_attr( sprintf( /* translators: %d is the slide number */ __( 'Слика %d', 'jugogradnja' ), $i + 1 ) ) ?>"></button>
                  <?php endforeach; endif; ?>
                </div>
              </div>
            </div>

            <div class="jg-ref-detail__footer">
              <button class="jg-ref-detail__close-btn">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M15 5L5 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 5L15 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <?= esc_html__( 'Затвори', 'jugogradnja' ) ?>
              </button>
            </div>

          </div><!-- /.jg-ref-detail__inner -->
        </div><!-- /.jg-ref-detail -->

      </div><!-- /.jg-ref-card-grid -->

      <?php if ( $total_pages > 1 ) : ?>
      <nav class="jg-ref-pagination" aria-label="<?= esc_attr__( 'Навигација по страницама', 'jugogradnja' ) ?>">
        <?php for ( $p = 1; $p <= $total_pages; $p++ ) :
          $params = $active_slug ? [ 'kategorija' => $active_slug, 'stranica' => $p ] : [ 'stranica' => $p ];
          $base   = strtok( $_SERVER['REQUEST_URI'], '?' );
          $url    = $base . '?' . http_build_query( $params );
        ?>
        <a class="jg-ref-pagination__btn<?= $p === $page_num ? ' is-active' : '' ?>"
           href="<?= esc_url( $url ) ?>" <?= $p === $page_num ? 'aria-current="page"' : '' ?>>
          <?= $p ?>
        </a>
        <?php endfor; ?>
      </nav>
      <?php endif; ?>

      <?php else : ?>
      <p class="jg-ref-main__empty"><?= esc_html__( 'Нема пројеката у овој категорији.', 'jugogradnja' ) ?></p>
      <?php endif; ?>
      </div><!-- /#jg-ref-results -->
    </div><!-- /.jg-ref-main -->

  </div>
</section>
