<?php
/**
 * Services Nav Block Template.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="services_nav py-5">
    <div class="container-xl">
        <h2 class="dot mb-3">Our Services</h2>
        <?php
        if ( get_field( 'intro' ) ) {
            ?>
        <div class="fs-450 w-short"><?= esc_html( get_field( 'intro' ) ); ?></div>
            <?php
        }
        ?>
        <div class="services mt-5">
        <?php
        while ( have_rows( 'services' ) ) {
            the_row();
            $svc = get_sub_field( 'service' );
            $img = get_sub_field( 'icon' ) ? get_sub_field( 'icon' ) : get_stylesheet_directory_uri() . '/img/missing-image.png';
            ?>
            <a class="services__card" href="<?= esc_url( get_the_permalink( $svc ) ); ?>">
                <h3><?= esc_html( get_the_title( $svc ) ); ?></h3>
                <p><?= esc_html( get_sub_field( 'content' ) ); ?></p>
                <div class="icon_container"><img src="<?= esc_url( $img ); ?>"></div>
            </a>
            <?php
        }
        ?>
        </div>
    </div>
</section>