<?php 
if( !isset( $image_slide_type ) )
$image_slide_type = ( theme_options( 'home', 'img_slide_full_frame' ) == 'on' ) ? 'image-slide image-slide-full-frame' : 'image-slide'; 

?>

<section id="show-space" class="<?php echo $image_slide_type; ?>" >

<?php
	$img_slide_effect = theme_options( 'home', 'img_slide_effect' );
	$img_slide_direction = theme_options( 'home', 'img_slide_direction' );
	$img_slide_effect_direction = $img_slide_effect . '-' . $img_slide_direction;

	$img_slide_auto = ( theme_options( 'home', 'img_slide_auto' ) != 'off' ) ? 'true' : 'false';
	
	$img_slide_pause = theme_options( 'home', 'img_slide_pause' ) * 1000;
	$img_slide_animate_speed = theme_options( 'home', 'img_slide_animate_speed' ) * 1000;
	
	$img_slide_height = theme_options( 'home', 'img_slide_height' );
	
	$sitewide_caption_title_bg_color = theme_options( 'home', 'img_slide_caption_title_bg_color' );
	$sitewide_caption_title_text_color = theme_options( 'home', 'img_slide_caption_title_text_color' );
	
	$slides = get_posts( array( 'post_type' => 'slide', 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'suppress_filters' => 0 ) );
?>

<!-- Home Slide Style -->
<style type="text/css" scoped>
	
	.slide-caption-headline {
		background-color: <?php echo $sitewide_caption_title_bg_color; ?>;
	}
	.slide-caption-headline,
	.slide-caption-headline a {
		color: <?php echo $sitewide_caption_title_text_color; ?>;
	}
	
</style>
<!-- End - Home Slide Style -->

<?php if( count( $slides ) >= 1 ) : ?>

<!-- Home Slide JS -->
<script type="text/javascript">
//<![CDATA[ 
(function($){
	$(window).load(function() {
		
		// Define Easing
		jQuery.easing.def = 'easeOutQuad';

		var slide_imgs_load = $('#home-slide-wrapper').imagesLoaded();
		slide_imgs_load.always( function( $images ){
		  $('#home-slide-wrapper').animate({
		  	opacity: 1
		  }, 600);
		});
		
		$('#home-slide').flexslider({
			animation: '<?php echo $img_slide_effect; ?>',
			direction: '<?php echo $img_slide_direction; ?>',
			slideshow: <?php echo $img_slide_auto; ?>,
			slideshowSpeed: <?php echo $img_slide_pause; ?>,
			animationSpeed: <?php echo $img_slide_animate_speed; ?>,
			controlsContainer: '#home-slide-wrapper',
			controlNav: false,
			before: function(slider) {
				$('.slide-caption-headline').stop(true, true).css('opacity', 0).css('left', 50);
				$('.slide-caption-text').stop(true, true).css('opacity', 0).css('left', 50);
			},
			after: function(slider) {
				var currentSlide = $( slider.slides[slider.animatingTo] );
				$('.slide-caption-headline', $(currentSlide)).animate({
					left: 0,
					opacity: 1
				}, 300, 'easeOutQuad');
				$('.slide-caption-text', $(currentSlide)).delay(300).animate({
					left: 0,
					opacity: 1
				}, 300, 'easeOutQuad');
			}
		});
				
	});
})(jQuery);
//]]>		
</script>

<!-- End - Home Slide JS -->
<?php endif; ?>

<?php if( count( $slides ) > 0 ) : ?>

	<div id="home-slide-wrapper">
			<div id="home-slide" class="<?php echo $img_slide_effect_direction; ?>">
				<ul class="slides">
					<?php 
						foreach( $slides as $slide ) : 
						$image_id = get_post_meta($slide->ID, 'info_image', true);
						
						// $resized_image_src = wp_get_attachment_image_src($image_id, 'full');
						// $resized_image_src = $resized_image_src[0];

						$resized_image_src = theme_get_image( $image_id, 5000, $img_slide_height, true );

						// Caption
						$caption_pos = get_post_meta($slide->ID, 'info_caption_pos', true);
						$caption_title = __(get_post_meta($slide->ID, 'info_caption_title', true));
						$caption_text = __(get_post_meta($slide->ID, 'info_caption', true));
						$link = __(get_post_meta($slide->ID, 'info_link', true));
						
						// Pre-Process
						$caption_title = ( $link != '' && $caption_title != '' ) ? '<a href="' . $link . '">' . $caption_title  . '</a>' : $caption_title;
						
						$caption_title_bg_tone = 'slide-caption-bg-' . getDarkLightYIQ( $sitewide_caption_title_bg_color );
						$caption_style[] = ( $sitewide_caption_title_text_color != '' ) ? 'color:' . $sitewide_caption_title_text_color . ';' : '';
						$caption_style[] = 'background-color:' . $sitewide_caption_title_bg_color . ';';
						$caption_title_style = 'style="' . implode( ' ', $caption_style ) . '"';
					?>
						<li>
						
							<img src="<?php echo $resized_image_src; ?>" alt="<?php echo $slide->post_title; ?>" />

							<?php if( $caption_title || $caption_text ): ?>
							<div class="slide-caption <?php echo $caption_pos; ?>">
							<div class="container">
								<?php if( $caption_title != '' ) : ?>
									<div class="slide-caption-headline <?php echo $caption_title_bg_tone; ?>"><?php echo $caption_title; ?></div>
								<?php endif; ?>
								<?php if( $caption_text ) : ?>
									<div class="slide-caption-text"><?php echo $caption_text; ?></div>
								<?php endif; ?>
							</div>
							</div>
							<?php endif; ?>
						
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

	</div><!-- #home-slide-wrapper -->

<?php else: ?>
	<div id="no-slide-app-box">
		<?php if( theme_options('advance', 'show_helper') == 'on' ): ?>
			<div class="box-wrap notice-box"><div class="box"><strong>Slides</strong> not found, please add it at <a href="<?php echo get_admin_url(null, '/edit.php?post_type=slide'); ?>">WP-Admin > Grizzly > Slides</a></div></div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<div id="show-space-shadow"></div>
<div id="pattern"></div>

</section><!-- #show-space -->

<!-- TABLE -->
<?php theme_board_mat(); ?>
<!-- END TABLE -->