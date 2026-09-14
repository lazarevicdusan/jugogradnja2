<?php
/**
 * Title: Sofeija Hero
 * Slug: jugogradnja/sofeija-hero
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();
?>
<section class="jg-sofeija-hero" aria-label="<?= esc_attr__( 'Ко смо ми', 'jugogradnja' ) ?>">
	<div class="jg-sofeija-hero__bg" aria-hidden="true">
		<img src="<?= $t ?>/assets/images/sofeija/hero-bg.jpg" alt="" width="1920" height="500" loading="eager">
		<div class="jg-sofeija-hero__overlay"></div>
	</div>
	<div class="jg-sofeija-hero__inner">
		<p class="jg-sofeija-hero__badge"><?= esc_html__( 'Ко смо ми', 'jugogradnja' ) ?></p>
		<h1 class="jg-sofeija-hero__title"><?php echo __( 'Светски дизајн.<br>Беспрекорна прецизност', 'jugogradnja' ); ?></h1>
		<p class="jg-sofeija-hero__text"><?= esc_html__( 'Заступамо водећи светски бренд Sofeyia, специјализован за комплетно опремање дома. На наше тржиште доносимо нову еру у изради намештаја по мери, уз широк асортиман који обухвата кухиње, купатилски намештај, собна врата, плакаре и још много тога.', 'jugogradnja' ) ?></p>
	</div>
</section>
