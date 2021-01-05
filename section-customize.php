<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/base/assets/libs/mColorPicker.min.js"></script>
<script type="text/javascript">
//<![CDATA[ 
	jQuery(document).ready(function($) {
		
		var theme_framework_assets_uri = '<?php echo THEME_ADMIN_ASSETS_URI;?>';
		var theme_uri = '<?php echo THEME_URI;?>';
		// Init Value
		$('#bg-color-custom').val( rgbToHex( $('#show-space, #inner-page-show-space, #slide-show-space').css('background-color') ) );
		$('#table-color-custom').val( rgbToHex( $('#table-top').css('background-color') ) );
		$('#mat-color-custom').val( rgbToHex( $('#table-mat-body-wrap').css('background-color') ) );		
		
		if( $('body').hasClass('table-on') ) $('#show-board-custom').attr('checked', true);
		else $('#show-board-custom').attr('checked', false);
		
		if( $('body').hasClass('mat-on') ) $('#show-mat-custom').attr('checked', true);
		else $('#show-mat-custom').attr('checked', false);
		
		// Color
		$('.input-color').mColorPicker({
			imageFolder : theme_framework_assets_uri+"/images/mColorPicker/"
		});
		
		$('#bg-color-custom').change(function(){
			$('#show-space, #slide-show-space, #inner-page-show-space').css('background-color', $(this).val());
		});
		$('#table-color-custom').change(function(){
			$('#table-top, #table-border').css('background-color', $(this).val());
		});
		$('#mat-color-custom').change(function(){
			$('#table-mat-top').css('border-bottom-color', $(this).val());
			$('#table-mat-body-wrap').css('background-color', $(this).val());
		});
		
		$('#show-board-custom').change(function(){
			if( $(this).is(':checked') ){
				$('body').removeClass('table-off').addClass('table-on');
				$('#table-wrap, #customize-section-mat').show();
				$('#show-mat-custom').trigger('change');
			}else{
				$('body').removeClass('table-on').addClass('table-off').removeClass('mat-on').addClass('mat-off');
				$('#table-wrap, #customize-section-mat').hide();
			}
			$('#bg-image-container').css('height', $('#bg-pattern').height());
		});
		$('#show-mat-custom').change(function(){
			if( $(this).is(':checked') ){
				$('body').removeClass('mat-off').addClass('mat-on');
			}else{
				$('body').removeClass('mat-on').addClass('mat-off');
			}
		});
		
		// Background Image
		$('#customize-background-image li').click(function(){
			$('#customize-background-image li.active').removeClass('active');
			$(this).addClass('active');
			$('#show-space').css('background-image', 'url(' + theme_uri + '/images/customize/bg/' + $(this).attr('title') + ')' );
		});
		
		// Background Pattern
		$('#customize-background-pattern li').click(function(){
			$('#customize-background-pattern li.active').removeClass('active');
			$(this).addClass('active');
			$('#pattern').css('background-image', 'url(' + theme_uri + '/images/pattern/' + $(this).attr('title') + ')' );
		});
		
		// Board Pattern
		$('#customize-board-pattern li').click(function(){
			$('#customize-board-pattern li.active').removeClass('active');
			$(this).addClass('active');
			$('#table-top, #table-border').css('background-image', 'url(' + theme_uri + '/images/pattern/table/' + $(this).attr('title') + ')' );
		});
		
		$('#customize-box-open').click(function(){
			if( $('#customize-box').hasClass('open') ) {
				$('#customize-box').stop().animate({
					left: '-252'
				}, 500, 'easeOutQuint');
			} else {
				$('#customize-box').stop().animate({
					left: '0'
				}, 500, 'easeOutQuint');
			}
			$('#customize-box').toggleClass('open');
		});
		
		function rgbToHex(rgbString) {
			if( rgbString == null ) return false;
			var parts = rgbString.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			if(parts == null ) return '#FFFFFF';
			
			delete (parts[0]);
			for (var i = 1; i <= 3; ++i) {
			    parts[i] = parseInt(parts[i]).toString(16);
			    if (parts[i].length == 1) parts[i] = '0' + parts[i];
			}
			return '#' + parts.join(''); // "0070ff"
		}
			
	});
//]]>		
</script>
<!-- End - Home Slide JS -->

<div id="customize-box">

<section class="customize-section"  id="customize-section-background">
<div class="customize-title">Background</div>
<div class="customize-item">
	<input type="text" class="input-color" id="bg-color-custom" data-hex="true" />
</div>

<?php if( true ): ?>
<div class="customize-item">
	<div class="cutomize-item-title">Image <small>( sample )</small></div>
	<ul class="customize-list" id="customize-background-image">
		<li title="none.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/none.png" /></li>
		<li title="field.png"><img src="<?php echo THEME_URI; ?>/images/customize/bg-field.png" /></li>
		<li title="fx.jpg"><img src="<?php echo THEME_URI; ?>/images/customize/bg-fx.jpg" /></li>
		<li title="hockey.jpg"><img src="<?php echo THEME_URI; ?>/images/customize/bg-hockey.jpg" /></li>
		<li title="mansion.jpg"><img src="<?php echo THEME_URI; ?>/images/customize/bg-mansion.jpg" /></li>
		<li title="muffin.png"><img src="<?php echo THEME_URI; ?>/images/customize/bg-muffin.jpg" /></li>
	</ul>
	<div class="clear"></div>
</div>
<?php endif; ?>

<div class="customize-item">
	<div class="cutomize-item-title">Overlay</div>
	<ul class="customize-list" id="customize-background-pattern">
		<li title="none.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/none.png" /></li>
		
		
		<li title="grain.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grain.png" /></li>
		<li title="diagonal-1.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/diagonal-1.png" /></li>
		<li title="diagonal-2.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/diagonal-2.png" /></li>
		<li title="mosaic-1.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/mosaic-1.png" /></li>
		<li title="pixcel.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/pixcel.png" /></li>
		
		<li title="grid-black-1.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-black-1.png" /></li>
		<li title="grid-black-2.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-black-2.png" /></li>
		<li title="grid-black-3.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-black-3.png" /></li>
		<li title="grid-black-4.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-black-4.png" /></li>
		
		<li title="grid-white-1.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-white-1.png" /></li>
		<li title="grid-white-2.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-white-2.png" /></li>
		<li title="grid-white-3.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-white-3.png" /></li>
		<li title="grid-white-4.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/bg-pattern/grid-white-4.png" /></li>
		
		

	</ul>
	<div class="clear"></div>
</div>
</section>

<?php if( is_front_page() || is_singular('app') || is_singular('portfolio') || is_page_template('template-slides.php') || is_page_template('template-framed-slides.php') || is_page_template('template-apps-dock.php') ): ?>

	<section class="customize-section"  id="customize-section-board">
	<div class="customize-title"><input type="checkbox" id="show-board-custom" /> <label for="show-board-custom">Board</label></div>
	<div class="customize-item">
		<input type="text" class="input-color" id="table-color-custom" data-hex="true" />
	</div>
	<div class="customize-item">
		<div class="cutomize-item-title">Texture</div>
		<ul class="customize-list" id="customize-board-pattern">
			<li title="none.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/none.png" /></li>
			<li title="grunge.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/table-texture/grunge.png" /></li>
			<li title="wood.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/table-texture/wood.png" /></li>
			<li title="grain.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/table-texture/grain.png" /></li>
			<li title="grass.png"><img src="<?php echo THEME_URI; ?>/base/custom/assets/images/list-images/table-texture/grass.png" /></li>
		</ul>
		<div class="clear"></div>
	</div>
	</section>
	
	<section class="customize-section" id="customize-section-mat">
	<div class="customize-title"><input type="checkbox" id="show-mat-custom" /> <label for="show-mat-custom">Mat</label></div>
	<div class="customize-item">
		<input type="text" class="input-color" id="mat-color-custom" data-hex="true" />
	</div>
	</section>

<?php endif; ?>

<div id="customize-box-open"></div>
</div>