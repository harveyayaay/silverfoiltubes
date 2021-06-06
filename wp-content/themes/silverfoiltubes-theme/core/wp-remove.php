<?php
// Remove WP Emoji
function sytian_wp_remove_emoji(){
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action( 'init', 'sytian_wp_remove_emoji' );

// Remove Unnecessary Code
function sytian_remove_unnecessary(){
  remove_all_actions('do_feed');
  remove_all_actions('do_feed_rdf');
  remove_all_actions('do_feed_rss');
  remove_all_actions('do_feed_rss2');
  remove_all_actions('do_feed_atom');
  remove_all_actions('do_feed_rss2_comments');
  remove_all_actions('do_feed_atom_comments');
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action('wp_head', 'wp_generator');
}
add_action( 'init', 'sytian_remove_unnecessary' );

// Remove rest api
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

// Disable Gutenberg Editor
add_filter('use_block_editor_for_post', '__return_false');

// // Remove Plugin Update
// add_action('after_setup_theme','remove_core_updates');
function remove_core_updates() {
     if(! current_user_can('update_core')) { return; }
     add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"), 2);
     add_filter('pre_option_update_core','__return_null');
     add_filter('pre_site_transient_update_core','__return_null');
}

//Remove S.W.ORG broken link
function remove_dns_prefetch( $hints, $relation_type ) {
  if ( 'dns-prefetch' === $relation_type ) {
    return array_diff( wp_dependencies_unique_hosts(), $hints );
  }
  return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

// Remove widgets tab
function sytian_remove_widgets( $wp_customize ) {
  $wp_customize->remove_panel( 'widgets' );
  $wp_customize->remove_section( 'custom_css' );
  $wp_customize->remove_section( 'wpseo_breadcrumbs_customizer_section' );
}
add_action( 'customize_register', 'sytian_remove_widgets' );

// Remove WP Version
function remove_wp_version_rss() {
  return'';
}
add_filter('the_generator','remove_wp_version_rss');

// Remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// Remove warning on W3C html checker
add_action('wp_loaded', 'output_buffer_start');
function output_buffer_start() {
  ob_start("output_callback");
}

add_action('shutdown', 'output_buffer_end');
function output_buffer_end() {
  if (ob_get_status())  {
    // ob started
    ob_end_flush();
  }
}

function output_callback($buffer) {
  return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}

// Remove default in admin menu post ( not required )
function sytian_remove_admin_menus() {
  remove_menu_page( 'edit-comments.php' );
  // remove_submenu_page( 'options-general.php','options-discussion.php' );
}
add_action('admin_menu', 'sytian_remove_admin_menus');

// Remove Default Panel Sections on WP Customizer
function sytian_wp_theme_settings( $wp_customize ){
  // remove default customizer
  // $wp_customize->remove_panel('widgets');
  $wp_customize->remove_section('static_front_page');
  $wp_customize->remove_section('custom_css');
}
add_action( 'customize_register', 'sytian_wp_theme_settings' );