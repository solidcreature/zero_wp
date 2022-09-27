<?php 

function theme_get_site_data() {

	$site_data = array();
	
	//Gethering posts and pages previews in one array
	$args = array(
		'post_type' => array( 'post', 'page'),
		'posts_per_page' => 99,	
	);
	
	$query = new WP_Query( $args );
	
	while ( $query->have_posts() ) {
		$query->the_post();
		
		$title = get_the_title();
		$content = get_the_excerpt();
		$photo = get_the_post_thumbnail_url($post->ID, 'large');
		if (!$photo) {
			$i = random_int(1,4);
			$photo = theme_image('unsplash-' . $i . '.jpg', false);
		}
		
		$site_data[] = array('title' => $title, 'content' => $content, 'photo' => $photo);
	}
	
	wp_reset_postdata();
	
	
	return $site_data;
}