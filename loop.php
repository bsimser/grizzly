<?php 
if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php theme_entry_head(); ?>
		<?php 
			if( theme_options('blog', 'show_full_post_content') == 'on' ) {
				the_content( '<p>' . theme_options('blog', 'read_more_text') . '</p>' );
			} else {
				the_excerpt();
			}
		?>
	</article>
<?php endwhile; ?>