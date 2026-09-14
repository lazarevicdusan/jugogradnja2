<?php
/**
 * Title: Sofeija Шта нудимо
 * Slug: jugogradnja/sofeija-what-we-offer
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();
$icons = $t . '/assets/images/icons';
?>
<section class="jg-sofeija-offer">
	<div class="jg-sofeija-offer__bg" aria-hidden="true">
		<img src="<?= $t ?>/assets/images/sofeija/what-we-offer-bg.png" alt="" width="1440" height="483" loading="lazy">
		<div class="jg-sofeija-offer__overlay"></div>
	</div>
	<div class="jg-sofeija-offer__inner">
		<p class="jg-sofeija-offer__badge"><?= esc_html__( 'Шта нудимо', 'jugogradnja' ) ?></p>
		<h2 class="jg-sofeija-offer__heading"><?= esc_html__( 'Свеобухватно решење за опремање целог пројекта на једном месту', 'jugogradnja' ) ?></h2>
		<p class="jg-sofeija-offer__text"><?= esc_html__( 'Са деценијама искуства у индустрији опремања дома, Sofeyia Home нуди комплетну услугу опремања целе куће на једном месту за све ваше потребе – од дизајна, преко производње, па све до монтаже.', 'jugogradnja' ) ?></p>
	</div>
</section>

<div class="jg-sofeija-offer-cards">
	<div class="jg-sofeija-offer-cards__inner">

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-design.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title"><?= esc_html__( 'Услуге дизајна', 'jugogradnja' ) ?></h3>
			<p class="jg-sofeija-offer-card__text"><?= esc_html__( 'Нудимо подршку која укључује стручне консултације, израду и оптимизацију цртежа као и техничко усклађивање.', 'jugogradnja' ) ?></p>
		</div>

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-support.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title"><?= esc_html__( 'Подршка при куповини', 'jugogradnja' ) ?></h3>
			<p class="jg-sofeija-offer-card__text"><?= esc_html__( 'Искусни продајни представници задужени за специфичне земље пружају брзу и висококвалитетну подршку.', 'jugogradnja' ) ?></p>
		</div>

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-install.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title"><?= esc_html__( 'Услуге монтаже', 'jugogradnja' ) ?></h3>
			<p class="jg-sofeija-offer-card__text"><?= esc_html__( 'Монтажу врши наш професионални тим који ради по стриктним стандардима произвођача.', 'jugogradnja' ) ?></p>
		</div>

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-quality.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title"><?= esc_html__( 'Контрола квалитета', 'jugogradnja' ) ?></h3>
			<p class="jg-sofeija-offer-card__text"><?= esc_html__( 'Праћење квалитета производа, чиме се осигурава да сваки комад намештаја испуњава највише стандарде издржљивости.', 'jugogradnja' ) ?></p>
		</div>

	</div>
</div>
