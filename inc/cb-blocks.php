<?php
/**
 * Register ACF Blocks.
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register ACF Blocks.
 */
function acf_blocks() {
    if ( function_exists( 'acf_register_block_type' ) ) {

        // INSERT NEW BLOCKS HERE.

        acf_register_block_type(
            array(
                'name'            => 'cb_accordion',
                'title'           => __( 'CB Accordion' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-accordion.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
            array(
                'name'            => 'cb_andwis_2',
                'title'           => __( 'CB Andwis 2' ),
                'category'        => 'layout',
                'icon'            => 'cover-image',
                'render_template' => 'blocks/cb-andwis-2.php',
                'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );

        acf_register_block_type(
			array(
				'name'            => 'cb_hero',
				'title'           => 'CB Hero',
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-hero.php',
				'keywords'        => array( 'hero' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
			)
		);

        acf_register_block_type(
            array(
				'name'            => 'cb_text_image',
				'title'           => __( 'CB Text Image' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-text-image.php',
				'keywords'        => array( 'text', 'image' ),
				'mode'            => 'edit',
                'supports'        => array(
                    'mode'      => false,
                    'anchor'    => true,
                    'className' => true,
                    'align'     => true,
                ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_sectors_nav',
				'title'           => __( 'CB Sectors Nav' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-sectors-nav.php',
				'keywords'        => array( 'sectors', 'nav' ),
				'mode'            => 'edit',
                'supports'        => array(
                    'mode'   => false,
                    'anchor' => true,
                    'align'  => true,
                ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_services_nav',
				'title'           => __( 'CB Services Nav' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-services-nav.php',
				'keywords'        => array( 'services', 'nav' ),
				'mode'            => 'edit',
                'supports'        => array(
                    'mode'   => false,
                    'anchor' => true,
                    'align'  => true,
                ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_accreditations',
				'title'           => __( 'CB Accreditations Grid' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-accreditations.php',
				'keywords'        => array( 'accreditations', 'grid' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_accreditations_awards_list',
				'title'           => __( 'CB Accreditations/Awards List' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-accreditations-awards-list.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_news_grid',
				'title'           => __( 'CB News Grid' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_news_grid.php',
				'keywords'        => array( 'news', 'grid' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_andwis',
				'title'           => __( 'CB Andwis Group' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_andwis.php',
				'keywords'        => array( 'andwis', 'group' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_testimonials',
				'title'           => __( 'CB Testimonial Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-testimonials.php',
				'keywords'        => array( 'testimonial', 'slider' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_related_case_studies',
				'title'           => __( 'CB Related Case Studies' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_related_case_studies.php',
				'keywords'        => array( 'related', 'case', 'studies' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_contact',
				'title'           => __( 'CB Contact/Form Block' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-contact.php',
				'keywords'        => array( 'contact' ),
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_people',
				'title'           => __( 'CB People' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_people.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_client_slider',
				'title'           => __( 'CB Client Slider' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-client-slider.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_doc_block',
				'title'           => __( 'CB Documents' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_doc_block.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_video',
				'title'           => __( 'CB Video' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_video.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_latest_cs',
				'title'           => __( 'CB Latest Case Studies' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb-latest-cs.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
        acf_register_block_type(
            array(
				'name'            => 'cb_person_bio',
				'title'           => __( 'CB Person Bio' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'blocks/cb_person_bio.php',
				'mode'            => 'edit',
				'supports'        => array( 'mode' => false ),
            )
        );
    }
}
add_action( 'acf/init', 'acf_blocks' );

/* === Gutenburg core modifications === */

/**
 * Add container to core blocks
 *
 * @param array  $args Block args.
 * @param string $name Block name.
 * @return array
 */
function core_image_block_type_args( $args, $name ) {
	if ( 'core/paragraph' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/heading' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/list' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}

    return $args;
}
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );

/**
 * Wrap core blocks in container
 *
 * @param array  $attributes Block attributes.
 * @param string $content Block content.
 * @return string
 */
function modify_core_add_container( $attributes, $content ) {
    ob_start();
    ?>
<div class="container-xl">
    <?= wp_kses_post( $content ); ?>
</div>
	<?php
    $content = ob_get_clean();
    return $content;
}
