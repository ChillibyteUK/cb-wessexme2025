<?php
if (have_rows('client_logos','options')) {
    ?>
<section class="clients py-5">
    <div class="container-xl">
        <h2 class="text-blue-400 dot mb-5">Our Clients</h2>
        <div class="clients__slider">
            <?php
        while (have_rows('client_logos','options')) {
            the_row();
        ?>
    <div class="logo"><img src="<?=wp_get_attachment_image_url(get_sub_field('logo'),'large')?>"></div>
        <?php
        }
        ?>
        </div>
    </div>
</section>
<?php
}
add_action('wp_footer', function () {
    ?>
<script type="text/javascript">
jQuery(function($){
    $('.clients__slider').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        speed: 500,
        pauseOnHover: false,
        cssEase: 'ease',
        arrows: true,
        nextArrow: '<i class="fa fa-angle-right fa-2x"></i>',
        prevArrow: '<i class="fa fa-angle-left fa-2x"></i>',
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true
                }
            }
        ]
    });
});
</script>
    <?php
}, 9999);
?>