<?php

add_action('init','register_slide_type');
function register_slide_type() {
	register_post_type( 'slide',
		array(
				'labels' 				=> array(
				'name' 					=> __('Slides', 'theme_admin' ),
				'singular_name' 		=> __('Slide', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New Slide', 'theme_admin' ),
				'edit_item' 			=> __('Edit Slide', 'theme_admin' ),
				'new_item' 				=> __('New Slide', 'theme_admin' ),
				'view_item' 			=> __('View Slide', 'theme_admin' ),
				'search_items' 			=> __('Search Slides', 'theme_admin' ),
				'not_found' 			=> __('No Slides found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No slides found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Slide', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> true,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false ),
			'query_var' 			=> false,
			'show_in_nav_menus'		=> false,
			'supports' 				=> array(''),
			'menu_icon'				=> THEME_CUSTOM_ASSETS_URI . '/images/icon-slide.png'
		)
	);
}
