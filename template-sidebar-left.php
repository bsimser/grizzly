<?php 
// Disable Template Name: Page - Sidebar Left
get_header('page'); ?>
	        			
	<section id="body" class="sidebar-left">	
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php if ( have_posts() ) if ( have_posts() ) : the_post(); ?>
	        	<?php theme_breadcrumb(); ?>
	        	<?php the_content(); ?>
	        	<?php endif; ?>
	        </div>
	          		                
	      	<?php get_sidebar(); ?>
			
			</div><!-- #body-content -->
	    </div><!-- #body-content -->
	</section><!-- #body -->
			
<?php get_footer(); ?>