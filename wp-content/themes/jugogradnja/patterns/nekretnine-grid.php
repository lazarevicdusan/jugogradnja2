<?php
/**
 * Title: Некретнине — Листинг
 * Slug: jugogradnja/nekretnine-grid
 * Categories: jugogradnja
 * Inserter: true
 */
$t          = get_template_directory_uri();
$icon_euro  = esc_url( $t . '/assets/images/icons/icon-prop-euro.svg' );
$icon_pin   = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_area  = esc_url( $t . '/assets/images/icons/icon-prop-area.svg' );
$icon_rooms = esc_url( $t . '/assets/images/icons/icon-prop-rooms.svg' );
$icon_bed   = esc_url( $t . '/assets/images/icons/icon-prop-bed.svg' );
$icon_arrow = esc_url( $t . '/assets/images/icons/icon-prop-arrow.svg' );

/* ── Filter ──────────────────────────────────────────── */
$active_tip = isset( $_GET['tip'] ) ? sanitize_key( $_GET['tip'] ) : '';

$filters = [
    ''                 => 'Све некретнине',
    'stan'             => 'Станови',
    'kuca'             => 'Куће',
    'poslovni-prostor' => 'Пословни простор',
];

/* ── Query ───────────────────────────────────────────── */
$args = [
    'post_type'      => 'nekretnina',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
];

if ( $active_tip ) {
    $args['tax_query'] = [[
        'taxonomy' => 'tip_nekretnine',
        'field'    => 'slug',
        'terms'    => $active_tip,
    ]];
}

$query = new WP_Query( $args );
$total = $query->found_posts;
?>
<!-- wp:html -->
<section class="jg-nekretnine-section">
  <div class="jg-nekretnine-section__intro">
    <div class="jg-nekretnine-section__intro-inner">
      <h2 class="jg-section-heading" style="text-align:center">Истакнуте некретнине</h2>
      <p class="jg-nekretnine-section__intro-sub">Најновије и најатрактивније понуде у нашем портфолију</p>
    </div>
  </div>

  <div class="jg-nekretnine-section__content">
    <div class="jg-nekretnine-section__content-inner">

      <!-- Filter tabs -->
      <div class="jg-prop-filters" role="tablist" aria-label="Филтер некретнина">
        <?php foreach ( $filters as $slug => $label ) :
            $is_active = ( $slug === $active_tip );
            $url       = $slug ? esc_url( add_query_arg( 'tip', $slug ) ) : esc_url( remove_query_arg( 'tip' ) );
        ?>
        <a class="jg-prop-filter<?= $is_active ? ' jg-prop-filter--active' : '' ?>"
           href="<?= $url ?>"
           role="tab"
           aria-selected="<?= $is_active ? 'true' : 'false' ?>">
          <?= esc_html( $label ) ?>
        </a>
        <?php endforeach; ?>
      </div>

      <!-- Count -->
      <p class="jg-prop-count">
        <?php printf(
            'Приказано %d од %d некретнина',
            $query->post_count,
            $total
        ); ?>
      </p>

      <!-- Grid -->
      <?php if ( $query->have_posts() ) : ?>
      <div class="jg-prop-grid">
        <?php while ( $query->have_posts() ) : $query->the_post();
            $cena       = get_post_meta( get_the_ID(), '_nekretnina_cena', true );
            $povrsina   = get_post_meta( get_the_ID(), '_nekretnina_povrsina', true );
            $sobe       = get_post_meta( get_the_ID(), '_nekretnina_sobe', true );
            $spavace    = get_post_meta( get_the_ID(), '_nekretnina_spavace', true );
            $lokacija   = get_post_meta( get_the_ID(), '_nekretnina_lokacija', true );
            $godina     = get_post_meta( get_the_ID(), '_nekretnina_godina', true );
            $istaknuto  = get_post_meta( get_the_ID(), '_nekretnina_istaknuto', true );

            $terms      = get_the_terms( get_the_ID(), 'tip_nekretnine' );
            $tip_label  = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';

            $thumb      = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : '';
        ?>
        <a class="jg-prop-card" href="<?= esc_url( get_permalink() ) ?>">
          <div class="jg-prop-card__img-wrap">
            <?php if ( $thumb ) : ?>
            <img class="jg-prop-card__img" src="<?= esc_url( $thumb ) ?>" alt="<?= esc_attr( get_the_title() ) ?>" width="720" height="400" loading="lazy">
            <?php else : ?>
            <div class="jg-prop-card__img-placeholder" aria-hidden="true"></div>
            <?php endif; ?>

            <div class="jg-prop-card__badges">
              <?php if ( $tip_label ) : ?>
              <span class="jg-prop-badge jg-prop-badge--type"><?= esc_html( $tip_label ) ?></span>
              <?php endif; ?>
              <?php if ( $istaknuto ) : ?>
              <span class="jg-prop-badge jg-prop-badge--featured">ИСТАКНУТО</span>
              <?php endif; ?>
            </div>

            <?php if ( $cena ) : ?>
            <div class="jg-prop-card__price">
              <img src="<?= $icon_euro ?>" width="16" height="16" alt="" aria-hidden="true">
              <span><?= esc_html( number_format( (float) $cena, 0, ',', '.' ) ) ?></span>
            </div>
            <?php endif; ?>
          </div>

          <div class="jg-prop-card__body">
            <h3 class="jg-prop-card__title"><?= esc_html( get_the_title() ) ?></h3>

            <?php if ( $lokacija ) : ?>
            <div class="jg-prop-card__location">
              <img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
              <span><?= esc_html( $lokacija ) ?></span>
            </div>
            <?php endif; ?>

            <p class="jg-prop-card__excerpt"><?= esc_html( wp_trim_words( get_the_excerpt(), 14, '…' ) ) ?></p>

            <div class="jg-prop-card__stats">
              <?php if ( $povrsina ) : ?>
              <div class="jg-prop-card__stat">
                <img src="<?= $icon_area ?>" width="20" height="20" alt="" aria-hidden="true">
                <span><?= esc_html( $povrsina ) ?> м²</span>
              </div>
              <?php endif; ?>
              <?php if ( $sobe ) : ?>
              <div class="jg-prop-card__stat">
                <img src="<?= $icon_rooms ?>" width="20" height="20" alt="" aria-hidden="true">
                <span><?= esc_html( $sobe ) ?> соб<?= (int) $sobe === 1 ? 'а' : 'е' ?></span>
              </div>
              <?php endif; ?>
              <?php if ( $spavace !== '' && $spavace !== false ) : ?>
              <div class="jg-prop-card__stat">
                <img src="<?= $icon_bed ?>" width="20" height="20" alt="" aria-hidden="true">
                <span><?= esc_html( $spavace ) ?> спав.</span>
              </div>
              <?php endif; ?>
            </div>

            <div class="jg-prop-card__footer">
              <span class="jg-prop-card__details-link">
                Погледај детаље
                <img src="<?= $icon_arrow ?>" width="16" height="16" alt="" aria-hidden="true">
              </span>
              <?php if ( $godina ) : ?>
              <span class="jg-prop-card__year"><?= esc_html( $godina ) ?></span>
              <?php endif; ?>
            </div>
          </div>
        </a>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <?php else : ?>
      <p class="jg-prop-empty">Тренутно нема некретнина у овој категорији.</p>
      <?php endif; ?>

    </div>
  </div>
</section>
<!-- /wp:html -->
