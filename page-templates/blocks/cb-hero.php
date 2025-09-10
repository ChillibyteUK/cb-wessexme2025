<?php
/**
 * Hero Block Template.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

$class   = is_front_page() ? 'front-hero' : '';
$classes = $block['className'] ?? null;
?>
<section class="hero <?= esc_attr( implode( ' ', array( $class, $classes ) ) ); ?>" style="background-image:url(<?= esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>">
    <div class="overlay--dark"></div>
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 py-5">
                <h1><?= esc_html( get_field( 'title' ) ); ?></h1>
                <?php
                if ( get_field( 'subtitle' ) ) {
                    ?>
                <h2><?= esc_html( get_field( 'subtitle' ) ); ?></h2>
                    <?php
                }
                if ( get_field( 'cta' ) ) {
                    $l = get_field( 'cta' );
                    ?>
                <a href="<?= esc_url( $l['url'] ); ?>" class="btn btn-tx mb-3" target="<?= esc_attr( $l['target'] ); ?>"><?= esc_html( $l['title'] ); ?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>