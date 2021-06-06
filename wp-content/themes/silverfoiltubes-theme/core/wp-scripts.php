<?php
if( !function_exists('sytian_scripts') ) {
	function sytian_scripts(){
		wp_deregister_script( 'jquery' ); // Deregister WP Default JQuery Script

    // Enqueue Sytles
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/vendor/slick.css');
    wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/assets/css/vendor/jquery-ui.min.css');
    wp_enqueue_style('lightgallery-css', get_template_directory_uri() . '/assets/css/vendor/lightgallery.css');
    wp_enqueue_style('fontawesome-pro-css', get_template_directory_uri() . '/assets/css/vendor/fontawesome-pro.5.11.2.css');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/vendor/bootstrap.4.4.1.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
		wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css');

    // Enqueue Scripts
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-1.11.2.min.js', array(), '1.11.2', false);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.bundle.min.js', array('jquery'), '4.3.1', false);
    wp_enqueue_script('touchswipe-js', get_template_directory_uri() . '/assets/js/vendor/touchswipe.min.js', array('jquery'), '1.6.18', false);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.6.0.min.js', array(), '3.6.0', false);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/js/vendor/jquery-ui.js', array(), '1', false);
    wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/js/vendor/aos.js', array('jquery'), '1', false);
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/vendor/slick.min.js', array('jquery'), '1', false);
    wp_enqueue_script('stickySidebar-js', get_template_directory_uri() . '/assets/js/vendor/jquery.sticky-sidebar.min.js', array('jquery'), '1', false);
    wp_enqueue_script('cookie-js', get_template_directory_uri() . '/assets/js/vendor/jquery.cookie.js', array('jquery'), '1', false);
    wp_enqueue_script('lightgallery-js', get_template_directory_uri() . '/assets/js/vendor/lightgallery-all.min.js', array('jquery'), '1', false);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', '1', false);
		wp_localize_script( 'main-js', 'site_ajax_object',
      array( 
        'siteurl' => get_bloginfo('url'),
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'logouturl' => wp_logout_url( home_url() ),
      )
    );

	}
}
add_action('wp_enqueue_scripts', 'sytian_scripts');