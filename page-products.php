<?php get_header(); ?>
<div class="vjt_page-wrap">
    <div class="vjt_article-archive">
        <main>
            <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                    VJT <span>Products</span>
            </h1>
</div>
            <div class="vjt_main-content">
                <nav class="vjt_products-menu vjt_menu">
                    <ul>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Technologies</a></li>
                        <li><a href="#">Inspection Services</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </nav>
                <section class="vjt_product-page-content">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="vjt_product-page-content-copy rte">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif;  ?>
                    <div class="vjt_product-page-content-img">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/comp6.png">
                    </div>
                </section>
                <div class="vjt_product-list">
                    <h2>Casting Products</h2>
                    <ul>
                        <li class="vjt_product-list-header">
                            <div>System</div>
                            <div></div>
                            <div>Floorspace</div>
                            <div>Throughput*</div>
                            <div>Views*</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vertex-thumb.png"></div>
                            <div class="vjt_product-list-system">Vertex II</div>
                            <div class="vjt_product-list-floorspace">1</div>
                            <div class="vjt_product-list-throughput">4</div>
                            <div class="vjt_product-list-views">4</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/carm-thumb.png"></div>
                            <div class="vjt_product-list-system">C-Arm</div>
                            <div class="vjt_product-list-floorspace">2</div>
                            <div class="vjt_product-list-throughput">5</div>
                            <div class="vjt_product-list-views">2</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/RIX-XL-Machine-TN.jpg"></div>
                            <div class="vjt_product-list-system">RIX/RIX-XL</div>
                            <div class="vjt_product-list-floorspace">3</div>
                            <div class="vjt_product-list-throughput">3</div>
                            <div class="vjt_product-list-views">3</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/tconveyor-thumb.png"></div>
                            <div class="vjt_product-list-system">T-Conveyor</div>
                            <div class="vjt_product-list-floorspace">4</div>
                            <div class="vjt_product-list-throughput">1</div>
                            <div class="vjt_product-list-views">5</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/inline-thumb.png"></div>
                            <div class="vjt_product-list-system">In-Line Robotic</div>
                            <div class="vjt_product-list-floorspace">5</div>
                            <div class="vjt_product-list-throughput">2</div>
                            <div class="vjt_product-list-views">1</div>
                        </li>
                    </ul>
                    <div class="vjt_product-list-notes">
                        <p>*Floorspace: smallest is 1, largest is 5</p>
                        <p>*Throughput: 1 is for the fastest throughput, 5 is for the slowest throughput</p>
                        <p>*Views: 1 can be programmed for the most amount of views, 5 for the least amount of views</p>
                    </div>
                </div>
                <div class="vjt_product-list">
                    <h2>Weld Products</h2>
                    <ul>
                        <li class="vjt_product-list-header">
                            <div>System</div>
                            <div></div>
                            <div>Floorspace</div>
                            <div>Throughput*</div>
                            <div>Diameter Range*</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/inline-thumb.png"></div>
                            <div class="vjt_product-list-system">Standard STW</div>
                            <div class="vjt_product-list-floorspace">2</div>
                            <div class="vjt_product-list-throughput">2</div>
                            <div class="vjt_product-list-views">2</div>
                        </li>
                        <li>
                            <div class="vjt_product-list-img"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/inline-thumb.png"></div>
                            <div class="vjt_product-list-system">Mobile STW</div>
                            <div class="vjt_product-list-floorspace">1</div>
                            <div class="vjt_product-list-throughput">1</div>
                            <div class="vjt_product-list-views">1</div>
                        </li>
                    </ul>
                    <div class="vjt_product-list-notes">
                        <p>*Floorspace: smallest is 1, largest is 5</p>
                        <p>*Throughput: 1 is for the fastest throughput, 5 is for the slowest throughput</p>
                        <p>*Diamete Range: 1 can be programmed for the most amount of views, 5 for the least amount of views</p>


                    </div>
                </div>
            </div>
        </main>
        <?php get_sidebar('products'); ?>
    </div>
</div>
<?php get_footer(); ?>
