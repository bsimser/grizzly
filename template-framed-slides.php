<?php 
// Template Name: Home - Framed Slides
get_header(); ?>



<?php 
$image_slide_type = 'image-slide';
include(locate_template('section-slides.php'));
?>

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