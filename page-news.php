<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php the_title(); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
            </h1>
        </div>
        <?php
			$newsargs = array(
				'post_type' => 'newspost',
			);
        ?>
        <?php $newsloop = new WP_Query( $newsargs ); ?>
        <?php if ( $newsloop->have_posts() ): ?>
            <ul class="vjt_news-landing-list">
                <?php while ( $newsloop->have_posts() ) : $newsloop->the_post(); ?>
                    <li>
                        <div class="vjt_news-landing-wrap">
                            <div class="vjt_article-excerpt-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <div class="vjt_article-excerpt-container">
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <div class="vjt_article-excerpt-copy">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="vjt_article-excerpt-read-more">
                                    <div class="vjt_read-more"><a href="<?php the_permalink(); ?>"><?php _e('Read more', 'vjt_theme'); ?></a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
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
