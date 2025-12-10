<?php
/**
 * Text Image Block Template.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

$order_left  = ( 'text' === get_field( 'order' ) ) ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$order_right = ( 'text' === get_field( 'order' ) ) ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
$bg          = get_field( 'background_colour' ) ? 'bg--' . get_field( 'background_colour' ) : '';

$align_image = '';
if ( 'Middle' === get_field( 'align_image' ) ) {
	$align_image = 'd-flex align-items-center';
}
$align_text = 'justify-content-center';
if ( 'Top' === get_field( 'align_text' ) ) {
	$align_text = 'justify-content-start';
}

$image_size = 'cover';
if ( 'contain' === get_field( 'image_size' ) ) {
	$image_size = 'contain';
}

$class = $block['className'] ? $block['className'] : 'py-5';

?>
<!-- text_image -->
<section class="text_image <?= esc_attr( $class ); ?> <?= esc_attr( $bg ); ?>">
    <div class="container animated wow fadeIn">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column <?= esc_attr( $align_text ); ?> text_image__content <?= esc_attr( $order_left ); ?>">
                <?php
                if ( get_field( 'title' ) ) {
                    echo '<h2 class="dot">' . esc_html( get_field( 'title' ) ) . '</h2>';
                }
                if ( get_field( 'subtitle' ) ) {
                    echo '<h3 class="">' . esc_html( get_field( 'subtitle' ) ) . '</h3>';
                }
                echo wp_kses_post( get_field( 'content' ) );
                if ( get_field( 'cta' ) ) {
                    $cta = get_field( 'cta' );
                    echo '<a href="' . esc_url( $cta['url'] ) . '" target="' . esc_attr( $cta['target'] ) . '" class="btn btn-primary">' . esc_html( $cta['title'] ) . '</a>';
                }
                ?>
            </div>
            <div class="col-lg-6 text_image__image <?= esc_attr( $align_image ); ?> <?= esc_attr( $order_right ); ?> px-lg-5">
                <img class="img-fluid <?= esc_attr( $image_size ); ?>" src="<?= esc_url( wp_get_attachment_image_url( get_field( 'image' ), 'full' ) ); ?>">
            </div>
        </div>
    </div>
    <?php
    if ( get_field( 'full_height' ) ) {
        ?>
        <div class="nav-arrow"><a href="#page<?= esc_attr( $pp ); ?>"><i class="fas fa-angle-down"></i></a></div>
        <?php
    }
    ?>
</section>