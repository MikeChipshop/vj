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
                'meta_key' => 'event_start_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
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
                                <span class="vjt_mobile-event-labels"><?php _e('Date', 'vjt_theme'); ?></span><span>
                                <?php the_field('event_start_date'); ?>
                                <?php if(get_field('event_end_date')) : ?> <br /><?php the_field('event_end_date'); ?><?php endif; ?>
                                <?php
                                    // Start date
                                    $startdate = get_field('event_start_date');
                                    //echo "Start Date: " . $startdate;

                                    // Start Month
                                    $xstartdate = new DateTime(get_field('event_start_date'));
                                    echo "Month: " . $xstartdate->format('F');
                                    echo "Year: " . $xstartdate->format('Y');


                                ?></span>
                            </div>
                            <div><span class="vjt_mobile-event-labels"><?php _e('Location', 'vjt_theme'); ?></span><span><?php the_field('event_location'); ?></span></div>
                            <div><span class="vjt_mobile-event-labels"><?php _e('Show', 'vjt_theme'); ?></span><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></div>
                            <div><span class="vjt_mobile-event-labels"><?php _e('Facility', 'vjt_theme'); ?></span><span><?php the_field('event_facility'); ?></span></div>
                            <div><span class="vjt_mobile-event-labels"><?php _e('Booth', 'vjt_theme'); ?></span><span><?php the_field('event_booth'); ?></span></div>
                            <div><span class="vjt_mobile-event-labels"><?php _e('Division', 'vjt_theme'); ?></span><span><?php the_field('event_division'); ?></span></div>
                        </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </div>
       <?php endif; ?>
        </div>
    </main>
    <aside>
        <div class="vjt_main-sidebar">
            <?php $currentdate = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y"))); ?>
                <?php
                    $eventargs2 = array(
                        'post_type' => 'event',
                        'posts_per_page' => -1,
                        'meta_key' => 'event_start_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
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
                <?php $eventloop2 = new WP_Query( $eventargs2 ); ?>
                <?php if ( $eventloop2->have_posts() ): ?>
                    <?php while ( $eventloop2->have_posts() ) : $eventloop2->the_post(); ?>

                        <ul class="vjt_list-dropdown">

                            <?php $xstartdate = new DateTime(get_field('event_start_date')); ?>
                            <?php if($xstartdate->format('Y') !== $currentYear): ?>
                                Not equal to current year
                                <!--  Load Year Header -->
                                <li class="vjt_list-dropdown-header">
                                    <h2><?php echo $xstartdate->format('Y'); ?> <i class="fas fa-chevron-down"></i></h2>

                                    <!-- Load Children -->
                                    <ul class="vjt_list-dropdown-child">
                                        <?php $currentMonth = $xstartdate->format('F'); ?>
                                        <?php if($xstartdate->format('F') !== $currentMonth): ?>
                                            
                                            <li>Start New Month (<?php echo $xstartdate->format('F'); ?>): <a href="#" data-month="<?php echo $xstartdate->format('F'); ?>"><?php echo $xstartdate->format('F'); ?></a></li>

                                            <?php $currentMonth = $xstartdate->format('F'); ?>

                                        <?php endif; ?>
                                        

                                    </ul>
                                <?php $currentYear = $xstartdate->format('Y'); ?>

                            <?php else: ?>
                                <ul class="vjt_list-dropdown-child">

                                    <?php if($xstartdate->format('F') !== $currentMonth): ?>

                                        <li><a href="#" data-month="<?php echo $xstartdate->format('F'); ?>"><?php echo $xstartdate->format('F'); ?></a></li>

                                        <?php $currentMonth = $xstartdate->format('F'); ?>

                                    <?php endif; ?>

                                </ul>
                            <?php endif; ?>
                            </li>

                        </ul>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php endif; ?>
        </div>
    </aside>
</div>
<?php get_footer(); ?>
