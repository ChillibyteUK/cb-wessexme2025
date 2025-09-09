<?php
$order_left = (get_field('order') == 'text') ? 'order-1 order-lg-1' : 'order-1 order-lg-2';
$order_right = (get_field('order') == 'text') ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
$bg = get_field('background_colour');
?>
<!-- text_image -->
<section class="text_image py-5 bg--<?=$bg?>">
    <div class="container animated wow fadeIn">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center text_image__content <?=$order_left?>">
                <?php
                if (get_field('title')) {
                    echo '<h2 class="text-blue-400 dot">' . get_field('title') . '</h2>';
                }
                if (get_field('subtitle')) {
                    echo '<h3 class="text-burgundy-400">' . get_field('subtitle') . '</h3>';
                }
                echo get_field('content');
                if (get_field('cta')) {
                    $cta = get_field('cta');
                    echo '<a href="' . $cta['url'] . '" target="' . $cta['target'] .'" class="btn btn-primary">' . $cta['title'] . '</a>';
                }
                ?>
            </div>
            <div class="col-lg-6 text_image__image <?=$order_right?> px-lg-5">
                <img class="img-fluid" src="<?=wp_get_attachment_image_url(get_field('image'), 'full')?>">
            </div>
        </div>
    </div>
    <?php
    if (get_field('full_height')) {
        ?>
        <div class="nav-arrow"><a href="#page<?=$pp?>"><i class="fas fa-angle-down"></i></a></div>
        <?php
    }
    ?>
</section>