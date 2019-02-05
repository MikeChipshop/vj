<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_page-title-wrap">
            <h1 class="vjt_page-title">
                <?php the_title(); ?> <span><?php _e('VJ Group', 'vjt_theme'); ?></span>
            </h1>
        </div>
        <div class="vjt_events-landing-wrap">

            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/event-hero.png">
        <?php $currentdate = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y"))); ?>
        <?php
			$eventargs = array(
				'post_type' => 'event',
                'posts_per_page' => -1,
                'meta_query'=> array(
                    array(
                      'key' => 'event_start_date',
                      'compare' => '>',
                      'value' => $currentdate,
                      'type' => 'DATE',
                    )
                ),
			);
        ?>
        <?php $eventloop = new WP_Query( $eventargs ); ?>
        <?php if ( $eventloop->have_posts() ): ?>
            <div class="vjt_event-list-wrap">
                <div class="vjt_event-list-header">
                    <div><?php _e('Date', 'vjt_theme'); ?></div>
                    <div><?php _e('Location', 'vjt_theme'); ?></div>
                    <div><?php _e('Show', 'vjt_theme'); ?></div>
                    <div><?php _e('Facility', 'vjt_theme'); ?></div>
                    <div><?php _e('Booth', 'vjt_theme'); ?></div>
                    <div><?php _e('Division', 'vjt_theme'); ?></div>
                </div>
                <ul class="vjt_event-list">
                    <?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
                        <li>
                            <div>
                                <?php the_field('event_start_date'); ?>
                                <?php if(get_field('event_end_date')) : ?> -
                                    <?php the_field('event_end_date'); ?>
                                <?php endif; ?>
                            </div>
                            <div><?php the_field('event_location'); ?></div>
                            <div><?php the_title(); ?></div>
                            <div><?php the_field('event_facility'); ?></div>
                            <div><?php the_field('event_booth'); ?></div>
                            <div><?php the_field('event_division'); ?></div>
                        </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
       <?php endif; ?>
        </div>
    </main>
    <aside>
        <div class="vjt_main-sidebar">
            <ul class="vjt_list-dropdown">
                <li class="vjt_list-dropdown-header">
                    <h2>Month <i class="fas fa-chevron-down"></i></h2>
                    <ul class="vjt_list-dropdown-child">
                        <li><a href="#">Jan</a></li>
                        <li><a href="#">Feb</a></li>
                        <li><a href="#">March</a></li>
                        <li><a href="#">April</a></li>
                        <li><a href="#">May</a></li>
                        <li><a href="#">June</a></li>
                        <li><a href="#">July</a></li>
                        <li><a href="#">August</a></li>
                        <li><a href="#">Sept</a></li>
                        <li><a href="#">Oct</a></li>
                        <li><a href="#">Nov</a></li>
                        <li><a href="#">Dec</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</div>
<?php get_footer(); ?>
