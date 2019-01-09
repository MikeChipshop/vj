<?php get_header(); ?>
<section class="vjt_fp-hero vjt_fp-section" id="vjt_fp-hero">
    <div class="vjt_fp-wrap">
        <div class="vjt_hero-slider">
            <?php if( have_rows('home_hero_items') ): ?>
                <?php while ( have_rows('home_hero_items') ) : the_row(); ?>
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
                <?php $post_object_one = get_field('hero_poi_box_one'); ?>
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
                                <div class="vjt_read-more"><a href="<?php the_permalink(); ?>">Read More</a></div>
                            </div>
                        </article>
                    </li>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php $post_object_two = get_field('hero_poi_box_two'); ?>
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
                                <div class="vjt_read-more"><a href="<?php the_permalink(); ?>">Read More</a></div>
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
        <h1>
            <ul>
                <li><a class="active" href="#">VJT</a></li>
                <li><a href="#">VJE</a></li>
                <li><a href="#">VJX</a></li>
            </ul>
        </h1>
        <h2>Custom imaging software and hardware products, solutions and inspection services for industry and government.</h2>
        <div class="vjt_fp-intro-copy rte">
            <p>Founded in 1987, VJ Technologies is a leading global provider of X-ray inspection solutions. We apply our radioscopic digital imaging expertise to government agencies and nondestructive testing (NDT) markets throughout the world.</p>
            <p>VJT develops and manufactures a complete line of automated, manual, and turnkey X-ray inspection systems. Our primary market sectors include: aerospace, automotive, electronics, remediation, nuclear, oil & gas, and pipe & weld applications. VJT X-ray inspection systems are used for radioscopic inspection of products and assemblies to detect defects or foreign matter, reducing cost and time while increasing quality and safety.</p>
            <p>VJT Inspection Services provide a full range of expert, economical inspection Services (IS). In-house or in-the-field, VJT has innovative systems to meet your needs.</p>
            <p>VJT delivers a competitive advantage over other companies through our network of global offices. In the 21st century, VJT continues to nurture emerging technologies and provide solutions for global customers.</p>
        </div>
        <div class="vjt_fp-intro-menu vjt_menu">
            <ul>
                <li><a href="#">Solutions</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Technologies</a></li>
                <li><a href="#">Inspection Services</a></li>
                <li><a href="#">Resources</a></li>
            </ul>
        </div>
    </div>
</section>

<section class="vjt_fp-about vjt_fp-section" id="vjt_fp-about">
    <div class="vjt_fp-wrap">
        <h1>About</h1>
        <h2>Custom imaging software and hardware products, solutions and inspection services for industry and government.</h2>
        <div class="vjt_fp-about-copy rte">
            <p>Founded in 1987, VJ Technologies is a leading global provider of X-ray inspection solutions. We apply our radioscopic digital imaging expertise to government agencies and nondestructive testing (NDT) markets throughout the world.</p>
            <div class="vjt_video-container">
                <div class="vjt_responsive-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/cl1PVw-Lxbk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <p>VJT develops and manufactures a complete line of automated, manual, and turnkey X-ray inspection systems. Our primary market sectors include: aerospace, automotive, electronics, remediation, nuclear, oil & gas, and pipe & weld applications. VJT X-ray inspection systems are used for radioscopic inspection of products and assemblies to detect defects or foreign matter, reducing cost and time while increasing quality and safety.</p>

            <p>VJT Inspection Services provide a full range of expert, economical inspection Services (IS). In-house or in-the-field, VJT has innovative systems to meet your needs.</p>
            <p>VJT delivers a competitive advantage over other companies through our network of global offices. In the 21st century, VJT continues to nurture emerging technologies and provide solutions for global customers.</p>

        </div>
    </div>
</section>
<section class="vjt_fp-case-studies vjt_fp-section" id="vjt_fp-case-studies">
    <div class="vjt_fp-wrap">
        <h1>Case Studies</h1>
        <div class="vjt_case-studies-container-wrap">
            <div class="vjt_case-studies-wrap">
                <article class="vjt_fp-case-study">
                    <div class="vjt_fp-case-study-img">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/case-studies-placeholder.jpg">
                    </div>
                    <div class="vjt_fp-case-study-content">
                        <h1>Engineering Growth in Avionics</h1>
                        <div class="vjt_fp-case-study-copy rte">
                            <p>With our X-Ray inspection services, VJ Technologies (VJT) provides inspection services at it's state-of-the-art laboratory to prevent defects with our X-Ray inspection services, VJ Technologies (VJT) provides inspection.</p>
                        </div>
                        <div class="vjt_read-more"><a href="#">See More</a></div>
                    </div>
                </article>
                <article class="vjt_fp-case-study">
                    <div class="vjt_fp-case-study-img">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/case-studies-placeholder.jpg">
                    </div>
                    <div class="vjt_fp-case-study-content">
                        <h1>Engineering Growth in Avionics</h1>
                        <div class="vjt_fp-case-study-copy rte">
                            <p>With our X-Ray inspection services, VJ Technologies (VJT) provides inspection services at it's state-of-the-art laboratory to prevent defects with our X-Ray inspection services, VJ Technologies (VJT) provides inspection.</p>
                        </div>
                        <div class="vjt_read-more"><a href="#">See More</a></div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
