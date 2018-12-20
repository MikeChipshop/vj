<?php get_header(); ?>
<div class="vjt_page-wrap">
    <div class="vjt_article-archive">
        <main>
            <div class="vjt_main-content">
                <h1 class="vjt_page-title">
                    Industries <span>VJ Group</span>
                </h1>
                <section class="vjt_product-page-content">
                    <div class="vjt_product-page-content-copy">
                    <img src="https://vjt.crucibledigital.co.uk/wp-content/themes/vjt/img/industry-placeholder.png">
                    <h1>VJ Industries</h1>
                        <div>
                            <p>VJ Technologies (VJT) is a leader in the design and construction of deployable, high-energy x-ray containment vaults for the nuclear industry.</p>
                            <p>VJT provides services and equipment dedicated to the national clean-up and remediation of low-level nuclear waste. Our services cover a variety of inspection applications, such as castings used in land-based turbine engines and nuclear plant builds.</p>
                            <p>VJT provides Mobile Lab Services for nuclear characterization. Our technology penetrates very high-density materials, including concrete and metals up to 16 inches thick. This capability facilitates the x-ray inspection validation of new-build materials and components for nuclear facilities.</p>
                            <p>VJT also provides systems and services to the nuclear industry for the characterization of low-level waste (LLW) and transuranic waste (TRU), prior to disposal.</p>
                            <p>VJT solutions use high-resolution NDE radiography techniques to inspect and characterize the composition of drum and box contents and to provide detailed images and analysis.</p>
                            <p>VJT uses its expertise in complex technology integration to provide technology-based solutions and services to the global nuclear industry. Inspection and quality checking to validate build-quality is an essential part of nuclear facility construction.</p>
                            <p>In addition to inspection services and equipment, VJT’s High Energy facility is used extensively for a wide variety of radiation exposure testing requirements. We can tightly control dose rates to replicate specific exposure levels and to achieve accumulated dose rates. This facilitates accelerated life-cycle testing of components used in environments where radiation levels are important.</p>
                            <p>VJT provides site remediation technology and equipment development services, together with the design, build and full scale, cold testing of remediation equipment and systems.</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <aside>
            <div class="vjt_main-sidebar">
                <ul class="vjt_list-dropdown">
                    <li class="vjt_list-dropdown-header">
                        <h2>Industries <i class="fas fa-chevron-down"></i></h2>
                        <ul class="vjt_list-dropdown-child">
                            <?php
                                $industryargs = array(
                                    'post_type' => 'industry',
                                    'posts_per_page' => -1
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
            </div>
        </aside>
    </div>
</div>
<?php get_footer(); ?>
