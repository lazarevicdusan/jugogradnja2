<?php
/**
 * Title: VELUX Pricing Komfor Plus
 * Slug: jugogradnja/velux-pricing-komfor-plus
 * Categories: jugogradnja
 */

$check_gold = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99984 18.3327C14.6022 18.3327 18.3332 14.6017 18.3332 9.99935C18.3332 5.39698 14.6022 1.66602 9.99984 1.66602C5.39746 1.66602 1.6665 5.39698 1.6665 9.99935C1.6665 14.6017 5.39746 18.3327 9.99984 18.3327Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 10.0007L9.16667 11.6673L12.5 8.33398" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$check_navy = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99984 18.3327C14.6022 18.3327 18.3332 14.6017 18.3332 9.99935C18.3332 5.39698 14.6022 1.66602 9.99984 1.66602C5.39746 1.66602 1.6665 5.39698 1.6665 9.99935C1.6665 14.6017 5.39746 18.3327 9.99984 18.3327Z" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 10.0007L9.16667 11.6673L12.5 8.33398" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>';

// variant a: white bg, navy header, grey cards, gold filled badge, gold features
// variant b: f9f9f9 bg, gold header, white cards, gold outlined badge, white+gold features
// variant c: white bg, navy header, grey cards, navy filled badge, gold-tint+navy-border features
$sections = [
	[
		'variant'  => 'a',
		'title'    => 'Комфор Плус прозори',
		'sub'      => 'Са сигурносним стаклом - Стакло 70 и Стакло 68',
		'note'     => 'Врхунски прозори са побољшаним карактеристикама стакла. Дрво (GGL) или полиуретан (GGU).',
		'feat_hd'  => 'Комфор Плус - Карактеристике',
		'features' => [
			'Побољшане карактеристике стакла',
			'Стакло 70 - стандардно смањење буке',
			'Стакло 68 - оптимална топлотна изолација',
			'Дрво (GGL) или полиуретан (GGU)',
			'Енергетски ефикасно',
			'Врхунски квалитет',
		],
		'cards' => [
			['code' => 'GGL 3070', 'type' => 'Стакло 70'],
			['code' => 'GGL 3068', 'type' => 'Стакло 68'],
			['code' => 'GGU 0070', 'type' => 'Стакло 70 - Полиуретан'],
			['code' => 'GGU 0068', 'type' => 'Стакло 68 - Полиуретан'],
		],
	],
	[
		'variant'  => 'b',
		'title'    => 'Комфор Плус панорамски прозори',
		'sub'      => 'Са сигурносним стаклом - Панорамско отварање',
		'note'     => 'Најграндиознији изглед. Са прозором отвореним имате непроцењив панорамски поглед на спољни свет.',
		'feat_hd'  => 'Панорамски - Карактеристике',
		'features' => [
			'Панорамско отварање горњег дела',
			'Максимални поглед на природу',
			'Стакло 70 и Стакло 68',
			'Дрво (GPL) или полиуретан (GPU)',
			'Идеално за поткровље',
			'Непроцењив панорамски поглед',
		],
		'cards' => [
			['code' => 'GPL 3070', 'type' => 'Стакло 70 - Дрво'],
			['code' => 'GPL 3068', 'type' => 'Стакло 68 - Дрво'],
			['code' => 'GPU 0070', 'type' => 'Стакло 70 - Полиуретан'],
			['code' => 'GPU 0068', 'type' => 'Стакло 68 - Полиуретан'],
		],
	],
	[
		'variant'  => 'c',
		'title'    => 'Комфор Плус електро прозори',
		'sub'      => 'Са сигурносним стаклом - Електрично управљање',
		'note'     => 'Савршено решење које омогућава удобност и комфор са даљинским управљањем.',
		'feat_hd'  => 'Електро прозори - Карактеристике',
		'features' => [
			'Електрично управљање',
			'Интегрисан сензор за кишу',
			'Даљинско управљање',
			'Компатибилно са VELUX ACTIVE',
			'Стакло 70 и Стакло 68',
			'Идеално за тешко доступне прозоре',
		],
		'cards' => [
			['code' => 'GGL 307021', 'type' => 'Електро - Стакло 70'],
			['code' => 'GGL 306821', 'type' => 'Електро - Стакло 68'],
			['code' => 'GGU 007021', 'type' => 'Електро - Стакло 70 - Полиуретан'],
			['code' => 'GGU 006821', 'type' => 'Електро - Стакло 68 - Полиуретан'],
		],
	],
];
?>
<?php foreach ( $sections as $s ) :
	$v = $s['variant'];
	$check = ( $v === 'c' ) ? $check_navy : $check_gold; ?>
<section class="jg-velux-kpp jg-velux-kpp--<?= $v ?>">
	<div class="jg-velux-kpp__inner">
		<div class="jg-velux-kpp__header">
			<p class="jg-velux-kpp__title"><?= esc_html( $s['title'] ) ?></p>
			<p class="jg-velux-kpp__sub"><?= esc_html( $s['sub'] ) ?></p>
			<p class="jg-velux-kpp__note"><?= esc_html( $s['note'] ) ?></p>
		</div>
		<div class="jg-velux-kpp__grid">
			<?php foreach ( $s['cards'] as $card ) : ?>
			<div class="jg-velux-kpp__card">
				<div class="jg-velux-kpp__card-badge">CK02 - UK08</div>
				<div class="jg-velux-kpp__card-info">
					<p class="jg-velux-kpp__card-code"><?= esc_html( $card['code'] ) ?></p>
					<p class="jg-velux-kpp__card-type"><?= esc_html( $card['type'] ) ?></p>
				</div>
				<p class="jg-velux-kpp__card-price">Цена на упит</p>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="jg-velux-kpp__features">
			<h3 class="jg-velux-kpp__feat-hd"><?= esc_html( $s['feat_hd'] ) ?></h3>
			<ul class="jg-velux-kpp__feat-list">
				<?php foreach ( $s['features'] as $feat ) : ?>
				<li class="jg-velux-kpp__feat-item">
					<?= $check ?>
					<span><?= esc_html( $feat ) ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
<?php endforeach; ?>
