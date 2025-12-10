<?php
/**
 * CB Accreditations & Awards Grid Block
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="accreditations py-5">
    <div class="container-xl">
		<?php
		if ( get_field( 'title' ) ) {
			?>
        <h2 class="dot mb-5"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
        <div class="accreditations__grid">
            <?php
            $c          = 0;
            $categories = (array) get_field( 'category' );
            while ( have_rows( 'accreditations', 'options' ) ) {
                the_row();
                $sub_categories = (array) get_sub_field( 'category' );

                // Check if any sub_field category matches any of the block's categories.
                $has_match = false;
                foreach ( $sub_categories as $sub_cat ) {
                    if ( in_array( $sub_cat, $categories, true ) ) {
                        $has_match = true;
                        break;
                    }
                }

                if ( ! $has_match ) {
                    continue;
                }

                if ( $c > 5 ) {
                    continue;
                }
                ?>
                <img class="logo" src="<?= esc_url( wp_get_attachment_image_url( get_sub_field( 'logo' ), 'large' ) ); ?>" alt="">
                <?php
                ++$c;
            }
            ?>
        </div>
        <!-- <div class="text-center mt-5"><a class="btn btn-primary" href="/about-us/accreditations-awards/">Find out more</a></div> -->
    </div>
</section>
