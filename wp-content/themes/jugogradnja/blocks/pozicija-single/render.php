<?php
/**
 * Render callback for jugogradnja/pozicija-single block.
 */

$id = isset( $block->context['postId'] ) ? (int) $block->context['postId'] : get_the_ID();
if ( ! $id || get_post_type( $id ) !== 'pozicija' ) {
	return;
}

$t        = get_template_directory_uri();
$archive  = esc_url( home_url( '/karijera/pozicije/' ) );
$title    = get_the_title( $id );
$tip      = get_post_meta( $id, '_pozicija_tip', true ) ?: 'Пуно радно време';
$lokacija = get_post_meta( $id, '_pozicija_lokacija', true ) ?: 'Београд';
$opis_uvod = get_post_meta( $id, '_pozicija_opis_uvod', true );
$opis     = get_post_meta( $id, '_pozicija_opis', true );
$uslovi   = get_post_meta( $id, '_pozicija_uslovi', true );
$nudimo   = get_post_meta( $id, '_pozicija_nudimo', true );

$parse_lines = function ( $raw ) {
	if ( ! $raw ) return [];
	return array_filter( array_map( 'trim', explode( "\n", $raw ) ) );
};

// Inline SVG icons
$pin_icon = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M8 1.5A4.5 4.5 0 0 1 12.5 6c0 3-4.5 8.5-4.5 8.5S3.5 9 3.5 6A4.5 4.5 0 0 1 8 1.5Z" stroke="rgba(255,255,255,.8)" stroke-width="1.2"/><circle cx="8" cy="6" r="1.5" stroke="rgba(255,255,255,.8)" stroke-width="1.2"/></svg>';
$bag_icon = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M10.667 4.667V3.333A1.333 1.333 0 0 0 9.333 2H6.667a1.333 1.333 0 0 0-1.334 1.333v1.334M2 4.667h12v8A1.333 1.333 0 0 1 12.667 14H3.333A1.333 1.333 0 0 1 2 12.667v-8Z" stroke="rgba(255,255,255,.8)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$check_icon = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><circle cx="10" cy="10" r="9" stroke="#C5A059" stroke-width="1.2"/><path d="M6.5 10l2.5 2.5 4.5-5" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$medal_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm-3.5 1.5 1.5 6 2-2.5 2 2.5 1.5-6" stroke="#C5A059" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>';

$nonce = wp_create_nonce( 'jg_apply_form' );

?>
<!-- Back link -->
<div class="jg-poz-back">
	<div class="jg-poz-back__inner">
		<a class="jg-poz-back__link" href="<?= $archive ?>">
			<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
				<path d="M10 13L5 8L10 3" stroke="#212950" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			Назад на Каријеру
		</a>
	</div>
</div>

<!-- Hero -->
<div class="jg-poz-hero">
	<div class="jg-poz-hero__inner">
		<h1 class="jg-poz-hero__title"><?= esc_html( $title ) ?></h1>
		<div class="jg-poz-hero__meta">
			<span class="jg-poz-hero__meta-item">
				<?= $pin_icon ?>
				<?= esc_html( $lokacija ) ?>
			</span>
			<span class="jg-poz-hero__meta-item">
				<?= $bag_icon ?>
				<?= esc_html( $tip ) ?>
			</span>
		</div>
	</div>
</div>

<!-- Content -->
<div class="jg-poz-content">
	<div class="jg-poz-content__inner">

		<?php $opis_lines = $parse_lines( $opis ); if ( $opis_uvod || $opis_lines ) : ?>
		<div class="jg-poz-section">
			<h2 class="jg-poz-section__heading">Опис посла</h2>
			<?php if ( $opis_uvod ) : ?>
			<p class="jg-poz-section__text"><?= esc_html( $opis_uvod ) ?></p>
			<?php endif; ?>
			<?php if ( $opis_lines ) : ?>
			<ul class="jg-poz-checklist">
				<?php foreach ( $opis_lines as $item ) : ?>
				<li class="jg-poz-checklist__item">
					<?= $check_icon ?>
					<span><?= esc_html( $item ) ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php $uslovi_lines = $parse_lines( $uslovi ); if ( $uslovi_lines ) : ?>
		<div class="jg-poz-section jg-poz-section--shaded">
			<h2 class="jg-poz-section__heading">Услови за конкурс</h2>
			<ul class="jg-poz-checklist">
				<?php foreach ( $uslovi_lines as $item ) : ?>
				<li class="jg-poz-checklist__item">
					<?= $check_icon ?>
					<span><?= esc_html( $item ) ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php $nudimo_lines = $parse_lines( $nudimo ); if ( $nudimo_lines ) : ?>
		<div class="jg-poz-nudimo-card">
			<div class="jg-poz-nudimo-card__heading">
				<?= $medal_icon ?>
				<h2>Нудимо</h2>
			</div>
			<ul class="jg-poz-checklist">
				<?php foreach ( $nudimo_lines as $item ) : ?>
				<li class="jg-poz-checklist__item">
					<?= $check_icon ?>
					<span><?= esc_html( $item ) ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<!-- Application form -->
		<div class="jg-poz-apply">
			<h2 class="jg-poz-apply__heading">Kako се пријавити</h2>
			<p class="jg-poz-apply__sub">Ако сматрате да испуњавате наше критеријуме и да Југоградња представља правог послодавца за Вас, пошаљите нам своју радну биографију на српском језику са фотографијом.</p>
			<div class="jg-poz-apply__form-wrap">
				<?php if ( isset( $_GET['jg_sent'] ) && 'apply' === $_GET['jg_sent'] ) : ?>
				<div class="jg-form-notice jg-form-notice--success">Хвала! Ваша пријава је успешно послата.</div>
				<?php elseif ( isset( $_GET['jg_error'] ) && 'apply' === $_GET['jg_error'] ) : ?>
				<div class="jg-form-notice jg-form-notice--error">Дошло је до грешке. Проверите да ли је CV у PDF формату (до 5MB) и покушајте поново.</div>
				<?php endif; ?>
				<form class="jg-apply-form" id="apply-form" method="post" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" enctype="multipart/form-data" novalidate>
					<input type="hidden" name="action" value="jg_apply">
					<input type="hidden" name="jg_apply_nonce" value="<?= esc_attr( $nonce ) ?>">
					<input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
					<div class="jg-apply-form__row jg-apply-form__row--2col">
						<div class="jg-apply-form__field">
							<label class="jg-apply-form__label" for="poz-name">Ime и презиме <span aria-hidden="true">*</span></label>
							<input class="jg-apply-form__input" type="text" id="poz-name" name="apply_name" required autocomplete="name" placeholder="Ваше ime">
						</div>
						<div class="jg-apply-form__field">
							<label class="jg-apply-form__label" for="poz-email">Емаил адреса <span aria-hidden="true">*</span></label>
							<input class="jg-apply-form__input" type="email" id="poz-email" name="apply_email" required autocomplete="email" placeholder="vasa@email.com">
						</div>
					</div>
					<div class="jg-apply-form__row jg-apply-form__row--2col">
						<div class="jg-apply-form__field">
							<label class="jg-apply-form__label" for="poz-phone">Телефон</label>
							<input class="jg-apply-form__input" type="tel" id="poz-phone" name="apply_phone" autocomplete="tel" placeholder="+381 11 123 4567">
						</div>
						<div class="jg-apply-form__field">
							<label class="jg-apply-form__label" for="poz-position">Позиција за коју конкуришете <span aria-hidden="true">*</span></label>
							<input class="jg-apply-form__input" type="text" id="poz-position" name="apply_position" required value="<?= esc_attr( $title ) ?>">
						</div>
					</div>
					<div class="jg-apply-form__field">
						<label class="jg-apply-form__label" for="poz-motivation">Мотивационо писмо</label>
						<textarea class="jg-apply-form__textarea" id="poz-motivation" name="apply_motivation" rows="5" placeholder="Зашто желите да радите са нама..."></textarea>
					</div>
					<div class="jg-apply-form__field">
						<label class="jg-apply-form__label" for="poz-cv">CV (PDF) са фотографијом</label>
						<div class="jg-apply-form__upload-area">
							<input class="jg-apply-form__file" type="file" id="poz-cv" name="apply_cv[]" accept=".pdf" multiple>
							<label class="jg-apply-form__upload-label" for="poz-cv">
								<svg width="32" height="32" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M21 15V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12" stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
								<span class="jg-apply-form__upload-text">Кликните или превуците фајлове овде</span>
								<span class="jg-apply-form__upload-hint">Радна биографија на српском језику са фотографијом - до 3 документа (PDF)</span>
							</label>
						</div>
						<ul class="jg-apply-form__file-list" aria-live="polite"></ul>
					</div>
					<button class="jg-apply-form__submit" type="submit">ПОШАЉИТЕ ПРИЈАВУ</button>
				</form>
			</div>
		</div>

	</div>
</div>
