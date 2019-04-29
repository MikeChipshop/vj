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
                        <?php the_title(); ?>
                    <?php endif; ?>
                    <?php // Custom Subtitle ?>
                    <?php if(get_field('custom_subtitle')): ?>
                        <span> <?php the_field('custom_subtitle'); ?></span>
                    <?php else: ?>
                        <span> <?php _e('Results', 'vjt_theme'); ?></span>
                    <?php endif; ?>
                </h1>
            </div>
            <div class="vjt_main-content">
                <section class="vjt_wizard-results-wrap">
                    <div class="vjt_product-page-content-copy">
                        <?php
                            $kv = ($_POST['kv']);
                            $pow = ($_POST['power']);
                            $app = ($_POST['application']);

                            // Fetch KV ID's
                            if ( is_array($kv) ) {
                                foreach( $kv as $kv_item ){
                                    $kv_item = get_term_by( 'slug', $kv_item, 'kv');
                                    $kv_IDs[] = $kv_item->term_id;
                                }
                            } else {
                                $kvterms = get_terms( array(
                                    'taxonomy' => 'kv',
                                    'parent'   => 0
                                ) );
                                foreach( $kvterms as $kvterm ){
                                    $kv_IDs[] = $kvterm->term_id;
                                }
                            };

                            //$kv_item2 = get_category_by_slug( $kv );
                            //$kv_IDs[] = $kv_item->term_id;
                            // Fetch Power ID's
                            if ( is_array($pow) ) {
                                foreach( $pow as $pow_item ){
                                    $pow_item = get_term_by( 'slug', $pow_item, 'power');
                                    $pow_IDs[] = $pow_item->term_id;
                                }
                            } else {
                                $powterms = get_terms( array(
                                    'taxonomy' => 'power',
                                    'parent'   => 0
                                ) );
                                foreach( $powterms as $powterm ){
                                    $pow_IDs[] = $powterm->term_id;
                                }
                            };


                            // Fetch App ID's


                            if ( is_array($app) ) {
                                foreach( $app as $app_item ){
                                    $app_item = get_term_by( 'slug', $app_item, 'application');
                                    $app_IDs[] = $app_item->term_id;
                                }
                            } else {
                                $appterms = get_terms( array(
                                    'taxonomy' => 'application',
                                    'parent'   => 0
                                ) );
                                foreach( $appterms as $appterm ){
                                    $app_IDs[] = $appterm->term_id;
                                }
                            };
                        ?>
                        <?php
                            $resultsargs = array(
                                'post_type' => 'page',
                                'posts_per_page' => -1,

                                'meta_query' => array(
                                    array(
                                      'key' => 'show_in_wizard',
                                      'value' => '1',
                                    )
                                ),

                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy'  => 'kv',
                                        'terms'     => $kv_IDs,
                                        'field'     => 'id'
                                    ),
                                    array(
                                        'taxonomy'  => 'power',
                                        'terms'     => $pow_IDs,
                                        'field'     => 'id'
                                    ),
                                    array(
                                        'taxonomy'  => 'application',
                                        'terms'     => $app_IDs,
                                        'field'     => 'id'
                                    )
                                ),

                            );
                        ?>

                        <?php $resultsloop = new WP_Query( $resultsargs ); ?>
                        <?php if ( $resultsloop->have_posts() ): ?>
                            <div class="vjt_wizard-results">
                                <ul>
                                <?php while ( $resultsloop->have_posts() ) : $resultsloop->the_post(); ?>
                                    <li>
                                        <div class="vjt_wizard-wrap-cont">
                                            <div class="vjt_wizard-wrap-cont-img">
                                                <?php the_post_thumbnail('pos'); ?>
                                            </div>
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <div class="vjt_wizard-noresults">
                                <h1><?php _e('Apologies', 'vjt_theme'); ?></h1>
                                <div>
                                <?php _e('There were no results found for your criteria. Please try again', 'vjt_theme'); ?>
                                </div>
                            </div>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>


                </section>
            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
