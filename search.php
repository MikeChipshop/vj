<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php _e('Search Results', 'vjt_theme'); ?> <span>: <?php echo get_search_query(); ?></span>
            </h1>
        </div>
        <ul class="vjt_news-landing-list">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <li>
                        <div class="vjt_news-landing-wrap">
                            <div class="vjt_article-excerpt-img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="vjt_article-excerpt-container">
                                <h1><?php the_title(); ?></h1>
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
                    <?php miniman_paging_nav(); ?>
            <?php endif; ?>
        </ul>
    </main>
    <aside>
        <div class="vjt_main-sidebar">
            <div class="to_search-result-copy">
                <p><?php _e('You searched for the term ', 'vjt_theme'); ?><strong><?php echo get_search_query(); ?></strong>.</p>
                <p>
                    <?php _e('Your search returned ', 'vjt_theme'); ?>
                    <strong>
                        <?php global $wp_query;
                            echo $wp_query->found_posts;
                        ?>
                    </strong>
                    <?php _e(' results.', 'vjt_theme'); ?>
                </p>
            </div>
        </div>
    </aside>
</div>
<?php get_footer(); ?>
