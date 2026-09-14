<?php
/**
 * Title: VELUX Vodic Guide
 * Slug: jugogradnja/velux-vodic-guide
 * Categories: jugogradnja
 */

$check = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="10" cy="10" r="9" stroke="#C5A059" stroke-width="1.5"/><path d="M6.5 10l2.5 2.5 4.5-4.5" stroke="#C5A059" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$tip_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2l2.4 7.2H22l-6.2 4.5 2.4 7.3L12 16.8l-6.2 4.2 2.4-7.3L2 9.2h7.6L12 2z" stroke="#C5A059" stroke-width="1.4" stroke-linejoin="round"/></svg>';
$warn_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 3L2 21h20L12 3z" stroke="#C5A059" stroke-width="1.5" stroke-linejoin="round"/><line x1="12" y1="10" x2="12" y2="15" stroke="#C5A059" stroke-width="1.5" stroke-linecap="round"/><circle cx="12" cy="18" r="1" fill="#C5A059"/></svg>';
$example_icon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="3" stroke="#253D86" stroke-width="1.5"/><line x1="7" y1="8" x2="17" y2="8" stroke="#253D86" stroke-width="1.3" stroke-linecap="round"/><line x1="7" y1="12" x2="17" y2="12" stroke="#253D86" stroke-width="1.3" stroke-linecap="round"/><line x1="7" y1="16" x2="13" y2="16" stroke="#253D86" stroke-width="1.3" stroke-linecap="round"/></svg>';
?>
<section class="jg-velux-vodic">
	<div class="jg-velux-vodic__inner">

		<!-- 01 -->
		<div class="jg-velux-vodic__step">
			<div class="jg-velux-vodic__step-hrow">
				<div class="jg-velux-vodic__step-num">01</div>
				<div class="jg-velux-vodic__step-body">
					<h2 class="jg-velux-vodic__step-title"><?= esc_html__( 'Величина прозора и растојање између греда', 'jugogradnja' ) ?></h2>
					<p class="jg-velux-vodic__step-text"><?= esc_html__( 'VELUX кровни прозори се производе у различитим стандардним димензијама и уграђују се у одређена растојања између греда. У идеалним условима размак између греда треба да буде шири 5цм у односу на ширину прозора да би се идеално уградила термо и хидро изолација која иде около прозора.', 'jugogradnja' ) ?></p>
				</div>
			</div>
			<div class="jg-velux-vodic__step-content">
				<div class="jg-velux-vodic__tip">
					<?= $tip_icon ?>
					<div>
						<strong><?= esc_html__( 'САВЕТ:', 'jugogradnja' ) ?></strong>
						<p><?= esc_html__( '⚠️ ВЕОМА ВАЖНО: Обавезно је прецизно премерити греде пре куповине, најбоље са професионалним мајстором! Грешка у мерењу може да резултира прозором које не може да се угради. Позовите нас и повезаћемо вас са сертификованим мајстором који ће бесплатно изаћи на терен, утврдити размак између греда и помоћи вам да изаберете одговарајућу величину и модел прозора.', 'jugogradnja' ) ?></p>
					</div>
				</div>
				<div class="jg-velux-vodic__box">
					<h4 class="jg-velux-vodic__box-title"><?= esc_html__( 'Стандардне димензије:', 'jugogradnja' ) ?></h4>
					<div class="jg-velux-vodic__dims">
						<div class="jg-velux-vodic__dim"><?= $check ?><?= esc_html__( 'Размак 60 цм → CK прозори (55 цм)', 'jugogradnja' ) ?></div>
						<div class="jg-velux-vodic__dim"><?= $check ?><?= esc_html__( 'Размак 72 цм → FK прозори (66 цм)', 'jugogradnja' ) ?></div>
						<div class="jg-velux-vodic__dim"><?= $check ?><?= esc_html__( 'Размак 83 цм → MK прозори (78 цм)', 'jugogradnja' ) ?></div>
						<div class="jg-velux-vodic__dim"><?= $check ?><?= esc_html__( 'Размак 100 цм → SK прозори (94 цм)', 'jugogradnja' ) ?></div>
					</div>
				</div>
			</div>
		</div>

		<!-- 02 -->
		<div class="jg-velux-vodic__step">
			<div class="jg-velux-vodic__step-hrow">
				<div class="jg-velux-vodic__step-num">02</div>
				<div class="jg-velux-vodic__step-body">
					<h2 class="jg-velux-vodic__step-title"><?= esc_html__( 'Изаберите модел прозора', 'jugogradnja' ) ?></h2>
					<p class="jg-velux-vodic__step-text"><?= esc_html__( 'Након што утврдите која величина прозора вам одговара треба да изаберете модел прозора. У понуди имате Основни прозоре са двоструким стаклом и Стандард прозоре са троструким стаклом.', 'jugogradnja' ) ?></p>
				</div>
			</div>
			<div class="jg-velux-vodic__step-content">
				<div class="jg-velux-vodic__tip">
					<?= $tip_icon ?>
					<div>
						<strong><?= esc_html__( 'САВЕТ:', 'jugogradnja' ) ?></strong>
						<p><?= esc_html__( 'Прозори од белог полиуретана су погодни за просторије са већом концентрацијом влаге (купатило, кухиња).', 'jugogradnja' ) ?></p>
					</div>
				</div>
				<div class="jg-velux-vodic__models">
					<div class="jg-velux-vodic__model">
						<h4 class="jg-velux-vodic__model-title"><?= esc_html__( 'ОСНОВНИ - Двоструко стакло', 'jugogradnja' ) ?></h4>
						<ul class="jg-velux-vodic__model-list">
							<li><?= $check ?><span><?= esc_html__( 'GZL - Природна боја дрвета, безбојни лак', 'jugogradnja' ) ?></span></li>
							<li><?= $check ?><span><?= esc_html__( 'GLU - Бели полиуретан (без одржавања)', 'jugogradnja' ) ?></span></li>
						</ul>
					</div>
					<div class="jg-velux-vodic__model">
						<h4 class="jg-velux-vodic__model-title"><?= esc_html__( 'СТАНДАРД - Троструко стакло', 'jugogradnja' ) ?></h4>
						<ul class="jg-velux-vodic__model-list">
							<li><?= $check ?><span><?= esc_html__( 'GLL - Природна боја дрвета, безбојни лак', 'jugogradnja' ) ?></span></li>
							<li><?= $check ?><span><?= esc_html__( 'GLU - Бели полиуретан (без одржавања)', 'jugogradnja' ) ?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- 03 -->
		<div class="jg-velux-vodic__step">
			<div class="jg-velux-vodic__step-hrow">
				<div class="jg-velux-vodic__step-num">03</div>
				<div class="jg-velux-vodic__step-body">
					<h2 class="jg-velux-vodic__step-title"><?= esc_html__( 'Изаберите одговарајући број прозора', 'jugogradnja' ) ?></h2>
					<p class="jg-velux-vodic__step-text"><?= esc_html__( 'Да бисте добили потребан број прозора у просторији поделите величину ваше просторије у м² са десет како бисте добили оптималну величину кровних прозора.', 'jugogradnja' ) ?></p>
				</div>
			</div>
			<div class="jg-velux-vodic__step-content">
				<div class="jg-velux-vodic__tip">
					<?= $tip_icon ?>
					<div>
						<strong><?= esc_html__( 'САВЕТ:', 'jugogradnja' ) ?></strong>
						<p><?= esc_html__( 'За правилно осветљење простора VELUX препоручује да стаклена површина износи најмање 10% површине пода просторије.', 'jugogradnja' ) ?></p>
					</div>
				</div>
				<div class="jg-velux-vodic__example">
					<?= $example_icon ?>
					<div>
						<p class="jg-velux-vodic__example-label"><?= esc_html__( 'Пример прорачуна:', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__example-text"><?= esc_html__( 'Простор 30м² ÷ 10 = 3м² стаклене површине потребно', 'jugogradnja' ) ?></p>
					</div>
				</div>
			</div>
		</div>

		<!-- 04 -->
		<div class="jg-velux-vodic__step">
			<div class="jg-velux-vodic__step-hrow">
				<div class="jg-velux-vodic__step-num">04</div>
				<div class="jg-velux-vodic__step-body">
					<h2 class="jg-velux-vodic__step-title"><?= esc_html__( 'Изаберите одговарајуће производе за уградњу', 'jugogradnja' ) ?></h2>
					<p class="jg-velux-vodic__step-text"><?= esc_html__( 'VELUX кровни прозори треба да буду уграђени са одговарајућом опшивком које су направљене тако да се прецизно уклапају у специфичне величине прозора и обезбеђују водонепропусно повезивање између вашег прозора и кровног покривача.', 'jugogradnja' ) ?></p>
				</div>
			</div>
			<div class="jg-velux-vodic__step-content">
				<div class="jg-velux-vodic__note">
					<p><?= esc_html__( 'Посебно је потребно напоменути ако се прозори уграђују један изнад другог или један поред другог - то јест ако их дели само греда - да би се купила одговарајућа комбинована опшивка.', 'jugogradnja' ) ?></p>
				</div>
				<h4 class="jg-velux-vodic__subtitle"><?= esc_html__( 'Типови опшивки:', 'jugogradnja' ) ?></h4>
				<div class="jg-velux-vodic__flashings">
					<div class="jg-velux-vodic__flashing">
						<div class="jg-velux-vodic__flashing-hrow">
							<strong class="jg-velux-vodic__flashing-code">EDW 2000</strong>
							<span class="jg-velux-vodic__flashing-badge"><?= esc_html__( 'Високо профилисани кровни покривачи', 'jugogradnja' ) ?></span>
						</div>
						<p class="jg-velux-vodic__flashing-desc"><?= esc_html__( 'За: Цреп и профилисани лимови', 'jugogradnja' ) ?></p>
						<span class="jg-velux-vodic__flashing-incl"><?= esc_html__( 'Термо и хидро изолациони сет укључен', 'jugogradnja' ) ?></span>
					</div>
					<div class="jg-velux-vodic__flashing">
						<div class="jg-velux-vodic__flashing-hrow">
							<strong class="jg-velux-vodic__flashing-code">EDS 2000</strong>
							<span class="jg-velux-vodic__flashing-badge"><?= esc_html__( 'Равни кровни покривачи', 'jugogradnja' ) ?></span>
						</div>
						<p class="jg-velux-vodic__flashing-desc"><?= esc_html__( 'За: Фалцовани лим и тегола', 'jugogradnja' ) ?></p>
						<span class="jg-velux-vodic__flashing-excl"><?= esc_html__( 'Потребно докупити термо и хидро изолацију', 'jugogradnja' ) ?></span>
					</div>
					<div class="jg-velux-vodic__flashing">
						<div class="jg-velux-vodic__flashing-hrow">
							<strong class="jg-velux-vodic__flashing-code">EDB 2000</strong>
							<span class="jg-velux-vodic__flashing-badge"><?= esc_html__( 'Фалцовани бибер цреп', 'jugogradnja' ) ?></span>
						</div>
						<p class="jg-velux-vodic__flashing-desc"><?= esc_html__( 'За: Нагиб крова од 20 степени', 'jugogradnja' ) ?></p>
						<span class="jg-velux-vodic__flashing-incl"><?= esc_html__( 'Термо и хидро изолациони сет укључен', 'jugogradnja' ) ?></span>
					</div>
				</div>
			</div>
		</div>

		<!-- 05 -->
		<div class="jg-velux-vodic__step">
			<div class="jg-velux-vodic__step-hrow">
				<div class="jg-velux-vodic__step-num">05</div>
				<div class="jg-velux-vodic__step-body">
					<h2 class="jg-velux-vodic__step-title"><?= esc_html__( 'Одаберите праву заштиту од топлоте/светлости/инсеката', 'jugogradnja' ) ?></h2>
					<p class="jg-velux-vodic__step-text"><?= esc_html__( 'Изаберите одговарајућу заштиту за ваш VELUX прозор. Пре куповине обавезно погледајте тип и величину вашег кровног прозора на плочици коју можете да видите са горње стране прозора када га отворите.', 'jugogradnja' ) ?></p>
				</div>
			</div>
			<div class="jg-velux-vodic__step-content">
				<div class="jg-velux-vodic__pcards">
					<div class="jg-velux-vodic__pcard">
						<div class="jg-velux-vodic__pcard-top">
							<div>
								<p class="jg-velux-vodic__pcard-cat"><?= esc_html__( 'Заштита од топлоте', 'jugogradnja' ) ?></p>
								<h4 class="jg-velux-vodic__pcard-name"><?= esc_html__( 'VELUX спољна мрежица', 'jugogradnja' ) ?></h4>
							</div>
							<span class="jg-velux-vodic__pcard-code">MHL</span>
						</div>
						<p class="jg-velux-vodic__pcard-accent"><?= esc_html__( 'Смањују топлоту до 76%', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__pcard-desc"><?= esc_html__( 'Ублажавају светлост до 30%, веома се лако и брзо уграђују', 'jugogradnja' ) ?></p>
					</div>
					<div class="jg-velux-vodic__pcard">
						<div class="jg-velux-vodic__pcard-top">
							<div>
								<p class="jg-velux-vodic__pcard-cat"><?= esc_html__( 'Заштита од светлости - Тотално замрачење', 'jugogradnja' ) ?></p>
								<h4 class="jg-velux-vodic__pcard-name"><?= esc_html__( 'Унутрашње ролетне', 'jugogradnja' ) ?></h4>
							</div>
							<span class="jg-velux-vodic__pcard-code">DKL</span>
						</div>
						<p class="jg-velux-vodic__pcard-accent"><?= esc_html__( 'Не пропушта светлост', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__pcard-desc"><?= esc_html__( 'Алуминијумске лајсне, боје: беж/тегет/бела', 'jugogradnja' ) ?></p>
					</div>
					<div class="jg-velux-vodic__pcard">
						<div class="jg-velux-vodic__pcard-top">
							<div>
								<p class="jg-velux-vodic__pcard-cat"><?= esc_html__( 'Заштита од светлости - Ублажавање', 'jugogradnja' ) ?></p>
								<h4 class="jg-velux-vodic__pcard-name"><?= esc_html__( 'Унутрашње ролетне', 'jugogradnja' ) ?></h4>
							</div>
							<span class="jg-velux-vodic__pcard-code">RFL</span>
						</div>
						<p class="jg-velux-vodic__pcard-accent"><?= esc_html__( 'Ублажава светлост', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__pcard-desc"><?= esc_html__( 'Алуминијумске лајсне, боје: беж/тегет/бела', 'jugogradnja' ) ?></p>
					</div>
					<div class="jg-velux-vodic__pcard">
						<div class="jg-velux-vodic__pcard-top">
							<div>
								<p class="jg-velux-vodic__pcard-cat"><?= esc_html__( 'Ублажавање светлости', 'jugogradnja' ) ?></p>
								<h4 class="jg-velux-vodic__pcard-name"><?= esc_html__( 'Позиционирање у 3 положаја', 'jugogradnja' ) ?></h4>
							</div>
							<span class="jg-velux-vodic__pcard-code">RHL</span>
						</div>
						<p class="jg-velux-vodic__pcard-accent"><?= esc_html__( 'Ублажава светлост', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__pcard-desc"><?= esc_html__( 'Боје: беж/тегет', 'jugogradnja' ) ?></p>
					</div>
					<div class="jg-velux-vodic__pcard">
						<div class="jg-velux-vodic__pcard-top">
							<div>
								<p class="jg-velux-vodic__pcard-cat"><?= esc_html__( 'DUO ролетна', 'jugogradnja' ) ?></p>
								<h4 class="jg-velux-vodic__pcard-name"><?= esc_html__( 'Две ролетне у једној', 'jugogradnja' ) ?></h4>
							</div>
							<span class="jg-velux-vodic__pcard-code">DFD</span>
						</div>
						<p class="jg-velux-vodic__pcard-accent"><?= esc_html__( 'DKL + RFL комбинација', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__pcard-desc"><?= esc_html__( 'Плисирана (бела) + замрачујућа (беж/тегет/бела)', 'jugogradnja' ) ?></p>
					</div>
					<div class="jg-velux-vodic__pcard">
						<div class="jg-velux-vodic__pcard-top">
							<div>
								<p class="jg-velux-vodic__pcard-cat"><?= esc_html__( 'Заштита од инсеката', 'jugogradnja' ) ?></p>
								<h4 class="jg-velux-vodic__pcard-name"><?= esc_html__( 'VELUX комарници', 'jugogradnja' ) ?></h4>
							</div>
							<span class="jg-velux-vodic__pcard-code">ZIL</span>
						</div>
						<p class="jg-velux-vodic__pcard-accent"><?= esc_html__( '100% заштита од инсеката', 'jugogradnja' ) ?></p>
						<p class="jg-velux-vodic__pcard-desc"><?= esc_html__( 'Смештен на унутрашњу облогу, лако се скрива', 'jugogradnja' ) ?></p>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
