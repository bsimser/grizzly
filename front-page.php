<?php 
	if( 'app' == get_post_type($post->ID) ) {
		return get_template_part('single', 'app');
		die();
	}

?>

<?php get_header(); ?>


	<?php 
	$home_type = ( isset($_GET['type'] ) ) ? $_GET['type'] : 'slide-dock';
	if( theme_options('home', 'home_feature_style') == 'imgs-slide' && $home_type != 'app-dock' ): ?>
		<?php get_template_part('section', 'slides'); ?>
	<?php else : ?>
		<?php get_template_part('section', 'apps-dock'); ?>
	<?php endif; ?>



<section id="body" class="<?php echo ( is_home() ) ? theme_options('blog', 'blog_layout') : theme_options('home', 'home_layout'); ?>">
    <div id="body-wrap" class="container">
    	<div id="body-content" class="clearfix rtf">
    	
    	<div id="main-content">
   			<?php 
	   			if( is_home() ) {
	   				theme_breadcrumb();
	   				get_template_part( 'loop');
	   				if( function_exists('wp_pagenavi') ) wp_pagenavi();
	   			} else {
	   				if( have_posts() ) the_post(); the_content();
	   			}
	   		?>
    	</div>
    	
    	<?php if( is_home() && theme_options('blog', 'blog_layout') != 'full-width' ) get_sidebar(); ?>
    	<?php if( !is_home() && theme_options('home', 'home_layout') != 'full-width' ) get_sidebar(); ?>

    	
    	</div><!-- #body-content -->
    </div><!-- #body-wrap -->
</section><!-- #body -->
            
<?php get_footer(); ?>