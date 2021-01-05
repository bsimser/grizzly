<?php

$config = array(
	'title' 		=> __('Slide Info', 'theme_admin'),
	'group_id' 		=> 'info',
	'context' 		=> 'normal',
	'priority' 		=> 'high',
	'types' 		=> array( 'slide' ),
	'multi' 		=> false
);
$options = array(
	
	array(
		'type' 			=> 'text',
		'id' 			=> 'name',
		'title' 		=> __('Name', 'theme_admin'),
		'description' 	=> __('Name to use in slide manage page', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'image',
		'title' 		=> __('Image', 'theme_admin'),
		'description' 	=> __('The slide frame\'s width is 950px. The height is depend on your setting.', 'theme_admin')
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'caption_title',
		'title' 		=> __('Caption Title', 'theme_admin'),
		'description' 	=> __('Leave blank to disable.', 'theme_admin'),
		'default' 		=> ''
	),
	/*
	array(
		'type' 			=> 'color',
		'id' 			=> 'caption_title_bg_color',
		'title' 		=> __('Caption Title BG Color', 'theme_admin'),
		'description' 	=> __('Leave blank to use default value.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'color',
		'id' 			=> 'caption_title_text_color',
		'title' 		=> __('Caption Title Text Color', 'theme_admin'),
		'description' 	=> __('Leave blank to use default value.', 'theme_admin'),
		'default' 		=> ''
	),
	*/
	array(
		'type' 			=> 'textarea',
		'id' 			=> 'caption',
		'title' 		=> __('Caption Text', 'theme_admin'),
		'description' 	=> __('Leave blank to disable.', 'theme_admin'),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'radio',
		'id' 			=> 'caption_pos',
		'title' 		=> __('Caption Position', 'theme_admin'),
		'description' 	=> __('Position to place the caption.', 'theme_admin'),
		'default' 		=> 'caption-left',
		'options' 		=> array(
			'caption-left' 	=> 'Left',
			'caption-right' => 'Right',
		),
	),
	array(
		'type' 			=> 'text',
		'id' 			=> 'link',
		'title' 		=> __('Link', 'theme_admin'),
		'description' 	=> __('Define url you want user to navigate to after click on the slide', 'theme_admin'),
		'default' 		=> ''
	),
	/*
	array(
		'type' 			=> 'radio',
		'id' 			=> 'link_target',
		'title' 		=> __('Link Target', 'theme_admin'),
		'description' 	=> '',
		'default' 		=> '_self',
		'options' 		=> array(
			'_self' 	=> 'Open link in current window (_self)',
			'_blank' 	=> 'Open link in new window (_blank)',
		)
	),
	*/
	
);
new metaboxes_tool($config,$options);

?>