<?php 

	// Check if the current page is not blog page
	if( get_queried_object_id() == 0 )
	if( theme_options('home', 'home_type') == 'app' ) {
		global $wp_query;
		global $post;
		$wp_query = new WP_Query('post_type=app&p=' . theme_options('home', 'home_app_page') );
		$post->ID = theme_options('home', 'home_app_page');
		return get_template_part('single', 'app');
	}

?>

<?php 
get_header('page'); ?>

	<section id="body" class="<?php echo ( theme_options('blog', 'blog_layout') ) ? theme_options('blog', 'blog_layout') : 'sidebar-right'; ?>">	
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