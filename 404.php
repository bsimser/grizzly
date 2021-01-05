<?php 
get_header('page'); ?>
	        			
	<section id="body">
		<div id="body-wrap" class="container">
			<div id="body-content" class="clearfix full-width">
			
			<div id="main-content" class="rtf">

	        	<div class="one_fourth">
	        		<?php 
	        			$apps = get_posts( array( 'post_type' => 'app', 'numberposts' => -1,'orderby' => 'menu_order', 'order' => 'ASC' ) );
	        			if( count($apps) > 0 ) {
	        				echo do_shortcode('[h4]' . __('Apps', 'theme_front') . '[/h4]'); 
	        				echo '<ul>';
	        				foreach( $apps as $app ) {
	        					echo '<li><a href="'. get_permalink($app->ID) .'">'. $app->post_title .'</a></li>';
	        					//var_dump($app);
	        				}
	        				echo '</ul>';
	        			}		
	        		?>
	        	</div>
	        	<div class="one_fourth">
	        		<?php echo do_shortcode('[h4]' . __('Pages', 'theme_front') . '[/h4]'); ?>
	        		<ul><?php wp_list_pages("sort_column=menu_order&title_li=&depth=1"); ?></ul>
	        	</div>
	        	<div class="one_fourth">
	        		<?php echo do_shortcode('[h4]' . __('Categories', 'theme_front') . '[/h4]'); ?>
	        		<ul><?php wp_list_categories( array( 'show_count' => true, 'use_desc_for_title' => false, 'title_li' => false, 'depth' => 1 ) ); ?></ul>
	        	</div>
	        	
	        	<div class="one_fourth last">
	        		<?php echo do_shortcode('[h4]' . __('Search', 'theme_front') . '[/h4]'); ?>
	        		<?php get_search_form(); ?>
	        	</div>
	        	
	        	<div class="clear"></div>
	        	<div class="space"></div>
					
	        </div>
			
			</div><!-- #body-content -->
	    </div><!-- #body-wrap -->
	</section><!-- #body -->
			
<?php get_footer(); ?>