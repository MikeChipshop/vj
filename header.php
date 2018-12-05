<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="vj_global-header">
    <div class="vj_global-header-right">
        <div class="vj_header-logo">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vj-logo.png" alt="VJT"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#">VJT</a></li>
                <li><a href="#">VJE</a></li>
                <li><a href="#">VJX</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Industries</a></li>
            </ul>
        </nav>
    </div>
    <div class="vj_global-header-right">
        <div class="vj_global-header-search">
            <div class="vj_global-header-search-wrap">
                <form>
                    <input type="text">
                    <button>
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 40 50" style="enable-background:new 0 0 40 50;" xml:space="preserve">
                        <path d="M39.3,35.9L28.8,25.4c4.6-6.2,4.1-15-1.6-20.7C21-1.5,10.9-1.6,4.7,4.7c-6.2,6.2-6.2,16.3,0,22.5c5.6,5.6,14.4,6.1,20.7,1.6
                            l10.5,10.5c0.9,0.9,2.4,0.9,3.4,0C40.2,38.4,40.2,36.8,39.3,35.9z M8.1,24c-4.3-4.3-4.3-11.4,0-15.7C12.4,4,19.5,4,23.8,8.3
                            s4.3,11.3,0,15.7C19.5,28.3,12.4,28.3,8.1,24z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="vj_global-header-menu">
            <button>
                <i class="far fa-bars"></i>
            </button>
        </div>
    </div>
</header>
