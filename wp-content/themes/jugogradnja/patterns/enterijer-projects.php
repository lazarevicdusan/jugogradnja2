<?php
/**
 * Title: Ентеријер - Наши пројекти
 * Slug: jugogradnja/enterijer-projects
 * Categories: jugogradnja
 * Inserter: true
 */
$t        = get_template_directory_uri();
$icon_pin = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_cal = esc_url( $t . '/assets/images/icons/icon-proj-calendar.svg' );
$ref_url  = esc_url( get_post_type_archive_link( 'projekat' ) ?: home_url( '/reference/' ) );

// 3 random published projects, re-drawn on every page load.
$random_posts = get_posts( [
    'post_type'      => 'projekat',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'orderby'        => 'rand',
    'no_found_rows'  => true,
    'suppress_filters' => false,
] );

$projects = [];
foreach ( $random_posts as $rp ) {
    $pid     = $rp->ID;
    $excerpt = get_the_excerpt( $pid );
    if ( ! $excerpt ) {
        $excerpt = wp_trim_words( wp_strip_all_tags( $rp->post_content ), 20 );
    }
    $projects[] = [
        'img'      => get_the_post_thumbnail_url( $pid, 'large' ) ?: '',
        'title'    => get_the_title( $pid ),
        'location' => get_post_meta( $pid, 'lokacija', true ),
        'year'     => get_post_meta( $pid, 'godina', true ),
        'desc'     => $excerpt,
        'url'      => home_url( '/reference/?proj=' . $rp->post_name ),
    ];
}
?>
<!-- wp:html -->
<section class="jg-inv-projects">
  <div class="jg-inv-projects__inner">
    <h2 class="jg-inv-projects__heading"><?= esc_html__( 'Наши пројекти ентеријера', 'jugogradnja' ) ?></h2>

    <div class="jg-inv-projects__grid">
      <?php foreach ( $projects as $p ) : ?>
      <a class="jg-inv-proj-card" href="<?= esc_url( $p['url'] ) ?>">
        <div class="jg-inv-proj-card__img-wrap">
          <?php if ( $p['img'] ) : ?>
          <img class="jg-inv-proj-card__img"
               src="<?= esc_url( $p['img'] ) ?>"
               alt="<?= esc_attr( $p['title'] ) ?>"
               width="470" height="262"
               loading="lazy">
          <?php else : ?>
          <div class="jg-inv-proj-card__img-placeholder" aria-hidden="true"></div>
          <?php endif; ?>
        </div>
        <div class="jg-inv-proj-card__body">
          <h3 class="jg-inv-proj-card__title"><?= esc_html( $p['title'] ) ?></h3>
          <div class="jg-inv-proj-card__meta">
            <?php if ( $p['location'] ) : ?>
            <div class="jg-inv-proj-card__meta-row">
              <img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
              <span><?= esc_html( $p['location'] ) ?></span>
            </div>
            <?php endif; ?>
            <?php if ( $p['year'] ) : ?>
            <div class="jg-inv-proj-card__meta-row">
              <img src="<?= $icon_cal ?>" width="16" height="16" alt="" aria-hidden="true">
              <span><?= esc_html( $p['year'] ) ?></span>
            </div>
            <?php endif; ?>
          </div>
          <?php if ( $p['desc'] ) : ?>
          <p class="jg-inv-proj-card__desc"><?= esc_html( $p['desc'] ) ?></p>
          <?php endif; ?>
          <span class="jg-inv-proj-card__more"><?= esc_html__( 'Детаљи', 'jugogradnja' ) ?> &rarr;</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="jg-inv-projects__cta">
      <a class="jg-btn jg-btn--gold" href="<?= $ref_url ?>">
        <?= esc_html__( 'ПОГЛЕДАЈТЕ СВЕ ПРОЈЕКТЕ', 'jugogradnja' ) ?>
      </a>
    </div>
  </div>
</section>
<!-- /wp:html -->
