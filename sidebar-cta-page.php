<?php
/*
Template Name: Sidebar CTA Page
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
        ?>
            </div>
            <div class="col-lg-3">
                <div class="sidebar d-block">
                    <div class="sidebar__title h3"><?=get_field('sidebar_title','options')?></div>
                    <div class="sidebar__content mb-4"><?=get_field('sidebar_content','options')?></div>
                    <div class="text-center">
                        <a href="/contact/" class="btn btn-primary">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
require('page-templates/blocks/cb_testimonials.php');
    ?>
</main>
<?php
get_footer();