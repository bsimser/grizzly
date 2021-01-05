<div id="theme-box" class="wrap">
	
	<div id="theme-box-head">
		<div class="theme-box-head-icon icon-32-documentation"></div>
		<h2><?php _e('Theme Document', 'theme_admin'); ?></h2>
		<div id="theme-box-head-info">Document v1.0<br />Last update: 10/02/12</div>
	</div>
	
	<div id="theme-box-body" class="clearfix">
		
		<div id="theme-box-tabs">
			<ul>
				<?php 
				$counter = 0;
				foreach($docs as $slug => $nicename): ?>
					<li class="icon-setting <?php echo ($counter++ == 0) ? 'active' : ''; ?>"><a href="#" class="icon-16-default icon-16-<?php echo $slug; ?>"><?php echo $nicename; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		
		<div id="theme-box-content">
			<?php 
			$counter = 0;
			foreach($docs as $slug => $nicename): ?>
				<div class="theme-box-content-pane drtf <?php echo ($counter++ == 0) ? 'active' : ''; ?>"  id="<?php echo $slug; ?>-pane">
					<?php include_once( THEME_DOCUMENTS_DIR . '/' . $slug . '.php' ); ?>
				</div>
			<?php endforeach; ?>
			
						
		</div>
		
	</div>
	
	<div id="theme-box-foot"></div>
	
	
</div>