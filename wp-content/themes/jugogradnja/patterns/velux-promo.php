<?php
/**
 * Title: VELUX Промоције
 * Slug: jugogradnja/velux-promo
 * Categories: jugogradnja
 */
?>
<section class="jg-velux-promo">
	<div class="jg-velux-promo__inner">
		<div class="jg-velux-promo__tag">
			<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M2 2h5.5l6.5 6.5-5.5 5.5L2 7.5V2z" stroke="#C5A059" stroke-width="1.3" stroke-linejoin="round"/><circle cx="5" cy="5" r="1" fill="#C5A059"/></svg>
			<?= esc_html__( 'ПРОМОЦИЈЕ И АКЦИЈЕ', 'jugogradnja' ) ?>
		</div>
		<h2 class="jg-velux-promo__heading"><?= esc_html__( 'Специјалне понуде за VELUX прозоре', 'jugogradnja' ) ?></h2>
		<p class="jg-velux-promo__sub"><?= esc_html__( 'Пратите наше будуће промоције и акције. Контактирајте нас за више информација о тренутним понудама.', 'jugogradnja' ) ?></p>
		<div class="jg-velux-promo__card">
			<h3 class="jg-velux-promo__card-title"><?= esc_html__( 'DKL ролетна за замрачење за само 100 RSD', 'jugogradnja' ) ?></h3>
			<p class="jg-velux-promo__card-text"><?= esc_html__( 'Купите VELUX кровни прозор на ручно управљање, заједно са опшивком и BDX сетом, у периоду од 15. септембра до 26. октобра 2026. и остварите право на DKL ролетну за потпуно замрачење по цени од само 100 RSD.', 'jugogradnja' ) ?></p>

			<h4 class="jg-velux-promo__card-subheading"><?= esc_html__( 'Како да остварите понуду:', 'jugogradnja' ) ?></h4>
			<ol class="jg-velux-promo__card-steps">
				<li><?= esc_html__( 'Купите свој VELUX кровни прозор код нас, у салону на Светолика Никачевића бб или преко упита на сајту, у периоду од 15. септембра до 26. октобра 2026.', 'jugogradnja' ) ?></li>
				<li><?= wp_kses_post( sprintf(
					/* translators: %s: promo landing page URL */
					__( 'Посетите страницу %s (доступна од 15.9.2026), попуните пријавни формулар и приложите рачун о куповини.', 'jugogradnja' ),
					'<a href="https://velux.rs/DKL-za-100rsd" target="_blank" rel="noopener">velux.rs/DKL-za-100rsd</a>'
				) ) ?></li>
				<li><?= esc_html__( 'Наручите DKL ролетну за замрачење по цени од 100 RSD.', 'jugogradnja' ) ?></li>
				<li><?= esc_html__( 'VELUX вам ролетну доставља директно на кућну адресу, након извршене уплате.', 'jugogradnja' ) ?></li>
			</ol>

			<p class="jg-velux-promo__card-note"><?= esc_html__( 'Понуда важи искључиво за прозоре купљене у наведеном периоду, и односи се на ручно управљане прозоре уз опшивку и BDX сет.', 'jugogradnja' ) ?></p>
			<p class="jg-velux-promo__card-contact"><?= wp_kses_post( sprintf(
				/* translators: %s: phone number link */
				__( 'За сва питања о акцији или помоћ око избора правог прозора, позовите нас на %s.', 'jugogradnja' ),
				'<a href="tel:0648115868">064 811-58-68</a>'
			) ) ?></p>
		</div>
	</div>
</section>
