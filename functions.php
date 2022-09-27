<?php 
//THEME SUPPORTS
add_action( 'after_setup_theme', function(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
});


//THEME EXTRAS
//require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/theme-image.php';
require_once get_template_directory() . '/inc/site-data.php';


//THEME MENUS
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu() {
	register_nav_menu( 'main', 'Top Menu' );
}


//THEME STYLES & SCRIPTS
add_action( 'wp_enqueue_scripts', 'theme_styles_and_scripts' );	

function theme_styles_and_scripts() {
	$ver = '0.01';
	$css_url = get_template_directory_uri() . '/css/';
	$js_url = get_template_directory_uri() . '/js/';
	
	//Enqueue main theme style
	wp_enqueue_style( 'css-main', get_stylesheet_uri(), array(), $ver);
	
	//Enqueue additional .css files
	wp_enqueue_style( 'css-variables', $css_url . 'variables.css', array(), $ver);
	wp_enqueue_style( 'css-normalize', $css_url . 'normalize.css', array(), $ver);	

	//Enqueue .js files
	wp_enqueue_script( 'js-main', $js_url . 'main.js', array('jquery'), $ver);
	
	if ( is_home() | is_front_page() ) {
		$site_data = theme_get_site_data();
		$ajax_url = admin_url('admin-ajax.php');
		
		//Make dynamic data available for main.js
		wp_localize_script( 'js-main', 'site_data', $site_data);
		wp_localize_script( 'js-main', 'ajax_url', $ajax_url);
		
	}
}


//ENABLING / DISABLING GUTENBERG
add_filter( 'use_block_editor_for_post_type', 'theme_gutenberg_support_for_post_types', 10, 2 );

function theme_gutenberg_support_for_post_types( $use_block_editor, $post_type ){
	if ($post_type == 'post') { return true;	} else { return false; }
}




