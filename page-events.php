<?php get_header(); ?>
<h1 class="vjt_page-title">
    <?php the_title(); ?> <span>VJ Group</span>
</h1>
<div class="vjt_article-archive">
    <main>
        <?php
			$eventargs = array(
				'post_type' => 'event',
				'posts_per_page' => -1
			);
        ?>
        <?php $eventloop = new WP_Query( $eventargs ); ?>
        <?php if ( $eventloop->have_posts() ): ?>
            <div class="vjt_event-list-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Show</th>
                            <th>Facility</th>
                            <th>Booth</th>
                            <th>Division</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ( $eventloop->have_posts() ) : $eventloop->the_post(); ?>
                            <tr>
                                <td><?php the_field('event_start_date'); ?><?php if(get_field('event_end_date')) : ?> - <?php the_field('event_end_date'); ?><?php endif; ?></td>
                                <td><?php the_field('event_location'); ?></td>
                                <td><?php the_title(); ?></td>
                                <td><?php the_field('event_facility'); ?></td>
                                <td><?php the_field('event_booth'); ?></td>
                                <td><?php the_field('event_division'); ?></td>
                            </tr>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </tbody>
                </table>
            </div>
       <?php endif; ?>
    </main>
    <nav>
        <ul>
            <li><a href="#">Test Link</a></li>
            <li><a href="#">Test Link</a></li>
            <li><a href="#">Test Link</a></li>
            <li><a href="#">Test Link</a></li>
            <li><a href="#">Test Link</a></li>
            <li><a href="#">Test Link</a></li>
            <li><a href="#">Test Link</a></li>
        </ul>
    </nav>
</div>
<?php get_footer(); ?>
