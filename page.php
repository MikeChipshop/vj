<?php get_header(); ?>
<div class="vjt_page-wrap">
    <div class="vjt_article-archive">
        <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php // Custom Title ?>
                <?php if(get_field('custom_page_title')): ?>
                    <?php the_field('custom_page_title'); ?>
                <?php else: ?>
                    <?php the_title(); ?>
                <?php endif; ?> 

                <?php // Custom Subtitle ?>
                <?php if(get_field('custom_subtitle')): ?>
                    <span> <?php the_field('custom_subtitle'); ?></span>
                <?php else: ?>
                    <span> <?php _e('VJ Group', 'vjt_theme'); ?></span>
                <?php endif; ?>
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
                <?php if( have_rows('information_links') ): ?>
                            <div class="vjt_industry-information">
                                <h2><?php _e('Further information', 'vjt_theme'); ?></h2>
                                <ul>
                                    <?php while ( have_rows('information_links') ) : the_row(); ?>
                                        <li class="vjt_industry-information-item">
                                            <h3><a href="<?php the_sub_field('information_item_link'); ?>"><?php the_sub_field('information_item_title'); ?></a> <span><i class="fas fa-chevron-down"></i></span></h3>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
