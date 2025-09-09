<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('wp_head',function(){
    echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css" />';
});

get_header();
?>
<main id="main" class="case-study">
    <?php
    $content = get_the_content();
    $blocks = parse_blocks($content);
    ?>
    <section class="breadcrumbs container-xl pt-4">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    </section>
    <div class="container-xl">
        <h1 class="mb-4 text-blue-400 dot"><?=get_the_title()?></h1>
        <div class="row g-4 pb-4">
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="text-blue-400">Key Facts</h3>
                    <div class="sidebar__grid">
                    <?php
                        if (get_field('location') ?? null) {
                            ?>
                            <div class="sidebar__title grid-cols-2">Location:</div>
                            <div class="sidebar__value grid-cols-2"><?=get_field('location')?></div>
                            <?php
                        }
                    if (get_field('client') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Client:</div>
                        <div class="sidebar__value grid-cols-2"><?=get_field('client')?></div>
                        <?php
                    }
                    if (get_field('main_contractor') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Principal Contractor:</div>
                        <div class="sidebar__value grid-cols-2"><?=get_field('main_contractor')?></div>
                        <?php
                    }
                    if (get_field('objectives') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Objectives:</div>
                        <div class="sidebar__value grid-cols-2"><?=cb_list(get_field('objectives'))?></div>
                        <?php
                    }
                    if (get_field('solution') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Solution:</div>
                        <div class="sidebar__value grid-cols-2"><?=cb_list(get_field('solution'))?></div>
                        <?php
                    }
                    if (get_field('supporting_mfrs') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Supporting Manufacturers:</div>
                        <div class="sidebar__value grid-cols-2"><?=cb_list(get_field('supporting_mfrs'))?></div>
                        <?php
                    }
                    if (get_field('supporting_specialists') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Supporting Specialists:</div>
                        <div class="sidebar__value grid-cols-2"><?=cb_list(get_field('supporting_specialists'))?></div>
                        <?php
                    }
                    if (get_field('benefits') ?? null) {
                        ?>
                        <div class="sidebar__title grid-cols-2">Benefits:</div>
                        <div class="sidebar__value grid-cols-2"><?=cb_list(get_field('benefits'))?></div>
                        <?php
                    }
                    if (get_field('date_completed') ?? null) {
                        ?>
                        <div class="sidebar__title">Date Completed:</div>
                        <div class="sidebar__value"><?=get_field('date_completed')?></div>
                        <?php
                    }
                    if (get_field('project_duration') ?? null) {
                        ?>
                        <div class="sidebar__title">Project Duration:</div>
                        <div class="sidebar__value"><?=get_field('project_duration')?></div>
                        <?php
                    }
                    if (get_field('engineers_on_site') ?? null) {
                        ?>
                        <div class="sidebar__title">Engineers on Site:</div>
                        <div class="sidebar__value"><?=get_field('engineers_on_site')?></div>
                        <?php
                    }
                    if (get_field('project_value') ?? null) {
                        ?>
                        <div class="sidebar__title">Project Value:</div>
                        <div class="sidebar__value">&pound;<?=number_format(get_field('project_value'))?></div>
                        <?php
                    }
                    ?>
                    </div>
                    <div class="text-center mt-4">
                        <a href="/contact/" class="btn btn-primary">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 case-study__content">
                <?php
                $img = wp_get_attachment_image_url(get_field('gallery')[0],'full');
                ?>
                <img src="<?=$img?>" alt="" class="case-study__image">
            <?php

            $sector = get_the_terms(get_the_ID(), 'cssector')[0]->name ?? null ?: '';
            $service = implode(', ', wp_list_pluck( get_the_terms(get_the_ID(), 'csservice'), 'name') ) ?? null ?: '';
            ?>
        <div class="cs-sector">
            <div><strong>Sector:</strong> <?=$sector?></div>
            <div><strong>Project Type:</strong> <?=$service?></div>
        </div>
            <?php

            // $count = estimate_reading_time_in_minutes( get_the_content(), 200, true, true );
            // echo $count;

    foreach ($blocks as $block) {
        echo render_block($block);
    }
            ?>
            <?php
            $images = get_field('gallery');
            if (count($images) > 1) {
                echo '<div class="gallery mt-4">';
                foreach ($images as $img) {
                    ?>
                    <a class="gallery__preview" data-fancybox="gallery" href="<?=wp_get_attachment_image_url( $img, 'full' )?>" style="background-image:url(<?=wp_get_attachment_image_url( $img, 'large' )?>)"></a>
                    <?php
                }
                echo '</div>';
            }
            ?>
            <?php cb_post_nav(); ?>
            </div>
        </div>
        <?php
        $cats = get_the_terms(get_the_ID(),'cssector');
        $ids = wp_list_pluck($cats,'term_id');
        $r = new WP_Query(array(
            'post_type' => 'case-studies',
            'posts_per_page' => 4,
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'cssector',
                    'field' => 'term_id',
                    'terms' => $ids
                )
            )
        ));
        if ($r->have_posts()) {
                ?>
            <section class="related pb-5">
                <h2 class="text-blue-400 dot">Related Case Studies</h2>
                <div class="row g-4">
            <?php
            while ($r->have_posts()) {
                $r->the_post();
                ?>
                <div class="col-md-6 col-xl-3">
                    <a class="related__card" href="<?=get_the_permalink()?>">
                        <div class="related__image_container">
                            <img src="<?=wp_get_attachment_image_url(get_field('gallery',get_the_ID())[0],'large')?>" alt="" class="related__image">
                        </div>
                        <div class="related__content">
                            <h3 class="related__title"><?=get_the_title()?></h3>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
        ?>
        </section>
    </div>
</main>
<?php
add_action( 'wp_footer', function(){
    ?>
<script src="<?=get_stylesheet_directory_uri()?>/js/jquery.fancybox.min.js"></script>
    <?php
},9999);
get_footer();