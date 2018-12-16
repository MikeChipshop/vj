<?php get_header(); ?>
<div class="vjt_article-archive">
    <main>
        <ul>
        <?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					?>
            <li>
                <div class="vjt_article-excerpt-container">
                    <h1><?php the_title(); ?></h1>
                </div>
            </li>
                <?php endwhile; ?>
                <?php endif; ?>
        </ul>
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
