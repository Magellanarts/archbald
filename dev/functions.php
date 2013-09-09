<?php

//PJAX
function getCustomPjaxTemplate() {
    if (array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']) {

        //Homepage
        if($_SERVER['REDIRECT_URL'] == '') {
            include('pjax-home.php');
        }else if((strpos($_SERVER['REDIRECT_URL'], 'upcoming-event') && substr_count($_SERVER['REDIRECT_URL'], '/')  >= 3  ) || (strpos($_SERVER['REDIRECT_URL'], 'gallery') && substr_count($_SERVER['REDIRECT_URL'], '/') >= 3  ) || (strpos($_SERVER['REDIRECT_URL'], 'news') && substr_count($_SERVER['REDIRECT_URL'], '/') >= 3  )){
            include('pjax-single.php');      
        }else if((strpos($_SERVER['REDIRECT_URL'], 'upcoming-event') && substr_count($_SERVER['REDIRECT_URL'], '/') == 2  ) || (strpos($_SERVER['REDIRECT_URL'], 'gallery') && substr_count($_SERVER['REDIRECT_URL'], '/') == 2  ) || (strpos($_SERVER['REDIRECT_URL'], 'news') && substr_count($_SERVER['REDIRECT_URL'], '/') == 2  )){
            include('pjax-archive.php');      
        }else {
            include('pjax-default.php');   
        }
        
        exit;
    }
}


add_filter('template_redirect', 'getCustomPjaxTemplate');


function load_scripts_styles() {

/* Loads our main stylesheet. */
	wp_enqueue_style( 'archbald-style', get_stylesheet_uri() );

    wp_enqueue_script(
        'enquire',
        get_stylesheet_directory_uri() . '/js/enquire.js',
        array( 'jquery' )
    );

    wp_enqueue_script(
        'pjax',
        get_stylesheet_directory_uri() . '/js/pjax.js',
        array( 'jquery' )
    );

    wp_enqueue_script(
        'cycle',
        get_stylesheet_directory_uri() . '/js/cycle.js',
        array( 'jquery' )
    );
    
    wp_enqueue_script(
        'main',
        get_stylesheet_directory_uri() . '/js/main.js',
        array( 'jquery' )
    );
    

   
}

add_action( 'wp_enqueue_scripts', 'load_scripts_styles' );


// Set up our menus
register_nav_menus( array(
    'main_nav'    => 'Main Navigation'
) );


// Create the custom post types
add_action( 'init', 'create_post_type' );
function create_post_type() {

    register_post_type( 'news',
        array(
            'labels' => array(
                'name'               => __( 'News' ),
                'singular_name'      => __( 'News' ),
                'add_new'            => __( 'Add New' ),
                'all_items'          => __( 'View All' ),
                'add_new_item'       => __( 'Add New News' ),
                'edit_item'          => __( 'Edit News' ),
                'new_item'           => __( 'New News' ),
                'view_item'          => __( 'View News' ),
                'search_items'       => __( 'Search News' ),
                'not found'          => __( 'No News found' ),
                'not found_in_trash' => __( 'No News found in Trash' )
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'news'),
            'supports'    => array('title','page-attributes')
        )
    );

    register_post_type( 'event',
        array(
            'labels' => array(
                'name'               => __( 'Events' ),
                'singular_name'      => __( 'Event' ),
                'add_new'            => __( 'Add New' ),
                'all_items'          => __( 'View All' ),
                'add_new_item'       => __( 'Add New Event' ),
                'edit_item'          => __( 'Edit Event' ),
                'new_item'           => __( 'New Event' ),
                'view_item'          => __( 'View Event' ),
                'search_items'       => __( 'Search Events' ),
                'not found'          => __( 'No Events found' ),
                'not found_in_trash' => __( 'No Events found in Trash' )
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'upcoming-event'),
            'supports'    => array('title','page-attributes')
        )
    );

    register_post_type( 'gallery',
        array(
            'labels' => array(
                'name'               => __( 'Galleries' ),
                'singular_name'      => __( 'Gallery' ),
                'add_new'            => __( 'Add New' ),
                'all_items'          => __( 'View All' ),
                'add_new_item'       => __( 'Add New Gallery' ),
                'edit_item'          => __( 'Edit Gallery' ),
                'new_item'           => __( 'New Gallery' ),
                'view_item'          => __( 'View Gallery' ),
                'search_items'       => __( 'Search Galleries' ),
                'not found'          => __( 'No Galleries found' ),
                'not found_in_trash' => __( 'No Galleries found in Trash' )
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'gallery'),
            'supports'    => array('title','page-attributes')
        )
    );

}

?>
