"use strict";

var photobooth_window = jQuery(window);
jQuery(document).ready(function(){

    /* Preloader */

    if (jQuery('.photobooth_preloader_wrapper').length > 0) {
        jQuery('.photobooth_preloader_wrapper').addClass('run_preloader');
    }
    

    /* Menu */

   	if (jQuery('.mobile_header').length > 0) {
        jQuery('.mobile_header').after('<div class="mobile_menu_wrapper"><ul class="mobile_menu"/></div>');
        jQuery('.mobile_menu').html(jQuery('.photobooth_menu_cont').find('ul.photobooth_menu').html());
        jQuery('.mobile_menu_wrapper').hide();
        jQuery('.btn_mobile_menu').on('click', function () {
            jQuery('.mobile_menu_wrapper').stop().slideToggle(300);
            jQuery('.photobooth_header').toggleClass('opened');
        });
    }


    if (jQuery('.photobooth_anim_block_left').length) {
        jQuery('.photobooth_anim_block_left').addClass('photobooth_hidden').viewportChecker({    
       		classToAdd: 'photobooth_visible animated fadeInLeft'		 
      	});
    }
    if (jQuery('.photobooth_anim_block_right').length) {
        jQuery('.photobooth_anim_block_right').addClass('photobooth_hidden').viewportChecker({       
       		classToAdd: 'photobooth_visible animated fadeInRight' 		 
      	});
    }
    if (jQuery('.photobooth_anim_block_zoom').length) {
      	jQuery('.photobooth_anim_block_zoom').addClass('photobooth_hidden').viewportChecker({      
       		classToAdd: 'photobooth_visible animated zoomIn' 		 
      	});
    }
    if (jQuery('.photobooth_anim_block_top').length) {
      	jQuery('.photobooth_anim_block_top').addClass('photobooth_hidden').viewportChecker({
       		classToAdd: 'photobooth_visible animated bounceInUp'  		 
      	});
    }
    if (jQuery('.photobooth_anim_block_top_fade').length) {
        jQuery('.photobooth_anim_block_top_fade').addClass('photobooth_hidden').viewportChecker({
            classToAdd: 'photobooth_visible animated fadeInUp',
            offset: 130 
        });
    }


    photobooth_theme_setup();

	/* Swipebox */

    if (jQuery('a.swipebox-video').length) {
        jQuery('html').addClass('photobooth_swipe_box');
        jQuery('.swipebox-video').swipebox({
      selector: '.swipebox-video',
            afterOpen: function () {
                photobooth_setup_box();
            }
        });
    }
	if (jQuery('a.swipebox').length) {
        jQuery('html').addClass('photobooth_swipe_box');
        jQuery('.swipebox').swipebox({
     	selector: '.swipebox',
            afterOpen: function () {
                photobooth_setup_box();
            }
        });
    }
    function photobooth_setup_box() {
	    var swipe_slider = jQuery('#swipebox-slider'),
	        swipe_title = jQuery('#swipebox-top-bar'),
	        swipe_bottom = jQuery('#swipebox-bottom-bar'),
	        setHeight = 0;
	    setHeight = jQuery(window).height() - swipe_title.height() - swipe_bottom.height();
    swipe_slider.height(setHeight).css('top', swipe_title.height());
	}

	jQuery(document).on("click", "#swipebox-container .slide.current img", function (e) {
    	jQuery('#swipebox-next').trigger('click');
   	 e.stopPropagation();
	});

	jQuery(document).on("click", "#swipebox-container", function (e) {
    	jQuery('#swipebox-close').trigger('click');
	});

	/* Contact Form */
	
  jQuery('.photobooth_form input[type=submit]').on('click', function(){
    var this_contact = jQuery(this).parents('form');
    jQuery.post('mail.php', {
      send_mail: 'true',
      form_name: this_contact.find('input[name=name]').val(),
      form_email: this_contact.find('input[name=email]').val(),
      form_text: this_contact.find('textarea[name=message]').val(),
    }).done(function (data) {
      alert(data);
    });

    return false;
  });


  if (jQuery('.photobooth_js_bg_image').length > 0) {
        jQuery('.photobooth_js_bg_image').each(function () {
            jQuery(this).css('background-image', 'url(' + jQuery(this).attr('data-src') + ')');
        });
    }

  photobooth_countdown();
  photobooth_cs_page_centered();
  
  jQuery('.photobooth_grid_about_element').each(function(){
  	var items_set = [
            {src: 'img/image02-800x600.jpg', href: 'img/image02.jpg'},
            {src: 'img/image21-800x600.jpg', href: 'img/image21.jpg'},
            {src: 'img/image19-800x600.jpg', href: 'img/image19.jpg'},
            {src: 'img/image18-800x600.jpg', href: 'img/image18.jpg'}
        ];

        jQuery('#list').grid_gallery_about({
            load_count: 2,
            items: items_set
        });
  });

  jQuery('.photobooth_grid_gallery_element').each(function(){
  	var items_set = [
            {src: 'img/image16-800x600.jpg', href: 'img/image16.jpg'},
            {src: 'img/image17-800x600.jpg', href: 'img/image17.jpg'},
            {src: 'img/image18-800x600.jpg', href: 'img/image18.jpg'},
            {src: 'img/image19-800x600.jpg', href: 'img/image19.jpg'},
            {src: 'img/image20-800x600.jpg', href: 'img/image20.jpg'},
            {src: 'img/image21-800x600.jpg', href: 'img/image21.jpg'}
        ];

        jQuery('#list').grid_gallery_about({
            load_count: 3,
            items: items_set
        });
  });

  jQuery('.photobooth_masonry_gallery_element').each(function(){
  	var items_set = [
            {src: 'img/masonry-10-960x1250.jpg', href: 'img/masonry-10.jpg'},
            {src: 'img/masonry-11-960x694.jpg', href: 'img/masonry-11.jpg'},
            {src: 'img/masonry-12-960x884.jpg', href: 'img/masonry-12.jpg'}          
        ];

        jQuery('#list').grid_gallery_masonry({
            load_count: 3,
            items: items_set
        });
  });


  jQuery('.photobooth_album-listing_element').each(function(){
  	var items_set = [
            {src: 'img/image14-915x600.jpg', title: 'Hot Summertime', cat_name1: 'Events', cat_name2: ' / People', href1: 'album-category.html', href2: 'album-category.html'},
            {src: 'img/image16-915x600.jpg', title: 'Girl Portrait', cat_name1: 'Portrait', cat_name2: '', href1: 'album-category.html', href2: 'album-category.html'},
            {src: 'img/image21-915x600.jpg', title: 'Beauty In Hat', cat_name1: 'Fashion', cat_name2: ' / Portrait', href1: 'album-category.html', href2: 'album-category.html'},
            {src: 'img/image06-915x600.jpg', class: 'grid-item--width2', title: 'Luxury Life', cat_name1: 'Fashion', cat_name2: ' / People', href1: 'album-category.html', href2: 'album-category.html'},
            {src: 'img/image01-915x600.jpg', class: 'grid-item--width2', title: 'Walking Down The Streets', cat_name1: 'Events', cat_name2: '', href1: 'album-category.html', href2: 'album-category.html'}          
        ];

        jQuery('#list').album_listing({
            load_count: 5,
            items: items_set
        });
  });


  jQuery('.photobooth_grid_blog_element').each(function(){
  	var items_set = [
            {src: 'img/image13-800x450.jpg', title: 'Sweet Blonde', cat_name1: ' Portrait', cat_name2: 'Uncategorized', cat_name3: '', href: 'http://pixel-mafia',  href1: 'category.html',   href2: 'category.html',  href3: 'category.html',  text: 'Pellentesque in, suscipit ut odio. Nunc maximus ultrices eros, non malesuada diam tincidunt vitae. Sed euismod, diam quis sollicitudin pretium, neque lacus venenatis mi, tempor posuere metus dolor in sapien. Vestibulum lobortis ultrices lorem, ut tincidunt diam. Curabitur varius sapien in elit fringilla, in lacinia enim.'},
            {src: 'img/image19-800x450.jpg', title: 'Girl In Hat', cat_name1: ' Fashion', cat_name2: 'Portrait', cat_name3: 'Uncategorized', href: 'http://pixel-mafia',  href1: 'category.html',   href2: 'category.html',  href3: 'category.html',  text: 'Sed tempus mattis ligula, eu volutpat neque sagittis eu. Donec feugiat leo dolor, sed interdum mi gravida vitae. Nulla ac maximus arcu, sit amet vestibulum erat. Proin faucibus, ex vitae commodo facilisis, eros risus ullamcorper justo, et placerat ante lectus in dui. Proin et elementum ante, ac commodo felis. Aenean est eros.'},
            {src: 'img/image12-800x450.jpg', title: 'Playground, Italy', cat_name1: ' Events', cat_name2: 'Fashion', cat_name3: 'Uncategorized', href: 'http://pixel-mafia',  href1: 'category.html',   href2: 'category.html',  href3: 'category.html',  text: 'Ut in metus. Integer lobortis laoreet mi, a consequat ante facilisis ac. Etiam gravida velit mauris, ac vehicula neque hendrerit in. Integer facilisis pretium tellus et dignissim. Ut ipsum lectus, lobortis sed tortor eu, malesuada maximus augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis.'},
            {src: 'img/image04-800x450.jpg', title: 'Street Style', cat_name1: ' Events', cat_name2: 'People', cat_name3: 'Uncategorized', href: 'http://pixel-mafia',  href1: 'category.html',   href2: 'category.html',  href3: 'category.html',  text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas est risus, ac bibendum nulla consequat vitae. In molestie magna vel justo euismod, ut pharetra nisl tincidunt. Proin in velit posuere felis tempus molestie pharetra ac urna. Nulla porttitor quam ex, sed porta ipsum congue quis. Nam quis lorem non.'},
            {src: 'img/image10-800x450.jpg', title: 'Faster and Faster!', cat_name1: ' Events', cat_name2: 'Uncategorized', cat_name3: '', href: 'http://pixel-mafia',  href1: 'category.html',   href2: 'category.html',  href3: 'category.html',  text: 'Duis eu leo urna. Sed vel sapien pharetra, mollis ex eu, lacinia lorem. Donec elit turpis, porttitor sit amet erat vitae, molestie facilisis diam. Sed sit amet felis massa. Vivamus lobortis, libero sit amet vulputate placerat, arcu leo feugiat arcu, a commodo ligula enim eget risus. Nullam maximus sapien quam, sed pellentesque mi.'},
            {src: 'img/image16-800x450.jpg', title: 'Few wisdom words', cat_name1: ' People', cat_name2: 'Uncategorized', cat_name3: '', href: 'http://pixel-mafia',  href1: 'category.html',   href2: 'category.html',  href3: 'category.html',  text: 'Proin sollicitudin justo in tortor pulvinar, quis venenatis purus viverra. Pellentesque consequat, massa nec ultricies commodo, diam odio consectetur arcu, nec blandit nulla ex ut arcu. Nulla ornare velit quam. Donec a ante non quam vestibulum consectetur sed eu enim. Nunc consequat lorem sem, eu hendrerit sapien.'}
        ];

        jQuery('#list').blog_grid_posts({
            load_count: 3,
            items: items_set
        });
  });


    photobooth_preloader();

    if (jQuery('.photobooth_single_album_head').length > 0) {
        setup_photobooth_single_album();
        jQuery('html').addClass('photobooth_single_album');

        if (photobooth_window.scrollTop() > 10) {
            jQuery('html').addClass('header_scrolled');
        }
        photobooth_window.on('scroll', function () {
            if (photobooth_window.scrollTop() > 10) {
                jQuery('html').addClass('header_scrolled');
            } else {
                jQuery('html').removeClass('header_scrolled');
            }
        });
        jQuery('a.photobooth_album_down_arrow').on('click', function () {
            
             var photobooth_album_featured_height = photobooth_window.height();
           

            jQuery('html, body').stop().animate({scrollTop: photobooth_album_featured_height + 'px'}, 600);
        });
    }
  

});


jQuery(window).on('load', function(){
    if (jQuery('.photobooth_preloader_wrapper').length > 0) {        
        jQuery('.photobooth_preloader_wrapper').addClass('remove_preloader');
        setTimeout("jQuery('.photobooth_preloader_wrapper').remove()", 600);
    }
    photobooth_theme_setup();
    setTimeout("photobooth_theme_setup()", 500);
});
jQuery(window).resize(function(){
	photobooth_cs_page_centered();
    if (jQuery('.photobooth_blog_grid_ratio').length > 0) {
        jQuery('.photobooth_blog_grid_ratio').each(function () {
            var setHeight = Math.floor(jQuery(this).width() * jQuery(this).attr('data-ratio'));
            jQuery(this).height(setHeight);
        });
    }
    photobooth_theme_setup();
    setTimeout("photobooth_theme_setup()", 500);
});




/* About slider */

	if (jQuery('.photobooth_slider3i').length) {
		$('.photobooth_slider3i').owlCarousel({
		    center: true,
		    items:2,
		    slideSpeed:200,       
		    autoplay: true,
		    autoplayTimeout:2000,
		    smartSpeed:200,
		    autoplayHoverPause:true,
		    loop:true,
		    margin:30,
		    responsive:{
		        767:{
		            items:4
		        }
		    }
		});
	}
	if (jQuery('.photobooth_slider1i').length) {
	$('.photobooth_slider1i').owlCarousel({
	    slideSpeed:200, 
	    items:1,
	    // autoplay: true,
	    autoplayTimeout:2000,
	    smartSpeed:200,
	    autoplayHoverPause:true,
	    nav: true,
	    loop:true
	});
	}

/* Isopope */

	if (jQuery('.grid').length) {
	var $grid = $('.grid').imagesLoaded().progress( function() {
	        $grid.isotope({
	            itemSelector: '.grid-item',
	            layoutMode: 'fitRows'
	        });
	    }); 

	    // bind filter button click
	    $('.filters-button-group').on( 'click', 'button', function() {
	        var filterValue = $( this ).attr('data-filter');
	        // use filterFn if matches value
	      
	    $grid.isotope({ filter: filterValue });
	    });
	    // change is-checked class on buttons
	    $('.button-group').each( function( i, buttonGroup ) {
	        var $buttonGroup = $( buttonGroup );
	        $buttonGroup.on( 'click', 'button', function() {
	        $buttonGroup.find('.is-checked').removeClass('is-checked');
	        $( this ).addClass('is-checked');
	        });
	    })
	}
 


	if (jQuery('.grid1').length) {
	var $grid1 = $('.grid1').imagesLoaded().progress( function() {
	        $grid1.isotope({
	            itemSelector: '.grid-item'
	            
	        });
	    });     
	}

	function photobooth_countdown() {
    jQuery('.photobooth_countdown').each(function(){
        var pm_year = jQuery(this).attr('data-year'),
            pm_month = jQuery(this).attr('data-month'),
            pm_day = jQuery(this).attr('data-day'),
            austDay = new Date(pm_year, pm_month - 1, pm_day);

        jQuery(this).countdown({
            until: austDay,
            padZeroes: true
        });
    });
	}

	function photobooth_cs_page_centered(){
    var container_cs_height = jQuery(window).height(),
        inner_container_cs_height = jQuery('.photobooth_content_cs_inner').height();
    if (inner_container_cs_height < container_cs_height) {
        var white_space = container_cs_height  - inner_container_cs_height;

        jQuery('.photobooth_content_cs').css({'padding-top': white_space / 2, 'padding-bottom': white_space / 2});
    }
	}


function photobooth_theme_setup() {
    jQuery(".photobooth_owlCarousel").each(function () {
        jQuery(this).trigger('refresh.owl.carousel');
    });
   
    if (jQuery('.photobooth_grid').length > 0) {
        jQuery('.photobooth_grid').each(function () {
            var set_item_width = 100 / parseInt(jQuery(this).attr('data-inrow'), 10);
            jQuery(this).find('.photobooth_grid-item').css('width', set_item_width.toPrecision(3) + '%');
            var setPad = Math.floor(parseInt(jQuery(this).attr('data-setpad'), 10) / 2);
            jQuery(this).css('padding', setPad + 'px');
            jQuery(this).find('.photobooth_grid-item_iner').css({
                'margin-left': setPad + 'px',
                'margin-top': setPad + 'px',
                'margin-right': setPad + 'px',
                'margin-bottom': setPad + 'px'
            });
        });
        if (jQuery('.photobooth_grid_post_loading').length > 0) {
            jQuery(".photobooth_owlCarousel").on("initialized.owl.carousel", function (e) {
                jQuery(".photobooth_owlCarousel").css("opacity", "1");
            });
            jQuery(".photobooth_owlCarousel").owlCarousel(
                {
                    items: 1,
                    lazyLoad: true,
                    loop: true,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    autoHeight: false
                }
            );
            pm_load_blog_posts();
        }
    }
    if (jQuery('.photobooth_blog_grid_ratio').length > 0) {
        jQuery('.photobooth_blog_grid_ratio').each(function () {
            var setHeight = Math.floor(jQuery(this).width() * jQuery(this).attr('data-ratio'));
            jQuery(this).height(setHeight);
        });
    }
}

function pm_load_blog_posts() {
    if (jQuery('.photobooth_grid_post_loading').length > 0) {
        jQuery('.photobooth_grid_post_loading:first').removeClass('photobooth_grid_post_loading').animate({
            'z-index': '3'
        }, 200, function () {
            pm_load_blog_posts();
        });
    }

}



function setup_photobooth_single_album() {
    
    var photobooth_album_featured_height = photobooth_window.height();
    

    jQuery('.photobooth_single_album_head').css('margin-top', -1 * jQuery('header.photobooth_header').height() + 'px').height(photobooth_album_featured_height);
}

function photobooth_preloader() {
    if (jQuery('.photobooth_split_showcase').length > 0) {
        //Split Showcase Slides
        if (jQuery('.photobooth_preload_slide:first').length > 0) {
            (function (img, src) {
                img.src = src;
                img.onload = function () {
                    jQuery('.photobooth_preload_slide:first').removeClass('photobooth_preload_slide').addClass('photobooth_slide_loaded').animate({
                        'z-index': '15'
                    }, 100, function () {
                        photobooth_preloader();
                    });
                };
            }(new Image(), jQuery('.photobooth_preload_slide:first').attr('data-src')));
        } else {
            photobooth_split_gallery.removeClass('wait4load');
        }

        if ((jQuery('.photobooth_odd_slide1').hasClass('photobooth_slide_loaded') && jQuery('.photobooth_even_slide1').hasClass('photobooth_slide_loaded')) && !photobooth_split_gallery.hasClass('started')) {
            run_photobooth_split_slider();
        }
    }

    if (jQuery('.photobooth_ribbon_slider_wrapper').length > 0) {
        //Ribbon Slides
        if (jQuery('.photobooth_preload_slide:first').length > 0) {
            (function (img, src) {
                img.src = src;
                img.onload = function () {
                    jQuery('.photobooth_preload_slide:first').removeClass('photobooth_preload_slide').addClass('photobooth_slide_loaded').animate({
                        'z-index': '15'
                    }, 100, function () {
                        photobooth_preloader();
                    });
                };
            }(new Image(), jQuery('.photobooth_preload_slide:first').find('img').attr('src')));
        } else {
            photobooth_ribbon_slider.removeClass('wait4load');
        }

        if (jQuery('.photobooth_ribbon_slide1').hasClass('photobooth_slide_loaded') && !photobooth_ribbon_slider.hasClass('started')) {
            run_photobooth_ribbon_slider();
        }
    }

    if (jQuery('.photobooth_fullscreen_slider').length > 0) {
        //Fullscreen Slideshow Slides
        if (jQuery('.photobooth_preload_slide:first').length > 0) {
            (function (img, src) {
                img.src = src;
                img.onload = function () {
                    jQuery('.photobooth_preload_slide:first').removeClass('photobooth_preload_slide').addClass('photobooth_slide_loaded').animate({
                        'z-index': '15'
                    }, 100, function () {
                        photobooth_preloader();
                    });
                };
            }(new Image(), jQuery('.photobooth_preload_slide:first').attr('data-src')));
        } else {
            photobooth_fullscreen_slider.removeClass('wait4load');
        }

        if ((jQuery('.photobooth_fullscreen_slide1').hasClass('photobooth_slide_loaded')) && !photobooth_fullscreen_slider.hasClass('started')) {
            run_photobooth_fullscreen_slider();
        }
    }
}


jQuery.fn.grid_gallery_about = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.grid');

    jQuery('.photobooth_load_more').on('click', function () {
        $newEls = '';
        loaded_object = '';
        var loaded_images = $container.find('.added').length;
        if ((img_count - loaded_images) > img_per_load) {
            var now_load = img_per_load;
        } else {
            now_load = img_count - loaded_images;
        }

        if ((loaded_images + now_load) == img_count) jQuery(this).fadeOut();

        if (loaded_images < 1) {
            var i_start = 1;
        } else {
            i_start = loaded_images + 1;
        }

        if (now_load > 0) {
            // load more elements
            for (var i = i_start - 1; i < i_start + now_load - 1; i++) {
                loaded_object = loaded_object +
                	'<div class="grid-item grid-item--width2 added">' +
						'<a href="' + addon_options.items[i].href + '" class="swipebox">' +
							'<div class="photobooth_grayscale_img">' +	
							'<img src="' + addon_options.items[i].src + '">' +
						'</div>' +
						'</a>' +					
						'</div>' 

				;
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            $container.imagesLoaded().progress( function() {
             $container.isotope("layout");
            });
           
        }
    });
};






jQuery.fn.grid_gallery_masonry = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.grid1');

    jQuery('.photobooth_load_more').on('click', function () {
        $newEls = '';
        loaded_object = '';
        var loaded_images = $container.find('.added').length;
        if ((img_count - loaded_images) > img_per_load) {
            var now_load = img_per_load;
        } else {
            now_load = img_count - loaded_images;
        }

        if ((loaded_images + now_load) == img_count) jQuery(this).fadeOut();

        if (loaded_images < 1) {
            var i_start = 1;
        } else {
            i_start = loaded_images + 1;
        }

        if (now_load > 0) {
            // load more elements
            for (var i = i_start - 1; i < i_start + now_load - 1; i++) {
                loaded_object = loaded_object +
                	'<div class="grid-item grid-item--width2 added">' +
						'<a href="' + addon_options.items[i].href + '" class="swipebox">' +
							'<div class="photobooth_grayscale_img">' +	
							'<img src="' + addon_options.items[i].src + '">' +
						'</div>' +
						'</a>' +					
						'</div>' 

				;
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            $container.imagesLoaded().progress( function() {
             $container.isotope("layout");
            });
        }
    });
};

jQuery.fn.album_listing = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.grid');

    jQuery('.photobooth_load_more').on('click', function () {
        $newEls = '';
        loaded_object = '';
        var loaded_images = $container.find('.added').length;
        if ((img_count - loaded_images) > img_per_load) {
            var now_load = img_per_load;
        } else {
            now_load = img_count - loaded_images;
        }

        if ((loaded_images + now_load) == img_count) jQuery(this).fadeOut();

        if (loaded_images < 1) {
            var i_start = 1;
        } else {
            i_start = loaded_images + 1;
        }

        if (now_load > 0) {
            // load more elements
            for (var i = i_start - 1; i < i_start + now_load - 1; i++) {
                loaded_object = loaded_object +
                	'<div class="grid-item ' + addon_options.items[i].class + ' added">' +
						'<a class="photobooth_album_img" href="album-single.html">' +							
							'<img src="' + addon_options.items[i].src + '">' +
						'</a>' +
						'<div class="photobooth_album_content">' +
						'<a href="album-single.html">' +
						'<h5>' + addon_options.items[i].title + '</h5>' +
						'</a>' +
						'<div class="photobooth_albums_categories">' +
						'<a href="' + addon_options.items[i].href1 + '">' + addon_options.items[i].cat_name1 + '</a>' +

						'<a href="' + addon_options.items[i].href2 + '">' + addon_options.items[i].cat_name2 + '</a>' +
						'</div>' +
						'</div>' +		
						'</div>' 

				;
            }

            $newEls = jQuery(loaded_object);
            $container.isotope('insert', $newEls, function () {
                $container.isotope('reLayout');
            });
            $container.imagesLoaded().progress( function() {
            $container.isotope("layout");
            });
        }
    });
};



jQuery.fn.blog_grid_posts = function (addon_options) {
    "use strict";
    //Set Variables
    var addon_el = jQuery(this),
        addon_base = this,
        img_count = addon_options.items.length,
        img_per_load = addon_options.load_count,
        $newEls = '',
        loaded_object = '',
        $container = jQuery('.photobooth_grid');

    jQuery('.photobooth_load_more').on('click', function () {             
        $newEls = '';
        loaded_object = '';
        var loaded_images = $container.find('.added').length;
        if ((img_count - loaded_images) > img_per_load) {
            var now_load = img_per_load;
        } else {
            now_load = img_count - loaded_images;
        }

        if ((loaded_images + now_load) == img_count) jQuery(this).fadeOut();

        if (loaded_images < 1) {
            var i_start = 1;
        } else {
            i_start = loaded_images + 1;
        }

        if (now_load > 0) {
            // load more elements
            for (var i = i_start - 1; i < i_start + now_load - 1; i++) {
                loaded_object = loaded_object +
                    '<div class="photobooth_grid-item photobooth_grid_post_loading added">' +
                            '<div class="photobooth_grid-item_iner">' +
                            '<div class="photobooth_blog_grid_ratio" data-ratio="0.5625">' +
                                '<div class=" photobooth_post_formats">' +
                                    '<img src="' + addon_options.items[i].src + '" alt="">' +
                                '</div>' +
                            '</div>' +
                            '<div class="photobooth_grid_post_content">' +
                                '<a href="blog-single-post-image.html"><h5>' + addon_options.items[i].title + '</h5></a>' +
                                '<div class="photobooth_meta">' +
                                    '<div>January 26, 2017</div>' + 
                                    '<div> <a href="' + addon_options.items[i].href + '"> pixel-mafia</a></div>' + 
                                    '<div class="photobooth_post_ref"> <a href="' + addon_options.items[i].href1 + '"> ' + addon_options.items[i].cat_name1 + '</a>, <a href="' + addon_options.items[i].href2 + '">' + addon_options.items[i].cat_name2 + '</a>, <a href="' + addon_options.items[i].href3 + '">' + addon_options.items[i].cat_name3 + '</a></div>' +
                                '</div>' +  
                                '<div class="photobooth_excerpt">' + addon_options.items[i].text + '</div>' +               
                            '</div>' +
                            '</div>' +
                        '</div>'
                ;
            }

            $newEls = jQuery(loaded_object);

            $container.append($newEls);
            photobooth_theme_setup();
            
        }
    });
};
