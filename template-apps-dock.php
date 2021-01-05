<?php 
// Template Name: Home - Apps Dock
get_header(); ?>


<?php get_template_part('section', 'apps-dock'); ?>

<section id="body" class="full-width">
    <div id="body-wrap" class="container">
    	<div id="body-content" class="clearfix rtf">
    	
    	<div id="main-content">
   			<?php 
	   			if( have_posts() ) the_post(); the_content();
	   		?>
    	</div>
    	
    	</div><!-- #body-content -->
    </div><!-- #body-wrap -->
</section><!-- #body -->
            
<?php get_footer(); ?>