<?php
/**
 * Title: Каријере - Студентске праксе
 * Slug: jugogradnja/careers-internship
 * Categories: jugogradnja
 * Inserter: true
 */
$uploads = content_url( 'uploads/2026/07/' );
$testimonials = [
	[
		'name'  => __( 'Николина Кувекаловић', 'jugogradnja' ),
		'role'  => __( 'Студенткиња Грађевинског факултета', 'jugogradnja' ),
		'quote' => __( '„На факултету смо учили теорију, али у Југоградњи сам то знање претворила у практично искуство и научила много више. Стажирање ми је отворило врата за запослење и омогућило да свакодневно доприносим значајним пројектима. Југоградња је место где се знање, труд и посвећеност заиста цене."', 'jugogradnja' ),
		'photo' => $uploads . 'nikolina-kuvekalovic.jpg',
	],
	[
		'name'  => __( 'Јован Калдесић', 'jugogradnja' ),
		'role'  => __( 'Студент Грађевинског факултета', 'jugogradnja' ),
		'quote' => __( '„Пракса у Југоградњи дала ми је прилику да стекнем прво озбиљно искуство у струци. Кроз рад на терену и сарадњу са искуснијим колегама боље сам разумео како изгледа реализација грађевинских пројеката и колико су организација и тимски рад важни у свакој фази изградње. То искуство ми је много значило и потврдило да желим да наставим да се развијам у овој професији."', 'jugogradnja' ),
		'photo' => $uploads . 'jovan-kaldesic.jpeg',
	],
	[
		'name'  => __( 'Наталија Лукић', 'jugogradnja' ),
		'role'  => __( 'Студенткиња Грађевинског факултета', 'jugogradnja' ),
		'quote' => __( '„Радно окружење у Југоградњи омогућило ми је да стекнем практично искуство и упознам се са свакодневним процесима у грађевинарству. Захваљујући различитим задацима, као и сарадњи са тимом, развила сам вештине које ће ми бити значајне у даљем професионалном развоју."', 'jugogradnja' ),
		'photo' => $uploads . 'natalija-lukic.jpeg',
	],
];
?>
<!-- wp:html -->
<section class="jg-careers-internship">
  <div class="jg-careers-internship__inner">
    <div class="jg-internship-card">
      <h2 class="jg-internship-card__heading"><?= esc_html__( 'Студентске праксе и стажирање', 'jugogradnja' ) ?></h2>
      <p class="jg-internship-card__text"><?= esc_html__( 'Студентима нудимо прилику да стекну практично искуство, науче од стручног тима и упознају реалне грађевинске и инжењерске пројекте. Најбољи стажисти имају шансу да након праксе постану део нашег тима.', 'jugogradnja' ) ?></p>
      <div class="jg-internship-testimonial" id="jg-internship-slider">
        <div class="jg-internship-testimonial__label"><?= esc_html__( 'ПРИМЕР ИЗ ПРАКСЕ', 'jugogradnja' ) ?></div>
        <div class="jg-internship-testimonial__track">
          <?php foreach ( $testimonials as $i => $t ) : ?>
          <div class="jg-internship-testimonial__slide<?= $i === 0 ? ' jg-slide--active' : '' ?>">
            <div class="jg-internship-testimonial__body">
              <div class="jg-internship-testimonial__content">
                <p class="jg-internship-testimonial__name"><?= esc_html( $t['name'] ) ?></p>
                <p class="jg-internship-testimonial__role"><?= esc_html( $t['role'] ) ?></p>
                <blockquote class="jg-internship-testimonial__quote"><?= esc_html( $t['quote'] ) ?></blockquote>
              </div>
              <div class="jg-internship-testimonial__avatar-wrap" aria-hidden="true">
                <img class="jg-internship-testimonial__avatar" src="<?= esc_url( $t['photo'] ) ?>" alt="<?= esc_attr( $t['name'] ) ?>" width="160" height="160" loading="lazy">
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="jg-internship-testimonial__dots" role="tablist">
          <?php foreach ( $testimonials as $i => $t ) : ?>
          <button class="jg-dot<?= $i === 0 ? ' jg-dot--active' : '' ?>" role="tab" aria-label="<?= esc_attr( $t['name'] ) ?>" data-slide="<?= $i ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->
