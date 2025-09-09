<?php
$class = $block['className'] ?? null;
$bg = get_vimeo_data_from_id(get_field('vimeo_id'), 'thumbnail_url');
?>
<section class="video <?=$class?>">
    <div class="lite-vimeo ratio ratio-16x9" data-aos="fade">
        <iframe src="https://player.vimeo.com/video/<?=get_field('vimeo_id')?>?badge=0&amp;autopause=0&amp;progress_bar=1&amp;player_id=0&amp;app_id=58479" allow="autoplay; fullscreen; picture-in-picture" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Timber Rooms"></iframe>
    </div>
</section>
<script src="https://player.vimeo.com/api/player.js"></script>
</section>