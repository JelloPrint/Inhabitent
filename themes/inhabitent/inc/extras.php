<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package inhabitent_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inhabitent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'inhabitent_body_classes' );

//This function changes the WP logo on the login page to the inhabitent logo
function inhabitent_login_logo() { ?> 
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/inhabitent-site/images/logos/inhabitent-logo-text-dark.svg);
		height:100px;
		width:320px;
		background-size: 320px 100px;
		background-repeat: no-repeat;
        }
    </style>
<?php }

add_action('login_head', 'inhabitent_logo_login');

// Change the logo's url
function inhabitent_logo_login_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'inhabitent_logo_login_url' );

function inhabitent_login_title(){
	return 'Inhabitent';
}
add_filter( 'login_headertitle', 'inhabitent_login_title' );

//Remove theme and plugin editors in this folder

// Make hero image customizable through CFS field or featured image.
 
function inhabitent_dynamic_css() {
    if ( ! is_page_template( 'page-templates/about.php' ) ) {
        return;
    }
    
    $image = CFS()->get( 'about_header_image' );
    if ( ! $image ) {
        return;
    }
    $hero_css = ".page-template-about .entry-header {
        background:
            linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
            url({$image}) no-repeat center bottom;
        background-size: cover, cover;
    }";
    wp_add_inline_style( 'tent-style', $hero_css );
}
add_action( 'wp_enqueue_scripts', 'inhabitent_dynamic_css' );


/* Replaces the excerpt "Read More" text by a link */
function new_excerpt_more($more) { 
    global $post;
 return '<div class="read-more-button"><a class="moretag" href="'. get_permalink($post->ID) . '">Read More →</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/* Changes the titles of shop and product pages */
function archive_product_title ( $title ) {
    if ( is_post_type_archive('product' ) ) {
        $title = 'Shop Stuff';
    } 
    elseif ( is_tax( 'product-type' ) ) {
        $title = single_term_title( '', false);
    }
    return $title;
}

add_filter( 'get_the_archive_title', 'archive_product_title');


/* Increase the number of posts to be shown to 16  */
function inhabitent_limit_archive_posts($query){
	if ($query->is_archive) {
        $query->set( 'posts_per_page' , 16);
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
	}
    return $query;
}
add_filter('pre_get_posts', 'inhabitent_limit_archive_posts');
