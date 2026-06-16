<?php
/**
 * Title: VELUX Статистике
 * Slug: jugogradnja/velux-stats
 * Categories: jugogradnja
 */
$stats = [
	[
		// Award / medal ribbon
		'icon' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="13" r="6.5" stroke="#C5A059" stroke-width="1.8"/><path d="M10.5 18.5L8 28l8-4 8 4-2.5-9.5" stroke="#C5A059" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'number' => '75+',
		'label'  => 'Година искуства',
		'desc'   => 'VELUX је водећи светски произвођач кровних прозора',
	],
	[
		// Globe with horizontal and vertical arcs
		'icon' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="16" r="12" stroke="#C5A059" stroke-width="1.8"/><path d="M16 4v24M4 16h24" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round"/><ellipse cx="16" cy="16" rx="6" ry="12" stroke="#C5A059" stroke-width="1.4"/></svg>',
		'number' => '11',
		'label'  => 'Производних погона',
		'desc'   => 'У 11 држава широм света, директна продаја у 40 земаља',
	],
	[
		// Two people / group
		'icon' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="4.5" stroke="#C5A059" stroke-width="1.8"/><circle cx="22" cy="11" r="3.5" stroke="#C5A059" stroke-width="1.6"/><path d="M3 27c0-5 4-8.5 9-8.5s9 3.5 9 8.5" stroke="#C5A059" stroke-width="1.8" stroke-linecap="round"/><path d="M22 18.5c3.5.5 6 3 6 6.5" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'number' => '10.000+',
		'label'  => 'Запослених',
		'desc'   => 'Са седиштем компаније у Копенхагену (Данска)',
	],
	[
		// Clipboard / report with lines
		'icon' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect x="7" y="5" width="18" height="23" rx="2.5" stroke="#C5A059" stroke-width="1.8"/><path d="M12 5v-1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v1" stroke="#C5A059" stroke-width="1.6" stroke-linecap="round"/><line x1="11" y1="13" x2="21" y2="13" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round"/><line x1="11" y1="17" x2="21" y2="17" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round"/><line x1="11" y1="21" x2="17" y2="21" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round"/></svg>',
		'number' => '#1',
		'label'  => 'Глобални лидер',
		'desc'   => 'Један од најјачих брендова на тржишту грађевинских материјала',
	],
];
?>
<section class="jg-velux-stats">
	<div class="jg-velux-stats__inner">
		<h2 class="jg-velux-stats__heading">VELUX - Светски лидер у производњи кровних прозора</h2>
		<p class="jg-velux-stats__sub">Поседује производне погоне у 11 држава широм света, а директну продају врши у 40 земаља. Представља један од најјачих брендова на глобалном тржишту грађевинских материјала.</p>
		<div class="jg-velux-stats__grid">
			<?php foreach ( $stats as $s ) : ?>
			<div class="jg-velux-stats__card">
				<div class="jg-velux-stats__icon"><?= $s['icon'] ?></div>
				<div class="jg-velux-stats__number"><?= esc_html( $s['number'] ) ?></div>
				<div class="jg-velux-stats__label"><?= esc_html( $s['label'] ) ?></div>
				<p class="jg-velux-stats__desc"><?= esc_html( $s['desc'] ) ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
