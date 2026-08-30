<?php
/**
 * Title: Некретнина - Детаљ
 * Slug: jugogradnja/nekretnina-single
 * Categories: jugogradnja
 * Inserter: false
 */

$id       = get_the_ID();
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
$icon_arrow = esc_url( $t . '/assets/images/icons/icon-prop-arrow.svg' );
$icon_euro  = esc_url( $t . '/assets/images/icons/icon-prop-euro.svg' );

// Meta
$cena      = get_post_meta( $id, '_nekretnina_cena', true );
$povrsina  = get_post_meta( $id, '_nekretnina_povrsina', true );
$sobe      = get_post_meta( $id, '_nekretnina_sobe', true );
$spavace   = get_post_meta( $id, '_nekretnina_spavace', true );
$kupatilo  = get_post_meta( $id, '_nekretnina_kupatilo', true );
$lokacija  = get_post_meta( $id, '_nekretnina_lokacija', true );
$godina    = get_post_meta( $id, '_nekretnina_godina', true );
$sprat     = get_post_meta( $id, '_nekretnina_sprat', true );
$grejanje  = get_post_meta( $id, '_nekretnina_grejanje', true );
$parking   = get_post_meta( $id, '_nekretnina_parking', true );
$status    = get_post_meta( $id, '_nekretnina_status', true );
$oprema    = get_post_meta( $id, '_nekretnina_oprema', true );
$prostorije = get_post_meta( $id, '_nekretnina_prostorije', true );
$blizina   = get_post_meta( $id, '_nekretnina_blizina', true );
$galerija  = get_post_meta( $id, '_nekretnina_galerija', true );

// Taxonomy
$terms     = get_the_terms( $id, 'tip_nekretnine' );
$tip_label = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';

// Gallery images
$gallery_ids = [];
if ( $galerija ) {
	$gallery_ids = array_map( 'intval', array_filter( explode( ',', $galerija ) ) );
}
$thumb_id = get_post_thumbnail_id( $id );
if ( $thumb_id && ! in_array( $thumb_id, $gallery_ids ) ) {
	array_unshift( $gallery_ids, $thumb_id );
}
$gallery_count = count( $gallery_ids );

// Status label/color
$status_map = [
	'na-prodaju' => [ 'label' => 'На продају', 'color' => '#22c55e' ],
	'prodato'    => [ 'label' => 'Продато',    'color' => '#fb2c36' ],
	'izdato'     => [ 'label' => 'Издато',     'color' => '#f97316' ],
];
$status_info = isset( $status_map[ $status ] ) ? $status_map[ $status ] : null;

// Helpers
if ( ! function_exists( 'jg_parse_lines' ) ) {
	function jg_parse_lines( $raw ) {
		if ( ! $raw ) return [];
		return array_filter( array_map( 'trim', explode( "\n", $raw ) ) );
	}
}
?>
<!-- wp:html -->
<div class="jg-prop-single">

	<!-- Back link -->
	<div class="jg-prop-back">
		<div class="jg-prop-back__inner">
			<a class="jg-prop-back__link" href="<?= $archive ?>">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M10 13L5 8L10 3" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				Назад на некретнине
			</a>
		</div>
	</div>

	<!-- Gallery -->
	<?php if ( $gallery_count > 0 ) :
		$main_img = wp_get_attachment_image_src( $gallery_ids[0], 'large' );
	?>
	<div class="jg-prop-gallery" id="jg-gallery-<?= $id ?>">
		<div class="jg-prop-gallery__inner">
			<!-- Main slide -->
			<div class="jg-prop-gallery__main">
				<div class="jg-prop-gallery__slides">
					<?php foreach ( $gallery_ids as $i => $img_id ) :
						$img = wp_get_attachment_image_src( $img_id, 'large' );
						if ( ! $img ) continue;
					?>
					<div class="jg-prop-gallery__slide<?= $i === 0 ? ' is-active' : '' ?>" data-index="<?= $i ?>">
						<img src="<?= esc_url( $img[0] ) ?>" width="<?= esc_attr( $img[1] ) ?>" height="<?= esc_attr( $img[2] ) ?>"
							alt="<?= esc_attr( get_post_field( 'post_excerpt', $img_id ) ?: get_the_title() ) ?>"
							<?= $i === 0 ? '' : 'loading="lazy"' ?>>
					</div>
					<?php endforeach; ?>
				</div>
				<?php if ( $gallery_count > 1 ) : ?>
				<button class="jg-prop-gallery__nav jg-prop-gallery__nav--prev" aria-label="Претходна фотографија">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15 19l-7-7 7-7" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<button class="jg-prop-gallery__nav jg-prop-gallery__nav--next" aria-label="Следећа фотографија">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 5l7 7-7 7" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<div class="jg-prop-gallery__counter">
					<span class="jg-prop-gallery__counter-current">1</span>/<span><?= $gallery_count ?></span>
				</div>
				<?php endif; ?>
			</div>
			<!-- Thumbnails -->
			<?php if ( $gallery_count > 1 ) : ?>
			<div class="jg-prop-gallery__thumbs" role="tablist" aria-label="Галерија фотографија">
				<?php foreach ( $gallery_ids as $i => $img_id ) :
					$thumb = wp_get_attachment_image_src( $img_id, 'thumbnail' );
					if ( ! $thumb ) continue;
				?>
				<button class="jg-prop-gallery__thumb<?= $i === 0 ? ' is-active' : '' ?>"
					data-index="<?= $i ?>"
					role="tab"
					aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
					aria-label="Фотографија <?= $i + 1 ?>">
					<img src="<?= esc_url( $thumb[0] ) ?>" width="104" height="78" alt="" loading="lazy">
				</button>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- Main content -->
	<div class="jg-prop-single__content">
		<div class="jg-prop-single__content-inner">

			<!-- Badges -->
			<div class="jg-prop-single__badges">
				<?php if ( $tip_label ) : ?>
				<span class="jg-prop-badge jg-prop-badge--type"><?= esc_html( $tip_label ) ?></span>
				<?php endif; ?>
				<?php if ( $status_info ) : ?>
				<span class="jg-prop-badge jg-prop-badge--status" style="background:<?= esc_attr( $status_info['color'] ) ?>"><?= esc_html( $status_info['label'] ) ?></span>
				<?php endif; ?>
			</div>

			<!-- Title -->
			<h1 class="jg-prop-single__title"><?= esc_html( get_the_title() ) ?></h1>

			<!-- Location -->
			<?php if ( $lokacija ) : ?>
			<div class="jg-prop-single__location">
				<img src="<?= $icon_pin ?>" width="16" height="16" alt="" aria-hidden="true">
				<span><?= esc_html( $lokacija ) ?></span>
			</div>
			<?php endif; ?>

			<!-- Stats tiles -->
			<div class="jg-prop-single__stats">
				<?php if ( $povrsina ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_area ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $povrsina ) ?> м²</span>
					<span class="jg-prop-single__stat-label">Површина</span>
				</div>
				<?php endif; ?>
				<?php if ( $sobe ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_rooms ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $sobe ) ?></span>
					<span class="jg-prop-single__stat-label">Собе</span>
				</div>
				<?php endif; ?>
				<?php if ( $spavace !== '' && $spavace !== false ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_bed ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $spavace ) ?></span>
					<span class="jg-prop-single__stat-label">Спаваће собе</span>
				</div>
				<?php endif; ?>
				<?php if ( $kupatilo ) : ?>
				<div class="jg-prop-single__stat-tile">
					<img src="<?= $icon_bath ?>" width="32" height="32" alt="" aria-hidden="true">
					<span class="jg-prop-single__stat-value"><?= esc_html( $kupatilo ) ?></span>
					<span class="jg-prop-single__stat-label">Купатила</span>
				</div>
				<?php endif; ?>
			</div>

			<!-- Price -->
			<?php if ( $cena ) : ?>
			<div class="jg-prop-single__price-bar">
				<img src="<?= $icon_euro ?>" width="20" height="20" alt="" aria-hidden="true">
				<span><?= esc_html( number_format( (float) $cena, 0, ',', '.' ) ) ?></span>
			</div>
			<?php endif; ?>

			<!-- Description -->
			<?php
			$desc = get_the_content();
			if ( $desc ) :
			?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading">Опис</h2>
				<div class="jg-prop-single__description">
					<?= wp_kses_post( wpautop( $desc ) ) ?>
				</div>
			</div>
			<?php endif; ?>

			<!-- Additional info -->
			<?php $has_info = $sprat || $godina || $grejanje || $parking; ?>
			<?php if ( $has_info ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading">Додатне информације</h2>
				<div class="jg-prop-single__info-grid">
					<?php if ( $sprat ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label">Спрат</span>
						<span class="jg-prop-single__info-value"><?= esc_html( $sprat ) ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $godina ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label">Година изградње</span>
						<span class="jg-prop-single__info-value"><?= esc_html( $godina ) ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $grejanje ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label">Грејање</span>
						<span class="jg-prop-single__info-value"><?= esc_html( $grejanje ) ?></span>
					</div>
					<?php endif; ?>
					<?php if ( $parking ) : ?>
					<div class="jg-prop-single__info-row">
						<span class="jg-prop-single__info-label">Паркинг</span>
						<span class="jg-prop-single__info-value"><?= esc_html( $parking ) ?></span>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

			<!-- Amenities -->
			<?php $amenity_items = jg_parse_lines( $oprema ); ?>
			<?php if ( $amenity_items ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading">Опремљеност</h2>
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

			<!-- Room layout -->
			<?php $room_lines = jg_parse_lines( $prostorije ); ?>
			<?php if ( $room_lines ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading">Распоред просторија</h2>
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

			<!-- Location proximity -->
			<?php $blizina_lines = jg_parse_lines( $blizina ); ?>
			<?php if ( $blizina_lines ) : ?>
			<div class="jg-prop-single__section">
				<h2 class="jg-prop-single__section-heading">У близини</h2>
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

		</div><!-- /.jg-prop-single__content-inner -->
	</div><!-- /.jg-prop-single__content -->

	<!-- Interest CTA -->
	<div class="jg-prop-single__interest">
		<div class="jg-prop-single__interest-inner">
			<h2 class="jg-prop-single__interest-heading">Заинтересовани за ову некретнину?</h2>
			<p class="jg-prop-single__interest-sub">Контактирајте нас за додатне информације или закажите обилазак некретнине.</p>
			<div class="jg-prop-single__interest-actions">
				<a class="jg-btn jg-btn--gold" href="<?= esc_url( home_url( '/kontakt/' ) ) ?>">КОНТАКТИРАЈТЕ НАС</a>
				<a class="jg-btn jg-btn--outline-navy" href="<?= $archive ?>">ПОГЛЕДАЈТЕ ЈОШ НЕКРЕТНИНА</a>
			</div>
		</div>
	</div>

</div><!-- /.jg-prop-single -->

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
<!-- /wp:html -->
