<section class="sectors_nav py-5">
    <div class="container-xl">
        <h2 class="dot mb-3"><?=get_field('title')?></h2>
        <?php
        if (get_field('intro')) {
            ?>
        <div class="fs-450 w-short"><?=get_field('intro')?></div>
            <?php
        }
        ?>
        <div class="sectors mt-5">
        <?php
        while (have_rows('sectors')) {
            the_row();
            $s = get_sub_field('sector');
            $img = get_the_post_thumbnail($s,'large') ?: get_stylesheet_directory_uri() . '/img/missing-image.png';
            ?>
            <a class="sectors__card" href="<?=get_the_permalink($s)?>">
                <div class="img_container"><img src="<?=$img?>"></div>
                <h3 class="fs-450 text-burgundy-400"><?=get_the_title($s)?></h3>
            </a>
            <?php
        }
        ?>
        </div>
    </div>
</section>