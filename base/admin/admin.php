<?php

class Theme_admin {
	
	var $theme;
	
	function init( $theme ) {
		
		$this->theme = $theme;
		
		// Add admin functions
		$this->functions();
			
		// Add setting menu
		add_action('admin_menu', array(&$this,'add_option_menu'), 10 );
		
		// Update Notifier
		require_once( THEME_FUNCTIONS_DIR . '/update-notifier.php' );
		
		// Add custom post types
		$this->theme_types();
		
		// Add custom metas
		$this->theme_metas();
		
		// Support Ajax call
		$this->ajax_call();
		
		// Custom Login Logo
		add_action('login_head', array(&$this, 'custom_login_logo') );
		
		// Theme Activate
		add_action('admin_init', array(&$this,'theme_activate'));

		// Add "App" post type to "Front Page" dropdown.
		add_filter( 'get_pages', array(&$this, 'add_pages_to_dropdown'), 10, 2 );
	}
	
	// Admin functions
	// =================================== //
	
	function functions() {
		require_once(THEME_ADMIN_FUNCTIONS_DIR .'/general.php');
		
		// Include JS & CSS for Admin
		require_once(THEME_ADMIN_FUNCTIONS_DIR .'/admin-head.php');
		
		// Input generator tool
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/input-tool.php' );
		
		// Metabox generator tool
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/meta-tool.php' );
		
		// Post Order
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/post-order.php' );

		// Media Upload
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/media-upload.php' );
	}
	
	// Theme options menu
	// =================================== //
	
	function add_option_menu() {
		// Admin theme main menu
		$update_bubble = ( is_theme_update() ) ? '<span class="update-plugins count-1"><span class="update-count">Updates</span></span>' : '';
		add_menu_page( THEME_NAME, THEME_NAME . $update_bubble, 'edit_theme_options', 'theme_setting', array( &$this, 'load_option_menu' ), THEME_ADMIN_ASSETS_URI . '/images/admin/icons-16/target.png', 1000 );
		
		// Admin theme sub menu
		add_submenu_page('theme_setting', THEME_NAME. ' ' . __('Setting', 'theme_admin'), __('Setting', 'theme_admin'), 'edit_theme_options', 'theme_setting', array(&$this,'load_option_menu'));
		add_submenu_page('theme_setting', THEME_NAME . ' ' . __('Documentation', 'theme_admin'), __('Documentation', 'theme_admin'), 'edit_theme_options', 'theme_document', array(&$this,'load_option_menu'));

	}
	
	function load_option_menu() {
		// Setting page
		$sections = $this->theme->options;
		
		// Documentation page
		$docs = $this->theme->documents;
		
		if( $_GET['page'] == 'theme_document' || $_GET['page'] == 'theme_setting' )
		include_once( THEME_ADMIN_FUNCTIONS_DIR.'/' . str_replace('_', '-', $_GET['page']) . '.php' );
	}
	
	// Custom Post Types
	// =================================== //
	function theme_types() {
		foreach( $this->theme->types as $type ) {
			require_once( THEME_TYPES_DIR.'/'.$type.'/register.php' );
			require_once( THEME_TYPES_DIR.'/'.$type.'/manage.php' );
			require_once( THEME_TYPES_DIR.'/'.$type.'/content.php' );
		}
	}
	
	// Custom Meta
	// =================================== //
	function theme_metas() {
		foreach( $this->theme->metas as $meta ) {
			require_once( THEME_TYPES_DIR.'/'.$meta.'/content.php' );
		}
	}
	
	// Theme Activate
	// =================================== //
	function theme_activate(){
		if ('themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated']=='true' ) {
			wp_redirect( admin_url('admin.php?page=theme_setting&save') );
		}
	}
	
	// Admin AJAX handlerer
	// =================================== //
	function ajax_call() {
		require_once( THEME_ADMIN_FUNCTIONS_DIR.'/admin-ajax.php' );
	}
	
	// Custom WP-Admin Logo
	// =================================== //
	function custom_login_logo() {
		if( theme_options('appearance', 'branding_admin_logo') != '' ) {
			// $logo_size = getimagesize( theme_get_attachment_src( theme_options('appearance', 'branding_admin_logo') ) );
			echo '<style type="text/css">#login h1 a { background-image:url('. theme_get_attachment_src( theme_options("appearance", "branding_admin_logo") ) .') !important; background-position: center center; } </style>';
			// if( intval($logo_size[0]) > 320 ) echo '<style type="text/css">#login { width: '.$logo_size[0].'px; } </style>';
		}
	}

	// Add "App" post type to "Front Page" dropdown.
	function add_pages_to_dropdown( $pages, $r ){
    	if ( ! isset( $r[ 'name' ] ) )
        return $pages;

	    if ( 'page_on_front' == $r[ 'name' ] ) {
	        $args = array(
	            'post_type' => 'app'
	        );

	        $apps = get_posts( $args );
	        $pages = array_merge( $pages, $apps );
	    }

	    return $pages;
	}
	
	
}

?>