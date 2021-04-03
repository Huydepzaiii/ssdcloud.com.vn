<?php
function create_post_type($title,$name,$slug,$support,$menu_icon = NULL){
    $labels = array(
        'name' => $title,
        'singular_name' => $title,
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit '.$title,
        'new_item' => 'New '.$title,
        'all_items' => 'All '.$title,
        'view_item' => 'View '.$title,
        'search_items' => 'Search '.$title,
        'not_found' =>  'No post found',
        'not_found_in_trash' => 'No post found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => $title
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true, 
        'show_in_menu' => true,
        'menu_icon'     => $menu_icon,
        'hierarchical' => false,
        'menu_position' => null,
        'rewrite' => array( 'slug' =>$slug),
        'supports' => $support
    ); 
    register_post_type($name, $args );
}
//create_post_type("title","name","slug",array( 'title','editor','thumbnail'));
//https://developer.wordpress.org/resource/dashicons/#groups
?>