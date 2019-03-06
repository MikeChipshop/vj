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
        <div class="vjt_wide-page-wrap">
            <div class="vjt_wide-page-wrap-top">
                <div class="vjt_wide-page-wrap-top-wrap">
                    <div class="vjt_news-title">
                        <h2><?php the_field('careers_page_subtitle'); ?></h2>
                    </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="rte vjt_single-page-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif; ?>
                    <?php if( have_rows('current_openings') ): ?>
                        <div class="vjt_career-openings">
                            <h2><?php the_sub_field('current_openings_list_title'); ?></h2>
                            <div class="vjt_career-openings-lists">
                                <?php while ( have_rows('current_openings') ) : the_row(); ?>
                                    <div class="vjt_career-openings-list">
                                        <h3><?php the_sub_field('current_openings_list_title'); ?></h3>
                                        <ul>
                                            <?php if( have_rows('current_openings_list_item') ): while ( have_rows('current_openings_list_item') ) : the_row(); ?>
                                                <li><?php the_sub_field('current_openings_list_item_role'); ?></li>
                                            <?php endwhile; endif; ?>
                                        </ul>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="vjt_wide-page-wrap-bottom">
                <div class="vjt_wide-page-wrap-bottom-wrap">
                    <h3>
                        <a href="<?php the_field('careers_page_download_application_link'); ?>" title="<?php the_field('careers_page_download_application_label'); ?>">
                            <?php the_field('careers_page_download_application_label'); ?>
                        </a>
                    </h3>
                    <div class="rte vjt_single-page-content">
                        <?php the_field('careers_page_download_application_content'); ?></a>

                        <?php if( have_rows('benefits_list') ): ?>
                            <h3><?php the_field('benefits_title'); ?></h3>
                            <ul class="vjt_career-benefits">
                                <?php while ( have_rows('benefits_list') ) : the_row(); ?>
                                    <li><?php the_sub_field('benefits_item'); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php the_field('careers_information_content'); ?>
                        <img src="https://vjt.crucibledigital.co.uk/wp-content/themes/vjt/img/poi-placeholder.png">
                        <?php the_field('additional_information_content'); ?>
                        <?php if( have_rows('additional_information_links') ): ?>
                            <ul>
                                <?php while ( have_rows('additional_information_links') ) : the_row(); ?>
                                    <li>
                                        <a href="<?php the_sub_field('additional_information_link_target'); ?>" title="<?php the_sub_field('additional_information_link_label'); ?>" target="_blank">
                                            <?php the_sub_field('additional_information_link_label'); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
