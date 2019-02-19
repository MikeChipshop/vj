<?php

if ( ! function_exists( 'twentynineteen_setup' ) ) :
    function twentynineteen_setup() {

    }
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );
function twentynineteen_setup(){
	load_theme_textdomain( 'vjt_theme', get_template_directory() . '/languages' );
  }

/***************************************************
/ Add Featured Thumbs
/***************************************************/
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );


/***************************************************
/ Image Sizes
/***************************************************/

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'product-extras', 680, 380, array( 'center', 'center' )  );
    add_image_size( 'product-table', 200, 9999, false );
}

/****************************************************
ENQUEUES
*****************************************************/
function to_load_scripts() {

    wp_register_script( 'site-common', get_template_directory_uri() . '/js/site-common.js', array('jquery'),time(),true  );
    wp_register_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.min.js', array('jquery'),time(),true  );
    wp_register_script( 'scrolljack', get_template_directory_uri() . '/js/smartscroll.min.js','','',false  );
	wp_register_style( 'font-css', 'https://fonts.googleapis.com/css?family=Lato:700|PT+Sans:400,700','','', 'screen' );
    wp_register_style( 'main-css', get_template_directory_uri() . '/style.css','',time(), 'screen' );
    wp_register_style( 'lightslider-css', get_template_directory_uri() . '/css/lightslider.min.css','','', 'screen' );

    wp_enqueue_script( 'site-common' );
    wp_enqueue_script( 'lightslider' );
    wp_enqueue_script( 'scrolljack' );
	wp_enqueue_style( 'font-css' );
    wp_enqueue_style( 'main-css' );
    wp_enqueue_style( 'lightslider-css' );
}

add_action('wp_enqueue_scripts', 'to_load_scripts');


/****************************************************
EXCERPTS
*****************************************************/

function new_excerpt_more($more) {
	global $post;
	remove_filter('excerpt_more', 'new_excerpt_more');
	return '';
}
add_filter('excerpt_more','new_excerpt_more',11);

add_filter( 'excerpt_length', function($length) {
    return 10;
} );


/****************************************************
GALLERIES
*****************************************************/

/* Remove inline styles printed when the gallery shortcode is used. */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

/****************************************************
COMMENTS
*****************************************************/

if ( ! function_exists( 'twentyten_comment' ) ) :

	function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' : ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>">
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 40 ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em><br />
					<?php endif; ?>
					<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?>
					</div>
					<div class="comment-body"><?php comment_text(); ?></div>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
				</div>
		<?php break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p>
				<?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?>
			</p>
		<?php break;
			endswitch;
		?>
		<?php
	}
endif;


/****************************************************
Remove Pre-packaged 'Recent Comment' Widget Styles
*****************************************************/
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :

function twentyten_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
function twentyten_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/***************************************************
/ Remove Auto <p>
/***************************************************/

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/***************************************************
/ Comment Form
/***************************************************/

add_filter( 'get_comment_author_link', 'pb18_remove_comment_author_link', 10, 3 );
function pb18_remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}

add_filter( 'comment_form_defaults', 'rich_text_comment_form' );
function rich_text_comment_form( $args ) {
	ob_start();
	wp_editor( '', 'comment', array(
		'media_buttons' => true, // show insert/upload button(s) to users with permission
		'textarea_rows' => '10', // re-size text area
		'dfw' => false, // replace the default full screen with DFW (WordPress 3.4+)
		'tinymce' => array(
        	'theme_advanced_buttons1' => 'bold,italic,underline,strikethrough,bullist,numlist,code,blockquote,link,unlink,outdent,indent,|,undo,redo,fullscreen',
	        'theme_advanced_buttons2' => '', // 2nd row, if needed
        	'theme_advanced_buttons3' => '', // 3rd row, if needed
        	'theme_advanced_buttons4' => '' // 4th row, if needed
  	  	),
		'quicktags' => array(
 	       'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,close'
	    )
	) );
	$args['comment_field'] = ob_get_clean();
	return $args;
}

add_filter( 'comment_reply_link', '__THEME_PREFIX__comment_reply_link' );
function __THEME_PREFIX__comment_reply_link($link) {
    return str_replace( 'onclick=', 'data-onclick=', $link );
}

add_action( 'wp_head', '__THEME_PREFIX__wp_head' );
function __THEME_PREFIX__wp_head() {
?>
<script type="text/javascript">
    jQuery(function($){
        $('.comment-reply-link').click(function(e){
            e.preventDefault();
            var args = $(this).data('onclick');
            args = args.replace(/.*\(|\)/gi, '').replace(/\"|\s+/g, '');
            args = args.split(',');
            tinymce.EditorManager.execCommand('mceRemoveControl', true, 'comment');
            addComment.moveForm.apply( addComment, args );
            tinymce.EditorManager.execCommand('mceAddControl', true, 'comment');
        });
    });
</script>
<?php
}

/***************************************************
/ Options Pages
/***************************************************/

if(function_exists('acf_add_options_page')) {

    acf_add_options_page();
    acf_add_options_sub_page('Contact');
    acf_add_options_sub_page('Misc');

}

/***************************************************
/ Responsive Embeds
/***************************************************/
function vjt_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'vjt_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'vjt_embed_html' ); // Jetpack

/***************************************************
/ Add Menus to ACF
/***************************************************/
function acf_load_menu_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    //$menus = get_registered_nav_menus();  //uncomment this if you want to populate the dropdown with all Menu Locations
    $blank_list = json_encode(array( "name" => "Default Menu", "term_id" => ""));
    $blank_list = json_decode($blank_list);
    array_unshift($menus, $blank_list);
    foreach ( $menus as $val ) {
        $value = $val->term_id;
        $label = $val->name;
        $field['choices'][ $value ] = $label;
    }
    // return the field
    return $field;

 }
 add_filter('acf/load_field/name=product_menu', 'acf_load_menu_field_choices');  //replace custom_menu with your field name


 /**
 * Custom post type specific rewrite rules
 * @return wp_rewrite Rewrite rules handled by WordPress
 */
function cpt_rewrite_rules($wp_rewrite)
{
    // Here we're hardcoding the CPT in, article in this case
    $rules = cpt_generate_date_archives('newspost', $wp_rewrite);
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
    return $wp_rewrite;
}
add_action('generate_rewrite_rules', 'cpt_rewrite_rules');

/**
 * Generate date archive rewrite rules for a given custom post type
 * @param  string $cpt slug of the custom post type
 * @return rules       returns a set of rewrite rules for WordPress to handle
 */
function cpt_generate_date_archives($cpt, $wp_rewrite)
{
    $rules = array();

    $post_type = get_post_type_object($cpt);
    $slug_archive = $post_type->has_archive;
    if ($slug_archive === false) {
        return $rules;
    }
    if ($slug_archive === true) {
        // Here's my edit to the original function, let's pick up
        // custom slug from the post type object if user has
        // specified one.
        $slug_archive = $post_type->rewrite['slug'];
    }

    $dates = array(
        array(
            'rule' => "([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})",
            'vars' => array('year', 'monthnum', 'day')
        ),
        array(
            'rule' => "([0-9]{4})/([0-9]{1,2})",
            'vars' => array('year', 'monthnum')
        ),
        array(
            'rule' => "([0-9]{4})",
            'vars' => array('year')
        )
    );

    foreach ($dates as $data) {
        $query = 'index.php?post_type='.$cpt;
        $rule = $slug_archive.'/'.$data['rule'];

        $i = 1;
        foreach ($data['vars'] as $var) {
            $query.= '&'.$var.'='.$wp_rewrite->preg_index($i);
            $i++;
        }

        $rules[$rule."/?$"] = $query;
        $rules[$rule."/feed/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
        $rules[$rule."/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
        $rules[$rule."/page/([0-9]{1,})/?$"] = $query."&paged=".$wp_rewrite->preg_index($i);
    }
    return $rules;
}
