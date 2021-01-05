jQuery(document).ready(function($) {
	
	// On-Off
	$('.input-on-off').iphoneStyle();
	
	// Toggle Group
	$('.input-on-off[toggle]').change(function(event, recursive){
		// console.log( 'on-off: ' + $(this).is(':checked'));
		if( $(this).is(':checked') ) { 
			$('.input-list.' + $(this).attr('toggle') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle')).get().reverse() ).trigger('change');
		} else {
			$('.input-list.' + $(this).attr('toggle') ).hide();	
		}
	});
	$('.input-radio[toggle]').change(function(event, recursive){
		// console.log( 'radio: ' + $(this).is(':checked') + ' ' + $(this).val());
		if( $(this).is(':checked') ) {
			$('.input-list.' + $(this).attr('toggle') ).hide();
			$('.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value')).get().reverse() ).trigger('change');
		}
	});
	// Hide Toggle Group
	$( $('.input-on-off, .input-radio').get().reverse() ).trigger('change');
	
	// Color
	$('.input-color').mColorPicker({
		imageFolder : theme_admin_assets_uri+"/images/mColorPicker/"
	});
	
	// Date
	$('.input-date').each( function(){
		var input_date = $(this);
		$(this).dateinput({
			trigger : true,
			format : 'dd mmmm yyyy',
			change: function() {
				
				var isoDate = parseDate(this.getValue('yyyy-mm-dd')) / 1000;
				$(input_date).siblings('.input-date-value').val(isoDate);
			},
			onHide: function(){
				if( $(input_date).val() == '' ) {
					$(input_date).siblings('.input-date-value').val('');
				}
			}
		});
	});
	
	function parseDate(input, format) {
	  format = format || 'yyyy-mm-dd'; // default format
	  var parts = input.match(/(\d+)/g), 
	      i = 0, fmt = {};
	  // extract date-part indexes from the format
	  format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });
	  return new Date(Date.UTC(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]));
	}
	
	// Time
	$('.input-time').timeEntry({spinnerImage: '', show24Hours: true});
	$('.time-trigger').click(function(e){
		e.preventDefault();
		$('.input-time', $(this).parent('.input-field')).focus();
	});
	
	// Range
	$('.input-range').rangeinput({
		progress : false
	});
	
	// Upload
	var current_upload;
	var upload_type;
	var current_input_name;

	// File Upload
	$('.upload-file-bt').click(function() {
		if(post_id == '') post_id = '0';
		formfield = $('#upload_image').attr('name');
		tb_show('Upload File', 'media-upload.php?theme_upload=1&type=file&post_id='+post_id+'&TB_iframe=true');

		current_upload = $(this).parents('.input-field');
		upload_type = 'file';
		current_input_name = $('.dummy-input', current_upload).attr('name');

		window.send_to_editor = newSendToEditor;

		return false;
	});

	// Image Upload
	$('.upload-image-bt').click(function() {
		if(post_id == '') post_id = '0';
		formfield = $('#upload_image').attr('name');
		tb_show('Upload Image', 'media-upload.php?theme_upload=1&post_id='+post_id+'&type=image&TB_iframe=true');

		current_upload = $(this).parents('.input-field');
		upload_type = 'image';
		current_input_name = $('.dummy-input', current_upload).attr('name');

		window.send_to_editor = newSendToEditor;

		return false;
	});

	// Images Upload
	$('.upload-images-bt').click(function() {
		if(post_id == '') post_id = '0';
		formfield = $('#upload_image').attr('name');
		tb_show('Upload Image', 'media-upload.php?theme_upload=1&post_id='+post_id+'&type=image&TB_iframe=true');

		current_upload = $(this).parents('.input-field');
		upload_type = 'images';
		current_input_name = $('.dummy-input', current_upload).attr('name');

		window.send_to_editor = newSendToEditor;

		return false;
	});

	storeSendToEditor = window.send_to_editor;
	
	newSendToEditor = function(html) {
		var fileUrl;

		if($(html)[0].tagName == 'A') {
			fileUrl = $(html).find('img').attr('src');
		} else {
			fileUrl = $(html).attr('src');
		}
		
		// Get Attachment ID
		var data = {
			action: 'theme_ajax_action',
			method: 'get_attachment_id_by_url',
			url: fileUrl
		};
		$.post(ajaxurl, data, function(response) {
		   	
			switch(upload_type) {
				case 'file' :
					$('.uploaded-file-container', current_upload).html('<div class="uploaded-file">'+fileUrl+'<a class="remove" href="#">remove</a><input type="hidden" value="'+ response.data +'" name="'+ current_input_name +'" /></div>');
				break;
				case 'image' :
					// Get resized image
					var data = {
						action: 'theme_ajax_action',
						method: 'get_resized_image_by_id',
						id: response.data,
						width: 80,
						height: 80
					};
					$.post(ajaxurl, data, function(get_resized_response) {
						$('.uploaded-image-container', $(current_upload)).html('<div class="uploaded-image"><img  src="'+ get_resized_response.data +'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ response.data +'" name="'+ current_input_name +'" /></div>');
					}, 'json');
				break;
				case 'images' :
					// Get resized image
					var data = {
						action: 'theme_ajax_action',
						method: 'get_resized_image_by_id',
						id: response.data,
						width: 80,
						height: 80
					};
					$.post(ajaxurl, data, function(get_resized_response) {
						$('.uploaded-images-container', $(current_upload)).append('<div class="uploaded-image"><img  src="'+ get_resized_response.data +'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ response.data +'" name="'+ current_input_name +'[]" /></div>');
					}, 'json');

					
				break;
			}

		}, 'json');

		tb_remove();
		window.send_to_editor = storeSendToEditor;
	}

	$('.uploaded-image .remove, .uploaded-file .remove').live('click', function(e){
		e.preventDefault();
		$(this).parent().fadeOut(function(){
			$(this).remove();
		});
	});
	$('.uploaded-images-container').sortable({
		items : '.uploaded-image',
		cursor : 'move',
		placeholder : 'uploaded-image-dummy'
	});
	
	// ColorBox
	$('a[rel="fancy"]').colorbox({
		rel 		: 'group',
		maxWidth	: '80%',
		maxHeight 	: '80%',
		close		: false,
		current		: false,
		opacity		: 0.75
	});
	
	// Radio Image
	$('.radio-img-list label').click(function(){
		$('.radio-img-list label', $(this).parents('.input-field') ).removeClass('active');
		$(this).addClass('active');
	});
	
	// Checkbox Image
	$('.checkbox-img-list input[type="checkbox"]').change(function(){
		$(this).is(':checked') ? $(this).siblings('label').addClass('active') : $(this).siblings('label').removeClass('active');
	});
	
	// Notification Box
	$(window).scroll(function() {
	       $('.notification-box').css('top', $(window).scrollTop() + 100);
	});
	
	// Theme Box
	$('#theme-box-tabs ul li').click(function(e){
		e.preventDefault();
		if( ! $(this).hasClass('active') ){
			$('#theme-box-tabs ul li').removeClass('active');
			$(this).addClass('active');
			$('#theme-box-content .theme-box-content-pane').removeClass('active').hide();
			$('#theme-box-content .theme-box-content-pane:eq('+$(this).index()+')').addClass('active').fadeIn();
		}
	});
	
	// Input List Odd
	$('.input-list:odd').addClass('odd');
	
	// Option Box save button
	$('#theme-options-save').click(function(){
		$('.notification-box').html('<div class="ajax-load-icon"></div>saving …').stop(true, true).fadeIn();
		var current = $(this);
		var data = {
			action: 'theme_ajax_action',
			method: 'save_option',
			options: $('#theme-options-form').serialize()
		};
		
		$.post(ajaxurl, data, function(response) {
		    if('ok' == response.result){
		    	$('.notification-box').html('<div class="ajax-okay-icon"></div>success').delay(1000).fadeOut('slow');
		    	$('#advance-theme_export_option').val(response.encodedOptions);
		    } else {
		    	$('.notification-box').html('<div class="ajax-fail-icon"></div>fail').delay(1000).fadeOut('slow');
		    }
		    if( $('#advance-theme_import_option').val() != '' ) location.reload();
		}, 'json');
	});
	
	// Type - Re-order
	$('.wp-list-table tbody').sortable({
		items : 'tr',
		handle : '.reorder-handle',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('tr.ui-state-highlight').append('<td colspan="0"></td>');
		},
		update : function(e, ui) {
			$('.ajax-load-icon', ui.item).show();
			var data = {
				action: 'theme_ajax_action',
				method: 'update_post_order',
				post_order: $(this).sortable('serialize')
			};
			$.post(ajaxurl, data, function(response) {
			   	if('ok' == response.result){
				    $('.ajax-load-icon', ui.item).hide();
				}
			}, 'json');
		}
	});
	
	//////////////// Meta 
	/*
	// Meta Add
	$(".meta-add-row-bt").click(function(e){
		e.preventDefault();
		$(this).siblings('.meta-add-row-close-bt').show();
		$(this).hide();
		$(".meta-add-row", $(this).parents("table")).slideDown();
		$(".meta-add-row .post-meta-options", $(this).parents("table")).slideDown();
	});
	$(".meta-add-row-close-bt").click(function(e){
		e.preventDefault();
		$(this).siblings('.meta-add-row-bt').show();
		$(this).hide();
		$(".meta-add-row", $(this).parents("table")).slideUp();
		$(".meta-add-row .post-meta-options", $(this).parents("table")).slideUp();
	});
	
	// Meta Edit
	$('.meta-edit-row-bt').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).parents(".meta-row").next(".meta-edit-row").slideToggle();
		$('.post-meta-options', $(this).parents(".meta-row").next(".meta-edit-row")).slideToggle();
	});
	
	// Meta Delete
	$('.meta-delete-row-bt').click(function(e){
		e.preventDefault();
		$(this).addClass('meta-delete-row-bt-loading');
		var current = $(this);
		var data = {
			action: 'theme_ajax_action',
			method: 'remove_meta',
			meta_tag: $(this).parents('.postbox').attr('id'),
			meta_index: $(this).parents('tr').attr('index'),
			post_id: post_id
		};
		$.post(ajaxurl, data, function(response) {
		   	if('ok' == response.result){
			    $(current).parents(".meta-row").next(".meta-edit-row").remove();
			    $(current).parents(".meta-row").remove();
			}
		}, 'json');
	});
	
	// Sortable Meta List
	$('.theme-setting-table tbody').sortable({
		items : '.sortable',
		cursor : 'move',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('.ui-state-highlight').append('<td colspan="100%"></td>');
		},
		update : function(e, ui) {
			var parent_table = $(ui.item).parents('table');
			$('.meta-edit-row', parent_table).each(function(){
				$(this).insertAfter($('.meta-row[index="' + $(this).attr('index') + '"]', parent_table));
			});
		}
	});
	*/
	
	
});