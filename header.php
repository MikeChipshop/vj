<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
                <form>
                    <input type="text">
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
    </div>
</header>
<nav class="vjt_overlay-menu">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/vjgroup-white.png">
    <div class="vjt_overlay-menu-column-wrap">
        <div class="vjt_overlay-menu-column">
            <h1>Menu</h1>
        </div>
        <div class="vjt_overlay-menu-column">
            <h2>Industries</h2>
            <ul>
                <li><a href="#">Auto</a></li>
                <li><a href="#">Aerospace</a></li>
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Medical</a></li>
                <li><a href="#">Military &amp; Defence</a></li>
                <li><a href="#">Nuclear</a></li>
                <li><a href="#">Oil &amp; Gas</a></li>
                <li><a href="#">Pipe &amp; Weld</a></li>
                <li><a href="#">Security</a></li>
            </ul>
        </div>
        <div class="vjt_overlay-menu-column">
            <h2>VJT</h2>
            <ul>
                <li><a href="#">NDT Solutions</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Technologies</a></li>
                <li><a href="#">Inspection Services</a></li>
                <li><a href="#">Resources</a></li>
            </ul>

            <h2>VJE</h2>
            <ul>
                <li><a href="#">X-Ray Products</a></li>
                <li><a href="#">Rework</a></li>
                <li><a href="#">Customer Service</a></li>
            </ul>

            <h2>VJX</h2>
            <ul>
                <li><a href="#">IXS Integregrated X-Ray Generators</a></li>
                <li><a href="#">XVG X-ray Generators</a></li>
            </ul>
        </div>
        <div class="vjt_overlay-menu-column">
            <ul><?php wp_nav_menu( array('theme_location' => 'main_menu' )); ?></ul>
        </div>
    </div>
</nav>
