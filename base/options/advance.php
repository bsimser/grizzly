<?php 
	
	// Option
	$options = array(
		
		// MailChimp
		array(
			'title' 	=> __('MailChimp', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'text',
					'id' 			=> 'mailchimp_api_key',
					'title' 		=> __('API Keys', 'theme_admin'),
					'description' 	=> __('grab an API Key from <a href="http://admin.mailchimp.com/account/api/" target="_blank">http://admin.mailchimp.com/account/api/</a>', 'theme_admin'),
					'default' 		=> ''
				),
			)
		),

		// Twitter API
		array(
			'title' 	=> __('Twitter App <small><a href="https://dev.twitter.com/apps" target="_blank">get them here</a></small>', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'text',
					'id' 			=> 'twitter_consumer_key',
					'title' 		=> 'Consumer key',
					'description' 	=> '',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'twitter_consumer_secret',
					'title' 		=> 'Consumer secret',
					'description' 	=> '',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'twitter_user_token',
					'title' 		=> 'Access token',
					'description' 	=> '',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'twitter_user_secret',
					'title' 		=> 'Access token secret',
					'description' 	=> '',
					'default' 		=> ''
				),
			)
		),

		// Responsive
		array(
			'title' 	=> __('Responsive', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'enable_responsive',
					'title' 		=> __('Responsive Layout', 'theme_admin'),
					'description' 	=> __('Turn off to disable responsive layout (the site will look identical on all device)', 'theme_admin'),
					'default' 		=> 'on'
				),
			)
		),

		// Google Analytic
		array(
			'title' 	=> __('Google Analytic', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'text',
					'id' 			=> 'analytic_ua',
					'title' 		=> __('Google Analytic Tracking ID', 'theme_admin'),
					'description' 	=> 'UA-XXXXXXXX-X',
					'default' 		=> ''
				),
			)
		),
		
		// Misc
		array(
			'title' 	=> __('Misc', 'theme_admin'),
			'options' 	=> array(
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_debug',
					'title' 		=> __('Show Theme Options', 'theme_admin'),
					'description' 	=> __('show theme options below theme setting panel (refresh this page to see the change)', 'theme_admin'),
					'default' 		=> 'off'
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_customize',
					'title' 		=> __('Show Customize Panel', 'theme_admin'),
					'description' 	=> __('show customize panel as seen on sample site', 'theme_admin'),
					'default' 		=> 'off'
				),
				array(
					'type' 			=> 'on_off',
					'id' 			=> 'show_helper',
					'title' 		=> __('Show Helper Text', 'theme_admin'),
					'description' 	=> __('helper text will help you to setup the theme more easily', 'theme_admin'),
					'default' 		=> 'on'
				),
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'custom_css',
					'row'			=> 10,
					'title' 		=> __('Custom CSS', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> ''
				),
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'custom_js',
					'row'			=> 10,
					'title' 		=> __('Custom JS', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> ''
				),
			)
		),
		
		// Save & Load Configuration
		array(
			'title' 	=> 'Save & Load Configuration',
			'options'	=> array(
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'theme_export_option',
					'title' 		=> __('Export Option', 'theme_admin'),
					'description' 	=> __('copy/paste these string into blank .txt file and save it', 'theme_admin'),
					'default' 		=> ''
				),
				array(
					'type' 			=> 'textarea',
					'id' 			=> 'theme_import_option',
					'title' 		=> __('Import Option', 'theme_admin'),
					'description' 	=> __('copy string that you had saved from "Export Option" and paste it here', 'theme_admin'),
					'default' 		=> ''
				),	
			)
		),
		

	);
	
	$config = array(
		'title' => __('Advance', 'theme_admin'),
		'group_id' => 'advance',
		'active_first' => false
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>