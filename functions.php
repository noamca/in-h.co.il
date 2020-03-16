<?php
/**
 * OZD Studio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OZD_Studio
 */

if ( ! function_exists( 'ozd_studio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ozd_studio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on OZD Studio, use a find and replace
	 * to change 'ozd-studio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ozd-studio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ozd_studio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'ozd_studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ozd_studio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ozd_studio_content_width', 640 );
}
add_action( 'after_setup_theme', 'ozd_studio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

function ozd_studio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ozd-studio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ozd-studio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Woo Widgets', 'ozd-studio' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'ozd-studio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ozd_studio_widgets_init' );
 */
/**
 * Enqueue scripts and styles.
 */
function ozd_studio_scripts() {
	wp_enqueue_style( 'ozd_studio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ozd_studio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ozd_studio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ozd_studio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');
register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

/**
 * Replaces the excerpt "more" text by a link.
 */
function new_excerpt_more($more) {
    global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Change Login Logo

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/site-login-logo.png);
			height:65px;
			width:320px;
			background-size: 71px 76px;
			background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


/**
 * Add Admin Settings Page 
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'הגדרות וקישורים',
		'menu_title'	=> 'הגדרות וקישורים',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));		
}

foreach (['he', 'en'] as $lang) {

    acf_add_options_sub_page([
        'page_title' => "הגדרות $lang",
        'menu_title' => __("הגדרות $lang", 'textdomain'),
        'menu_slug' => "page-name-$lang",
        'post_id' => $lang,
        'parent' => 'theme-general-settings'
    ]);

}

function prev_post_href($post_type){
	if( ! empty(get_adjacent_post(false, '', true)) ) { 
		return get_permalink(get_adjacent_post(false, '', true));
	} else { 
		$posts_array = get_posts(array('post_type' => $post_type,'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC'));
		return get_permalink($posts_array[0]->ID);
	}
}

function next_post_href($post_type){
	if( ! empty(get_adjacent_post(false, '', false)) ) { 
		return get_permalink(get_adjacent_post(false, '', false));
	} else { 
		$posts_array = get_posts(array('post_type' => $post_type,'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'ASC'));
		return get_permalink($posts_array[0]->ID);
	}
}

/*-------------------------------------------------------------------------------
	Custom Columns
-------------------------------------------------------------------------------*/

add_filter("manage_edit-asset_columns", "my_asset_columns");
add_action('manage_posts_custom_column',  'my_show_columns');
add_filter( 'manage_edit-asset_sortable_columns', 'my_asset_columns' );

function my_asset_columns($columns)
{
	$columns['asset_author'] = __('מתווך',"ozd-studio");
	$columns['asset_id'] = __('ID',"ozd-studio");
	$columns['asset_price'] = __('מחיר',"ozd-studio");
	$columns['asset_rooms'] = __('חדרים',"ozd-studio");
	$columns['asset_sqm'] = __('שטח בנוי',"ozd-studio");
	$columns['asset_yard_sqm'] = __('שטח מגרש',"ozd-studio");

	return $columns;
}
function my_show_columns($name) {
    global $post;
	if ($name == 'asset_author'){
		echo get_the_author_meta('display_name');
	}
    switch ($name) {
        case $name:
            echo get_field($name, $post->ID);;
    }
}

/*-------------------------------------------------------------------------------
	Ajax Load Full Asset
-------------------------------------------------------------------------------*/
function my_get_posts_return() {
	global $post;

	$post_id = intval(isset($_POST['post_id']) ? $_POST['post_id'] : 0);

	if ($post_id > 0) {

		$the_query = new WP_query(array('p' => $post_id, 'post_type' => 'asset'));
		$the_query->the_post();
		get_template_part( 'template-parts/content', 'asset-full' );
	}

	wp_die();
}

add_action('wp_ajax_my_get_posts', 'my_get_posts_return'); 
add_action('wp_ajax_nopriv_my_get_posts', 'my_get_posts_return');



/*-------------------------------------------------------------------------------
	Custom Search
-------------------------------------------------------------------------------*/
// action
add_action('pre_get_posts', 'meta_pre_get_posts', 10, 1);
add_action('pre_get_posts', 'price_meta_pre_get_posts', 20, 1);
add_action('pre_get_posts', 'tax_pre_get_posts', 30, 1);

function price_meta_pre_get_posts( $query ) {
	
	// bail early if is in admin
	if( is_admin() ) return;	
	if( !is_search() ) return;
	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;	
	
	// get meta query
	$meta_query = $query->get('meta_query');
	
	$min = $_GET[ 'min' ];
	$max = $_GET[ 'max' ];

	// append meta query
	$meta_query[] = array(
		'key'		=> 'asset_price',
		'type'		=> 'NUMERIC',
		'compare'	=> 'BETWEEN',
		'value'		=> array($min,$max),
	);	
	
	$query->set('meta_query', $meta_query);

}

function meta_pre_get_posts( $query ) {
	
	// bail early if is in admin
	if( is_admin() ) return;	
	if( !is_search() ) return;
	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;	
	
	// get meta query
	$meta_query = $query->get('meta_query');
		
	// array of filters (field key => field name)
	$GLOBALS['meta_query_filters'] = array( 
		'field_1'	=> 'asset_location',
	);	
	
	// loop over filters
	foreach( $GLOBALS['meta_query_filters'] as $key => $name ) {
		
		// continue if not found in url
		if( empty($_GET[ $name ]) ) { continue;}		
		
		// get the value for this filter
		// eg: http://www.website.com/events?city=melbourne,sydney
		$value = explode(',', $_GET[ $name ]);
		
		// append meta query
    	$meta_query[] = array(
            'key'		=> $name,
            'value'		=> $value,
            'compare'	=> 'IN',
        );
        
	}
	$query->set('meta_query', $meta_query);	
}


function tax_pre_get_posts( $query ) {
	
	$GLOBALS['tax_query_filters'] = array( 
		'asset_type'	=> 'type',
		'asset_area'	=> 'area',
	);	
	
	// bail early if is in admin
	if( is_admin() ) return;	
	// bail early if not main query
	// - allows custom code / plugins to continue working
	if( !$query->is_main_query() ) return;
	
	// get tax query
	$tax_query = $query->get('tax_query');

	// loop over filters
	foreach( $GLOBALS['tax_query_filters'] as $key => $name ) {
		
		// continue if not found in url
		if( empty($_GET[ $name ]) ) { continue;}
		
		$value = $_GET[ $name ];
		
		// append tax query
		$tax_query[] = array(
			array(
				'taxonomy' => $key,
				'field' => 'id',
				'terms' => $value,
				'operator'=> 'IN'
			)
		);
        
	}
	// update tax query
	$query->set('tax_query', $tax_query );				
}