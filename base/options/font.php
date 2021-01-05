<?php 
	
	// Option
	$options = array(
		
		array(
			'title' 	=> __('General', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'select',
					'id' 			=> 'general_family',
					'title' 		=> __('Font Family', 'theme_admin'),
					'description' 	=> __('site wide font family', 'theme_admin'),
					'default' 		=> 'Arial,Helvetica,Garuda,sans-serif',
					'options' 		=> array(
						"'Arial Black',Gadget,sans-serif"
						=> '"Arial Black",Gadget,sans-serif',
						'Arial,Helvetica,Garuda,sans-serif' 		
						=> 'Arial,Helvetica,Garuda,sans-serif',
						'Verdana,Geneva,Kalimati,sans-serif' 
						=> 'Verdana,Geneva,Kalimati,sans-serif',
						"'Lucida Sans Unicode','Lucida Grande',Garuda,sans-serif" 
						=> '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
						"'Lucida Sans Unicode','Lucida Grande',Garuda,sans-serif" 
						=> '"Lucida Sans Unicode","Lucida Grande",Garuda,sans-serif',
						"Georgia,'Nimbus Roman No9 L',serif" 
						=> 'Georgia,"Nimbus Roman No9 L",serif',
						"'Palatino Linotype','Book Antiqua',Palatino,FreeSerif,serif" 
						=> '"Palatino Linotype","Book Antiqua",Palatino,FreeSerif,serif',
						'Tahoma,Geneva,Kalimati,sans-serif' 
						=> 'Tahoma,Geneva,Kalimati,sans-serif',
						"'Trebuchet MS',Helvetica,Jamrul,sans-serif" 
						=> '"Trebuchet MS",Helvetica,Jamrul,sans-serif',
						"'Times New Roman',Times,FreeSerif,serif" 
						=> '"Times New Roman",Times,FreeSerif,serif'
					)
				),
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'general_font_size',
					'title' 		=> __('Font Size', 'theme_admin'),
					'description' 	=> __('site wide font size', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '13',
					'min' 			=> '10',
					'max' 			=> '20',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'general_line_height',
					'title' 		=> __('Line Height', 'theme_admin'),
					'description' 	=> __('site wide line height', 'theme_admin'),
					'unit' 			=> 'em',
					'default' 		=> '1.5',
					'min' 			=> '1',
					'max' 			=> '2.5',
					'step' 			=> '0.05'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'general_color',
					'title' 		=> __('Font Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#555555'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'general_link_color',
					'title' 		=> __('Link Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#e54b00'
				),
				array(
					'type' 			=> 'color',
					'id' 			=> 'general_link_hover_color',
					'title' 		=> __('Link Hover Color', 'theme_admin'),
					'description' 	=> '',
					'default' 		=> '#b73a00'
				),
				
						
			)
		),
		
		// Heading
		array(
			'title' 	=> __('Heading', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'range',
					'id' 			=> 'h1_font_size',
					'title' 		=> __('H1 font size', 'theme_admin'),
					'description' 	=> __('font size of h1 tag', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '32',
					'min' 			=> '14',
					'max' 			=> '32',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'h2_font_size',
					'title' 		=> __('H2 font size', 'theme_admin'),
					'description' 	=> __('font size of h2 tag', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '28',
					'min' 			=> '14',
					'max' 			=> '32',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'h3_font_size',
					'title' 		=> __('H3 font size', 'theme_admin'),
					'description' 	=> __('font size of h3 tag', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '26',
					'min' 			=> '14',
					'max' 			=> '32',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'h4_font_size',
					'title' 		=> __('H4 font size', 'theme_admin'),
					'description' 	=> __('font size of h4 tag', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '24',
					'min' 			=> '14',
					'max' 			=> '32',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'h5_font_size',
					'title' 		=> __('H5 font size', 'theme_admin'),
					'description' 	=> __('font size of h5 tag', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '20',
					'min' 			=> '14',
					'max' 			=> '32',
					'step' 			=> '1'
				),
				array(
					'type' 			=> 'range',
					'id' 			=> 'h6_font_size',
					'title' 		=> __('H6 font size', 'theme_admin'),
					'description' 	=> __('font size of h6 tag', 'theme_admin'),
					'unit' 			=> 'px',
					'default' 		=> '16',
					'min' 			=> '14',
					'max' 			=> '32',
					'step' 			=> '1'
				),
				
			)
		),
		
		// Google Web Font
		array(
			'title' 	=> __('Google Web Font', 'theme_admin'),
			'options' 	=> array(
				
				array(
					'type' 			=> 'radio_img',
					'id' 			=> 'google_web_font',
					'title' 		=> __('Heading Font Family', 'theme_admin'),
					'description' 	=> __('choose the font face to apply to heading text eg., H1, H2, H3, ...', 'theme_admin'),
					'default' 		=> 'none',
					'options' 		=> array(
						'' 				=> 'None',
						'Amaranth' 		=> 'Amaranth',
						'Cabin+Sketch' 	=> 'Cabin Sketch',
						'Cabin' 		=> 'Cabin',
						'Carter+One' 	=> 'Carter One',
						'Chewy' 		=> 'Chewy',
						'Copse' 		=> 'Copse',
						'Expletus+Sans' => 'Expletus Sans',
						'Josefin+Sans' 	=> 'Josefin Sans',
						'Open+Sans' 	=> 'Open Sans',
						'Pacifico' 		=> 'Pacifico',			
						'Redressed' 	=> 'Redressed',
					),
					'images' 		=> array(
						'' 					=> 'none-120.png',
						'Amaranth' 			=> 'google-web-font/amaranth.png',
						'Cabin+Sketch' 		=> 'google-web-font/cabin-sketch.png',
						'Cabin' 			=> 'google-web-font/cabin.png',
						'Carter+One' 		=> 'google-web-font/carter-one.png',
						'Chewy' 			=> 'google-web-font/chewy.png',
						'Copse' 			=> 'google-web-font/copse.png',
						'Expletus+Sans' 	=> 'google-web-font/expletus-sans.png',
						'Josefin+Sans' 		=> 'google-web-font/josefin-sans.png',
						'Open+Sans' 		=> 'google-web-font/open-sans.png',			
						'Pacifico' 			=> 'google-web-font/pacifico.png',		
						'Redressed' 		=> 'google-web-font/redressed.png',
					)
				),
				array(
					'type' 			=> 'text',
					'id' 			=> 'google_web_font_custom',
					'title' 		=> __('Custom Google Web Fonts', 'theme_admin'),
					'description' 	=> __('Enter a font name if you want to use font that\'s listed above. You can check full font list at <a href="http://www.google.com/webfonts#HomePlace:home">Google Web Fonts</a>.', 'theme_admin'),
					'default' 		=> ''
				),
				
				/*
				array(
					'type' 			=> 'checkbox',
					'id' 			=> 'google_web_font_apply',
					'title' 		=> __('Apply to', 'theme_admin'),
					'description' 	=> __('Select elements that you want to apply the selected Google Web Font to.', 'theme_admin'),
					'default' 		=> array( '#site-title-text', '#page-title', '#apps-title', '.slide-caption-headline', '.rtf h1', '.rtf h2', '.rtf h3', '.rtf h4', '.rtf h5', '.rtf h6' ),
					'options' 		=> array(
						'#site-title-text' => 'Site Title',
						'#page-title' => 'Page Title',
						'#apps-title' => 'Apps Title',
						'.slide-caption-headline' => 'Slide Caption Title',
						'.rtf h2' => 'H2',
						'.rtf h3' => 'H3',
						'.rtf h4' => 'H4',
						'.rtf h5' => 'H5',
						'.rtf h6' => 'H6',
					)
				),
				*/
				
				
			)
		)
		
		
	);
	
	$config = array(
		'title' 	=> __('Font', 'theme_admin'),
		'group_id' 	=> 'font',
	);
	
	
return array( 'options' => $options, 'config' => $config );

?>