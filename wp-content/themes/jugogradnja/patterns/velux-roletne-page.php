<?php
/**
 * Title: VELUX Roletne Page
 * Slug: jugogradnja/velux-roletne-page
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

$products = [
	[
		'icon'   => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="5" stroke="#fff" stroke-width="2"/><path d="M14 2v3M14 23v3M2 14h3M23 14h3M5.6 5.6l2.1 2.1M20.3 20.3l2.1 2.1M5.6 22.4l2.1-2.1M20.3 7.7l2.1-2.1" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>',
		'badge'  => 'MHL',
		'title'  => 'СПОЉНА ТЕНДА - ЗАШТИТА ОД ТОПЛОТЕ',
		'desc'   => 'Ефективна заштита од топлоте. Смањење загревања до 76%.Једноставно руковање из просторије.',
		'note'   => 'Покрива све дужине',
		'prices' => [
			['code' => 'MHL CK00', 'size' => '55×00cm', 'price' => '7,556'],
			['code' => 'MHL FK00', 'size' => '66×00cm', 'price' => '8,520'],
			['code' => 'MHL MK00', 'size' => '78×00cm', 'price' => '9,094'],
		],
		'photos' => ['roletne-1.jpg', 'roletne-2.jpg', 'roletne-3.jpg'],
	],
	[
		'icon'   => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><rect x="4" y="4" width="20" height="20" rx="3" stroke="#fff" stroke-width="2"/><line x1="4" y1="10" x2="24" y2="10" stroke="#fff" stroke-width="1.5"/><line x1="4" y1="16" x2="24" y2="16" stroke="#fff" stroke-width="1.5"/><line x1="4" y1="22" x2="24" y2="22" stroke="#fff" stroke-width="1.5"/></svg>',
		'badge'  => 'DKL',
		'title'  => 'УНУТРАШЊА РОЛЕТНА - ТОТАЛНО ЗАМРАЧЕЊЕ',
		'desc'   => 'Перфектан сан дању и ноћу. Потпуно замрачење.Једноставан дизајн са изузетно узаним вођицама.',
		'note'   => 'Доступне димензије (беж боја)',
		'prices' => [
			['code' => 'DKL CK02', 'size' => '55×78cm',  'price' => '7,472'],
			['code' => 'DKL FK06', 'size' => '66×118cm', 'price' => '9,094'],
			['code' => 'DKL MK06', 'size' => '78×118cm', 'price' => '9,851'],
		],
		'photos' => ['roletne-1.jpg', 'roletne-2.jpg', 'roletne-3.jpg'],
	],
	[
		'icon'   => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="10" stroke="#fff" stroke-width="2"/><path d="M9 14c2-5 8-5 10 0" stroke="#fff" stroke-width="2" stroke-linecap="round"/><line x1="14" y1="4" x2="14" y2="8" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>',
		'badge'  => 'RFL',
		'title'  => 'УНУТРАШЊА РОЛЕТНА - ЗАШТИТА ОД СВЕТЛОСТИ',
		'desc'   => 'Ублажава јачину дневне светлости. Више приватности и контрола светлости.Једноставан дизајн са изузетно узаним вођицама.',
		'note'   => 'Доступне димензије (беж боја)',
		'prices' => [
			['code' => 'RFL CK02', 'size' => '55×78cm',  'price' => '6,706'],
			['code' => 'RFL FK06', 'size' => '66×118cm', 'price' => '9,002'],
			['code' => 'RFL MK06', 'size' => '78×118cm', 'price' => '9,512'],
		],
		'photos' => ['roletne-1.jpg', 'roletne-2.jpg', 'roletne-3.jpg'],
	],
	[
		'icon'   => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><rect x="3" y="3" width="22" height="22" rx="3" stroke="#fff" stroke-width="2"/><line x1="3" y1="9" x2="25" y2="9" stroke="#fff" stroke-width="1.2"/><line x1="3" y1="15" x2="25" y2="15" stroke="#fff" stroke-width="1.2"/><line x1="3" y1="21" x2="25" y2="21" stroke="#fff" stroke-width="1.2"/><line x1="9" y1="3" x2="9" y2="25" stroke="#fff" stroke-width="1.2"/><line x1="15" y1="3" x2="15" y2="25" stroke="#fff" stroke-width="1.2"/><line x1="21" y1="3" x2="21" y2="25" stroke="#fff" stroke-width="1.2"/></svg>',
		'badge'  => 'ZIL',
		'title'  => 'КОМАРНИК - ЗАШТИТА ОД ИНСЕКАТА',
		'desc'   => 'Свеж ваздух без инсеката. 100% заштита од инсеката. Може се одложити када се не користи.',
		'note'   => 'Доступне димензије',
		'prices' => [
			['code' => 'ZIL FK06 – FK08', 'size' => '(66×118, 66×140)', 'price' => '13,762'],
			['code' => 'ZIL MK04 – MK06', 'size' => '(78×98, 78×118)',  'price' => '13,762'],
		],
		'photos' => ['roletne-1.jpg', 'roletne-2.jpg', 'roletne-3.jpg'],
	],
];
?>

<!-- Gallery -->
<section class="jg-velux-rp-gallery">
	<div class="jg-velux-rp-gallery__inner">
		<h2 class="jg-velux-rp-gallery__title">Галерија производа</h2>
		<div class="jg-velux-rp-gallery__grid">
			<img src="<?= $t ?>/assets/images/velux/roletne-1.jpg" alt="VELUX ролетне" width="600" height="400" loading="lazy">
			<img src="<?= $t ?>/assets/images/velux/roletne-2.jpg" alt="VELUX ролетне уградња" width="600" height="400" loading="lazy">
			<img src="<?= $t ?>/assets/images/velux/roletne-3.jpg" alt="VELUX ролетне унутрашња" width="600" height="400" loading="lazy">
		</div>
	</div>
</section>

<!-- Intro two-col -->
<section class="jg-velux-rp-intro">
	<div class="jg-velux-rp-intro__inner">
		<div class="jg-velux-rp-intro__card">
			<h3 class="jg-velux-rp-intro__title">Спољашња заштита</h3>
			<p>Спољашња заштита спречава значајну количину сунчевих зрака да дођу до стакла прозора. Овакав вид заштите од спољашње светлости помаже у одржавању пријатне температуре током дана и спречава прегревање.</p>
		</div>
		<div class="jg-velux-rp-intro__card">
			<h3 class="jg-velux-rp-intro__title">Унутрашња ролетна</h3>
			<p>Унутрашње кровне ролетне нуде потпуну контролу светлости која улази кроз кровне прозоре. Додавањем комарника спречавате улазак инсеката, а истовремено омогућавате проветравање просторије.</p>
		</div>
	</div>
</section>

<!-- Product sections -->
<section class="jg-velux-rp-products">
	<div class="jg-velux-rp-products__inner">
		<?php foreach ( $products as $p ) : ?>
		<div class="jg-velux-rp-card">
			<div class="jg-velux-rp-card__header">
				<div class="jg-velux-rp-card__hrow">
					<div class="jg-velux-rp-card__icon-box"><?= $p['icon'] ?></div>
					<div class="jg-velux-rp-card__htxt">
						<h2 class="jg-velux-rp-card__title"><?= esc_html( $p['title'] ) ?></h2>
						<p class="jg-velux-rp-card__code">Шифра: <?= esc_html( $p['badge'] ) ?></p>
					</div>
				</div>
				<p class="jg-velux-rp-card__desc"><?= esc_html( $p['desc'] ) ?></p>
			</div>
			<div class="jg-velux-rp-card__prices">
				<div class="jg-velux-rp-card__price-grid">
					<?php foreach ( $p['prices'] as $pr ) : ?>
					<div class="jg-velux-rp-card__price-item">
						<div class="jg-velux-rp-card__price-badge"><?= esc_html( $pr['code'] ) ?></div>
						<p class="jg-velux-rp-card__price-size"><?= esc_html( $pr['size'] ) ?></p>
						<p class="jg-velux-rp-card__price-amount"><?= esc_html( $pr['price'] ) ?></p>
						<p class="jg-velux-rp-card__price-currency">RSD</p>
					</div>
					<?php endforeach; ?>
				</div>
				<p class="jg-velux-rp-card__note"><em><?= esc_html( $p['note'] ) ?></em></p>
			</div>
			<div class="jg-velux-rp-card__photos">
				<?php foreach ( $p['photos'] as $ph ) : ?>
				<div class="jg-velux-rp-card__photo">
					<img src="<?= $t ?>/assets/images/velux/<?= esc_attr( $ph ) ?>" alt="" width="400" height="221" loading="lazy">
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- Додатне ролетне са позиционирањем -->
<section class="jg-velux-rp-addons">
	<div class="jg-velux-rp-addons__inner">
		<h2 class="jg-velux-rp-addons__title">Додатне ролетне са позиционирањем</h2>
		<div class="jg-velux-rp-addons__grid">
			<div class="jg-velux-rp-addons__card">
				<h3 class="jg-velux-rp-addons__card-title">RHL - УБЛАЖАВАЊЕ СВЕТЛОСТИ</h3>
				<p class="jg-velux-rp-addons__card-desc">Усмеравају долазећу светлост. Позиционирање у три положаја уз помоћ кукица. Боје: беж и тегет</p>
				<div class="jg-velux-rp-addons__rows">
					<div class="jg-velux-rp-addons__row">
						<span class="jg-velux-rp-addons__left"><strong>RHL CK00</strong><span class="jg-velux-rp-addons__sz">55×00cm</span></span>
						<span class="jg-velux-rp-addons__price">3,901 RSD</span>
					</div>
					<div class="jg-velux-rp-addons__row">
						<span class="jg-velux-rp-addons__left"><strong>RHL FK00</strong><span class="jg-velux-rp-addons__sz">66×00cm</span></span>
						<span class="jg-velux-rp-addons__price">4,582 RSD</span>
					</div>
					<div class="jg-velux-rp-addons__row">
						<span class="jg-velux-rp-addons__left"><strong>RHL MK00</strong><span class="jg-velux-rp-addons__sz">78×00cm</span></span>
						<span class="jg-velux-rp-addons__price">4,921 RSD</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
