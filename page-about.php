<?php get_header(); ?>
    <main>
        <div class="vjt_page-title-wrap wide">
            <h1 class="vjt_page-title">
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
        <div class="vjt_page-about-top">
            <div class="vjt_about-wrap">
                <div class="vjt_page-about-top-content">
                    <h2><?php the_field('about_page_subtitle'); ?></h2>
                    <div class="rte"><?php the_field('about_page_introduction'); ?></div>

                    <?php if( have_rows('about_page_verticals_list') ): ?>
                        <div class="vjt_about-verticals">
                            <h3><?php the_field('about_page_verticals_list_title'); ?></h3>
                            <ul>
                                <?php while ( have_rows('about_page_verticals_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('about_page_verticals_list_item'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="vjt_page-about-top-video">
                <div class="vjt_video-container">
                    <div class="vjt_responsive-video">
                        <?php the_field('about_page_intro_video'); ?>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="vjt_page-about-middle">
            <div class="vjt_about-wrap">
                <div class="rte">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="vjt_show-more-slide"><?php _e('Continue Reading', 'vjt_theme'); ?></div>
            </div>
        </div>

        <div class="vjt_page-about-bottom">
            <?php
                $attachment_id = get_field('about_page_footer_image');
                $size = "full";
                $image = wp_get_attachment_image_src( $attachment_id, $size );
            ?>
            <img src="<?php echo $image[0]; ?>">
        </div>
    </main>
<?php get_footer(); ?>
