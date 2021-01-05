<?php
	get_header();
	the_post();
	
	$http_find = array('http://', 'https://');
	$http_replace = array('[http]', '[https]');

	// Get "App Info" Meta
	$appearance_device = get_post_meta($post->ID, 'appearance_device', true);
	$info_icon = get_post_meta($post->ID, 'info_icon', true);
	$info_price = get_post_meta($post->ID, 'info_price', true);
	
	$platforms_name = wp_get_post_terms($post->ID, 'app_platform', array("fields" => "names"));
	
	// Button #1
	$info_use_button_1 	= get_post_meta($post->ID, 'info_use_button_1', true);
	$info_button_1_link_url 	= get_post_meta($post->ID, 'info_button_1_link_url', true);
	$info_button_1_qr_url = urlencode(str_replace($http_find, $http_replace, $info_button_1_link_url));
	$info_button_1_text = get_post_meta($post->ID, 'info_button_1_text', true);
	$info_button_1_sub_text 	= get_post_meta($post->ID, 'info_button_1_sub_text', true);
	$info_button_1_color 	= get_post_meta($post->ID, 'info_button_1_color', true);
	$info_button_1_icon 	= get_post_meta($post->ID, 'info_button_1_icon', true);

	// Button #2
	$info_use_button_2 	= get_post_meta($post->ID, 'info_use_button_2', true);
	$info_button_2_link_url 	= get_post_meta($post->ID, 'info_button_2_link_url', true);
	$info_button_2_qr_url = urlencode(str_replace($http_find, $http_replace, $info_button_2_link_url));
	$info_button_2_text = get_post_meta($post->ID, 'info_button_2_text', true);
	$info_button_2_sub_text 	= get_post_meta($post->ID, 'info_button_2_sub_text', true);
	$info_button_2_color 	= get_post_meta($post->ID, 'info_button_2_color', true);
	$info_button_2_icon 	= get_post_meta($post->ID, 'info_button_2_icon', true);

	// Button #3
	$info_use_button_3 	= get_post_meta($post->ID, 'info_use_button_3', true);
	$info_button_3_link_url 	= get_post_meta($post->ID, 'info_button_3_link_url', true);
	$info_button_3_qr_url = urlencode(str_replace($http_find, $http_replace, $info_button_3_link_url));
	$info_button_3_text = get_post_meta($post->ID, 'info_button_3_text', true);
	$info_button_3_sub_text 	= get_post_meta($post->ID, 'info_button_3_sub_text', true);
	$info_button_3_color 	= get_post_meta($post->ID, 'info_button_3_color', true);
	$info_button_3_icon 	= get_post_meta($post->ID, 'info_button_3_icon', true);

	$info_android_market_url = get_post_meta($post->ID, 'info_android_market_url', true);
	$info_android_market_price = get_post_meta($post->ID, 'info_android_market_price', true);
	$info_android_market_price = ( $info_android_market_price == '' || $info_android_market_price == '0' ) ? 'FREE' : $info_android_market_price;
	$info_android_market_price = ( is_numeric( $info_android_market_price ) ) ? '$' . $info_android_market_price : $info_android_market_price;
	
	$info_short_desc = get_post_meta($post->ID, 'info_short_desc', true);
	$info_version = get_post_meta($post->ID, 'info_version', true);
	$info_updated = get_post_meta($post->ID, 'info_updated', true);
	
	// Get "App Appearance"
	$appearance_layout = get_post_meta($post->ID, 'appearance_layout', true);
	$appearance_effect = get_post_meta($post->ID, 'appearance_effect', true);
	$appearance_retina_image = get_post_meta($post->ID, 'appearance_retina_image', true);
	$appearance_video_id = get_post_meta($post->ID, 'appearance_video_id', true);
	$appearance_slide_images = get_post_meta($post->ID, 'appearance_slide_images', true);
	
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
	
	// Icon
	$resized_icon_src = theme_get_image( get_post_meta($post->ID, 'info_icon', true), 64, 64, true );

	// Slide Option
	$img_slide_effect = theme_options( 'apps', 'img_slide_effect' );
	$img_slide_direction = theme_options( 'apps', 'img_slide_direction' );
	$img_slide_pause = theme_options( 'apps', 'img_slide_pause' ) * 1000;
	$img_slide_animate_speed = theme_options( 'apps', 'img_slide_animate_speed' ) * 1000;
	
	// General App Option
	$show_qr = theme_options( 'apps', 'show_qr' );
	
	// Override Cinema Display & Safari Layout
	if( $appearance_device == 'cinema' || $appearance_device == 'safari' ) {
		$appearance_layout = 'landscape';
	}

	// Manual Set Device & Layout
	if( isset( $_REQUEST['device'] ) ) $appearance_device = $_REQUEST['device'];
	if( isset( $_REQUEST['layout'] ) ) $appearance_layout = $_REQUEST['layout'];

	// Compute Screen W & H
	if( $appearance_layout == 'portrait' ) {
		switch( $appearance_device ) {
			case 'ipad' : // 3 : 4
				$s_width = 300;
				$s_height = 400;
				break;
			case 'iphone5-w' :	// 9 : 16
				$s_width = 209;
				$s_height = 371;
				break;
			case 'iphone5-b' :	// 9 : 16
				$s_width = 209;
				$s_height = 371;
				break;
			case 'iphone' :	// 2 : 3
				$s_width = 210;
				$s_height = 315;
				break;
			case 'android-phone' : // 3 : 5 - Nexus S - Galaxy S2
				$s_width = 204;
				$s_height = 340;
				break;
			case 'android-tablet' :	// 5 : 8 - Tab 10.1
				$s_width = 275;
				$s_height = 440;
				break;
			case 'window-phone' : // 
				$s_width = 207;
				$s_height = 354;
				break;
			case 'window-surface' :	
				$s_width = 248;
				$s_height = 440;
				break; 
			case 'cinema' : 
				$s_width = 462;
				$s_height = 260;
				break;
			case 'safari' : 
				$s_width = 478;
				$s_height = 308;
				break; 
		}
	}
	elseif( $appearance_layout == 'landscape' ) {
		switch( $appearance_device ) {
			case 'ipad' : 	
				$s_width = 401;
				$s_height = 300;
				break;
			case 'iphone' :	
				$s_width = 375;
				$s_height = 250;
				break;
			case 'iphone5-w' :
				$s_width = 421;
				$s_height = 238;
				break;
			case 'iphone5-b' :
				$s_width = 421;
				$s_height = 238;
				break;
			case 'android-phone' :
				$s_width = 400;
				$s_height = 240;
				break;  
			case 'android-tablet' :	
				$s_width = 440;
				$s_height = 275;
				break;  
			case 'window-phone' : 
				$s_width = 418;
				$s_height = 244;
				break;
			case 'window-surface' :	
				$s_width = 440;
				$s_height = 247;
				break; 
			case 'cinema' :
				$s_width = 462;
				$s_height = 260;
				break; 
			case 'safari' :
				$s_width = 478;
				$s_height = 308;
				break;     
		}
	}


	
?>

<section id="show-space">
	
	<style type="text/css" scoped>
	
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

			$('#screen.flexslider').flexslider({
				animation: '<?php echo $img_slide_effect; ?>',
				slideDirection: '<?php echo $img_slide_direction; ?>',
				animationSpeed: <?php echo $img_slide_animate_speed; ?>,
				slideshowSpeed: <?php echo $img_slide_pause; ?>,
				slideshow: true,
				controlNav: false
			});
			
			
			<?php if( $show_qr == 'on' ): ?>
				// Badge
				$('.application-market-link .button').mouseenter( function(){
					$('.qr-price img', $(this).parent('.application-market-link')).stop().animate({
						top: 10
					}, 300, 'easeOutQuad');
				}).mouseleave( function(){
					$('.qr-price img', $(this).parent('.application-market-link')).stop().animate({
						top: 110
					}, 300, 'easeOutQuad');
				});
			<?php endif; ?>
			
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
	
    <div id="<?php echo $appearance_device; ?>-<?php echo $appearance_layout; ?>-box" class="application-box clearfix <?php echo $appearance_layout; ?> <?php echo $appearance_device; ?> container">
       		   	
	        <div id="application-info-box">
	            
	        	<img id="apps-icon" src="<?php echo $resized_icon_src; ?>" />
	            
	            <?php if( $appearance_layout == 'portrait' || true ): ?>
	            	<h1 id="apps-title">
	            		<?php if( $appearance_use_image == 'on' ): ?>
	            			<img src="<?php echo theme_get_attachment_src( $appearance_title_image ); ?>" alt="<?php the_title(); ?>" />
	            		<?php else: ?>
	            			<?php the_title(); ?>
	            		<?php endif; ?>
	            	</h1>
	            <?php endif; ?>

	            <div id="showcase-info">
	                <?php if( $info_short_desc != '' ): ?>
	                	<p><?php echo __($info_short_desc); ?></p>
	                <?php endif; ?>
	            </div>
	            
	            <!-- Button #1 -->
	            <?php if( $info_use_button_1 == 'on' ) : ?>
	            <div class="application-market-link">
	            	<div class="button action-button <?php echo $info_button_1_color; ?> <?php echo $info_button_1_icon; ?>-button ">

	            		<?php if( $info_button_1_link_url != '' ): ?><a href="<?php echo $info_button_1_link_url; ?>"><?php endif; ?>
	            		<span><?php echo $info_button_1_text; ?> <small><?php echo $info_button_1_sub_text; ?></small></span><span class="icon-mask"></span>
	            		<?php if( $info_button_1_link_url != '' ): ?></a><?php endif; ?>

	            	</div>

	            	<div class="qr-price">
            			<?php if( $show_qr == 'on' && $info_button_1_qr_url != '' ): ?>
            				<img src="<?php echo get_template_directory_uri(); ?>/libs/phpqrcode/qr-generator.php?URL=<?php echo $info_button_1_qr_url; ?>" alt="qr-code" />
            			<?php endif; ?>
            		</div>
	        	</div>
	       		<?php endif; ?>

	       		<!-- Button #2 -->
	        	<?php if( $info_use_button_2 == 'on' ) : ?>
	            <div class="application-market-link last">
	            	<div class="button action-button <?php echo $info_button_2_color; ?> <?php echo $info_button_2_icon; ?>-button ">

	            		<?php if( $info_button_2_link_url != '' ): ?><a href="<?php echo $info_button_2_link_url; ?>"><?php endif; ?>
	            		<span><?php echo $info_button_2_text; ?> <small><?php echo $info_button_2_sub_text; ?></small></span><span class="icon-mask"></span>
	            		<?php if( $info_button_2_link_url != '' ): ?></a><?php endif; ?>

	            	</div>

	            	<div class="qr-price">
            			<?php if( $show_qr == 'on' && $info_button_2_link_url != '' ): ?>
            				<img src="<?php echo get_template_directory_uri(); ?>/libs/phpqrcode/qr-generator.php?URL=<?php echo $info_button_2_qr_url; ?>" alt="qr-code" />
            			<?php endif; ?>
            		</div>
	        	</div>
	       		<?php endif; ?>

	       		<!-- Button #2 -->
	        	<?php if( $info_use_button_3 == 'on' ) : ?>
	            <div class="application-market-link last">
	            	<div class="button action-button <?php echo $info_button_3_color; ?> <?php echo $info_button_3_icon; ?>-button ">

	            		<?php if( $info_button_3_link_url != '' ): ?><a href="<?php echo $info_button_3_link_url; ?>"><?php endif; ?>
	            		<span><?php echo $info_button_3_text; ?> <small><?php echo $info_button_3_sub_text; ?></small></span><span class="icon-mask"></span>
	            		<?php if( $info_button_3_link_url != '' ): ?></a><?php endif; ?>

	            	</div>

	            	<div class="qr-price">
            			<?php if( $show_qr == 'on' && $info_button_3_link_url != '' ): ?>
            				<img src="<?php echo get_template_directory_uri(); ?>/libs/phpqrcode/qr-generator.php?URL=<?php echo $info_button_3_qr_url; ?>" alt="qr-code" />
            			<?php endif; ?>
            		</div>
	        	</div>
	       		<?php endif; ?>

	            
	        </div><!-- #application-info-box -->
	        

	        <div id="device-box">
	        	<div id="device">
	        	   
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
	        	     	<div id="screen">
	        	    		<a href="<?php echo $zoomed_image_src; ?>" target="_blank" class="retina" style="display:block"><img src="<?php echo $resized_image_src; ?>"></a>
	        	    	</div>
	        	    
	        	    <?php elseif( $appearance_effect == 'video' ): ?>
	        	    	<div id="screen">
	        	    	
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