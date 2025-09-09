<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
</div> <!-- end page -->
<div id="footer-top"></div>
<footer>
    <div class="footer container-xl pt-5 pb-3">
        <div class="row">
            <div class="col-lg-3 d-flex align-items-start">
                <img src="<?=get_stylesheet_directory_uri()?>/img/watertite-logo--wo.svg"
                    class="footer__logo" alt="Watertite Logo">
            </div>
            <div class="col-lg-3">
                <div class="footer__heading">Services</div>
                <?=wp_nav_menu(array('theme_location' => 'footer_menu1'))?>
            </div>
            <div class="col-lg-2">
                <div class="footer__heading">Sectors</div>
                <?=wp_nav_menu(array('theme_location' => 'footer_menu2'))?>
            </div>
            <div class="col-lg-2">
                <div class="footer__heading">Watertite</div>
                <?=wp_nav_menu(array('theme_location' => 'footer_menu3'))?>
            </div>
            <div class="col-lg-2">
                <div class="footer__heading">Contact</div>
                    <p class="mb-2"><?=do_shortcode('[contact_address]')?></p>
                    <p><?=do_shortcode('[contact_phone]')?></p>
                    <p><?=do_shortcode('[contact_email]')?></p>
                    <p><?=do_shortcode('[social_in_icon]')?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="colophon">
        <div class="container py-2">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="col-md-10 text-center text-md-start">
                    &copy; <?=date('Y')?> Watertite Heating Ltd. Registered in England no 02335007
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end flex-wrap gap-3">
                    <div><a href="/cookies-policy/">Cookies Policy</a></div> |
                    <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
                    title="Digital Marketing by Chillibyte"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
?>
</body>

</html>