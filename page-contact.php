<?php get_header(); ?>
    <main>
        <div class="vjt_news-title">
            <h1 class="vjt_page-title">
                <div><?php the_title(); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span></div>
            </h1>
        </div>
        <div class="vjt_wide-page-wrap contact">

            <div class="vjt_contact-wrap">
                <div class="vjt_contact-wrap-inner">
                    <nav class="vjt_contact-wrap-nav">
                        <div class="inactive vjt_contact-request-tab"><?php the_field('contact_tab_title'); ?></div>
                        <div class="vjt_contact-details-tab"><?php the_field('solutions_tab_title'); ?></div>
                    </nav>
                    <div class="vjt_contact-content details">
                        <?php if( have_rows('contact_details_section') ): ?>
                            <?php while ( have_rows('contact_details_section') ) : the_row(); ?>
                                <h2><?php the_sub_field('contact_details_sub_section_label'); ?></h2>
                                <div class="vjt_contact-content-columns">
                                    <?php if( have_rows('contact_details_sub_section') ): ?>
                                        <?php while ( have_rows('contact_details_sub_section') ) : the_row(); ?>
                                            <div class="vjt_contact-content-section">
                                                <h3><?php the_sub_field('details_sub_section_title'); ?></h3>
                                                <ul>
                                                    <?php if( have_rows('details_sub_section_item') ): ?>
                                                        <?php while ( have_rows('details_sub_section_item') ) : the_row(); ?>
                                                            <li><?php the_sub_field('sub_section_item_content'); ?></li>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="vjt_contact-content form">
                        <h2><?php the_field('solutions_tab_subtitle'); ?></h2>
                        <?php the_field('solutions_tab_intro'); ?>
                        <div class="vjt_contact-form">
                            <?php echo do_shortcode( '[contact-form-7 id="300" title="Contact form"]' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
