<?php
/**
 * Template Name: Sidebar CTA Page
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main">
    <?php
    $content = get_the_content();
    $blocks  = parse_blocks( $content );

    foreach ( $blocks as $block ) {
        if ( 'acf/cb-hero' === $block['blockName'] ) {
            echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			break;
        }
    }
    ?>
    <div class="container-xl mb-4">
        <div class="row">
            <div class="col-lg-9">
        		<?php
				foreach ( $blocks as $block ) {
					if ( 'acf/cb-hero' === $block['blockName'] ) {
						continue;
					}
					echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
        		?>
            </div>
            <div class="col-lg-3">
                <div class="sidebar d-block">
                    <div class="sidebar__title h3"><?= esc_html( get_field( 'sidebar_title', 'options' ) ); ?></div>
                    <div class="sidebar__content mb-4"><?= esc_html( get_field( 'sidebar_content', 'options' ) ); ?></div>
                    <div class="text-center">
                        <a href="/contact/" class="btn btn-primary">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
		get_template_part( 'page-templates/blocks/cb-testimonials' );
    ?>
</main>
<?php
get_footer();