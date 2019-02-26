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
                    <?php $startdate = new DateTime(get_field('event_start_date')); ?>
                    <?php $loopMonth = $startdate->format('F'); ?>
                        <li class="<?php echo $loopMonth; ?>">
                            <div>
                                <span class="vjt_mobile-event-labels"><?php _e('Date', 'vjt_theme'); ?></span><span>
                                    <?php the_field('event_start_date'); ?>
                                    <?php if(get_field('event_end_date')) : ?> <br /><?php the_field('event_end_date'); ?><?php endif; ?>
                                </span>
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
            <?php $currentYear = date("Y"); ?>
            <?php
                $eventsidebarargs = array(
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
            <?php $eventsidebarloop = new WP_Query( $eventsidebarargs ); ?>
            <ul class="vjt_list-dropdown">
                <li class="vjt_list-dropdown-header">
                    <h2><?php _e('Month', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>

                    <ul class="vjt_list-dropdown-child">
                        <li><a href="<?php bloginfo('url'); ?>/events/">All</a></li>
                        <?php if ( $eventsidebarloop->have_posts() ): ?>
                            <?php $currentMonth = ""; ?>
                            <?php while ( $eventsidebarloop->have_posts() ) : $eventsidebarloop->the_post(); ?>
                            <?php $xstartdate = new DateTime(get_field('event_start_date')); ?>

                                <?php if($xstartdate->format('F') !== $currentMonth): ?>

                                    <li class="vjt_filter-month"><a href="#" data-month="<?php echo $xstartdate->format('F'); ?>"><?php echo $xstartdate->format('F'); ?></a></li>

                                <?php else: ?>

                                <?php endif; ?>

                                <?php $currentMonth = $xstartdate->format('F'); ?>
                            <?php endwhile; wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</div>
<?php get_footer(); ?>
