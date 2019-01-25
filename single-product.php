<?php 
/* Template Name: Single Product */
get_header(); 
?>
<div class="vjt_page-wrap">
    <div class="vjt_article-archive">
        <main>
            <div class="vjt_main-content">

                <h1 class="vjt_page-title">
                <?php _e('VJT', 'vjt_theme'); ?><span><?php _e('Products', 'vjt_theme'); ?></span>
                </h1>
                <nav class="vjt_products-menu vjt_menu">
                    <ul>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Technologies</a></li>
                        <li><a href="#">Inspection Services</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </nav>
                <section class="vjt_product-page-content">
                    <div class="vjt_product-page-content-copy">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                            
                            <h1><?php the_title(); ?></h1>
                            <div class="rte"><?php the_content(); ?></div>
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="vjt_product-page-content-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </section>
                <?php if( have_rows('applications_list') ): ?> 
                    <div class="vjt_product-applications">
                        <div class="vjt_product-applications-list">
                            <h2><?php _e('Applications', 'vjt_theme'); ?></h2>
                            <ul>
                                <?php while ( have_rows('applications_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('application_label'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <div class="vjt_product-applications-menu">
                            <nav class="vjt_menu">
                                <ul>
                                    <li><a href="#">Solutions</a></li>
                                    <li><a href="#">Products</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('promotional_sections') ): ?> 
                    <div class="vjt_product-features">
                        <?php while ( have_rows('promotional_sections') ) : the_row(); ?>
                            <div class="vjt_product-features-item">
                                <div class="vjt_product-features-item-img">
                                    <div class="vjt_product-features-item-img-wrap">
                                        <?php
                                            $attachment_id = get_sub_field('promotional_section_image');
                                            $size = "full";
                                            $image = wp_get_attachment_image_src( $attachment_id, $size );
                                        ?>
                                        <?php if(get_sub_field('promotional_section_link')): ?>
                                            <a href="<?php the_sub_field('promotional_section_link'); ?>">
                                                <img src="<?php echo $image[0]; ?>">
                                                <div class="vjt_image-overlay"><?php _e('Click to view', 'vjt_theme'); ?></div>
                                            </a>
                                        <?php else: ?>
                                            <img src="<?php echo $image[0]; ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="vjt_product-features-item-content rte">
                                    <?php the_sub_field('promotional_section_content'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </main>
        <?php get_sidebar('products'); ?>
    </div>
</div>
<?php get_footer(); ?>

