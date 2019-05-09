<?php
// Register present as  custome post type 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Presents', 'Post Type General Name', 'twentysixteen' ),
        'singular_name'       => _x( 'Present', 'Post Type Singular Name', 'twentysixteen' ),
        'menu_name'           => __( 'Presents', 'twentysixteen' ),
        'parent_item_colon'   => __( 'Parent Present', 'twentysixteen' ),
        'all_items'           => __( 'All Presents', 'twentysixteen' ),
        'view_item'           => __( 'View Present', 'twentysixteen' ),
        'add_new_item'        => __( 'Add New Present', 'twentysixteen' ),
        'add_new'             => __( 'Add New', 'twentysixteen' ),
        'edit_item'           => __( 'Edit Present', 'twentysixteen' ),
        'update_item'         => __( 'Update Present', 'twentysixteen' ),
        'search_items'        => __( 'Search Present', 'twentysixteen' ),
        'not_found'           => __( 'Not Found', 'twentysixteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentysixteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'presents', 'twentysixteen' ),
        'description'         => __( 'Present news and reviews', 'twentysixteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 25,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'present', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type' );

?>