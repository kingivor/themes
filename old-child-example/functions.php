<?php
/**
 * Reactor Child Theme Functions
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @version 1.1.0
 * @since 1.0.0
 * @copyright Copyright (c) 2013, Anthony Wilhelm
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/* -------------------------------------------------------
 You can add your custom functions below
-------------------------------------------------------- */


/**
 * Child Theme Features
 * The following function will allow you to remove features included with Reactor
 *
 * Remove the comment slashes (//) next to the functions
 * For add_theme_support, remove values from arrays to disable parts of the feature
 * remove_theme_support will disable the feature entirely
 * Reference the functions.php file in Reactor for add_theme_support functions
 */
add_action('after_setup_theme', 'reactor_child_theme_setup', 11);

function reactor_child_theme_setup() {

    /* Support for menus */
	 remove_theme_support('reactor-menus');
	// add_theme_support(
	// 	'reactor-menus',
	// 	array('top-bar-l', 'top-bar-r', 'main-menu', 'side-menu', 'footer-links')
	// );
	
	/* Support for sidebars
	Note: this doesn't change layout options */
	 remove_theme_support('reactor-sidebars');
	// add_theme_support(
	// 	'reactor-sidebars',
	// 	array('primary', 'secondary', 'front-primary', 'front-secondary', 'footer')
	// );
	
	/* Support for layouts
	Note: this doesn't remove sidebars */
	 remove_theme_support('reactor-layouts');
	// add_theme_support(
	// 	'reactor-layouts',
	// 	array('1c', '2c-l', '2c-r', '3c-l', '3c-r', '3c-c')
	// );
	
	/* Support for custom post types */
	 remove_theme_support('reactor-post-types');
	// add_theme_support(
	// 	'reactor-post-types',
	// 	array('slides', 'portfolio')
	// );
	
	/* Support for page templates */
	 remove_theme_support('reactor-page-templates');
	// add_theme_support(
	// 	'reactor-page-templates',
	// 	array('front-page', 'news-page', 'portfolio', 'contact')
	// );
	
	/* Remove support for background options in customizer */
	 remove_theme_support('reactor-backgrounds');
	
	/* Remove support for font options in customizer */
	 remove_theme_support('reactor-fonts');
	
	/* Remove support for custom login options in customizer */
	// remove_theme_support('reactor-custom-login');
	
	/* Remove support for breadcrumbs function */
	 remove_theme_support('reactor-breadcrumbs');
	
	/* Remove support for page links function */
	// remove_theme_support('reactor-page-links');
	
	/* Remove support for page meta function */
	// remove_theme_support('reactor-post-meta');
	
	/* Remove support for taxonomy subnav function */
	// remove_theme_support('reactor-taxonomy-subnav');
	
	/* Remove support for shortcodes */
	 remove_theme_support('reactor-shortcodes');
	
	/* Remove support for tumblog icons */
	 remove_theme_support('reactor-tumblog-icons');
	
	/* Remove support for other langauges */
	 remove_theme_support('reactor-translation');
		
}

//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

// Remove admin bar from front end while logged in

add_filter('show_admin_bar', '__return_false');


// Featured Image sizes
add_image_size( 'disco_200', 200, 200, true ); 


/**
 * Register our sidebars and widgetized areas.
 *
 */
function moroder_widgets_init() {

	register_sidebar( array(
		'name' => 'Facebook',
		'id' => 'facebook_widget',
		'before_widget' => '',
		'after_widget' => '',
	) );
}
add_action( 'widgets_init', 'moroder_widgets_init' );








//EVENTS
function moroder_events() {

	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Events', 'text_domain' ),
		'all_items'           => __( 'All Events', 'text_domain' ),
		'view_item'           => __( 'View Events', 'text_domain' ),
		'add_new'             => __( 'Add New Event', 'text_domain' ),
		'edit_item'           => __( 'Edit Events', 'text_domain' ),

	);
	$args = array(
		'label'               => __( 'events', 'text_domain' ),
		'description'         => __( 'Events', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', ),
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-calendar',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'events', $args );

}

// Hook into the 'init' action
add_action( 'init', 'moroder_events', 0 );



function events_meta_box() {
    $fields = array(
        array(
            'label' => 'Event Name: ',
            'desc'  => '',
            'id'    => 'events_name',
            'type'  => 'text'
        ),
		array( // jQuery UI Date input
			'label'	=> 'Date', // <label>
			'desc'	=> 'You have to pick a date. It will not show up on the page without a date.', // description
			'id'	=> 'events_date', // field id and name
			'type'	=> 'date' // type of field
		),
		array( // jQuery UI Date input
			'label'	=> 'Optional End Date', // <label>
			'desc'	=> 'ONLY USE THIS IF YOU WANT TO HAVE A RANGE OF DATES. Otherwise, LEAVE BLANK.', // description
			'id'	=> 'events_end_date', // field id and name
			'type'	=> 'date' // type of field
		),
        array(
            'label' => 'Venue: ',
            'desc'  => 'If the venue is known. Okay to leave blank.',
            'id'    => 'events_venue',
            'type'  => 'text'
        ),
        array(
            'label' => 'City/State/Country: ',
            'desc'  => '',
            'id'    => 'events_city',
            'type'  => 'text'
        ),
        array(
            'label' => 'Ticket link: ',
            'desc'  => 'Paste the full link here, starting with http://   <br>If you leave it blank, no ticket button will be shown.',
            'id'    => 'events_ticket',
            'type'  => 'text'
        ),
		
		
    );
    $new_page_meta = new Reactor_Add_Meta_Box('events_meta_box', 'Events', 'events', 'normal', 'high', $fields );
}
add_action('after_setup_theme', 'events_meta_box', 20);



//TOUR
//function moroder_tour() {
//
//	$labels = array(
//		'name'                => _x( 'Tour', 'Post Type General Name', 'text_domain' ),
//		'singular_name'       => _x( 'Tour', 'Post Type Singular Name', 'text_domain' ),
//		'menu_name'           => __( 'Tour', 'text_domain' ),
//		'all_items'           => __( 'All Tour Dates', 'text_domain' ),
//		'view_item'           => __( 'View Tour Dates', 'text_domain' ),
//		'add_new'             => __( 'Add New Tour Date', 'text_domain' ),
//		'edit_item'           => __( 'Edit Tour Date', 'text_domain' ),
//
//	);
//	$args = array(
//		'label'               => __( 'tour', 'text_domain' ),
//		'description'         => __( 'Tour', 'text_domain' ),
//		'labels'              => $labels,
//		'supports'            => array( 'title', 'editor', 'revisions', ),
//		'taxonomies'          => array( '' ),
//		'hierarchical'        => false,
//		'public'              => true,
//		'show_ui'             => true,
//		'show_in_menu'        => true,
//		'show_in_nav_menus'   => true,
//		'show_in_admin_bar'   => false,
//		'menu_position'       => 7,
//		'menu_icon'           => 'dashicons-calendar',
//		'can_export'          => true,
//		'has_archive'         => true,
//		'exclude_from_search' => false,
//		'publicly_queryable'  => true,
//		'capability_type'     => 'page',
//	);
//	register_post_type( 'tour', $args );
//
//}

// Hook into the 'init' action
//add_action( 'init', 'moroder_tour', 0 );



//function tour_meta_box() {
//    $fields = array(
//        array(
//            'label' => 'Event Name: ',
//            'desc'  => '',
//            'id'    => 'events_name',
//            'type'  => 'text'
//        ),
//		array( // jQuery UI Date input
//			'label'	=> 'Date', // <label>
//			'desc'	=> '', // description
//			'id'	=> 'events_date', // field id and name
//			'type'	=> 'date' // type of field
//		),
//        array(
//            'label' => 'Venue: ',
//            'desc'  => '',
//            'id'    => 'events_venue',
//            'type'  => 'text'
//        ),
//        array(
//            'label' => 'City/State/Country: ',
//            'desc'  => '',
//            'id'    => 'events_city',
//            'type'  => 'text'
//        ),
//        array(
//            'label' => 'Ticket link: ',
//            'desc'  => 'Paste the full link here, starting with http://',
//            'id'    => 'events_ticket',
//            'type'  => 'text'
//        ),
//		
//		
//    );
//    $new_page_meta = new Reactor_Add_Meta_Box('tour_meta_box', 'Tour', 'tour', 'normal', 'high', $fields );
//}
//add_action('after_setup_theme', 'tour_meta_box', 20);


//DJ
//function moroder_dj() {
//
//	$labels = array(
//		'name'                => _x( 'DJ Events', 'Post Type General Name', 'text_domain' ),
//		'singular_name'       => _x( 'DJ Event', 'Post Type Singular Name', 'text_domain' ),
//		'menu_name'           => __( 'DJ Events', 'text_domain' ),
//		'all_items'           => __( 'All DJ Events', 'text_domain' ),
//		'view_item'           => __( 'View DJ Events', 'text_domain' ),
//		'add_new'             => __( 'Add New DJ Event', 'text_domain' ),
//		'edit_item'           => __( 'Edit DJ Events', 'text_domain' ),
//
//	);
//	$args = array(
//		'label'               => __( 'dj', 'text_domain' ),
//		'description'         => __( 'DJ Events', 'text_domain' ),
//		'labels'              => $labels,
//		'supports'            => array( 'title', 'editor', 'revisions', ),
//		'taxonomies'          => array( '' ),
//		'hierarchical'        => false,
//		'public'              => true,
//		'show_ui'             => true,
//		'show_in_menu'        => true,
//		'show_in_nav_menus'   => true,
//		'show_in_admin_bar'   => false,
//		'menu_position'       => 7,
//		'menu_icon'           => 'dashicons-calendar',
//		'can_export'          => true,
//		'has_archive'         => true,
//		'exclude_from_search' => false,
//		'publicly_queryable'  => true,
//		'capability_type'     => 'page',
//	);
//	register_post_type( 'dj', $args );
//
//}
//
//// Hook into the 'init' action
//add_action( 'init', 'moroder_dj', 0 );
//
//
//
//function dj_meta_box() {
//    $fields = array(
//        array(
//            'label' => 'Event Name: ',
//            'desc'  => '',
//            'id'    => 'events_name',
//            'type'  => 'text'
//        ),
//		array( // jQuery UI Date input
//			'label'	=> 'Date', // <label>
//			'desc'	=> '', // description
//			'id'	=> 'events_date', // field id and name
//			'type'	=> 'date' // type of field
//		),
//        array(
//            'label' => 'Venue: ',
//            'desc'  => '',
//            'id'    => 'events_venue',
//            'type'  => 'text'
//        ),
//        array(
//            'label' => 'City/State/Country: ',
//            'desc'  => '',
//            'id'    => 'events_city',
//            'type'  => 'text'
//        ),
//        array(
//            'label' => 'Ticket link: ',
//            'desc'  => 'Paste the full link here, starting with http://',
//            'id'    => 'events_ticket',
//            'type'  => 'text'
//        ),
//		
//		
//    );
//    $new_page_meta = new Reactor_Add_Meta_Box('dj_meta_box', 'DJ Events', 'dj', 'normal', 'high', $fields );
//}
//add_action('after_setup_theme', 'dj_meta_box', 20);




//DISCOG
function discog() {

	$labels = array(
		'name'                => _x( 'Discography', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Discography', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Discography', 'text_domain' ),
		'all_items'           => __( 'All Records', 'text_domain' ),
		'view_item'           => __( 'View Record', 'text_domain' ),
		'add_new'             => __( 'Add New Record', 'text_domain' ),
		'edit_item'           => __( 'Edit Records', 'text_domain' ),

	);
	$args = array(
		'label'               => __( 'discography', 'text_domain' ),
		'description'         => __( 'Discography', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','thumbnail', 'revisions', ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 3,
		'menu_icon'           => 'dashicons-format-gallery',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'discography', $args );

}

// Hook into the 'init' action
add_action( 'init', 'discog', 0 );



function discog_meta_box() {
    $fields = array(
        array(
            'label' => 'Artist: ',
            'desc'  => '',
            'id'    => 'discog_artist',
            'type'  => 'text'
        ),
        array(
            'label' => 'Title: ',
            'desc'  => '',
            'id'    => 'discog_title',
            'type'  => 'text'
        ),
        array(
            'label' => 'Year: ',
            'desc'  => '',
            'id'    => 'discog_year',
            'type'  => 'text'
        ),
//		array( 
//			'label'	=> 'Track Listing: ', 
//			'desc'	=> '', 
//			'id'	=> 'discog_tracks', 
//			'type'	=> 'textarea' 
//		),
//		array( 
//			'label'	=> 'Album Notes: ', 
//			'desc'	=> '', 
//			'id'	=> 'discog_notes', 
//			'type'	=> 'textarea' 
//		),
		array ( // Checkbox group
			'label'	=> 'Type of Record', // <label>
			'desc'	=> '', // description
			'id'	=> 'discog_cats', // field id and name
			'type'	=> 'select', // type of field
			'options' => array ( // array of options
				'albums'   => 'Albums', 
				'singles'   => 'Singles',
				'productions' => 'Productions',
				'compilations' => 'Compilations',
				'soundtracks' => 'Soundtracks',								
				)
		),
		
		
    );
    $new_page_meta = new Reactor_Add_Meta_Box('discog_meta_box', 'Discography', 'discography', 'normal', 'high', $fields );
}
add_action('after_setup_theme', 'discog_meta_box', 20);






//MUSIC // SOUNDCLOUD
function music() {

	$labels = array(
		'name'                => _x( 'Music', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Music', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Music', 'text_domain' ),
		'all_items'           => __( 'All Songs', 'text_domain' ),
		'view_item'           => __( 'View Songs', 'text_domain' ),
		'add_new'             => __( 'Add New Song', 'text_domain' ),
		'edit_item'           => __( 'Edit Songs', 'text_domain' ),

	);
	$args = array(
		'label'               => __( 'music', 'text_domain' ),
		'description'         => __( 'Music', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title','editor', 'revisions', ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 3,
		'menu_icon'           => 'dashicons-format-audio',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'music', $args );

}

// Hook into the 'init' action
add_action( 'init', 'music', 0 );



function music_meta_box() {
    $fields = array(
        array(
            'label' => 'Artist: ',
            'desc'  => '',
            'id'    => 'music_artist',
            'type'  => 'text'
        ),
        array(
            'label' => 'Album Title: ',
            'desc'  => '',
            'id'    => 'music_album_title',
            'type'  => 'text'
        ),
        array(
            'label' => 'Song Title: ',
            'desc'  => '',
            'id'    => 'music_song_title',
            'type'  => 'text'
        ),
        array(
            'label' => 'Year: ',
            'desc'  => '',
            'id'    => 'music_year',
            'type'  => 'text'
        ),
//        array(
//            'label' => 'Soundcloud URL: ',
//            'desc'  => '',
//            'id'    => 'soundcloud_url',
//            'type'  => 'text'
//        ),
		
		
    );
    $new_page_meta = new Reactor_Add_Meta_Box('music_meta_box', 'Music', 'music', 'normal', 'high', $fields );
}
add_action('after_setup_theme', 'music_meta_box', 20);



//VIDEOS
// NO META BOX - Just using the content for embed code and Title for the title. Simple.
function moroder_video() {

	$labels = array(
		'name'                => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Videos', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Videos', 'text_domain' ),
		'all_items'           => __( 'All Videos', 'text_domain' ),
		'view_item'           => __( 'View Video', 'text_domain' ),
		'add_new'             => __( 'Add New Video', 'text_domain' ),
		'edit_item'           => __( 'Edit Videos', 'text_domain' ),

	);
	$args = array(
		'label'               => __( 'videos', 'text_domain' ),
		'description'         => __( 'Videos', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-video-alt3',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'videos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'moroder_video', 0 );


function videos_meta_box() {
    $fields = array(
        array(
            'label' => 'Artist: ',
            'desc'  => '',
            'id'    => 'music_artist',
            'type'  => 'text'
        ),
    );
    $new_page_meta = new Reactor_Add_Meta_Box('videos_meta_box', 'Videos', 'videos', 'normal', 'high', $fields );
}
add_action('after_setup_theme', 'videos_meta_box', 20);




//Splash Page post type 
// NO META BOX - Just using the featured thumbnail to change the image.
function splash() {

	$labels = array(
		'name'                => _x( 'Splash Page', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Splash Page', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Splash Page', 'text_domain' ),
		'all_items'           => __( 'All Splash Pages', 'text_domain' ),
		'view_item'           => __( 'View Splash Page', 'text_domain' ),
		'add_new'             => __( 'Add New Splash Page', 'text_domain' ),
		'edit_item'           => __( 'Edit Splash Page', 'text_domain' ),

	);
	$args = array(
		'label'               => __( 'splash', 'text_domain' ),
		'description'         => __( 'Splash Pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-id-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'splash', $args );

}

// Hook into the 'init' action
add_action( 'init', 'splash', 0 );



