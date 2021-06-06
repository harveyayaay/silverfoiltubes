<?php
// Pre tag / Var dump
function pre($var){
  echo '<pre>'.var_export( $var, true ).'</pre>';
}

// Theme image folder
function imgfolder($var){
  $link = get_stylesheet_directory_uri().'/assets/images/'.$var;
  return $link;
}

// Placeholder if no image available
function placeholder($settings = "") {
  $imageFallback = "";
  if( $settings == 'full' ) {
    if( get_field('img_placeholder', 'options') ) {
      $imageFallback = '<img class="img-fluid" src="'.get_field('img_placeholder', 'options')['url'].'?>" alt="'.get_field('img_placeholder', 'options')['title'].' ?>">';
    } else {
      $imageFallback = '<img class="img-fluid" src="https://via.placeholder.com/2000" alt="'.get_the_title().' ?>">';
    }
  } else {
    if( get_field('img_placeholder', 'options') ) {
      $imageFallback = get_field('img_placeholder', 'options')['url'];
    } else {
      $imageFallback = 'https://via.placeholder.com/2000';
    }
  }
  return $imageFallback;
}

// Clean strings / characters
function clean($string) {
  $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
  return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

// Get Tax Post Slug
function get_tax_post_slug(){
  if( is_tax() ){
    $taxObject = get_taxonomy(get_queried_object()->taxonomy);
    $typeArray = $taxObject->object_type;
    return $typeArray[0];
  }
}

// Get Blog post ID
function get_blog_post_ID(){
  return get_option( 'page_for_posts' );
}

// Get youtube id from url
// https://www.youtube.com/embed/
function get_youtube_id_from_url($url){
  if (stristr($url,'youtu.be/')){ 
    preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; 
  }
  else { 
    @preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5];
  }
}