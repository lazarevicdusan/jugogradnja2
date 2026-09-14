<?php
/**
 * Render callback for jugogradnja/pozicija-archive block.
 */

$t          = get_template_directory_uri();
$karijere   = esc_url( home_url( '/karijere/' ) );
$kontakt    = esc_url( home_url( '/kontakt/' ) );

// Query all pozicija posts
$query = new WP_Query( [
	'post_type'      => 'pozicija',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
] );

$posts = $query->posts;

// Briefcase icon inline SVG
$briefcase = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M10.667 4.667V3.333A1.333 1.333 0 0 0 9.333 2H6.667a1.333 1.333 0 0 0-1.334 1.333v1.334M2 4.667h12v8A1.333 1.333 0 0 1 12.667 14H3.333A1.333 1.333 0 0 1 2 12.667v-8Z" stroke="#9ca3af" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';

?>
<!-- Hero -->
<div class="jg-pozicija-hero">
	<div class="jg-pozicija-hero__inner">
		<h1 class="jg-pozicija-hero__title"><?= esc_html__( 'Отворене позиције', 'jugogradnja' ) ?></h1>
		<p class="jg-pozicija-hero__sub"><?= esc_html__( 'Погледајте тренутно отворене позиције у Југоградњи и пронађите прави пут за вашу каријеру', 'jugogradnja' ) ?></p>
	</div>
</div>

<!-- Positions grid -->
<div class="jg-pozicija-archive">
	<div class="jg-pozicija-archive__inner">
		<?php if ( $posts ) : ?>
		<div class="jg-pozicija-grid">
			<?php foreach ( $posts as $post ) :
				$tip    = get_post_meta( $post->ID, '_pozicija_tip', true ) ?: __( 'Пуно радно време', 'jugogradnja' );
				$closed = get_post_meta( $post->ID, '_pozicija_closed', true );
				$url    = esc_url( get_permalink( $post ) );
			?>
			<a class="jg-pozicija-card<?= $closed ? ' jg-pozicija-card--closed' : '' ?>" href="<?= $url ?>">
				<span class="jg-pozicija-card__bullet" aria-hidden="true"></span>
				<div class="jg-pozicija-card__body">
					<span class="jg-pozicija-card__title"><?= esc_html( $post->post_title ) ?></span>
					<span class="jg-pozicija-card__meta">
						<?= $briefcase ?>
						<?= $closed ? esc_html__( 'Затворено', 'jugogradnja' ) : esc_html( $tip ) ?>
					</span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
		<?php else : ?>
		<p class="jg-pozicija-archive__empty"><?= esc_html__( 'Тренутно нема отворених позиција. Проверите поново ускоро.', 'jugogradnja' ) ?></p>
		<?php endif; ?>

		<!-- No match CTA -->
		<div class="jg-pozicija-nomatch">
			<h2 class="jg-pozicija-nomatch__heading"><?= esc_html__( 'Не видите одговарајућу позицију?', 'jugogradnja' ) ?></h2>
			<p class="jg-pozicija-nomatch__text"><?= esc_html__( 'Ако тренутно не постоји отворена позиција која одговара вашем профилу, а сматрате да бисте могли да постанете део нашег тима, пошаљите нам своју радну биографију. Чуваћемо је у бази и контактирати вас када се појави одговарајућа прилика.', 'jugogradnja' ) ?></p>
			<a class="jg-btn jg-btn--gold" href="<?= $karijere ?>#prijava"><?= esc_html__( 'ПОШАЉИТЕ CV', 'jugogradnja' ) ?></a>
		</div>
	</div>
</div>
