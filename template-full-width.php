<?php 
// Template Name: Page - Full Width
get_header('page'); ?>
	        			
	<section id="body" class="full-width">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php if ( have_posts() ) if ( have_posts() ) : the_post(); ?>
	        	<?php theme_breadcrumb(); ?>
	        	<?php the_content(); ?>
	        	<?php endif; ?>
	        </div>
	        
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>