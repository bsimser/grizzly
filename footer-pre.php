		<?php if( theme_options('footer', 'pre_footer_show') != 'off' ) : ?>
		<section id="pre-footer"> 
		<div id="pre-footer-content" class="clearfix container">  
			
			<?php switch( theme_options('footer', 'pre_footer_layout') ):
			
				case '1-column': ?>
				<ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul>
				<?php break; ?>
				
				<?php case '2-columns': ?>
				<div class="one_half"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="one_half last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<?php break; ?>
				
				<?php case '2-columns-2': ?>
				<div class="one_third"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="two_third last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<?php break; ?>
				
				<?php case '2-columns-3': ?>
				<div class="two_third"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="one_third last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<?php break; ?>
				
				<?php case '3-columns': ?>
				<div class="one_third"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="one_third"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<div class="one_third last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'third-footer' ) ); ?></ul></div>
				<?php break; ?>
				
				<?php case '3-columns-2': ?>
				<div class="two_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="one_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<div class="one_fourth last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'third-footer' ) ); ?></ul></div>
				<?php break; ?>
				
				<?php case '3-columns-3': ?>
				<div class="one_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="one_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<div class="two_fourth last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'third-footer' ) ); ?></ul></div>
				<?php break; ?>
				
				<?php case '4-columns': ?>
				<div class="one_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'first-footer' ) ); ?></ul></div>
				<div class="one_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'second-footer' ) ); ?></ul></div>
				<div class="one_fourth"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'third-footer' ) ); ?></ul></div>
				<div class="one_fourth last"><ul class="sidebar-list"><?php if ( dynamic_sidebar( 'fourth-footer' ) ); ?></ul></div>
				<?php break; ?>

			<?php endswitch; ?>
			
			
		</div>
		</section>
		<?php endif; ?>