<?php get_header(); ?>
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
                <li>
                    <article class="vjt_hero-poi-container">
                        <div class="vjt_hero-poi-img">
                            <?php
                                $attachment_id = get_field('hero_poi_box_one_image',9);
                                $size = "full";
                                $image = wp_get_attachment_image_src( $attachment_id, $size );
                            ?>
                            <img src="<?php echo $image[0]; ?>">
                        </div>
                        <div class="vjt_hero-poi-content">
                            <h1><?php the_field('hero_poi_box_one_title',9); ?></h1>
                            <div class="vjt_date"><?php the_field('hero_poi_box_one_subtitle',9); ?></div>
                            <div class="vjt_excerpt"><?php the_field('hero_poi_box_one_excerpt',9); ?></div>
                            <div class="vjt_read-more"><a href="<?php the_field('hero_poi_box_one_link',9); ?>"><?php _e('Read More', 'vjt_theme'); ?></a></div>
                        </div>
                    </article>
                </li>
                <li>
                    <article class="vjt_hero-poi-container">
                        <div class="vjt_hero-poi-img">
                            <?php
                                $attachment_id = get_field('hero_poi_box_two_image',9);
                                $size = "full";
                                $image = wp_get_attachment_image_src( $attachment_id, $size );
                            ?>
                            <img src="<?php echo $image[0]; ?>">
                        </div>
                        <div class="vjt_hero-poi-content">
                            <h1><?php the_field('hero_poi_box_two_title',9); ?></h1>
                            <div class="vjt_date"><?php the_field('hero_poi_box_two_subtitle',9); ?></div>
                            <div class="vjt_excerpt"><?php the_field('hero_poi_box_two_excerpt',9); ?></div>
                            <div class="vjt_read-more"><a href="<?php the_field('hero_poi_box_two_link',9); ?>"><?php _e('Read More', 'vjt_theme'); ?></a></div>
                        </div>
                    </article>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="vjt_fp-intro vjt_fp-section" id="vjt_fp-intro">
    <div class="vjt_fp-wrap">
        <h1><ul><?php wp_nav_menu( array('theme_location' => 'brand_menu' )); ?></ul></h1>
        <h2><?php the_field('home_introduction_title', 9); ?></h2>
        <div class="vjt_fp-intro-copy rte"><?php the_field('home_introduction_content', 9); ?></div>
        <div class="vjt_fp-intro-menu vjt_menu">
            <ul><?php wp_nav_menu( array('theme_location' => 'vjt_menu' )); ?></ul>
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
