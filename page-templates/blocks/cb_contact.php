<div class="container-xl py-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <p><?=get_field('contact_intro','options')?></p>

            <ul class="fa-ul no-indent">
                <li class="mb-2"><span class="fa-li"><i class="fas fa-map-marker-alt"></i></span> <?=get_field('contact_address','options')?></li>
                <li class="mb-2"><span class="fa-li"><i class="far fa-envelope"></i></span> <?=do_shortcode('[contact_email]')?></li>
                <li class="mb-2"><span class="fa-li"><i class="fas fa-phone-alt"></i></span> <?=do_shortcode('[contact_phone]')?></li>
                <?php
                if (get_field('contact_fax','options') ?? null) {
                    ?>
                <li class="mb-2"><span class="fa-li"><i class="fas fa-fax"></i></span> <?=get_field('contact_fax','options')?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-lg-6">
            <iframe src="<?=get_field('google_maps_url','options')?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>