<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
            <?php if(get_field('custom_page_title')): ?>
                    <?php the_field('custom_page_title'); ?>
                    <?php else: ?>
                    <?php _e('Blog', 'vjt_theme'); ?>
                    <?php endif; ?> 
                    <?php // Custom Subtitle ?>
                    <?php if(get_field('custom_subtitle')): ?>
                        <span> <?php the_field('custom_subtitle'); ?></span>
                    <?php else: ?>
                    <span> <?php _e('VJ Group', 'vjt_theme'); ?></span>
                    <?php endif; ?>
            </h1>
        </div>
        <ul class="vjt_news-landing-list">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li>
                    <div class="vjt_news-landing-wrap">
                        <div class="vjt_article-excerpt-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                        <div class="vjt_article-excerpt-container">
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
            <?php endwhile; ?>
            <?php miniman_paging_nav(); ?>
            <?php endif; ?>
        </ul>
    </main>
    <aside>
        <div class="vjt_main-sidebar">

            <ul class="vjt_list-dropdown">
                <li class="vjt_list-dropdown-header">
                    <h2><?php _e('Categories', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>
                    <?php
                        $terms = get_terms( 'category' );
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                            echo '<ul class="vjt_list-dropdown-child">';
                                foreach ( $terms as $term ) {
                                    echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
                                }
                            echo '</ul>';
                        }
                    ?>
                </li>
            </ul>
            
        </div>
    </aside>
</div>
<?php get_footer(); ?>
