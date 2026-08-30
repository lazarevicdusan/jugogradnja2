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
		<p class="jg-sofeija-offer__badge">Шта нудимо</p>
		<h2 class="jg-sofeija-offer__heading">Свеобухватно решење за опремање целог пројекта на једном месту</h2>
		<p class="jg-sofeija-offer__text">Са деценијама искуства у индустрији опремања дома, Sofeyia Home нуди комплетну услугу опремања целе куће на једном месту за све ваше потребе – од дизајна, преко производње, па све до монтаже.</p>
	</div>
</section>

<div class="jg-sofeija-offer-cards">
	<div class="jg-sofeija-offer-cards__inner">

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-design.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title">Услуге дизајна</h3>
			<p class="jg-sofeija-offer-card__text">Нудимо подршку која укључује стручне консултације, израду и оптимизацију цртежа као и техничко усклађивање.</p>
		</div>

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-support.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title">Подршка при куповини</h3>
			<p class="jg-sofeija-offer-card__text">Искусни продајни представници задужени за специфичне земље пружају брзу и висококвалитетну подршку.</p>
		</div>

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-install.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title">Услуге монтаже</h3>
			<p class="jg-sofeija-offer-card__text">Монтажу врши наш професионални тим који ради по стриктним стандардима произвођача.</p>
		</div>

		<div class="jg-sofeija-offer-card">
			<div class="jg-sofeija-offer-card__icon" aria-hidden="true">
				<img src="<?= $icons ?>/sofeija-quality.svg" width="65" height="65" alt="">
			</div>
			<h3 class="jg-sofeija-offer-card__title">Контрола квалитета</h3>
			<p class="jg-sofeija-offer-card__text">Праћење квалитета производа, чиме се осигурава да сваки комад намештаја испуњава највише стандарде издржљивости.</p>
		</div>

	</div>
</div>
