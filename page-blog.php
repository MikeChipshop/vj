<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php the_title(); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
            </h1>
        </div>
        <ul class="vjt_news-landing-list">
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
        </ul>
    </main>
    <aside>
        <div class="vjt_main-sidebar">
            <ul class="vjt_list-dropdown">
                <li class="vjt_list-dropdown-header">
                    <h2><?php _e('Categories', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>
                    <ul class="vjt_list-dropdown-child">
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Company News</a></li>
                        <li><a href="#">New Product Announcements</a></li>
                        <li><a href="#">Uncategorized</a></li>
                        <li><a href="#">VJ Electronix</a></li>
                        <li><a href="#">VJ Group</a></li>
                        <li><a href="#">VJ Technologies</a></li>
                        <li><a href="#">VJ X-Ray</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</div>
<?php get_footer(); ?>
