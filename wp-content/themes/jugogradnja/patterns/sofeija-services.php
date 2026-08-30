<?php
/**
 * Title: Sofeija Услуге подршке
 * Slug: jugogradnja/sofeija-services
 * Categories: jugogradnja
 */
$cards = [
	[
		'icon'  => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" aria-hidden="true"><circle cx="32" cy="32" r="5" stroke="#212950" stroke-width="1.8"/><circle cx="32" cy="14" r="4" stroke="#212950" stroke-width="1.8"/><circle cx="16" cy="44" r="4" stroke="#212950" stroke-width="1.8"/><circle cx="48" cy="44" r="4" stroke="#212950" stroke-width="1.8"/><line x1="32" y1="27" x2="32" y2="18" stroke="#212950" stroke-width="1.8" stroke-linecap="round"/><line x1="27.5" y1="35.5" x2="19.5" y2="41" stroke="#212950" stroke-width="1.8" stroke-linecap="round"/><line x1="36.5" y1="35.5" x2="44.5" y2="41" stroke="#212950" stroke-width="1.8" stroke-linecap="round"/></svg>',
		'title' => 'Услуге дизајна',
		'text'  => 'Нудимо подршку која укључује стручне консултације, израду и оптимизацију цртежа као и техничко усклађивање.',
	],
	[
		'icon'  => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" aria-hidden="true"><line x1="20" y1="14" x2="20" y2="50" stroke="#212950" stroke-width="1.8" stroke-linecap="round"/><path d="M20 14h24l-7 11 7 11H20" stroke="#212950" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'title' => 'Подршка при куповини',
		'text'  => 'Искусни продајни представници задужени за специфичне земље пружају брзу и висококвалитетну подршку.',
	],
	[
		'icon'  => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" aria-hidden="true"><circle cx="32" cy="22" r="8" stroke="#212950" stroke-width="1.8"/><path d="M16 50c0-8.837 7.163-16 16-16s16 7.163 16 16" stroke="#212950" stroke-width="1.8" stroke-linecap="round"/></svg>',
		'title' => 'Услуге монтаже',
		'text'  => 'Монтажу врши наш професионални тим који ради по стриктним стандардима произвођача.',
	],
	[
		'icon'  => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" aria-hidden="true"><path d="M32 12l18 7v13c0 10-8 19-18 22-10-3-18-12-18-22V19l18-7z" stroke="#212950" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M24 32l6 6 10-11" stroke="#212950" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'title' => 'Контрола квалитета',
		'text'  => 'Праћење квалитета производа, чиме се осигурава да сваки комад намештаја испуњава највише стандарде издржљивости.',
	],
];
?>
<section class="jg-sofeija-svc">
	<div class="jg-sofeija-svc__inner">
		<?php foreach ( $cards as $card ) : ?>
		<div class="jg-sofeija-svc__card">
			<div class="jg-sofeija-svc__icon"><?= $card['icon'] ?></div>
			<h3 class="jg-sofeija-svc__title"><?= esc_html( $card['title'] ) ?></h3>
			<p class="jg-sofeija-svc__text"><?= esc_html( $card['text'] ) ?></p>
		</div>
		<?php endforeach; ?>
	</div>
</section>
