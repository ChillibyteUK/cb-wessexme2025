<section class="latest_cs related py-5">
    <div class="container-xl">
        <h2 class="text-blue-400 dot mb-5">Latest Case Studies</h2>
        <div class="row g-4 mb-4">
            <?php
    $q = new WP_Query(array(
        'post_type' => 'case-studies',
        'posts_per_page' => 3
    ));
            while ($q->have_posts()) {
                $q->the_post();
                ?>
            <div class="col-md-4">
                <a class="related__card"
                    href="<?=get_the_permalink()?>">
                    <div class="related__image_container">
                        <img src="<?=wp_get_attachment_image_url(get_field('gallery', get_the_ID())[0], 'large')?>"
                            alt="" class="related__image">
                    </div>
                    <div class="related__content">
                        <h3 class="related__title">
                            <?=get_the_title()?>
                        </h3>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="text-center"><a class="btn btn-primary" href="/case-studies/">Find out more</a></div>
    </div>
</section>