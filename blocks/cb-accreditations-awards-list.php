<?php
/**
 * CB Accreditations & Awards List Block
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

$categories = (array) get_field( 'category' );
$block_type = get_field( 'type' );
?>
<section class="awards_list pb-5">
    <div class="container-xl">
		<?php
		if ( get_field( 'title' ) ) {
			?>
        <h2 class="dot mb-5"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
        <div class="row g-4">
        <?php
        if ( 'Accreditations' === $block_type ) {
            $has_categories = ! empty( $categories );

            while ( have_rows( 'accreditations', 'options' ) ) {
                the_row();

                if ( $has_categories ) {
                    $sub_categories = (array) get_sub_field( 'category' );
                    $has_match      = false;

                    foreach ( $sub_categories as $sub_cat ) {
                        if ( in_array( $sub_cat, $categories, true ) ) {
                            $has_match = true;
                            break;
                        }
                    }

                    if ( ! $has_match ) {
                        continue;
                    }
                }
                ?>
                <div class="col-md-3 text-center"><img src="<?= esc_url( wp_get_attachment_image_url( get_sub_field( 'logo' ), 'large' ) ); ?>" alt="" class="logo"></div>
                <div class="col-md-9"><?= esc_html( get_sub_field( 'description' ) ); ?></div>
                <?php
            }
        } else {
            while ( have_rows( 'awards', 'options' ) ) {
                the_row();
                ?>
                <div class="col-md-3 text-center"><img src="<?= esc_url( wp_get_attachment_image_url( get_sub_field( 'logo' ), 'large' ) ); ?>" alt="" class="logo"></div>
                <div class="col-md-9"><?= esc_html( get_sub_field( 'description' ) ); ?></div>
                <?php
            }
        }
        ?>
        </div>
    </div>
</section>