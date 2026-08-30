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
		<h2 class="jg-velux-upit__heading">Упит за VELUX производе</h2>
		<p class="jg-velux-upit__sub">Брзо и једноставно до ваше идеалне понуде!</p>

		<?php if ( isset( $_GET['jg_sent'] ) && 'velux' === $_GET['jg_sent'] ) : ?>
		<div class="jg-form-notice jg-form-notice--success">Хвала! Ваш упит је успешно послат.</div>
		<?php elseif ( isset( $_GET['jg_error'] ) && 'velux' === $_GET['jg_error'] ) : ?>
		<div class="jg-form-notice jg-form-notice--error">Дошло је до грешке. Молимо покушајте поново.</div>
		<?php endif; ?>

		<!-- Card selection -->
		<div class="jg-velux-upit__cards" id="jg-upit-cards">
			<button class="jg-velux-upit__card" data-upit="prozori" type="button">
				<div class="jg-velux-upit__icon">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect x="2" y="2" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/><rect x="17" y="2" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/><rect x="2" y="17" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/><rect x="17" y="17" width="13" height="13" rx="2" stroke="#C5A059" stroke-width="1.8"/></svg>
				</div>
				<h3 class="jg-velux-upit__card-title">VELUX кровни прозори</h3>
				<p class="jg-velux-upit__card-text">Добијте понуду за VELUX основни или стандард кровне прозоре</p>
			</button>
			<button class="jg-velux-upit__card" data-upit="roletne" type="button">
				<div class="jg-velux-upit__icon">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect x="4" y="4" width="24" height="24" rx="3" stroke="#C5A059" stroke-width="1.8"/><line x1="4" y1="12" x2="28" y2="12" stroke="#C5A059" stroke-width="1.8"/></svg>
				</div>
				<h3 class="jg-velux-upit__card-title">VELUX ролетне</h3>
				<p class="jg-velux-upit__card-text">Добијте понуду за спољашње, унутрашње ролетне или комарнике</p>
			</button>
		</div>

		<!-- Form: Прозори -->
		<div class="jg-velux-upit__form-wrap" id="jg-upit-form-prozori" hidden>
			<div class="jg-velux-upit__form-box">
				<div class="jg-velux-upit__form-header">
					<h3 class="jg-velux-upit__form-title">Упит за VELUX кровне прозоре</h3>
					<button class="jg-velux-upit__back" data-upit-back type="button">← Назад на избор</button>
				</div>
				<form class="jg-velux-upit__form" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" method="post" novalidate>
					<input type="hidden" name="action" value="jg_velux">
					<input type="hidden" name="jg_velux_nonce" value="<?= esc_attr( $velux_nonce ) ?>">
					<input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
					<input type="hidden" name="upit_tip" value="prozori">
					<div class="jg-velux-upit__row">
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-ime">Ime и презиме *</label>
							<input class="jg-velux-upit__input" id="upit-p-ime" type="text" name="ime" placeholder="Ваше иme" required>
						</div>
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-tel">Телефон *</label>
							<input class="jg-velux-upit__input" id="upit-p-tel" type="tel" name="telefon" placeholder="+381 64 123 4567" required>
						</div>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-email">Е-пошта *</label>
						<input class="jg-velux-upit__input" id="upit-p-email" type="email" name="email" placeholder="vas.email@primer.com" required>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-tip">Тип прозора *</label>
						<select class="jg-velux-upit__select" id="upit-p-tip" name="tip_prozora" required>
							<option value="">Изаберите тип...</option>
							<option value="osnovni">Основни</option>
							<option value="standard">Стандард</option>
							<option value="komfor">Комфор</option>
							<option value="komfor-plus">Комфор Плус</option>
						</select>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-mat">Материјал *</label>
						<select class="jg-velux-upit__select" id="upit-p-mat" name="materijal" required>
							<option value="">Изаберите материјал...</option>
							<option value="drvo">Дрво</option>
							<option value="pvc">ПВЦ</option>
							<option value="metal">Метал</option>
						</select>
					</div>
					<div class="jg-velux-upit__row">
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-razmak">Размак између греда</label>
							<input class="jg-velux-upit__input" id="upit-p-razmak" type="text" name="razmak" placeholder="нпр. 78 cm">
						</div>
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-p-broj">Број прозора</label>
							<input class="jg-velux-upit__input" id="upit-p-broj" type="number" name="broj" placeholder="нпр. 2" min="1">
						</div>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-p-napomena">Додатне напомене</label>
						<textarea class="jg-velux-upit__textarea" id="upit-p-napomena" name="napomena" rows="5" placeholder="Унесите додатне информације или питања..."></textarea>
					</div>
					<div class="jg-velux-upit__submit-wrap">
						<button class="jg-velux-upit__submit" type="submit">ПОШАЉИ УПИТ</button>
						<p class="jg-velux-upit__submit-note">Наш тим ће вас контактирати у најкраћем могућем року</p>
					</div>
				</form>
			</div>
		</div>

		<!-- Form: Ролетне -->
		<div class="jg-velux-upit__form-wrap" id="jg-upit-form-roletne" hidden>
			<div class="jg-velux-upit__form-box">
				<div class="jg-velux-upit__form-header">
					<h3 class="jg-velux-upit__form-title">Упит за VELUX ролетне</h3>
					<button class="jg-velux-upit__back" data-upit-back type="button">← Назад на избор</button>
				</div>
				<form class="jg-velux-upit__form" action="<?= esc_url( admin_url( 'admin-post.php' ) ) ?>" method="post" novalidate>
					<input type="hidden" name="action" value="jg_velux">
					<input type="hidden" name="jg_velux_nonce" value="<?= esc_attr( $velux_nonce ) ?>">
					<input type="text" name="jg_hp" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
					<input type="hidden" name="upit_tip" value="roletne">
					<div class="jg-velux-upit__row">
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-r-ime">Ime и презиме *</label>
							<input class="jg-velux-upit__input" id="upit-r-ime" type="text" name="ime" placeholder="Ваше иme" required>
						</div>
						<div class="jg-velux-upit__field">
							<label class="jg-velux-upit__label" for="upit-r-tel">Телефон *</label>
							<input class="jg-velux-upit__input" id="upit-r-tel" type="tel" name="telefon" placeholder="+381 64 123 4567" required>
						</div>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-email">Е-пошта *</label>
						<input class="jg-velux-upit__input" id="upit-r-email" type="email" name="email" placeholder="vas.email@primer.com" required>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-tip">Тип ролетне *</label>
						<select class="jg-velux-upit__select" id="upit-r-tip" name="tip_roletne" required>
							<option value="">Изаберите тип...</option>
							<option value="spoljasnja">Спољашне ролетне</option>
							<option value="unutrasnja">Унутрашње ролетне</option>
							<option value="komar">Комарник</option>
						</select>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-vel">Величина прозора</label>
						<input class="jg-velux-upit__input" id="upit-r-vel" type="text" name="velicina" placeholder="нпр. CK02, FK06, MK08...">
						<p class="jg-velux-upit__hint">Величину прозора можете видети на плочици на горњој страни прозора када га отворите</p>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-boja">Боја (за ролетне)</label>
						<select class="jg-velux-upit__select" id="upit-r-boja" name="boja">
							<option value="">Изаберите боју...</option>
							<option value="bela">Бела</option>
							<option value="srebrna">Сребрна</option>
							<option value="braon">Браон</option>
							<option value="antracit">Антрацит</option>
						</select>
					</div>
					<div class="jg-velux-upit__field">
						<label class="jg-velux-upit__label" for="upit-r-napomena">Додатне напомене</label>
						<textarea class="jg-velux-upit__textarea" id="upit-r-napomena" name="napomena" rows="5" placeholder="Унесите додатне информације или питања..."></textarea>
					</div>
					<div class="jg-velux-upit__submit-wrap">
						<button class="jg-velux-upit__submit" type="submit">ПОШАЉИ УПИТ</button>
						<p class="jg-velux-upit__submit-note">Наш тим ће вас контактирати у најкраћем могућем року</p>
					</div>
				</form>
			</div>
		</div>

		<!-- Contact bar (always visible) -->
		<div class="jg-velux-upit__contact">
			<p class="jg-velux-upit__contact-label">Преферирате директан контакт?</p>
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
