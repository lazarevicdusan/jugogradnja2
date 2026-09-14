<?php
/**
 * Title: VELUX Упит
 * Slug: jugogradnja/velux-upit
 * Categories: jugogradnja
 */
$velux_nonce = wp_create_nonce( 'jg_velux_upit' );
?>
<section class="jg-velux-upit">
	<div class="jg-velux-upit__inner">
		<h2 class="jg-velux-upit__heading"><?= esc_html__( 'Упит за VELUX производе', 'jugogradnja' ) ?></h2>
		<p class="jg-velux-upit__sub"><?= esc_html__( 'Брзо и једноставно до ваше идеалне понуде!', 'jugogradnja' ) ?></p>

		<?php if ( isset( $_GET['jg_sent'] ) && 'velux' === $_GET['jg_sent'] ) : ?>
		<div class="jg-form-notice jg-form-notice--success"><?= esc_html__( 'Хвала! Ваш упит је успешно послат.', 'jugogradnja' ) ?></div>
		<?php elseif ( isset( $_GET['jg_error'] ) && 'velux' === $_GET['jg_error'] ) : ?>
		<div class="jg-form-notice jg-form-notice--error"><?= esc_html__( 'Дошло је до грешке. Молимо покушајте поново.', 'jugogradnja' ) ?></div>
		<?php endif; ?>

		<!-- Card selection -->
		<div class="jg-velux-upit__cards" id="jg-upit-cards">
			<button class="jg-velux-upit__card" data-upit="prozori" type="button">
				<div class="jg-velux-upit__icon">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect x="2" y="2" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/><rect x="17" y="2" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/><rect x="2" y="17" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/><rect x="17" y="17" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/></svg>
				</div>
				<h3 class="jg-velux-upit__card-title"><?= esc_html__( 'VELUX кровни прозори', 'jugogradnja' ) ?></h3>
				<p class="jg-velux-upit__card-text"><?= esc_html__( 'Добијте понуду за VELUX основни или стандард кровне прозоре', 'jugogradnja' ) ?></p>
			</button>
			<button class="jg-velux-upit__card" data-upit="roletne" type="button">
				<div class="jg-velux-upit__icon">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect x="4" y="4" width="24" height="24" rx="3" stroke="#C5A059" stroke-width="1.8"/><line x1="4" y1="12" x2="28" y2="12" stroke="#C5A059" stroke-width="1.8"/></svg>
				</div>
				<h3 class="jg-velux-upit__card-title"><?= esc_html__( 'VELUX ролетне', 'jugogradnja' ) ?></h3>
				<p class="jg-velux-upit__card-text"><?= esc_html__( 'Добијте понуду за спољашње, унутрашње ролетне или комарнике', 'jugogradnja' ) ?></p>
			</button>
		</div>

		<!-- Form: Прозори -->
		<div class="jg-velux-upit__form-wrap" id="jg-upit-form-prozori" hidden>
			<div class="jg-velux-upit__form-box">
				<div class="jg-velux-upit__form-header">
					<h3 class="jg-velux-upit__form-title"><?= esc_html__( 'Упит за VELUX кровне прозоре', 'jugogradnja' ) ?></h3>
					<button class="jg-velux-upit__back" data-upit-back type="button">← <?= esc_html__( 'Назад на избор', 'jugogradnja' ) ?></button>
				</div>
				<form class="jg-velux-upit__form" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" method="post" novalidate>
					<input type="hidden" name="action" value="jg_velux">
					<input type="hidden" name="jg_velux_nonce" value="<?= esc_attr( $velux_nonce ) ?>">
					<input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
					<input type="hidden" name="upit_tip" value="prozori">
					<div class="jg-velux-upit__row">
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-ime"><?= esc_html__( 'Ime и презиме', 'jugogradnja' ) ?> *</label>
							<input class="jg-velux-upit__input" id="upit-p-ime" type="text" name="ime" placeholder="<?= esc_attr__( 'Ваше иme', 'jugogradnja' ) ?>" required>
						</div>
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-tel"><?= esc_html__( 'Телефон', 'jugogradnja' ) ?> *</label>
							<input class="jg-velux-upit__input" id="upit-p-tel" type="tel" name="telefon" placeholder="+381 64 123 4567" required>
						</div>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-email"><?= esc_html__( 'Е-пошта', 'jugogradnja' ) ?> *</label>
						<input class="jg-velux-upit__input" id="upit-p-email" type="email" name="email" placeholder="vas.email@primer.com" required>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-tip"><?= esc_html__( 'Тип прозора', 'jugogradnja' ) ?> *</label>
						<select class="jg-velux-upit__select" id="upit-p-tip" name="tip_prozora" required>
							<option value=""><?= esc_html__( 'Изаберите тип...', 'jugogradnja' ) ?></option>
							<option value="osnovni"><?= esc_html__( 'Основни', 'jugogradnja' ) ?></option>
							<option value="standard"><?= esc_html__( 'Стандард', 'jugogradnja' ) ?></option>
							<option value="komfor"><?= esc_html__( 'Комфор', 'jugogradnja' ) ?></option>
							<option value="komfor-plus"><?= esc_html__( 'Комфор Плус', 'jugogradnja' ) ?></option>
						</select>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-mat"><?= esc_html__( 'Материјал', 'jugogradnja' ) ?> *</label>
						<select class="jg-velux-upit__select" id="upit-p-mat" name="materijal" required>
							<option value=""><?= esc_html__( 'Изаберите материјал...', 'jugogradnja' ) ?></option>
							<option value="drvo"><?= esc_html__( 'Дрво', 'jugogradnja' ) ?></option>
							<option value="pvc">ПВЦ</option>
							<option value="metal"><?= esc_html__( 'Метал', 'jugogradnja' ) ?></option>
						</select>
					</div>
					<div class="jg-velux-upit__row">
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-razmak"><?= esc_html__( 'Размак између греда', 'jugogradnja' ) ?></label>
							<input class="jg-velux-upit__input" id="upit-p-razmak" type="text" name="razmak" placeholder="<?= esc_attr__( 'нпр. 78 cm', 'jugogradnja' ) ?>">
						</div>
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-broj"><?= esc_html__( 'Број прозора', 'jugogradnja' ) ?></label>
							<input class="jg-velux-upit__input" id="upit-p-broj" type="number" name="broj" placeholder="<?= esc_attr__( 'нпр. 2', 'jugogradnja' ) ?>" min="1">
						</div>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-napomena"><?= esc_html__( 'Додатне напомене', 'jugogradnja' ) ?></label>
						<textarea class="jg-velux-upit__textarea" id="upit-p-napomena" name="napomena" rows="5" placeholder="<?= esc_attr__( 'Унесите додатне информације или питања...', 'jugogradnja' ) ?>"></textarea>
					</div>
					<div class="jg-velux-upit__submit-wrap">
						<button class="jg-velux-upit__submit" type="submit"><?= esc_html__( 'ПОШАЉИ УПИТ', 'jugogradnja' ) ?></button>
						<p class="jg-velux-upit__submit-note"><?= esc_html__( 'Наш тим ће вас контактирати у најкраћем могућем року', 'jugogradnja' ) ?></p>
					</div>
				</form>
			</div>
		</div>

		<!-- Form: Ролетне -->
		<div class="jg-velux-upit__form-wrap" id="jg-upit-form-roletne" hidden>
			<div class="jg-velux-upit__form-box">
				<div class="jg-velux-upit__form-header">
					<h3 class="jg-velux-upit__form-title"><?= esc_html__( 'Упит за VELUX ролетне', 'jugogradnja' ) ?></h3>
					<button class="jg-velux-upit__back" data-upit-back type="button">← <?= esc_html__( 'Назад на избор', 'jugogradnja' ) ?></button>
				</div>
				<form class="jg-velux-upit__form" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" method="post" novalidate>
					<input type="hidden" name="action" value="jg_velux">
					<input type="hidden" name="jg_velux_nonce" value="<?= esc_attr( $velux_nonce ) ?>">
					<input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
					<input type="hidden" name="upit_tip" value="roletne">
					<div class="jg-velux-upit__row">
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-r-ime"><?= esc_html__( 'Ime и презиме', 'jugogradnja' ) ?> *</label>
							<input class="jg-velux-upit__input" id="upit-r-ime" type="text" name="ime" placeholder="<?= esc_attr__( 'Ваше иme', 'jugogradnja' ) ?>" required>
						</div>
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-r-tel"><?= esc_html__( 'Телефон', 'jugogradnja' ) ?> *</label>
							<input class="jg-velux-upit__input" id="upit-r-tel" type="tel" name="telefon" placeholder="+381 64 123 4567" required>
						</div>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-email"><?= esc_html__( 'Е-пошта', 'jugogradnja' ) ?> *</label>
						<input class="jg-velux-upit__input" id="upit-r-email" type="email" name="email" placeholder="vas.email@primer.com" required>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-tip"><?= esc_html__( 'Тип ролетне', 'jugogradnja' ) ?> *</label>
						<select class="jg-velux-upit__select" id="upit-r-tip" name="tip_roletne" required>
							<option value=""><?= esc_html__( 'Изаберите тип...', 'jugogradnja' ) ?></option>
							<option value="spoljasnja"><?= esc_html__( 'Спољашне ролетне', 'jugogradnja' ) ?></option>
							<option value="unutrasnja"><?= esc_html__( 'Унутрашње ролетне', 'jugogradnja' ) ?></option>
							<option value="komar"><?= esc_html__( 'Комарник', 'jugogradnja' ) ?></option>
						</select>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-vel"><?= esc_html__( 'Величина прозора', 'jugogradnja' ) ?></label>
						<input class="jg-velux-upit__input" id="upit-r-vel" type="text" name="velicina" placeholder="<?= esc_attr__( 'нпр. CK02, FK06, MK08...', 'jugogradnja' ) ?>">
						<p class="jg-velux-upit__hint"><?= esc_html__( 'Величину прозора можете видети на плочици на горњој страни прозора када га отворите', 'jugogradnja' ) ?></p>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-boja"><?= esc_html__( 'Боја (за ролетне)', 'jugogradnja' ) ?></label>
						<select class="jg-velux-upit__select" id="upit-r-boja" name="boja">
							<option value=""><?= esc_html__( 'Изаберите боју...', 'jugogradnja' ) ?></option>
							<option value="bela"><?= esc_html__( 'Бела', 'jugogradnja' ) ?></option>
							<option value="srebrna"><?= esc_html__( 'Сребрна', 'jugogradnja' ) ?></option>
							<option value="braon"><?= esc_html__( 'Браон', 'jugogradnja' ) ?></option>
							<option value="antracit"><?= esc_html__( 'Антрацит', 'jugogradnja' ) ?></option>
						</select>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-napomena"><?= esc_html__( 'Додатне напомене', 'jugogradnja' ) ?></label>
						<textarea class="jg-velux-upit__textarea" id="upit-r-napomena" name="napomena" rows="5" placeholder="<?= esc_attr__( 'Унесите додатне информације или питања...', 'jugogradnja' ) ?>"></textarea>
					</div>
					<div class="jg-velux-upit__submit-wrap">
						<button class="jg-velux-upit__submit" type="submit"><?= esc_html__( 'ПОШАЉИ УПИТ', 'jugogradnja' ) ?></button>
						<p class="jg-velux-upit__submit-note"><?= esc_html__( 'Наш тим ће вас контактирати у најкраћем могућем року', 'jugogradnja' ) ?></p>
					</div>
				</form>
			</div>
		</div>

		<!-- Contact bar (always visible) -->
		<div class="jg-velux-upit__contact">
			<p class="jg-velux-upit__contact-label"><?= esc_html__( 'Преферирате директан контакт?', 'jugogradnja' ) ?></p>
			<div class="jg-velux-upit__contact-links">
				<a class="jg-velux-upit__contact-link" href="tel:+381648115868">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5.5 9c1.2 2.3 3.2 4.3 5.5 5.5l1.8-1.8c.2-.2.6-.3.9-.2.9.3 1.9.5 3 .5.5 0 .8.4.8.8V17c0 .5-.3.8-.8.8C8.8 17.8 2 11 2 2.8 2 2.3 2.3 2 2.8 2H5.7c.5 0 .8.3.8.8 0 1.1.2 2.1.5 3 .1.3 0 .6-.2.8L5.5 9z" stroke="rgba(255,255,255,0.9)" stroke-width="1.4" stroke-linecap="round"/></svg>
					064 811-58-68
				</a>
				<span class="jg-velux-upit__sep">|</span>
				<a class="jg-velux-upit__contact-link" href="mailto:prodaja@jugogradnja.rs">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><rect x="2" y="4" width="16" height="12" rx="2" stroke="rgba(255,255,255,0.9)" stroke-width="1.4"/><path d="M2 7l8 5 8-5" stroke="rgba(255,255,255,0.9)" stroke-width="1.4" stroke-linecap="round"/></svg>
					prodaja@jugogradnja.rs
				</a>
			</div>
		</div>
	</div>
</section>

<script>
(function () {
  var cards   = document.getElementById('jg-upit-cards');
  var forms   = {
    prozori: document.getElementById('jg-upit-form-prozori'),
    roletne: document.getElementById('jg-upit-form-roletne'),
  };

  function showForm(type) {
    cards.setAttribute('hidden', '');
    Object.keys(forms).forEach(function (k) {
      if (k === type) {
        forms[k].removeAttribute('hidden');
        forms[k].scrollIntoView({ behavior: 'smooth', block: 'start' });
      } else {
        forms[k].setAttribute('hidden', '');
      }
    });
  }

  function showCards() {
    cards.removeAttribute('hidden');
    Object.keys(forms).forEach(function (k) { forms[k].setAttribute('hidden', ''); });
    cards.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  document.querySelectorAll('.jg-velux-upit__card[data-upit]').forEach(function (btn) {
    btn.addEventListener('click', function () { showForm(btn.getAttribute('data-upit')); });
  });

  document.querySelectorAll('[data-upit-back]').forEach(function (btn) {
    btn.addEventListener('click', showCards);
  });
})();
</script>
