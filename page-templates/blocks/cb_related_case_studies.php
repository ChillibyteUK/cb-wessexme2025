<?php
$service = get_field('service');
$sector = get_field('sector');

$serviceTax = '';
$sectorTax = '';

if ($service) {
    $serviceTax = array(
        'taxonomy' => 'csservice',
        'field' => 'term_id',
        'terms' => $service
    );
}

if ($sector) {
    $sectorTax = array(
        'taxonomy' => 'cssector',
        'field' => 'term_id',
        'terms' => $sector
    );
}

$r = new WP_Query(array(
    'post_type' => 'case-studies',
    'posts_per_page' => 3,
    'tax_query' => array(
        'relation' => 'AND',
        $serviceTax,
        $sectorTax
    )
));
if ($r->have_posts()) {
        ?>
<div class="container-xl">
    <section class="related pb-5">
        <h2 class="text-blue-400 dot">Related Case Studies</h2>
        <div class="row g-4">
    <?php
    while ($r->have_posts()) {
        $r->the_post();
        ?>
        <div class="col-md-6 col-xl-4">
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
    </section>
</div>
    <?php
}
?>