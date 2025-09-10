<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-tideywebb
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload" href="<?=get_stylesheet_directory_uri()?>/fonts/poppins-v20-latin-300.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?=get_stylesheet_directory_uri()?>/fonts/poppins-v20-latin-300.woff" as="font" type="font/woff" crossorigin="anonymous">
    <link rel="preload" href="<?=get_stylesheet_directory_uri()?>/fonts/poppins-v20-latin-600.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?=get_stylesheet_directory_uri()?>/fonts/poppins-v20-latin-600.woff" as="font" type="font/woff" crossorigin="anonymous">
    <?php
    if (is_front_page()) {
        ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "CPS Building Services Ltd",
  "logo": "https://www.cpsbuildingservices.co.uk/wp-content/themes/cb-wessexme2025/img/cps-og-1200x630.png",
  "url": "https://www.cpsbuildingservices.co.uk/",
  "telephone": "+441223232054",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Norman Way, Unit 15 Norman Way Industrial Estate",
    "addressLocality": "Over",
    "addressRegion": "Cambridgeshire",
    "postalCode": "CB24 5QE",
    "addressCountry": "GB"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 52.3046381,
    "longitude": 0.0203409
  } ,
  "sameAs": [
    "https://uk.linkedin.com/company/cps-building-services",
  ],
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+441223232054",
    "contactType": "enquiries"
  }],
  "openingHoursSpecification": [{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday"
        ],
        "opens": "08:00",
        "closes": "17:30"
  }]
}
</script>
        <?php
    }
    if (get_field('ga_property', 'options')) { 
        ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property','options')?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?=get_field('ga_property','options')?>');
</script>
        <?php
    }
    if (get_field('gtm_property', 'options')) {
        ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?=get_field('gtm_property','options')?>');</script>
<!-- End Google Tag Manager -->
        <?php
    }
    if (get_field('google_site_verification','options')) {
        echo '<meta name="google-site-verification" content="' . get_field('google_site_verification','options') . '" />';
    }
    if (get_field('bing_site_verification','options')) {
        echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification','options') . '" />';
    }
    ?>
	<?php wp_head(); ?>
	<meta name="google-site-verification" content="4W-KMZmlmLkobQbWLvM7uoxlOnabbV5vxhKhhdoSv0g" />
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php
do_action('wp_body_open'); 
?>
<div class="site" id="page">
    <div id="wrapper-navbar" class="fixed-top">
        <nav id="navbar" class="navbar navbar-expand-md d-block p-0 pt-2 pt-md-0" aria-labelledby="main-nav-label">
            <div class="container-xl mb-2 d-block d-md-flex">
                <div class="d-flex w-md-auto justify-content-between align-items-center px-2">
                    <a href="/" class="navbar-brand" rel="home"></a>
                    <button class="navbar-toggler input-button" id="navToggle" data-bs-toggle="collapse" data-bs-target=".navbars" type="button" aria-label="Navigation"><i class="fa fa-navicon"></i></button>
                </div>
                <div class="d-flex flex-column-reverse flex-md-column">
                    <div id="topNav" class="d-none d-md-flex px-2 px-md-0 collapse navbar-collapse navbars">
                        <ul id="top-nav" class="navbar-nav w-100 justify-content-end align-items-md-center mt-2 mt-md-0">
                            <li class="menu-item nav-item">
                                <a title="Phone" href="tel:<?=parse_phone(get_field('contact_phone','options'))?>" class="nav-link"><?=get_field('contact_phone','options')?></a>
                            </li>
                            <li class="menu-item nav-item">
                                <a title="Email" href="mailto:<?=get_field('contact_email','options')?>" class="nav-link"><?=get_field('contact_email','options')?></a>
                            </li>
                            <li class="nav-item"><?=do_shortcode('[social_in_icon]')?></li>
                        </ul>
                    </div>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'primary_nav',
                                'container_class' => 'pt-2 px-0 p-md-0 collapse navbar-collapse navbars',
                                'container_id'    => 'primaryNav',
                                'menu_class'      => 'navbar-nav justify-content-start align-items-md-end mt-2 mt-md-0',
                                'fallback_cb'     => '',
                                'menu_id'         => 'main-menu',
                                'depth'           => 2,
                                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                            )
                        );
                    ?>
                </div>
            </div>
		
        </nav>
    </div>