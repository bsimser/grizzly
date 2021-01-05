<?php 
get_header('page'); ?>
		
	<section id="body" class="full-width">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix rtf">
			
			<div id="main-content">
	        	<?php theme_breadcrumb(); ?>
	        	
	        	<?php
	        		// Get All Apps
	        		$apps = get_posts( array( 'post_type' => 'app', 'numberposts' => -1,'orderby' => 'menu_order', 'order' => 'ASC', 'suppress_filters' => 0 ) );
	        		$platforms = get_terms( 'app_platform' );
	        	?>
	        	
	        	<ul id="platform-filter" class="filter-list">
	        		<li data-id='all' class="active">All</li>
	        		
	        		<?php foreach ( $platforms as $platform ) : ?>
	        			<li data-id='<?php echo $platform->term_id; ?>'><?php echo $platform->name; ?></li>
	        		<?php endforeach; ?>
	        		
	        	</ul>
	
	        	
	        	<div class="clear"></div>
	        	<ul id='source' class="apps-archive-list"></ul>
	        	
	        	<ul id="destination" class="apps-archive-list" style="display: none">
	        		<?php 
	        			foreach ( $apps as $app ) : 
	        				$resized_icon_src = theme_get_image( get_post_meta($app->ID, 'info_icon', true), 56, 56, true );

	        				$info_short_desc = get_post_meta($app->ID, 'info_short_desc', true);
	        				
	        				$featured = ( get_post_meta($app->ID, 'info_side_app_featured', true) == 'on' ) ? 'featured' : '';
	        				$platforms_id = wp_get_post_terms($app->ID, 'app_platform', array("fields" => "ids"));
	        				$platforms_name = wp_get_post_terms($app->ID, 'app_platform', array("fields" => "names"));
	        				
	        				$feature_image_id = get_post_thumbnail_id( $app->ID );
							$feature_image_url = wp_get_attachment_image_src($feature_image_id, 'full');  
							$feature_image_url = $feature_image_url[0];
							if( $feature_image_url == '' ) $feature_image_url = THEME_URI . '/images/pattern/na.png';
							$resized_post_thumb_src = theme_get_image( $feature_image_url, 290, 125, true );
	        		?>
	        			
	        			<li data-id="<?php echo $app->ID; ?>" class="all <?php echo implode( ' ', $platforms_id ); ?> <?php echo $featured; ?>">
	        				
	        				<div class="app-frame">
		        				<div class="photo-frame icon-watch">
		        					<a href="<?php echo get_permalink( $app->ID ); ?>">
		        					<img src="<?php echo $resized_post_thumb_src; ?>" />
		        					</a>
		        					<div class="photo-frame-shadow"></div>
		        				</div>
		        				<div class="app-info">
		        					<img src="<?php echo $resized_icon_src; ?>" />
		        					<div class="title"><a href="<?php echo get_permalink( $app->ID ); ?>"><?php echo $app->post_title; ?></a></div>
		        					<div class="category"><?php echo implode( ' / ', $platforms_name ); ?></div>
		        				</div>
	        				</div>

	        			</li>
	        			
	        		<?php endforeach; ?>
	        	</ul>

	        </div>
			
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>