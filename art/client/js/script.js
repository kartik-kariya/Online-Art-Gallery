(function () {

	var ag = {

		init: function () {
			this.cacheDom();
			this.bindEvents();
			this.totopButton();
			this.isotopefilter();
			this.enablePopupGallery();
			this.initCounterElement();
			this.initContactForm();
		},
		cacheDom: function(){
			this.toTop = $('.totop');

			this.topTrigger = $('.cg__mainMenu-trigger');
			this.menuBurger = $('.cg__menuBurger');
			this.cgmenu = $('.cg__mainMenu');
			this.rezMenu = $('.cg__resMenu');
			this.pageWrapper = $('#page_wrapper');
			this.backIcon = $('.cg__resMenu-backIcon');
			this.videoBox = $('.ag__playVideo');
			this.hasAnimation = $('.hasAnimation');
			this._body = $('body');
			this.isotope=$('.ptf-item');
		},
		bindEvents: function(){
			var self = this;
			self.topTrigger.on('click', self.responsiveTopMenu);
			self.menuBurger.on('click', self.triggerMenu);
			self.rezMenu.find( 'a:not(.cg__resMenu-back)').on('click', self.CloseMenu);
			self.backIcon.on('click', self.CloseMenu);
			self.videoBox.magnificPopup({type:'iframe'});
			$(window).on('scroll', self.addAnimations);

		},
		addAnimations: function() {
			ag.hasAnimation.each(ag.startAnimations);
		},
		startAnimations: function(index, el) {
			var itemIsReached = ag.isScrolledIntoView(el);
			if (itemIsReached) {

				var animationType = $(this).attr("data-animationType");
				var animationDuration = $(this).attr("data-animationDuration");
				var animationDelay = $(this).attr("data-animationDelay");

				if (!$(this).hasClass('is-animating')) {

					$(this).css({"animation-duration": animationDuration,
								"animation-name":animationType,
								"animation-delay":animationDelay});
				}
				$(this).addClass('is-animating');
			}
		},
		isScrolledIntoView: function(elem) {

			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();
			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();
			var offset = 600;

			return ((elemBottom <= docViewBottom + offset) && (elemTop >= docViewTop - offset));
		},
		responsiveTopMenu: function() {
			if ($(this).hasClass('is-toggled')) {
				$(this).closest('.cg__topMenu-wrapper').removeClass('is-opened');
				$(this).removeClass('is-toggled');
			} else {
				$(this).closest('.cg__topMenu-wrapper').addClass('is-opened');
				$(this).addClass('is-toggled');
			}
		},
		triggerMenu: function(e) {
			e.preventDefault();
				if($(this).hasClass('is-active')){
					ag.CloseMenu();
				}
				else {
					ag.OpenMenu();
			}
		},
		OpenMenu: function() {
			ag.rezMenu.addClass('cg__menu--visible');
			ag.menuBurger.addClass('is-active');
			ag.setMenuHeight();
		},
		CloseMenu: function() {
			$(this).closest('ul').removeClass('cg__menu--visible');
			ag.menuBurger.removeClass('is-active');
			ag.removeMenuHeight();
		},
		removeMenuHeight: function() {
			ag.pageWrapper.css({'height':'auto'});
		},
		setMenuHeight: function() {
			var _menu = $('.cg__menu--visible').last(),
				window_height  = $(window).height(),
				height = _menu.css({window_height:'auto'});
			ag.pageWrapper.css({'height':height});
		},
		isotopefilter: function() {
      // init Isotope
			var $grid = $('.grid');
			$grid.each(function(){
				var $el = $(this);
				// Wait until the iamges are loaded before triggering isotope
				$el.imagesLoaded(function(){
					// enable isotope
	        $el.isotope();
					// bind filter button click
					var $filterItems = $el.parent('.portfolio-filter').find('.filter-button-group button');

					// Don't proceed if we don't have filters
					if( $filterItems.length === 0 ){
						return;
					}

					$filterItems.on( 'click', function() {
					  var filterValue = $( this ).attr('data-filter');
					  $el.isotope({ filter: filterValue });
						// Remove active class from filters
						$filterItems.removeClass('is-checked');
						// Add active class for current filter
						$(this).addClass('is-checked');
					});
	      });
			});
		},
		initContactForm: function() {
			var contactForm = $('.hg-contactform');
			if( ! contactForm.length > 0 ){
				return;
			}
			contactForm.on('submit', function(e) {
				e.preventDefault();
				e.stopPropagation();

				var self = $(this),
					submitButton = self.find('.hg-submitcontact');

				//#! Disable repetitive clicks on the submit button. Prevents postbacks
				self.addClass('js-disable-action');
				submitButton.addClass('js-disable-action');

				//#! Redirect to the specified url on success, ONLY if a url is present in the input value
				var redirectToInput = self.find('.hg-redirect-to'),
					redirectTo = ( typeof(redirectToInput) != 'undefined' ? redirectToInput.val() : '' ),
					//#! Holds the reference to the wrapper displaying the result message
					responseWrapper = self.find('.form-message');

				//#! Clear message
				responseWrapper.empty().hide();

				var fields = self.find('input, textarea, select');

				var data = {
					'isAjaxForm': true
				};
				fields.each(function(i, field){
					data[field.name] = $(field).val();
				});

				//#! Execute the ajax request
				$.ajax({
					url: self.attr('action'),
					method: 'POST',
					cache: false,
					timeout: 20000,
					data: data
				}).done(function(response){
					responseWrapper.removeClass('js-response-success js-response-error');
					if(response && typeof(response.data) != 'undefined' ) {
						responseWrapper.empty();
						if( ! response.success ){
							responseWrapper.addClass('js-response-error');
							$.each( response.data, function(i, err) {
								responseWrapper.append('<p>'+err+'</p>');
							});
						}
						else {
							responseWrapper
								.addClass('js-response-success')
								.append('<p>'+response.data+'</p>');
							//#! Clear the form
							self.find('.hg-input').val('');
							//#! Redirect on success (maybe to a Thank you page, whatever)
							if( redirectTo.length > 0 ){
								window.setTimeout(function(){
									window.location.href = redirectTo;
								}, 2000);
							}
						}
						responseWrapper.fadeIn();
					}
					else {
						responseWrapper.removeClass('js-response-success');
						responseWrapper.empty().addClass('js-response-error').append('<p>An error occurred. Please try again in a few seconds.</p>').fadeIn();
					}
				}).fail(function(txt, err){
					responseWrapper.empty().addClass('js-response-error').append('<p>An error occurred: '+txt+' Err:'+err+'. Please try again in a few seconds.</p>').fadeIn();
				}).always(function() {
					self.removeClass('js-disable-action');
					submitButton.removeClass('js-disable-action');
				});
			});

		},
		enablePopupGallery: function() {
			$('.ag-gridGallery-jstrigger').each(function() {
			    $(this).magnificPopup({
			        delegate: 'a',
			        type: 'image',
			        gallery: {
			          enabled:true
			        }
			    });
			});
		},
		initCounterElement: function() {
			var counterElement = $('.counter_trigger'),
					itemIsReached;

			counterElement.each(function(){
				var $el = $(this);

				$(window).scroll(function(){
					itemIsReached = ag.isScrolledIntoView($el);

					
					if (itemIsReached) {

						if( $el.hasClass( 'cg__didAnimation' ) ){
							return true;
						}

						$el.data('countToOptions', {
							formatter: function (value, options) {
								return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
							}
						});

						var options = $.extend({}, options || {}, $el.data('countToOptions') || {});
						$el.countTo(options);
						$el.addClass( 'cg__didAnimation' );
					}
				}).trigger('scroll');
			});
		},
		totopButton: function() {
			var self = this;

			/* Show totop button*/
			$(window).scroll(function(){
				var toTopOffset = self.toTop.offset().top;
				var toTopHidden = 1000;

				if (toTopOffset > toTopHidden) {
					self.toTop.addClass('totop-vissible');
				} else {
					self.toTop.removeClass('totop-vissible');
				}
			});

			/* totop button animation */
			if(self.toTop && self.toTop.length > 0){
				self.toTop.on('click',function (e){
					e.preventDefault();
					$( 'html, body').animate( {scrollTop: 0 }, 'slow' );
				});
			}
		},
	};
	ag.init();
})();
