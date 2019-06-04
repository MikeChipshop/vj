<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-52487288-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-52487288-1');
</script>
<script type="text/javascript">
(function() {
  var didInit = false;
  function initMunchkin() {
    if(didInit === false) {
      didInit = true;
      Munchkin.init('164-OIZ-640');
    }
  }
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = '//munchkin.marketo.net/munchkin.js';
  s.onreadystatechange = function() {
    if (this.readyState == 'complete' || this.readyState == 'loaded') {
      initMunchkin();
    }
  };
  s.onload = initMunchkin;
  document.getElementsByTagName('head')[0].appendChild(s);
})();
</script>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<script type="text/javascript" src="http://www.nyctrl32.com/js/63692.js"></script>
<noscript><img src="http://www.nyctrl32.com/63692.png" alt="" style="display:none;" /></noscript>

<?php if(is_front_page()): ?>
    <div class="vjt_bg-triangle-top">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/triangle-top.png">
    </div>
<?php endif; ?>
<header class="vjt_global-header">
    <div class="vjt_global-header-right">
        <div class="vjt_header-logo">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vj-logo.png" alt="VJT"></a>
        </div>
        <nav>
            <ul><?php wp_nav_menu( array('theme_location' => 'header_bar_menu' )); ?></ul>
        </nav>
    </div>
    <div class="vjt_global-header-right">
        <div class="vjt_global-header-search">
            <div class="vjt_global-header-search-wrap">
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                    <label for="s">Search</label>
                    <input  type="text" name="s" id="s">
                    <button>Search</button>
                </form>
                <button>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 40 50" style="enable-background:new 0 0 40 50;" xml:space="preserve">
                    <path d="M39.3,35.9L28.8,25.4c4.6-6.2,4.1-15-1.6-20.7C21-1.5,10.9-1.6,4.7,4.7c-6.2,6.2-6.2,16.3,0,22.5c5.6,5.6,14.4,6.1,20.7,1.6
                        l10.5,10.5c0.9,0.9,2.4,0.9,3.4,0C40.2,38.4,40.2,36.8,39.3,35.9z M8.1,24c-4.3-4.3-4.3-11.4,0-15.7C12.4,4,19.5,4,23.8,8.3
                        s4.3,11.3,0,15.7C19.5,28.3,12.4,28.3,8.1,24z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="vjt_global-header-menu">
            <button>
                <span class="hamburger"></span>
            </button>
        </div>
        <div class="vjt_language-switcher"><?php do_action('wpml_add_language_selector'); ?></div>
    </div>
</header>
<nav class="vjt_overlay-menu">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/vjgroup-white.png">
    <div class="vjt_overlay-menu-column-wrap">
        <div class="vjt_overlay-menu-column">
            <h1><?php _e('Menu', 'vjt_theme'); ?></h1>
        </div>
        <div class="vjt_overlay-menu-column vjt_overlay-header-menu">
            <ul><?php wp_nav_menu( array('theme_location' => 'header_bar_menu' )); ?></ul>
        </div>
        <div class="vjt_overlay-menu-column">
            <h2><?php _e('Industries', 'vjt_theme'); ?></h2>
            <ul>
                <?php
                    $industryargs = array(
                        'post_type' => 'industry',
                        'posts_per_page' => -1
                    );
                ?>
                <?php $industryloop = new WP_Query( $industryargs ); ?>
                <?php if ( $industryloop->have_posts() ): ?>
                    <?php while ( $industryloop->have_posts() ) : $industryloop->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </ul>
        </div>
        <div class="vjt_overlay-menu-column">
            <h2><?php _e('VJT', 'vjt_theme'); ?></h2>
            <ul><?php wp_nav_menu( array('theme_location' => 'vjt_menu' )); ?></ul>

            <h2><?php _e('VJE', 'vjt_theme'); ?></h2>
            <ul><?php wp_nav_menu( array('theme_location' => 'vje_menu' )); ?></ul>

            <h2><?php _e('VJX', 'vjt_theme'); ?></h2>
            <ul><?php wp_nav_menu( array('theme_location' => 'vjx_menu' )); ?></ul>
        </div>
        <div class="vjt_overlay-menu-column">
            <ul><?php wp_nav_menu( array('theme_location' => 'main_menu' )); ?></ul>
        </div>
    </div>
</nav>
