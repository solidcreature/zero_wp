<?php //Template Name: Single Page Application ?>

<?php get_header(); ?>

<style>
@keyframes reveal {   
  0% {     
    opacity: 0;   
  }    

  100% {
     opacity: 1; 
  }
}
	
.spa-wrapper {
	width: 100%;
	height: calc(100 * var(--vh));
	background: linear-gradient(165.69deg, #00034D 10.16%, #77006B 96.17%);	
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 40px 20px;
}

.logged-in.admin-bar .spa-wrapper {
	height: calc((100 * var(--vh)) - 32px);	
}	

.spa-card {
	max-width: 420px;
	background: #fff;
	border-radius: 12px;
	overflow: hidden;
}

.spa-card__content {
	padding: 12px 24px 32px 24px;
}

.spa-card__title {
	margin: 0 0 0.3em 0;
	padding: 0;
	color: var(--c-accent);
	font-family: var(--font-main);
	font-size: var(--size-h1);
	line-height: var(--lh-h1);
}

.spa-card__title.animate {
	animation: reveal 1 0.5s ease;
}	

.spa-card__subtitle {
	margin: 0 0 1em 0;
	padding: 0;
	color: var(--c-secondary);	
	font-family: var(--font-secondary);
	font-size: var(--size-text);
	line-height: var(--lh-text);
}

.spa-card__subtitle.animate {
	animation: reveal 1 0.5s ease;
}

.spa-card__button {
	font-family: var(--font-main);
	font-size: var(--size-text);
	font-weight: bold;
	background-color: var(--c-main);
	border: 0;
	display: flex;
	height: 42px;
	width: 160px;
	justify-content: center;
	align-items: center;
	border-radius: 4px;
	color: #fff;
	cursor: pointer;
}

.spa-card__button:hover {
	background-color: var(--c-accent);	
}			
	
.spa-message {	
	max-width: 420px;
	color: #fff;
	font-family: Arial, sans-serif;
	font-size: 13px;
	padding: 12px 0;
}		
</style>

<div class="spa-wrapper">

	<?php if ( function_exists('theme_get_spa_data') ): ?>
	
		<div class="spa-card">
			<img class="spa-card__photo js-photo" src="<?php theme_image('unsplash-' . random_int(1,4) . '.jpg'); ?>">
			<div class="spa-card__content">
				<h1 class="spa-card__title js-title">SPA Example</h1>
				<h3 class="spa-card__subtitle js-text">All Site Data is available in <code>site_data</code> variable in JS</h3>
				<button class="js-action spa-card__button">Click Me!</button>
			</div>
		</div> 	
		<div class="spa-message"></div>
	
	<?php else: ?>

		<div class="spa-card">
			
			<img class="spa-card__photo js-photo" src="<?php theme_image('unsplash-' . random_int(1,4) . '.jpg'); ?>">
			<div class="spa-card__content">
				<h1 class="spa-card__title">Error!</h1>
				<h3 class="spa-card__subtitle">Remove <code>//</code> in <code>functions.php</code> on line 11<br>To make SPA template works</h3>
			</div>
				
		</div> 
	
	
	<?php endif; ?>
	
</div>	

<?php get_footer(); ?>
