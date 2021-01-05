<?php

// General Meta
$config = array(
	'title' => 'Theme Option',
	'group_id' => 'general_side',
	'callback' => '',
	'context' => 'side',
	'priority' => 'low',
	'types' => array( 'page', 'post' ),
	'multi' => false
);
$options = array(
	array(
		'type' => 'select',
		'id' => 'custom_sidebar',
		'title' => 'Custom Sidebar',
		'description' => '',
		'default' => '',
		'source' => array( 
			'post_type' => 'custom_sidebar'
		),
		'options' => array(
			'' => 'choose ...'
		)
	),
);
new metaboxes_tool($config,$options);

$config = array(
	'title' => 'Theme Option',
	'group_id' => 'general',
	'callback' => '',
	'context' => 'normal',
	'priority' => 'low',
	'types' => array( 'page', 'post' ),
	'multi' => false
);
$options = array(
	array(
		'type' => 'separator',
		'title' => 'Title, Description'
	),
	array(
		'type' => 'on_off',
		'id' => 'title_show',
		'toggle' => 'toggle-title-show',
		'default' => 'on',
		'title' => 'Show Title',
		'description' => '',
	),
	array(
		'type' => 'text',
		'id' => 'custom_title',
		'toggle_group' => 'toggle-title-show',
		'title' => 'Custom Title',
		'description' => 'this text will override the normal page/post title',
	),
	array(
		'type' => 'textarea',
		'id' => 'desc',
		'toggle_group' => 'toggle-title-show',
		'title' => 'Description',
		'description' => 'this text will be placed below Title',
	),
	/*
	array(
		'type' => 'on_off',
		'id' => 'breadcrumb_show',
		'default' => 'on',
		'title' => 'Show Breadcrumb',
		'description' => '',
	),
	*/
	
	array(
		'type' 	=> 'separator',
		'title' => __('Background', 'theme_admin')
	),
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'page_bg_override',
		'toggle' 		=> 'toggle-bg-override',
		'default' 		=> 'off',
		'title' 		=> __('Override BG Setting', 'theme_admin'),
		'description' 	=> '',
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'page_bg_color',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Color', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> '#FFFFFF'
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'page_bg_image',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Image', 'theme_admin'),
		'description' 	=> ''
	),
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'page_bg_pattern',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Pattern', 'theme_admin'),
		'description' 	=> __('choose pattern to overlay the background color', 'theme_admin'),
		'default' 		=> 'none.png',
		'options' 		=> array(
			'none.png' 			=> __('None', 'theme_admin'),
			'grain.png' 		=> __('Grain', 'theme_admin'),
			'diagonal-1.png' 	=> __('Diagonal #1', 'theme_admin'),
			'diagonal-2.png' 	=> __('Diagonal #2', 'theme_admin'),
			'mosaic-1.png' 		=> __('Mosaic', 'theme_admin'),
			'pixcel.png' 		=> __('Pixcel', 'theme_admin'),
			'grid-black-1.png' 	=> __('Grid Black #1', 'theme_admin'),
			'grid-black-2.png' 	=> __('Grid Black #2', 'theme_admin'),
			'grid-black-3.png' 	=> __('Grid Black #3', 'theme_admin'),
			'grid-black-4.png' 	=> __('Grid Black #4', 'theme_admin'),
			'grid-white-1.png' 	=> __('Grid White #1', 'theme_admin'),
			'grid-white-2.png' 	=> __('Grid White #2', 'theme_admin'),
			'grid-white-3.png' 	=> __('Grid White #3', 'theme_admin'),
			'grid-white-4.png' 	=> __('Grid White #4', 'theme_admin')
		),
		'images' => array(
			'none.png' 			=> 'none.png',
			'grain.png' 		=> 'bg-pattern/grain.png',
			'diagonal-1.png' 	=> 'bg-pattern/diagonal-1.png',
			'diagonal-2.png' 	=> 'bg-pattern/diagonal-2.png',
			'mosaic-1.png' 		=> 'bg-pattern/mosaic-1.png',
			'pixcel.png' 		=> 'bg-pattern/pixcel.png',
			'grid-black-1.png' 	=> 'bg-pattern/grid-black-1.png',
			'grid-black-2.png' 	=> 'bg-pattern/grid-black-2.png',
			'grid-black-3.png' 	=> 'bg-pattern/grid-black-3.png',
			'grid-black-4.png' 	=> 'bg-pattern/grid-black-4.png',
			'grid-white-1.png' 	=> 'bg-pattern/grid-white-1.png',
			'grid-white-2.png' 	=> 'bg-pattern/grid-white-2.png',
			'grid-white-3.png' 	=> 'bg-pattern/grid-white-3.png',
			'grid-white-4.png' 	=> 'bg-pattern/grid-white-4.png',
		)
	)

);
new metaboxes_tool($config,$options);

// Shortcode Meta
$config = array(
	'title' 		=> __('Data for Shortcode', 'theme_admin'),
	'group_id' 		=> 'shortcode',
	'types' 		=> array( 'app', 'portfolio', 'page', 'post' ),
	'context' 		=> 'normal',
	'multi' 		=> false,
	'priority' 		=> 'low'
);
$options = array(
	array(
		'type' 			=> 'images',
		'id' 			=> 'photos_wall_images',
		'title' 		=> __('Photos Bar images', 'theme_admin'),
		'description' 	=> __('use [photos_bar] shortcode to show these images as "Photos Wall"', 'theme_admin'),
	)
);
new metaboxes_tool($config,$options);

?>