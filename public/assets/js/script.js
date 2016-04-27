$(document).ready(function() {
	$('.form_slider_img_file').hide();

	$('.form_slider_img_checkbox input[type=checkbox]').on('click', function() {
		$('.form_slider_img_file').toggle();
	});
});