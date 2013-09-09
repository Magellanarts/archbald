<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Borough of Archbald</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Volkhov:400italic' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
</head>
<body>
<section class="ba-site-container">
    <?php include('site-sidebar.php'); ?>

    <?php $page = get_page_by_title( 'home' ); ?>
    <section data-class="ba-site-content" style="background-image: url(<?php the_field('background_image', $page->ID); ?>);"   class="ba-container ba-site-content">
        <header class="ba-site-header">
            <a data-class="ba-slide-nav-link" data-visible="false" data-ipad="false" class="ba-home-link ba-container" href="<?php echo home_url(); ?>"> <span class="ba-home-link-text" data-class="ba-home-link-text">Open<br /> Menu</span></a>


            <div class="ba-borough-information ba-container">
                
                <div class="ba-logo ba-container">
                    <img src="<?php echo bloginfo('template_url'); ?>/img/logo.png" alt="Borough of Archbald - Lackawanna County, Northeast Pennsylvania" />
                </div>
                <div class="ba-contact-information ba-container">
                    <div class="ba-address">
                        <div class="ba-address-street-address">400 Church Street</div>
                        <div class="ba-address-city-state-zip">
                            <span class="ba-address-city">Archbald</span>,
                            <span>PA</span>
                            <span>18403</span>
                        </div>
                    </div>

                    <div class="ba-phone-numbers">
                        <div class="ba-phone-number">
                            <span class="ba-phone-numbers-label">Tel:</span>
                            <span class="ba-phone-number-digits">570-876-1800</span>
                        </div>
                        <div class="ba-phone-number">
                            <span class="ba-phone-numbers-label">Fax:</span>
                            <span class="ba-phone-number-digits fax">570-876-5518</span>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="ba-search ba-container">
                <div class="ba-search-button">Search</div>
                <form class="ba-search-form" data-class="ba-search-form">
                    <input type="text" placeholder="Enter keywords to search" />
                    <button type="submit">Submit</button>   
                </form>
            </div>

        </header>

        <section class="ba-content">
            <div data-class="ba-main-content" class="ba-main-content ba-container">
                <div data-class="ba-main-content-pjax">