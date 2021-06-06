<?php
if (!function_exists('sytian_register_testimonial_lists')){
  add_action( 'init', 'sytian_register_testimonial_lists' );
  function sytian_register_testimonial_lists() {
    $labels = array(
      "name" => __( 'Testimonials', 'SytianTheme' ),
      "singular_name" => __( 'Testimonial', 'SytianTheme' ),
      "add_new" => __( 'Add New Testimonial', 'SytianTheme' ),
      "add_new_item" => __( 'Add New Testimonial', 'SytianTheme' ),
      "edit_item" => __( 'Edit Post Testimonial', 'SytianTheme' ),
      "new_item" => __( 'Add New Testimonial', 'SytianTheme' ),
      "view_item" => __( 'View Post Testimonial', 'SytianTheme' ),
      );

    $args = array(
      "label" => __( 'Testimonials', 'SytianTheme' ),
      "labels" => $labels,
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "has_archive" => "testimonials",
      "show_in_menu" => true,
      "exclude_from_search" => false,
      "capability_type" => "testimonial",
      "map_meta_cap" => true,
      "rewrite" => array( "slug" => "testimonial", "with_front" => true ),
      "query_var" => true,
      "menu_position" => 8,
      "menu_icon" => "dashicons-cart",
      "supports" => array( "title", "thumbnail", 'excerpt', 'editor' ),
    );
    register_post_type( "testimonials", $args );
  }
}


//add careers settings
if ( function_exists( 'acf_add_options_sub_page' ) ){
  acf_add_options_sub_page(array(
    'page_title'      => 'Testimonial Settings',
    'parent_slug'     => 'edit.php?post_type=testimonials'
  ));
}

//set up cpt templates
function testimonial_lists_force_template( $template ){ 
  $pathlocation = '/modules/testimonials';
  if( get_query_var('post_type') != '' ) :
    if( get_query_var('post_type') == 'testimonials' ) :

      if( is_archive() ):
        $template = get_stylesheet_directory().'/'.$pathlocation.'/archive.php';
      endif;

      if( is_singular( 'testimonials' ) ):
        $template = get_stylesheet_directory().'/'.$pathlocation.'/single.php';
      endif;
    endif;
  else :
    if( get_taxonomy( get_query_var('taxonomy') ) ) :
      if(get_taxonomy( get_query_var('taxonomy') )->object_type[0] == 'testimonials' ) :
        
        if( is_archive() ):
          $template = get_stylesheet_directory().'/'.$pathlocation.'/archive.php';
        endif;

        if( is_singular( 'testimonials' ) ):
          $template = get_stylesheet_directory().'/'.$pathlocation.'/single.php';
        endif;
      endif;
    endif;
  endif;
  
  return $template;
}
add_filter( 'template_include', 'testimonial_lists_force_template' );