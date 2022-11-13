/* ------------------------------------------------------------------------
Skat Design Custom Js
http://skat.tf
------------------------------------------------------------------------ */
/*global window, jQuery, document*/
/*jslint browser: true */
(function ($) {
	'use strict'
    $(window).resize(function(){var t=$(window).width();767>t&&$(".sd-wrapper").find(".sd-transparent-bg").addClass("sd-transparent-bg-mobile").removeClass("sd-transparent-bg"),t>767&&$(".sd-wrapper").find(".sd-transparent-bg-mobile").addClass("sd-transparent-bg").removeClass("sd-transparent-bg-mobile")})
    $(window).load(function () {
        $('.sd-entry-gallery-slider').flexslider({
            animation: "slide",
            controlsContainer: $(".custom-controls-container"),
            customDirectionNav: $(".custom-navigation a")
        });
    });
}(jQuery));

// one page scroll mega menu
jQuery(document).on('click', '.mega-sd-scroll a[href*="#"]:not([href="#"])', function () {

	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
		var target = jQuery(this.hash);
		target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
		if (target.length) {
			jQuery('html, body').animate({
				scrollTop: (target.offset().top - 120)
			}, 1000, "easeInOutExpo");
		return false;
		}
	}
});

jQuery(document).ready(function ($) {
	
    $(".wpcf7-captchar").focus(function () {
        $(".sd-quote-form-captcha").addClass("sd-quote-form-captcha-focus");
        $(".sd-staff-form-captcha").addClass("sd-staff-form-captcha-focus");
    });
    $(".wpcf7-captchar").focusout(function () {
        $(".sd-quote-form-captcha").removeClass("sd-quote-form-captcha-focus");
        $(".sd-staff-form-captcha").removeClass("sd-staff-form-captcha-focus");
    });
    $('.ult_tab_li a').on('click', function () {
        $('.sd-testimonials-slider').trigger('resize');
    });
    $("a[rel^='prettyPhoto']").prettyPhoto();
	
	// woo 
	 $( '.sd-quantity-button' ).on( 'click', function() {
        var t = $( this );
		d = t.parent( '.sd-quantity' ).find( 'input' ).val();
        if ( '+' == t.text() ) var e = parseFloat( d ) + 1;
        else if ( d > 0 ) var e = parseFloat( d ) - 1;
        else e = 0;
        t.parent().find( 'input').val( e );
    });
	$( '.sd-add-cart a' ).on( 'click', function() {
		var t = this;
		$( t ).parents( '.sd-product' ).find( '.sd-add-cart' ).fadeOut();
		$( t ).parents( '.sd-product' ).find( '.sd-loading-cart' ).stop().fadeIn();
		
		setTimeout( function() {
			$( t ).parents( '.sd-product' ).find( '.sd-loading-cart' ).fadeIn();
	
			setTimeout( function() {
				$( t ).parents( '.sd-product' ).find( '.sd-loading-cart' ).stop().fadeOut();
				$( t ).parents( '.sd-product' ).find( '.add_to_cart_button' ).text( sd_add_again_var.text );
				$( t ).parents( '.sd-product' ).find( '.sd-add-cart' ).fadeIn();
			}, 1500 );
		}, 1500 );
	});

	// one page scroll
	$('.sd-scroll a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top - 100)
				}, 1000, "easeInOutExpo");
			return false;
			}
		}
	});

  // back to top
  
	var pxScrolled = 200;
	var duration = 500;

	$(window).scroll(function() {
		if ($(this).scrollTop() > pxScrolled) {
			$('.sd-back-top-wrap').css({'bottom': '0px', 'transition': '.3s'});
		} else {
			$('.sd-back-top-wrap').css({'bottom': '-72px'});
		} 
	});

	$('.sd-back-top').click(function() {
		$('body, html').animate({scrollTop: 0}, duration);
	});
  
	// sticky header
	$(window).scroll(function(){
		var winWidth = $(window).width();
		var winTop = $(window).scrollTop();

		if ( winWidth > 767 ) { 
			if(winTop >= 100){
				$(".sd-stick").addClass("sd-sticky-header");
			}else{
				$(".sd-stick").removeClass("sd-sticky-header");
			}
		}
	});
});

/* ------------------------------------------------------------------------ */
/* EOF
/* ------------------------------------------------------------------------ */