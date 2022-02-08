<?php

//create a custom taxonomy name it "sport" for your posts
function apple_create_sport_custom_taxonomy() {

  $labels = array(
    'name'            => _x( 'Sports', 'taxonomy general name' ),
    'singular_name'   => _x( 'Sports Type', 'taxonomy singular name' ),
    'search_items'    =>  __( 'Search Sports' ),
    'all_items'       => __( 'All Sports' ),
    'parent_item'     => __( 'Parent Sport' ),
    'parent_item_colon' => __( 'Parent Sport:' ),
    'edit_item'       => __( 'Edit Sport' ),
    'update_item'     => __( 'Update Sport' ),
    'add_new_item'    => __( 'Add New Sport' ),
    'new_item_name'   => __( 'New Sport Name' ),
    'menu_name'       => __( 'Sports' ),
  );

  register_taxonomy('sports',array('news'), array(
    'hierarchical'        => true,
    'labels'              => $labels,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'sports' ),
    'show_in_rest'        => true,
	  'meta_box_cb'         => false,
  ));
}
add_action( 'init', 'apple_create_sport_custom_taxonomy', 0 );

/*
* Creating a function to create our CPT "News"
*/

function my_news_custom_post_type() {

// Set UI labels for Custom Post Type
$labels = array(
'name'                => _x( 'News', 'Post Type General Name', 'apple' ),
'singular_name'       => _x( 'News', 'Post Type Singular Name', 'apple' ),
'menu_name'           => __( 'News', 'apple' ),
'parent_item_colon'   => __( 'Parent News', 'apple' ),
'all_items'           => __( 'All News', 'apple' ),
'view_item'           => __( 'View News', 'apple' ),
'add_new_item'        => __( 'Add New News', 'apple' ),
'add_new'             => __( 'Add News', 'apple' ),
'edit_item'           => __( 'Edit News', 'apple' ),
'update_item'         => __( 'Update News', 'apple' ),
'search_items'        => __( 'Search News', 'apple' ),
'not_found'           => __( 'Not Found', 'apple' ),
'not_found_in_trash'  => __( 'Not found in Trash', 'apple' ),
);

// Set other options for Custom Post Type

$args = array(
'label'               => __( 'news', 'apple' ),
'description'         => __( 'text news and reviews to different themes', 'apple' ),
'labels'              => $labels,
// Features this CPT supports in Post Editor
'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','sports', ),
// You can associate this CPT with a taxonomy or custom taxonomy.
'taxonomies'          => array( 'sports' ),
/* A hierarchical CPT is like Pages and can have
* Parent and child items. A non-hierarchical CPT
* is like Posts.
*/
'menu_icon'           => 'dashicons-admin-site-alt3',
'hierarchical'        => false,
'public'              => true,
'show_ui'             => true,
'show_in_menu'        => true,
'show_in_nav_menus'   => true,
'show_in_admin_bar'   => true,
'menu_position'       => 5,
'can_export'          => true,
'has_archive'         => true,
'exclude_from_search' => false,
'publicly_queryable'  => true,
'capability_type'     => 'post',
'show_in_rest'        => true,
);

// Registering your Custom Post Type News
register_post_type( 'news', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'my_news_custom_post_type', 0 );;

function tna_edit_taxonomy_args( $args, $tax_slug, $cptui_tax_args ) {
	// Set to false for all taxonomies created with CPTUI.
	$args['meta_box_cb'] = false;
	return $args;
}
add_filter( 'cptui_pre_register_taxonomy', 'tna_edit_taxonomy_args', 10, 3 );

