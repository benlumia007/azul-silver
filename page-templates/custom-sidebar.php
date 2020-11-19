<?php
/*
Template Name: Custom Sidebar

*/
?>    
<?php get_header(); ?>
<section id = "site-content">
	<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class = "entry-title"><?php the_title(); ?></h1>   
				<?php the_content(); ?>
				<?php comments_template(); ?>
	</article>
</section>
<?php get_sidebar('custom'); ?>
<?php get_footer(); ?>