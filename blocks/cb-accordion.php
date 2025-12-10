<?php
/**
 * CB Accordion
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="cb-accordion py-5">
	<div class="container-xl">
		<?php
		if ( have_rows( 'items' ) ) {
			$accordion_id = 'accordion-' . uniqid();
			$item_index   = 0;
			?>
		<div class="accordion" id="<?= esc_attr( $accordion_id ); ?>">
			<?php
			while ( have_rows( 'items' ) ) {
				the_row();
				$item_id     = $accordion_id . '-item-' . $item_index;
				$collapse_id = $accordion_id . '-collapse-' . $item_index;
				$is_first    = 0 === $item_index;
				?>
			<div class="accordion-item">
				<div class="accordion-header" id="<?= esc_attr( $item_id ); ?>">
					<button class="flex-column align-items-start accordion-button<?= $is_first ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc_attr( $collapse_id ); ?>" aria-expanded="<?= $is_first ? 'true' : 'false'; ?>" aria-controls="<?= esc_attr( $collapse_id ); ?>">
						<h2 class="h3"><?= esc_html( get_sub_field( 'title' ) ); ?></h2>
						<?php
						if ( get_sub_field( 'subtitle' ) ) {
							?>
						<div><?= esc_html( get_sub_field( 'subtitle' ) ); ?></div>
							<?php
						}
						?>
					</button>
				</div>
				<div id="<?= esc_attr( $collapse_id ); ?>" class="accordion-collapse collapse<?= $is_first ? ' show' : ''; ?>" aria-labelledby="<?= esc_attr( $item_id ); ?>" data-bs-parent="#<?= esc_attr( $accordion_id ); ?>">
					<div class="accordion-body">
						<?= wp_kses_post( get_sub_field( 'content' ) ); ?>
					</div>
				</div>
			</div>
				<?php
				++$item_index;
			}
			?>
		</div>
			<?php
		}
		?>
	</div>
</section>