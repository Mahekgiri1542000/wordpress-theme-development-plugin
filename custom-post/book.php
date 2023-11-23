<?php
function create_books_post_type() {
    $labels = array(
        'name'               => _x( 'Books', 'post type general name', 'textdomain' ),
        'singular_name'      => _x( 'Book', 'post type singular name', 'textdomain' ),
        'menu_name'          => _x( 'Books', 'admin menu', 'textdomain' ),
        'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'textdomain' ),
        'add_new'            => _x( 'Add New', 'book', 'textdomain' ),
        'add_new_item'       => __( 'Add New Book', 'textdomain' ),
        'new_item'           => __( 'New Book', 'textdomain' ),
        'edit_item'          => __( 'Edit Book', 'textdomain' ),
        'view_item'          => __( 'View Book', 'textdomain' ),
        'all_items'          => __( 'All Books', 'textdomain' ),
        'search_items'       => __( 'Search Books', 'textdomain' ),
        'parent_item_colon'  => __( 'Parent Books:', 'textdomain' ),
        'not_found'          => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'books' ),
        'capability_type'    => 'post',
        'has_archive'       => 'books',
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author', 'comments' ),
    );

    register_post_type( 'books', $args );
}
add_action( 'init', 'create_books_post_type',0 );

function create_books_taxonomy() {
    $labels = array(
        'name'              => _x( 'Books Categories', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Books Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Books Categories', 'textdomain' ),
        'all_items'         => __( 'All Books Categories', 'textdomain' ),
        'parent_item'       => __( 'Parent Books Category', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Books Category:', 'textdomain' ),
        'edit_item'         => __( 'Edit Books Category', 'textdomain' ),
        'update_item'       => __( 'Update Books Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New Books Category', 'textdomain' ),
        'new_item_name'     => __( 'New Books Category Name', 'textdomain' ),
        'menu_name'         => __( 'Books Categories', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'books-category' ),
    );

    register_taxonomy( 'books_category', array( 'books' ), $args );
}
add_action( 'init', 'create_books_taxonomy' );