jQuery(document).ready(function($) {
	
	// Main Menu
	main_menu();

	// Form
	base_form();

	// Waterfall
	base_waterfall();

	// Tabs
	base_tab();
	
	// Accordion
	base_accordion();
	
	// Toggle
	base_toggle();
	
	// Elastic
	base_elastic();

	// Color Box
	base_colorbox();

	// Responsive
	base_responsive_menu();
	
	// Fitvid
	base_fitvid();

	// Photo
	base_photo();

	// Quicksand
	base_quicksand();
	
	// Twipsy
	$('.tip').twipsy();
	$('.tip-left').twipsy({
		placement: 'left'
	});
	
	// ---------------------------------------
	// MAIN MENU
	// ---------------------------------------
	function main_menu() {
		
		// Add Class 'has-child' to all li that has children
		$('#primary-menu li').has('ul').addClass('has-child');

		// Begin Primary Menu JS
		$('#primary-menu').supersubs({ 
	        minWidth:    6,
	        maxWidth:    27,
	        extraWidth:  2
	    });
	    
		// 2nd lv sub-menu
		var menu_width = $("#primary-menu").width();
		var menu_offset = $("#primary-menu").offset();		
		$("#primary-menu > li").hover(function(){

			$("> ul", this).stop(true, true).css("visibility", "visible").css("opacity", "0").animate({opacity: 1}, 200);			
		}, function(){
			var list = $("ul", this).filter(function(){
				return $(this).css("visibility") == "visible";
			});
			var delay = 200 * (list.size()-1);
			$("> ul", this).stop().delay(delay).animate({opacity: 0}, 200, function(){
				$(this).css("visibility", "hidden");
			});
		});
		
		// 3rd+ lv sub-menu
		$("#primary-menu > li li").hover(function(){
			$("> ul", this).stop(true, true).css("visibility", "visible").css("opacity", "0").animate({opacity: 1}, 200);		
		}, function(){
			var list = $("ul", this).filter(function(){
				return $(this).css("visibility") == "visible";
			});
			var delay = 200 * (list.size()-1);
			$("> ul", this).stop().delay(delay).animate({opacity: 0}, 200, function(){
				$(this).css("visibility", "hidden");
			});
		});
	}

	// ---------------------------------------
	// TAB
	// ---------------------------------------
	function base_tab() {
		$('.tabs-wrap').each(function(){
			var tab_group = $('.tabs-wrap');
			$('.tabs li', tab_group).click(function(e){
				e.preventDefault();
				$('.tabs a', tab_group).removeClass('current');
				$('a', this).addClass('current');

				$('.panes .pane', tab_group).hide();
				$('.panes .pane', tab_group).eq($(this).index()).show();
			});

			// Trigger Initial Tab
			var initial_tab = parseInt( $('.tabs', this).attr('initial-tab') );
			$('.tabs li', tab_group).eq(initial_tab).trigger('click');
		});
	}

	// ---------------------------------------
	// TOGGLE
	// ---------------------------------------
	function base_toggle() {
		$('.toggle-wrap .tab').click(function(){
			$(this).toggleClass('current');
			$(this).siblings('.pane').slideToggle(100, 'linear');
		});
	}

	// ---------------------------------------
	// ACCORDION
	// ---------------------------------------
	function base_accordion() {
		$('.accordions-wrap').each(function(){
			var acc_group = $(this);
			$('.tab', acc_group).click(function(){
				$('.tab', acc_group).not($(this)).removeClass('current');
				$(this).addClass('current');
				$(this).next('.pane').slideDown(100, 'linear');
				$('.pane', acc_group).not($(this).next('.pane')).slideUp(100, 'linear');
			});

			// Trigger Initial Tab
			var initial_tab = parseInt( $(this).attr('initial-tab') );
			$('.tab', acc_group).eq(initial_tab).addClass('current').next('.pane').show();
		});
	}

	// ---------------------------------------
	// COLORBOX
	// ---------------------------------------
	function base_colorbox() {
		$('a.gz-fancy, a.gz-fancy-image').colorbox({
			rel 		: 'group',
			maxWidth	: '80%',
			maxHeight 	: '80%',
			close		: false,
			current		: false,
			opacity		: 0.75
		});
		$('a.gz-fancy-youtube, a.gz-fancy-vimeo').colorbox({iframe:true, innerWidth:425, innerHeight:344});
	}

	// ---------------------------------------
	// Elastic
	// ---------------------------------------
	function base_elastic() {

		 $('.theme-gallery').flexslider({
		    animation: "slide",
		    animationLoop: false,
		    itemWidth: 210,
		    itemMargin: 0,
		    minItems: 2,
		    maxItems: 5,
		    controlNav: false,
		  });
	}

	// ---------------------------------------
	// GRAYSCALE
	// ---------------------------------------
	function grayscale(src) {
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');
		var imgObj = new Image();
		imgObj.src = src;
		canvas.width = imgObj.width;
		canvas.height = imgObj.height; 
		ctx.drawImage(imgObj, 0, 0); 
		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
		for(var y = 0; y < imgPixels.height; y++){
			for(var x = 0; x < imgPixels.width; x++){
				var i = (y * 4) * imgPixels.width + x * 4;
				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
				imgPixels.data[i] = avg; 
				imgPixels.data[i + 1] = avg; 
				imgPixels.data[i + 2] = avg;
			}
		}
		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
		return canvas.toDataURL();
	}

	// ---------------------------------------
	// RESPONSIVE MENU
	// ---------------------------------------
	function base_responsive_menu() {
		$('#primary-menu').mobileMenu({
			targetContainer: '#primary-select-container',
			className: 'primary-select-menu'
		});

		// Select Navigation
	    $('#primary-select-mask-value').html($('.primary-select-menu option:selected').text());
	    $('.primary-select-menu').css('opacity', 0).change(function(){
	    	window.location = $('option:selected', $(this)).val();
	    });
	}

	// ---------------------------------------
	// PHOTO
	// ---------------------------------------
	function base_photo() {
		base_photo_load();
		base_photo_hover();
	}
	function base_photo_load() {
		// Image Frame
		$('.photo-frame img').imagesLoaded(function(){
			$(this).css('opacity', 0);
			$(this).css('visibility', 'visible');
			$(this).animate({
				opacity: 1
			}, 500, function(){
				$(this).parent('a').addClass('loaded');
				$(this).parent('.photo-frame').css('background-image', 'none');
			});
		});
	}
	function base_photo_hover() {
		// Photo Hover
		$('.photo-frame').unbind().hoverIntent({
			over: function(){
				$('a img', $(this)).stop().animate({
					opacity: 0.2
				}, 150);
				$('a', $(this)).css('backgroundPosition', '50% 75%').stop().animate(
					{backgroundPosition:"(50% 50%)"}, 
					150, 'easeOutQuad');
			},
			out: function(){
				$('a img', $(this)).stop().animate({
					opacity: 1
				}, 150);
				$('a', $(this)).stop().animate(
					{backgroundPosition:"(50% 75%)"}, 
					150, 'easeOutQuad');
			}
		});
	}

	// ---------------------------------------
	// QUICKSAND
	// ---------------------------------------
	function base_quicksand() {
		// Quicksand
		$('ul#source').quicksand('ul#destination li', {
			duration:	0
		}, function(){
			base_photo();
		});
		$('.filter-list li').click(function(){
			$('.filter-list li').removeClass('active');
			$(this).addClass('active');
			$('ul#source').quicksand( $('ul#destination li.'+$(this).attr('data-id')), {
				useScaling: true
			}, function(){
				base_photo_hover();
			});
			
		});
		
	}

	// ---------------------------------------
	// Fitvid
	// ---------------------------------------
	function base_fitvid() {
		$("#show-space, #main-content").fitVids();
	}

	// ---------------------------------------
	// Form
	// ---------------------------------------
	function base_form() {
		// Form AJAX and Validate
		$('.validate-form, #commentform').each(function(){
			$(this).validate({
				errorPlacement: function(error, element) {
					error.appendTo( element.siblings('.form-error-box') );
					element.siblings('.form-error-box').hide().fadeIn();
				} 
			});
		});
		$('.ajax-form').ajaxForm({
			dataType: 'json',
			beforeSubmit: function(arr, $form, options){
				$('.form-response', $form).html('sending data …').fadeIn();
			},
			success: function(data, statusText, xhr, $form){
				$('.form-response', $form).html(data.response_text);
				$form[0].reset();
			}
		});
		
		// Form Label
		$('input[type=text], input[type=password], textarea').each(function(){
			if( $(this).attr('value') != '' ) {
				$(this).siblings('label').addClass('compact');
			}
		}).blur(function(){
			if( $(this).attr('value') == '' ) {
				$(this).siblings('label').removeClass('compact');
			}
		}).focus(function(){
			if( $(this).attr('value') == '' ) {
				$(this).siblings('label').addClass('compact');
			}
		});
	}

	function base_waterfall() {
		// Waterfall
		$('.waterfall').focus(function(){
			if( ! $(this).attr('default') ) $(this).attr('default', $(this).attr('value') );
			if( $(this).attr('value') == $(this).attr('default') ) $(this).attr('value', '');
		}).blur(function(){
			if( $(this).attr('value') == '' ) $(this).attr('value', $(this).attr('default'));
		});
	}
	
});

