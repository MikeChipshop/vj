<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
            <?php if(get_field('custom_page_title')): ?>
                    <?php the_field('custom_page_title'); ?>
                    <?php else: ?>
                    <?php _e('News', 'vjt_theme'); ?>
                    <?php endif; ?> 
                    <?php // Custom Subtitle ?>
                    <?php if(get_field('custom_subtitle')): ?>
                        <span> <?php the_field('custom_subtitle'); ?></span>
                    <?php else: ?>
                    <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
                    <?php endif; ?>
                
            </h1>
        </div>
        <?php if ( have_posts() ): ?>
            <ul class="vjt_news-landing-list">
                <?php while ( have_posts() ) : the_post(); ?>
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
    <?php get_sidebar('news'); ?>
</div>
<?php get_footer(); ?>
