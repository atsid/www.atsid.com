<?php
/**
 * Theme Name functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, ats_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage ATS
 */

/** Tell WordPress to run ats_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'ats_setup' );

if ( ! function_exists( 'ats_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override ats_setup() in a child theme, add your own ats_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_post_type_support() To use page excerpts.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */
function ats_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	show_admin_bar(false);
	
	// This theme adds support for page excerpts
	add_post_type_support( 'page', 'excerpt' );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add support for wp_nav_menu() 
	register_nav_menus( array(
		'banner_menu' => __( 'Banner Navigation', 'ats' ),
		'primary_menu' => __( 'Primary Navigation', 'ats' ),
		'footer_menu_1' => __( 'Footer Navigation Left Column', 'ats' ),
		'footer_menu_2' => __( 'Footer Navigation Right Column', 'ats' )
	) );
	
	add_image_size( 'lg-thumb', 298, 202, true );
	add_image_size( 'small-thumb', 214, 150, true );
}

endif;




/**
 * Add custom content types
 */

add_action( 'init', 'create_post_type' );
add_action( 'init', 'load_scripts' );

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);


function create_post_type() {
	register_post_type( 'ats_testimonials',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonials' )
			),
		'public' => true,
		'menu_position' => 31,
    'publicly_queryable' => false,
    'has_archive' => false,
    'hierarchical' => true,
		'rewrite' => array('slug' => 'testimonials','with_front' => true),
		'supports' => array('title', 'editor', 'revisions')
    )
	);

	register_post_type( 'ats_globals',
		array(
			'labels' => array(
				'name' => __( 'Globals' ),
				'singular_name' => __( 'Globals' )
			),
		'public' => true,
		'menu_position' => 32,
    'publicly_queryable' => false,
    'has_archive' => false,
    'hierarchical' => true,
		'rewrite' => array('slug' => 'globals','with_front' => true),
		'supports' => array('title', 'editor', 'revisions')
    )
	);
}




/**
 * Register taxonomies for Projects post type
 */

function testimonials_taxonomy() {  
   register_taxonomy(  
    'testimonial_type',
    'ats_testimonials',
    array(  
        'hierarchical' => true,  
        'label' => 'Testimonial Types',  
        'query_var' => true,  
        'rewrite' => array('slug' => 'testimonial-type')  
    )  
  );  
}  
  
add_action( 'init', 'testimonials_taxonomy' ); 




/**
 * Disable GravityForms ajax submission anchor
 **/
 
add_filter("gform_confirmation_anchor", create_function("","return false;"));




/**
 * Load site scripts
 **/
 
function load_scripts() {
  wp_register_script('base', get_template_directory_uri() . '/js/base.js', array('jquery'), '1.0', true );  
  wp_enqueue_script('base');  

  wp_register_script('modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.0.6.min.js', array('jquery'), '1.0', true );  
  wp_enqueue_script('modernizr');  

  wp_register_script('flexslider', get_template_directory_uri()  . '/js/libs/jquery.flexslider-min.js', array('jquery'), '1.0', true );  
  wp_enqueue_script('flexslider');  
}




/**
 * Customize display of columns for testimonials post type
 */

function add_new_ats_testimonial_columns($columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Testimonial Source', 'column name');
	$new_columns['type'] = __('Testimonial Type');
	$new_columns['date'] = _x('Date', 'column name');

	return $new_columns;
}

function add_ats_testimonial_column_data( $column_name, $post_id ) {
	if( $column_name == 'type' ) {
		$_taxonomy = 'testimonial_type';
		$terms = get_the_terms( $post_id, $_taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $c )
				$out[] = "<a href='edit.php?post_type=ats_testimonials&testimonial_type=$c->slug'>" . $c->name . "</a>";
			echo join( ', ', $out );
		}
		else {
			_e('Uncategorized');
		}
	}
}

add_filter('manage_edit-ats_testimonials_columns', 'add_new_ats_testimonial_columns');
add_action( 'manage_pages_custom_column', 'add_ats_testimonial_column_data', 10, 2 );




/**
 * Add custom style dropdown to TinyMCE Editor
 */

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Attention',
    		'inline' => 'span',
    		'classes' => 'attn'
    	)
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}




/** 
 * Adds additional stylesheets to the TinyMCE editor if needed. 
 */ 

function ats_mce_css( $mce_css ) { 
    $fonts_url = get_template_directory_uri() . "/fonts.css";

    if ( empty( $fonts_url ) ) 
        return $mce_css; 

    if ( ! empty( $mce_css ) ) 
        $mce_css .= ','; 

    $mce_css .= $fonts_url;
    return $mce_css; 
} 

add_filter( 'mce_css', 'ats_mce_css' );




/**
 * Page Breadcrumbs
 */

function ats_breadcrumbs() {
	global $post;
 
  $trail = '<a title="Home" href="/home">Home</a> > ';
  $page_title = get_the_title($post->ID);
 
	if($post->post_parent) {
		$parent_id = $post->post_parent;
 
		while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a title="' . get_the_title($page->ID) . '" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> > ';
			$parent_id = $page->post_parent;
		}
 
		$breadcrumbs = array_reverse($breadcrumbs);
		$crumbCount = 1;
		foreach($breadcrumbs as $crumb) $trail .= $crumb;
		
	}
	
	if (is_home() || is_single() || is_archive()) {
	  $trail .= '<a class="active" title="In the News" href="/in-the-news">In the News</a>';
	  $trail .= '';
	}
  else {
	  $trail .= '<a class="active" title="' . get_the_title($post->ID) . '" href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a>';
	  $trail .= '';
  }
   
	return $trail;	
}




/**
 * Add Admin Icons
 */

add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-ats_testimonials .wp-menu-image {
          background: url(<?php bloginfo('template_url') ?>/images/icons/heart.png) no-repeat 6px -17px !important;
        }
      	#menu-posts-ats_testimonials:hover .wp-menu-image, #menu-posts-ats_testimonials.wp-has-current-submenu .wp-menu-image {
          background-position:6px 7px!important;
        }
    </style>
<?php }




if ( ! function_exists( 'ats_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function ats_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<!--
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'ats' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'ats' ), '<span class="edit-link">', '</span>' ); ?></p>-->
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
				  <div class="avatar">
				    <?php
              if (function_exists('get_avatar')) {
                echo get_avatar(get_comment_author_email(), 50);
              } else {
                $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(get_comment_author_email())) . "?d=" . urlencode($default) . "&s=50";
                echo "<img src='$grav_url'/>";
              }
            ?>
          </div>
					<?php
						/* translators: 1: comment author, 2: date and time */

						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'ats' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'ats' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'ats' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'ats' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for ats_comment()




/**
 * Add custom shortcodes
 */

function introduction_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );

  $content = strip($content);
  return '<div class="introduction ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'introduction', 'introduction_shortcode' );


function columns_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
		'number' => '',
	), $atts ) );
	
	$class = "number-" . $number;

  $content = strip($content);
  return '<div class="columns ' . $class . ' group">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'columns', 'columns_shortcode' );


function column_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );

  $content = strip($content);
  return '<div class="column ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'column', 'column_shortcode' );




function strip($content) {
  $array = array (
      '<p>[' => '[', 
      ']</p>' => ']', 
      ']<br />' => ']'
  );

  $content = strtr($content, $array);
  return $content;
}




/**
 * Helper function to return category ID based on category name
 *
 * @param string $cat_name Category Name
 * @return int  
 */

function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}




/**
 * Helper function to get id of topmost page ancestor to help in 
 * building page-level side navigation
 */

function get_top_ancestor_id($post_id) {
	$current = get_post($post_id);
	
	if($current->post_parent == 0) {
		return $current->ID;
	} 
	else {
		return get_top_ancestor_id($current->post_parent);
	}
};




/**
 * Helper function to get topmost page ancestor to help in 
 * building header navigation and determining which parent
 * ancestor is active
 */

function get_top_ancestor_slug($post_id) {
	$current = get_post($post_id);
	
  if (isset($post->post_parent)) {
	  if($current->post_parent == 0) {
		  return strtolower(basename(get_permalink($current->ID)));
	  } 
	  else {
		  return get_top_ancestor_slug($current->post_parent);
	  }
	}
};




/**
 * Helper function to get page names using slugs
 */

function get_name_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->post_title;
    } else {
        return null;
    }
}




/*
 *
 *  Adds a filter to append the a stylesheet to the Tiny MCE editor.
 *
 */
if ( ! function_exists('tdav_css') ) {
	function tdav_css($wp) {
		$wp .= ',' . get_bloginfo('stylesheet_directory') . '/editor-style.css';
		return $wp;
	}
}
add_filter( 'mce_css', 'tdav_css' );




/**
 * Sets the post excerpt length to a custom length
 *
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}




/**
 * Removes jump links from more
 */

function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}

add_filter('the_content_more_link', 'remove_more_jump_link');




/**
 * Replaces "[...]" (appended to automatically generated excerpts) with nothing
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @return string Empty string
 */
function ats_auto_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'ats_auto_excerpt_more' );




/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in nk's style.css.
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function ats_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'ats_remove_gallery_css' );





