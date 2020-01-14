<?php 

//Theme supports
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
	
//Load styles & scripts	
function theme_scripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );	