<section id="comments">

<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'theme_front' ); ?></p>
</section><!-- #comments -->
<?php return; endif; ?>
	
	
<?php if ( have_comments() ) : ?>

	<h3 class="section-lined section-title" id="comments-title"><span><?php
	printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'theme_front' ),
	number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
	?></span></h3>

	<ul class="comment-list">
		<?php
			wp_list_comments( array( 'callback' => 'theme_comments', 'max_depth' => 2, '' ) );
		?>
	</ul>
	<div class="clear"></div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="comments-nav">
			<div class="comments-prev"><?php previous_comments_link(); ?></div>
			<div class="comments-next"><?php next_comments_link(); ?></div>
		</nav>
	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
	
	<?php 
	
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
		$comment_fields =  array(
			'author' => '<div class="form-input-item clearfix">' . '<label for="author">' . __( 'Name', 'theme_front' ) . ( $req ? ' <span class="required-star">*</span>' : '' ) .
			            '</label><input id="author" class="input-text '. ( $req ? '{required:true}' : '' ) .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /><div class="form-error-box"></div></div>',
			
			'email' => '<div class="form-input-item clearfix">' . '<label for="email">' . __( 'Email', 'theme_front' ) . ( $req ? ' <span class="required-star">*</span>' : '' ) .
			            '</label><input id="email" class="input-text '. ( $req ? '{required:true, email:true}' : '{email:true}' ) .'" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /><div class="form-error-box"></div></div>',
			
			'url' => '<div class="form-input-item clearfix">' . '<label for="url">' . __( 'Website', 'theme_front' ) .
			            '</label><input id="email" class="input-text" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /><div class="form-error-box"></div></div>',
		);
	
		$comments_args = array(
		        // change the title of send button 
		        'fields'				=> $comment_fields,
		        'comment_notes_after'	=> '',
		        'id_submit'				=> 'comment-submit',
		        'comment_field'			=> '<div class="form-input-item clearfix"><label for="comment-comment">' . __('Message','theme_front') . ' <span class="required-star">*</span></label><textarea class="textarea {required:true}" name="comment" id="comment-comment" cols="70" rows="10"></textarea><div class="form-error-box"></div></div>'
		);
		
		comment_form($comments_args);
	
	?>

<?php endif; ?>

</section><!-- #comments -->

<?php
function theme_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment_wrap">
			<div class="comment-meta">
				<div class="gravatar photo-frame"><?php echo get_avatar($comment,$size='80', $default=''); ?></div>
				<div class="comment-author-name"><?php echo get_comment_author_link(); ?></div>
				<div class="comment-date"><?php echo get_comment_date('n / j / Y'); ?></div>
			</div>
			<div class='comment-content'>

				<div class='comment-text'>
					<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="box-wrap notice-box"><div class="box"><?php _e('Your comment is awaiting moderation.','theme_front') ?></div></div>
				<?php endif; ?>
				</div>

				<div class="comment-meta-compact">
					<span class="comment-author-name"><?php echo get_comment_author_link(); ?></span> 
					<span class="comment-date"><?php echo get_comment_date('n / j / Y'); ?></span>
				</div>
				
				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<div class="reply button"><span>', 'after' => '</span></div>') ) ); ?>

				<?php edit_comment_link( __('Edit', 'theme_front' ), '<div class="edit button"><span>', '</span></div>') ?>
			</div>
		</div>
	</li>
<?php
}
?>