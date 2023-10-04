<?php 

add_action( 'wp_enqueue_scripts', 'theme_ajax_scripts' );	

function theme_ajax_scripts() {
	
	//Enqueuing script for certain page template
	if ( is_page_template( 'templates/page-ajax.php' ) ) {		
		$ver = '0.01';
		$js_url = get_template_directory_uri() . '/js/';	
	
		wp_enqueue_script( 'ajax-js', $js_url . 'ajax.js', array('jquery'), $ver);
		
		//Make admin-ajax.php url available in JS file
		$ajax_url = admin_url('admin-ajax.php');
		wp_localize_script( 'ajax-js', 'ajax_url', $ajax_url);	
	}
}


//REGISTER AJAX EVENTS HOOK AND CALLBACK
add_action( 'wp_ajax_sample_ajax_action', 'sample_ajax_action_callback' );
add_action( 'wp_ajax_nopriv_sample_ajax_action', 'sample_ajax_action_callback' );

function sample_ajax_action_callback() {

	//previously saved timestamp
	$saved_time = get_option('ajax_button_pressed');
	
	//sanitize POST data, retrieving only integer
	$current_time = (int) $_POST['current_time'];
	
	//save current timestamp
	update_option('ajax_button_pressed', $current_time);
	
	//if button pressed for a first time
	if (!$saved_time) {
		 update_option('ajax_button_count', 1);
		 $message = 'Button was never pressed before';		
	}
	
	else {
		$delta = $current_time - $saved_time;
		$count = (int) get_option('ajax_button_count');
		
		//just a check, that we have stored number of clicks
		if (!$count) {
			$count = 1;
			update_option('ajax_button_count', 1);
		}
		
		//save count+1 asin Options table
		else {
			$count++;
			update_option('ajax_button_count', $count);
		}
		
		$message = 'Button was pressed ' . $count . ' times, last one ' . $delta . ' seconds ago';		
	}
	
	echo json_encode(['message' => $message]);
	wp_die();	
}