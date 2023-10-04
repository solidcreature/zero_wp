(function($) {
   
	$(document).ready( function() {
		let current_item = 0;

		$('.js-action').click( function() {
			if (typeof site_data !== 'undefined') {
				let posts_count = site_data.length - 1;

				$('.js-title').addClass("animate");
				$('.js-title').html(site_data[current_item]['title']);
				$('.js-text').addClass("animate");
				$('.js-text').html(site_data[current_item]['content']);
				$('.js-photo').attr('src', site_data[current_item]['photo']);

				setTimeout(()=> {
					$('.js-title').removeClass("animate");
					$('.js-text').removeClass("animate");
				}, 500);

				current_item++

				if (current_item > posts_count) {
					current_item = 0;
				}	
				
				$('.spa-message').text( site_data[current_item]['post_type'] + ' ID: ' + site_data[current_item]['id'] + ' is shown');
			}

			else {
				alert('Error! Site Data is Undefined.');
			}
		});
	});
	
})( jQuery );
