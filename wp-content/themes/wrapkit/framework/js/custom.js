/*
Template Name: Wrapkit Ui Kit
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
(function ($) {
    "use strict";
    $(window).resize(function(){var t=$(window).width();1023>t&&$(".sd-theme").find(".sd-transparent-bg").addClass("sd-transparent-bg-mobile").removeClass("sd-transparent-bg"),t>1023&&$(".sd-theme").find(".sd-transparent-bg-mobile").addClass("sd-transparent-bg").removeClass("sd-transparent-bg-mobile")});
    // ============================================================== 
    //This is for preloader
    // ============================================================== 
    $(function () {
        $(".preloader").fadeOut();
    });
    // ============================================================== 
    // For page-wrapper height
    // ============================================================== 
    var set = function () {
        var topOffset = 390;        
        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
       
    };
    $(window).ready(set);
    $(window).on("resize", set);
    $(window).on('resize', function () { AOS.refresh(); });
    $(window).on('load', function() { setTimeout(AOS.refreshHard, 150); });
	window.addEventListener('load', AOS.refresh);

    // ============================================================== 
    //Tooltip
    // ============================================================== 
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    // ============================================================== 
    // For mega menu
    // ============================================================== 
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    });
     jQuery(document).on('click', '.navbar-nav > .dropdown', function(e) {
         e.stopPropagation();
    });
    $(".dropdown-submenu").on('click', function(){
              $(".dropdown-submenu > .dropdown-menu").toggleClass("show");                     
    });
    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize"); 
    // ============================================================== 
    //Fix header while scroll
    // ============================================================== 
     var wind = $(window);
         wind.on("load", function() {
            var bodyScroll = wind.scrollTop(),
                navbar = $(".sd-sticky");
            if (bodyScroll > 100) {
                navbar.addClass("fixed-header animated slideInDown")
            } else {
                navbar.removeClass("fixed-header animated slideInDown")
            }
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 200) {
				$('.sd-sticky').addClass('fixed-header animated slideInDown');
                $('.bt-top').addClass('visible');
            } else {
				$('.sd-sticky').removeClass('fixed-header animated slideInDown');
                $('.bt-top').removeClass('visible');
            }
        });
    // ============================================================== 
    // Animation initialized
    // ============================================================== 
    AOS.init();
    // ============================================================== 
    // Back to top
    // ============================================================== 
    $('.bt-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
    // ============================================================== 
    // Modal video stop on close
    // ============================================================== 
    $('.modal').on('hidden.bs.modal', function () {
        callPlayer('yt-player', 'stopVideo');
    });
	$('.op-clo').on('click', function() {
        $('body .h7-nav-box').toggleClass("show");
    });
	$('.tgl-cl').on('click', function() {
        $('body .h17-main-nav').toggleClass("show");
    });
    $('.h17-main-nav').perfectScrollbar();
    // one page scroll
	$('.sd-scroll a[href*="#"]:not([href="#"])').on('click', function() {
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
    jQuery(document).ready(function ($) {
        // woo 
        $( '.sd-quantity-button' ).on( 'click', function() {
            var t, d;
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
    });
    
}(jQuery));