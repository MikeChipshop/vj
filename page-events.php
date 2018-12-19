<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <div class="vjt_events-landing-wrap">
        <div class="vjt_news-title">
            <h1 class="vjt_page-title">
                Events <span>VJ Group</span>
            </h1>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/event-hero.png">
        </div>

        <?php
			$eventargs = array(
				'post_type' => 'event',
				'posts_per_page' => -1
			);
        ?>
        <?php $eventloop = new WP_Query( $eventargs ); ?>
        <?php if ( $eventloop->have_posts() ): ?>
            <div class="vjt_event-list-wrap">
                <div class="vjt_event-list-header">
                    <div>Date</div>
                    <div>Location</div>
                    <div>Show</div>
                    <div>Facility</div>
                    <div>Booth</div>
                    <div>Division</div>
                </div>
                <ul class="vjt_event-list">
                    <?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
                        <li>
                            <div>Feb 13 – 15, 2018<?php //the_field('event_start_date'); ?><?php //if(get_field('event_end_date')) : ?><?php //the_field('event_end_date'); ?><?php //endif; ?></div>
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
