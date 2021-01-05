<?php

add_action('admin_head', 'theme_add_head');
function theme_add_head() {
?>
	<script>
		var theme_admin_assets_uri = "<?php echo THEME_ADMIN_ASSETS_URI;?>";
		var post_id = "<?php @the_ID(); ?>";
	</script>
<?php
}

// Include JS
add_action('admin_enqueue_scripts', 'theme_admin_scripts');
function theme_admin_scripts( $page ) {

	if( !in_array( $page, array( 'edit.php', 'post.php', 'post-new.php', 'widget.php', 'toplevel_page_theme_setting', 'grizzly_page_theme_document') ) ) return;

	// jQuery
	wp_enqueue_script( 'jquery' );

	// jQuery UI - Sortable - Drag & Drop
	wp_enqueue_script( 'jquery-ui-sortable' );

	// WordPress Media Upload
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');

	// iPhone style checkbox
	wp_enqueue_script('iphone-style-checkboxes-script', THEME_ADMIN_ASSETS_URI . '/libs/iphone-style-checkboxes.js', false, THEME_VERSION, false);
	wp_enqueue_script('iphone-style-tri-toggle', THEME_ADMIN_ASSETS_URI . '/libs/iphone-style-tri-toggle.js', false, THEME_VERSION, false);
	
	// mColorPicker
	wp_enqueue_script('mcolor-picker-script', THEME_ADMIN_ASSETS_URI . '/libs/mColorPicker.min.js', false, THEME_VERSION, false);
	
	// jQuery Colorbox
	wp_enqueue_script('jquery-colorbox', THEME_ADMIN_ASSETS_URI . '/libs/colorbox/jquery.colorbox-min.js', false, THEME_VERSION, false);
	
	// jQuery Tools
	wp_enqueue_script('jquery-tools', THEME_ADMIN_ASSETS_URI . '/libs/jquery.tools.min.js', false, THEME_VERSION, false);
	
	// jQuery Time Entry
	wp_enqueue_script('jquery-time-entry', THEME_ADMIN_ASSETS_URI . '/libs/jquery.timeentry.min.js', false, THEME_VERSION, false);
	
	// Admin JS
	wp_enqueue_script('theme-admin-script', THEME_ADMIN_ASSETS_URI . '/libs/base-admin.js', false, THEME_VERSION, false);
}

// Include CSS
add_action('admin_enqueue_scripts', 'theme_admin_styles');
function theme_admin_styles( $page ) {
	
	if( !in_array( $page, array( 'edit.php', 'post.php', 'post-new.php', 'widget.php', 'toplevel_page_theme_setting', 'grizzly_page_theme_document') ) ) return;
	
	// WordPress Media Upload
	wp_enqueue_style('thickbox');

	// jQuery Colorbox
	wp_enqueue_style('jquery-colorbox-style', THEME_ADMIN_ASSETS_URI . '/libs/colorbox/colorbox.css', false, THEME_VERSION);
	
	// Admin Style
	wp_enqueue_style('theme-admin-style', THEME_ADMIN_ASSETS_URI . '/css/style.css', false, THEME_VERSION);
	
	// Custom Admin Style
	wp_enqueue_style('theme-custom-admin-style', THEME_CUSTOM_ASSETS_URI . '/custom-admin.css', false, THEME_VERSION);
}


// Widget JS
if( theme_is_widget() ){
	add_action('admin_enqueue_scripts', 'theme_admin_widget_scripts');
}
function theme_admin_widget_scripts() {
	
	// mColorPicker
	wp_enqueue_script('mcolor-picker-script', THEME_ADMIN_ASSETS_URI . '/libs/mColorPicker.min.js', false, THEME_VERSION);
	
	// Widget Admin
	wp_enqueue_script('widget-admin-script', THEME_ADMIN_ASSETS_URI . '/libs/base-widget-admin.js', false, THEME_VERSION);
	
}