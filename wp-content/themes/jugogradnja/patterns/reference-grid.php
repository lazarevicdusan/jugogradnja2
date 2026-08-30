<?php
/**
 * Title: Референце - Мрежа пројеката
 * Slug: jugogradnja/reference-grid
 * Categories: jugogradnja
 * Inserter: true
 */
$t           = get_template_directory_uri();
$icon_pin    = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_cal    = esc_url( $t . '/assets/images/icons/icon-proj-calendar.svg' );
$icon_arrow  = esc_url( $t . '/assets/images/icons/icon-prop-arrow.svg' );

/* ── Active filter ───────────────────────────────────────── */
$active_kat = isset( $_GET['kategorija'] ) ? sanitize_key( $_GET['kategorija'] ) : '';

/* ── Sidebar categories with counts ─────────────────────── */
$categories = [
    ''                         => 'Сви пројекти',
    'izgradnja-stambeni'       => 'Изградња – Стамбени објекти',
    'izgradnja-javni'          => 'Изградња – Јавни објекти',
    'rekonstrukcija-adaptacija'=> 'Реконструкција / Адаптација',
    'konzervacija-restauracija'=> 'Конзервација / Рестаурација',
    'opremanje-enterijera'     => 'Опремање ентеријера',
];

/* ── Query ───────────────────────────────────────────────── */
$args = [
    'post_type'      => 'projekti',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
];

if ( $active_kat ) {
    $args['tax_query'] = [[
        'taxonomy' => 'kategorija_projekta',
        'field'    => 'slug',
        'terms'    => $active_kat,
    ]];
}

$query = new WP_Query( $args );
$total = $query->found_posts;

/* ── Category counts for sidebar ────────────────────────── */
$all_count = wp_count_posts( 'projekti' )->publish ?? 0;
?>
<!-- wp:html -->
<section class="jg-ref-section">
  <div class="jg-ref-section__inner">

    <!-- Sidebar -->
    <aside class="jg-ref-sidebar" aria-label="Категорије пројеката">
      <h2 class="jg-ref-sidebar__heading">Категорије</h2>
      <nav class="jg-ref-sidebar__nav">
        <?php foreach ( $categories as $slug => $label ) :
            $is_active = ( $slug === $active_kat );
            $url       = $slug
                ? esc_url( add_query_arg( 'kategorija', $slug ) )
                : esc_url( remove_query_arg( 'kategorija' ) );

            if ( $slug ) {
                $term  = get_term_by( 'slug', $slug, 'kategorija_projekta' );
                $count = $term ? $term->count : 0;
            } else {
                $count = $all_count;
            }
        ?>
        <a class="jg-ref-sidebar__link<?= $is_active ? ' jg-ref-sidebar__link--active' : '' ?>"
           href="<?= $url ?>">
          <span class="jg-ref-sidebar__link-label"><?= esc_html( $label ) ?></span>
          <span class="jg-ref-sidebar__link-count"><?= (int) $count ?></span>
        </a>
        <?php endforeach; ?>
      </nav>
    </aside>

    <!-- Main content -->
    <div class="jg-ref-content">
      <h2 class="jg-ref-content__heading">
        <?php
        $heading_label = $active_kat && isset( $categories[ $active_kat ] )
            ? $categories[ $active_kat ]
            : 'Сви пројекти';
        printf( '%s (%d)', esc_html( $heading_label ), $total );
        ?>
      </h2>

      <?php if ( $query->have_posts() ) : ?>
      <div class="jg-proj-grid">
        <?php while ( $query->have_posts() ) : $query->the_post();
            $lokacija    = get_post_meta( get_the_ID(), '_projekat_lokacija', true );
            $godina      = get_post_meta( get_the_ID(), '_projekat_godina', true );
            $kratki_opis = get_post_meta( get_the_ID(), '_projekat_kratki_opis', true );

            $terms       = get_the_terms( get_the_ID(), 'kategorija_projekta' );
            $kat_label   = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';

            $thumb       = has_post_thumbnail()
                ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' )
                : '';
        ?>
        <a class="jg-proj-card" href="<?= esc_url( get_permalink() ) ?>">
          <div class="jg-proj-card__img-wrap">
            <?php if ( $thumb ) : ?>
            <img class="jg-proj-card__img"
                 src="<?= esc_url( $thumb ) ?>"
                 alt="<?= esc_attr( get_the_title() ) ?>"
                 width="440" height="330" loading="lazy">
            <?php else : ?>
            <div class="jg-proj-card__img-placeholder" aria-hidden="true"></div>
            <?php endif; ?>

            <?php if ( $kat_label ) : ?>
            <div class="jg-proj-card__badge"><?= esc_html( $kat_label ) ?></div>
            <?php endif; ?>
          </div>

          <div class="jg-proj-card__body">
            <h3 class="jg-proj-card__title"><?= esc_html( get_the_title() ) ?></h3>

            <div class="jg-proj-card__meta">
              <?php if ( $lokacija ) : ?>
              <div class="jg-proj-card__meta-row">
                <img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
                <span><?= esc_html( $lokacija ) ?></span>
              </div>
              <?php endif; ?>
              <?php if ( $godina ) : ?>
              <div class="jg-proj-card__meta-row">
                <img src="<?= $icon_cal ?>" width="16" height="16" alt="" aria-hidden="true">
                <span><?= esc_html( $godina ) ?></span>
              </div>
              <?php endif; ?>
            </div>

            <?php if ( $kratki_opis ) : ?>
            <p class="jg-proj-card__desc"><?= esc_html( $kratki_opis ) ?></p>
            <?php endif; ?>

            <span class="jg-proj-card__more">
              Погледај више
              <img src="<?= $icon_arrow ?>" width="20" height="20" alt="" aria-hidden="true">
            </span>
          </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <?php else : ?>
      <p class="jg-proj-empty">Тренутно нема пројеката у овој категорији.</p>
      <?php endif; ?>
    </div>

  </div>
</section>
<!-- /wp:html -->
