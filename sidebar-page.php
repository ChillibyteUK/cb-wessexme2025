<?php
/*
Template Name: Sidebar Page
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main">
    <?php
    $content = get_the_content();
    $blocks = parse_blocks($content);
    
    foreach ($blocks as $block) {
        if ($block['blockName'] == 'acf/cb-hero') {
            echo render_block($block);
        }
    }
    ?>
    <div class="container-xl mb-4">
        <div class="row">
            <div class="col-lg-9">
        <?php
        foreach ($blocks as $block) {
            if ($block['blockName'] == 'acf/cb-hero') {
                continue;
            }
            echo render_block($block);
        }
        $link = get_field('cta');
        ?>
            </div>
            <div class="col-lg-3">
                <div class="sidebar d-block">
                    <div class="sidebar__title h3"><?=get_field('sidebar_title')?></div>
                    <div class="sidebar__content mb-4"><?=get_field('sidebar_content')?></div>
                    <?php
                    if ($link ?? null) {
                        ?>
                    <div class="text-center">
                        <a href="<?=$link['url']?>" class="btn btn-primary"><?=$link['title']?></a>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
require('page-templates/blocks/cb_testimonials.php');
wp_reset_postdata();
$about = get_page_by_path('about-us') ?? null;
if ($about) {
    if (get_the_ID() == $about->ID) {
        require('page-templates/blocks/cb_andwis.php');
    }
}
    ?>
</main>
<?php
get_footer();