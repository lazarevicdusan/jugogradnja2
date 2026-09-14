<?php
/**
 * Title: Sofeija Технолошка супериорност
 * Slug: jugogradnja/sofeija-tech
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();
?>
<section class="jg-sofeija-tech">
	<div class="jg-sofeija-tech__inner">
		<div class="jg-sofeija-tech__content">
			<div class="jg-sofeija-tech__heading-wrap">
				<h2 class="jg-sofeija-tech__heading"><?= esc_html__( 'Технолошка супериорност', 'jugogradnja' ) ?></h2>
				<div class="jg-sofeija-tech__accent"></div>
			</div>
			<p class="jg-sofeija-tech__lead"><?= esc_html__( 'Са традицијом од 1981. године и преко 15.000 опремљених пројеката широм света, Sofeyia поставља стандарде:', 'jugogradnja' ) ?></p>
			<ul class="jg-sofeija-tech__list">
				<li class="jg-sofeija-tech__item">
					<svg class="jg-sofeija-tech__check" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="9" fill="#d3c8c4"/><path d="M6.5 10l2.5 2.5 4.5-5" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<div class="jg-sofeija-tech__item-body">
						<strong><?= esc_html__( 'Милиметарска прецизност', 'jugogradnja' ) ?></strong>
						<p><?= esc_html__( 'Најнапредније Industry 4.0 фабрике гарантују 99% прецизности обраде, уз дигитално праћење сваког панела.', 'jugogradnja' ) ?></p>
					</div>
				</li>
				<li class="jg-sofeija-tech__item">
					<svg class="jg-sofeija-tech__check" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="9" fill="#d3c8c4"/><path d="M6.5 10l2.5 2.5 4.5-5" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<div class="jg-sofeija-tech__item-body">
						<strong><?= esc_html__( 'Еколошка одрживост', 'jugogradnja' ) ?></strong>
						<p><?= esc_html__( 'Користе се искључиво строго сертификовани материјали који чувају здравље и животну средину.', 'jugogradnja' ) ?></p>
					</div>
				</li>
				<li class="jg-sofeija-tech__item">
					<svg class="jg-sofeija-tech__check" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="9" fill="#d3c8c4"/><path d="M6.5 10l2.5 2.5 4.5-5" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
					<div class="jg-sofeija-tech__item-body">
						<strong><?= esc_html__( 'Светски дизајн', 'jugogradnja' ) ?></strong>
						<p><?= esc_html__( 'Материјали отпорни на хабање са ексклузивним завршним обрадама које прате најновије глобалне трендове.', 'jugogradnja' ) ?></p>
					</div>
				</li>
			</ul>
		</div>
		<div class="jg-sofeija-tech__photo">
			<img src="<?= $t ?>/assets/images/sofeija/home2.jpg" alt="<?= esc_attr__( 'Sofeyia ентеријер', 'jugogradnja' ) ?>" width="689" height="485" loading="lazy">
		</div>
	</div>
</section>
