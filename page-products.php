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
                        <?php _e('VJT', 'vjt_theme'); ?>
                    <?php endif; ?> 
                    <?php // Custom Subtitle ?>
                    <?php if(get_field('custom_subtitle')): ?>
                        <span> <?php the_field('custom_subtitle'); ?></span>
                    <?php else: ?>
                    <span> <?php the_title(); ?></span>
                    <?php endif; ?>
                     
                </h1>
            </div>
            <div class="vjt_main-content">
                <nav class="vjt_products-menu vjt_menu">
                <ul><?php wp_nav_menu( array('theme_location' => 'product_menu' )); ?></ul>
                </nav>
                <section class="vjt_product-page-content">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="vjt_product-page-content-copy rte">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif;  ?>
                    <div class="vjt_product-page-content-img">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/comp6.png">
                    </div>
                </section>

                <?php if( have_rows('point_of_sale_tables') ): ?>
                    <?php while ( have_rows('point_of_sale_tables') ) : the_row(); ?>
                        <div class="vjt_product-list">
                            <h2><?php the_sub_field('table_name'); ?></h2>
                            <ul>
                                <li class="vjt_product-list-header">
                                    <div><?php the_sub_field('pos_table_column_one_title'); ?></div>
                                    <div></div>
                                    <div><?php the_sub_field('pos_table_column_two_title'); ?></div>
                                    <div><?php the_sub_field('pos_table_column_three_title'); ?></div>
                                    <div><?php the_sub_field('pos_table_column_four_title'); ?></div>
                                </li>
                                <?php if( have_rows('pos_table_rows') ): ?>
                                    <?php while ( have_rows('pos_table_rows') ) : the_row(); ?>
                                        <li>
                                            <div class="vjt_product-list-img">
                                                <?php
                                                    $attachment_id = get_sub_field('pos_table_row_column_one_content');
                                                    $size = "product-table";
                                                    $image = wp_get_attachment_image_src( $attachment_id, $size );
                                                ?>
                                                <img src="<?php echo $image[0]; ?>">
                                            </div>
                                            <div class="vjt_product-list-system"><?php the_sub_field('pos_table_row_column_two_content'); ?></div>
                                            <div class="vjt_product-list-floorspace"><?php the_sub_field('pos_table_row_column_three_content'); ?></div>
                                            <div class="vjt_product-list-throughput"><?php the_sub_field('pos_table_row_column_four_content'); ?></div>
                                            <div class="vjt_product-list-views"><?php the_sub_field('pos_table_row_column_five_content'); ?></div>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="vjt_product-list-notes"><?php the_sub_field('table_notes'); ?></div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
