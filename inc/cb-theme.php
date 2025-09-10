<?php
/**
 * CB Theme Functions
 *
 * This file contains theme-specific functions and customizations for the theme.
 *
 * @package cb-wessexme2025
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once CB_THEME_DIR . '/inc/cb-utility.php';
require_once CB_THEME_DIR . '/inc/cb-posttypes.php';
require_once CB_THEME_DIR . '/inc/cb-taxonomies.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';
require_once CB_THEME_DIR . '/inc/cb-news.php';


// Remove unwanted SVG filter injection WP.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Removes the comment-reply.min.js script from the footer.
 */
function remove_comment_reply_header_hook() {
    wp_deregister_script( 'comment-reply' );
}
add_action( 'init', 'remove_comment_reply_header_hook' );

/**
 * Removes the comments menu from the WordPress admin dashboard.
 */
function remove_comments_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_comments_menu' );

/**
 * Removes specific page templates from the available templates list.
 *
 * @param array $page_templates The list of page templates.
 * @return array The modified list of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
    unset(
		$page_templates['page-templates/blank.php'],
		$page_templates['page-templates/empty.php'],
		$page_templates['page-templates/left-sidebarpage.php'],
		$page_templates['page-templates/right-sidebarpage.php'],
		$page_templates['page-templates/both-sidebarspage.php']
	);
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );

/**
 * Removes support for specific post formats in the theme.
 */
function remove_understrap_post_formats() {
	remove_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'page_title' => 'Site-Wide Settings',
            'menu_title' => 'Site-Wide Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
        )
    );
}

/**
 * Initializes widgets, menus, and theme supports.
 *
 * This function registers navigation menus, unregisters sidebars and menus,
 * and adds theme support for custom editor color palettes.
 */
function widgets_init() {

    register_nav_menus(
		array(
			'primary_nav'  => __( 'Primary Nav', 'cb-pbh2025' ),
			'footer_menu1' => __( 'Footer Nav', 'cb-pbh2025' ),
		)
	);

    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'footerfull' );
    unregister_nav_menu( 'primary' );
}
add_action( 'widgets_init', 'widgets_init', 11 );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Adds support for disabling custom colors and defines a custom editor color palette.
 */
function cb_theme_setup() {
    add_theme_support( 'disable-custom-colors' );
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name'  => 'Blackout',
                'slug'  => 'dark',
                'color' => '#1E1E1E',
            ),
            array(
                'name'  => 'Light',
                'slug'  => 'light',
                'color' => '#F5F5E1',
            ),
            array(
                'name'  => 'White',
                'slug'  => 'white',
                'color' => '#FFFFFF',
            ),
            array(
                'name'  => 'Violet',
                'slug'  => 'violet',
                'color' => '#AA91F0',
            ),
            array(
                'name'  => 'Green',
                'slug'  => 'green',
                'color' => '#BEFF2B',
            ),
        )
    );
}
add_action( 'after_setup_theme', 'cb_theme_setup', 20 );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Registers a custom dashboard widget for the Chillibyte theme.
 */
function register_cb_dashboard_widget() {
	wp_add_dashboard_widget(
		'cb_dashboard_widget',
        'Chillibyte',
        'cb_dashboard_widget_display'
    );
}
add_action( 'wp_dashboard_setup', 'register_cb_dashboard_widget' );

/**
 * Displays the content of the Chillibyte dashboard widget.
 */
function cb_dashboard_widget_display() {
	?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 50%;"
            src="<?= esc_url( get_stylesheet_directory_uri() . '/img/cb-full.jpg' ); ?>">
        <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
            href="mailto:hello@chillibyte.co.uk/">Contact</a>
    </div>
    <div>
        <p><strong>Thanks for choosing Chillibyte!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
    </div>
	<?php
}

// phpcs:disable
// add_filter('wpseo_breadcrumb_links', function( $links ) {
//     global $post;
//     if ( is_singular( 'post' ) ) {
//         $t = get_the_category($post->ID);
//         $breadcrumb[] = array(
//             'url' => '/guides/',
//             'text' => 'Guides',
//         );

//         array_splice( $links, 1, -2, $breadcrumb );
//     }
//     return $links;
// }
// );

// phpcs:enable

/**
 * Filters the excerpt content to modify or return it as is.
 *
 * @param string $post_excerpt The current post excerpt.
 * @return string The filtered or unmodified post excerpt.
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
    if ( is_admin() || ! get_the_ID() ) {
        return $post_excerpt;
    }
    return $post_excerpt;
}

// Remove Yoast SEO breadcrumbs from Revelanssi's search results.
/**
 * Removes shortcodes from the content during search queries.
 *
 * @param string $content The content to filter.
 * @return string The filtered content without shortcodes.
 */
function wpdocs_remove_shortcode_from_index( $content ) {
	if ( is_search() ) {
		$content = strip_shortcodes( $content );
    }
    return $content;
}
add_filter( 'the_content', 'wpdocs_remove_shortcode_from_index' );

// GF really is pants.
/**
 * Change submit from input to button.
 *
 * Do not use example provided by Gravity Forms as it strips out the button attributes including onClick.
 *
 * @param string $button_input The original input HTML for the submit button.
 * @param array  $form         The Gravity Forms form object.
 * @return string The modified button HTML.
 */
function wd_gf_update_submit_button( $button_input, $form ) {
    // save attribute string to $button_match[1].
    preg_match( '/<input([^\/>]*)(\s\/)*>/', $button_input, $button_match );

    // remove value attribute (since we aren't using an input).
    $button_atts = str_replace( "value='" . $form['button']['text'] . "' ", '', $button_match[1] );

    // create the button element with the button text inside the button element instead of set as the value.
    return '<button ' . $button_atts . '><span>' . $form['button']['text'] . '</span></button>';
}
add_filter( 'gform_submit_button', 'wd_gf_update_submit_button', 10, 2 );


/**
 * Enqueues theme-specific scripts and styles.
 *
 * This function deregisters jQuery and disables certain styles and scripts
 * that are commented out for potential use in the theme.
 */
function cb_theme_enqueue() {
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array() );
    wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true );

    // Load Glide.js and GLightbox only on single work pages.
    if ( is_singular( 'work' ) ) {
        wp_enqueue_style( 'glide-core', 'https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css', array(), null );
        wp_enqueue_script( 'glide', 'https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js', array(), null, true );
        wp_enqueue_style( 'glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', array(), null );
        wp_enqueue_script( 'glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), null, true );
    }

	// phpcs:disable
    // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.3.min.js', array(), null, true);
    // wp_enqueue_style( 'lightbox-stylesheet', 'https://cdn.jsdelivr.net/npm/lightbox2@2.11.5/dist/css/lightbox.min.css', array(), null );
    // wp_enqueue_script( 'lightbox-scripts', 'https://cdn.jsdelivr.net/npm/lightbox2@2.11.5/dist/js/lightbox.min.js', array(), null, true );
    // wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/parallax.min.js', array('jquery'), null, true);
    // wp_enqueue_style( 'splide-stylesheet', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), null );
    // wp_enqueue_script( 'splide-scripts', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true );
	// phpcs:enable

	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingV

	wp_deregister_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'cb_theme_enqueue' );

/**
 * Filters the excerpt length.
 *
 * @return int The desired number of words for the excerpt.
 */
function custom_excerpt_length() {
    return 15; // Set to your desired number of words.
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

// phpcs:disable
// function add_custom_menu_item($items, $args)
// {
//     if ($args->theme_location == 'primary_nav') {
//         $new_item = '<li class="menu-item menu-item-type-post_tyep menu-item-object-page nav-item"><a href="' . esc_url(home_url('/search/')) . '" class="nav-link" title="Search"><span class="icon-search"></span></a></li>';
//         $items .= $new_item;
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_items', 'add_custom_menu_item', 10, 2);
// phpcs:enable


add_action( 'wp_ajax_cb_load_more_work', 'cb_load_more_work' );
add_action( 'wp_ajax_nopriv_cb_load_more_work', 'cb_load_more_work' );

/**
 * Handles AJAX requests to load more "work" posts.
 *
 * This function retrieves and outputs additional "work" posts
 * when the "Load More" button is clicked on the frontend.
 */
function cb_load_more_work() {
	// phpcs:ignore WordPress.Security.NonceVerification.Missing
	$paged = isset( $_POST['page'] ) ? (int) $_POST['page'] + 1 : 2;

	$query = new WP_Query(
		array(
			'post_type'      => 'work',
			'posts_per_page' => 9,
			'paged'          => $paged,
			'orderby'        => 'date',
			'order'          => 'ASC',
		)
	);

	$response = array(
		'html'          => '',
		'max_num_pages' => $query->max_num_pages,
		'current_page'  => $paged,
	);

	if ( $query->have_posts() ) {
		ob_start();
        $d = 0;
		while ( $query->have_posts() ) {
			$query->the_post();
			$logo = get_field( 'logo', get_the_ID() );
			?>
			<div class="work-item col-12 col-md-6 col-lg-4" data-aos="fade" data-aos-delay="<?= esc_attr( $d ); ?>">
				<a href="<?= esc_url( get_permalink() ); ?>" class="work-item__link">
					<div class="work-item__image-container">
						<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'work-item__image' ) ); ?>
						<div class="work-item__overlay">
							<h3 class="work-item__title"><?= esc_html( get_the_title() ); ?></h3>
						</div>
					</div>
					<div class="work-item__logo-container">
						<?= wp_get_attachment_image( $logo, 'full', false, array( 'class' => 'work-item__logo' ) ); ?>
					</div>
				</a>
			</div>
			<?php
            $d += 50;
		}
		wp_reset_postdata();
		$response['html'] = ob_get_clean();
	}

	wp_send_json( $response );
}


add_filter(
	'acf/fields/relationship/result/key=field_68a48c4ef51d2',
	function ( $title, $post, $field, $post_id ) {
    	$company    = get_field( 'company', $post->ID );
    	$short_name = get_field( 'short_name', $post->ID );
    	if ( $company || $short_name ) {
        	$title = esc_html( $company . ( $company && $short_name ? ': ' : '' ) . $short_name );
    	}
    	return $title;
	},
	10,
	4
);