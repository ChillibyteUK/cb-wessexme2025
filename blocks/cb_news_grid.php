<?php
$q = new WP_Query(array(
    'posts_per_page' => 4
))
?>
<section class="news_grid py-5">
    <div class="container-xl">
        <h2 class="dot mb-5">Latest News</h2>
        <div class="news_grid__grid mb-5">
        <?php
while ($q->have_posts()) {
    $q->the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(),'large');
    ?>
<a href="<?=get_the_permalink()?>" class="news_grid__item" style="background-image:url(<?=$img?>)">
    <div class="news_grid__content">
        <div class="overlay"></div>
        <h3><?=get_the_title()?></h3>
        <div class="news_meta"><?=get_the_date('j F Y')?></div>
    </div>
</a>
    <?php
}
        ?>
        </div>
        <div class="text-center">
            <a href="/news/" class="btn btn-primary">All news</a>
        </div>
    </div>
</section>
