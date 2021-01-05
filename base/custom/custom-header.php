<style type="text/css">

	/* Font */
	body {
		font-family: <?php echo theme_options( 'font', 'general_family' ); ?>;
	}
	.rtf {
		font-size: <?php echo theme_options( 'font', 'general_font_size' ); ?>px;
		line-height: <?php echo theme_options( 'font', 'general_line_height' ); ?>em;
		color: <?php echo theme_options( 'font', 'general_color' ); ?>;
	}
	a,
	.rtf a {
		color: <?php echo theme_options( 'font', 'general_link_color' ); ?>;
	}
	a:hover,
	.rtf a:hover {
		color: <?php echo theme_options( 'font', 'general_link_hover_color' ); ?>;
	}
	<?php if( theme_options( 'font', 'h1_font_size' ) ) : ?>
		h1 { font-size: <?php echo theme_options( 'font', 'h1_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( theme_options( 'font', 'h2_font_size' ) ) : ?>
		h2 { font-size: <?php echo theme_options( 'font', 'h2_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( theme_options( 'font', 'h3_font_size' ) ) : ?>
		h3 { font-size: <?php echo theme_options( 'font', 'h3_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( theme_options( 'font', 'h4_font_size' ) ) : ?>
		h4 { font-size: <?php echo theme_options( 'font', 'h4_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( theme_options( 'font', 'h5_font_size' ) ) : ?>
		h5 { font-size: <?php echo theme_options( 'font', 'h5_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( theme_options( 'font', 'h6_font_size' ) ) : ?>
		h6 { font-size: <?php echo theme_options( 'font', 'h6_font_size' ); ?>px; }
	<?php endif; ?>
	
	/* Header */
	#branding { margin-top: <?php echo theme_options('header', 'branding_top_margin'); ?>px; }
	header,
	#site-title img { background-color: <?php echo theme_options('header', 'header_bg_color'); ?>; }
	<?php if( theme_options('header', 'branding_type') == 'text' ): ?>
		#branding {
			font-size: <?php echo theme_options('header', 'branding_font_size'); ?>px;
		}
		#site-title-text {
			background-color: <?php echo theme_options('header', 'header_bg_color'); ?>;
		}
		
		<?php if( theme_options('header', 'branding_desc') == 'on' ): ?>
			#site-description {
				display: block;
				line-height: <?php echo theme_options('header', 'branding_font_size'); ?>px;
			}
		<?php endif; ?>
	<?php endif; ?>
	
	/* Primary Menu */
	#primary-menu-container { font-size: <?php echo theme_options('header', 'menu_font_size'); ?>px; }
	#header-wrap,
	#primary-menu-container ul,
	#primary-menu-container li{
		background-color: <?php echo theme_options('header', 'header_bg_color'); ?>;
	}
	
	/* Background */
	#show-space,
	#inner-page-show-space {
		background-color: <?php echo theme_options('appearance', 'site_bg_color'); ?>;
		background-image: url(<?php echo theme_get_attachment_src( theme_options('appearance', 'site_bg_image') ); ?>);
	}
	#pattern {
		background-image: url(<?php echo THEME_URI; ?>/images/pattern/<?php echo theme_options('appearance', 'site_bg_pattern'); ?>);
	}
	
	/* Table */
	<?php if( theme_options( 'appearance', 'table_show' ) == 'on' ): ?>
		#table-top,
		#table-border {
			background-color: <?php echo theme_options('appearance', 'table_color'); ?>;
			background-image: url(<?php echo THEME_URI; ?>/images/pattern/table/<?php echo theme_options('appearance', 'table_texture'); ?>);
		}
	<?php endif; ?>
	
	/* Mat */
	<?php if( theme_options( 'appearance', 'mat_show' ) == 'on' ): ?>
		#table-mat-top {
			border-bottom-color: <?php echo theme_options('appearance', 'mat_color'); ?>;
		}
		#table-mat-body-wrap {
			background-color: <?php echo theme_options('appearance', 'mat_color'); ?>;
		}
	<?php endif; ?>
	
	/* Footer */
	body,
	footer { background-color: <?php echo theme_options('footer', 'footer_bg_color'); ?>; }
	
	/* Custom CSS */
	<?php echo theme_options('advance', 'custom_css'); ?>
	
</style>

<!-- Theme Custom JS -->
<script type="text/javascript">
jQuery(document).ready(function($) {
<?php echo theme_options('advance', 'custom_js'); ?>
});	
</script>
<!-- End Theme Custom JS -->

<?php 
// Font to Apply
$site_wide_font = str_replace( '+', ' ', theme_options('font', 'google_web_font'));
$site_wide_custom_font = str_replace( '+', ' ', theme_options('font', 'google_web_font_custom'));
$site_wide_font = ( $site_wide_custom_font != '' ) ? $site_wide_custom_font : $site_wide_font;

$single_page_font = str_replace( '+', ' ', $appearance_google_web_font_custom = get_post_meta(get_queried_object_id(), 'appearance_google_web_font_custom', true));

if( $site_wide_font != '' || $single_page_font != '' ): 
	
	// Choose one font to load
	$gfont = ($single_page_font != '') ? $single_page_font : $site_wide_font;
	
	// Apply List
	// $apply_lists = theme_options('font', 'google_web_font_apply');
	$apply_lists = array( '#site-title-text', '#page-title', '#apps-title', '.slide-caption-headline', '.rtf h1', '.rtf h2', '.rtf h3', '.rtf h4', '.rtf h5', '.rtf h6' );
	$site_wide_active_selector = '';
	$site_wide_loading_selector = '';
	$site_wide_inactive_selector = '';
	foreach( $apply_lists as $apply_list ) {
		$site_wide_active_selector .= '.wf-active ' . $apply_list . ',';
		$site_wide_loading_selector .= '.wf-loading ' . $apply_list . ', ';
		$site_wide_inactive_selector .= '.wf-inactive ' . $apply_list . ', ';
	}
	$site_wide_active_selector = substr( $site_wide_active_selector, 0, -2 );
	$site_wide_loading_selector = substr( $site_wide_loading_selector, 0, -2 );
	$site_wide_inactive_selector = substr( $site_wide_loading_selector, 0, -2 );
?>

<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ '<?php echo str_replace( ' ', '+', $gfont ); ?>' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
</script>

<style type="text/css">
	/* Google Web Font */
	<?php echo $site_wide_active_selector; ?> {
	  font-family: "<?php echo $gfont; ?>";
	  visibility: visible;
	}
	<?php echo $site_wide_loading_selector; ?> { visibility: hidden; }
	<?php echo $site_wide_inactive_selector; ?> { visibility: visible; }
</style>

<?php endif; ?>

<?php if(is_singular('app')): 
	global $post;
	$icon = get_post_meta($post->ID, 'info_icon', true);
?>
	<meta property="og:image" content="<?php echo $icon; ?>"/>
	<meta property="og:title" content="<?php echo $post->post_title; ?>"/>
<?php endif; ?>