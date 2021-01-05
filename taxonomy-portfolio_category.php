<?php 
get_header('page'); ?>
		
	<section id="body" class="full-width">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php theme_breadcrumb(); ?>
	        	
	        	<div class="clear"></div>
	        	<ul id='source' class="portfolio-archive-list"></ul>
	        	
	        	<ul id="destination" class="portfolio-archive-list" style="display: none">
	        		<?php 
	        			while (have_posts()) : the_post();
	        				$portfolio = $post; 
	        				
	        				$featured = ( get_post_meta($portfolio->ID, 'info_side_portfolio_featured', true) == 'on' ) ? 'featured' : '';
	        				$categories_id = wp_get_post_terms($portfolio->ID, 'portfolio_category', array("fields" => "ids"));
	        				$categories_name = wp_get_post_terms($portfolio->ID, 'portfolio_category', array("fields" => "names"));
	        				
	        				$feature_image_id = get_post_thumbnail_id( $portfolio->ID );
							$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
							$feature_image_url = $feature_image_url[0];
							if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
							$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 175, true );
	        				
	        		?>
	        			
	        			<li data-id="<?php echo $portfolio->ID; ?>" class="all <?php echo implode( ' ', $categories_id ); ?> <?php echo $featured; ?>">
	        				
	        				<div class="photo-frame portfolio-frame icon-portfolio">
	        				
	        				<a href="<?php echo get_permalink( $portfolio->ID ); ?>"><img src="<?php echo $resized_post_thumb_src; ?>" /></a>
		        				<div class="portfolio-info">
		        					<div class="title"><a href="<?php echo get_permalink( $portfolio->ID ); ?>"><?php echo $portfolio->post_title; ?></a></div>
		        					<div class="category"><?php echo implode( ' / ', $categories_name ); ?></div>
		        				</div>
	        				</div>



	        			</li>
	        			
	        		<?php endwhile; ?>
	        	</ul>

	        </div>
			
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>