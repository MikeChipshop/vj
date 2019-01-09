<?php get_header(); ?>
    <main>
        <div class="vjt_news-title">
            <h1 class="vjt_page-title">
                About <span>VJ Group</span>
            </h1>
        </div>

        <div class="rte">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>  
        </div>  
    </main>
<?php get_footer(); ?>
