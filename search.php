<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_news-title">
            <h1 class="vjt_page-title">
                <div><?php _e('News', 'vjt_theme'); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span></div>
            </h1>
        </div>
        <ul class="vjt_news-landing-list">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li>
                    <div class="vjt_news-landing-wrap">
                        <div class="vjt_article-excerpt-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="vjt_article-excerpt-container">
                            <h1><?php the_title(); ?></h1>
                            <div class="vjt_article-excerpt-date"><?php the_time('d M Y'); ?></div>
                            <div class="vjt_article-excerpt-copy">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="vjt_article-excerpt-read-more">
                                <div class="vjt_read-more"><a href="<?php the_permalink(); ?>"><?php _e('Read more', 'vjt_theme'); ?></a></div>
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
                    <h2><?php _e('Year', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>
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
