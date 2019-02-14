<?php get_header(); ?>
<div class="vjt_page-wrap">
    <div class="vjt_article-archive">
        <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php the_title(); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
            </h1>
        </div>
            <div class="vjt_main-content">

                <section class="vjt_product-page-content">
                    <div class="vjt_product-page-content-copy">

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="rte"><?php the_content(); ?></div>
                        <?php endwhile; endif; ?>
                    </div>
                </section>
            </div>
        </main>
        <aside>
            <div class="vjt_main-sidebar">
                <ul class="vjt_list-dropdown">
                    <li class="vjt_list-dropdown-header">
                        <h2><?php _e('Industries', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>
                        <ul class="vjt_list-dropdown-child">
                            <?php
                                $industryargs = array(
                                    'post_type' => 'industry',
                                    'posts_per_page' => -1
                                );
                            ?>
                            <?php $industryloop = new WP_Query( $industryargs ); ?>
                            <?php if ( $industryloop->have_posts() ): ?>
                                <?php while ( $industryloop->have_posts() ) : $industryloop->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                            <?php endif; wp_reset_query(); ?>
                        </ul>
                    </li>
                </ul>
                <?php if( have_rows('additional_sidebar') ): ?>
                    <?php while ( have_rows('additional_sidebar') ) : the_row(); ?>
                        <ul class="vjt_list-dropdown">
                            <li class="vjt_list-dropdown-header">
                                <h2><?php the_sub_field('ndt_sidebar_widget_name'); ?> <i class="fas fa-chevron-down"></i></h2>
                                <?php if( have_rows('ndt_sidebar_items') ): ?>
                                    <ul class="vjt_list-dropdown-child">
                                        <?php while ( have_rows('ndt_sidebar_items') ) : the_row(); ?>
                                            <li><a href="<?php the_sub_field('ndt_sidebar_item_link'); ?>"><?php the_sub_field('ndt_sidebar_item_label'); ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        </ul>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </aside>
    </div>
</div>
<?php get_footer(); ?>
