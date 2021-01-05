<?php

add_action('init','register_portfolio_custom_post_type');
function register_portfolio_custom_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' 					=> __( 'Portfolios', 'theme_admin' ),
				'singular_name' 		=> __('Portfolio', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New Portfolio', 'theme_admin' ),
				'edit_item' 			=> __('Edit Portfolio', 'theme_admin' ),
				'new_item' 				=> __('New Portfolio', 'theme_admin' ),
				'view_item' 			=> __('View Portfolio', 'theme_admin' ),
				'search_items' 			=> __('Search Portfolio', 'theme_admin' ),
				'not_found' 			=>  __('No Portfolio found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No Portfolio found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Portfolio', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/portfolio' ),
			'query_var' 			=> 'portfolio',
			'_builtin' 				=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail'),
			'show_in_menu' 			=> true,
			'has_archive'			=> false,
			'menu_icon'				=> THEME_CUSTOM_ASSETS_URI . '/images/paper-bag-label.png'
		)
	);
	
	//register taxonomy for Platform
	register_taxonomy('portfolio_category','portfolio',array(
		'hierarchical' => false,
		'labels' => array(
			'name' => __( 'Portfolio Category', 'theme_admin' ),
			'singular_name' => __( 'Category', 'theme_admin' ),
			'search_items' =>  __( 'Search Category', 'theme_admin' ),
			'popular_items' => __( 'Popular Category', 'theme_admin' ),
			'all_items' => __( 'All Category', 'theme_admin' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Category', 'theme_admin' ), 
			'update_item' => __( 'Update Category', 'theme_admin' ),
			'add_new_item' => __( 'Add New Category', 'theme_admin' ),
			'new_item_name' => __( 'New Category Name', 'theme_admin' ),
			'separate_items_with_commas' => __( 'Separate Category with commas', 'theme_admin' ),
			'add_or_remove_items' => __( 'Add or remove Category', 'theme_admin' ),
			'choose_from_most_used' => __( 'Choose from the most used Category', 'theme_admin' ),
			'menu_name' => __( 'Category', 'theme_admin' ),
		),
		'public' 				=> true,
		'show_in_nav_menus' 	=> true,
		'show_ui' 				=> true,
		'show_tagcloud' 		=> false,
		'query_var' 			=> false
	));
	
	
}

/*
function app_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'app' ) {
		global $wp_query;
		$wp_query->is_home = false;
	}
	if ( get_query_var( 'taxonomy' ) == 'app_platform' ) {
		global $wp_query;
		$wp_query->is_404 = true;
		$wp_query->is_tax = false;
		$wp_query->is_archive = false;
	}
}
add_action( 'template_redirect', 'app_context_fixer' );
*/

?>