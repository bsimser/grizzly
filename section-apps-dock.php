<section id="show-space">

<?php 
	$apps = get_posts( array( 'post_type' => 'app', 'numberposts' => -1,'orderby' => 'menu_order', 'order' => 'ASC', 'meta_key' => 'info_side_app_featured', 'meta_value' => 'on', 'suppress_filters' => 0 ) ); 
	$apps_show = ( !is_null( theme_options( 'home', 'apps_slide_number' ) ) ) ? theme_options( 'home', 'apps_slide_number' ) : 4;	
	$apps_count = min( $apps_show, count($apps) );
?>

<?php if( count( $apps ) > 0 ) : ?>
	
	<script type="text/javascript">
		// Apps Slide Variable
		var apps_count = <?php echo $apps_count; ?>;
		var apps_show = <?php echo $apps_show; ?>;
	</script>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/libs/grizzly-app-dock.js"></script>
	
	<div id="app-dock" class="clearfix app-dock-<?php echo $apps_count; ?>">
	<div class="app-pack">
		
		<?php 
			foreach( $apps as $app ) :
				$info_icon = theme_get_attachment_src( get_post_meta($app->ID, 'info_icon', true) );
				$resized_image_src = theme_get_image( get_post_meta($app->ID, 'info_icon', true), 120, 120, true );
				$info_short_desc = get_post_meta($app->ID, 'info_short_desc', true);
				
				$appearance_slide_images = get_post_meta($app->ID, 'appearance_slide_images', true);
				$appearance_retina_image = get_post_meta($app->ID, 'appearance_retina_image', true);
				$shortcode_photos_wall_images = get_post_meta($app->ID, 'shortcode_photos_wall_images', true);
				$app_images = array_merge( (array)$appearance_slide_images, (array)$appearance_retina_image, (array)$shortcode_photos_wall_images );
		?>
			
				<div class="app-icon">
					<a href="<?php echo get_permalink( $app->ID ); ?>" class="app-balloon-toggle-link">
						<img src="<?php echo $resized_image_src; ?>" width="120px" height="120px" />
					</a>
					
					<div class="app-info-balloon">
						<div class="app-title"><?php echo $app->post_title; ?></div>
						<div class="balloon-tail"></div>
					</div><!-- .app-info-balloon" -->
					
					<div class="shadow">
						<div class="shadow-left"></div>
						<div class="shadow-body"></div>
						<div class="shadow-right"></div>
					</div>
				</div><!-- .app-icon -->
			
		<?php endforeach; ?>
		
	</div>
	</div><!-- #app-dock -->
	
	<div id="app-control"></div>

<?php else: ?>
	<div id="no-slide-app-box">
		
		<?php if( theme_options('advance', 'show_helper') == 'on' ): ?>
			<div class="box-wrap notice-box"><div class="box"><strong>Featured Apps</strong> not found, please add it at <a href="<?php echo get_admin_url(null, '/edit.php?post_type=app'); ?>">WP-Admin > Grizzly > Apps</a></div></div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<div id="show-space-shadow"></div>
<div id="pattern"></div>

</section><!-- #show-space -->

<!-- TABLE -->
<?php theme_board_mat(); ?>
<!-- END TABLE -->
