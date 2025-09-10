<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_for_posts' );
$bg             = get_the_post_thumbnail_url( $page_for_posts, 'full' );

get_header();
?>
<main id="main">
<!-- hero -->
<section class="hero" style="background-image:url(<?= esc_url( $bg ); ?>">
    <div class="overlay--dark"></div>
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 py-5">
                <h1>Wessex News</h1>
            </div>
        </div>
    </div>
</section>


    <div class="container-xl py-5">
        <?php
        if ( get_the_content( null, false, $page_for_posts ) ) {
            echo '<div class="mb-5">' . wp_kses_post( get_the_content( null, false, $page_for_posts ) ) . '</div>';
        }

        ?>
        <div class="news_index related mb-5">
            <?php
            while ( have_posts() ) {
                the_post();
                $img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                if ( ! $img ) {
                    $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
                }
                $the_date = get_the_date( 'jS F, Y' );

                ?>
                <a href="<?= esc_url( get_the_permalink( get_the_ID() ) ); ?>" class="related__card">
                    <div class="related__image_container">
                        <img class="related__image" src="<?= esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>">
                    </div>
                    <div class="related__content">
                        <h3 class="related__title mb-0"><?= esc_html( get_the_title() ); ?></h3>
                        <div class="related__date mb-2"><?= esc_html( $the_date ); ?></div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</main>
<?php

get_footer();