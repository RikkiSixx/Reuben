<?php

/* FRAMEWORK SETUP
--------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'nomnivores_setup' );

function nomnivores_setup() {
	date_default_timezone_set('Europe/London');

	// Definitions
	define( 'THEME_SLUG', get_template() );
	define( 'THEME_LIBRARY', TEMPLATEPATH . '/library' );

	// Library files
	/*require_once( THEME_LIBRARY . '/theme-options.php');*/
	require_once( THEME_LIBRARY . '/meta-boxes.php' );

	load_theme_textdomain( 'nomnivores', get_template_directory() . '/languages' );

	// Support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Objects
	add_action( 'init', 'nomnivores_post_types_init' );
	/* add_action( 'init', 'nomnivores_taxonomies_init' ); */
	add_action( 'init', 'nomnivores_register_menus' );

	// Actions
	add_action( 'wp_enqueue_scripts', 'nomnivores_load_scripts' );
	add_action( 'comment_form_before', 'nomnivores_enqueue_comment_reply_script' );
	add_action( 'widgets_init', 'nomnivores_widgets_init' );

	// Filters
	add_filter( 'the_title', 'nomnivores_title' );
	add_filter( 'wp_title', 'nomnivores_filter_wp_title' );
	add_filter( 'get_comments_number', 'nomnivores_comments_number' );	
}


/* SETUP HELPERS
--------------------------------------------------------------------------------*/

/* THEME OBJECTS
----------------------------------------*/

// CUSTOM POST TYPES
function nomnivores_post_types_init() {
	register_post_type( 
		'review',
		array(
			'labels' => array(			
				'name' => __( 'Reviews', THEME_SLUG ),
				'singular_name' => __( 'Review', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Review', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Review', THEME_SLUG ),
				'new_item' => __( 'New Review', THEME_SLUG ),
				'view' => __( 'View Review', THEME_SLUG ),
				'view_item' => __( 'View Review', THEME_SLUG ),
				'search_items' => __( 'Search Reviews', THEME_SLUG ),
				'not_found' => __( 'No reviews found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No reviews found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Review', THEME_SLUG  )				
			),
			'description' => __( 'Reviews of restaurants, bars, food stalls/vans.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-calendar',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'comments',
				'trackbacks',
				'author',
				'revisions'
			)
		)
	);

	register_post_type( 
		'event',
		array(
			'labels' => array(			
				'name' => __( 'Events', THEME_SLUG ),
				'singular_name' => __( 'Event', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Event', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Event', THEME_SLUG ),
				'new_item' => __( 'New Event', THEME_SLUG ),
				'view' => __( 'View Event', THEME_SLUG ),
				'view_item' => __( 'View Event', THEME_SLUG ),
				'search_items' => __( 'Search Events', THEME_SLUG ),
				'not_found' => __( 'No events found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No events found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Event', THEME_SLUG  )				
			),
			'description' => __( 'Food and drink events.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-calendar',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'comments',
				'trackbacks',
				'author',
				'revisions'
			)
		)
	);

	register_post_type( 
		'location',
		array(
			'labels' => array(			
				'name' => __( 'Locations', THEME_SLUG ),
				'singular_name' => __( 'Location', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Location', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Location', THEME_SLUG ),
				'new_item' => __( 'New Location', THEME_SLUG ),
				'view' => __( 'View Location', THEME_SLUG ),
				'view_item' => __( 'View Location', THEME_SLUG ),
				'search_items' => __( 'Search Locations', THEME_SLUG ),
				'not_found' => __( 'No locations found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No locations found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Location', THEME_SLUG  )				
			),
			'description' => __( 'Places to eat, drink and hangout.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-location',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'comments',
				'trackbacks',
				'author',
				'revisions'
			)
		)
	);
}


// TAXONOMIES
/*function nomnivores_taxonomies_init() {	

	register_taxonomy(
		'example',
		array( 'post' ),
		array(
			'public' => true,
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Examples', 'seed' ),
				'singular_name' => __( 'Example', 'seed' ),
				'search_items' => __( 'Search Examples', 'seed' ),
				'popular_items' => __( 'Popular Examples', 'seed' ),
				'all_items' => __( 'All Examples', 'seed' ),
				'parent_item' => __( 'Parent Example', 'seed' ),
				'parent_item_colon' => __( 'Parent Example:', 'seed' ),
				'edit_item' => __( 'Edit Example', 'seed' ),
				'update_item' => __( 'Update Example', 'seed' ),
				'add_new_item' => __( 'Add New Example', 'seed' ),
				'new_item_name' => __( 'New Example Name', 'seed' ),
			),
			'rewrite' => true,
		)
	);
	
}*/

function nomnivores_register_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' )
		)
	);
}



/* THEME CONTENT
----------------------------------------*/

// ACTIONS
function nomnivores_load_scripts() {
	wp_enqueue_script( 'jquery' );
}

function nomnivores_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

function nomnivores_widgets_init() {
	register_sidebar( array (
	'name' => __( 'Sidebar Widget Area', 'nomnivores' ),
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
function nomnivores_custom_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}

// FILTERS
function nomnivores_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}

function nomnivores_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

function nomnivores_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

