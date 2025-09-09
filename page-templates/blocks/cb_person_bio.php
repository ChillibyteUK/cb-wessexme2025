<section class="person_bio py-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="<?=wp_get_attachment_image_url(get_field('image'),'full')?>" alt="<?=get_field('name')?>" class="person_bio__image">
                <div class="person_bio__name"><?=get_field('name')?></div>
                <div class="person_bio__role"><?=get_field('role')?></div>
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-center">
                <?=get_field('bio')?>
            </div>
        </div>
    </div>
</section>