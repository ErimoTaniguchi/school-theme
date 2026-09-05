<?php

function school_enqueues() {
  // Load normalize.css
  wp_enqueue_style(
    'school-normalize',
    'https://unpkg.com/@csstools/normalize.css',
    array(),
    '12.1.1'
  );

	// Load style.css on the front-end
	// Parameters: Unique handle, Source, Dependencies, Version number, Media
	wp_enqueue_style(
		'school-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' ),
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'school_enqueues' );


function school_setup() {
  // Load style.css in Site and Block Editor
  add_editor_style( get_stylesheet_uri() );

  // Crop images to 400px by 500px
  add_image_size( '400x500', 400, 500, true );

  // Crop images to 200px by 250px
  add_image_size( '200x250', 200, 250, true );

  // Crop images to 400px by 200px
  add_image_size( '400x200', 400, 200, true );

  // Crop images to 800px by 400px
  add_image_size( '800x400', 800, 400, true );
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'school_setup' );

function wpb_change_title_text( $title ){
  $screen = get_current_screen();

  if  ( 'fwd-student' == $screen->post_type ) {
    $title = 'Add student name';
  }

  if  ( 'fwd-staff' == $screen->post_type ) {
    $title = 'Add staff name';
  }

  return $title;
}
add_filter( 'enter_title_here', 'wpb_change_title_text' );

/**
 * Theme functions and definitions
 *
 * @package school-theme
 */


function enqueue_lightgallery_assets() {
    // if ( is_front_page() ) {

        wp_enqueue_style( 
            'lightgallery-css', 
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css', 
            array(), 
            '2.7.2' 
        );

        wp_enqueue_style( 
            'lightgallery-thumb-css', 
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-thumbnail.min.css', 
            array('lightgallery-css'), 
            '2.7.2' 
        );

        wp_enqueue_style( 
            'lightgallery-download-css', 
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-css', 
            array('lightgallery-css'), 
            '2.7.2' 
        );

        wp_enqueue_script( 
            'lightgallery-js', 
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js', 
            array(), 
            '2.7.2', 
            true 
        );

        wp_enqueue_script( 
            'lightgallery-thumb-js', 
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js', 
            array('lightgallery-js'), 
            '2.7.2', 
            true 
        );

        wp_enqueue_script( 
            'lightgallery-download-js', 
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/download/lg-download.min.js', 
            array('lightgallery-js'), 
            '2.7.2', 
            true 
        );

        wp_enqueue_script( 
            'lightgallery-init', 
            get_template_directory_uri() . '/assets/js/lightgallery-init.js', 
            array( 'lightgallery-js', 'lightgallery-thumb-js', 'lightgallery-download-js' ), 
            '1.0.0', 
            true 
        );
    // }
}
add_action( 'wp_enqueue_scripts', 'enqueue_lightgallery_assets' );