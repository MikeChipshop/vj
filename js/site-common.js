jQuery(document).ready(function( $ ) {

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
