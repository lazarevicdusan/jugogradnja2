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
		'title' => __( 'Спољна заштита', 'jugogradnja' ),
		'text'  => __( 'Ефективна заштита од топлоте. Смањење загревања до 76%.', 'jugogradnja' ),
	],
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><path d="M12 5C8 6.5 5 10 5 14.5A9.5 9.5 0 0 0 14.5 24c4.5 0 8-3 9.5-7-1 .5-2 .7-3 .7A8.2 8.2 0 0 1 12 5z" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'title' => __( 'Тотално замрачење', 'jugogradnja' ),
		'text'  => __( 'Перфектан сан дању и ноћу. Потпуно замрачење простора.', 'jugogradnja' ),
	],
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><path d="M14 3l10 3.5v8c0 6.5-5 12-10 14C9 26.5 4 21 4 14.5v-8L14 3z" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'title' => __( 'Заштита од светлости', 'jugogradnja' ),
		'text'  => __( 'Ублажава јачину дневне светлости. Више приватности.', 'jugogradnja' ),
	],
	[
		'icon'  => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true"><ellipse cx="14" cy="15" rx="5" ry="7" stroke="#C5A059" stroke-width="1.6"/><path d="M14 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" stroke="#C5A059" stroke-width="1.4"/><path d="M9 11L5 8M19 11l4-3M9 15H4M19 15h5M9 20l-3 3M19 20l3 3" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round"/></svg>',
		'title' => __( 'Комарници', 'jugogradnja' ),
		'text'  => __( 'Свеж ваздух без инсеката. 100% заштита.', 'jugogradnja' ),
	],
];
?>
<section class="jg-velux-roletne" id="roletne">
	<div class="jg-velux-roletne__inner">
		<h2 class="jg-velux-roletne__heading"><?= esc_html__( 'VELUX Ролетне и додаци', 'jugogradnja' ) ?></h2>
		<p class="jg-velux-roletne__sub"><?= esc_html__( 'Комплетна заштита од топлоте, светлости и инсеката за ваше VELUX прозоре', 'jugogradnja' ) ?></p>
		<div class="jg-velux-roletne__photos">
			<div class="jg-velux-roletne__photo"><img src="<?= $t ?>/assets/images/velux/roletne-1.jpg" alt="<?= esc_attr__( 'VELUX паметно управљање', 'jugogradnja' ) ?>" width="600" height="800" loading="lazy"></div>
			<div class="jg-velux-roletne__photo"><img src="<?= $t ?>/assets/images/velux/roletne-2.jpg" alt="<?= esc_attr__( 'VELUX спољашња ролетна', 'jugogradnja' ) ?>" width="912" height="684" loading="lazy"></div>
			<div class="jg-velux-roletne__photo"><img src="<?= $t ?>/assets/images/velux/roletne-3.jpg" alt="<?= esc_attr__( 'VELUX комарник', 'jugogradnja' ) ?>" width="912" height="684" loading="lazy"></div>
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
				<h3><?= esc_html__( 'Спољашња заштита', 'jugogradnja' ) ?></h3>
				<p><?= esc_html__( 'Спољашња заштита спречава значајан део сунчевих зрака да дођу до стакла, чувајући пријатну температуру и спречавајући прегревање просторије.', 'jugogradnja' ) ?></p>
			</div>
			<div class="jg-velux-roletne__info-card">
				<h3><?= esc_html__( 'Унутрашне ролетне и комарници', 'jugogradnja' ) ?></h3>
				<p><?= esc_html__( 'Унутрашне кровне ролетне омогућавају потпуну контролу светлости, а комарници спречавају улазак инсеката уз омогућавање проветравања.', 'jugogradnja' ) ?></p>
			</div>
		</div>
		<div class="jg-velux-roletne__cta">
			<h3 class="jg-velux-roletne__cta-title"><?= esc_html__( 'Погледајте комплетну понуду ролетни', 'jugogradnja' ) ?></h3>
			<p class="jg-velux-roletne__cta-text"><?= esc_html__( 'Детаљне информације о свим моделима, димензијама и ценама. Цене од 3.901 RSD до 13.762 RSD.', 'jugogradnja' ) ?></p>
			<a class="jg-velux-roletne__cta-btn" href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-roletne' ) ) ?>"><?= esc_html__( 'ПОГЛЕДАЈТЕ СВЕ РОЛЕТНЕ И ЦЕНЕ', 'jugogradnja' ) ?> &rarr;</a>
		</div>
	</div>
</section>
