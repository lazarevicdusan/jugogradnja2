<?php
/**
 * Title: Sofeija Каталози
 * Slug: jugogradnja/sofeija-katalozi
 * Categories: jugogradnja
 */
$uploads_base = content_url( 'uploads/katalozi/' );
$images_base  = get_template_directory_uri() . '/assets/images/katalozi/';

/*
 * PDFs are uploaded straight to wp-content/uploads/katalozi/ via FTP,
 * not committed to the theme repo (they're ~330MB combined) - add
 * filenames here as new catalogs arrive.
 *
 * 'pages' + 'folder' are optional: when set, the viewer shows fast
 * pre-split page images (assets/images/katalozi/<folder>/page-NN.jpg)
 * with a prev/next pager instead of embedding the full PDF, so only
 * the page being viewed is ever downloaded. "Отвори у новој картици"
 * and "Преузми" still point at the real PDF either way. Catalogs
 * without 'pages' keep the plain iframe embed.
 */
$catalogs = [
	[ 'label' => __( 'Каталог производа', 'jugogradnja' ), 'file' => 'katalog-proizvoda.pdf', 'pages' => 54, 'folder' => 'katalog-proizvoda' ],
	[ 'label' => __( 'Комплетно решење за дом', 'jugogradnja' ), 'file' => 'kompletno-resenje-za-dom.pdf' ],
	[ 'label' => __( 'Хотелски пројекти', 'jugogradnja' ), 'file' => 'hotelski-projekti.pdf' ],
	[ 'label' => __( 'Дрвена врата', 'jugogradnja' ), 'file' => 'drvena-vrata.pdf' ],
	[ 'label' => __( 'Слободностојећи намештај', 'jugogradnja' ), 'file' => 'slobodnostojeci-namestaj.pdf' ],
	[ 'label' => __( 'Модуларна колекција плакара', 'jugogradnja' ), 'file' => 'modularna-kolekcija-plakara.pdf' ],
	[ 'label' => __( 'Додаци', 'jugogradnja' ), 'file' => 'dodaci.pdf' ],
	[ 'label' => __( 'Пројекти', 'jugogradnja' ), 'file' => 'projekti.pdf' ],
	[ 'label' => __( 'Профил компаније', 'jugogradnja' ), 'file' => 'profil-kompanije.pdf' ],
];

$first = $catalogs[0];
?>
<section class="jg-sof-katalozi">
	<div class="jg-sof-katalozi__inner">
		<h1 class="jg-sof-katalozi__heading"><?= esc_html__( 'Каталози', 'jugogradnja' ) ?></h1>
		<div class="jg-sof-katalozi__layout">
			<nav class="jg-sof-katalozi__tabs" aria-label="<?= esc_attr__( 'Листа каталога', 'jugogradnja' ) ?>">
				<?php foreach ( $catalogs as $i => $cat ) :
					$url = esc_url( $uploads_base . $cat['file'] );
				?>
				<a class="jg-sof-katalozi__tab<?= 0 === $i ? ' is-active' : '' ?>"
				   href="<?= $url ?>"
				   data-pdf="<?= $url ?>"
				   <?php if ( ! empty( $cat['pages'] ) ) : ?>
				   data-pages="<?= (int) $cat['pages'] ?>"
				   data-imgbase="<?= esc_url( $images_base . $cat['folder'] . '/' ) ?>"
				   <?php endif; ?>
				   target="_blank"
				   rel="noopener">
					<?= esc_html( $cat['label'] ) ?>
					<svg class="jg-sof-katalozi__tab-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</a>
				<?php endforeach; ?>
			</nav>
			<div class="jg-sof-katalozi__viewer">
				<div class="jg-sof-katalozi__viewer-bar">
					<span class="jg-sof-katalozi__viewer-label"><?= esc_html( $first['label'] ) ?></span>
					<div class="jg-sof-katalozi__viewer-actions">
						<a class="jg-sof-katalozi__viewer-open" href="<?= esc_url( $uploads_base . $first['file'] ) ?>" target="_blank" rel="noopener"><?= esc_html__( 'Отвори у новој картици', 'jugogradnja' ) ?></a>
						<a class="jg-sof-katalozi__viewer-download" href="<?= esc_url( $uploads_base . $first['file'] ) ?>" download><?= esc_html__( 'Преузми', 'jugogradnja' ) ?></a>
					</div>
				</div>

				<!-- Fast pager (shown when the active catalog has pre-split page images) -->
				<div class="jg-sof-katalozi__pager" id="jg-sof-pager"<?= empty( $first['pages'] ) ? ' hidden' : '' ?>>
					<div class="jg-sof-katalozi__pager-frame">
						<div class="jg-sof-katalozi__pager-spinner" id="jg-sof-pager-spinner"></div>
						<img class="jg-sof-katalozi__pager-img" id="jg-sof-pager-img" alt="">
					</div>
					<div class="jg-sof-katalozi__pager-controls">
						<button class="jg-sof-katalozi__pager-nav" id="jg-sof-pager-prev" type="button"><?= esc_html__( '← Претходна', 'jugogradnja' ) ?></button>
						<span class="jg-sof-katalozi__pager-count"><span id="jg-sof-pager-num">1</span> / <span id="jg-sof-pager-total">1</span></span>
						<button class="jg-sof-katalozi__pager-nav" id="jg-sof-pager-next" type="button"><?= esc_html__( 'Следећа →', 'jugogradnja' ) ?></button>
					</div>
				</div>

				<!-- Plain PDF embed (shown for catalogs without page images) -->
				<iframe class="jg-sof-katalozi__frame" id="jg-sof-pdf-frame" src="<?= empty( $first['pages'] ) ? esc_url( $uploads_base . $first['file'] ) : '' ?>" title="<?= esc_attr__( 'Преглед каталога', 'jugogradnja' ) ?>"<?= empty( $first['pages'] ) ? '' : ' hidden' ?>></iframe>
			</div>
		</div>
	</div>
</section>
