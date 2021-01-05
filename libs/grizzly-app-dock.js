jQuery(document).ready(function($) {
	
	// Define Easing
	jQuery.easing.def = 'easeOutQuad';

	// Show App Dock after Loaded
	if ( !$.browser.msie ){
		var app_dock_imgs_load = $('#app-dock').imagesLoaded();
		app_dock_imgs_load.always( function( $images ){
		  $('#app-dock').animate({
		  	opacity: 1
		  }, 600);
		});
	} else {
		$('#app-dock').css('opacity', 1);
	}

	// App Dock
	var slide_distance = $('.app-icon').outerWidth(true);
	var slide_speed = slide_distance * 1.5; 
	var fade_speed = slide_distance / 2;
	var icon_height = $('.app-icon img').outerHeight();
	var app_amount = $('.app-pack .app-icon').size();
	
	function app_variable_init() {
		slide_distance = $('.app-icon').outerWidth(true);
		slide_speed = slide_distance * 1.5; 
		fade_speed = slide_distance / 2;
		icon_height = $('.app-icon img').outerHeight();
		app_amount = $('.app-pack .app-icon').size();
	}

	// Init
	$('.app-info-balloon').css('bottom', icon_height);
	
	if( app_amount > apps_count || true ) $('.app-pack').addClass('app-pack-slide').addClass('app-pack-' + app_amount );
	// Active first N app
	$('.app-icon:lt('+apps_count+')').addClass('app-icon-active');
	// Fix clickable invisible icon
	$('.app-icon:gt('+(apps_count-1)+')').css('visibility', 'hidden');
	
	icon_reindex();
	
	// Add Navigation Button
	$('#app-control').append('<div id="home-feature-prev"></div><div id="home-feature-next"></div>');
	
	//setInterval(app_next, 3000);
	
	$('#home-feature-prev').click(function(){
		app_next();
	});
	$('#home-feature-next').click(function(){
		app_prev();
	});
	
	
	$('.app-icon a.app-balloon-toggle-link').mouseenter(function(e){
		
		$('.app-info-balloon', $(this).parents('.app-icon')).addClass('app-info-balloon-active').stop().animate({
			opacity: 1,
			bottom: icon_height + 20
		}, 200);
		
	});
	$('.app-icon a.app-balloon-toggle-link').mouseout(function(e){
		$('.app-info-balloon-active', $(this).parents('.app-icon')).stop(true, true).delay(200).animate({
			opacity: 0,
			bottom: icon_height
		}, 100, function(){
			$(this).removeClass('app-info-balloon-active');
		});
	});

	var screen_size = '';
	setInterval(function() {
		if( $(window).width() > 1024 ) {
			if( screen_size != 'screen' ) {
				if( app_amount <= apps_count ) $('#app-control').fadeOut();
				else $('#app-control').fadeIn();
				app_reset();
				screen_size = 'screen';
			}
		}else if( $(window).width() > 767 ) {
			if( screen_size != 'tablet' ) {
				console.log('tablet');
				if( app_amount <= 3 && app_amount <= apps_count ) $('#app-control').fadeOut();
				else $('#app-control').fadeIn();
				app_reset();
				screen_size = 'tablet';
			}
		}else {
			if( screen_size != 'phone' ) {
				console.log('phone');
				if( app_amount <= 1 ) $('#app-control').fadeOut();
				else $('#app-control').fadeIn();
				app_reset();
				screen_size = 'phone';
			}
		} 
	}, 1000);

	function app_reset() {
		app_variable_init();
		$('.app-pack').css('left', 0);
		$('.app-icon').css('visibility', 'visible').css('opacity', 1);
	}

	function app_prev(){
		app_variable_init();
		$('.app-info-balloon-active').css('opacity', 0).css('bottom', icon_height).removeClass('app-info-balloon-active');
		// Check that next app icon exist
		if( $('.app-icon-active:last').next().size() == 0 ) {
			$('.app-icon:first').appendTo('.app-pack');
			var active_index = -$('.app-icon-active:first').index();
			$('.app-pack').css('left', active_index * slide_distance + 'px');
		}
		
		// Fade Icon
		$('.app-icon-active:last').next().addClass('app-icon-active').css('visibility', 'visible').css('opacity', 0).animate({
			opacity: 1
		}, 600);
		$('.app-icon-active:first').removeClass('app-icon-active').css('opacity', 1).animate({
			opacity: 0
		}, fade_speed, function(){
			$(this).css('visibility', 'hidden');
			$('.app-icon-active').css('visibility', 'visible');
		});
		
		// Slide the Icon Pack
		$('.app-pack').stop(false, false).animate({
			left: '-=' + slide_distance
		}, slide_speed);
		
		icon_reindex();
	}
	
	function app_next(){

		app_variable_init();
		$('.app-info-balloon-active').css('opacity', 0).css('bottom', icon_height).removeClass('app-info-balloon-active');
		// Check that next app icon exist
		if( $('.app-icon-active:first').prev().size() == 0 ) {
			$('.app-icon:last').prependTo('.app-pack');
			
			var active_index = -$('.app-icon-active:first').index();
			$('.app-pack').css('left', active_index * slide_distance + 'px');
		}
		
		// Fade Icon
		$('.app-icon-active:first').prev().addClass('app-icon-active').css('visibility', 'visible').css('opacity', 0).animate({
			opacity: 1
		}, 600);
		$('.app-icon-active:last').removeClass('app-icon-active').css('opacity', 1).animate({
			opacity: 0
		}, fade_speed, function(){
			$(this).css('visibility', 'hidden');
			$('.app-icon-active').css('visibility', 'visible');
		});
		
		// Slide the Icon Pack
		$('.app-pack').stop(false, false).animate({
			left: '+=' + slide_distance
		}, slide_speed);
		
		icon_reindex();
	}
	
	function icon_reindex(){
		$('.app-icon').removeClass (function (index, css) {
		    return (css.match (/\app-icon-active-\S+/g) || []).join(' ');
		});
		
		var counter = 1;
		$('.app-icon-active').each(function(){
			$(this).addClass('app-icon-active-' + counter++);
		});
	}
							
});