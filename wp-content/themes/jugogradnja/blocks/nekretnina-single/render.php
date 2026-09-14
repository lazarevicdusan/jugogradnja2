<?php
/**
 * Render callback for jugogradnja/nekretnina-single block.
 * Called at render time - $post and get_the_ID() are valid here.
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Inner block content (unused).
 * @var WP_Block $block      Block instance.
 */

$id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : get_the_ID();
if ( ! $id || get_post_type( $id ) !== 'nekretnina' ) {
	return;
}

$t        = get_template_directory_uri();
$archive  = esc_url( get_post_type_archive_link( 'nekretnina' ) );

// Icons
$icon_area  = esc_url( $t . '/assets/images/icons/icon-prop-area.svg' );
$icon_rooms = esc_url( $t . '/assets/images/icons/icon-prop-rooms.svg' );
$icon_bed   = esc_url( $t . '/assets/images/icons/icon-prop-bed.svg' );
$icon_bath  = esc_url( $t . '/assets/images/icons/icon-prop-bath.svg' );
$icon_pin   = esc_url( $t . '/assets/images/icons/icon-prop-pin.svg' );
$icon_check = esc_url( $t . '/assets/images/icons/icon-check-gold.svg' );
$icon_euro  = esc_url( $t . '/assets/images/icons/icon-prop-euro.svg' );

// Meta
$cena       = get_post_meta( $id, '_nekretnina_cena', true );
$povrsina   = get_post_meta( $id, '_nekretnina_povrsina', true );
$sobe       = get_post_meta( $id, '_nekretnina_sobe', true );
$spavace    = get_post_meta( $id, '_nekretnina_spavace', true );
$kupatilo   = get_post_meta( $id, '_nekretnina_kupatilo', true );
$lokacija   = get_post_meta( $id, '_nekretnina_lokacija', true );
$godina     = get_post_meta( $id, '_nekretnina_godina', true );
$sprat      = get_post_meta( $id, '_nekretnina_sprat', true );
$grejanje   = get_post_meta( $id, '_nekretnina_grejanje', true );
$parking    = get_post_meta( $id, '_nekretnina_parking', true );
$status     = get_post_meta( $id, '_nekretnina_status', true );
$oprema     = get_post_meta( $id, '_nekretnina_oprema', true );
$prostorije = get_post_meta( $id, '_nekretnina_prostorije', true );
$blizina    = get_post_meta( $id, '_nekretnina_blizina', true );
$galerija   = get_post_meta( $id, '_nekretnina_galerija', true );

// Taxonomy
$terms     = get_the_terms( $id, 'tip_nekretnine' );
$tip_label = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';

// Gallery
$gallery_ids = [];
if ( $galerija ) {
	$gallery_ids = array_map( 'intval', array_filter( explode( ',', $galerija ) ) );
}
$thumb_id = get_post_thumbnail_id( $id );
if ( $thumb_id && ! in_array( $thumb_id, $gallery_ids ) ) {
	array_unshift( $gallery_ids, $thumb_id );
}
$gallery_count = count( $gallery_ids );

// Status
$status_map = [
	'na-prodaju' => [ 'label' => __( 'На продају', 'jugogradnja' ), 'color' => '#22c55e' ],
	'prodato'    => [ 'label' => __( 'Продато', 'jugogradnja' ),    'color' => '#fb2c36' ],
	'izdato'     => [ 'label' => __( 'Издато', 'jugogradnja' ),     'color' => '#f97316' ],
];
$status_info = isset( $status_map[ $status ] ) ? $status_map[ $status ] : null;

// Parse newline-separated lines
$parse_lines = function ( $raw ) {
	if ( ! $raw ) return [];
	return array_filter( array_map( 'trim', explode( "\n", $raw ) ) );
};

?>
<div class="jg-prop-single">

	<!-- Back link -->
	<div class="jg-prop-back">
		<div class="jg-prop-back__inner">
			<a class="jg-prop-back__link" href="<?= $archive ?>">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M10 13L5 8L10 3" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<?= esc_html__( 'Назад на некретнине', 'jugogradnja' ) ?>
			</a>
		</div>
	</div>

	<!-- Gallery -->
	<?php if ( $gallery_count > 0 ) : ?>
	<div class="jg-prop-gallery" id="jg-gallery-<?= $id ?>">
		<div class="jg-prop-gallery__inner">
			<div class="jg-prop-gallery__main">
				<div class="jg-prop-gallery__slides">
					<?php foreach ( $gallery_ids as $i => $img_id ) :
						$img = wp_get_attachment_image_src( $img_id, 'large' );
						if ( ! $img ) continue;
					?>
					<div class="jg-prop-gallery__slide<?= $i === 0 ? ' is-active' : '' ?>" data-index="<?= $i ?>">
						<img src="<?= esc_url( $img[0] ) ?>" width="<?= esc_attr( $img[1] ) ?>" height="<?= esc_attr( $img[2] ) ?>"
							alt="<?= esc_attr( get_post_field( 'post_excerpt', $img_id ) ?: get_the_title( $id ) ) ?>"
							<?= $i === 0 ? '' : 'loading="lazy"' ?>>
					</div>
					<?php endforeach; ?>
				</div>
				<?php if ( $gallery_count > 1 ) : ?>
				<button class="jg-prop-gallery__nav jg-prop-gallery__nav--prev" aria-label="<?= esc_attr__( 'Претходна фотографија', 'jugogradnja' ) ?>">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15 19l-7-7 7-7" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<button class="jg-prop-gallery__nav jg-prop-gallery__nav--next" aria-label="<?= esc_attr__( 'Следећа фотографија', 'jugogradnja' ) ?>">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 5l7 7-7 7" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<div class="jg-prop-gallery__counter">
					<span class="jg-prop-gallery__counter-current">1</span>/<span><?= $gallery_count ?></span>
				</div>
				<?php endif; ?>
			</div>
			<?php if ( $gallery_count > 1 ) : ?>
			<div class="jg-prop-gallery__thumbs" role="tablist" aria-label="<?= esc_attr__( 'Галерија фотографија', 'jugogradnja' ) ?>">
				<?php foreach ( $gallery_ids as $i => $img_id ) :
					$thumb = wp_get_attachment_image_src( $img_id, 'thumbnail' );
					if ( ! $thumb ) continue;
				?>
				<button class="jg-prop-gallery__thumb<?= $i === 0 ? ' is-active' : '' ?>"
					data-index="<?= $i ?>"
					role="tab"
					aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
					aria-label="<?= esc_attr( sprintf( /* translators: %d is the photo number */ __( 'Фотографија %d', 'jugogradnja' ), $i + 1 ) ) ?>">
					<img src="<?= esc_url( $thumb[0] ) ?>" width="104" height="78" alt="" loading="lazy">
				</button>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- Two-column: main content + sidebar -->
	<div class="jg-prop-single__two-col">
		<div class="jg-prop-single__main">

			<div class="jg-prop-single__badges">
				<?php if ( $tip_label ) : ?>
				<span class="jg-prop-badge jg-prop-badge--type"><?= esc_html( $tip_label ) ?></span>
				<?php endif; ?>
				<?php if ( $status_info ) : ?>
				<span class="jg-prop-badge jg-prop-badge--status" style="background:<?= esc_attr( $status_info['color'] ) ?>"><?= esc_html( $status_info['label'] ) ?></span>
				<?php endif; ?>
			</div>

			<h1 class="jg-prop-single__title"><?= esc_html( get_the_title( $id ) ) ?></h1>

			<?php if ( $lokacija ) : ?>
			<div class="jg-prop-single__location">
				<img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
				<span><?= esc_html( $lokacija ) ?></span>
			</div>
			<?php endif; ?>

			<div class="jg-prop-single__stats">
				<?php if ( $povrsina ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_area ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $povrsina ) ?> м²</span>
					<span class="jg-prop-single__stat-label"><?= esc_html__( 'Површина', 'jugogradnja' ) ?></span>
				</div>
				<?php endif; ?>
				<?php if ( $sobe ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_rooms ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $sobe ) ?></span>
					<span class="jg-prop-single__stat-label"><?= esc_html__( 'Собе', 'jugogradnja' ) ?></span>
				</div>
				<?php endif; ?>
				<?php if ( $spavace !== '' && $spavace !== false ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_bed ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $spavace ) ?></span>
					<span class="jg-prop-single__stat-label"><?= esc_html__( 'Спаваће собе', 'jugogradnja' ) ?></span>
				</div>
				<?php endif; ?>
				<?php if ( $kupatilo ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_bath ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $kupatilo ) ?></span>
					<span class="jg-prop-single__stat-label"><?= esc_html__( 'Купатила', 'jugogradnja' ) ?></span>
				</div>
				<?php endif; ?>
			</div>

			<?php
			$desc = get_post_field( 'post_content', $id );
			if ( $desc ) :
			?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading"><?= esc_html__( 'Опис', 'jugogradnja' ) ?></h2>
				<div class="jg-prop-single__description">
					<?= wp_kses_post( wpautop( $desc ) ) ?>
				</div>
			</div>
			<?php endif; ?>

			<?php $has_info = $sprat || $godina || $grejanje || $parking; ?>
			<?php if ( $has_info ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading"><?= esc_html__( 'Додатне информације', 'jugogradnja' ) ?></h2>
				<div class="jg-prop-single__info-grid">
					<?php if ( $sprat ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label"><?= esc_html__( 'Спрат', 'jugogradnja' ) ?></span>
						<span class="jg-prop-single__info-value"><?= esc_html( $sprat ) ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $godina ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label"><?= esc_html__( 'Година изградње', 'jugogradnja' ) ?></span>
						<span class="jg-prop-single__info-value"><?= esc_html( $godina ) ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $grejanje ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label"><?= esc_html__( 'Грејање', 'jugogradnja' ) ?></span>
						<span class="jg-prop-single__info-value"><?= esc_html( $grejanje ) ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $parking ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label"><?= esc_html__( 'Паркинг', 'jugogradnja' ) ?></span>
						<span class="jg-prop-single__info-value"><?= esc_html( $parking ) ?></span>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

			<?php $amenity_items = $parse_lines( $oprema ); ?>
			<?php if ( $amenity_items ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading"><?= esc_html__( 'Опремљеност', 'jugogradnja' ) ?></h2>
				<ul class="jg-prop-single__amenities">
					<?php foreach ( $amenity_items as $item ) : ?>
					<li class="jg-prop-single__amenity">
						<img src="<?= $icon_check ?>" width="20" height="20" alt="" aria-hidden="true">
						<span><?= esc_html( $item ) ?></span>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php $room_lines = $parse_lines( $prostorije ); ?>
			<?php if ( $room_lines ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading"><?= esc_html__( 'Распоред просторија', 'jugogradnja' ) ?></h2>
				<div class="jg-prop-single__rooms-card">
					<?php foreach ( $room_lines as $line ) :
						$parts = array_map( 'trim', explode( '|', $line ) );
						if ( count( $parts ) < 2 ) continue;
					?>
					<div class="jg-prop-single__room-row">
						<span class="jg-prop-single__room-name"><?= esc_html( $parts[0] ) ?></span>
						<span class="jg-prop-single__room-size"><?= esc_html( $parts[1] ) ?></span>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

			<?php $blizina_lines = $parse_lines( $blizina ); ?>
			<?php if ( $blizina_lines ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading"><?= esc_html__( 'У близини', 'jugogradnja' ) ?></h2>
				<div class="jg-prop-single__proximity-grid">
					<?php foreach ( $blizina_lines as $line ) :
						$parts = array_map( 'trim', explode( '|', $line ) );
						if ( count( $parts ) < 2 ) continue;
					?>
					<div class="jg-prop-single__proximity-item">
						<span class="jg-prop-single__proximity-name"><?= esc_html( $parts[0] ) ?></span>
						<span class="jg-prop-single__proximity-dist"><?= esc_html( $parts[1] ) ?></span>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

		</div><!-- /.jg-prop-single__main -->

		<!-- Right sidebar -->
		<aside class="jg-prop-single__sidebar">
			<div class="jg-prop-single__sidebar-inner">

				<?php if ( $cena ) :
					$price_fmt = number_format( (float) $cena, 0, ',', '.' );
					$sqm_price = ( $povrsina && (float) $povrsina > 0 )
						? number_format( (float) $cena / (float) $povrsina, 0, ',', '.' )
						: '';
				?>
				<div class="jg-prop-single__price-card">
					<span class="jg-prop-single__price-label">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
							<path d="M8 1.5A6.5 6.5 0 1 1 8 14.5 6.5 6.5 0 0 1 8 1.5Zm0 2.25v.5m0 6.5v.5M5.75 8h1.5a.75.75 0 0 0 0-1.5H8a.75.75 0 0 1 0-1.5h.5m-2.75 3h3.5" stroke="rgba(255,255,255,.6)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						<?= esc_html__( 'Цена', 'jugogradnja' ) ?>
					</span>
					<div class="jg-prop-single__price-amount"><?= esc_html( $price_fmt ) ?> €</div>
					<?php if ( $sqm_price ) : ?>
					<div class="jg-prop-single__price-sqm">/<?= esc_html( $sqm_price ) ?> €/м²</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>

				<div class="jg-prop-single__contact-card">
					<p class="jg-prop-single__contact-label"><?= esc_html__( 'Контакт особа', 'jugogradnja' ) ?></p>
					<p class="jg-prop-single__contact-name">Nekretnine Jugogradnja</p>
					<a class="jg-prop-single__contact-row" href="tel:+381112481075">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
							<path d="M3 3.5A1.5 1.5 0 0 1 4.5 2h.764a1 1 0 0 1 .894.553l1 2a1 1 0 0 1-.263 1.21L5.72 6.72a7.07 7.07 0 0 0 3.56 3.56l.957-1.175a1 1 0 0 1 1.21-.263l2 1a1 1 0 0 1 .553.894V12.5A1.5 1.5 0 0 1 12.5 14C7.253 14 2 8.747 2 3.5A1.5 1.5 0 0 1 3 3.5Z" stroke="rgba(255,255,255,0.8)" stroke-width="1.2"/>
						</svg>
						+381 11 248 10 75
					</a>
					<a class="jg-prop-single__contact-row" href="mailto:nekretnine@jugogradnja.rs">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
							<path d="M2 4.5A1.5 1.5 0 0 1 3.5 3h9A1.5 1.5 0 0 1 14 4.5v7A1.5 1.5 0 0 1 12.5 13h-9A1.5 1.5 0 0 1 2 11.5v-7Zm1.5 0 4.5 3.5 4.5-3.5" stroke="rgba(255,255,255,0.8)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						nekretnine@jugogradnja.rs
					</a>
					<div class="jg-prop-single__sidebar-btns">
						<a class="jg-btn jg-btn--gold jg-btn--block" href="<?= esc_url( home_url( '/kontakt/' ) ) ?>"><?= esc_html__( 'ЗАКАЖИ ОБИЛАЗАК', 'jugogradnja' ) ?></a>
						<button class="jg-btn jg-btn--outline-white jg-btn--block jg-btn--share" type="button" onclick="navigator.share ? navigator.share({title:document.title,url:location.href}) : navigator.clipboard?.writeText(location.href)">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
								<circle cx="12" cy="3" r="1.5" stroke="currentColor" stroke-width="1.2"/>
								<circle cx="12" cy="13" r="1.5" stroke="currentColor" stroke-width="1.2"/>
								<circle cx="4" cy="8" r="1.5" stroke="currentColor" stroke-width="1.2"/>
								<path d="M10.5 3.75 5.5 7.25M10.5 12.25 5.5 8.75" stroke="currentColor" stroke-width="1.2"/>
							</svg>
							<?= esc_html__( 'ПОДЕЛИ', 'jugogradnja' ) ?>
						</button>
						<?php
						$pdf_url = get_post_meta( $id, '_nekretnina_pdf', true );
						if ( $pdf_url ) :
						?>
						<a class="jg-btn jg-btn--gold jg-btn--block" href="<?= esc_url( $pdf_url ) ?>" target="_blank" rel="noopener"><?= esc_html__( 'Преузми pdf', 'jugogradnja' ) ?></a>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</aside>

	</div><!-- /.jg-prop-single__two-col -->

	<!-- Interest CTA -->
	<div class="jg-prop-single__interest">
		<div class="jg-prop-single__interest-inner">
			<h2 class="jg-prop-single__interest-heading"><?= esc_html__( 'Заинтересовани за ову некретнину?', 'jugogradnja' ) ?></h2>
			<p class="jg-prop-single__interest-sub"><?= esc_html__( 'Контактирајте нас за додатне информације или закажите обилазак некретнине.', 'jugogradnja' ) ?></p>
			<div class="jg-prop-single__interest-actions">
				<a class="jg-btn jg-btn--gold" href="<?= esc_url( home_url( '/kontakt/' ) ) ?>"><?= esc_html__( 'КОНТАКТИРАЈТЕ НАС', 'jugogradnja' ) ?></a>
				<a class="jg-btn jg-btn--outline-navy" href="<?= $archive ?>"><?= esc_html__( 'ПОГЛЕДАЈТЕ ЈОШ НЕКРЕТНИНА', 'jugogradnja' ) ?></a>
			</div>
		</div>
	</div>

</div>

<script>
(function () {
	var gallery = document.getElementById('jg-gallery-<?= $id ?>');
	if (!gallery) return;
	var slides = gallery.querySelectorAll('.jg-prop-gallery__slide');
	var thumbs = gallery.querySelectorAll('.jg-prop-gallery__thumb');
	var counter = gallery.querySelector('.jg-prop-gallery__counter-current');
	var current = 0;
	function go(idx) {
		if (idx < 0) idx = slides.length - 1;
		if (idx >= slides.length) idx = 0;
		slides[current].classList.remove('is-active');
		thumbs[current] && thumbs[current].classList.remove('is-active');
		thumbs[current] && thumbs[current].setAttribute('aria-selected', 'false');
		current = idx;
		slides[current].classList.add('is-active');
		thumbs[current] && thumbs[current].classList.add('is-active');
		thumbs[current] && thumbs[current].setAttribute('aria-selected', 'true');
		if (counter) counter.textContent = current + 1;
	}
	var prev = gallery.querySelector('.jg-prop-gallery__nav--prev');
	var next = gallery.querySelector('.jg-prop-gallery__nav--next');
	if (prev) prev.addEventListener('click', function () { go(current - 1); });
	if (next) next.addEventListener('click', function () { go(current + 1); });
	thumbs.forEach(function (btn, i) {
		btn.addEventListener('click', function () { go(i); });
	});
})();
</script>
<?php
