<?php get_header(); ?>
<div class="vjt_page-wrap">
    <div class="vjt_article-archive">

        <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
            <?php if(get_field('custom_page_title')): ?>
                    <?php the_field('custom_page_title'); ?>
                    <?php else: ?>
                    <?php _e('Industries', 'vjt_theme'); ?>
                    <?php endif; ?> 
                    <?php // Custom Subtitle ?>
                    <?php if(get_field('custom_subtitle')): ?>
                        <span> <?php the_field('custom_subtitle'); ?></span>
                    <?php else: ?>
                        <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
                    <?php endif; ?>
                 
            </h1>
        </div>
            <div class="vjt_main-content">

                <section class="vjt_product-page-content">
                    <div class="vjt_product-page-content-copy">
                        <?php
                            $attachment_id = get_field('industry_content_hero_image');
                            $size = "full";
                            $image = wp_get_attachment_image_src( $attachment_id, $size );
                        ?>
                        <div class="vjt_product-page-content-header-img">
                            <img src="<?php echo $image[0]; ?>">
                        </div>
                        <h1><?php the_field('industry_content_subtitle'); ?></h1>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div><?php the_content(); ?></div>
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
            </div>
        </aside>
    </div>
</div>
<?php get_footer(); ?>
