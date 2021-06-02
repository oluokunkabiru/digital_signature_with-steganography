/***************************************************************************************************************
||||||||||||||||||||||||||||       MASTER jQuery Function FOR INDUSTRIAL       |||||||||||||||||||||||||||||||||
****************************************************************************************************************
||||||||||||||||||||||||||||              TABLE OF CONTENT                  ||||||||||||||||||||||||||||||||||||
****************************************************************************************************************
****************************************************************************************************************

1. revolutionSliderActiver
2. selectMenu
3. stickyHeader
4. fleetGallery
5. typed
6. mobileNavToggler
7. gMap
8. accrodion
9. control

****************************************************************************************************************
||||||||||||||||||||||||||||            End TABLE OF CONTENT                ||||||||||||||||||||||||||||||||||||
****************************************************************************************************************/
// 1. revolution slider
function revolutionSliderActiver() {
		if ($('.rev_slider_wrapper #slider1').length) {
				jQuery("#slider1").revolution({
						sliderType: "standard",
						sliderLayout: "auto",
						delay: 5000,
						navigation: {
								arrows: { enable: true }
						},
						gridwidth: 1170,
						gridheight: 726
				});
		};
		if ($('.rev_slider_wrapper #slider2').length) {
				jQuery("#slider2").revolution({
						sliderType: "standard",
						sliderLayout: "auto",
						delay: 5000,
						navigation: {
								arrows: { enable: true }
						},
						gridwidth: 1170,
						gridheight: 642
				});
		};
		if ($('.rev_slider_wrapper #slider3').length) {
				jQuery("#slider3").revolution({
						sliderType: "standard",
						sliderLayout: "auto",
						delay: 5000,
						navigation: {
								arrows: { enable: true }
						},
						gridwidth: 1170,
						gridheight: 600
				});
		};
}

$('.pro-sliders').owlCarousel({
		loop: true,
		margin: 30,
		items: 4,
		dots:false,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		responsiveClass: true,
		responsive: {
				0: {
						items: 1
				},
				481: {
						items: 2
				},
				700: {
						items: 3
				},
				992: {
						items: 3,
				}
		}
});


$('.testimonial-slider').owlCarousel({
		loop: true,
		//margin:10,
		//nav:true,
		responsive: {
				0: {
						items: 1
				},
				600: {
						items: 1
				},
				1000: {
						items: 1
				}
		}
});

$('.testimonialn-slider').owlCarousel({
		loop: true,
		//margin:10,
		//nav:true,
		responsive: {
				0: {
						items: 1
				},
				600: {
						items: 1
				},
				1000: {
						items: 1
				}
		}
});





$('.testimonial-sliders').owlCarousel({
		loop: false,
		margin: 30,
		items: 2,
		nav: true,
		dots:false,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		responsiveClass: true,
		responsive: {
				0: {
						items: 1
				},
				1200: {
						items: 2
				},
				1024: {
						items: 2
				}
		}
})


$('.client-slider').owlCarousel({
		loop: true,
		margin: 27,
		nav: false,
		dots: false,
		autoWidth: true,
		autoplay: true,
		responsive: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsive: {
				0: {
						items: 1,
						autoWidth: false
				},
				480: {
						items: 2,
						autoWidth: false
				},
				600: {
						items: 3,
						autoWidth: false
				},
				1000: {
						items: 6,
						autoWidth: false
				}
		}
})

// 4. select menu
function selectMenu() {
		if ($('.select-menu').length) {
				$('.select-menu').selectmenu();
		};
}
/*----------------------------------------------------*/
/*  Google Map
/*----------------------------------------------------*/
// Google Map
if ($('.google-map').length) {
	$('.google-map').each(function() {
		// getting options from html 
		var mapName = $(this).attr('id');
		var mapLat = $(this).data('map-lat');
		var mapLng = $(this).data('map-lng');
		var iconPath = $(this).data('icon-path');
		var mapZoom = $(this).data('map-zoom');
		var mapTitle = $(this).data('map-title');

		// if zoom not defined the zoom value will be 15;
		if (!mapZoom) {
			var mapZoom = 15;
		};
		// init map
		var map;
		map = new GMaps({
			div: '#' + mapName,
			scrollwheel: false,
			lat: mapLat,
			lng: mapLng,
			zoom: mapZoom
		});
		// if icon path setted then show marker
		if (iconPath) {
			map.addMarker({
				icon: iconPath,
				lat: mapLat,
				lng: mapLng,
				title: mapTitle
			});
		}
	});
}
// 9. sticky header
function stickyHeader() {
		if ($('.stricky').length) {
				var strickyScrollPos = 100;
				if ($(window).scrollTop() > strickyScrollPos) {
						$('.stricky').removeClass('fadeIn animated');
						$('.stricky').addClass('stricky-fixed fadeInDown animated');
				} else if ($(this).scrollTop() <= strickyScrollPos) {
						$('.stricky').removeClass('stricky-fixed fadeInDown animated');
						$('.stricky').addClass('slideIn animated');
				}
		};
}
// 10. gallery
function fleetGallery() {
		if ($('.fleet-gallery').length) {
				$('.fleet-gallery').mixItUp();
		};
}
// 11. typed plugin
function typed() {
		if ($(".typed").length) {
				$(".typed").typed({
						stringsElement: $('.typed-strings'),
						typeSpeed: 200,
						backDelay: 1500,
						loop: true,
						contentType: 'html', // or text
						// defaults to false for infinite loop
						loopCount: false,
						callback: function() { null; },
						resetCallback: function() { newTyped(); }
				});
		};
}

function accrodion() {
		if ($('.accrodion-grp').length) {

				$('.accrodion-grp').each(function() {
						var accrodionName = $(this).data('grp-name');
						var Self = $(this);
						Self.addClass(accrodionName);
						Self.find('.accrodion .accrodion-content').hide();
						Self.find('.accrodion.active').find('.accrodion-content').show();
						Self.find('.accrodion').each(function() {
								$(this).find('.accrodion-title').on('click', function() {
										if ($(this).parent().hasClass('active') === false) {
												$('.accrodion-grp.' + accrodionName).find('.accrodion').removeClass('active');
												$('.accrodion-grp.' + accrodionName).find('.accrodion').find('.accrodion-content').slideUp();
												$(this).parent().addClass('active');
												$(this).parent().find('.accrodion-content').slideDown();
										};
								});
						});
				});

		};
}

function fullwidthslider (){
		$('.fullwidth-slider').owlCarousel({
				loop:true,
				margin:30,
				items:5,
				 dots:false,
				nav: true,
				navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				responsiveClass:true,
				responsive:{
						0:{
								items:1
						},
						481:{
								items:2
						},
						700:{
								items:2
						},
						992:{
								items:5,
						}
				}
		});   
}
function fullwidthslider2 (){
		$('.fullwidth-slider2').owlCarousel({
				loop:true,
				items:5,
				 dots:false,
				nav: true,
				navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				responsiveClass:true,
				responsive:{
						0:{
								items:1
						},
						481:{
								items:2
						},
						700:{
								items:2
						},
						992:{
								items:5,
						}
				}
		});   
}
function fullwidthslider3 (){
		$('.fullwidth-slider3').owlCarousel({
				loop:true,
				items:6,
				 dots:false,
				nav: true,
				navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				responsiveClass:true,
				responsive:{
						0:{
								items:1
						},
						481:{
								items:2
						},
						700:{
								items:2
						},
						992:{
								items:6,
						}
				}
		});   
}

// 12. Mobile Navigation
function mobileNavToggler () {
	if ($('.nav-t-holder').length) {
		$('.nav-t-holder .nav-t-header button').on('click', function () {
			$('.nav-t-holder .nav-t-footer').slideToggle();
			return false;
		});
		$('.nav-t-holder li.has-t-submenu').children('a').append(function () {
			return '<button class="dropdown-expander"><i class="fa fa-chevron-down"></i></button>';    			
		});
		$('.nav-t-holder .nav-t-footer .dropdown-expander').on('click', function () {
			var Self =  $(this).parent().parent().children('.submenu');
			if(Self.hasClass('dopdown-nav-toggler-active'))
			{
				Self.removeClass('dopdown-nav-toggler-active');
				$(".nav ul.submenu").fadeOut();
			}
			else
			{
				$(".nav ul.submenu").fadeOut();
				$(".nav ul.submenu").removeClass('dopdown-nav-toggler-active');
				Self.addClass('dopdown-nav-toggler-active');
				Self.slideToggle();
			}
			return false;
		});

	}
}



// =9. main menu sticky
function menuSticky () {
	if ($('.menu_fixed.main_menu').length) {
		var sticky = $('.menu_fixed.main_menu'),
				scroll = $(window).scrollTop();

		if (scroll >= 190) sticky.addClass('fixed');
		else sticky.removeClass('fixed');    
	};
}
// =10. theme lightbox active
function thmLightbox () {
	if ($(".fancybox").length) {
			$(".fancybox").fancybox({
					helpers : {
							overlay : {
									css : {
											'background' : 'rgba(0,0,0,0.7)'
									}
							}
					}
			});
	};
}
// 14  bootstrapAnimatedLayer

function bootstrapAnimatedLayer() {

		/* Demo Scripts for Bootstrap Carousel and Animate.css article
		 * on SitePoint by Maria Antonietta Perna
		 */

		//Function to animate slider captions 
		function doAnimations(elems) {
				//Cache the animationend event in a variable
				var animEndEv = 'webkitAnimationEnd animationend';

				elems.each(function() {
						var $this = $(this),
								$animationType = $this.data('animation');
						$this.addClass($animationType).one(animEndEv, function() {
								$this.removeClass($animationType);
						});
				});
		}

		//Variables on page load 
		var $myCarousel = $('#minimal-bootstrap-carousel'),
				$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

		//Initialize carousel 
		$myCarousel.carousel({
				interval: 7000
		});

		//Animate captions in first slide on page load 
		doAnimations($firstAnimatingElems);

		//Pause carousel  
		$myCarousel.carousel('pause');


		//Other slides to be animated on carousel slide event 
		$myCarousel.on('slide.bs.carousel', function(e) {
				var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
				doAnimations($animatingElems);
		});
}
// 9  Tabcontrolincompliance
function tabcontrolincompliance()
{
	$(".vision-wrapper li a").click(function(e){
		$(".quality-wrapper .tab-panel").addClass("hide");
		var tabId = $(this).attr("id");
		$("."+tabId).removeClass("hide");
		$("."+tabId).addClass("in");		
	})
}
// instance of fuction while Document ready event	
jQuery(document).on('ready', function() {
		(function($) {
				revolutionSliderActiver();
				selectMenu();        
				typed();
				accrodion();
				mobileNavToggler();
				bootstrapAnimatedLayer();
				fullwidthslider();
				fullwidthslider2();
				fullwidthslider3();
				tabcontrolincompliance();
				$('.panel h4.panel-title').click( function(){
						
						if($(this).hasClass('on'))
						{
							$(this).removeClass('on');
						}
						else
						{
							$('.panel h4.panel-title').removeClass('on');
								$(this).toggleClass('on');
						}  
				})
		})(jQuery);
});

// instance of fuction while Window Scroll event
jQuery(window).on('scroll', function() {
		(function($) {
				stickyHeader();
				menuSticky();
		})(jQuery);
});
/*=====================*/
/* LIGHT-BOX */
/*=====================*/

/*activity indicator functions*/
var activityIndicatorOn = function(){
    $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
};
var activityIndicatorOff = function(){
    $('#imagelightbox-loading').remove();
};

/*close button functions*/
var closeButtonOn = function(instance){
    $('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on('click touchend', function(){ $(this).remove(); instance.quitImageLightbox(); return false; });
};
var closeButtonOff = function(){
    $('#imagelightbox-close').remove();
};

/*overlay*/
var overlayOn = function(){$('<div id="imagelightbox-overlay"></div>').appendTo('body');};
var overlayOff = function(){$('#imagelightbox-overlay').remove();};

/*caption*/
var captionOff = function(){$('#imagelightbox-caption').remove();};
var captionOn = function(){
    var description = $('a[href="' + $('#imagelightbox').attr('src') + '"] img').attr('alt');
    if(description.length)
        $('<div id="imagelightbox-caption">' + description +'</div>').appendTo('body');
};

/*arrows*/
var arrowsOn = function(instance, selector) {
    var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"><i class="fa fa-chevron-left"></i></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"><i class="fa fa-chevron-right"></i></button>');
    $arrows.appendTo('body');
    $arrows.on('click touchend', function(e) {
        e.preventDefault();
        var $this = $(this);
        if( $this.hasClass('imagelightbox-arrow-left')) {
            instance.loadPreviousImage();
        } else {
            instance.loadNextImage();
        }
        return false;
    });
};  
var arrowsOff = function(){$('.imagelightbox-arrow').remove();};    
        
var selectorG = '.lightbox';
if($(selectorG).length){
    var instanceG = $(selectorG).imageLightbox({
        quitOnDocClick: false,
        onStart:        function() {arrowsOn(instanceG, selectorG);overlayOn(); closeButtonOn(instanceG);},
        onEnd:          function() {arrowsOff();captionOff(); overlayOff(); closeButtonOff(); activityIndicatorOff();},
        onLoadStart:    function() {captionOff(); activityIndicatorOn();},
        onLoadEnd:      function() {$('.imagelightbox-arrow').css('display', 'block');captionOn(); activityIndicatorOff();}
    });     
}