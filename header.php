<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php echo theme_title(); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if( theme_options('advance', 'enable_responsive') != 'off' ) : ?>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<?php endif; ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>  >

<header>
<div id="header-content" class="clearfix container">

	<div id="branding" role="banner">
		<?php $heading_tag = ( is_front_page() ) ? 'h1' : 'div'; ?>
		<<?php echo $heading_tag; ?> id="site-title">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if( theme_options( 'header', 'branding_type' ) == 'image' ) {
						echo '<img src="'. theme_get_image( theme_options( 'header', 'branding_image' ) ) .'" alt="'.get_bloginfo( 'name' ).'" />';
					} else { 
						echo '<span id="site-title-text">' . get_bloginfo( 'name' ) . '</span>'; 
					} ?>
				</a>
		</<?php echo $heading_tag; ?>>
		<div id="site-description"><?php bloginfo( 'description' ); ?></div>
	</div><!-- #branding -->

	<nav id="primary-menu-container">
		
		<?php if( theme_options( 'header', 'show_social_links' ) ): ?>
		<ul id="social-list">
			<?php if( theme_options( 'header', 'social_email' ) != '' ): ?>
				<li class="email"><a href="mailto:<?php echo theme_options( 'header', 'social_email' ); ?>">email</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_facebook' ) != '' ): ?>
				<li class="facebook"><a href="<?php echo theme_options( 'header', 'social_facebook' ); ?>">facebook</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_twitter' ) != '' ): ?>
				<li class="twitter"><a href="<?php echo theme_options( 'header', 'social_twitter' ); ?>">twitter</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_google' ) != '' ): ?>
				<li class="google"><a href="<?php echo theme_options( 'header', 'social_google' ); ?>">google</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_linkedin' ) != '' ): ?>
				<li class="linkedin"><a href="<?php echo theme_options( 'header', 'social_linkedin' ); ?>">linkedin</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_pinterest' ) != '' ): ?>
				<li class="pinterest"><a href="<?php echo theme_options( 'header', 'social_pinterest' ); ?>">pinterest</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_tumblr' ) != '' ): ?>
				<li class="tumblr"><a href="<?php echo theme_options( 'header', 'social_tumblr' ); ?>">tumblr</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_dribbble' ) != '' ): ?>
				<li class="dribbble"><a href="<?php echo theme_options( 'header', 'social_dribbble' ); ?>">dribbble</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_vimeo' ) != '' ): ?>
				<li class="vimeo"><a href="<?php echo theme_options( 'header', 'social_vimeo' ); ?>">vimeo</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_youtube' ) != '' ): ?>
				<li class="youtube"><a href="<?php echo theme_options( 'header', 'social_youtube' ); ?>">youtube</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_instagram' ) != '' ): ?>
				<li class="instagram"><a href="<?php echo theme_options( 'header', 'social_instagram' ); ?>">instagram</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_amazon' ) != '' ): ?>
				<li class="amazon"><a href="<?php echo theme_options( 'header', 'social_amazon' ); ?>">amazon</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_android' ) != '' ): ?>
				<li class="android"><a href="<?php echo theme_options( 'header', 'social_android' ); ?>">android</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_apple' ) != '' ): ?>
				<li class="apple"><a href="<?php echo theme_options( 'header', 'social_apple' ); ?>">apple</a></li>
			<?php endif; ?>
			<?php if( theme_options( 'header', 'social_rss' ) != '' ): ?>
				<li class="rss"><a href="<?php echo theme_options( 'header', 'social_rss' ); ?>">rss</a></li>
			<?php endif; ?>

		</ul>
		<?php endif; ?>

		<?php 
			wp_nav_menu( array( 'container' => '', 'menu_id' => 'primary-menu', 'menu_class' => '', 'theme_location' => 'primary', 'fallback_cb' => 'primary_nav_fb' ) ); 
		?>

		<div id="primary-select-container">
			<div id="primary-select-mask"><span id="primary-select-mask-value">Select Page ...</span> <span id="primary-select-mask-bt"></span></div>
		</div>


	</nav>



</div><!-- #header-content -->
<div id="header-shadow"></div>
</header>
