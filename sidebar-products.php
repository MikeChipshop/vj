<aside>
            <div class="vjt_main-sidebar">
                
                <ul class="vjt_list-dropdown">
                    <?php 
                        $custom_terms = get_terms('product-category');
                        
                        foreach($custom_terms as $custom_term) {
                            wp_reset_query();
                            $args = array('post_type' => 'product',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product-category',
                                        'field' => 'slug',
                                        'terms' => $custom_term->slug,
                                    ),
                                ),
                            );

                            $loop = new WP_Query($args);
                            if($loop->have_posts()) { ?>
                                <li class="vjt_list-dropdown-header">
                                <h2><?php echo $custom_term->name; ?> <i class="fas fa-chevron-down"></i></h2>
                            
                                <ul class="vjt_list-dropdown-child">
                            <?php
                                while($loop->have_posts()) : $loop->the_post();
                                    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                                endwhile;
                            }
                            ?></ul><?php
                        } 
                    ?>
                </ul>
            </div>
        </aside>