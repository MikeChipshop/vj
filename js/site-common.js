jQuery(document).ready(function( $ ) {

    /*var alterClass = function() {
        var ww = document.body.clientWidth;
        if (ww >= 1100) {
          $('body').removeClass('mobile');
          $('body').removeClass('tablet');
          $('body').addClass('desktop');
        } else if (ww >= 800 && ww < 1099) {
            $('body').removeClass('mobile');
            $('body').removeClass('desktop');
            $('body').addClass('tablet');
        } else if (ww < 799) {
            $('body').removeClass('tablet');
            $('body').removeClass('desktop');
            $('body').addClass('mobile');
        };
      };
      $(window).resize(function(){
        alterClass();
      });
      //Fire it when the page first loads:
      alterClass();
*/
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
    $('.vjt_list-dropdown-header h2').click(function(){
        $(this).parent('li').children('ul').slideToggle( "fast", function() {});
        $(this).parent('li').toggleClass('active');
    });
    /* Sidebar Menu Toggle
    $('.vjt_list-dropdown-header').click(function(){
        $(this).children('ul').slideToggle( "fast", function() {});
        $(this).toggleClass('active');
    });*/

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
    $('.home .vjt_intro-section:nth-of-type(1)').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $(this).addClass('active');
        $('.vjt_intro-tab:nth-of-type(1)').addClass('active');
        $('.vjt_intro-section:nth-of-type(1)').addClass('active');

    });

    // VJE Links
    $('.home .vjt_intro-section:nth-of-type(2)').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $(this).addClass('active');
        $('.vjt_intro-tab:nth-of-type(2)').addClass('active');
        $('.vjt_intro-section:nth-of-type(2)').addClass('active');

    });

    // VJX Links
    $('.home .vjt_intro-section:nth-of-type(3)').click(function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(".vjt_fp-intro").offset().top
        }, 600);
        $('.vjt_intro-section').removeClass('active');
        $('.vjt_intro-tab').removeClass('active');
        $(this).addClass('active');
        $('.vjt_intro-tab:nth-of-type(3)').addClass('active');
        $('.vjt_intro-section:nth-of-type(3)').addClass('active');

    });

    $(function(){
        var hash = window.location.hash;
        if(hash !== ''){
           $('li'+hash+ ' a').trigger('click');
            console.log(hash);
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


    // Sliders
    $('.vjt_hero-slider').lightSlider({
        item:1,
        loop:true,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        slideMargin:0,
        controls:false,
        onSliderLoad: function() {
            $('.vjt_hero-slider').removeClass('cS-hidden');
        }
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
        onSliderLoad: function() {
            $('.vjt_case-studies-wrap').removeClass('cS-hidden');
        }
    });

    $(function(){
        var nav = $('.vjt_about-wrap'),
            animateTime = 560,
            navLink = $('.vjt_show-more-slide');
        navLink.click(function(){
          if(nav.height() === 560){
            autoHeightAnimate(nav, animateTime);
          } else {
            nav.stop().animate({ height: '560' }, animateTime);
          }
        });
      })

    /* Function to animate height: auto */
    function autoHeightAnimate(element, time){
        var curHeight = element.height(), // Get Default Height
        autoHeight = element.css('height', 'auto').height(); // Get Auto Height
        element.height(curHeight); // Reset to Default Height
        element.stop().animate({ height: autoHeight }, time); // Animate to Auto Height
    }

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


});
