<?php
function create_taxonomy_theme($title="Category",$slug,$name,$post_type) {
    $labels = array(
            'name' => $title,
            'singular' => $title,
            'menu_name' => $title
    );
    $args = array(
            'labels'                     => $labels,
            'show_admin_column'          => true,
            'hierarchical'               => true,
            'public'                     => true,
            'rewrite'                    => array('slug' => $slug),
            'show_tagcloud'              => true
    );
    register_taxonomy($name,$post_type,$args);
}
//create_taxonomy_theme($title,$slug,$name,$post_type);
?>