<?php
/**
 * Title: VELUX Кровни прозори
 * Slug: jugogradnja/velux-prozori
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

$products = [
	[
		'img'    => 'product-osnovni.jpg',
		'badge'  => 'ПОПУЛАРНО',
		'series' => 'GZL и GLU серије',
		'title'  => 'VELUX ОСНОВНИ - Двоструко стакло',
		'desc'   => 'Основни серија нуди приступачне и квалитетне прозоре без компромиса. Са свим битним функционалностима, избор горњег или доњег управљања, као и дрвених или прозора који не захтевају додатно одржавање.',
		'price'  => '37,424',
		'features' => ['Двоструко застакљење','Две опције: дрво или полиуретан','Природна боја дрвета - GZL серија','Бели полиуретан без одржавања - GLU серија','Опшивка EDW 2000 укључена','10 година гаранције'],
		'slug'   => 'velux-osnovni',
	],
	[
		'img'    => 'product-standard.jpg',
		'badge'  => 'ЕНЕРГЕТСКИ ЕФИКАСНО',
		'series' => 'GLL и GLU серије',
		'title'  => 'VELUX СТАНДАРД - Троструко стакло',
		'desc'   => 'Стандард серија идеална је за власнике поткровља који желе додатну енергетску ефикасност и комфор. Троструко стакло обезбеђује топлину и уштеду енергије, а прозори су лакирани безбојним лаком или полиуретаном.',
		'price'  => '49,826',
		'features' => ['Троструко застакљење','Две опције: дрво или полиуретан','Максимална енергетска ефикасност','Уштеда енергије до 30%','Опшивка EDW 2000 укључена','Најбоља дугорочна инвестиција'],
		'slug'   => 'velux-standard',
	],
	[
		'img'    => 'product-komfor.jpg',
		'badge'  => 'ПАМЕТНО РЕШЕЊЕ',
		'series' => 'GNL, GNU, GLL и GLU серије',
		'title'  => 'VELUX КОМФОР - Панорамски и даљински',
		'desc'   => 'Комфор прозори са панорамским отварањем или даљинским управљањем нуде беспрекоран удобност. Максималан поглед на природу или електро/соларно управљање према вашим потребама.',
		'price'  => 'На упит',
		'features' => ['Панорамско отварање','Даљинско управљање (електро/соларно)','Интегрисан сензор за кишу','Компатибилно са VELUX ACTIVE апликацијом','Идеално за тешко доступне прозоре','Дрво или полиуретан'],
		'slug'   => 'velux-komfor',
	],
	[
		'img'    => 'product-komfor-plus.jpg',
		'badge'  => 'ВРХУНСКО',
		'series' => 'GGL, GGU, GPL и GPU серије',
		'title'  => 'VELUX КОМФОР ПЛУС - Врхунски прозори',
		'desc'   => 'Врхунски кровни прозори са побољшаним карактеристикама стакла. Изаберите између обичних, панорамских или електро прозора са сигурносним стаклом. Савршена комбинација комфора и енергетске ефикасности.',
		'price'  => 'На упит',
		'features' => ['Три типа: обични, панорамски, електро','Побољшане карактеристике стакла','Стакло 70 и Стакло 68','Максимална енергетска ефикасност','Сигурносно стакло','Врхунски квалитет'],
		'slug'   => 'velux-komfor-plus',
	],
];
?>
<section class="jg-velux-prozori" id="prozori">
	<div class="jg-velux-prozori__inner">
		<h2 class="jg-velux-prozori__heading">VELUX кровни прозори</h2>
		<p class="jg-velux-prozori__sub">Стандард серија VELUX кровних прозора нуди приступачне и квалитетне прозоре без компромиса. Са свим битним функционалностима, ова серија вам омогућава избор горњег или доњег управљања, као и дрвених или прозора који не захтевају додатно одржавање.</p>
		<div class="jg-velux-prozori__grid">
			<?php foreach ( $products as $p ) : ?>
			<div class="jg-velux-prozori__card">
				<div class="jg-velux-prozori__card-img">
					<img src="<?= $t ?>/assets/images/velux/<?= esc_attr( $p['img'] ) ?>" alt="<?= esc_attr( $p['title'] ) ?>" width="800" height="540" loading="lazy">
					<span class="jg-velux-prozori__card-badge<?= $p['badge'] === 'ЕНЕРГЕТСКИ ЕФИКАСНО' ? ' jg-velux-prozori__card-badge--green' : '' ?>"><?= esc_html( $p['badge'] ) ?></span>
					<div class="jg-velux-prozori__card-overlay">
						<p class="jg-velux-prozori__card-subtitle"><?= esc_html( $p['series'] ) ?></p>
						<h3 class="jg-velux-prozori__card-title"><?= esc_html( $p['title'] ) ?></h3>
					</div>
				</div>
				<div class="jg-velux-prozori__card-body">
					<p class="jg-velux-prozori__card-desc"><?= esc_html( $p['desc'] ) ?></p>
					<div class="jg-velux-prozori__price-wrap">
						<?php if ( $p['price'] === 'На упит' ) : ?>
						<span class="jg-velux-prozori__price jg-velux-prozori__price--inquiry">На упит</span>
						<span class="jg-velux-prozori__price-unit">RSD по прозору</span>
						<?php else : ?>
						<span class="jg-velux-prozori__price-label">Цена од</span>
						<span class="jg-velux-prozori__price"><?= esc_html( $p['price'] ) ?></span>
						<span class="jg-velux-prozori__price-unit">RSD по прозору</span>
						<?php endif; ?>
					</div>
					<ul class="jg-velux-prozori__features">
						<?php foreach ( $p['features'] as $f ) : ?>
						<li><?= esc_html( $f ) ?></li>
						<?php endforeach; ?>
					</ul>
					<a class="jg-velux-prozori__cta" href="<?= esc_url( get_permalink( get_page_by_path( $p['slug'] ) ) ?: '#' ) ?>">ПОГЛЕДАЈТЕ ДЕТАЉЕ И ЦЕНЕ &rarr;</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="jg-velux-prozori__trust">
			<div class="jg-velux-prozori__trust-item jg-velux-prozori__trust-item--navy">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><path d="M16 3l3.1 9.6H29l-8.2 5.9 3.1 9.6L16 22.1l-7.9 5.9 3.1-9.6L3 12.6h9.9L16 3z" stroke="#C5A059" stroke-width="1.6" stroke-linejoin="round"/></svg>
				<div><strong>10 година</strong><span>Гаранција на све прозоре</span></div>
			</div>
			<div class="jg-velux-prozori__trust-item jg-velux-prozori__trust-item--gold">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="16" r="13" stroke="rgba(255,255,255,0.9)" stroke-width="1.6"/><path d="M10 16l4 4 8-8" stroke="rgba(255,255,255,0.9)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
				<div><strong>Сертификовани мајстори</strong><span>Повезујемо вас са професионалцима</span></div>
			</div>
			<div class="jg-velux-prozori__trust-item jg-velux-prozori__trust-item--white">
				<div><strong>+381 64 811 58 68</strong><span>Позовите за савет</span></div>
			</div>
		</div>
		<div class="jg-velux-prozori__promo-wrap">
			<div class="jg-velux-prozori__cta-banner">
				<p class="jg-velux-prozori__cta-banner-text">Искористите попусте на цео асортиман VELUX производа!</p>
			</div>
			<div class="jg-velux-prozori__guide">
				<p>Нисте сигурни који прозор да изаберете? Погледајте наш детаљан водич за куповину или позовите 064/811-58-68</p>
				<a class="jg-velux-prozori__guide-btn" href="<?= esc_url( get_permalink( get_page_by_path( 'velux-vodic' ) ) ?: '#' ) ?>">ВОДИЧ ЗА КУПОВИНУ &rarr;</a>
			</div>
		</div>
	</div>
</section>
