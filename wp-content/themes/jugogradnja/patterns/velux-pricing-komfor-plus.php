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
		'title'    => __( 'Комфор Плус прозори', 'jugogradnja' ),
		'sub'      => __( 'Са сигурносним стаклом - Стакло 70 и Стакло 68', 'jugogradnja' ),
		'note'     => __( 'Врхунски прозори са побољшаним карактеристикама стакла. Дрво (GGL) или полиуретан (GGU).', 'jugogradnja' ),
		'feat_hd'  => __( 'Комфор Плус - Карактеристике', 'jugogradnja' ),
		'features' => [
			__( 'Побољшане карактеристике стакла', 'jugogradnja' ),
			__( 'Стакло 70 - стандардно смањење буке', 'jugogradnja' ),
			__( 'Стакло 68 - оптимална топлотна изолација', 'jugogradnja' ),
			__( 'Дрво (GGL) или полиуретан (GGU)', 'jugogradnja' ),
			__( 'Енергетски ефикасно', 'jugogradnja' ),
			__( 'Врхунски квалитет', 'jugogradnja' ),
		],
		'cards' => [
			['code' => 'GGL 3070', 'type' => __( 'Стакло 70', 'jugogradnja' )],
			['code' => 'GGL 3068', 'type' => __( 'Стакло 68', 'jugogradnja' )],
			['code' => 'GGU 0070', 'type' => __( 'Стакло 70 - Полиуретан', 'jugogradnja' )],
			['code' => 'GGU 0068', 'type' => __( 'Стакло 68 - Полиуретан', 'jugogradnja' )],
		],
	],
	[
		'variant'  => 'b',
		'title'    => __( 'Комфор Плус панорамски прозори', 'jugogradnja' ),
		'sub'      => __( 'Са сигурносним стаклом - Панорамско отварање', 'jugogradnja' ),
		'note'     => __( 'Најграндиознији изглед. Са прозором отвореним имате непроцењив панорамски поглед на спољни свет.', 'jugogradnja' ),
		'feat_hd'  => __( 'Панорамски - Карактеристике', 'jugogradnja' ),
		'features' => [
			__( 'Панорамско отварање горњег дела', 'jugogradnja' ),
			__( 'Максимални поглед на природу', 'jugogradnja' ),
			__( 'Стакло 70 и Стакло 68', 'jugogradnja' ),
			__( 'Дрво (GPL) или полиуретан (GPU)', 'jugogradnja' ),
			__( 'Идеално за поткровље', 'jugogradnja' ),
			__( 'Непроцењив панорамски поглед', 'jugogradnja' ),
		],
		'cards' => [
			['code' => 'GPL 3070', 'type' => __( 'Стакло 70 - Дрво', 'jugogradnja' )],
			['code' => 'GPL 3068', 'type' => __( 'Стакло 68 - Дрво', 'jugogradnja' )],
			['code' => 'GPU 0070', 'type' => __( 'Стакло 70 - Полиуретан', 'jugogradnja' )],
			['code' => 'GPU 0068', 'type' => __( 'Стакло 68 - Полиуретан', 'jugogradnja' )],
		],
	],
	[
		'variant'  => 'c',
		'title'    => __( 'Комфор Плус електро прозори', 'jugogradnja' ),
		'sub'      => __( 'Са сигурносним стаклом - Електрично управљање', 'jugogradnja' ),
		'note'     => __( 'Савршено решење које омогућава удобност и комфор са даљинским управљањем.', 'jugogradnja' ),
		'feat_hd'  => __( 'Електро прозори - Карактеристике', 'jugogradnja' ),
		'features' => [
			__( 'Електрично управљање', 'jugogradnja' ),
			__( 'Интегрисан сензор за кишу', 'jugogradnja' ),
			__( 'Даљинско управљање', 'jugogradnja' ),
			__( 'Компатибилно са VELUX ACTIVE', 'jugogradnja' ),
			__( 'Стакло 70 и Стакло 68', 'jugogradnja' ),
			__( 'Идеално за тешко доступне прозоре', 'jugogradnja' ),
		],
		'cards' => [
			['code' => 'GGL 307021', 'type' => __( 'Електро - Стакло 70', 'jugogradnja' )],
			['code' => 'GGL 306821', 'type' => __( 'Електро - Стакло 68', 'jugogradnja' )],
			['code' => 'GGU 007021', 'type' => __( 'Електро - Стакло 70 - Полиуретан', 'jugogradnja' )],
			['code' => 'GGU 006821', 'type' => __( 'Електро - Стакло 68 - Полиуретан', 'jugogradnja' )],
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
				<p class="jg-velux-kpp__card-price"><?= esc_html__( 'Цена на упит', 'jugogradnja' ) ?></p>
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
