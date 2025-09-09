<?php
$q = new WP_Query( array(
    'post_type' => 'testimonials',
    'posts_per_page' => -1
));
if ($q->have_posts()) {
    ?>
<section class="testimonials py-5">
    <div class="container-xl">
        <h2 class="dot mb-5">Testimonials</h2>
        <div class="testimonials__slider">
            <?php
            while ($q->have_posts()) {
                $q->the_post();
                ?>
                <div class="testimonials__testimonial">
                    <div class="testimonials__body">
                        <div class="testimonials__content"><?=get_the_content(null,false,get_the_ID())?></div>
                        <div class="testimonials__cite"><?=get_the_title()?></div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script type="text/javascript">
jQuery(function($){
    $('.testimonials__slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: true,
        cssEase: 'linear',
        fade: true,
        arrows: true,
        dots: false,
        nextArrow: '<i class="fa fa-angle-right fa-2x"></i>',
        prevArrow: '<i class="fa fa-angle-left fa-2x"></i>'
    });
});
</script>
    <?php
}, 9999);

}