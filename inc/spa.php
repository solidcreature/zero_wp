<?php 

add_action( 'wp_enqueue_scripts', 'theme_spa_scripts' );	

function theme_spa_scripts() {
	
	if ( is_page_template( 'templates/page-spa.php' ) ) {
		//Enqueuing script for certain page template
		$ver = '0.01';
		$js_url = get_template_directory_uri() . '/js/';	
		wp_enqueue_script( 'spa-js', $js_url . 'spa.js', array('jquery'), $ver);
		
		//Getting site data (posts and pages information)
		$site_data = theme_get_spa_data();
		$ajax_url = admin_url('admin-ajax.php');
		
		//Make dynamic data available in spa.js
		wp_localize_script( 'spa-js', 'site_data', $site_data);
		wp_localize_script( 'spa-js', 'ajax_url', $ajax_url);	
	}
}



//GETTING SAMPLE DATA FROM POSTS AND PAGES
function theme_get_spa_data() {

	$site_data = array();
	
	//Gethering posts and pages previews in one array
	$args = array(
		'post_type' => array( 'post', 'page'),
		'posts_per_page' => 99,	
	);
	
	$query = new WP_Query( $args );
	
	//WP_Query Loop
	while ( $query->have_posts() ) {
		$query->the_post();
		global $post;
		$title = get_the_title();
		$content = get_the_excerpt();
		$photo = get_the_post_thumbnail_url($post->ID, 'large');
		if (!$photo) {
			$i = random_int(1,4);
			$photo = theme_image('unsplash-' . $i . '.jpg', false);
		}
		
		$site_data[] = array('id' => $post->ID, 'post_type' => $post->post_type, 'title' => $title, 'content' => $content, 'photo' => $photo);
	}
	
	wp_reset_postdata();
		
	return $site_data;
}