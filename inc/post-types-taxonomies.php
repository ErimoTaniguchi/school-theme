<?php

function school_register_custom_post_types() {
  // Register Students post type
  $labels = array(
    'name'                     => _x( 'Students', 'post type general name', 'school-theme' ),
    'singular_name'            => _x( 'Student', 'post type singular name', 'school-theme' ),
    'menu_name'                => _x( 'Students', 'admin menu', 'school-theme' ),
    'add_new'                  => _x( 'Add New', 'student', 'school-theme' ),
    'add_new_item'             => __( 'Add New Student', 'school-theme' ),
    'new_item'                 => __( 'New Student', 'school-theme' ),
    'edit_item'                => __( 'Edit Student', 'school-theme' ),
    'view_item'                => __( 'View Student', 'school-theme' ),
    'all_items'                => __( 'All Students', 'school-theme' ),
    'search_items'             => __( 'Search Students', 'school-theme' ),
    'not_found'                => __( 'No Students found.', 'school-theme' ),
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'show_in_rest'       => true,
    'rewrite'            => array( 'slug' => 'students' ),
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'template' => array(
      array( 'core/paragraph', array( 'placeholder' => 'Add a short biography...' ) ),
      array( 'core/buttons', array(), array( array( 'core/button', array( 'text' => 'See My Portfolio' ) ) ))
    ),
    'template_lock'      => 'all',
  );
  register_post_type( 'fwd-student', $args );

  // Add Student Category taxonomy
  $labels = array(
    'name'                  => _x( 'Student Categories', 'taxonomy general name', 'school-theme' ),
    'singular_name'         => _x( 'Student Category', 'taxonomy singular name', 'school-theme' ),
    'search_items'          => __( 'Search Student Categories', 'school-theme' ),
    'all_items'             => __( 'All Student Category', 'school-theme' ),
    'parent_item'           => __( 'Parent Student Category', 'school-theme' ),
    'parent_item_colon'     => __( 'Parent Student Category:', 'school-theme' ),
    'edit_item'             => __( 'Edit Student Category', 'school-theme' ),
    'view_item'             => __( 'View Student Category', 'school-theme' ),
    'update_item'           => __( 'Update Student Category', 'school-theme' ),
    'add_new_item'          => __( 'Add New Student Category', 'school-theme' ),
    'new_item_name'         => __( 'New Student Category Name', 'school-theme' ),
    'template_name'         => __( 'Student Category Archives', 'school-theme' ),
    'menu_name'             => __( 'Student Category', 'school-theme' ),
    'not_found'             => __( 'No Student categories found.', 'school-theme' ),
    'no_terms'              => __( 'No Student categories', 'school-theme' ),
    'items_list_navigation' => __( 'Student Categories list navigation', 'school-theme' ),
    'items_list'            => __( 'Student Categories list', 'school-theme' ),
    'item_link'             => __( 'Student Category Link', 'school-theme' ),
    'item_link_description' => __( 'A link to a Student category.', 'school-theme' ),
  );
  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'hierarchical'      => true,
    'rewrite'           => array( 'slug' => 'student-categories' ),
  );
  register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );

  // Register Staff post type
  $labels = array(
    'name'                     => _x( 'Staff', 'post type general name', 'school-theme' ),
    'singular_name'            => _x( 'Staff Member', 'post type singular name', 'school-theme' ),
    'menu_name'                => _x( 'Staff', 'admin menu', 'school-theme' ),
    'add_new'                  => _x( 'Add New', 'staff member', 'school-theme' ),
    'add_new_item'             => __( 'Add New Staff Member', 'school-theme' ),
    'new_item'                 => __( 'New Staff Member', 'school-theme' ),
    'edit_item'                => __( 'Edit Staff Member', 'school-theme' ),
    'view_item'                => __( 'View Staff Member', 'school-theme' ),
    'all_items'                => __( 'All Staff', 'school-theme' ),
    'search_items'             => __( 'Search Staff', 'school-theme' ),
    'not_found'                => __( 'No Staff found.', 'school-theme' ),
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'show_in_rest'       => true,
    'rewrite'            => array( 'slug' => 'staff-members' ),
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-businessperson',
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'template' => array(
      array( 'core/paragraph', array( 'content' => '<em>Job Title</em>' ) ),
      array( 'core/paragraph', array( 'placeholder' => 'Add email address...' ) )
    ),
    'template_lock'      => 'all',
  );
  register_post_type( 'fwd-staff', $args );

  // Add Staff Category taxonomy
  $labels = array(
    'name'                  => _x( 'Staff Categories', 'taxonomy general name', 'school-theme' ),
    'singular_name'         => _x( 'Staff Category', 'taxonomy singular name', 'school-theme' ),
    'search_items'          => __( 'Search Staff Categories', 'school-theme' ),
    'all_items'             => __( 'All Staff Category', 'school-theme' ),
    'parent_item'           => __( 'Parent Staff Category', 'school-theme' ),
    'parent_item_colon'     => __( 'Parent Staff Category:', 'school-theme' ),
    'edit_item'             => __( 'Edit Staff Category', 'school-theme' ),
    'view_item'             => __( 'View Staff Category', 'school-theme' ),
    'update_item'           => __( 'Update Staff Category', 'school-theme' ),
    'add_new_item'          => __( 'Add New Staff Category', 'school-theme' ),
    'new_item_name'         => __( 'New Staff Category Name', 'school-theme' ),
    'template_name'         => __( 'Staff Category Archives', 'school-theme' ),
    'menu_name'             => __( 'Staff Category', 'school-theme' ),
    'not_found'             => __( 'No Staff categories found.', 'school-theme' ),
    'no_terms'              => __( 'No Staff categories', 'school-theme' ),
    'items_list_navigation' => __( 'Staff Categories list navigation', 'school-theme' ),
    'items_list'            => __( 'Staff Categories list', 'school-theme' ),
    'item_link'             => __( 'Staff Category Link', 'school-theme' ),
    'item_link_description' => __( 'A link to a Staff category.', 'school-theme' ),
  );
  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'hierarchical'      => true,
    'rewrite'           => array( 'slug' => 'staff-categories' ),
    'capabilities' => array(
      'manage_terms' => 'manage_categories',
      'edit_terms' => 'manage_categories',
      'delete_terms' => 'manage_categories',
      'assign_terms' => 'edit_posts',
    ),
  );
  register_taxonomy( 'fwd-staff-category', array( 'fwd-staff' ), $args );
}
add_action( 'init', 'school_register_custom_post_types' );

function school_rewrite_flush() {
  school_register_custom_post_types();
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'school_rewrite_flush' );