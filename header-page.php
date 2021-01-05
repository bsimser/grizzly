<?php
	get_header();
	
	global $wp_query;
	$queried_object = $wp_query->queried_object;
	$queried_object_id = get_queried_object_id();
	
	$title_text = '';
	$description = '';
	
	if ( is_page() || is_home() ) {
		if( isset( $queried_object ) ) {
			$title_text = get_the_title( $queried_object->ID );
		}
	}

	if ( is_archive() ) {
		$title = __('Archives','theme_front');
		if ( is_category() ) {
			$title_text = sprintf( __( 'Category: %s', 'theme_front' ), single_cat_title( '', false ) );
		} elseif (is_tag() ) {
			$title_text = sprintf( __( 'Tag: %s', 'theme_front' ), single_tag_title( '', false ) );
		} elseif ( is_day() ) {
			$title_text = sprintf( __( 'Daily: %s', 'theme_front' ), get_the_time( 'F jS, Y' ) );
		} elseif ( is_month() ) {
			$title_text = sprintf( __( 'Monthly: %s', 'theme_front' ), get_the_time( 'F, Y' ) );
		} elseif ( is_year() ) {
			$title_text = sprintf( __( 'Yearly: %s', 'theme_front' ), get_the_time( 'Y' ) );
		} elseif ( is_author() ) {
			if( get_query_var( 'author_name' ) ) {
				$curauth = get_user_by( 'slug', get_query_var('author_name') );
			} else {
				$curauth = get_userdata( get_query_var( 'author' ) );
			}
			$title_text = sprintf( __( 'Author Archive : %s', 'theme_front' ), $curauth->display_name );
		}elseif(isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) {
			$title_text = __( 'Blog Archives','theme_front' );
		}elseif(is_tax()){
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$title_text = sprintf( __( 'Archives: %s', 'theme_front' ), $term->name );
		}
	}
	
	if ( is_single() ) {
		$blog_page_id = theme_options('blog', 'blog_page');
		$title_text = get_the_title( $blog_page_id );
		$description = get_post_meta( $blog_page_id , 'general_desc', true);
	}

	if (is_404()) {
		$title = __( '404 - Not Found','theme_front' );
		$title_text = __( '404! - Page not Found','theme_front' );
		$description = __("We couldn't find it. This page may have been moved. Try using sitemap below.",'theme_front');
	}
	
	if (is_search()) {
		$title = __( 'Search', 'theme_front' );
		$title_text = sprintf( __('Search Results : %s' , 'theme_front' ),stripslashes( strip_tags( get_search_query() ) ));
	}
	

	
	// Title & Description
	$custom_title = get_post_meta($queried_object_id, 'general_custom_title', true);
	$title_text = ( $custom_title != '' ) ? $custom_title : $title_text;
	$description = ( $description == '' ) ? get_post_meta($queried_object_id, 'general_desc', true) : $description;
	$title_show = get_post_meta($queried_object_id, 'general_title_show', true);
	
	// Background
	$bg_override = get_post_meta($queried_object_id, 'general_page_bg_override', true);
	$bg_color = ( get_post_meta($queried_object_id, 'general_page_bg_color', true) != '' ) ? 'background-color: ' . get_post_meta($queried_object_id, 'general_page_bg_color', true) . ';' : '';
	$bg_image = ( get_post_meta($queried_object_id, 'general_page_bg_image', true) != '' ) ? 'background-image: url(' . theme_get_attachment_src( get_post_meta($queried_object_id, 'general_page_bg_image', true) ) . ');' : '';
	$bg_pattern = ( get_post_meta($queried_object_id, 'general_page_bg_pattern', true) != '' ) ? 'background-image: url(' . THEME_URI . '/images/pattern/' . get_post_meta($queried_object_id, 'general_page_bg_pattern', true) . ');' : '';
	


?>    
    
    <section id="inner-page-show-space">
		
		<?php
	if( $bg_override == 'on' ) echo <<<EOT
<style type="text/css" scoped>
	#inner-page-show-space {
		$bg_color
		$bg_image
	}
	#pattern {
		$bg_pattern
	}
</style>
EOT;
		?>
		
		<?php if( $title_show != 'off' ) : ?>
		    <div id="page-header" class="container">
		    	<h1 id="page-title">
		    		<?php echo $title_text; ?>
		    	</h1>
		    	<?php if ( $description != '' ) : ?>
		    	<div id="page-tagline"><?php echo $description; ?></div>
		    	<?php endif; ?>
		    </div>
		<?php endif; ?>
		
		<div id="show-space-shadow"></div>
		<div id="pattern"></div>
		
	</section><!-- #inner-page-show-space -->

        	