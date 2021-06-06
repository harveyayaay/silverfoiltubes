<?php
if (!function_exists('sytian_register_product_lists')){
  add_action( 'init', 'sytian_register_product_lists' );
  function sytian_register_product_lists() {
    $labels = array(
      "name" => __( 'Products', 'SytianTheme' ),
      "singular_name" => __( 'Product', 'SytianTheme' ),
      "add_new" => __( 'Add New Product', 'SytianTheme' ),
      "add_new_item" => __( 'Add New Product', 'SytianTheme' ),
      "edit_item" => __( 'Edit Post Product', 'SytianTheme' ),
      "new_item" => __( 'Add New Product', 'SytianTheme' ),
      "view_item" => __( 'View Post Product', 'SytianTheme' ),
      );

    $args = array(
      "label" => __( 'Products', 'SytianTheme' ),
      "labels" => $labels,
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "has_archive" => "products",
      "show_in_menu" => true,
      "exclude_from_search" => false,
      "capability_type" => "product",
      "map_meta_cap" => true,
      "rewrite" => array( "slug" => "product", "with_front" => true ),
      "query_var" => true,
      "menu_position" => 8,
      "menu_icon" => "dashicons-cart",
      "supports" => array( "title", "thumbnail", 'excerpt', 'editor' ),
    );
    register_post_type( "products", $args );
  }
}

if (!function_exists('sytian_register_product_category')){
  add_action( 'init', 'sytian_register_product_category' );
  function sytian_register_product_category() {
    $labels = array(
      "name" => __( 'Product Categories', 'SytianTheme' ),
      "singular_name" => __( 'Product Category', 'SytianTheme' ),
      );

    $args = array(
      "label" => __( 'Product Categories', 'SytianTheme' ),
      "labels" => $labels,
      "public" => true,
      "hierarchical" => true,
      "show_ui" => true,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "query_var" => true,
      "rewrite" => array( 'slug' => 'product-category', 'with_front' => true, ),
      "show_admin_column" => true,
      "show_in_rest" => false,
      "rest_base" => "",
      "show_in_quick_edit" => true,
    );
    register_taxonomy( "product-category", array( "products" ), $args );
  }
}

//add careers settings
if ( function_exists( 'acf_add_options_sub_page' ) ){
  acf_add_options_sub_page(array(
    'page_title'      => 'Product Settings',
    'parent_slug'     => 'edit.php?post_type=products'
  ));
}

//set up cpt templates
function product_lists_force_template( $template ){ 
  $pathlocation = '/modules/products';
  if( get_query_var('post_type') != '' ) :
    if( get_query_var('post_type') == 'products' ) :

      if( is_archive() ):
        $template = get_stylesheet_directory().'/'.$pathlocation.'/archive.php';
      endif;

      if( is_singular( 'products' ) ):
        $template = get_stylesheet_directory().'/'.$pathlocation.'/single.php';
      endif;
    endif;
  else :
    if( get_taxonomy( get_query_var('taxonomy') ) ) :
      if(get_taxonomy( get_query_var('taxonomy') )->object_type[0] == 'products' ) :
        
        if( is_archive() ):
          $template = get_stylesheet_directory().'/'.$pathlocation.'/archive.php';
        endif;

        if( is_singular( 'products' ) ):
          $template = get_stylesheet_directory().'/'.$pathlocation.'/single.php';
        endif;
      endif;
    endif;
  endif;
  
  return $template;
}
add_filter( 'template_include', 'product_lists_force_template' );