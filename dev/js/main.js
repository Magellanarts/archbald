/*jslint browser: true */
/*global jQuery, console, enquire*/

jQuery(document).ready(function () {
    'use strict';


    //show child menu
    jQuery('#menu-primary > li').on('hover', function() {
        jQuery(this).find('.sub-menu').slideToggle();
    }); 

    //Page Gallery 
    jQuery('[data-class="ba-page-gallery"]').cycle();

    function showSidebar(animate) {
    	if(animate === true) {
    		jQuery('[data-class="ba-site-sidebar"]').animate({
				left: 0
			}, 1000);

			jQuery('[data-class="ba-site-content"]').css('position', 'absolute').animate({
				left: '285px'
			}, 1000);	
		} else {
			jQuery('[data-class="ba-site-sidebar"]').css('width', '0').css('left', 0);
			jQuery('[data-class="ba-site-content"]').css('position', 'relative').css('left', 0);
		}
		
		jQuery('[data-class="ba-slide-nav-link"]').attr('data-visible', 'true');	
    	
    	
    }

    function hideSidebar(animate) {
    	if(animate === true) {
	    	jQuery('[data-class="ba-site-sidebar"]').animate({
			    left: '-285px'
			}, 1000);

			jQuery('[data-class="ba-site-content"]').animate({
				left: 0
			}, 1000, function () {
				jQuery(this).css('position', 'relative');
			});

		} else {
			jQuery('[data-class="ba-site-sidebar"]').css('left', '-285px');
			jQuery('[data-class="ba-site-content"]').css('position', 'relative').css('left', 0);

		}

		jQuery('[data-class="ba-slide-nav-link"]').attr('data-visible', 'false');
    }

    jQuery('[data-class="ba-slide-nav-link"]').on('click', function(e) {

    	if(jQuery(this).attr('data-ipad') === 'true') {
    		e.preventDefault();
	    	var button = jQuery(this),
	    		visibility = button.attr('data-visible');

	    		if(visibility === 'false') {
	    			showSidebar(true);

	    		} else {
	    			hideSidebar(true);
	    		}
    		return false;	
    	}

    	
    });


    //Handling iPad Resize
    enquire.register("screen and (max-width:980px)", {
    	match : function() {
    		jQuery('[data-class="ba-slide-nav-link"]').attr('data-ipad', 'true');
    		hideSidebar(false);
             jQuery('.ba-site-container').css('padding-left', '0');
    	},
    	unmatch : function() {
    		jQuery('[data-class="ba-slide-nav-link"]').attr('data-ipad', 'false');
    		showSidebar(false);
    	}
    });



    //PJAX
    jQuery('a:not([data-class="page-subsection-list-link"])').pjax('[data-class="ba-main-content-pjax"]');
    

     jQuery('[data-class="page-subsection-list-link"]').on('click', function () {
     	jQuery('html,body').animate({scrollTop: jQuery(this).offset().top},'slow');
     });


    //Window Resize
     if(jQuery('[data-class="ba-site-sidebar"]').width() < 285 && jQuery(window).width() > 980) {

            jQuery('.ba-site-container').css('padding-left', '285px');
        }
    jQuery(window).resize(function () { 
        if(jQuery('[data-class="ba-site-sidebar"]').width() < 285 && jQuery(window).width() > 980) {
            jQuery('.ba-site-container').css('padding-left', '285px');
        }
    });
    


    //Accordions
    jQuery('[data-class="ba-accordion-list-question"]').on('click', function () {
    	jQuery(this).next('[data-class="ba-accordion-list-answer"]').slideToggle();
    });
});


