<?php

$config = array(
	'title' 	=> __('App Info', 'theme_admin'),
	'group_id' 	=> 'info',
	'context'	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'portfolio' ),
	'multi' 	=> false
);
$options = array(
	
	
	array(
		'type' 			=> 'textarea',
		'id' 			=> 'short_desc',
		'title' 		=> __('Short Description', 'theme_admin'),
		'description' 	=> __('Recommend 100 - 120 Alphabet', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'customer',
		'title' 		=> __('Customer', 'theme_admin'),
		'description' 	=> __('Leave it blank to disable this option.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'budget',
		'title' 		=> __('Budget', 'theme_admin'),
		'description' 	=> __('Leave it blank to disable this option.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'date',
		'id' 			=> 'create_date',
		'title' 		=> __('Create Date', 'theme_admin'),
		'description' 	=> __('Leave it blank to disable this option.', 'theme_admin'),
		'default' 		=> ''
	),

	// Button #1
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'use_button_1',
		'toggle' 		=> 'toggle-button-1',
		'title' 		=> __('Button #1', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'on'
	),
	array(
		'type' 			=> 'text',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_link_url',
		'title' 		=> __('Link URL', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> ''
	),
	array(
		'type' 			=> 'text',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_text',
		'title' 		=> __('Text', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'Launch Project'
	),
	array(
		'type' 			=> 'text',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_sub_text',
		'title' 		=> __('Sub Text', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'view the live work'
	),
	array(
		'type' 			=> 'select',
		'toggle_group' 	=> 'toggle-button-1',
		'id' 			=> 'button_1_color',
		'title' 		=> __('Button Color', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> 'black',
		'options' 		=> array(
			'black' 			=> 'Black',
			'blue' 				=> 'Blue',
			'green' 			=> 'Green',
			'magenta' 			=> 'Magenta',
			'orange' 			=> 'Orange',
			'red' 				=> 'Red',
			'yellow' 			=> 'Yellow',
		),
	),
	
	
);
new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('Appearance', 'theme_admin'),
	'group_id' 	=> 'appearance',
	'callback' 	=> '',
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'types' 	=> array( 'portfolio' ),
	'multi' 	=> false
);
$options = array(
	
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'effect',
		'toggle' 		=> 'toggle-effect',
		'title' 		=> __('Effect', 'theme_admin'),
		'description' 	=> 'Choose layout of this application.',
		'default' 		=> 'slide',
		'options' 		=> array(
			'slide' 	=> __('Slide', 'theme_admin'),
			'video' 	=> __('Video', 'theme_admin'),
			'retina' 	=> __('Magnify', 'theme_admin'),
		),
		'images' => array(
			'slide' 	=> 'application-effect/slide.png',
			'video' 	=> 'application-effect/video.png',
			'retina' 	=> 'application-effect/retina.png',
		)
	),
	array(
		'type' 			=> 'images',
		'id' 			=> 'slide_images',
		'toggle_group' 	=> 'toggle-effect toggle-effect-slide',
		'title' 		=> __('Image for Slide', 'theme_admin'),
		'description' 	=> ''
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'retina_image',
		'toggle_group' 	=> 'toggle-effect toggle-effect-retina',
		'title' 		=> __('Image for Retina Zoom', 'theme_admin'),
		'description' 	=> __('2X dimension image is recommended', 'theme_admin')
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'video_id',
		'toggle_group' 	=> 'toggle-effect toggle-effect-video',
		'title' 		=> __('Video ID', 'theme_admin'),
		'description' 	=> __('Video ID of "YouTube" or "Vimeo"', 'theme_admin')
	),
	
	array(
		'type' 	=> 'separator',
		'title' => __('Title & Text', 'theme_admin')
	),
	/*
	array(
		'type' 			=> 'color',
		'id' 			=> 'info_color',
		'title' 		=> __('Title & Description Text Color', 'theme_admin'),
		'description' 	=> __('Leave "blank" to let\'s this theme automatically choose the appropriate color', 'theme_admin'),
		'default' 		=> ''
	),
	*/
	array(
		'type' 			=> 'text',
		'id' 			=> 'google_web_font_custom',
		'title' 		=> __('Custom Google Web Fonts', 'theme_admin'),
		'description' 	=> __('Enter a font name if you want to use font that\'s listed above. You can check full font list at <a href="http://www.google.com/webfonts#HomePlace:home">Google Web Fonts</a>.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'use_image',
		'toggle' 		=> 'toggle-use-image',
		'title' 		=> __('Use image as title', 'theme_admin'),
		'description' 	=> __('turn "on" to use image as title', 'theme_admin'),
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'title_image',
		'toggle_group' 	=> 'toggle-use-image',
		'title' 		=> __('Title Image', 'theme_admin'),
		'description' 	=> __('Choose image to use as title.', 'theme_admin')
	),
	
	array(
		'type' 	=> 'separator',
		'title' => __('Frame', 'theme_admin')
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'frame_border_color',
		'title' 		=> __('Frame Border Color', 'theme_admin'),
		'description' 	=> __('choose color for frame border', 'theme_admin'),
		'default' 		=> '#FFFFFF'
	),

	array(
		'type' 	=> 'separator',
		'title' => 'Background'
	),
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'background_override',
		'toggle' 		=> 'toggle-bg-override',
		'title' 		=> __('Override "Background" Global Settings', 'theme_admin'),
		'description' 	=> __('Switch on to override global "Background" appearance setting.', 'theme_admin'),
		'default' 		=> 'off'
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'site_bg_color',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Color', 'theme_admin'),
		'description' 	=> __('choose color to use as background', 'theme_admin'),
		'default' 		=> '#333333'
	),
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'site_bg_pattern',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Pattern', 'theme_admin'),
		'description' 	=> __('choose pattern to overlay the background color', 'theme_admin'),
		'default' 		=> 'none.png',
		'options' => array(
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
			'grid-white-4.png' 	=> __('Grid White #4', 'theme_admin'),
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
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'site_bg_image',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Image', 'theme_admin'),
		'description' 	=> __('choose image to use as background', 'theme_admin')
	),
	/*
	array(
		'type' 			=> 'select',
		'id' 			=> 'site_bg_repeat',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Repeat', 'theme_admin'),
		'description' 	=> __('choose the repeat type of site background', 'theme_admin'),
		'default' 		=> 'no-repeat',
		'options' 		=> array(
			'stretch' 	=> __('Stretch', 'theme_admin'),
			'no-repeat' => __('No Repeat', 'theme_admin'),
			'repeat' 	=> __('Repeat', 'theme_admin'),
			'repeat-x' 	=> __('Repeat X', 'theme_admin'),
			'repeat-y' 	=> __('Repeat Y', 'theme_admin')
		)
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'site_bg_position',
		'toggle_group' 	=> 'toggle-bg-override',
		'title' 		=> __('Background Position', 'theme_admin'),
		'description' 	=> __('choose background position in X axis', 'theme_admin'),
		'default' 		=> 'center',
		'options' 		=> array(
			'left' 		=> __('Left', 'theme_admin'),
			'center' 	=> __('Center', 'theme_admin'),
			'right' 	=> __('Right', 'theme_admin'),
		)
	),
	*/
	
	
	array(
		'type' 	=> 'separator',
		'title' => __('Board & Mat', 'theme_admin')
	),
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'layout_override',
		'toggle' 		=> 'toggle-layout-override',
		'title' 		=> __('Override "Layout" Global Settings', 'theme_admin'),
		'description' 	=> __('Switch on to override global "Layout" appearance setting.', 'theme_admin'),
		'default' 		=> 'off'
	),	
	// Board
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'table_show',
		'toggle_group' 	=> 'toggle-layout-override',
		'toggle' 		=> 'toggle-table-show',
		'title' 		=> __('Show Board', 'theme_admin'),
		'description' 	=> __('switch off to hide the board', 'theme_admin'),
		'default' 		=> 'off'
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'table_color',
		'toggle_group' 	=> 'toggle-layout-override toggle-table-show',
		'title' 		=> __('Board Color', 'theme_admin'),
		'description' 	=> __('choose board color', 'theme_admin'),
		'default' 		=> '#333333'
	),
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'table_texture',
		'toggle_group' 	=> 'toggle-layout-override toggle-table-show',
		'title' 		=> 'Table Texture',
		'description' 	=> 'choose texture of the table',
		'default' 		=> 'none.png',
		'options' 		=> array(
			'none.png' 		=> __('None', 'theme_admin'),
			'wood.png' 		=> __('Wood', 'theme_admin'),
			'grain.png' 	=> __('Grain', 'theme_admin'),
			'grunge.png' 	=> __('Grunge', 'theme_admin'),
			'grass.png' 	=> __('Grass', 'theme_admin')
		),
		'images' 		=> array(
			'none.png' 		=> 'none.png',
			'wood.png' 		=> 'table-texture/wood.png',
			'grain.png' 	=> 'table-texture/grain.png',
			'grunge.png' 	=> 'table-texture/grunge.png',
			'grass.png' 	=> 'table-texture/grass.png'
		)
	),
	
	// Mat
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'mat_show',
		'toggle' 		=> 'toggle-mat-show',
		'toggle_group' 	=> 'toggle-layout-override toggle-table-show',
		'title'		 	=> __('Show Mat', 'theme_admin'),
		'description' 	=> __('switch off to hide the mat', 'theme_admin'),
		'default' 		=> 'off'
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'mat_color',
		'toggle_group' 	=> 'toggle-layout-override toggle-table-show toggle-mat-show',
		'title' 		=> __('Mat Color', 'theme_admin'),
		'description' 	=> __('choose color of mat', 'theme_admin'),
		'default' 		=> '#333333'
	),
	
	
);
new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('Portfolio Info', 'theme_admin'),
	'group_id' 	=> 'info_side',
	'context'	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'portfolio' ),
	'multi' 	=> false
);

$options = array(
	
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'portfolio_featured',
		'title'		 	=> __('Featured', 'theme_admin'),
		'description' 	=> __('featured app will be shown on the app slide dock', 'theme_admin'),
		'default' 		=> 'on'
	),

);

new metaboxes_tool($config,$options);

?>