<?php
	if ( is_front_page() ) {
		$sidebar = 'home';
	} else if ( is_home() || is_archive() ) { 
		$sidebar = 'blog';
	} elseif ( is_single() ) {
		$custom_sidebar_id = get_post_meta($post->ID, 'general_side_custom_sidebar', true);
		if( $custom_sidebar_id != '') {
			$custom_sidebar_name = get_post_meta($custom_sidebar_id, 'info_name', true);
			$custom_sidebar_name = str_replace( ' ', '-', strtolower( $custom_sidebar_name ) );
		}
		$sidebar = ( $custom_sidebar_id != '' ) ? $custom_sidebar_name : 'blog' ;
	} elseif ( is_page() ) {
		$custom_sidebar_id = get_post_meta($post->ID, 'general_side_custom_sidebar', true);
		if( $custom_sidebar_id != '') {
			$custom_sidebar_name = get_post_meta($custom_sidebar_id, 'info_name', true);
			$custom_sidebar_name = str_replace( ' ', '-', strtolower( $custom_sidebar_name ) );
		}
		$sidebar = ( $custom_sidebar_id != '' ) ? $custom_sidebar_name : 'sidebar' ;
	} else {
		$sidebar = 'sidebar';
	}
?>
<aside id="sidebar">
	<section class="sidebar-list">
		<!--<div id="sidebar-top"></div>
		<div id="sidebar-bottom"></div>-->
		<?php 
		if ( ! dynamic_sidebar( $sidebar ) ) : ?>
			<div class="box-wrap notice-box">
			<div class="box">
				<p><?php printf(__('You can add widget to <strong>"%s"</strong> widget area by going to <strong>Appearance > Widget</strong>', 'theme_front'), $sidebar); ?></p>
				
			</div>
			</div>
		<?php endif;  ?>
	</section>
</aside><!-- #sidebar -->