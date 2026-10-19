<?php
/**
 * Title: Sofeija Каталози
 * Slug: jugogradnja/sofeija-katalozi
 * Categories: jugogradnja
 */
$uploads_base = content_url( 'uploads/katalozi/' );

/*
 * PDFs are uploaded straight to wp-content/uploads/katalozi/ via FTP,
 * not committed to the theme repo (they're ~330MB combined) - add
 * filenames here as new catalogs arrive.
 */
$catalogs = [
	[ 'label' => __( 'Профил компаније', 'jugogradnja' ), 'file' => 'profil-kompanije.pdf' ],
	[ 'label' => __( 'Каталог производа', 'jugogradnja' ), 'file' => 'katalog-proizvoda.pdf' ],
	[ 'label' => __( 'Најпродаванији производи', 'jugogradnja' ), 'file' => 'najprodavaniji-proizvodi.pdf' ],
	[ 'label' => __( 'Модуларна колекција плакара', 'jugogradnja' ), 'file' => 'modularna-kolekcija-plakara.pdf' ],
	[ 'label' => __( 'Слободностојећи намештај', 'jugogradnja' ), 'file' => 'slobodnostojeci-namestaj.pdf' ],
	[ 'label' => __( 'Дрвена врата', 'jugogradnja' ), 'file' => 'drvena-vrata.pdf' ],
	[ 'label' => __( 'Додаци', 'jugogradnja' ), 'file' => 'dodaci.pdf' ],
	[ 'label' => __( 'Комплетно решење за дом', 'jugogradnja' ), 'file' => 'kompletno-resenje-za-dom.pdf' ],
	[ 'label' => __( 'Хотелски пројекти', 'jugogradnja' ), 'file' => 'hotelski-projekti.pdf' ],
	[ 'label' => __( 'Пројекти', 'jugogradnja' ), 'file' => 'projekti.pdf' ],
];
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
				   target="_blank"
				   rel="noopener">
					<?= esc_html( $cat['label'] ) ?>
					<svg class="jg-sof-katalozi__tab-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</a>
				<?php endforeach; ?>
			</nav>
			<div class="jg-sof-katalozi__viewer">
				<div class="jg-sof-katalozi__viewer-bar">
					<span class="jg-sof-katalozi__viewer-label"><?= esc_html( $catalogs[0]['label'] ) ?></span>
					<div class="jg-sof-katalozi__viewer-actions">
						<a class="jg-sof-katalozi__viewer-open" href="<?= esc_url( $uploads_base . $catalogs[0]['file'] ) ?>" target="_blank" rel="noopener"><?= esc_html__( 'Отвори у новој картици', 'jugogradnja' ) ?></a>
						<a class="jg-sof-katalozi__viewer-download" href="<?= esc_url( $uploads_base . $catalogs[0]['file'] ) ?>" download><?= esc_html__( 'Преузми', 'jugogradnja' ) ?></a>
					</div>
				</div>
				<iframe class="jg-sof-katalozi__frame" src="<?= esc_url( $uploads_base . $catalogs[0]['file'] ) ?>" title="<?= esc_attr__( 'Преглед каталога', 'jugogradnja' ) ?>"></iframe>
			</div>
		</div>
	</div>
</section>
