<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php _e('News', 'vjt_theme'); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
            </h1>
        </div>
        <ul class="vjt_news-landing-list">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li>
                    <div class="vjt_news-landing-wrap">
                        <div class="vjt_article-excerpt-container">
                            <h1><?php the_title(); ?></h1>
                            <div class="vjt_article-excerpt-date"><?php the_time('d M Y'); ?></div>
                            <div class="vjt_article-excerpt-copy rte">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </main>
    <?php get_sidebar('news'); ?>
</div>
<?php get_footer(); ?>
