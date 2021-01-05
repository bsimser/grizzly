<?php

// Social Widget
class Theme_Widget_Social extends WP_Widget {

	var $sites = array(
		'amazon',
		'android',
		'apple',
		'blogger',
		'dribbble',
		'email',
		'facebook',
		'flickr',
		'google',
		'instagram',
		'linkedin',
		'pinterest',
		'rss',
		'tumblr',
		'twitter',
		'vimeo',
		'windows',
		'youtube'
	);
	
	
	
	function Theme_Widget_Social() {
		$widget_ops = array('classname' => 'widget_social', 'description' => __( 'Displays a list of Social Icon icons', 'theme_admin') );
		$this->WP_Widget('widget-social', THEME_NAME . ' - ' . __('Social', 'theme_admin'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$alt = isset($instance['alt'])?$instance['alt']:'';
		
		$animation = isset($instance['animation'])?$instance['animation']:'fade';
		$package = $instance['package'];
		
		$custom_count = $instance['custom_count'];
		$output = '';
		if( !empty($instance['enable_sites']) ){
			foreach($instance['enable_sites'] as $site){
				$path = strtolower($site) . '-dark.png';
				$link = isset($instance[$site])?$instance[$site]:'#';
				
				if(file_exists( THEME_DIR . '/images/icons/social/'.$path)){
					$output .= '<a href="' . $link . '" rel="nofollow" target="_blank"><img src="'.THEME_URI . '/images/icons/social/' . $path . '" alt="' . $site . '" title="' . $site . '" class="tip" /></a>';
				}
			}
		}
		
		if ( !empty( $output ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
		?>
		<div class="social_wrap social_animation_<?php echo $animation;?> <?php echo $package;?>">
			<?php echo $output; ?>
		</div>
		<?php
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		// $instance['alt'] = strip_tags($new_instance['alt']);
		$instance['package'] = strip_tags($new_instance['package']);
		$instance['animation'] = strip_tags($new_instance['animation']);
		$instance['enable_sites'] = $new_instance['enable_sites'];
		$instance['custom_count'] = (int) $new_instance['custom_count'];

		if(!empty($instance['enable_sites'])){
			foreach($instance['enable_sites'] as $site){
				$instance[$site] = isset($new_instance[$site])?strip_tags($new_instance[$site]):'';
			}
		}
		for($i=1;$i<=$instance['custom_count'];$i++){
			$instance['custom_'.$i.'_name'] = strip_tags($new_instance['custom_'.$i.'_name']);
			$instance['custom_'.$i.'_url'] = strip_tags($new_instance['custom_'.$i.'_url']);
			$instance['custom_'.$i.'_icon'] = strip_tags($new_instance['custom_'.$i.'_icon']);
		}
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		// $alt = isset($instance['alt']) ? esc_attr($instance['alt']) : 'Follow Us on';
		$animation = isset($instance['animation']) ? $instance['animation'] : 'fade';
		$package = isset($instance['package']) ? $instance['package'] : '';
		$enable_sites = isset($instance['enable_sites']) ? $instance['enable_sites'] : array();
		foreach($this->sites as $site){
			$$site = isset($instance[$site]) ? esc_attr($instance[$site]) : '';
		}

		$custom_count = isset($instance['custom_count']) ? absint($instance['custom_count']) : 0;
		for($i=1;$i<=10;$i++){
			$custom_name = 'custom_'.$i.'_name';
			$$custom_name = isset($instance[$custom_name]) ? $instance[$custom_name] : '';
			$custom_url = 'custom_'.$i.'_url';
			$$custom_url = isset($instance[$custom_url]) ? $instance[$custom_url] : '';
			$custom_icon = 'custom_'.$i.'_icon';
			$$custom_icon = isset($instance[$custom_icon]) ? $instance[$custom_icon] : '';
		}
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'theme_admin'); ?>:</label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		
		
		<p>
			<label for="<?php echo $this->get_field_id('enable_sites'); ?>"><?php _e( 'Enable Social Icon', 'theme_admin' ); ?>:</label>
			<select name="<?php echo $this->get_field_name('enable_sites'); ?>[]" style="height:10em" id="<?php echo $this->get_field_id('enable_sites'); ?>" class="social-icon-sites widefat" multiple="multiple">
				<?php foreach($this->sites as $site):?>
				<option value="<?php echo $site;?>"<?php echo in_array($site, $enable_sites)? 'selected="selected"':'';?>><?php echo $site;?></option>
				<?php endforeach;?>
			</select>
		</p>
		
		<p>
			<em><?php _e("Note: Please input FULL URL <br/>(e.g. <code>http://www.example.com</code>)", 'theme_admin');?></em>
		</p>
		
		<div class="social-icon-wrap">
		<?php foreach($this->sites as $site):?>
		<p class="social-icon-config" id="social-icon-<?php echo $site;?>" <?php if(!in_array($site, $enable_sites)):?>style="display:none"<?php endif;?>>
			<label for="<?php echo $this->get_field_id( $site ); ?>"><?php echo $site.' '.__('URL', 'theme_admin')?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( $site ); ?>" name="<?php echo $this->get_field_name( $site ); ?>" type="text" value="<?php echo $$site; ?>" />
		</p>
		<?php endforeach;?>
		</div>

<?php
	}
}
register_widget('Theme_Widget_Social');