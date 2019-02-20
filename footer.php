<footer class="vjt_global-footer">
    <div class="vjt_wrap">
        <div class="vjt_footer-section vjt_footer-logo">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/vj-logo.png" alt="VJT"></a>
        </div>
        <div class="vjt_footer-section vjt_footer-social">
            <ul>
                <li>
                    <a href="<?php the_field('social_accounts_facebook_url','option'); ?>" target="_blank" rel="noreferrer noopener">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </li>
                <li>
                    <a href="<?php the_field('social_accounts_twitter_url','option'); ?>" target="_blank" rel="noreferrer noopener">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </li>
                <li>
                    <a href="<?php the_field('social_accounts_youtube_url','option'); ?>" target="_blank" rel="noreferrer noopener">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </li>
                <li>
                    <a href="<?php the_field('social_accounts_linkedin_url','option'); ?>" target="_blank" rel="noreferrer noopener">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                    </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="vjt_footer-section vjt_footer-credits">
            <p><?php the_field('footer_text','option'); ?></p>
            <p><?php _e('Site by', 'vjt_theme'); ?> <a href="http://www.cruciblecreative.co.uk/" target="_blank">Crucible Creative</a></p>
        </div>
    </div>
</footer>
<script defer src="<?php bloginfo('stylesheet_directory'); ?>/js/all.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
