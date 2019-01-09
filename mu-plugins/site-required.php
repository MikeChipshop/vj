<?php
/*
 * Plugin Name: Required Site Functions
 * Description: Adds specific content functions to the VJ theme.
 * Plugin URI: https://crucibledigital.co.uk
 * Version: 1.0
 * Author: Mike @ crucibledigital.co.uk
 * Author URI: #
 * License: Private
*/

/***************************************************
/ PAGINATE
/***************************************************/

if ( ! function_exists( 'miniman_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function miniman_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&laquo;', 'yourtheme' ),
		'next_text' => __( '&raquo;', 'yourtheme' ),
		'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

/***************************************************
/ Give ACF a Boost
/***************************************************/

add_filter('acf/settings/remove_wp_meta_box', '__return_true');

/***************************************************
/ GRABBING PARENT PAGE ID
/***************************************************/

function is_tree($pid) {
	global $post;
	if(is_page()&&($post->post_parent==$pid||is_page($pid)))
    	return true;
	else
    	return false;
};

/***************************************************
/ RD Blog Tab Fix
/***************************************************/

function rd_fix_blog_tab_on_cpt($classes, $item, $args) {
  if (!is_singular('post') && !is_category() && !is_tag()) {
    $blog_page_id = intval(get_option('page_for_posts'));
    if ($blog_page_id != 0) {
      if ($item->object_id == $blog_page_id) {
        unset($classes[array_search('current_page_parent', $classes)]);
      }
    }
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'rd_fix_blog_tab_on_cpt', 10, 3);

/* Include other CPT's in above */

add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
function add_current_nav_class($classes, $item) {

	global $post;
	$current_post_type = get_post_type_object(get_post_type($post->ID));
	$current_post_type_slug = $current_post_type->rewrite['slug'];
	$menu_slug = strtolower(trim($item->url));

	if (strpos($menu_slug,$current_post_type_slug) !== false) {
	   $classes[] = 'current-menu-item';
	}

	return $classes;

}

/***************************************************
/ <p> and <br /> Fixes
/***************************************************/

function ptobr($string){
	return preg_replace("/<\/p>[^<]*<p>/", "<br /><br />", $string);
}
function stripp($string){
	return preg_replace('/(<p>|<\/p>)/i','',$string) ;
}
add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');

function prefix_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

/***************************************************
/ Remove UL's from navigation menus
/***************************************************/

function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );

/***************************************************
/ Site Navigation Menus
/***************************************************/

if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
            'main_menu' => 'Main Menu',
            'header_bar_menu' => 'Header Bar Menu',
            'footer_menu' => 'Footer Menu',
            'vjt_menu' => 'VJT Menu',
            'vje_menu' => 'VJE Menu',
            'vjx_menu' => 'VJX Menu',
            'brand_menu' => 'Brand Menu',
  		)
  	);
}

/***************************************************
/ Move YOAST to bottom
/***************************************************/

function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


/***************************************************
/ Title Tag
/***************************************************/

add_theme_support( 'title-tag' );

/***************************************************
/ Options Pages
/***************************************************/


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Contact');
	acf_add_options_page('Misc');

}

/***************************************************
/ ADD PARENT SLUG TO BODY CLASS
/***************************************************/

add_filter('body_class','body_class_section');

function body_class_section($classes) {
    global $wpdb, $post;
    if (is_page()) {
        if ($post->post_parent) {
            $parent  = end(get_post_ancestors($current_page_id));
        } else {
            $parent = $post->ID;
        }
        $post_data = get_post($parent, ARRAY_A);
        $classes[] = 'parent-' . $post_data['post_name'];
    }
    return $classes;
}

function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/***************************************************
/ Product Post Type
/***************************************************/

add_action( 'init', 'register_cpt_product' );

function register_cpt_product() {

    $labels = array(
        'name' => _x( 'Product', 'product' ),
        'singular_name' => _x( 'Product', 'product' ),
        'add_new' => _x( 'Add New', 'product' ),
        'add_new_item' => _x( 'Add New', 'product' ),
        'edit_item' => _x( 'Edit', 'product' ),
        'new_item' => _x( 'New', 'product' ),
        'view_item' => _x( 'View', 'product' ),
        'search_items' => _x( 'Search', 'product' ),
        'not_found' => _x( 'None found', 'product' ),
        'not_found_in_trash' => _x( 'None found in bin', 'product' ),
        'parent_item_colon' => _x( 'Parent:', 'product' ),
        'menu_name' => _x( 'Products', 'product' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Post type for products',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
        'taxonomies' => array('product-category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
		'menu_icon' => 'dashicons-cart',
        'capability_type' => 'post',
        'show_in_rest' => true
    );

    register_post_type( 'product', $args );
}

/***************************************************
/ Industry Post Type
/***************************************************/

add_action( 'init', 'register_cpt_industry' );

function register_cpt_industry() {

    $labels = array(
        'name' => _x( 'Industry', 'industry' ),
        'singular_name' => _x( 'Industry', 'industry' ),
        'add_new' => _x( 'Add New', 'industry' ),
        'add_new_item' => _x( 'Add New', 'industry' ),
        'edit_item' => _x( 'Edit', 'industry' ),
        'new_item' => _x( 'New', 'industry' ),
        'view_item' => _x( 'View', 'industry' ),
        'search_items' => _x( 'Search', 'industry' ),
        'not_found' => _x( 'None found', 'industry' ),
        'not_found_in_trash' => _x( 'None found in bin', 'industry' ),
        'parent_item_colon' => _x( 'Parent:', 'industry' ),
        'menu_name' => _x( 'Industries', 'industry' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Post type for industries',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
        //'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
		'menu_icon' => 'dashicons-admin-tools',
        'capability_type' => 'post',
        'show_in_rest' => true
    );

    register_post_type( 'industry', $args );
}

/***************************************************
/ Event Post Type
/***************************************************/

add_action( 'init', 'register_cpt_event' );

function register_cpt_event() {

    $labels = array(
        'name' => _x( 'Event', 'event' ),
        'singular_name' => _x( 'Event', 'event' ),
        'add_new' => _x( 'Add New', 'event' ),
        'add_new_item' => _x( 'Add New', 'event' ),
        'edit_item' => _x( 'Edit', 'event' ),
        'new_item' => _x( 'New', 'event' ),
        'view_item' => _x( 'View', 'event' ),
        'search_items' => _x( 'Search', 'event' ),
        'not_found' => _x( 'None found', 'event' ),
        'not_found_in_trash' => _x( 'None found in bin', 'event' ),
        'parent_item_colon' => _x( 'Parent:', 'event' ),
        'menu_name' => _x( 'Events', 'event' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Post type for events',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
        //'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
		'menu_icon' => 'dashicons-calendar-alt',
        'capability_type' => 'post',
        'show_in_rest' => true
    );

    register_post_type( 'event', $args );
}

/***************************************************
/ Event Post Type
/***************************************************/

add_action( 'init', 'register_cpt_newspost' );

function register_cpt_newspost() {

    $labels = array(
        'name' => _x( 'News', 'newspost' ),
        'singular_name' => _x( 'News Post', 'newspost' ),
        'add_new' => _x( 'Add New', 'newspost' ),
        'add_new_item' => _x( 'Add New', 'newspost' ),
        'edit_item' => _x( 'Edit', 'newspost' ),
        'new_item' => _x( 'New', 'newspost' ),
        'view_item' => _x( 'View', 'newspost' ),
        'search_items' => _x( 'Search', 'newspost' ),
        'not_found' => _x( 'None found', 'newspost' ),
        'not_found_in_trash' => _x( 'None found in bin', 'newspost' ),
        'parent_item_colon' => _x( 'Parent:', 'newspost' ),
        'menu_name' => _x( 'News', 'newspost' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Post type for news',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
        //'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
		'menu_icon' => 'dashicons-megaphone',
        'capability_type' => 'post',
        'show_in_rest' => true
    );

    register_post_type( 'newspost', $args );
}

/***************************************************
/ Prduct type taxonomy
/***************************************************/

function vj_productcategory_taxonomy() {
	$labels = array(
		'name' => _x( 'Product Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search' ),
		'all_items' => __( 'All Product Categories' ),
		'parent_item' => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item' => __( 'Edit Product Category' ),
		'update_item' => __( 'Update Product Category' ),
		'add_new_item' => __( 'Add New Product Category' ),
		'new_item_name' => __( 'New Product Category Name' ),
		'menu_name' => __( 'Product Categories' ),
	);

	// Now register the taxonomy
	register_taxonomy('product-category',array('product'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'show_in_nav_menus' => true
	));
}
add_action('init', 'vj_productcategory_taxonomy', 0);

function my_custom_admin_menu(){
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'my_custom_admin_menu');
