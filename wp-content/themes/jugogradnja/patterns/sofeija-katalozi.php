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
 * 'pages' + 'folder' make the viewer show fast pre-split page images
 * (assets/images/katalozi/<folder>/page-NN.jpg) as a scrolling stack,
 * loaded one page at a time in order, instead of embedding the full
 * PDF. "Отвори у новој картици" and "Преузми" still point at the real
 * PDF either way. A catalog without 'pages' falls back to the plain
 * iframe embed.
 */
$catalogs = [
	[ 'label' => __( 'Каталог производа', 'jugogradnja' ), 'file' => 'katalog-proizvoda.pdf', 'pages' => 54, 'folder' => 'katalog-proizvoda' ],
	[ 'label' => __( 'Комплетно решење за дом', 'jugogradnja' ), 'file' => 'kompletno-resenje-za-dom.pdf', 'pages' => 62, 'folder' => 'kompletno-resenje-za-dom' ],
	[ 'label' => __( 'Хотелски пројекти', 'jugogradnja' ), 'file' => 'hotelski-projekti.pdf', 'pages' => 44, 'folder' => 'hotelski-projekti' ],
	[ 'label' => __( 'Дрвена врата', 'jugogradnja' ), 'file' => 'drvena-vrata.pdf', 'pages' => 63, 'folder' => 'drvena-vrata' ],
	[ 'label' => __( 'Слободностојећи намештај', 'jugogradnja' ), 'file' => 'slobodnostojeci-namestaj.pdf', 'pages' => 17, 'folder' => 'slobodnostojeci-namestaj' ],
	[ 'label' => __( 'Модуларна колекција плакара', 'jugogradnja' ), 'file' => 'modularna-kolekcija-plakara.pdf', 'pages' => 73, 'folder' => 'modularna-kolekcija-plakara' ],
	[ 'label' => __( 'Додаци', 'jugogradnja' ), 'file' => 'dodaci.pdf', 'pages' => 17, 'folder' => 'dodaci' ],
	[ 'label' => __( 'Пројекти', 'jugogradnja' ), 'file' => 'projekti.pdf', 'pages' => 46, 'folder' => 'projekti' ],
	[ 'label' => __( 'Профил компаније', 'jugogradnja' ), 'file' => 'profil-kompanije.pdf', 'pages' => 29, 'folder' => 'profil-kompanije' ],
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

				<!-- Fast scroll-stack viewer (shown when the active catalog has pre-split page images).
				     Pages are stacked vertically, no pagination - each page image is only
				     requested once the one before it has finished loading. -->
				<div class="jg-sof-katalozi__pager" id="jg-sof-pager"<?= empty( $first['pages'] ) ? ' hidden' : '' ?>></div>

				<!-- Plain PDF embed (shown for catalogs without page images) -->
				<iframe class="jg-sof-katalozi__frame" id="jg-sof-pdf-frame" src="<?= empty( $first['pages'] ) ? esc_url( $uploads_base . $first['file'] ) : '' ?>" title="<?= esc_attr__( 'Преглед каталога', 'jugogradnja' ) ?>"<?= empty( $first['pages'] ) ? '' : ' hidden' ?>></iframe>
			</div>
		</div>
	</div>
</section>
