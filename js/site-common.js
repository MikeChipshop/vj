jQuery(document).ready(function( $ ) {


    // Overlay Menu Toggle
    $('.hamburger').click(function(){
		$('body').toggleClass('vjt_overlay-menu-active');
    });

    // Search Bar Toggle
    $('.vjt_global-header-search-wrap button').click(function(){
        $('.vjt_global-header-search-wrap').toggleClass('active');
        $('#s').focus();
    });

    // Sidebar Menu Toggle
    $(".vjt_list-dropdown-header h2").on('click', '.fa-chevron-down', function() {
        $(this).parent('h2').next('ul').slideToggle();
        $(this).parent('h2').parent('li').toggleClass("active");
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



    // VJT Links Hero
    $('.vjt_hero-slider-wrap a.internal.vjt').click(function(event){
        event.preventDefault();
        history.replaceState(null, null, '/');
        history.pushState(null, null, '/');
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $('.vjt_intro-tab:nth-of-type(1)').addClass('active');
        $('.vjt_intro-section:nth-of-type(1)').addClass('active');
    });
    $('.vjt_hero-slider-wrap a.internal.vje').click(function(event){
        event.preventDefault();
        history.replaceState(null, null, '/');
        history.pushState(null, null, '/');
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $('.vjt_intro-tab:nth-of-type(2)').addClass('active');
        $('.vjt_intro-section:nth-of-type(2)').addClass('active');
    });
    $('.vjt_hero-slider-wrap a.internal.vjx').click(function(event){
        event.preventDefault();
        history.replaceState(null, null, '/');
        history.pushState(null, null, '/');
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $('.vjt_intro-tab:nth-of-type(3)').addClass('active');
        $('.vjt_intro-section:nth-of-type(3)').addClass('active');
    });

    $(function(){
        var hash = window.location.hash;
        if(hash !== ''){
            $('li'+hash+ ' a').trigger('click');
        }
    });

    // VJT Dots
    $(document).on('click', 'a[href^="#"].vjt_dot', function(e) {

        // target element id
        var id = $(this).attr('href');

        // target element
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }

        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();

        // top position relative to the document
        var pos = $id.offset().top;

        // animated top scrolling
        $('body, html').animate({scrollTop: pos});
    });

    // Hero Slider
    $('.vjt_hero-slider').lightSlider({
        item:1,
        loop:true,
        slideMove:1,
        useCSS:true,
        pause:5000,
        cssEasing:'ease',
        speed:600,
        slideMargin:0,
        controls:false,
        auto:true,
        onSliderLoad: function() {
            $('.vjt_hero-slider').removeClass('cS-hidden');
        }
    });

    // Case Study Slider
    $('.vjt_case-studies-wrap').lightSlider({
        item:1,
        loop:true,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        slideMargin:0,
        prevHtml:'<i class="fas fa-chevron-left"></i>',
        nextHtml:'<i class="fas fa-chevron-right"></i>',
        onSliderLoad: function() {
            $('.vjt_case-studies-wrap').removeClass('cS-hidden');
        }
    });

    // Dots active state position

    // Cache selectors
    var topMenu = $(".vjt_nav-dots"),
    topMenuHeight = topMenu.outerHeight()+15,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
    });

    // Bind to scroll
    $(window).scroll(function(){
    // Get container scroll position
        var fromTop = $(this).scrollTop()+topMenuHeight;

        // Get id of current scroll item
        var cur = scrollItems.map(function(){
            if ($(this).offset().top < fromTop)
            return this;
        });
        // Get the id of the current element
        cur = cur[cur.length-1];
        var id = cur && cur.length ? cur[0].id : "";
        // Set/remove active class
        menuItems
        .parent().removeClass("active")
        .end().filter("[href='#"+id+"']").parent().addClass("active");
    });


    // Events months

    $('.vjt_filter-month a').click(function(e){
        e.preventDefault();
        $('.vjt_filter-month a').removeClass('active');
        $(this).addClass('active');
        var monthTrigger = $(this).attr("data-month");
        console.log(monthTrigger);
        $( ".vjt_event-list li" ).fadeOut( "slow", function() {});
        $( ".vjt_event-list li." +monthTrigger ).fadeIn( "fast", function() {});
    });


    $('.kvtogglemaster').click(function (e) {
        e.preventDefault();
        var checked = $(this).data('checked');
        $('.vjt_wizard-widget-section').find(':checkbox.kvtoggle').attr('checked', !checked);
        $(this).data('checked', !checked);
    });

    $('.powtogglemaster').click(function (e) {
        e.preventDefault();
        var checked = $(this).data('checked');
        $('.vjt_wizard-widget-section').find(':checkbox.powtoggle').attr('checked', !checked);
        $(this).data('checked', !checked);
    });

    $('.apptogglemaster').click(function (e) {
        e.preventDefault();
        var checked = $(this).data('checked');
        $('.vjt_wizard-widget-section').find(':checkbox.apptoggle').attr('checked', !checked);
        $(this).data('checked', !checked);
    });


    var widgetid2 = localStorage.getItem('widgetid');
    if (widgetid2) {
        $('#' + widgetid2).addClass("open");
        console.log('ID:' + widgetid2);
    }

    $('.vjt_list-dropdown-header h2').on('click', function(e) {
        $(this).next('ul').addClass("open");
        var dataid = $(this).closest('ul').attr("id")
        localStorage.setItem('widgetid', dataid);
        e.preventDefault();
    });


});
