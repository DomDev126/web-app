$(document).ready(function () {
	var i = 0,
		rowSpans = $('.calendarBody').find('[rowspan]');

	

	rowSpans.each(function(){
		var colNum = $(this).attr('rowspan'),
			aLink = $(this).find('a'),
			newHeight= 0;
			(colNum > 3 ) ? newHeight = colNum * 40 : newHeight = colNum * 30

			aLink.css('height', newHeight+'px');

		
	})

	$('.googleMapCanvas').on('click', function () {
		$(this).toggleClass('mapMove');
	});




});