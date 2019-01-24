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

    // Contact Page Tabs
    $('.vjt_contact-wrap-nav div').click(function(){
        $('.vjt_contact-wrap-nav div').addClass('inactive');
        $(this).removeClass('inactive');
    });
    $('.vjt_contact-request-tab.inactive').click(function(){
        $( ".vjt_contact-content.form" ).fadeIn( "slow", function() {});
        $( ".vjt_contact-content.details" ).fadeOut( "fast", function() {});
    });
    $('.vjt_contact-details-tab,inactive').click(function(){
        $( ".vjt_contact-content.details" ).fadeIn( "slow", function() {});
        $( ".vjt_contact-content.form" ).fadeOut( "fast", function() {});
    });

    // Industry Toggle
    $('.vjt_industry-information-item').click(function(){
        $(this).children('.vjt_industry-information-content').slideToggle( "fast", function() {});
        $(this).toggleClass('active');
    });
    
    // VJT Links
    $('.vjt_intro-section:nth-of-type(1)').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $(this).addClass('active');
        $('.vjt_intro-tab:nth-of-type(1)').addClass('active');

    });

    // VJE Links
    $('.vjt_intro-section:nth-of-type(2)').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $(this).addClass('active');
        $('.vjt_intro-tab:nth-of-type(2)').addClass('active');

    });

    // VJX Links
    $('.vjt_intro-section:nth-of-type(3)').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $(this).addClass('active');
        $('.vjt_intro-tab:nth-of-type(3)').addClass('active');

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
