<?php 
get_header('page'); ?>

	<section id="body" class="<?php echo theme_options('blog', 'blog_layout'); ?>">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php theme_breadcrumb(); ?>
	        	<?php get_template_part( 'loop'); ?>
	        	<?php theme_pagination(); ?>
	        </div>
	          		                
	      	<?php if( theme_options('blog', 'blog_layout') != 'full-width' ) get_sidebar(); ?>
			
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>