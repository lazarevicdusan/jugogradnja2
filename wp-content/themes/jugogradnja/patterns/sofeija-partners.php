<?php
/**
 * Title: Sofeija Партнери
 * Slug: jugogradnja/sofeija-partners
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

$logos = [ '01','02','03','04','06','07','08','09','11','12','13','14','15','16','17','20','22','24','25','26' ];
?>
<section class="jg-sofeija-partners">
	<div class="jg-sofeija-partners__inner">
		<div class="jg-sofeija-partners__text">
			<h2 class="jg-sofeija-partners__heading">Високоефикасна мрежа добављача и партнерства са водећим светским брендовима</h2>
			<div class="jg-sofeija-partners__accent"></div>
			<p class="jg-sofeija-partners__body">Групација Chinuofeiya бележи изванредне продајне резултате и користи предности великих набавки, што осигурава конкурентне цене. Остварена су партнерства са бројним водећим светским добављачима – специјализованим за плочасте материјале, кант траке, лакове, окове и друго – све у циљу одржавања строге контроле квалитета већ у фази набавке сировина.</p>
		</div>
		<div class="jg-sofeija-partners__logos">
			<?php foreach ( $logos as $n ) : ?>
			<div class="jg-sofeija-partners__logo">
				<img src="<?= $t ?>/assets/images/sofeija/partners-<?= esc_attr( $n ) ?>.jpg" alt="Partner <?= esc_html( $n ) ?>" width="120" height="60" loading="lazy">
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
