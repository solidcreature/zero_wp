(function($) {
   $(document).ready( function() {
	$('.js-ajax').click( function() {
		
		let current_time = Math.floor(Date.now() / 1000);

		$.ajax( { type:"post", url:ajax_url, dataType:"json", data:{ action:'sample_ajax_action', current_time:current_time }
		}).always( function( out ){
			console.log(out);
			$( ".ajax-message" ).text( out.message );
		});
		return false;
		
	});
  });	
})( jQuery );
