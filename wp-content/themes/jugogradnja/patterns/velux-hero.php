<?php
/**
 * Title: VELUX Hero
 * Slug: jugogradnja/velux-hero
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();
?>
<section class="jg-velux-hero">
	<div class="jg-velux-hero__bg" aria-hidden="true">
		<img src="<?= $t ?>/assets/images/velux/hero-bg.jpg" alt="" width="1919" height="1236">
		<div class="jg-velux-hero__overlay"></div>
	</div>
	<div class="jg-velux-hero__inner">
		<img class="jg-velux-hero__logo" src="<?= $t ?>/assets/images/velux/velux-logo.png" alt="VELUX" width="240" height="80">
		<div class="jg-velux-hero__badge">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M10 2l1.5 4.5H16l-3.5 2.5 1.5 4.5L10 11l-4 2.5 1.5-4.5L4 6.5h4.5L10 2z" stroke="#C5A059" stroke-width="1.4" stroke-linejoin="round"/></svg>
			<span>ОВЛАШЋЕНИ ПРОДАВАЦ ОД 1998. ГОДИНЕ</span>
		</div>
		<h1 class="jg-velux-hero__heading">Дугогодишње партнерство са VELUX-ом</h1>
		<p class="jg-velux-hero__sub">Прозори који доносе светлост и удобност у ваш дом</p>
		<div class="jg-velux-hero__cta">
			<a class="jg-velux-hero__btn jg-velux-hero__btn--gold" href="#prozori">ПОНУДА ПРОЗОРА</a>
			<a class="jg-velux-hero__btn jg-velux-hero__btn--outline" href="#roletne">ПОНУДА РОЛЕТНИ</a>
		</div>
		<div class="jg-velux-hero__contacts">
			<div class="jg-velux-hero__contact">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				<div>
					<span class="jg-velux-hero__contact-label">Продаја</span>
					<a class="jg-velux-hero__contact-value" href="tel:+381648115868">+381 64 811 58 68</a>
				</div>
			</div>
			<div class="jg-velux-hero__contact">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				<div>
					<span class="jg-velux-hero__contact-label">Изложбени салон</span>
					<span class="jg-velux-hero__contact-value">Светолика Никачевића бб.</span>
				</div>
			</div>
		</div>
	</div>
</section>
