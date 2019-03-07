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
$a = ($_POST['kv']);
$m = ($_POST['power']);
$o = ($_POST['application']);

echo $a;
echo $m;
echo $o;

foreach($o as $o) {
    echo $o;
}
                        ?>
                        <?php
                            $resultsargs = array(
                                'post_type' => 'page',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    array(
                                      'key' => 'show_in_wizard',
                                      'value' => '1',
                                      'compare' => '==' // not really needed, this is the default
                                    )
                                  )
                            );
                        ?>
                        <?php $resultsloop = new WP_Query( $resultsargs ); ?>
                        <?php if ( $resultsloop->have_posts() ): while ( $resultsloop->have_posts() ) : $resultsloop->the_post(); ?>
                            <div class="rte"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </div>
                    <div class="vjt_wizard-results">
                        <ul>
                            <li>
                                Result
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
