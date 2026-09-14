<?php
/**
 * Title: VELUX Bottom CTA
 * Slug: jugogradnja/velux-bottom-cta
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();
?>
<section class="jg-velux-bcta">
	<div class="jg-velux-bcta__inner">
		<div class="jg-velux-bcta__left">
			<div class="jg-velux-bcta__badge"><?= esc_html__( 'СЕРТИФИКОВАНИ МАЈСТОРИ', 'jugogradnja' ) ?></div>
			<h2 class="jg-velux-bcta__heading"><?= esc_html__( 'ЈУГОГРАДЊА вас повезује са сертификованим мајсторима за професионалну уградњу', 'jugogradnja' ) ?></h2>
			<p class="jg-velux-bcta__sub"><?= esc_html__( 'У нашем изложбеном салону можете погледати експонате кровних прозора и добити све неопходне информације. Повезујемо вас са провереним професионалним мајсторима који имају VELUX сертификат за уградњу кровних прозора.', 'jugogradnja' ) ?></p>
			<div class="jg-velux-bcta__cards">
				<div class="jg-velux-bcta__card">
					<svg class="jg-velux-bcta__card-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2C8.7 2 6 4.7 6 8c0 5 6 14 6 14s6-9 6-14c0-3.3-2.7-6-6-6z" stroke="#C5A059" stroke-width="1.5"/><circle cx="12" cy="8" r="2.2" stroke="#C5A059" stroke-width="1.5"/></svg>
					<div>
						<span class="jg-velux-bcta__card-label"><?= esc_html__( 'Изложбени салон', 'jugogradnja' ) ?></span>
						<strong class="jg-velux-bcta__card-value">Светолика Никачевића бб</strong>
						<span class="jg-velux-bcta__card-sub"><?= esc_html__( 'Београд, Србија', 'jugogradnja' ) ?></span>
					</div>
				</div>
				<div class="jg-velux-bcta__card">
					<svg class="jg-velux-bcta__card-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5.5 9.5c1 2 2.8 3.8 4.8 4.8l1.6-1.6c.2-.2.5-.3.8-.2.8.3 1.7.4 2.6.4.5 0 .8.3.8.7V16c0 .5-.3.7-.7.7C8 16.7 2 10.7 2 3c0-.4.3-.7.7-.7H5.3c.5 0 .7.3.7.7 0 1 .2 1.9.5 2.7.1.3 0 .6-.2.8L5.5 9.5z" stroke="#C5A059" stroke-width="1.5" stroke-linecap="round"/></svg>
					<div>
						<span class="jg-velux-bcta__card-label"><?= esc_html__( 'Контактирајте свог продавца', 'jugogradnja' ) ?></span>
						<strong class="jg-velux-bcta__card-value jg-velux-bcta__card-value--lg">+381 64 811 58 68</strong>
					</div>
				</div>
			</div>
			<a class="jg-velux-bcta__btn" href="<?= esc_url( home_url( '/kontakt/' ) ) ?>"><?= esc_html__( 'ЗАКАЖИТЕ ПОСЕТУ САЛОНУ', 'jugogradnja' ) ?></a>
		</div>
		<div class="jg-velux-bcta__right">
			<div class="jg-velux-bcta__img-frame">
				<img src="<?= $t ?>/assets/images/velux/salon.jpg" alt="<?= esc_attr__( 'VELUX изложбени салон', 'jugogradnja' ) ?>" width="800" height="800" loading="lazy">
			</div>
			<div class="jg-velux-bcta__float">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2C8.7 2 6 4.7 6 8c0 5 6 14 6 14s6-9 6-14c0-3.3-2.7-6-6-6z" stroke="#C5A059" stroke-width="1.5"/><circle cx="12" cy="8" r="2.2" stroke="#C5A059" stroke-width="1.5"/></svg>
				<div>
					<strong><?= esc_html__( 'Посетите нас', 'jugogradnja' ) ?></strong>
					<span><?= esc_html__( 'Погледајте експонате VELUX прозора уживо и добијте стручни савет', 'jugogradnja' ) ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
