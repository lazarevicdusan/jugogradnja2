<?php
/**
 * Title: VELUX Pricing Osnovni
 * Slug: jugogradnja/velux-pricing-osnovni
 * Categories: jugogradnja
 */
$t = get_template_directory_uri();

$gzl_cards = [
	['dim'=>'55×78cm',  'code'=>'GZL CK02 1051',   'old'=>'49.080', 'new'=>'39.264', 'note'=>''],
	['dim'=>'55×98cm',  'code'=>'GZL CK04 1051',   'old'=>'51.580', 'new'=>'42.295', 'note'=>''],
	['dim'=>'66×118cm', 'code'=>'GZL FK06 1051',   'old'=>'59.080', 'new'=>'46.870', 'note'=>''],
	['dim'=>'66×140cm', 'code'=>'GZL FK08 1051',   'old'=>'63.880', 'new'=>'52.382', 'note'=>''],
	['dim'=>'78×98cm',  'code'=>'GZL MK04 1051',   'old'=>'58.280', 'new'=>'47.789', 'note'=>''],
	['dim'=>'78×118cm', 'code'=>'GZL MK06 1051',   'old'=>'62.580', 'new'=>'50.064', 'note'=>''],
	['dim'=>'78×140cm', 'code'=>'GZL MK08 1051',   'old'=>'66.780', 'new'=>'54.760', 'note'=>''],
	['dim'=>'66×118cm', 'code'=>'GZL FK06 1051 B', 'old'=>'59.080', 'new'=>'48.445', 'note'=>__('ДОЊЕ УПРАВЉАЊЕ','jugogradnja')],
	['dim'=>'78×118cm', 'code'=>'GZL MK06 1051 B', 'old'=>'62.580', 'new'=>'51.316', 'note'=>__('ДОЊЕ УПРАВЉАЊЕ','jugogradnja')],
];

$gzl_chars = [
	__( 'Природна нордијска боровина', 'jugogradnja' ),
	__( 'Класичан дизајн', 'jugogradnja' ),
	__( 'Безбојни лак - истиче текстуру дрвета', 'jugogradnja' ),
	__( 'Одличне топлотне перформансе', 'jugogradnja' ),
];

$glu_cards = [
	['dim'=>'55×78cm',  'code'=>'GLU CK02 0051',   'old'=>'56.980', 'new'=>'45.584', 'note'=>''],
	['dim'=>'66×118cm', 'code'=>'GLU FK06 0051',   'old'=>'68.980', 'new'=>'54.790', 'note'=>''],
	['dim'=>'66×140cm', 'code'=>'GLU FK08 0051',   'old'=>'74.680', 'new'=>'61.238', 'note'=>''],
	['dim'=>'78×98cm',  'code'=>'GLU MK04 0051',   'old'=>'67.880', 'new'=>'55.661', 'note'=>''],
	['dim'=>'78×118cm', 'code'=>'GLU MK06 0051',   'old'=>'73.080', 'new'=>'58.464', 'note'=>''],
	['dim'=>'78×140cm', 'code'=>'GLU MK08 0051',   'old'=>'77.980', 'new'=>'63.944', 'note'=>''],
	['dim'=>'66×118cm', 'code'=>'GLU FK06 0051 B', 'old'=>'68.980', 'new'=>'56.563', 'note'=>__('ДОЊЕ УПРАВЉАЊЕ','jugogradnja')],
	['dim'=>'78×118cm', 'code'=>'GLU MK06 0051 B', 'old'=>'73.080', 'new'=>'59.926', 'note'=>__('ДОЊЕ УПРАВЉАЊЕ','jugogradnja')],
];

$glu_chars = [
	__( 'Бели полиуретан - без одржавања', 'jugogradnja' ),
	__( 'Идеалнo за купатила и кухиње', 'jugogradnja' ),
	__( 'Отпоран на влагу', 'jugogradnja' ),
	__( 'Не захтева лакирање', 'jugogradnja' ),
];

function jg_velux_price_cards( array $cards ): void {
	echo '<div class="jg-velux-pcards">';
	foreach ( $cards as $c ) {
		$has_note = ! empty( $c['note'] );
		echo '<div class="jg-velux-pcards__card">';
		echo '<div class="jg-velux-pcards__dim">' . esc_html( $c['dim'] ) . '</div>';
		echo '<div class="jg-velux-pcards__body">';
		echo '<span class="jg-velux-pcards__code">' . esc_html( $c['code'] ) . '</span>';
		if ( $has_note ) {
			echo '<span class="jg-velux-pcards__note">' . esc_html( $c['note'] ) . '</span>';
		}
		echo '<span class="jg-velux-pcards__old">' . esc_html( $c['old'] ) . '</span>';
		echo '<div class="jg-velux-pcards__price"><strong>' . esc_html( $c['new'] ) . '</strong><sup>RSD</sup></div>';
		echo '<span class="jg-velux-pcards__label">' . esc_html__( 'са попустом', 'jugogradnja' ) . '</span>';
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
}

function jg_velux_chars( string $label, array $items ): void {
	echo '<div class="jg-velux-chars">';
	echo '<h4 class="jg-velux-chars__title">' . esc_html( $label ) . ' - <span>' . esc_html__( 'Карактеристике', 'jugogradnja' ) . '</span></h4>';
	echo '<ul class="jg-velux-chars__list">';
	foreach ( $items as $item ) {
		echo '<li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="8" stroke="#C5A059" stroke-width="1.3"/><path d="M5.5 9l2.5 2.5 4.5-5" stroke="#C5A059" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>' . esc_html( $item ) . '</li>';
	}
	echo '</ul>';
	echo '</div>';
}
?>

<section class="jg-velux-pricing-ov">
	<div class="jg-velux-pricing-ov__inner">

		<!-- GZL серија -->
		<div class="jg-velux-series jg-velux-series--dark">
			<h2 class="jg-velux-series__title"><?= esc_html__( 'GZL серија - Природна боја дрвета', 'jugogradnja' ) ?></h2>
			<p class="jg-velux-series__sub"><?= esc_html__( 'Лакирани безбојним лаком', 'jugogradnja' ) ?></p>
			<p class="jg-velux-series__note"><?= esc_html__( 'Цена прозора је са опшивком EDW 2000', 'jugogradnja' ) ?></p>
		</div>

		<?php jg_velux_price_cards( $gzl_cards ); ?>

		<?php jg_velux_chars( 'GZL', $gzl_chars ); ?>

		<!-- GLU серија -->
		<div class="jg-velux-series jg-velux-series--light">
			<h2 class="jg-velux-series__title"><?= esc_html__( 'GLU серија - Бели полиуретан', 'jugogradnja' ) ?></h2>
			<p class="jg-velux-series__sub"><?= esc_html__( 'Без додатног одржавања', 'jugogradnja' ) ?></p>
			<p class="jg-velux-series__note"><?= esc_html__( 'Цена прозора је са опшивком EDW 2000. Погодни за просторије са већом концентрацијом влаге.', 'jugogradnja' ) ?></p>
		</div>

		<?php jg_velux_price_cards( $glu_cards ); ?>

		<?php jg_velux_chars( 'GLU', $glu_chars ); ?>

	</div>
</section>
