$(document).ready(function () {
	var tips = $('.tips').hide();

	tips.slideToggle('slow', function() {

		setTimeout(slideUp, 3000)
	})
	
	function slideUp() {

		tips.slideToggle('slow');

	}



});