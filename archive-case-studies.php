<?php
/**
 * The template for displaying the Case Studies archive page
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

$page_for_posts = get_option( 'page_on_front' );
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
                <h1>Case Studies</h1>
            </div>
        </div>
    </div>
</section>

    <div class="container-xl py-5">
        <?php
        $cats = get_terms(
			array(
				'taxonomy'   => 'cssector',
				'hide_empty' => true,
			)
		);
        ?>
        <div class="filters mb-4">
            <?php
			echo '<button class="btn btn-outline-primary active me-2 mb-2" data-filter="*">All</button>';
			foreach ( $cats as $cscat ) {
				echo '<button class="btn btn-outline-primary me-2 mb-2" data-filter=".' . esc_attr( sanitize_title( $cscat->name ) ) . '">' . esc_html( $cscat->name ) . '</button>';
			}
        	?>
        </div>
        <div class="cs_index">
            <?php
			$case_studies_query = new WP_Query(
				array(
					'post_type' => 'case-studies',
					'posts_per_page' => -1,
				)
			);

            if ( $case_studies_query->have_posts() ) {
                while ( $case_studies_query->have_posts() ) {
                    $case_studies_query->the_post();
                    $img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    if ( ! $img ) {
                        $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
                    }
                    $cats     = get_the_terms( get_the_ID(), 'cssector' );
                    $category = wp_list_pluck( $cats, 'name' );
                    $flashcat = $category[0] ?? null ? acf_slugify( $category[0] ) : '';
                    $catclass = implode( ' ', array_map( 'cbslugify', $category ) );
                    $category = implode( ',', $category );

                    $the_date = get_the_date( 'jS F, Y' );

                    $gallery = get_field( 'gallery', get_the_ID() );
                    $img     = wp_get_attachment_image_url( $gallery[0], 'large' );

                    ?>

                <a href="<?= esc_url( get_the_permalink( get_the_ID() ) ); ?>" class="cs_index__card <?= esc_attr( $catclass ); ?>">
                    <div class="cs_index__image_container">
                        <div class="cs_index__flash index_card__flash--<?= esc_attr( $flashcat ); ?>"><?= esc_html( $category ); ?></div>
                        <img class="cs_index__image" src="<?= esc_url( $img ); ?>">
                    </div>
                    <div class="cs_index__content">
                        <div class="cs_index__title"><?= esc_html( get_the_title() ); ?></div>
                    </div>
                </a>
                    <?php
				}
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</main>
<?php
add_action(
	'wp_footer',
	function () {
		?>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var grid = document.querySelector('.cs_index');
    if (!grid || typeof Isotope === 'undefined') return;
    var iso = new Isotope(grid, {
        itemSelector: '.cs_index__card',
        percentPosition: true,
        layoutMode: 'fitRows',
    });

    var filters = document.querySelector('.filters');
    if (filters) {
        filters.addEventListener('click', function (e) {
            if (e.target.tagName === 'BUTTON') {
                var filterValue = e.target.getAttribute('data-filter');
                var active = filters.querySelector('.active');
                if (active) active.classList.remove('active');
                e.target.classList.add('active');
                iso.arrange({ filter: filterValue });
            }
        });
    }
});
</script>
		<?php
	},
	9999
);

get_footer();