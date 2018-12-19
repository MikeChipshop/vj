jQuery(document).ready(function( $ ) {

    // Overlay Menu Toggle
    $('.hamburger').click(function(){
		$('body').toggleClass('vjt_overlay-menu-active');
    });

    // Search Bar Toggle
    $('.vjt_global-header-search-wrap button').click(function(){
		$('.vjt_global-header-search-wrap').toggleClass('active');
    });

    // Sidebar Menu Toggle
    $('.vjt_list-dropdown-header').click(function(){
        $(this).children('ul').slideToggle( "fast", function() {});
        $(this).toggleClass('active');
    });

    // Industry Toggle
    $('.vjt_industry-information-item').click(function(){
        $(this).children('.vjt_industry-information-content').slideToggle( "fast", function() {});
        $(this).toggleClass('active');
	});

    // Sliders
    $('.vjt_hero-slider').lightSlider({
        item:1,
        loop:true,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        slideMargin:0,
        controls:false,
    });

    $('.vjt_case-studies-wrap').lightSlider({
        item:1,
        loop:true,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        slideMargin:0,
        prevHtml:'<i class="fas fa-chevron-left"></i>',
        nextHtml:'<i class="fas fa-chevron-right"></i>',
    });

});
