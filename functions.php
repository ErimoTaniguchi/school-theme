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

// Make custom sizes selectable from WordPress admin.
function school_add_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'400x500' => __( '400x500', 'school-theme' ),
		'200x250' => __( '200x250', 'school-theme' ),
		'400x200' => __( '400x200', 'school-theme' ),
		'800x400' => __( '800x400', 'school-theme' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'school_add_custom_image_sizes' );

// Load custom blocks.
require get_theme_file_path() . '/school-blocks/school-blocks.php';

/**
* Custom Post Types & Custom Taxonomies
*/
require get_template_directory() . '/inc/post-types-taxonomies.php';