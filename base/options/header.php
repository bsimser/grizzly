<?php 
	
	// Option
	$options = array(
		
		// Header
		array(
			'title' 	=> __('Header Container', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'color',
					'id' 			=> 'header_bg_color',
					'title' 		=> __('Header BG Color', 'theme_admin'),
					'description' 	=> __('background color of header section', 'theme_admin'),
					'default' 		=> '#FFFFFF'
				),
						
			)
		),
		
		// Logo
		array(
			'title' 	=> __('Logo', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'branding_top_margin',
					'title' 		=> __('Top Margin', 'theme_admin'),
					'description' 	=> __('0 - 20 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '0',
					'min' 			=> '0',
					'max' 			=> '20',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'branding_type',
					'toggle' 		=> 'toggle-branding-type',
					'title' 		=> __('Logo Type', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> 'text',
					'options' 		=> array(
						'text' 			=> __('Text', 'theme_admin'),
						'image' 		=> __('Image', 'theme_admin'),
					),
					'images' 		=> array(
						'text' 			=> 'branding-type/text.png',
						'image' 		=> 'branding-type/image.png',
					)
				),
				
				// Text
				array(
					'type' 			=> 'range',
					'id' 			=> 'branding_font_size',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('20 - 28 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '24',
					'min' 			=> '20',
					'max' 			=> '28',
					'step' 			=> '1'
				),
				/*
				array(
					'type' 			=> 'color',
					'id' 			=> 'branding_font_color',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Font Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#333333'
				),
				*/
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'branding_desc',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-text',
					'title' 		=> __('Description Text', 'theme_admin'),
					'description' 	=> __('show description text', 'theme_admin'),
					'default' 		=> 'off'
				),
				
				// Image
				array(
					'type' 			=> 'image',
					'id' 			=> 'branding_image',
					'toggle_group' 	=> 'toggle-branding-type toggle-branding-type-image',
					'title' 		=> __('Logo Image', 'theme_admin'),
					'description' 	=> __('recommended height is 60px', 'theme_admin')
				)
				
			)
		),
		
		// Font
		array(
			'title' 	=> __('Primary Menu', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'menu_font_size',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('10 - 18 px', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '14',
					'min' 			=> '10',
					'max' 			=> '18',
					'step' 			=> '1'
				),
						
			)
		),

		// Social
		array(
			'title' 	=> __('Social Links', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_social_links',
					'toggle' 	=> 'toggle-social-links',
					'title' 		=> __('Social Links', 'theme_admin'),
					'description' 	=> __('show social links in header', 'theme_admin'),
					'default' 		=> 'off'
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_email',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Email', 'theme_admin'),
					'description' 	=> 'Email address',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_facebook',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Facebook', 'theme_admin'),
					'description' 	=> 'Facebook page URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_twitter',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Twitter', 'theme_admin'),
					'description' 	=> 'Twitter URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_google',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Google', 'theme_admin'),
					'description' 	=> 'Google+ URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_linkedin',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('LinkedIn', 'theme_admin'),
					'description' 	=> 'LinkedIn URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_pinterest',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Pinterest', 'theme_admin'),
					'description' 	=> 'Pinterest URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_tumblr',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Tumblr', 'theme_admin'),
					'description' 	=> 'Tumblr URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_dribbble',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Dribbble', 'theme_admin'),
					'description' 	=> 'Dribbble URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_youtube',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Youtube', 'theme_admin'),
					'description' 	=> 'Youtube URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_vimeo',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Vimeo', 'theme_admin'),
					'description' 	=> 'Vimeo URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_instagram',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Instagram', 'theme_admin'),
					'description' 	=> 'Instagram page URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_apple',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Apple', 'theme_admin'),
					'description' 	=> 'Apple page URL',
					'default' 		=> ''
				),

				array(
					'type' 			=> 'text',
					'id' 			=> 'social_android',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Android', 'theme_admin'),
					'description' 	=> 'Android page URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_amazon',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Amazon', 'theme_admin'),
					'description' 	=> 'Amazon page URL',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'social_apple',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('Apple', 'theme_admin'),
					'description' 	=> 'Apple page URL',
					'default' 		=> ''
				),

				array(
					'type' 			=> 'text',
					'id' 			=> 'social_rss',
					'toggle_group'	=> 'toggle-social-links',
					'title' 		=> __('RSS Feed', 'theme_admin'),
					'description' 	=> 'RSS Feed URL',
					'default' 		=> ''
				),
				
						
			)
		),
		
	);
	
	$config = array(
		'title' 		=> __('Header', 'theme_admin'),
		'group_id' 		=> 'header',
		'active_first' 	=> false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>