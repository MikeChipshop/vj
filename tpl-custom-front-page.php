<?php 
    /* Template Name: Branded Landing Page */
    get_header(); 
?>
<section class="vjt_fp-hero vjt_fp-section" id="vjt_fp-hero">
    <div class="vjt_fp-wrap">
        <div class="vjt_hero-slider">
            <?php if( have_rows('home_hero_items',9) ): ?>
                <?php while ( have_rows('home_hero_items',9) ) : the_row(); ?>
                    <article class="vjt_hero-slider-wrap">
                        <div class="vjt_hero-slider-content">
                            <h2><?php the_sub_field('hero_item_title'); ?></h2>
                            <h1><?php the_sub_field('hero_item_subtitle'); ?></h1>
                            <div class="vjt_hero-slider-copy"><?php the_sub_field('hero_item_content'); ?></div>
                            <div class="vjt_read-more"><a href="<?php the_sub_field('hero_item_read_more_link'); ?>"><?php the_sub_field('hero_item_read_more_text'); ?></a></div>
                        </div>
                        <div class="vjt_hero-slider-img">
                            <?php
                                $attachment_id = get_sub_field('hero_item_image');
                                $size = "full";
                                $image = wp_get_attachment_image_src( $attachment_id, $size );
                            ?>
                            <img src="<?php echo $image[0]; ?>">
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="vjt_hero-poi">
            <ul>
                <?php $post_object_one = get_field('hero_poi_box_one', 9); ?>
                <?php if( $post_object_one ): ?> 
                    <?php $post_one = $post_object_one; ?>
	                <?php setup_postdata( $post_one ); ?>
                    <li>
                        <article class="vjt_hero-poi-container">
                            <div class="vjt_hero-poi-img">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/poi-item-placeholder.jpg">
                            </div>
                            <div class="vjt_hero-poi-content">
                                <h1><?php the_title(); ?></h1>
                                <div class="vjt_date"><?php the_time('d M Y'); ?></div>
                                <div class="vjt_excerpt"><?php the_excerpt(); ?></div>
                                <div class="vjt_read-more"><a href="<?php the_permalink(); ?>"><?php _e('Read more', 'vjt_theme'); ?></a></div>
                            </div>
                        </article>
                    </li>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php $post_object_two = get_field('hero_poi_box_two', 9); ?>
                <?php if( $post_object_two ): ?> 
                    <?php $post_two = $post_object_two; ?>
	                <?php setup_postdata( $post_two ); ?>
                    <li>
                        <article class="vjt_hero-poi-container">
                            <div class="vjt_hero-poi-img">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/poi-item-placeholder.jpg">
                            </div>
                            <div class="vjt_hero-poi-content">
                                <h1><?php echo get_the_title($post->ID); ?></h1>
                                <div class="vjt_date"><?php the_time('d M Y'); ?></div>
                                <div class="vjt_excerpt"><?php the_excerpt(); ?></div>
                                <div class="vjt_read-more"><a href="<?php the_permalink(); ?>"><?php _e('Read more', 'vjt_theme'); ?></a></div>
                            </div>
                        </article>
                    </li>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>

<section class="vjt_fp-intro vjt_fp-section" id="vjt_fp-intro">
    <div class="vjt_fp-wrap">
        <h1><ul><?php wp_nav_menu( array('theme_location' => 'brand_menu' )); ?></ul></h1>
        <h2><?php the_field('landing_page_subtitle'); ?></h2>
        <div class="vjt_fp-intro-copy rte">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="vjt_fp-intro-menu vjt_menu">
            <?php if(get_field('brand_menu_select') === 'vje'): ?>
                <ul><?php wp_nav_menu( array('theme_location' => 'vje_menu' )); ?></ul>
            <?php elseif(get_field('brand_menu_select') === 'vjx'): ?>
                <ul><?php wp_nav_menu( array('theme_location' => 'vjx_menu' )); ?></ul>
            <?php elseif(get_field('brand_menu_select') === 'vjt'): ?>
                <ul><?php wp_nav_menu( array('theme_location' => 'vjt_menu' )); ?></ul>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="vjt_fp-about vjt_fp-section" id="vjt_fp-about">
    <div class="vjt_fp-wrap">
        <h1><?php _e('About', 'vjt_theme'); ?></h1>
        <h2><?php the_field('home_about_title', 9); ?></h2>
        <div class="vjt_fp-about-copy rte"><?php the_field('home_about_content', 9); ?></div>
    </div>
</section>
<section class="vjt_fp-case-studies vjt_fp-section" id="vjt_fp-case-studies">
    <div class="vjt_fp-wrap">
        <h1><?php _e('Case Studies', 'vjt_theme'); ?></h1>
        <div class="vjt_case-studies-container-wrap">
            <div class="vjt_case-studies-wrap">
                <?php if( have_rows('case_study_slides',9) ): ?>
                    <?php while ( have_rows('case_study_slides',9) ) : the_row(); ?>
                        <article class="vjt_fp-case-study">
                            <div class="vjt_fp-case-study-img">
                                <?php
                                    $attachment_id = get_sub_field('case_study_slide_image');
                                    $size = "full";
                                    $image = wp_get_attachment_image_src( $attachment_id, $size );
                                ?>
                                <img src="<?php echo $image[0]; ?>">
                            </div>
                            <div class="vjt_fp-case-study-content">
                                <h1><?php the_sub_field('case_study_slide_title'); ?></h1>
                                <div class="vjt_fp-case-study-copy rte"><?php the_sub_field('case_study_slide_content'); ?></div>
                                <div class="vjt_read-more"><a href="<?php the_sub_field('case_study_slide_link'); ?>"><?php _e('See more', 'vjt_theme'); ?></a></div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
