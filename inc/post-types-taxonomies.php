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
    'menu_icon'          => 'dashicons-groups',
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'template' => array(
      // 1st block: Paragraph block for the student's short biography
      array(
        'core/paragraph', // Block name
        array(
          'placeholder' => 'Add a short biography...' // Block attributes/settings
        )
      ),
      // 2nd block: Buttons container
      array(
        'core/buttons', // Parent block
        array(),        // No special attributes for the Buttons block
        // Inner blocks inside the Buttons block
        array(
          array(
            'core/button', // Button block
            array(
              'text' => 'Portfolio' // Default button text
            )
          )
        )
      )
    ),
    'template_lock'      => 'all',
  );
  register_post_type( 'fwd-student', $args );


  // Add Student Category taxonomy
  $labels = array(
    'name'                  => _x( 'Student Categories', 'taxonomy general name', 'mindset-theme' ),
    'singular_name'         => _x( 'Student Category', 'taxonomy singular name', 'mindset-theme' ),
    'search_items'          => __( 'Search Student Categories', 'mindset-theme' ),
    'all_items'             => __( 'All Student Category', 'mindset-theme' ),
    'parent_item'           => __( 'Parent Student Category', 'mindset-theme' ),
    'parent_item_colon'     => __( 'Parent Student Category:', 'mindset-theme' ),
    'edit_item'             => __( 'Edit Student Category', 'mindset-theme' ),
    'view_item'             => __( 'View Student Category', 'mindset-theme' ),
    'update_item'           => __( 'Update Student Category', 'mindset-theme' ),
    'add_new_item'          => __( 'Add New Student Category', 'mindset-theme' ),
    'new_item_name'         => __( 'New Student Category Name', 'mindset-theme' ),
    'template_name'         => __( 'Student Category Archives', 'mindset-theme' ),
    'menu_name'             => __( 'Student Category', 'mindset-theme' ),
    'not_found'             => __( 'No Student categories found.', 'mindset-theme' ),
    'no_terms'              => __( 'No Student categories', 'mindset-theme' ),
    'items_list_navigation' => __( 'Student Categories list navigation', 'mindset-theme' ),
    'items_list'            => __( 'Student Categories list', 'mindset-theme' ),
    'item_link'             => __( 'Student Category Link', 'mindset-theme' ),
    'item_link_description' => __( 'A link to a Student category.', 'mindset-theme' ),
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
}
add_action( 'init', 'school_register_custom_post_types' );

function school_rewrite_flush() {
  school_register_custom_post_types();
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'school_rewrite_flush' );