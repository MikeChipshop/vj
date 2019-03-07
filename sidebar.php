<aside>
    <div class="vjt_main-sidebar">

    <?php if(get_field('show_wizard_sidebar')): ?>
        <div class="vjt_wizard-widget">
            <div class="vjt_wizard-widget-wrap">
                <h2>VJX Equipment Wizard</h2>
                <p>Choose 1, 2 or All Criteria</p>
                <form action="<?php bloginfo('url'); ?>/equipment-results/" method="post">
                    <div class="vjt_wizard-widget-section">
                            <h3>KV</h3>
                            <ul>
                            <?php
                                if($_POST['kv']) { $kv=$_POST['kv'];} else { $kv[]='';}
                                $termskv = get_terms( array(
                                    'taxonomy' => 'kv',
                                    'parent'   => 0,
                                    'hide_empty' => false,
                                    'orderby' => 'name',
                                    'order' => 'DESC'
                                ) );
                                if ( ! empty( $termskv ) && ! is_wp_error( $termskv ) ){
                                    foreach ( $termskv as $termkv ) {
                                        ?>
                                        <li><input type="radio" name="kv[]" value="<?php echo $termkv->slug; ?>" <?php if (in_array($termkv->slug, $kv)) { echo 'checked'; } ?> /><label for=""><?php echo $termkv->name; ?></label></li>
                                        <?php
                                    }
                                }
                            ?>


                        </ul>
                    </div>
                    <div class="vjt_wizard-widget-section">
                    <h3>Power</h3>
                    <ul>
                            <?php
                            if($_POST['power']) { $power=$_POST['power'];} else { $power[]='';}
                                $termspower = get_terms( array(
                                    'taxonomy' => 'power',
                                    'parent'   => 0,
                                    'hide_empty' => false,
                                    'orderby' => 'name',
    'order' => 'DESC'
                                ) );
                                if ( ! empty( $termspower ) && ! is_wp_error( $termspower ) ){
                                    foreach ( $termspower as $termpower ) {
                                        ?>
                                        <li><input type="radio" name="power[]" value="<?php echo $termpower->slug; ?>" <?php if (in_array($termpower->slug, $power)) { echo 'checked'; } ?> /><label for=""><?php echo $termpower->name; ?></label></li>
                                        <?php
                                    }
                                }
                            ?>


                        </ul>
                    </div>
                    <div class="vjt_wizard-widget-section">
                    <h3>Applications</h3>
                    <ul>
                            <?php
                            if($_POST['application']) { $application=$_POST['application'];} else { $application[]='';}
                                $termsapp = get_terms( array(
                                    'taxonomy' => 'application',
                                    'parent'   => 0,
                                    'hide_empty' => false,
                                    'orderby' => 'name',
    'order' => 'DESC'
                                ) );
                                if ( ! empty( $termsapp ) && ! is_wp_error( $termsapp ) ){
                                    foreach ( $termsapp as $termapp ) {
                                        ?>
                                        <li><input type="checkbox" name="application[]" value="<?php echo $termapp->slug; ?>" <?php if (in_array($termapp->slug, $application)) { echo 'checked'; } ?> /><label for=""><?php echo $termapp->name; ?></label></li>
                                        <?php
                                    }
                                }
                            ?>


                        </ul>
                    </div>
                    <div class="vjt_wizard-submit">
                        <button>Search</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

        <?php if(get_field('show_industries_sidebar')): ?>
            <?php if(get_field('show_industries_sidebar')): // Load Industries Sidebar?>
                <ul class="vjt_list-dropdown">
                    <li class="vjt_list-dropdown-header">
                        <h2><?php _e('Industries', 'vjt_theme'); ?> <i class="fas fa-chevron-down"></i></h2>
                        <ul class="vjt_list-dropdown-child">
                            <?php
                                $industryargs = array(
                                    'post_type' => 'industry',
                                    'posts_per_page' => -1,
                                    'orderby' => 'title',
                                    'order'   => 'ASC',
                                );
                            ?>
                            <?php $industryloop = new WP_Query( $industryargs ); ?>
                            <?php if ( $industryloop->have_posts() ): ?>
                                <?php while ( $industryloop->have_posts() ) : $industryloop->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                            <?php endif; wp_reset_query(); ?>
                        </ul>
                    </li>
                </ul>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Load NDT Sidebar?>
        <?php if(get_field('show_ndt_sidebar')): ?>
            <?php if( have_rows('ndt_sidebar','option') ): ?>
                <?php while ( have_rows('ndt_sidebar','option') ) : the_row(); ?>
                    <ul class="vjt_list-dropdown">
                        <li class="vjt_list-dropdown-header">
                            <h2>
                                <?php if(get_sub_field('ndt_sidebar_widget_name_link','option')): ?>
                                    <a href="<?php the_sub_field('ndt_sidebar_widget_name_link'); ?>"><?php the_sub_field('ndt_sidebar_widget_name','option'); ?></a> <i class="fas fa-chevron-down"></i>
                                <?php else: ?>
                                    <?php the_sub_field('ndt_sidebar_widget_name','option'); ?> <i class="fas fa-chevron-down"></i>
                                <?php endif; ?>
                            </h2>
                            <?php if( have_rows('ndt_sidebar_items','option') ): ?>
                                <ul class="vjt_list-dropdown-child">
                                    <?php while ( have_rows('ndt_sidebar_items','option') ) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('ndt_sidebar_link','option'); ?>"><?php the_sub_field('ndt_sidebar_label','option'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Load Products Sidebar?>
        <?php if(get_field('show_products_sidebar')): ?>
            <?php if( have_rows('product_sidebar','option') ): ?>
                <?php while ( have_rows('product_sidebar','option') ) : the_row(); ?>
                    <ul class="vjt_list-dropdown">
                        <li class="vjt_list-dropdown-header">
                            <h2>
                                <?php if(get_sub_field('product_sidebar_widget_name_link','option')): ?>
                                    <a href="<?php the_sub_field('product_sidebar_widget_name_link'); ?>"><?php the_sub_field('product_sidebar_widget_name','option'); ?></a> <i class="fas fa-chevron-down"></i>
                                <?php else: ?>
                                    <?php the_sub_field('product_sidebar_widget_name','option'); ?> <i class="fas fa-chevron-down"></i>
                                <?php endif; ?>
                            </h2>
                            <?php if( have_rows('product_sidebar_items','option') ): ?>
                                <ul class="vjt_list-dropdown-child">
                                    <?php while ( have_rows('product_sidebar_items','option') ) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('product_sidebar_link','option'); ?>"><?php the_sub_field('product_sidebar_label','option'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Load Technologies Sidebar?>
        <?php if(get_field('show_technologies_sidebar')): ?>
            <?php if( have_rows('technologies_sidebar','option') ): ?>
                <?php while ( have_rows('technologies_sidebar','option') ) : the_row(); ?>
                    <ul class="vjt_list-dropdown">
                        <li class="vjt_list-dropdown-header">
                            <h2>
                                <?php if(get_sub_field('technologies_sidebar_widget_name_link','option')): ?>
                                    <a href="<?php the_sub_field('technologies_sidebar_widget_name_link'); ?>"><?php the_sub_field('technologies_sidebar_widget_name','option'); ?></a> <i class="fas fa-chevron-down"></i>
                                <?php else: ?>
                                    <?php the_sub_field('technologies_sidebar_widget_name','option'); ?> <i class="fas fa-chevron-down"></i>
                                <?php endif; ?>
                            </h2>
                            <?php if( have_rows('technologies_sidebar_items','option') ): ?>
                                <ul class="vjt_list-dropdown-child">
                                    <?php while ( have_rows('technologies_sidebar_items','option') ) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('technologies_sidebar_link','option'); ?>"><?php the_sub_field('technologies_sidebar_label','option'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Load VJE Sidebar?>
        <?php if(get_field('show_vje_sidebar')): ?>
            <?php if( have_rows('vje_sidebar','option') ): ?>
                <?php while ( have_rows('vje_sidebar','option') ) : the_row(); ?>
                    <ul class="vjt_list-dropdown">
                        <li class="vjt_list-dropdown-header">
                            <h2>
                                <?php if(get_sub_field('vje_sidebar_widget_name_link','option')): ?>
                                    <a href="<?php the_sub_field('vje_sidebar_widget_name_link'); ?>"><?php the_sub_field('vje_sidebar_widget_name','option'); ?></a> <i class="fas fa-chevron-down"></i>
                                <?php else: ?>
                                    <?php the_sub_field('vje_sidebar_widget_name','option'); ?> <i class="fas fa-chevron-down"></i>
                                <?php endif; ?>
                            </h2>
                            <?php if( have_rows('vje_sidebar_items','option') ): ?>
                                <ul class="vjt_list-dropdown-child">
                                    <?php while ( have_rows('vje_sidebar_items','option') ) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('vje_sidebar_link','option'); ?>"><?php the_sub_field('vje_sidebar_label','option'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Load VJX Sidebar?>
        <?php if(get_field('show_vjx_sidebar')): ?>
            <?php if( have_rows('vjx_sidebar','option') ): ?>
                <?php while ( have_rows('vjx_sidebar','option') ) : the_row(); ?>
                    <ul class="vjt_list-dropdown">
                        <li class="vjt_list-dropdown-header">
                            <h2>
                                <?php if(get_sub_field('vjx_sidebar_widget_name_link','option')): ?>
                                    <a href="<?php the_sub_field('vjx_sidebar_widget_name_link'); ?>"><?php the_sub_field('vjx_sidebar_widget_name','option'); ?></a> <i class="fas fa-chevron-down"></i>
                                <?php else: ?>
                                    <?php the_sub_field('vjx_sidebar_widget_name','option'); ?> <i class="fas fa-chevron-down"></i>
                                <?php endif; ?>
                            </h2>
                            <?php if( have_rows('vjx_sidebar_items','option') ): ?>
                                <ul class="vjt_list-dropdown-child">
                                    <?php while ( have_rows('vjx_sidebar_items','option') ) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('vjx_sidebar_link','option'); ?>"><?php the_sub_field('vjx_sidebar_label','option'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php // Load Additional Sidebar ?>
        <?php if(get_field('show_additional_sidebar')): ?>
            <?php if( have_rows('additional_sidebar') ): ?>
                <?php while ( have_rows('additional_sidebar') ) : the_row(); ?>
                    <ul class="vjt_list-dropdown">
                        <li class="vjt_list-dropdown-header">
                            <h2>
                                <?php if(get_sub_field('ndt_sidebar_widget_name_link','option')): ?>
                                    <a href="<?php the_sub_field('ndt_sidebar_widget_name_link'); ?>"><?php the_sub_field('ndt_sidebar_widget_name','option'); ?></a> <i class="fas fa-chevron-down"></i>
                                <?php else: ?>
                                    <?php the_sub_field('ndt_sidebar_widget_name','option'); ?> <i class="fas fa-chevron-down"></i>
                                <?php endif; ?>
                            </h2>
                            <?php if( have_rows('ndt_sidebar_items') ): ?>
                                <ul class="vjt_list-dropdown-child">
                                    <?php while ( have_rows('ndt_sidebar_items') ) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('ndt_sidebar_item_link'); ?>"><?php the_sub_field('ndt_sidebar_item_label'); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</aside>
