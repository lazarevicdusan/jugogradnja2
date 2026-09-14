<?php
/**
 * Title: VELUX Subpage Hero
 * Slug: jugogradnja/velux-subpage-hero
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

// Derive slug from the request URI - reliable at any WP execution stage
$uri_path  = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$segments  = array_values( array_filter( explode( '/', $uri_path ) ) );
$page_slug = end( $segments ) ?: '';

$configs = [
	'velux-osnovni' => [
		'badge' => __( 'ДВОСТРУКО СТАКЛО', 'jugogradnja' ),
		'title' => __( 'VELUX ОСНОВНИ', 'jugogradnja' ),
		'sub'   => __( 'Кровни прозори', 'jugogradnja' ),
		'desc'  => __( 'Основни серија нуди приступачне прозоре без компромиса по питању квалитета. Изаберите између природног дрвета или белог полиуретана.', 'jugogradnja' ),
	],
	'velux-standard' => [
		'badge' => __( 'ТРОСТРУКО СТАКЛО - ЕНЕРГЕТСКИ ЕФИКАСНО', 'jugogradnja' ),
		'title' => __( 'VELUX СТАНДАРД', 'jugogradnja' ),
		'sub'   => __( 'Кровни прозори', 'jugogradnja' ),
		'desc'  => __( 'Стандард серија је идеална за власнике поткровља који су спремни да инвестирају у додатну енергетску ефикасност и комфор.', 'jugogradnja' ),
	],
	'velux-komfor' => [
		'badge' => __( 'ПАМЕТНА РЕШЕЊА', 'jugogradnja' ),
		'title' => __( 'VELUX КОМФОР', 'jugogradnja' ),
		'sub'   => __( 'Панорамски и даљински прозори', 'jugogradnja' ),
		'desc'  => __( 'Панорамски прозори и прозори на даљинско управљање за максималну удобност и поглед на природу.', 'jugogradnja' ),
	],
	'velux-komfor-plus' => [
		'badge' => __( 'ВРХУНСКИ КВАЛИТЕТ', 'jugogradnja' ),
		'title' => __( 'VELUX КОМФОР ПЛУС', 'jugogradnja' ),
		'sub'   => __( 'Савршена комбинација комфора', 'jugogradnja' ),
		'desc'  => __( 'Комфор Плус нуди прозоре са побољшаним карактеристикама стакла у различитим варијантама. Изаберите обичне, панорамске или електро прозоре са сигурносним стаклом.', 'jugogradnja' ),
	],
	'velux-roletne' => [
		'badge' => __( 'ЗАШТИТА И УДОБНОСТ', 'jugogradnja' ),
		'title' => __( 'VELUX РОЛЕТНЕ', 'jugogradnja' ),
		'sub'   => __( 'Спољне и унутрашње ролетне и комарници', 'jugogradnja' ),
		'desc'  => __( 'Контролишите светлост, топлоту и приватност у вашем поткровљу. Широк избор спољних тенди, унутрашњих ролетни и комарника за све VELUX кровне прозоре.', 'jugogradnja' ),
	],
	'velux-vodic' => [
		'badge' => __( 'ВОДИЧ ЗА КУПОВИНУ', 'jugogradnja' ),
		'title' => __( 'Водич за куповину VELUX кровних прозора', 'jugogradnja' ),
		'sub'   => __( 'Корак по корак до правог прозора', 'jugogradnja' ),
		'desc'  => __( 'Пет једноставних корака koji ће вам помоћи да изаберете и купите VELUX кровни прозор koji savršeno одговара вашем поткровљу.', 'jugogradnja' ),
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
<?= esc_html__( 'Назад на VELUX', 'jugogradnja' ) ?>
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
