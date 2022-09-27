<?php get_header(); ?>
<div class="frontpage-wrapper">

<div class="frontpage-card">
	<img class="frontpage-card__photo js-photo" src="<?php theme_image('unsplash-' . random_int(1,4) . '.jpg'); ?>">
	<div class="frontpage-card__content">
		<h1 class="frontpage-card__title js-title">Hi! This is Zero WP 3.0 Theme</h1>
		<h3 class="frontpage-card__subtitle js-text">It's a good start for converting static html-layouts to fully functional WordPress website</h3>
		<button class="js-action frontpage-card__button">Click Me!</button>
	</div>
</div> 	 
	
</div>	

<?php get_footer(); ?>
