<?php

add_filter( 'manage_edit-slide_columns', 'edit_slide_columns' );
function edit_slide_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		're-order' 	=> __( 'Reorder', 'theme_admin' ),
		'title' 	=> __( 'Title', 'theme_admin' ),
		'image' 	=> __( 'Image', 'theme_admin' ),
		'link' 		=> __( 'Link', 'theme_admin' ),
		'date' 		=> __( 'Date', 'theme_admin' ),
	);
	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_slide_columns' );
function manage_slide_columns( $column ) {
	global $post;
	$link = get_post_meta($post->ID, 'info_link', true);
	$image = theme_get_attachment_src( get_post_meta($post->ID, 'info_image', true) );
	
	if ( $post->post_type == "slide" ) {
		switch( $column ) {

			case 'image':
				if( $image != '' ) {
					$resized_image_src = theme_get_image( $image, 60, 35, true );
					echo '<a rel="fancy" href="'.$image.'"><img src="' . $resized_image_src . '" /></a>';
				}
				break;
			
			case 'link':
				echo '<a href="'.$link.'" />'.$link.'</a>';
				break;
				
			case 're-order':
				echo "<div class='reorder-handle'>handle</div><div class='ajax-load-icon'></div>";
				break;
		}
	}
}

function title_save_pre_slide($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'slide' && $_REQUEST['action'] == 'editpost' ) {
			$slide_name = $_POST['info']['name'];
			return $slide_name;
		}
	}
	return $title;
}
add_filter ('title_save_pre', 'title_save_pre_slide');

?>