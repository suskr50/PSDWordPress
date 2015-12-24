jQuery(document).ready(function($){
	$('#upload_image_button').click(function(e){
		e.preventDefault();
		var elv_easylogo_uploader = wp.media({
			title: 'Select or upload a logo',
			button: { text: 'Select Logo' },
			multiple: false
		}).on('select', function(){
			var attachment = elv_easylogo_uploader.state().get('selection').first().toJSON();
			$('#elv_easy_logo_image').val(attachment.url);
			$('#elv_easylogo_admin_preview').attr("src", attachment.url);
		}).open();
		
	});
	
	$('#upload_retina_image_button').click(function(e){
		e.preventDefault();
		var elv_easylogo_uploader = wp.media({
			title: 'Select retina version of logo',
			button: { text: 'Select @2x Logo' },
			multiple: false
		}).on('select', function(){
			var attachment = elv_easylogo_uploader.state().get('selection').first().toJSON();
			$('#elv_easy_logo_retina_image').val(attachment.url);
		}).open();
		
	});
	
	/* The hover.css effects */
	$('#elv_select_hover_effect').on('change', function(){
		var selectedHover = $('#elv_select_hover_effect').val();
		$('#easylogo-admin-preview-p').removeClass();
		$('#easylogo-admin-preview-p').addClass(selectedHover);
	});
});