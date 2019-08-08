<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php _e('Blog', 'vjt_theme'); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
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
