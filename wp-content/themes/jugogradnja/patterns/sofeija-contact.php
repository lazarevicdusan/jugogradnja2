<?php
/**
 * Title: Sofeija Контакт форма
 * Slug: jugogradnja/sofeija-contact
 * Categories: jugogradnja
 */
$t     = get_template_directory_uri();
$nonce = wp_create_nonce( 'jg_sofeija_contact' );
?>
<section class="jg-sofeija-contact">
	<div class="jg-sofeija-contact__bg" aria-hidden="true">
		<img src="<?= $t ?>/assets/images/sofeija/section2-bg.jpg" alt="" width="1920" height="1012" loading="lazy">
		<div class="jg-sofeija-contact__overlay"></div>
	</div>
	<div class="jg-sofeija-contact__inner">
		<div class="jg-sofeija-contact__left">
			<h2 class="jg-sofeija-contact__heading">Тражите више информација?</h2>
			<div class="jg-sofeija-contact__accent"></div>
			<p class="jg-sofeija-contact__body">Слободно нам пошаљите свој упит и детаље пројекта. Контактираћемо вас у року од 24 сата!<br>Више волите директан разговор? Позовите нас на:</p>
			<a class="jg-btn jg-btn--gold" href="tel:+381642433334">064 243 33 34</a>
			<span class="jg-sofeija-contact__catalog-label">Погледајте целокупну понуду</span>
			<a class="jg-btn jg-btn--gold jg-btn--catalog" href="#">Преузмите наш каталог</a>
		</div>
		<div class="jg-sofeija-contact__right">
			<?php if ( isset( $_GET['jg_sent'] ) && 'sofeija' === $_GET['jg_sent'] ) : ?>
			<div class="jg-form-notice jg-form-notice--success">Хвала! Ваш упит је успешно послат.</div>
			<?php elseif ( isset( $_GET['jg_error'] ) && 'sofeija' === $_GET['jg_error'] ) : ?>
			<div class="jg-form-notice jg-form-notice--error">Дошло је до грешке. Молимо покушајте поново.</div>
			<?php endif; ?>
			<form class="jg-sofeija-form" id="sofeija-form" method="post" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" novalidate>
				<input type="hidden" name="action" value="jg_sofeija">
				<input type="hidden" name="jg_sofeija_nonce" value="<?= esc_attr( $nonce ) ?>">
				<input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
				<div class="jg-sofeija-form__row">
					<div class="jg-sofeija-form__field">
						<label class="jg-sofeija-form__label" for="sf-name">Ime и презиме <span aria-hidden="true">*</span></label>
						<input class="jg-sofeija-form__input" type="text" id="sf-name" name="sf_name" required autocomplete="name" placeholder="Ime и презиме">
					</div>
					<div class="jg-sofeija-form__field">
						<label class="jg-sofeija-form__label" for="sf-phone">Број телефона <span aria-hidden="true">*</span></label>
						<input class="jg-sofeija-form__input" type="tel" id="sf-phone" name="sf_phone" required autocomplete="tel" placeholder="Phone number / WhatsApp">
					</div>
				</div>
				<div class="jg-sofeija-form__row">
					<div class="jg-sofeija-form__field">
						<label class="jg-sofeija-form__label" for="sf-city">Град <span aria-hidden="true">*</span></label>
						<input class="jg-sofeija-form__input" type="text" id="sf-city" name="sf_city" required autocomplete="address-level2" placeholder="Град">
					</div>
					<div class="jg-sofeija-form__field">
						<label class="jg-sofeija-form__label" for="sf-company">Назив Фирме</label>
						<input class="jg-sofeija-form__input" type="text" id="sf-company" name="sf_company" autocomplete="organization" placeholder="Назив">
					</div>
				</div>
				<div class="jg-sofeija-form__field">
					<label class="jg-sofeija-form__label" for="sf-email">E-mail <span aria-hidden="true">*</span></label>
					<input class="jg-sofeija-form__input" type="email" id="sf-email" name="sf_email" required autocomplete="email" placeholder="E-mail">
				</div>
				<div class="jg-sofeija-form__field">
					<label class="jg-sofeija-form__label" for="sf-message">Молимо вас да наведете више детаља како бисмо боље разумели ваше пословне потребе.</label>
					<textarea class="jg-sofeija-form__textarea" id="sf-message" name="sf_message" rows="4" placeholder="(Молимо вас да представите своје пројекте, искуство у индустрији, потребе за производима итд.)"></textarea>
				</div>
				<p class="jg-sofeija-form__note">Поља означена са * су обавезна</p>
				<button class="jg-sofeija-form__submit" type="submit">Пошаљи</button>
			</form>
		</div>
	</div>
</section>
