<!-- documents -->
<section class="documents">
    <div class="container-xl mb-4">
        <div class="row g-3">
        <?php
        foreach (get_field('documents') as $doc) {
            the_row();
            $ID = $doc;
            $title = get_the_title($ID); // "title"; // get_sub_field('download_title');
            $image = wp_get_attachment_image_url( $ID, 'medium' ) ?: '/wp-content/themes/cb-wessexme2025/img/cps-placeholder-a4.png';
            $file = basename( get_attached_file($ID) );
            $size = filesize( get_attached_file($ID) );
            $ftype = get_post_mime_type($ID);
            $ftype = preg_replace('/application\//','',$ftype);
            if (preg_match('/vnd.openxmlformats-officedocument.wordprocessingml.document/',$ftype)) {
                $ftype = 'docx';
            }
            $fsize = formatBytes($size);
            $link = wp_get_attachment_url($ID);
            ?>
            <div class="col-md-6 col-lg-3 col-xl-2">
                <a class="documents__card" href="<?=$link?>" download>
                    <div class="documents__image"><img src="<?=$image?>"></div>
                    <h3 class="documents__title"><?=$title?></h3>
                    <div class="documents__meta">
                        <div class="documents__info">
                            <!-- File <?=$file?> -->
                            <?=strtoupper($ftype)?>
                            (<?=$fsize?>)
                        </div>
                        <div class="documents__dl">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>