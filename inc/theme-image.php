<?php 

//Utility function for static images inside theme
function theme_image($image_name = 'placeholder.png', $print = true, $dir = '/img/') {
	$image_path = get_template_directory() . $dir . $image_name;
	$image_url = get_template_directory_uri() . $dir . $image_name;
	
	//If  got wrong URL -- show error placeholder instead
	if ( !file_exists($image_path) ) $image_url = get_template_directory_uri() . '/img/error.png';
	
	if ($print) {
		echo $image_url;
	}
	
	else {
		return $image_url;
	}
}