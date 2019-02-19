<aside>
        <div class="vjt_main-sidebar">
            <ul class="vjt_list-dropdown">
                <li class="vjt_list-dropdown-header">
                    <h2><?php _e('Year', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>
                    <ul class="vjt_list-dropdown-child">
                        <?php $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'newspost' ORDER BY post_date DESC"); ?>

                        <?php foreach($years as $year) : ?>
                        <li><a href="<?php bloginfo('url'); ?>/newspost/<?php echo $year; ?>"><?php echo $year; ?></a></li>

                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
