<?php
/**
 * Title: VELUX Рецензије
 * Slug: jugogradnja/velux-reviews
 * Categories: jugogradnja
 */
$reviews = [
	[
		'initials' => 'ГМ',
		'name'     => 'Горан Миљковић',
		'time'     => 'пре 3 месеца',
		'text'     => 'Одлична фирма, професионалци у свом послу. Препоручујем свима који траже квалитет и поштовање рокова.',
	],
	[
		'initials' => 'МЈ',
		'name'     => 'Марко Јовановић',
		'time'     => 'пре 5 месеци',
		'text'     => 'Врло задовољан сарадњом. Уградња VELUX прозора обављена перфектно, све у договореном року. Топла препорука!',
	],
	[
		'initials' => 'АП',
		'name'     => 'Ана Петровић',
		'time'     => 'пре 6 месеци',
		'text'     => 'Професионалан тим, одлична комуникација и квалитетна услуга. VELUX прозори су савршено уграђени.',
	],
	[
		'initials' => 'ИН',
		'name'     => 'Иван Николић',
		'time'     => 'пре 8 месеци',
		'text'     => 'Веома сам задовољан. Уградили су ми кровне прозоре и све је урађено без икаквих проблема. Препорука!',
	],
];
?>
<section class="jg-velux-reviews">
	<div class="jg-velux-reviews__inner">
		<h2 class="jg-velux-reviews__heading">Шта наши клијенти кажу о VELUX прозорима</h2>
		<div class="jg-velux-reviews__rating">
			<div class="jg-velux-reviews__stars" aria-label="4.8 od 5">
				<?php for ( $i = 0; $i < 5; $i++ ) : ?>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="<?= $i < 4 ? '#C5A059' : 'none' ?>" aria-hidden="true"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z" stroke="#C5A059" stroke-width="1.4" stroke-linejoin="round"/></svg>
				<?php endfor; ?>
			</div>
			<strong class="jg-velux-reviews__score">4.8</strong>
		</div>
		<p class="jg-velux-reviews__count">На основу 24 Google рецензија</p>
		<div class="jg-velux-reviews__grid">
			<?php foreach ( $reviews as $r ) : ?>
			<div class="jg-velux-reviews__card">
				<div class="jg-velux-reviews__card-header">
					<div class="jg-velux-reviews__avatar"><?= esc_html( $r['initials'] ) ?></div>
					<div>
						<span class="jg-velux-reviews__name"><?= esc_html( $r['name'] ) ?></span>
						<div class="jg-velux-reviews__meta">
							<div class="jg-velux-reviews__meta-stars">
								<?php for ( $i = 0; $i < 5; $i++ ) : ?>
								<svg width="16" height="16" viewBox="0 0 24 24" fill="#C5A059" aria-hidden="true"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
								<?php endfor; ?>
							</div>
							<span><?= esc_html( $r['time'] ) ?></span>
						</div>
					</div>
				</div>
				<p class="jg-velux-reviews__text"><?= esc_html( $r['text'] ) ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="jg-velux-reviews__cta">
			<a class="jg-velux-reviews__google-btn" href="https://www.google.com/maps" target="_blank" rel="noopener">
				<svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
				Погледајте све рецензије на Google-у
			</a>
			<div class="jg-velux-reviews__badge">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="#C5A059" aria-hidden="true"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
				<div class="jg-velux-reviews__badge-text">
					<span>Сертификовани VELUX партнер</span>
					<strong>Више од 15 година искуства</strong>
				</div>
			</div>
		</div>
	</div>
</section>
