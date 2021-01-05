<?php 
	
	// Option
	$options = array(
		
		// Blog
		array(
			'title' 	=> __('Blog', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'select',
					'id' 			=> 'blog_page',
					'title' 		=> __('Blog Page', 'theme_admin'),
					'description' 	=> __('this page will be displayed as Blog Page', 'theme_admin'),
					'default' 		=> '0',
					'options'		=>	array(
						'0'			=>	'&mdash; Select &mdash;'
					),
					'source' 		=> array(
						'post_type' => 'page'
					)
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'blog_layout',
					'title' 		=> __('Layout', 'theme_admin'),
					'description' 	=> __('choose layout of the blog page', 'theme_admin'),
					'default' 		=> 'sidebar-right',
					'options' 		=> array(
						'full-width' 	=> __('Full Width', 'theme_admin'),
						'sidebar-right' => __('Sidebar', 'theme_admin')
					)
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_feature_image',
					'toggle' 		=> 'show_feature_image',
					'title' 		=> __('Show Feature Image', 'theme_admin'),
					'description' 	=> __('turn on to show "Feature Image"', 'theme_admin'),
					'default' 		=> 'on',
				),
				array(
					'type' 			=> 'select',
					'id' 			=> 'feature_image_type',
					'toggle_group' 	=> 'show_feature_image',
					'title' 		=> __('Feature Image Type', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> 'full-width',
					'options' 		=> array(
						'full-width' 	=> __('Full Width', 'theme_admin'),
						'float-left' 	=> __('Thumb Left', 'theme_admin')
					)
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_full_post_content',
					'title' 		=> __('Show Full Content', 'theme_admin'),
					'description' 	=> __('show full post content', 'theme_admin'),
					'default' 		=> 'off',
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'read_more_text',
					'title' 		=> __('Read More Text', 'theme_admin'),
					'description' 	=> __('string for "read more" link.<br />leave blank to disable "read more" link.', 'theme_admin'),
					'default' 		=> 'Continue Reading &rarr;'
				),
				
			)
		),
		
		// Single Blog Page
		array(
			'title' 	=> __('Single Blog Page', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'select',
					'id' 			=> 'single_layout',
					'title' 		=> __('Layout', 'theme_admin'),
					'description' 	=> __('choose layout of the single page', 'theme_admin'),
					'default' 		=> 'sidebar-right',
					'options' 		=> array(
						'full-width' 	=> __('Full Width', 'theme_admin'),
						'sidebar-left' 	=> __('Sidebar Left', 'theme_admin'),
						'sidebar-right' => __('Sidebar Right', 'theme_admin')
					)
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'single_prev_next',
					'title' 		=> __('Prev / Next', 'theme_admin'),
					'description' 	=> __('turn on to show Prev / Next navigation link', 'theme_admin'),
					'default' 		=> 'on',
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'single_author_box',
					'title' 		=> __('Author Box', 'theme_admin'),
					'description' 	=> __('turn on to show "Author" box below post content', 'theme_admin'),
					'default' 		=> 'on',
				),
			)
		),
		
		// Meta Infos
		array(
			'title' 	=> __('Meta Infos', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'meta_author',
					'title' 		=> __('Author', 'theme_admin'),
					'description' 	=> __('show post\'s author', 'theme_admin'),
					'default' 		=> 'on',
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'meta_date',
					'title' 		=> __('Published Date', 'theme_admin'),
					'description' 	=> __('show post\'s published date', 'theme_admin'),
					'default' 		=> 'on',
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'meta_category',
					'title' 		=> __('Category', 'theme_admin'),
					'description' 	=> __('show post\'s category', 'theme_admin'),
					'default' 		=> 'on',
				),
				/*
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'meta_tag',
					'title' 		=> __('Tag', 'theme_admin'),
					'description' 	=> __('show post\'s tag', 'theme_admin'),
					'default' 		=> 'on',
				),
				*/
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'meta_comment',
					'title' 		=> __('Comment', 'theme_admin'),
					'description' 	=> __('show post\'s comment count', 'theme_admin'),
					'default'		=> 'on',
				),
			)
		)
	);
	
	$config = array(
		'title' 	=> __('Blog', 'theme_admin'),
		'group_id' 	=> 'blog'
	);
	
return array( 'options' => $options, 'config' => $config );

?>