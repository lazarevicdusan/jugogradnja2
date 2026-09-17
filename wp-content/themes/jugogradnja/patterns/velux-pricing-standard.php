<?php
/**
 * Title: VELUX Pricing Standard
 * Slug: jugogradnja/velux-pricing-standard
 * Categories: jugogradnja
 */

$gll_cards = [
	['size' => '66x118cm', 'code' => 'GLL FK06 1061',   'sale' => '53,804', 'orig' => '68,980'],
	['size' => '66x140cm', 'code' => 'GLL FK08 1061',   'sale' => '59,745', 'orig' => '74,680'],
	['size' => '78x98cm',  'code' => 'GLL MK04 1061',   'sale' => '54,303', 'orig' => '67,880'],
	['size' => '78x118cm', 'code' => 'GLL MK06 1061',   'sale' => '57,002', 'orig' => '73,080'],
	['size' => '78x140cm', 'code' => 'GLL MK08 1061',   'sale' => '62,385', 'orig' => '77,980'],
	['size' => '66x118cm', 'code' => 'GLL FK06 1061 B', 'sale' => '55,184', 'orig' => '68,980'],
	['size' => '78x118cm', 'code' => 'GLL MK06 1061 B', 'sale' => '58,464', 'orig' => '73,080'],
];

$glu_cards = [
	['size' => '55x78cm',  'code' => 'GLU CK02 0061',   'sale' => '52,245', 'orig' => '66,980'],
	['size' => '66x118cm', 'code' => 'GLU FK06 0061',   'sale' => '63,398', 'orig' => '61,590'],
	['size' => '66x140cm', 'code' => 'GLU FK08 0061',   'sale' => '70,545', 'orig' => '88,180'],
	['size' => '78x98cm',  'code' => 'GLU MK04 0061',   'sale' => '63,984', 'orig' => '79,980'],
	['size' => '78x118cm', 'code' => 'GLU MK06 0061',   'sale' => '67,221', 'orig' => '86,180'],
	['size' => '78x140cm', 'code' => 'GLU MK08 0061',   'sale' => '73,584', 'orig' => '91,980'],
	['size' => '66x118cm', 'code' => 'GLU FK06 0061 B', 'sale' => '65,024', 'orig' => '61,590'],
	['size' => '78x118cm', 'code' => 'GLU MK06 0061 B', 'sale' => '68,944', 'orig' => '86,180'],
];
?>
<section class="jg-velux-pc">
	<div class="jg-velux-pc__inner">

		<!-- GLL series -->
		<div class="jg-velux-pc__group">
			<div class="jg-velux-pc__group-header">
				<p class="jg-velux-pc__group-title"><?= esc_html__( 'GLL серија - Природна боја дрвета', 'jugogradnja' ) ?></p>
				<p class="jg-velux-pc__group-sub"><?= esc_html__( 'Лакирани безбојним лаком, троструко стакло', 'jugogradnja' ) ?></p>
				<p class="jg-velux-pc__group-note"><?= esc_html__( 'Цена прозора је са опшивком EDW 2000', 'jugogradnja' ) ?></p>
			</div>
			<div class="jg-velux-pc__grid jg-velux-pc__grid--3">
				<?php foreach ( $gll_cards as $card ) : ?>
				<div class="jg-velux-pc__card">
					<div class="jg-velux-pc__card-size"><?= esc_html( $card['size'] ) ?></div>
					<div class="jg-velux-pc__card-body">
						<p class="jg-velux-pc__card-code"><?= esc_html( $card['code'] ) ?></p>
						<div class="jg-velux-pc__card-orig-wrap">
							<span class="jg-velux-pc__card-orig"><?= esc_html( $card['orig'] ) ?></span>
							<span class="jg-velux-pc__card-strike" aria-hidden="true"></span>
						</div>
						<p class="jg-velux-pc__card-price">
							<span class="jg-velux-pc__card-amount"><?= esc_html( $card['sale'] ) ?></span>
							<span class="jg-velux-pc__card-currency">RSD</span>
						</p>
						<p class="jg-velux-pc__card-label"><?= esc_html__( 'са попустом', 'jugogradnja' ) ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- GLU series -->
		<div class="jg-velux-pc__group">
			<div class="jg-velux-pc__group-header">
				<p class="jg-velux-pc__group-title"><?= esc_html__( 'GLU серија - Бели полиуретан', 'jugogradnja' ) ?></p>
				<p class="jg-velux-pc__group-sub"><?= esc_html__( 'Троструко стакло, без додатног одржавања', 'jugogradnja' ) ?></p>
				<p class="jg-velux-pc__group-note"><?= esc_html__( 'Цена прозора је са опшивком EDW 2000. Цене производа су са урачунатим ПДВ-ом и попустом.', 'jugogradnja' ) ?></p>
			</div>
			<div class="jg-velux-pc__grid jg-velux-pc__grid--4">
				<?php foreach ( $glu_cards as $card ) : ?>
				<div class="jg-velux-pc__card">
					<div class="jg-velux-pc__card-size"><?= esc_html( $card['size'] ) ?></div>
					<div class="jg-velux-pc__card-body">
						<p class="jg-velux-pc__card-code"><?= esc_html( $card['code'] ) ?></p>
						<div class="jg-velux-pc__card-orig-wrap">
							<span class="jg-velux-pc__card-orig"><?= esc_html( $card['orig'] ) ?></span>
							<span class="jg-velux-pc__card-strike" aria-hidden="true"></span>
						</div>
						<p class="jg-velux-pc__card-price">
							<span class="jg-velux-pc__card-amount"><?= esc_html( $card['sale'] ) ?></span>
							<span class="jg-velux-pc__card-currency">RSD</span>
						</p>
						<p class="jg-velux-pc__card-label"><?= esc_html__( 'са попустом', 'jugogradnja' ) ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>
