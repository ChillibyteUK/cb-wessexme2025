<section class="accreditations py-5">
    <div class="container-xl">
        <h2 class="text-blue-400 dot mb-5">Accreditations &amp; Awards</h2>
        <div class="accreditations__grid mb-5">
            <?php
            $c = 0;
            while(have_rows('accreditations','options')) {
                the_row();
                if ($c > 5) {
                    continue;
                }
                ?>
                <img class="logo" src="<?=wp_get_attachment_image_url(get_sub_field('logo'),'large')?>" alt="">
                <?php
                $c++;
            }
            ?>
        </div>
        <div class="text-center"><a class="btn btn-primary" href="/about-us/accreditations-awards/">Find out more</a></div>
    </div>
</section>
