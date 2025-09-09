<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<main id="main" class="blog">
    <?php
    $content = get_the_content();
    $blocks = parse_blocks($content);
    $sidebar = array();
    $after;
    ?>
    <section class="breadcrumbs container-xl pt-4">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    </section>
    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-9 blog__content">
                <h1 class="blog__title text-blue-400"><?=get_the_title()?></h1>
                <div class="blog__date mb-2"><?=get_the_date('jS F Y')?></div>
                <img src="<?=$img?>" alt="" class="blog__image">
            <?php
            $count = estimate_reading_time_in_minutes( get_the_content(), 200, true, true );
            echo $count;

    foreach ($blocks as $block) {
        if ($block['blockName'] == 'core/heading') {
            if (!array_key_exists('level', $block['attrs'])) {
                $heading = strip_tags($block['innerHTML']);
                $id = acf_slugify($heading);
                echo '<a id="' . $id . '" class="anchor"></a>';
                $sidebar[$heading] = $id;
            }
        }
        echo render_block($block);
    }
            cb_post_nav(); 
            ?>
            </div>
            <div class="col-lg-3 related">
                <h3 class="text-blue-400 dot">Related News</h3>
            <?php
            $cats = get_the_category();
            $ids = wp_list_pluck($cats,'term_id');
            $r = new WP_Query(array(
                'category__in' => $ids,
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID())
            ));
            while ($r->have_posts()) {
                $r->the_post();
                ?>
                <a class="related__card d-block mb-3" href="<?=get_the_permalink()?>">
                    <div class="related__image_container">
                        <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?>" alt="" class="related__image">
                    </div>
                    <div class="related__content">
                        <h3 class="related__title"><?=get_the_title()?></h3>
                    </div>
                </a>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();