$(document).ready(function () {
	var tips = $('.tips').hide();

	tips.slideToggle('slow', function() {

		setTimeout(slideUp, 4000)
	})
	
	function slideUp() {

		tips.slideToggle('slow');

	}



});