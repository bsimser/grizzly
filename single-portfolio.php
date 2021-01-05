<?php
	get_header();
	the_post();
	
	// Get "App Info" Meta	
	$portfolio_category = wp_get_post_terms($post->ID, 'portfolio_category', array("fields" => "names"));
	
	$info_short_desc = get_post_meta($post->ID, 'info_short_desc', true);
	$info_customer = get_post_meta($post->ID, 'info_customer', true);
	$info_budget = get_post_meta($post->ID, 'info_budget', true);
	$info_create_date = get_post_meta($post->ID, 'info_create_date', true);
	
	// Get "Frame Appearance"
	$appearance_effect = get_post_meta($post->ID, 'appearance_effect', true);
	$appearance_retina_image = get_post_meta($post->ID, 'appearance_retina_image', true);
	$appearance_video_id = get_post_meta($post->ID, 'appearance_video_id', true);
	$appearance_slide_images = get_post_meta($post->ID, 'appearance_slide_images', true);
	$appearance_frame_border_color = get_post_meta($post->ID, 'appearance_frame_border_color', true);
	$appearance_background_override = get_post_meta($post->ID, 'appearance_background_override', true);
	$appearance_site_bg_pattern = get_post_meta($post->ID, 'appearance_site_bg_pattern', true);
	$appearance_site_bg_image = get_post_meta($post->ID, 'appearance_site_bg_image', true);
	$appearance_site_bg_repeat = get_post_meta($post->ID, 'appearance_site_bg_repeat', true);
	$appearance_site_bg_position = get_post_meta($post->ID, 'appearance_site_bg_position', true);
	$appearance_site_bg_color = get_post_meta($post->ID, 'appearance_site_bg_color', true);
	
	$appearance_layout_override = get_post_meta($post->ID, 'appearance_layout_override', true);
	$appearance_site_style = get_post_meta($post->ID, 'appearance_site_style', true);
	$appearance_table_show = get_post_meta($post->ID, 'appearance_table_show', true);
	$appearance_table_color = get_post_meta($post->ID, 'appearance_table_color', true);
	$appearance_table_texture = get_post_meta($post->ID, 'appearance_table_texture', true);
	$appearance_mat_show = get_post_meta($post->ID, 'appearance_mat_show', true);
	$appearance_mat_color = get_post_meta($post->ID, 'appearance_mat_color', true);
	
	// Get "Title & Text" Meta
	$appearance_use_image = get_post_meta($post->ID, 'appearance_use_image', true);
	$appearance_title_image = get_post_meta($post->ID, 'appearance_title_image', true);
	$appearance_google_web_font_custom = get_post_meta($post->ID, 'appearance_google_web_font_custom', true);
	
	// Slide Option
	$img_slide_effect = theme_options( 'portfolio', 'img_slide_effect' );
	$img_slide_direction = theme_options( 'portfolio', 'img_slide_direction' );
	$img_slide_pause = theme_options( 'portfolio', 'img_slide_pause' ) * 1000;
	$img_slide_animate_speed = theme_options( 'portfolio', 'img_slide_animate_speed' ) * 1000;
	
	// General App Option
	$show_qr = theme_options( 'portfolio', 'show_qr' );
	
	// Compute Screen W & H
	$s_width = 480;
	$s_height = 280;

	// Button
	$info_use_button_1 	= get_post_meta($post->ID, 'info_use_button_1', true);
	$info_button_1_link_url 	= get_post_meta($post->ID, 'info_button_1_link_url', true);
	$info_button_1_text = get_post_meta($post->ID, 'info_button_1_text', true);
	$info_button_1_sub_text 	= get_post_meta($post->ID, 'info_button_1_sub_text', true);
	$info_button_1_color 	= get_post_meta($post->ID, 'info_button_1_color', true);
	
?>

<section id="show-space">
	
	<style type="text/css" scoped>
	
	/* Frame */
	#portfolio { background-color: <?php echo $appearance_frame_border_color; ?> }

	/* Background */
	<?php if( $appearance_background_override == 'on' ): ?>
	#show-space {
		background-color: <?php echo $appearance_site_bg_color; ?>;
		background-image: url(<?php echo theme_get_attachment_src( $appearance_site_bg_image ); ?>);
	}
	#pattern {
		background-image: url(<?php echo THEME_URI; ?>/images/pattern/<?php echo $appearance_site_bg_pattern; ?>);
	}	
	<?php endif; ?>
	
	/* Layout Override */
	<?php if( $appearance_layout_override == 'on' ): ?>
		/* Table & Mat */
		#table-top,
		#table-border {
			background-color: <?php echo $appearance_table_color; ?>;
			background-image: url(<?php echo THEME_URI; ?>/images/pattern/table/<?php echo $appearance_table_texture; ?>);
		}
		#table-mat-top {
			border-bottom-color: <?php echo $appearance_mat_color; ?>;
		}
		#table-mat-body-wrap {
			background-color: <?php echo $appearance_mat_color; ?>;
		}
	<?php endif; ?>
	
	</style>
	
	<script type="text/javascript">
	//<![CDATA[ 
	
		jQuery(document).ready(function($) {
			
			// Define Easing
			jQuery.easing.def = 'easeOutQuad';

			$('#screen.flexslider').flexslider({
				animation: '<?php echo $img_slide_effect; ?>',
				slideDirection: '<?php echo $img_slide_direction; ?>',
				animationDuration: <?php echo $img_slide_animate_speed; ?>,
				slideshowSpeed: <?php echo $img_slide_pause; ?>,
				slideshow: true,
				controlNav: false
			});
			$('.flex-direction-nav').hide();
			$('#screen').mouseenter(function(){
				$('.flex-direction-nav').fadeIn('100');
			});
			$('#screen').mouseleave(function(){
				$('.flex-direction-nav').fadeOut('100');
			});
			
			// Retina
			if (document.documentElement.clientWidth > 750) {
				$('.retina').retina({preload: true, css:{ 'z-index': 9999}});
			}
			
			// Show Application Box after Loaded
			if ( !$.browser.msie ){
				var app_box_imgs_load = $('.application-box').imagesLoaded();
				app_box_imgs_load.always( function( $images ){
				  $('.application-box').animate({
				  	opacity: 1
				  }, 600);
				});
			} else {
				$('.application-box').css('opacity', 1);
			}
				
		});
	//]]>		
	</script>
	
    <div class="application-box clearfix container">
       		   	
	        <div id="portfolio-info-box">
	            
            	<h1 id="apps-title">
            		<?php if( $appearance_use_image == 'on' ): ?>
            			<img src="<?php echo theme_get_attachment_src( $appearance_title_image ); ?>" alt="<?php the_title(); ?>" />
            		<?php else: ?>
            			<?php the_title(); ?>
            		<?php endif; ?>
            	</h1>
	            
	            <div id="showcase-info">
	                <?php if( $info_short_desc != '' ): ?>
	                	<p><?php echo $info_short_desc; ?></p>
	                <?php endif; ?>     

	                <p id="showcase-sub-info">
	                	
	                	<?php 
	                		if( $info_customer != '' ) echo '<span class="meta-customer">' . $info_customer . '</span> '; 
	                		if( $info_budget != '' ) echo '<span class="meta-budget">' . $info_budget . '</span> ';
	                		
	                		// echo '<br />';
	                		
	                		if( is_array( $portfolio_category ) ) echo '<span class="meta-category">' . implode( ' <span class="post-separator">/</span> ', $portfolio_category ) . '</span> '; 
	                		if( $info_create_date != '' ) echo '<span class="meta-date">' . date('Y', $info_create_date) . '</span> ';  
	                		
	                	?>
	                	
	                </p>
	            </div>
	            
	            <!-- Button #1 -->
	            <?php if( $info_use_button_1 == 'on' ) : ?>
	            <div class="application-market-link">
	            	<div class="button action-button <?php echo $info_button_1_color; ?> none-button ">

	            		<?php if( $info_button_1_link_url != '' ): ?><a href="<?php echo $info_button_1_link_url; ?>"><?php endif; ?>
	            		<span><?php echo $info_button_1_text; ?> <small><?php echo $info_button_1_sub_text; ?></small></span><span class="icon-mask"></span>
	            		<?php if( $info_button_1_link_url != '' ): ?></a><?php endif; ?>

	            	</div>

	            	<div class="qr-price">
            			<?php if( $show_qr == 'on' && $info_button_1_link_url != '' ): ?>
            				<img src="<?php echo get_template_directory_uri(); ?>/libs/phpqrcode/qr-generator.php?URL=<?php echo $info_button_1_link_url; ?>" alt="qr-code" />
            			<?php endif; ?>
            		</div>
	        	</div>
	       		<?php endif; ?>

	        </div><!-- #application-info-box -->

	        <div id="portfolio-box">
	        	<div id="portfolio">
	        	   
	        	    <?php if( $appearance_effect == 'slide' ): ?>
	        	    <div id="screen" class="flexslider">
	        	        <ul class="slides">
	        	        <?php 
	        	        if( is_array( $appearance_slide_images ) )
	        	        foreach( $appearance_slide_images as $image ) : 
	        	        	$resized_image_src = theme_get_image( $image, $s_width, $s_height, true );
	        	        ?>
	        	        	<li><img src="<?php echo $resized_image_src; ?>" /></li>
	        	        <?php endforeach; ?>
	        	        </ul>
	        	    </div>
	        	   
	        	    <?php 
	        	    	elseif( $appearance_effect == 'retina' ):
	        	    	$image_src = theme_get_attachment_src( $appearance_retina_image );
	        	    	$zoomed_image_src = theme_get_image( $appearance_retina_image, $s_width * 2, $s_height * 2, true );
	        	  		$resized_image_src = theme_get_image( $appearance_retina_image, $s_width, $s_height, true );		
	        	  	?>
	        	     	<div id="portfolio-screen">
	        	    		<a href="<?php echo $zoomed_image_src; ?>" target="_blank" class="retina" style="display:block"><img src="<?php echo $resized_image_src; ?>"></a>
	        	    	</div>
	        	    
	        	    <?php elseif( $appearance_effect == 'video' ): ?>
	        	    	<div id="portfolio-screen">
	        	    	
	        	    		<?php if( is_numeric($appearance_video_id) ): ?>
	        	    			<iframe src="http://player.vimeo.com/video/<?php echo $appearance_video_id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="<?php echo $s_width; ?>" height="<?php echo $s_height; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	        	    		<?php else: ?>
	        	    			<iframe width="<?php echo $s_width; ?>" height="<?php echo $s_height; ?>" src="http://www.youtube.com/embed/<?php echo $appearance_video_id; ?>?rel=0&autohide=1&egm=1&modestbranding=1&showinfo=0&wmode=opaque" frameborder="0" allowfullscreen controls="0" wmode="opaque"></iframe>
	        	    		<?php endif; ?>
	        	    		
	        	    		
	        	    	</div>
	        	    	
	        	    <?php endif; ?>
	        	</div>
	        	<div class="shadow">
	        		<div class="shadow-left"></div>
	        		<div class="shadow-body"></div>
	        		<div class="shadow-right"></div>
	        	</div>
	        </div><!-- #device-box -->
        
    </div><!-- #application-box -->
	
	<div id="show-space-shadow"></div>
	<div id="pattern"></div>

</section> <!-- #show-space -->

<!-- TABLE -->
<?php theme_board_mat(); ?>
<!-- END TABLE -->

    <section id="body">
        <div id="body-wrap" class="container">
        	<div id="body-content" class="rtf">
        	
        <?php if( have_posts() ) the_post(); the_content(); ?>
        	
        	</div><!-- #body-content -->
        </div><!-- #body-wrap -->
    </section><!-- #body -->
            
<?php get_footer(); ?>