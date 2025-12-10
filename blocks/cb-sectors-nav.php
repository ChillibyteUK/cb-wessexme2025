<?php
/**
 * CB Sectors Nav Block Template.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="sectors_nav py-5">
    <div class="container-xl">
        <h2 class="dot mb-3"><?= esc_html( get_field( 'title' ) ); ?></h2>
        <?php
        if ( get_field( 'intro' ) ) {
            ?>
        <div class="fs-450 w-short"><?= esc_html( get_field( 'intro' ) ); ?></div>
            <?php
        }
        ?>
        <div class="sectors mt-5">
        <?php
        while ( have_rows( 'sectors' ) ) {
            the_row();
            $sec = get_sub_field( 'sector' );
            $img = get_the_post_thumbnail_url( $sec, 'large' ) ? get_the_post_thumbnail_url( $sec, 'large' ) : get_stylesheet_directory_uri() . '/img/missing-image.png';
            ?>
            <a class="sectors__card" href="<?= esc_url( get_the_permalink( $sec ) ); ?>">
                <div class="img_container"><img src="<?= esc_url( $img ); ?>"></div>
                <h3 class="fs-450 text-burgundy-400"><?= esc_html( get_the_title( $sec ) ); ?></h3>
            </a>
            <?php
        }
        ?>
        </div>
    </div>
</section>