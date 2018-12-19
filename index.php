<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_news-title">
            <h1 class="vjt_page-title">
                News <span>VJ Group</span>
            </h1>
        </div>
        <ul class="vjt_news-landing-list">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li>
                    <div class="vjt_news-landing-wrap">
                        <div class="vjt_article-excerpt-img">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/poi-item-placeholder.jpg">
                        </div>
                        <div class="vjt_article-excerpt-container">
                            <h1>Improving Inventory Accuracy with X-Ray Component Counting</h1>
                            <div class="vjt_article-excerpt-date">28 may 2018</div>
                            <div class="vjt_article-excerpt-copy">
                                Having an accurate inventory is critical to any production process. This is especially true in a dynamic SMT line where frequent changes take place. To maintain the highest accuracy, components must be counted each time they are returned to stock. Many pick-and-place systems will track and report component usage, including mis-picks.
                            </div>
                            <div class="vjt_article-excerpt-read-more">
                                <div class="vjt_read-more"><a href="<?php the_permalink(); ?>">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile; endif; ?>
        </ul>
    </main>
    <aside>
        <div class="vjt_main-sidebar">
            <ul class="vjt_list-dropdown">
                <li class="vjt_list-dropdown-header">
                    <h2>Year <i class="fas fa-chevron-down"></i></h2>
                    <ul class="vjt_list-dropdown-child">
                        <li><a href="#">2018</a></li>
                        <li><a href="#">2017</a></li>
                        <li><a href="#">2016</a></li>
                        <li><a href="#">2015</a></li>
                        <li><a href="#">2014</a></li>
                        <li><a href="#">2013</a></li>
                        <li><a href="#">2012</a></li>
                        <li><a href="#">2011</a></li>
                        <li><a href="#">2010</a></li>
                        <li><a href="#">2009</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</div>
<?php get_footer(); ?>
