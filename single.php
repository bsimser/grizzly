<?php 
get_header('page'); ?>

    <section id="body" class="<?php echo theme_options('blog', 'single_layout'); ?>">
    	<section id="body-wrap" class="container">
			<section id="body-content" class="clearfix rtf">
		
		<section id="main-content">
        	<?php if ( have_posts() ) if ( have_posts() ) : the_post(); ?>
            	<article>
            		
            		<?php theme_entry_head(); ?>
            		<?php the_content(); ?>
            		<div class="clear"></div>
            		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'theme_front' ), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

            	</article>
            	
            	<?php if( theme_options( 'blog', 'single_prev_next' ) == 'on' || theme_options( 'blog', 'single_author_box' ) == 'on' ) : ?>
            		<div class="divider"></div>
            	<?php endif; ?>
            	
            	<?php if( theme_options( 'blog', 'single_prev_next' ) == 'on' ) : ?>
                	<nav class="entry-nav clearfix">
                		<div class="entry-prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( '&larr;', 'theme_front' ) . '</span> %title' ); ?></div>
                		<div class="entry-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . __( '&rarr;', 'theme_front' ) . '</span>' ); ?></div>
                	</nav>
                <?php endif; ?>
            	
            	<?php if( theme_options( 'blog', 'single_author_box' ) == 'on' ) theme_author_box(); ?>
            	
            	<?php comments_template( '', true ); ?>
            	
        	<?php endif; ?>
        	
        	
        	<?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); ?>
        </section><!-- #main-content -->
          		                
      	<?php if( theme_options('blog', 'single_layout') != 'full-width' ) get_sidebar(); ?>
		
		</section><!-- #body-content -->
    </section><!-- #body-wrap -->
</section><!-- #body -->
			
<?php get_footer(); ?>