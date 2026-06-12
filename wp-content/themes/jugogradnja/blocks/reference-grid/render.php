<?php
/**
 * Reference Grid block — sidebar filter + 2-col card grid with inline expand panel.
 * URL params: ?kategorija=<slug>  ?stranica=<n>
 */

$per_page    = 6;
$active_slug = isset( $_GET['kategorija'] ) ? sanitize_title( $_GET['kategorija'] ) : '';
$page_num    = max( 1, isset( $_GET['stranica'] ) ? absint( $_GET['stranica'] ) : 1 );

$terms = get_terms( [
    'taxonomy'   => 'kategorija_projekta',
    'hide_empty' => false,
    'orderby'    => 'name',
] );

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
    'orderby'        => 'date',
    'order'          => 'DESC',
] );

$total_posts = $query->found_posts;
$total_pages = $query->max_num_pages;

function jg_ref_filter_url( string $slug ): string {
    $base   = strtok( $_SERVER['REQUEST_URI'], '?' );
    $params = [];
    if ( $slug ) $params['kategorija'] = $slug;
    return esc_url( $base . ( $params ? '?' . http_build_query( $params ) : '' ) );
}

function jg_ref_cat_label( int $post_id ): string {
    $t = get_the_terms( $post_id, 'kategorija_projekta' );
    return ( $t && ! is_wp_error( $t ) ) ? esc_html( $t[0]->name ) : '';
}
?>
<section class="jg-ref-grid-section">
  <div class="jg-ref-grid-section__inner">

    <!-- Sidebar -->
    <aside class="jg-ref-sidebar" aria-label="Филтер по категорији">
      <h2 class="jg-ref-sidebar__heading">Категорије</h2>
      <div class="jg-ref-sidebar__card">
      <ul class="jg-ref-sidebar__list" role="list">
        <li>
          <a class="jg-ref-sidebar__link<?= ! $active_slug ? ' is-active' : '' ?>"
             href="<?= jg_ref_filter_url( '' ) ?>">
            Све категорије
            <span class="jg-ref-sidebar__count"><?= esc_html( (string) wp_count_posts( 'projekat' )->publish ) ?></span>
          </a>
        </li>
        <?php foreach ( $terms as $term ) : ?>
        <li>
          <a class="jg-ref-sidebar__link<?= $active_slug === $term->slug ? ' is-active' : '' ?>"
             href="<?= jg_ref_filter_url( $term->slug ) ?>">
            <?= esc_html( $term->name ) ?>
            <span class="jg-ref-sidebar__count"><?= esc_html( (string) $term->count ) ?></span>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      </div>
    </aside>

    <!-- Main grid -->
    <div class="jg-ref-main">
      <h2 class="jg-ref-main__heading">
        Сви пројекти
        <span class="jg-ref-main__count">(<?= esc_html( (string) $total_posts ) ?>)</span>
      </h2>

      <?php if ( $query->have_posts() ) : ?>
      <div class="jg-ref-card-grid" id="jg-ref-card-grid">

        <?php $card_index = 0; while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php
          $post_id  = get_the_ID();
          $lokacija = get_post_meta( $post_id, 'lokacija', true );
          $godina   = get_post_meta( $post_id, 'godina',   true );
          $povrsina = get_post_meta( $post_id, 'povrsina', true );
          $excerpt  = get_the_excerpt();
          $content  = get_the_content();
          $thumb    = get_the_post_thumbnail_url( $post_id, 'large' ) ?: '';
          $cat      = jg_ref_cat_label( $post_id );
        ?>
        <article class="jg-ref-card"
                 data-index="<?= $card_index ?>"
                 data-id="<?= $post_id ?>"
                 data-title="<?= esc_attr( get_the_title() ) ?>"
                 data-cat="<?= esc_attr( $cat ) ?>"
                 data-lokacija="<?= esc_attr( $lokacija ) ?>"
                 data-godina="<?= esc_attr( $godina ) ?>"
                 data-povrsina="<?= esc_attr( $povrsina ) ?>"
                 data-excerpt="<?= esc_attr( $excerpt ) ?>"
                 data-content="<?= esc_attr( wp_strip_all_tags( $content ) ) ?>"
                 data-thumb="<?= esc_attr( $thumb ) ?>">
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
              <?php if ( $excerpt ) : ?>
              <p class="jg-ref-card__excerpt"><?= esc_html( $excerpt ) ?></p>
              <?php endif; ?>
              <span class="jg-ref-card__cta">
                Погледај више
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M7.5 15L12.5 10L7.5 5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </span>
            </div>
          </button>
        </article>
        <?php $card_index++; endwhile; wp_reset_postdata(); ?>

        <!-- Inline expand panel (moved by JS after clicked row) -->
        <div class="jg-ref-detail" id="jg-ref-detail" hidden aria-live="polite">
          <div class="jg-ref-detail__inner">

            <div class="jg-ref-detail__header">
              <div class="jg-ref-detail__header-text">
                <span class="jg-ref-detail__cat"></span>
                <h3 class="jg-ref-detail__title"></h3>
              </div>
              <button class="jg-ref-detail__close-x" aria-label="Затвори">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M15 5L5 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 5L15 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </button>
            </div>

            <div class="jg-ref-detail__media">
              <div class="jg-ref-detail__img-wrap">
                <img class="jg-ref-detail__img" src="" alt="" width="530" height="299" loading="lazy">
                <div class="jg-ref-detail__img-placeholder" aria-hidden="true"></div>
              </div>
              <div class="jg-ref-detail__meta">
                <div class="jg-ref-detail__meta-item jg-ref-detail__meta-lokacija">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M16.6667 8.33333C16.6667 12.4942 12.0508 16.8275 10.5008 18.1658C10.3564 18.2744 10.1807 18.3331 10 18.3331C9.81933 18.3331 9.64356 18.2744 9.49917 18.1658C7.94917 16.8275 3.33333 12.4942 3.33333 8.33333C3.33333 6.56522 4.03571 4.86953 5.28595 3.61929C6.5362 2.36905 8.23189 1.66667 10 1.66667C11.7681 1.66667 13.4638 2.36905 14.714 3.61929C15.9643 4.86953 16.6667 6.56522 16.6667 8.33333Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 10.8333C11.3807 10.8333 12.5 9.71405 12.5 8.33333C12.5 6.95262 11.3807 5.83333 10 5.83333C8.61929 5.83333 7.5 6.95262 7.5 8.33333C7.5 9.71405 8.61929 10.8333 10 10.8333Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <div class="jg-ref-detail__meta-text">
                    <span class="jg-ref-detail__meta-label">Локација</span>
                    <span class="jg-ref-detail__meta-value jg-val-lokacija"></span>
                  </div>
                </div>
                <div class="jg-ref-detail__meta-item jg-ref-detail__meta-godina">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M6.66667 1.66667V5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3333 1.66667V5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.8333 3.33333H4.16667C3.24619 3.33333 2.5 4.07953 2.5 5V16.6667C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6667V5C17.5 4.07953 16.7538 3.33333 15.8333 3.33333Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.5 8.33333H17.5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <div class="jg-ref-detail__meta-text">
                    <span class="jg-ref-detail__meta-label">Година</span>
                    <span class="jg-ref-detail__meta-value jg-val-godina"></span>
                  </div>
                </div>
                <div class="jg-ref-detail__meta-item jg-ref-detail__meta-povrsina" hidden>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 18.3333V3.33333C5 2.89131 5.17559 2.46738 5.48816 2.15482C5.80072 1.84226 6.22464 1.66667 6.66667 1.66667H13.3333C13.7754 1.66667 14.1993 1.84226 14.5118 2.15482C14.8244 2.46738 15 2.89131 15 3.33333V18.3333H5Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 10H3.33333C2.89131 10 2.46738 10.1756 2.15482 10.4882C1.84226 10.8007 1.66667 11.2246 1.66667 11.6667V16.6667C1.66667 17.1087 1.84226 17.5326 2.15482 17.8452C2.46738 18.1577 2.89131 18.3333 3.33333 18.3333H5" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 7.5H16.6667C17.1087 7.5 17.5326 7.6756 17.8452 7.98816C18.1577 8.30072 18.3333 8.72464 18.3333 9.16667V16.6667C18.3333 17.1087 18.1577 17.5326 17.8452 17.8452C17.5326 18.1577 17.1087 18.3333 16.6667 18.3333H15" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 5H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 8.33333H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 11.6667H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.33333 15H11.6667" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <div class="jg-ref-detail__meta-text">
                    <span class="jg-ref-detail__meta-label">Површина</span>
                    <span class="jg-ref-detail__meta-value jg-val-povrsina"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="jg-ref-detail__about" hidden>
              <h4 class="jg-ref-detail__section-title">О пројекту</h4>
              <p class="jg-ref-detail__about-text jg-val-content"></p>
            </div>

            <div class="jg-ref-detail__gallery" hidden>
              <h4 class="jg-ref-detail__section-title">Галерија слика</h4>
              <div class="jg-ref-detail__gallery-wrap">
                <img class="jg-ref-detail__gallery-img jg-val-gallery-img" src="" alt="">
              </div>
            </div>

            <div class="jg-ref-detail__footer">
              <button class="jg-ref-detail__close-btn">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M15 5L5 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 5L15 15" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Затвори
              </button>
            </div>

          </div><!-- /.jg-ref-detail__inner -->
        </div><!-- /.jg-ref-detail -->

      </div><!-- /.jg-ref-card-grid -->

      <?php if ( $total_pages > 1 ) : ?>
      <nav class="jg-ref-pagination" aria-label="Навигација по страницама">
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
      <p class="jg-ref-main__empty">Нема пројеката у овој категорији.</p>
      <?php endif; ?>
    </div><!-- /.jg-ref-main -->

  </div>
</section>
