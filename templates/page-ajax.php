<?php //Template Name: Ajax Powered Page ?>

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
	
.ajax-wrapper {
	width: 100%;
	height: calc(100 * var(--vh));
	background: linear-gradient(165.69deg, #00034D 10.16%, #77006B 96.17%);	
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 40px 20px;
}

.logged-in.admin-bar .ajax-wrapper {
	height: calc((100 * var(--vh)) - 32px);	
}	

.ajax-card {
	max-width: 420px;
	background: #fff;
	border-radius: 12px;
	overflow: hidden;
}

.ajax-card__content {
	padding: 12px 24px 32px 24px;
}

.ajax-card__title {
	margin: 0 0 0.3em 0;
	padding: 0;
	color: var(--c-accent);
	font-family: var(--font-main);
	font-size: var(--size-h1);
	line-height: var(--lh-h1);
}

.ajax-card__title.animate {
	animation: reveal 1 0.5s ease;
}	

.ajax-card__subtitle {
	margin: 0 0 1em 0;
	padding: 0;
	color: var(--c-secondary);	
	font-family: var(--font-secondary);
	font-size: var(--size-text);
	line-height: var(--lh-text);
}

.ajax-card__subtitle.animate {
	animation: reveal 1 0.5s ease;
}

.ajax-card__button {
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

.ajax-card__button:hover {
	background-color: var(--c-accent);	
}		
	
.ajax-message {	
	max-width: 420px;
	color: #fff;
	font-family: Arial, sans-serif;
	font-size: 13px;
	padding: 12px 0;
}	
</style>

<div class="ajax-wrapper">

	<?php if ( function_exists('sample_ajax_action_callback') ): ?>
	
		<div class="ajax-card">
			<img class="ajax-card__photo js-photo" src="<?php theme_image('unsplash-' . random_int(1,4) . '.jpg'); ?>">
			<div class="ajax-card__content">
				<h1 class="ajax-card__title js-title">AJAX Example</h1>
				<h3 class="ajax-card__subtitle js-text">Just press a button</h3>
				<button class="js-ajax ajax-card__button">Click me</button>
			</div>
		</div> 
		<div class="ajax-message"></div>
	
	<?php else: ?>

		<div class="ajax-card">
			
			<img class="ajax-card__photo js-photo" src="<?php theme_image('unsplash-' . random_int(1,4) . '.jpg'); ?>">
			<div class="ajax-card__content">
				<h1 class="ajax-card__title">Error!</h1>
				<h3 class="ajax-card__subtitle">Remove <code>//</code> in <code>functions.php</code> on line 12<br>To make AJAX template works</h3>
			</div>
				
		</div> 
	
	
	<?php endif; ?>
	
</div>	

<?php get_footer(); ?>
