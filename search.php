<?php get_header('page'); ?>
	        			
	<section id="body" class="<?php echo theme_options('blog', 'blog_layout'); ?>">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php if( have_posts() ): ?>
		        	<?php while ( have_posts() ) : the_post(); ?>
		        		<article>
		        			<?php theme_entry_head(); ?>
		        		</article>
		        	<?php endwhile; ?>
		        <?php else: ?>
		        	<h2 class="section-title"><span><?php _e('Sorry', 'theme_front'); ?></span></h2>
		        	<?php _e('Nothing matched your search criteria. Please try again with some different keywords.', 'theme_front'); ?>
		        <?php endif; ?>
	        	<div class="clear"></div>
	        	<div class="space"></div>
	        	<?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); ?>
	        </div>
	         		                
	      	<?php if( theme_options('blog', 'blog_layout') != 'full-width' ) get_sidebar(); ?>
		
			</section><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>