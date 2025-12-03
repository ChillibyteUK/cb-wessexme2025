<?php
$list = array();
$title = '';

if (get_field('type') == 'Accreditations') {
    $title = 'Accreditations';
    $list = get_field('accreditations','options');        
}
else {
    $title = 'Awards';
    $list = get_field('awards','options');
}
?>
<section class="awards_list pb-5">
    <div class="container-xl">
        <h2 class="dot mb-5"><?=$title?></h2>
        <div class="row g-4">
        <?php
        foreach ($list as $l) {
            ?>
            <div class="col-md-3 text-center"><img src="<?=wp_get_attachment_image_url($l['logo'],'large')?>" alt="" class="logo"></div>
            <div class="col-md-9"><?=$l['description']?></div>
            <?php
        }
        ?>
        </div>
    </div>
</section>