<?php

class Theme {
	
	var $types;
	var $settings;
	var $sidebars;
	var $widgets;
	var $menus;
	var $options;
	var $documents;
	var $shortcodes;
	
	// Initialize theme.
	function init( $options ) {
	
		// Define theme's constants.
		$this->theme_config( $options );
		
		// Language support.
		add_action( 'init', array( &$this, 'theme_language' ) );
		
		// Theme support.
		add_action( 'after_setup_theme', array( &$this, 'theme_support' ) );
		
		// Load theme's core.
		$this->theme_functions();
		
		// Theme's plugins.
		$this->theme_plugins();
		
		// Theme's shortcodes.
		$this->theme_shortcodes();
		
		// Theme's widgets.
		add_action( 'widgets_init', array( &$this, 'theme_widgets' ) );
		
		// Theme's sidebars
		$this->theme_sidebars();
		
		// Theme's types
		$this->theme_types();
		
		// Theme's AJAX.
		require_once( THEME_FUNCTIONS_DIR . '/theme-ajax.php' );
		
		// Theme's scripts & CSS
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_scripts' ), 0 );
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_styles' ) );
		add_action(	'wp_head', array(&$this, 'theme_custom_header'));

		// Custom
		$this->theme_custom_hook();

		// Theme's admin.
		$this->theme_admin();
	}
	
	function theme_config( $options ) {
	
		$this->types = $options['theme_types'];
		$this->metas = $options['theme_custom_metas'];
		$this->menus = $options['theme_menus'];
		$this->sidebars = $options['theme_sidebars'];
		$this->options = $options['theme_options'];
		$this->documents = $options['theme_documents'];
		$this->shortcodes = $options['theme_shortcodes'];
		
		// Get Theme Data from style.css
		$theme_data = wp_get_theme(get_option('template'));

		// Core
		define( 'THEME_NAME', $options['theme_name'] );
		define( 'THEME_SLUG', $options['theme_slug'] );
		define( 'THEME_VERSION', $theme_data['Version'] );

		define( 'THEME_URI', get_template_directory_uri() );
		define( 'THEME_FRAMEWORK_URI', THEME_URI.'/base/' );
		
		define( 'THEME_DIR', get_template_directory() );
		define( 'THEME_FRAMEWORK_DIR', THEME_DIR.'/base' );
		
		define( 'THEME_TYPES_DIR', THEME_FRAMEWORK_DIR.'/types' );
		define( 'THEME_OPTIONS_DIR', THEME_FRAMEWORK_DIR.'/options' );
		define( 'THEME_DOCUMENTS_DIR', THEME_FRAMEWORK_DIR.'/documents' );
		define( 'THEME_FUNCTIONS_DIR', THEME_FRAMEWORK_DIR.'/functions' );
		define( 'THEME_LANGUAGES_DIR', THEME_FRAMEWORK_DIR.'/languages' );
		define( 'THEME_PLUGINS_DIR', THEME_FRAMEWORK_DIR.'/plugins' );
		define( 'THEME_SHORTCODES_DIR', THEME_FRAMEWORK_DIR.'/shortcodes' );
		define( 'THEME_WIDGETS_DIR', THEME_FRAMEWORK_DIR.'/widgets' );
		
		// Admin
		define( 'THEME_ADMIN_DIR', THEME_FRAMEWORK_DIR.'/admin' );
		define( 'THEME_ADMIN_FUNCTIONS_DIR', THEME_ADMIN_DIR.'/functions' );

		define( 'THEME_ADMIN_ASSETS_DIR', THEME_FRAMEWORK_DIR.'/assets' );
		define( 'THEME_ADMIN_ASSETS_URI', THEME_FRAMEWORK_URI.'/assets' );
		
		// Custom
		define( 'THEME_CUSTOM_DIR', THEME_FRAMEWORK_DIR.'/custom' );
		define( 'THEME_CUSTOM_URI', THEME_FRAMEWORK_URI.'/custom' );
		define( 'THEME_CUSTOM_ASSETS_URI', THEME_FRAMEWORK_URI.'/custom/assets' );
	}
	
	function theme_language() {
		$locale = get_locale();
		if (is_admin()) {
			load_theme_textdomain( 'theme_admin', THEME_FRAMEWORK_DIR . '/languages' );
			$locale_file = THEME_FRAMEWORK_DIR . "/languages/$locale.php";
		}else{
			load_theme_textdomain( 'theme_front', THEME_DIR . '/languages' );
			$locale_file = THEME_DIR . "/languages/$locale.php";
		}
		if ( is_readable( $locale_file ) ){
			require_once( $locale_file );
		}
	}
	
	function theme_support() {
		if( function_exists( 'add_theme_support' ) ) {
			// Editor style
			add_editor_style();

			// Post Thumbnail
			add_theme_support( 'post-thumbnails' );

			// Add default posts and comments RSS feed links to head
			add_theme_support( 'automatic-feed-links' );
			add_image_size( 'theme-option', 220, 80, true );

			// WordPress Navigation Menu
			register_nav_menus( $this->menus );

			// Enable shortcode for widget area
			add_filter('widget_text', 'do_shortcode');
		}
	}
	
	function theme_functions() {
		require_once( THEME_FUNCTIONS_DIR . '/aq_resizer.php' );
		require_once( THEME_FUNCTIONS_DIR . '/general.php' );
		require_once( THEME_FUNCTIONS_DIR . '/theme-items.php' );
	}
	
	function theme_plugins() {
		require_once( THEME_PLUGINS_DIR . '/wp-pagenavi/wp-pagenavi.php' );
	}
	
	function theme_shortcodes() {
		require_once( THEME_SHORTCODES_DIR . '/fix.php' );			// Fix
		
		// Enable Shortcode in Text Widget
		add_filter('widget_text', 'do_shortcode');
		add_filter( 'widget_text', 'theme_formatter', 99 );
		
		foreach ( $this->shortcodes as $shortcode ) {
			require_once( THEME_SHORTCODES_DIR . '/' . $shortcode . '.php' );
		}
	}
	
	function theme_widgets() {
		// Ads 125
		require_once( THEME_WIDGETS_DIR . '/ads-125.php' );
		
		// Twitter
		require_once( THEME_WIDGETS_DIR . '/twitter.php' );
		
		// Social
		require_once( THEME_WIDGETS_DIR . '/social.php' );
		
		// Flickr
		require_once( THEME_WIDGETS_DIR . '/flickr.php' );
		
		// Sub Navigation
		require_once( THEME_WIDGETS_DIR . '/subnav.php' );
		
		// Contact Form
		require_once( THEME_WIDGETS_DIR . '/contact-form.php' );
		
		// Contact Info
		require_once( THEME_WIDGETS_DIR . '/contact-info.php' );
	}
	
	function theme_sidebars() {
		foreach( $this->sidebars as $theme_sidebar ){
			register_sidebar($theme_sidebar);
		}
		
		$custom_sidebars = get_posts('post_type=custom_sidebar&orderby=menu_order&order=ASC&numberposts=-1');
		foreach ($custom_sidebars as $sidebar){
			$sidebar_name = get_post_meta($sidebar->ID, 'info_name', true);
			$sidebar_desc = get_post_meta($sidebar->ID, 'info_short_desc', true);
			register_sidebar(array(
				'id' => str_replace( ' ', '-', strtolower( $sidebar_name ) ),
				'name' =>  $sidebar_name . ' (custom)',
				'description' => $sidebar_desc,
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}	
	}
	
	function theme_types() {
		foreach( $this->types as $type ) {
			require_once( THEME_TYPES_DIR . '/' . $type . '/register.php' );
		}
	}
	
	function theme_scripts() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			/////////// JS Libs
			
			// Modernizr
			wp_enqueue_script( 'theme-modernizr', THEME_URI . '/libs/modernizr.custom.js' );
			
			// Respond
			wp_enqueue_script( 'respond', THEME_URI . '/libs/respond.min.js' );
			
			// Jquery
			wp_enqueue_script( 'jquery' );
			
			// Comment
			wp_enqueue_script( 'comment' );
			wp_enqueue_script( 'comment-reply' );
			
			// Form
			wp_enqueue_script( 'jquery-form' );
			wp_enqueue_script( 'jquery-metadata', THEME_URI . '/libs/jquery.metadata.js', false, THEME_VERSION, true );
			wp_enqueue_script( 'jquery-form-validate', THEME_URI . '/libs/jquery.validate.min.js', false, THEME_VERSION, true );
			
			// jQuery Easing
			wp_enqueue_script( 'jquery-easing', THEME_URI . '/libs/jquery.easing.1.3.js', false, THEME_VERSION, true );
			
			// Supersubs
			wp_enqueue_script( 'supersubs', THEME_URI . '/libs/supersubs.js', false, THEME_VERSION, true );

			// Color Box
			wp_enqueue_script( 'jquery-colorbox', THEME_URI . '/libs/colorbox/jquery.colorbox-min.js', false, THEME_VERSION, true );

			// jQuery Tweet
			wp_enqueue_script( 'jquery-tweet', THEME_URI . '/libs/jquery.tweet.min.js', false, THEME_VERSION, true );
			
			// jQuery Images Loaded
			wp_enqueue_script( 'jquery-images-loaded', THEME_URI . '/libs/jquery.imagesloaded.js', false, THEME_VERSION, true );
			
			// jQuery Retina
			wp_enqueue_script( 'jquery-retina', THEME_URI . '/libs/jquery.retina-0.1.js', false, THEME_VERSION, true );
			
			// HTML5 Fix
			wp_enqueue_script( 'html5', THEME_URI . '/libs/html5.js', false, THEME_VERSION, true );
			
			// Hover Intent
			wp_enqueue_script( 'hover-intent', THEME_URI . '/libs/jquery.hoverIntent.min.js', false, THEME_VERSION, true );
			
			// Bootstrap Twipsy
			wp_enqueue_script( 'twipsy', THEME_URI . '/libs/bootstrap-twipsy.js', false, THEME_VERSION, true );

			// Flex Slider
			wp_enqueue_script( 'jquery-flexslider', THEME_URI . '/libs/flexslider/jquery.flexslider-min.js', false, THEME_VERSION, true );
			
			// Fitvid
			wp_enqueue_script( 'jquery-fitvid', THEME_URI . '/libs/jquery.fitvids.js', false, THEME_VERSION, true );
			
			// BG Pos
			wp_enqueue_script( 'jquery-bgpos', THEME_URI . '/libs/jquery.bgpos.js', false, THEME_VERSION, true );

			// Quicksand
			wp_enqueue_script( 'jquery-quicksand', THEME_URI . '/libs/jquery.quicksand.js', false, THEME_VERSION, true );

			// Responsive Menu
			wp_enqueue_script( 'jquery-responsive-menu', THEME_URI . '/libs/jquery.mobilemenu.js', false, THEME_VERSION, true );
			
			// Theme Custom Scripts
			wp_enqueue_script( 'theme-core', THEME_URI . '/libs/grizzly-core.js', false, THEME_VERSION, true );

		}
	}

	function theme_styles() {
		
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
		
			// Color Box
			wp_enqueue_style( 'style-colorbox', THEME_URI . '/libs/colorbox/colorbox.css', false, THEME_VERSION );
			
			// Flex Slider
			wp_enqueue_style( 'style-flexslider', THEME_URI . '/libs/flexslider/flexslider.css', false, THEME_VERSION );
			
			// Reset
			wp_enqueue_style( 'theme-reset', THEME_URI . '/css/reset.css', false, THEME_VERSION );
			
			// Theme
			wp_enqueue_style( 'theme-main-style', THEME_URI . '/css/screen.css', false, THEME_VERSION );
			wp_enqueue_style( 'theme-element-style', THEME_URI . '/css/element.css', false, THEME_VERSION );

			// Responsive
			if( theme_options('advance', 'enable_responsive') != 'off' ) {
				wp_enqueue_style( 'theme-media-queries', THEME_URI . '/css/media-queries.css', false, THEME_VERSION );
			}
			
			// Standard style.css
			wp_enqueue_style( 'theme-style', get_stylesheet_uri(), false, THEME_VERSION );
		}
	}
	
	function theme_custom_header() {
		include( THEME_CUSTOM_DIR . '/custom-header.php' );
	}
	
	function theme_custom_hook() {
		include( THEME_CUSTOM_DIR . '/custom-hook.php' );
	}
	
	function theme_admin() {
		if ( is_admin() || ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ) {
			require_once( THEME_ADMIN_DIR . '/admin.php' );
			$admin = new Theme_admin();
			$admin->init( $this );
		}
	}

}

?>