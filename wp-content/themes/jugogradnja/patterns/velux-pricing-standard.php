<?php
/**
 * Title: VELUX Pricing Standard
 * Slug: jugogradnja/velux-pricing-standard
 * Categories: jugogradnja
 */

$gll_cards = [
	['size' => '66x118cm', 'code' => 'GLL FK06 1061', 'sale' => '45,151', 'orig' => '51,308'],
	['size' => '66x140cm', 'code' => 'GLL FK08 1061', 'sale' => '50,181', 'orig' => '57,024'],
	['size' => '78x118cm', 'code' => 'GLL MK06 1061', 'sale' => '47,897', 'orig' => '54,428'],
	['size' => '78x140cm', 'code' => 'GLL MK08 1061', 'sale' => '52,434', 'orig' => '59,584'],
	['size' => '66x118cm', 'code' => 'GLL FK06 0061', 'sale' => '46,308', 'orig' => '52,623'],
	['size' => '78x118cm', 'code' => 'GLL MK06 0061', 'sale' => '49,125', 'orig' => '55,824'],
];

$glu_cards = [
	['size' => '55x78cm',  'code' => 'GLU CK02 0061', 'sale' => '43,847', 'orig' => '49,826'],
	['size' => '78x118cm', 'code' => 'GLU MK06 0061', 'sale' => '56,478', 'orig' => '64,179'],
	['size' => '78x140cm', 'code' => 'GLU MK08 0061', 'sale' => '61,868', 'orig' => '70,305'],
	['size' => '66x118cm', 'code' => 'GLU FK06 0061', 'sale' => '54,545', 'orig' => '61,983'],
	['size' => '78x118cm', 'code' => 'GLU MK06 0061', 'sale' => '57,925', 'orig' => '65,824'],
	['size' => '66x118cm', 'code' => 'GLU FK06 0061', 'sale' => '53,182', 'orig' => '60,434'],
	['size' => '66x140cm', 'code' => 'GLU FK08 0061', 'sale' => '59,263', 'orig' => '67,344'],
];
?>
<section class="jg-velux-pc">
	<div class="jg-velux-pc__inner">

		<!-- GLL series -->
		<div class="jg-velux-pc__group">
			<div class="jg-velux-pc__group-header">
				<p class="jg-velux-pc__group-title">GLL серија - Природна боја дрвета</p>
				<p class="jg-velux-pc__group-sub">Лакирани безбојним лаком, троструко стакло</p>
				<p class="jg-velux-pc__group-note">Цена прозора је са опшивком EDW 2000</p>
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
						<p class="jg-velux-pc__card-label">са попустом</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- GLU series -->
		<div class="jg-velux-pc__group">
			<div class="jg-velux-pc__group-header">
				<p class="jg-velux-pc__group-title">GLU серија - Бели полиуретан</p>
				<p class="jg-velux-pc__group-sub">Троструко стакло, без додатног одржавања</p>
				<p class="jg-velux-pc__group-note">Цена прозора је са опшивком EDW 2000. Цене производа су са урачунатим ПДВ-ом и попустом.</p>
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
						<p class="jg-velux-pc__card-label">са попустом</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>
