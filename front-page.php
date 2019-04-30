<?php get_header(); ?>
<nav class="vjt_nav-dots">
    <ul>
        <li class="active"><a href="#vjt_fp-hero" class="vjt_dot"><span><?php _e('Top', 'vjt_theme'); ?></span></a></li>
        <li><a href="#vjt_fp-intro" class="vjt_dot"><span><?php _e('Introduction', 'vjt_theme'); ?></span></a></li>
        <li><a href="#vjt_fp-about" class="vjt_dot"><span><?php _e('About', 'vjt_theme'); ?></span></a></li>
        <li><a href="#vjt_fp-case-studies" class="vjt_dot"><span><?php _e('Case Studies', 'vjt_theme'); ?></span></a></li>
    </ul>
</nav>
<div class="vjt_home-scroll-wrap">
<section class="vjt_fp-hero vjt_fp-section" id="vjt_fp-hero">
    <div class="vjt_fp-wrap">
        <div class="vjt_hero-slider cS-hidden">
            <?php if( have_rows('home_hero_items') ): ?>
                <?php while ( have_rows('home_hero_items') ) : the_row(); ?>
                    <article class="vjt_hero-slider-wrap">
                        <?php
                            $str = get_sub_field('hero_item_read_more_link');
                        ?>
                        <div class="vjt_hero-slider-content">
                            <h2><?php the_sub_field('hero_item_title'); ?></h2>
                            <h1><?php the_sub_field('hero_item_subtitle'); ?></h1>
                            <div class="vjt_hero-slider-copy"><?php the_sub_field('hero_item_content'); ?></div>

                            <div class="vjt_read-more">
                            <?php if(get_sub_field('internal_link')): ?>
                                <a href="<?php the_sub_field('hero_item_read_more_link'); ?>" class="internal <?php the_sub_field('internal_link_content_name'); ?>"><?php the_sub_field('hero_item_read_more_text'); ?></a>
                            <?php else: ?>
                            <a href="<?php the_sub_field('hero_item_read_more_link'); ?>"><?php the_sub_field('hero_item_read_more_text'); ?></a>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="vjt_hero-slider-img">
                            <?php
                                $attachment_id = get_sub_field('hero_item_image');
                                $size = "home-hero";
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
                                $attachment_id = get_field('hero_poi_box_one_image');
                                $size = "pos";
                                $image = wp_get_attachment_image_src( $attachment_id, $size );
                            ?>
                            <img src="<?php echo $image[0]; ?>">
                        </div>
                        <div class="vjt_hero-poi-content">
                            <h1><?php the_field('hero_poi_box_one_title'); ?></h1>
                            <div class="vjt_date"><?php the_field('hero_poi_box_one_subtitle'); ?></div>
                            <div class="vjt_excerpt"><?php the_field('hero_poi_box_one_excerpt'); ?></div>
                            <div class="vjt_read-more"><a href="<?php the_field('hero_poi_box_one_link'); ?>"><?php _e('Read More', 'vjt_theme'); ?></a></div>
                        </div>
                    </article>
                </li>
                <li>
                    <article class="vjt_hero-poi-container">
                        <div class="vjt_hero-poi-img">
                            <?php
                                $attachment_id = get_field('hero_poi_box_two_image');
                                $size = "pos";
                                $image = wp_get_attachment_image_src( $attachment_id, $size );
                            ?>
                            <img src="<?php echo $image[0]; ?>">
                        </div>
                        <div class="vjt_hero-poi-content">
                            <h1><?php the_field('hero_poi_box_two_title'); ?></h1>
                            <div class="vjt_date"><?php the_field('hero_poi_box_two_subtitle'); ?></div>
                            <div class="vjt_excerpt"><?php the_field('hero_poi_box_two_excerpt'); ?></div>
                            <div class="vjt_read-more"><a href="<?php the_field('hero_poi_box_two_link'); ?>"><?php _e('Read More', 'vjt_theme'); ?></a></div>
                        </div>
                    </article>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="vjt_fp-intro vjt_fp-section" id="vjt_fp-intro">
    <div class="vjt_fp-wrap">
        <h1>
            <ul>
                <li id="vjt" class="vjt_intro-section active"><a href="#"><?php _e('VJT', 'vjt_theme'); ?></a></li>
                <li id="vje" class="vjt_intro-section"><a href="#"><?php _e('VJE', 'vjt_theme'); ?></a></li>
                <li id="vjx" class="vjt_intro-section"><a href="#"><?php _e('VJX', 'vjt_theme'); ?></a></li>
            </ul>
        </h1>
        <div class="vjt_intro-tabs">
            <div class="vjt_intro-tab active" id="vjt">
                <h2><?php the_field('vjt_home_introduction_title'); ?></h2>
                <div class="vjt_intro-tab-content">
                    <div class="vjt_fp-intro-copy rte"><?php the_field('vjt_home_introduction_content'); ?></div>
                    <div class="vjt_fp-intro-copy-img">
                        <?php
                            $attachment_id = get_field('vjt_home_introduction_content_img');
                            $size = "full";
                            $image = wp_get_attachment_image_src( $attachment_id, $size );
                        ?>
                        <img src="<?php echo $image[0]; ?>">
                    </div>
                </div>
                <div class="vjt_fp-intro-menu vjt_menu">
                    <ul><?php wp_nav_menu( array('theme_location' => 'vjt_menu' )); ?></ul>
                </div>
            </div>
            <div class="vjt_intro-tab" id="vje">
                <h2><?php the_field('vje_home_introduction_title'); ?></h2>
                <div class="vjt_intro-tab-content">
                    <div class="vjt_fp-intro-copy rte"><?php the_field('vje_home_introduction_content'); ?></div>
                    <div class="vjt_fp-intro-copy-img">
                        <?php
                            $attachment_id = get_field('vje_home_introduction_content_img');
                            $size = "full";
                            $image = wp_get_attachment_image_src( $attachment_id, $size );
                        ?>
                        <img src="<?php echo $image[0]; ?>">
                    </div>
                </div>
                <div class="vjt_fp-intro-menu vjt_menu">
                    <ul><?php wp_nav_menu( array('theme_location' => 'vje_menu' )); ?></ul>
                </div>
            </div>
            <div class="vjt_intro-tab">
                <h2><?php the_field('vjx_home_introduction_title'); ?></h2>
                <div class="vjt_intro-tab-content">
                    <div class="vjt_fp-intro-copy rte"><?php the_field('vjx_home_introduction_content'); ?></div>
                    <div class="vjt_fp-intro-copy-img">
                        <?php
                            $attachment_id = get_field('vjx_home_introduction_content_img');
                            $size = "full";
                            $image = wp_get_attachment_image_src( $attachment_id, $size );
                        ?>
                        <img src="<?php echo $image[0]; ?>">
                    </div>
                </div>
                <div class="vjt_fp-intro-menu vjt_menu">
                    <ul><?php wp_nav_menu( array('theme_location' => 'vjx_menu' )); ?></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="vjt_fp-about vjt_fp-section" id="vjt_fp-about">
    <div class="vjt_fp-wrap">
        <h1><?php _e('About', 'vjt_theme'); ?></h1>
        <h2><?php the_field('home_about_title'); ?></h2>
        <div class="vjt_fp-about-copy rte"><?php the_field('home_about_content'); ?></div>
    </div>
</section>
<section class="vjt_fp-case-studies vjt_fp-section" id="vjt_fp-case-studies">
    <div class="vjt_fp-wrap">
        <h1><?php _e('Case Studies', 'vjt_theme'); ?></h1>
        <div class="vjt_case-studies-container-wrap">
            <div class="vjt_case-studies-wrap cS-hidden">
                <?php if( have_rows('case_study_slides') ): ?>
                    <?php while ( have_rows('case_study_slides') ) : the_row(); ?>
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
</div>
<script>
jQuery(document).ready(function( $ ) {
  var options = {
    mode: "vp", // "vp", "set"
    autoHash: false,
    sectionScroll: true,
    initialScroll: true,
    keepHistory: false,
    sectionWrapperSelector: ".vjt_home-scroll-wrap",
    sectionClass: "vjt_fp-section",
    animationSpeed: 500,
    headerHash: "header",
    breakpoint: null,
    eventEmitter: null,
    dynamicHeight: false
  };
  $.smartscroll(options);

  var sections = $('.vjt_fp-section')
  , nav = $('vjt_nav-dots')
  , nav_height = nav.outerHeight();

$(window).on('scroll', function () {
  var cur_pos = $(this).scrollTop();

  sections.each(function() {
    var top = $(this).offset().top - nav_height,
        bottom = top + $(this).outerHeight();

    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('a').removeClass('active');
      sections.removeClass('active');

      $(this).addClass('active');
      nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
    }
  });
});

});


</script>
<?php get_footer(); ?>
