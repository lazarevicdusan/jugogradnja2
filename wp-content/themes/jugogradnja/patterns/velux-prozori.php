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
		'badge'  => __( 'ПОПУЛАРНО', 'jugogradnja' ),
		'series' => __( 'GZL и GLU серије', 'jugogradnja' ),
		'title'  => __( 'VELUX ОСНОВНИ - Двоструко стакло', 'jugogradnja' ),
		'desc'   => __( 'Основни серија нуди приступачне и квалитетне прозоре без компромиса. Са свим битним функционалностима, избор горњег или доњег управљања, као и дрвених или прозора који не захтевају додатно одржавање.', 'jugogradnja' ),
		'price'  => '37,424',
		'features' => [ __( 'Двоструко застакљење', 'jugogradnja' ), __( 'Две опције: дрво или полиуретан', 'jugogradnja' ), __( 'Природна боја дрвета - GZL серија', 'jugogradnja' ), __( 'Бели полиуретан без одржавања - GLU серија', 'jugogradnja' ), __( 'Опшивка EDW 2000 укључена', 'jugogradnja' ), __( '10 година гаранције', 'jugogradnja' ) ],
		'slug'   => 'velux-osnovni',
	],
	[
		'img'    => 'product-standard.jpg',
		'badge'  => __( 'ЕНЕРГЕТСКИ ЕФИКАСНО', 'jugogradnja' ),
		'series' => __( 'GLL и GLU серије', 'jugogradnja' ),
		'title'  => __( 'VELUX СТАНДАРД - Троструко стакло', 'jugogradnja' ),
		'desc'   => __( 'Стандард серија идеална је за власнике поткровља који желе додатну енергетску ефикасност и комфор. Троструко стакло обезбеђује топлину и уштеду енергије, а прозори су лакирани безбојним лаком или полиуретаном.', 'jugogradnja' ),
		'price'  => '49,826',
		'features' => [ __( 'Троструко застакљење', 'jugogradnja' ), __( 'Две опције: дрво или полиуретан', 'jugogradnja' ), __( 'Максимална енергетска ефикасност', 'jugogradnja' ), __( 'Уштеда енергије до 30%', 'jugogradnja' ), __( 'Опшивка EDW 2000 укључена', 'jugogradnja' ), __( 'Најбоља дугорочна инвестиција', 'jugogradnja' ) ],
		'slug'   => 'velux-standard',
	],
	[
		'img'    => 'product-komfor.jpg',
		'badge'  => __( 'ПАМЕТНО РЕШЕЊЕ', 'jugogradnja' ),
		'series' => __( 'GNL, GNU, GLL и GLU серије', 'jugogradnja' ),
		'title'  => __( 'VELUX КОМФОР - Панорамски и даљински', 'jugogradnja' ),
		'desc'   => __( 'Комфор прозори са панорамским отварањем или даљинским управљањем нуде беспрекоран удобност. Максималан поглед на природу или електро/соларно управљање према вашим потребама.', 'jugogradnja' ),
		'price'  => __( 'На упит', 'jugogradnja' ),
		'features' => [ __( 'Панорамско отварање', 'jugogradnja' ), __( 'Даљинско управљање (електро/соларно)', 'jugogradnja' ), __( 'Интегрисан сензор за кишу', 'jugogradnja' ), __( 'Компатибилно са VELUX ACTIVE апликацијом', 'jugogradnja' ), __( 'Идеално за тешко доступне прозоре', 'jugogradnja' ), __( 'Дрво или полиуретан', 'jugogradnja' ) ],
		'slug'   => 'velux-komfor',
	],
	[
		'img'    => 'product-komfor-plus.jpg',
		'badge'  => __( 'ВРХУНСКО', 'jugogradnja' ),
		'series' => __( 'GGL, GGU, GPL и GPU серије', 'jugogradnja' ),
		'title'  => __( 'VELUX КОМФОР ПЛУС - Врхунски прозори', 'jugogradnja' ),
		'desc'   => __( 'Врхунски кровни прозори са побољшаним карактеристикама стакла. Изаберите између обичних, панорамских или електро прозора са сигурносним стаклом. Савршена комбинација комфора и енергетске ефикасности.', 'jugogradnja' ),
		'price'  => __( 'На упит', 'jugogradnja' ),
		'features' => [ __( 'Три типа: обични, панорамски, електро', 'jugogradnja' ), __( 'Побољшане карактеристике стакла', 'jugogradnja' ), __( 'Стакло 70 и Стакло 68', 'jugogradnja' ), __( 'Максимална енергетска ефикасност', 'jugogradnja' ), __( 'Сигурносно стакло', 'jugogradnja' ), __( 'Врхунски квалитет', 'jugogradnja' ) ],
		'slug'   => 'velux-komfor-plus',
	],
];
?>
<section class="jg-velux-prozori" id="prozori">
	<div class="jg-velux-prozori__inner">
		<h2 class="jg-velux-prozori__heading"><?= esc_html__( 'VELUX кровни прозори', 'jugogradnja' ) ?></h2>
		<p class="jg-velux-prozori__sub"><?= esc_html__( 'Стандард серија VELUX кровних прозора нуди приступачне и квалитетне прозоре без компромиса. Са свим битним функционалностима, ова серија вам омогућава избор горњег или доњег управљања, као и дрвених или прозора који не захтевају додатно одржавање.', 'jugogradnja' ) ?></p>
		<div class="jg-velux-prozori__grid">
			<?php foreach ( $products as $p ) : ?>
			<div class="jg-velux-prozori__card">
				<div class="jg-velux-prozori__card-img">
					<img src="<?= $t ?>/assets/images/velux/<?= esc_attr( $p['img'] ) ?>" alt="<?= esc_attr( $p['title'] ) ?>" width="800" height="540" loading="lazy">
					<span class="jg-velux-prozori__card-badge<?= $p['badge'] === __( 'ЕНЕРГЕТСКИ ЕФИКАСНО', 'jugogradnja' ) ? ' jg-velux-prozori__card-badge--green' : '' ?>"><?= esc_html( $p['badge'] ) ?></span>
					<div class="jg-velux-prozori__card-overlay">
						<p class="jg-velux-prozori__card-subtitle"><?= esc_html( $p['series'] ) ?></p>
						<h3 class="jg-velux-prozori__card-title"><?= esc_html( $p['title'] ) ?></h3>
					</div>
				</div>
				<div class="jg-velux-prozori__card-body">
					<p class="jg-velux-prozori__card-desc"><?= esc_html( $p['desc'] ) ?></p>
					<div class="jg-velux-prozori__price-wrap">
						<?php if ( $p['price'] === __( 'На упит', 'jugogradnja' ) ) : ?>
						<span class="jg-velux-prozori__price jg-velux-prozori__price--inquiry"><?= esc_html__( 'На упит', 'jugogradnja' ) ?></span>
						<span class="jg-velux-prozori__price-unit">RSD <?= esc_html__( 'по прозору', 'jugogradnja' ) ?></span>
						<?php else : ?>
						<span class="jg-velux-prozori__price-label"><?= esc_html__( 'Цена од', 'jugogradnja' ) ?></span>
						<span class="jg-velux-prozori__price"><?= esc_html( $p['price'] ) ?></span>
						<span class="jg-velux-prozori__price-unit">RSD <?= esc_html__( 'по прозору', 'jugogradnja' ) ?></span>
						<?php endif; ?>
					</div>
					<ul class="jg-velux-prozori__features">
						<?php foreach ( $p['features'] as $f ) : ?>
						<li><?= esc_html( $f ) ?></li>
						<?php endforeach; ?>
					</ul>
					<a class="jg-velux-prozori__cta" href="<?= esc_url( jugogradnja_permalink_by_slug( $p['slug'] ) ) ?>"><?= esc_html__( 'ПОГЛЕДАЈТЕ ДЕТАЉЕ И ЦЕНЕ', 'jugogradnja' ) ?> &rarr;</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="jg-velux-prozori__trust">
			<div class="jg-velux-prozori__trust-item jg-velux-prozori__trust-item--navy">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><path d="M16 3l3.1 9.6H29l-8.2 5.9 3.1 9.6L16 22.1l-7.9 5.9 3.1-9.6L3 12.6h9.9L16 3z" stroke="#C5A059" stroke-width="1.6" stroke-linejoin="round"/></svg>
				<div><strong><?= esc_html__( '10 година', 'jugogradnja' ) ?></strong><span><?= esc_html__( 'Гаранција на све прозоре', 'jugogradnja' ) ?></span></div>
			</div>
			<div class="jg-velux-prozori__trust-item jg-velux-prozori__trust-item--gold">
				<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><circle cx="16" cy="16" r="13" stroke="rgba(255,255,255,0.9)" stroke-width="1.6"/><path d="M10 16l4 4 8-8" stroke="rgba(255,255,255,0.9)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
				<div><strong><?= esc_html__( 'Сертификовани мајстори', 'jugogradnja' ) ?></strong><span><?= esc_html__( 'Повезујемо вас са професионалцима', 'jugogradnja' ) ?></span></div>
			</div>
			<div class="jg-velux-prozori__trust-item jg-velux-prozori__trust-item--white">
				<div><strong>+381 64 811 58 68</strong><span><?= esc_html__( 'Позовите за савет', 'jugogradnja' ) ?></span></div>
			</div>
		</div>
		<div class="jg-velux-prozori__promo-wrap">
			<div class="jg-velux-prozori__cta-banner">
				<p class="jg-velux-prozori__cta-banner-text"><?= esc_html__( 'Искористите попусте на цео асортиман VELUX производа!', 'jugogradnja' ) ?></p>
			</div>
			<div class="jg-velux-prozori__guide">
				<p><?= esc_html__( 'Нисте сигурни који прозор да изаберете? Погледајте наш детаљан водич за куповину или позовите 064/811-58-68', 'jugogradnja' ) ?></p>
				<a class="jg-velux-prozori__guide-btn" href="<?= esc_url( jugogradnja_permalink_by_slug( 'velux-vodic' ) ) ?>"><?= esc_html__( 'ВОДИЧ ЗА КУПОВИНУ', 'jugogradnja' ) ?> &rarr;</a>
			</div>
		</div>
	</div>
</section>
