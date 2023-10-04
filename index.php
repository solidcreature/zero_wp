<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
	<img src="<?php theme_image('placeholder.png'); ?>" style="width: 320px;">
   	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
   	<div><?php the_content(); ?></div>
<?php endwhile; ?>

<?php get_footer(); ?>
