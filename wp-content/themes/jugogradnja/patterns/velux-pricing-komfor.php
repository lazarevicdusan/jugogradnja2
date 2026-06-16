<?php
/**
 * Title: VELUX Pricing Komfor
 * Slug: jugogradnja/velux-pricing-komfor
 * Categories: jugogradnja
 */

$check_icons = [
	'a' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99984 18.3327C14.6022 18.3327 18.3332 14.6017 18.3332 9.99935C18.3332 5.39698 14.6022 1.66602 9.99984 1.66602C5.39746 1.66602 1.6665 5.39698 1.6665 9.99935C1.6665 14.6017 5.39746 18.3327 9.99984 18.3327Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 10.0007L9.16667 11.6673L12.5 8.33398" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'b' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99984 18.3327C14.6022 18.3327 18.3332 14.6017 18.3332 9.99935C18.3332 5.39698 14.6022 1.66602 9.99984 1.66602C5.39746 1.66602 1.6665 5.39698 1.6665 9.99935C1.6665 14.6017 5.39746 18.3327 9.99984 18.3327Z" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 10.0007L9.16667 11.6673L12.5 8.33398" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'c' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99984 18.3327C14.6022 18.3327 18.3332 14.6017 18.3332 9.99935C18.3332 5.39698 14.6022 1.66602 9.99984 1.66602C5.39746 1.66602 1.6665 5.39698 1.6665 9.99935C1.6665 14.6017 5.39746 18.3327 9.99984 18.3327Z" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 10.0007L9.16667 11.6673L12.5 8.33398" stroke="#C5A059" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
	'd' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99984 18.3327C14.6022 18.3327 18.3332 14.6017 18.3332 9.99935C18.3332 5.39698 14.6022 1.66602 9.99984 1.66602C5.39746 1.66602 1.6665 5.39698 1.6665 9.99935C1.6665 14.6017 5.39746 18.3327 9.99984 18.3327Z" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 10.0007L9.16667 11.6673L12.5 8.33398" stroke="#253D86" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
];

// variant a = navy solid header, gold badge, gold features
// variant b = f9f9f9 bg, white bordered header, navy badge, navy features
$series = [
	[
		'variant'  => 'a',
		'title'    => 'Комфор панорамски прозори - GNL 1064',
		'sub'      => 'Природна боја дрвета - Панорамско отварање',
		'note'     => 'Непроцењив панорамски поглед на природу',
		'code'     => 'GNL 1064',
		'feat_hd'  => 'GNL 1064 - Карактеристике',
		'features' => [
			'Природна нордијска боровина',
			'Панорамско отварање горњег дела',
			'Максимални поглед на природу',
			'Идеално за поткровље',
			'Непроцењив панорамски поглед',
			'Врхунски квалитет',
		],
		'cards' => [
			['size' => '66x118cm', 'id' => 'FK06'],
			['size' => '78x98cm',  'id' => 'MK04'],
			['size' => '78x118cm', 'id' => 'MK06'],
			['size' => '78x140cm', 'id' => 'MK08'],
			['size' => '78x160cm', 'id' => 'MK10'],
			['size' => '94x140cm', 'id' => 'PK08'],
			['size' => '114x140cm','id' => 'SK08'],
		],
	],
	[
		'variant'  => 'b',
		'title'    => 'Комфор панорамски прозори - GNU 0064',
		'sub'      => 'Бели полиуретан - Панорамско отварање',
		'note'     => 'Без одржавања, идеално за просторије са већом влагом',
		'code'     => 'GNU 0064',
		'feat_hd'  => 'GNU 0064 - Карактеристике',
		'features' => [
			'Бели полиуретан - без одржавања',
			'Отпоран на влагу',
			'Панорамско отварање горњег дела',
			'Идеално за купатила и кухиње',
			'Не захтева лакирање',
			'Максимални поглед на природу',
		],
		'cards' => [
			['size' => '66x118cm', 'id' => 'FK06'],
			['size' => '78x98cm',  'id' => 'MK04'],
			['size' => '78x118cm', 'id' => 'MK06'],
			['size' => '78x140cm', 'id' => 'MK08'],
			['size' => '78x160cm', 'id' => 'MK10'],
			['size' => '94x140cm', 'id' => 'PK08'],
			['size' => '114x140cm','id' => 'SK08'],
		],
	],
	[
		'variant'  => 'c',
		'title'    => 'Комфор на даљинско управљање - GLL 106121 / 106130',
		'sub'      => 'Природна боја дрвета - Електро/соларно управљање',
		'note'     => 'Савршено решење за тешко доступне прозоре',
		'code'     => 'GLL 106121',
		'feat_hd'  => 'GLL 106121 / 106130 - Карактеристике',
		'features' => [
			'Природна нордијска боровина',
			'Електрично или соларно напајање',
			'Даљинско управљање',
			'Интегрисан сензор за кишу',
			'Компатибилно са VELUX ACTIVE',
			'Аутоматско затварање',
		],
		'cards' => [
			['size' => '55x78cm',  'id' => 'CK02'],
			['size' => '66x118cm', 'id' => 'FK06'],
			['size' => '78x98cm',  'id' => 'MK04'],
			['size' => '78x118cm', 'id' => 'MK06'],
			['size' => '78x140cm', 'id' => 'MK08'],
			['size' => '78x160cm', 'id' => 'MK10'],
			['size' => '94x140cm', 'id' => 'PK08'],
		],
	],
	[
		'variant'  => 'd',
		'title'    => 'Комфор на даљинско управљање - GLU 006121 / 006130',
		'sub'      => 'Бели полиуретан - Електро/соларно управљање',
		'note'     => 'Без одржавања, идеално за просторије са већом влагом',
		'code'     => 'GLU 006121',
		'feat_hd'  => 'GLU 006121 / 006130 - Карактеристике',
		'features' => [
			'Бели полиуретан - без одржавања',
			'Отпоран на влагу',
			'Електрично или соларно напајање',
			'Даљинско управљање',
			'Интегрисан сензор за кишу',
			'Компатибилно са VELUX ACTIVE',
		],
		'cards' => [
			['size' => '55x78cm',  'id' => 'CK02'],
			['size' => '66x118cm', 'id' => 'FK06'],
			['size' => '78x98cm',  'id' => 'MK04'],
			['size' => '78x118cm', 'id' => 'MK06'],
			['size' => '78x140cm', 'id' => 'MK08'],
			['size' => '78x160cm', 'id' => 'MK10'],
			['size' => '94x140cm', 'id' => 'PK08'],
		],
	],
];
?>
<?php foreach ( $series as $s ) :
	$v = $s['variant']; ?>
<section class="jg-velux-kpc jg-velux-kpc--<?= $v ?>">
	<div class="jg-velux-kpc__inner">
		<div class="jg-velux-kpc__group">
			<div class="jg-velux-kpc__group-header">
				<p class="jg-velux-kpc__group-title"><?= esc_html( $s['title'] ) ?></p>
				<p class="jg-velux-kpc__group-sub"><?= esc_html( $s['sub'] ) ?></p>
				<p class="jg-velux-kpc__group-note"><?= esc_html( $s['note'] ) ?></p>
			</div>
			<div class="jg-velux-kpc__grid">
				<?php foreach ( $s['cards'] as $card ) : ?>
				<div class="jg-velux-kpc__card">
					<div class="jg-velux-kpc__card-badge"><?= esc_html( $card['size'] ) ?></div>
					<p class="jg-velux-kpc__card-code"><?= esc_html( $s['code'] ) ?></p>
					<p class="jg-velux-kpc__card-id"><?= esc_html( $card['id'] ) ?></p>
					<p class="jg-velux-kpc__card-inquiry">Цена на упит</p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="jg-velux-kpc__features">
				<h3 class="jg-velux-kpc__features-heading"><?= esc_html( $s['feat_hd'] ) ?></h3>
				<ul class="jg-velux-kpc__features-list">
					<?php foreach ( $s['features'] as $feat ) : ?>
					<li class="jg-velux-kpc__features-item">
						<?= $check_icons[ $v ] ?>
						<span><?= esc_html( $feat ) ?></span>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php endforeach; ?>
