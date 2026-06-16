<?php
/**
 * Title: VELUX Subpage Hero
 * Slug: jugogradnja/velux-subpage-hero
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

// Derive slug from the request URI — reliable at any WP execution stage
$uri_path  = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$segments  = array_values( array_filter( explode( '/', $uri_path ) ) );
$page_slug = end( $segments ) ?: '';

$configs = [
	'velux-osnovni' => [
		'badge' => 'ДВОСТРУКО СТАКЛО',
		'title' => 'VELUX ОСНОВНИ',
		'sub'   => 'Кровни прозори',
		'desc'  => 'Основни серија нуди приступачне прозоре без компромиса по питању квалитета. Изаберите између природног дрвета или белог полиуретана.',
	],
	'velux-standard' => [
		'badge' => 'ТРОСТРУКО СТАКЛО - ЕНЕРГЕТСКИ ЕФИКАСНО',
		'title' => 'VELUX СТАНДАРД',
		'sub'   => 'Кровни прозори',
		'desc'  => 'Стандард серија је идеална за власнике поткровља који су спремни да инвестирају у додатну енергетску ефикасност и комфор.',
	],
	'velux-komfor' => [
		'badge' => 'ПАМЕТНА РЕШЕЊА',
		'title' => 'VELUX КОМФОР',
		'sub'   => 'Панорамски и даљински прозори',
		'desc'  => 'Панорамски прозори и прозори на даљинско управљање за максималну удобност и поглед на природу.',
	],
	'velux-komfor-plus' => [
		'badge' => 'ВРХУНСКИ КВАЛИТЕТ',
		'title' => 'VELUX КОМФОР ПЛУС',
		'sub'   => 'Савршена комбинација комфора',
		'desc'  => 'Комфор Плус нуди прозоре са побољшаним карактеристикама стакла у различитим варијантама. Изаберите обичне, панорамске или електро прозоре са сигурносним стаклом.',
	],
	'velux-roletne' => [
		'badge' => 'ЗАШТИТА И УДОБНОСТ',
		'title' => 'VELUX РОЛЕТНЕ',
		'sub'   => 'Спољне и унутрашње ролетне и комарници',
		'desc'  => 'Контролишите светлост, топлоту и приватност у вашем поткровљу. Широк избор спољних тенди, унутрашњих ролетни и комарника за све VELUX кровне прозоре.',
	],
	'velux-vodic' => [
		'badge' => 'ВОДИЧ ЗА КУПОВИНУ',
		'title' => 'Водич за куповину VELUX кровних прозора',
		'sub'   => 'Корак по корак до правог прозора',
		'desc'  => 'Пет једноставних корака koji ће вам помоћи да изаберете и купите VELUX кровни прозор koji savršeno одговара вашем поткровљу.',
	],
];

$cfg = $configs[ $page_slug ] ?? $configs['velux-osnovni'];
?>
<section class="jg-velux-sp-hero">
	<div class="jg-velux-sp-hero__bg" aria-hidden="true">
		<img src="<?= $t ?>/assets/images/velux/subpage-hero-bg.jpg" alt="" width="1919" height="616">
		<div class="jg-velux-sp-hero__overlay"></div>
	</div>
	<div class="jg-velux-sp-hero__inner">
		<a class="jg-velux-sp-hero__back" href="<?= esc_url( get_permalink( get_page_by_path('velux') ) ?: '#' ) ?>">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M12 4l-6 6 6 6" stroke="rgba(255,255,255,0.8)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
			Назад на VELUX
		</a>
		<img class="jg-velux-sp-hero__logo" src="<?= $t ?>/assets/images/velux/velux-logo.png" alt="VELUX" width="200" height="67">
		<div class="jg-velux-sp-hero__badge"><?= esc_html( $cfg['badge'] ) ?></div>
		<div class="jg-velux-sp-hero__titles">
			<h1 class="jg-velux-sp-hero__title"><?= esc_html( $cfg['title'] ) ?></h1>
			<span class="jg-velux-sp-hero__subtitle"><?= esc_html( $cfg['sub'] ) ?></span>
		</div>
		<p class="jg-velux-sp-hero__desc"><?= esc_html( $cfg['desc'] ) ?></p>
	</div>
</section>
