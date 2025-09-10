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
        <h2 class="text-blue-400 dot mb-5">Accreditations &amp; Awards</h2>
        <div class="accreditations__grid">
            <?php
            $c = 0;
            while ( have_rows( 'accreditations', 'options' ) ) {
                the_row();
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
