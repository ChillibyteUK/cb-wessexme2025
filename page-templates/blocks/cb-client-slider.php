<?php
/**
 * CB Client Slider Block
 *
 * @package cb-wessexme2025
 */

defined( 'ABSPATH' ) || exit;

if ( have_rows( 'client_logos', 'options' ) ) {
	?>
<section class="clients py-5">
    <div class="container-xl">
        <h2 class="text-blue-400 dot mb-5">Our Clients</h2>
        <div class="clients__slider swiper">
            <div class="swiper-wrapper">
                <?php
				while ( have_rows( 'client_logos', 'options' ) ) {
					the_row();
					?>
                    <div class="swiper-slide logo">
                        <img src="<?php echo esc_url( wp_get_attachment_image_url( get_sub_field( 'logo' ), 'large' ) ); ?>" alt="Client Logo">
                    </div>
                	<?php
				}
				?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
	<?php
}

add_action(
    'wp_footer',
    function () {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Swiper !== 'undefined') {
                new Swiper('.clients__slider.swiper', {
                    loop: true,
                    slidesPerView: 6,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 1000,
                        disableOnInteraction: false,
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
                    breakpoints: {
						0: { slidesPerView: 1 },
						576: { slidesPerView: 1 },
                        992: { slidesPerView: 6 }
                    }
                });
            }
        });
        </script>
        <?php
    },
    9999
);
