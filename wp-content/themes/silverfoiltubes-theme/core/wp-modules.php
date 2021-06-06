<?php
if( !function_exists('sytian_modules_enqueue') ) {
	function sytian_modules_enqueue(){
		require_once( trailingslashit( get_stylesheet_directory() ). 'modules/products/functions.php' );
	}
}
add_action('after_setup_theme', 'sytian_modules_enqueue');