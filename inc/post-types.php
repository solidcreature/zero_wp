<?php 
add_action( 'init', 'theme_register_taxonomy' );
add_action( 'init', 'theme_register_post_types' );


//Register new Taxonomy
function theme_register_taxonomy(){
	
	$labels = array(
		'name'              => 'Genres',
		'singular_name'     => 'Genre',
		'search_items'      => 'Search Genres',
		'all_items'         => 'All Genres',
		'view_item '        => 'View Genre',
		'parent_item'       => 'Parent Genre',
		'parent_item_colon' => 'Parent Genre:',
		'edit_item'         => 'Edit Genre',
		'update_item'       => 'Update Genre',
		'add_new_item'      => 'Add New Genre',
		'new_item_name'     => 'New Genre Name',
		'menu_name'         => 'Genre',
		'back_to_items'     => '← Back to Genre',	
	);
	
	$args = array (
		'label'                 => 'Genres', 
		'labels'                => $labels,
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'show_admin_column'     => true,
	);
	
	/* Additional Parameters for $args
		'publicly_queryable'    => null, 
		'show_in_nav_menus'     => true, 
		'show_ui'               => true, 
		'show_in_menu'          => true, 
		'show_tagcloud'         => true, 
		'show_in_quick_edit'    => null, 
		'query_var'             => $taxonomy,
		'_builtin'              => false,
		'update_count_callback' => '_update_post_term_count',
		'meta_box_cb'           => null,
		'show_in_rest'          => null, 
		'rest_base'             => null, 		
	*/
	
	$post_types = array('post');
	
	register_taxonomy( 'taxonomy', [ 'post' ], $args );
}


//Create new Custom Post Type
function theme_register_post_types(){

	$labels = array(
		'name'               => 'Цитаты', 
		'singular_name'      => 'Цитата', 
		'add_new'            => 'Добавить цитату', 
		'add_new_item'       => 'Добавление цитаты', 
		'edit_item'          => 'Редактирование цитаты', 
		'new_item'           => 'Новая цитата', 
		'view_item'          => 'Смотреть цитату', 
		'search_items'       => 'Искать цитату', 
		'not_found'          => 'Не найдено', 
		'not_found_in_trash' => 'Не найдено в корзине',
		'parent_item_colon'  => '',
		'menu_name'          => 'Цитаты',
	);
	
	$args = array(
		'label'               => 'Цитата',
		'labels' 		      => $labels,
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, 
		'show_in_admin_bar'   => true, 
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-format-quote', //https://developer.wordpress.org/resource/dashicons/
		'capability_type'     => 'page',
		'hierarchical'        => false,
		'supports'            => [ 'title'],
		'taxonomies'          => [],
		'has_archive'         => false,

	);
	
	/* Additional Parameters for $args
		'publicly_queryable'  => null, 
		'exclude_from_search' => null, 
		'show_ui'             => null, 
		'show_in_nav_menus'   => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'supports'            => ['title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats']
		'capability_type'   => 'post',
		'capabilities'      => 'post',
		'map_meta_cap'      => null, 
		'rewrite'             => true,
		'query_var'           => true,		
	*/
	
	register_post_type( 'quote', $args );


}