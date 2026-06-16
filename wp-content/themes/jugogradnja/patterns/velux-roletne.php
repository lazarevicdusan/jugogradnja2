<?php
/**
 * Title: VELUX Ролетне и додаци
 * Slug: jugogradnja/velux-roletne-dodaci
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

$features = [
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><circle cx="14" cy="14" r="5" stroke="#C5A059" stroke-width="1.6"/><path d="M14 2v3M14 23v3M2 14h3M23 14h3M5.6 5.6l2.1 2.1M20.3 20.3l2.1 2.1M5.6 22.4l2.1-2.1M20.3 7.7l2.1-2.1" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'title' => 'Спољна заштита',
		'text'  => 'Ефективна заштита од топлоте. Смањење загревања до 76%.',
	],
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><path d="M12 5C8 6.5 5 10 5 14.5A9.5 9.5 0 0 0 14.5 24c4.5 0 8-3 9.5-7-1 .5-2 .7-3 .7A8.2 8.2 0 0 1 12 5z" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'title' => 'Тотално замрачење',
		'text'  => 'Перфектан сан дању и ноћу. Потпуно замрачење простора.',
	],
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><path d="M14 3l10 3.5v8c0 6.5-5 12-10 14C9 26.5 4 21 4 14.5v-8L14 3z" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'title' => 'Заштита од светлости',
		'text'  => 'Ублажава јачину дневне светлости. Више приватности.',
	],
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><ellipse cx="14" cy="15" rx="5" ry="7" stroke="#C5A059" stroke-width="1.6"/><path d="M14 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" stroke="#C5A059" stroke-width="1.4"/><path d="M9 11L5 8M19 11l4-3M9 15H4M19 15h5M9 20l-3 3M19 20l3 3" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round"/></svg>',
		'title' => 'Комарници',
		'text'  => 'Свеж ваздух без инсеката. 100% заштита.',
	],
];
?>
<section class="jg-velux-roletne" id="roletne">
	<div class="jg-velux-roletne__inner">
		<h2 class="jg-velux-roletne__heading">VELUX Ролетне и додаци</h2>
		<p class="jg-velux-roletne__sub">Комплетна заштита од топлоте, светлости и инсеката за ваше VELUX прозоре</p>
		<div class="jg-velux-roletne__photos">
			<div class="jg-velux-roletne__photo"><img src="<?= $t ?>/assets/images/velux/roletne-1.jpg" alt="VELUX паметно управљање" width="600" height="800" loading="lazy"></div>
			<div class="jg-velux-roletne__photo"><img src="<?= $t ?>/assets/images/velux/roletne-2.jpg" alt="VELUX спољашња ролетна" width="912" height="684" loading="lazy"></div>
			<div class="jg-velux-roletne__photo"><img src="<?= $t ?>/assets/images/velux/roletne-3.jpg" alt="VELUX комарник" width="912" height="684" loading="lazy"></div>
		</div>
		<div class="jg-velux-roletne__features">
			<?php foreach ( $features as $f ) : ?>
			<div class="jg-velux-roletne__feature">
				<div class="jg-velux-roletne__feature-icon"><?= $f['icon'] ?></div>
				<h3 class="jg-velux-roletne__feature-title"><?= esc_html( $f['title'] ) ?></h3>
				<p class="jg-velux-roletne__feature-text"><?= esc_html( $f['text'] ) ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="jg-velux-roletne__info">
			<div class="jg-velux-roletne__info-card">
				<h3>Спољашња заштита</h3>
				<p>Спољашња заштита спречава значајан део сунчевих зрака да дођу до стакла, чувајући пријатну температуру и спречавајући прегревање просторије.</p>
			</div>
			<div class="jg-velux-roletne__info-card">
				<h3>Унутрашне ролетне и комарници</h3>
				<p>Унутрашне кровне ролетне омогућавају потпуну контролу светлости, а комарници спречавају улазак инсеката уз омогућавање проветравања.</p>
			</div>
		</div>
		<div class="jg-velux-roletne__cta">
			<h3 class="jg-velux-roletne__cta-title">Погледајте комплетну понуду ролетни</h3>
			<p class="jg-velux-roletne__cta-text">Детаљне информације о свим моделима, димензијама и ценама. Цене од 3.901 RSD до 13.762 RSD.</p>
			<a class="jg-velux-roletne__cta-btn" href="<?= esc_url( get_permalink( get_page_by_path( 'velux-roletne' ) ) ?: '#' ) ?>">ПОГЛЕДАЈТЕ СВЕ РОЛЕТНЕ И ЦЕНЕ &rarr;</a>
		</div>
	</div>
</section>
