<?php
/**
 * CB Testimonials Slider
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

$q = new WP_Query(
	array(
		'post_type'      => 'testimonials',
		'posts_per_page' => -1,
	)
);
if ( $q->have_posts() ) {
    ?>
<section class="testimonials py-5">
    <div class="container-xl">
        <h2 class="dot mb-5">Testimonials</h2>
		<div class="testimonials__slider swiper">
            <div class="swiper-wrapper">
				<?php
				while ( $q->have_posts() ) {
					$q->the_post();
					?>
                <div class="swiper-slide logo">
                    <div class="testimonials__body text-center">
                        <div class="testimonials__content text-pretty"><?= wp_kses_post( get_the_content( null, false, get_the_ID() ) ); ?></div>
                        <div class="testimonials__cite"><?= esc_html( get_the_title() ); ?></div>
                    </div>
                </div>
					<?php
				}
				?>
            </div>
        </div>
    </div>
</section>
	<?php
}
wp_reset_postdata();

add_action(
    'wp_footer',
    function () {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                new Swiper('.testimonials__slider.swiper', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: true,
                    },
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            }
        });
        </script>
        <?php
    },
    9999
);
