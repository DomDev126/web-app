$(document).ready(function () {
	var i = 0;
	var rowSpans = $('.calendarBody'). find('[rowspan]');



	rowSpans.each(function(){
		var colNum = $(this).attr('rowspan'),
			aLink = $(this).find('a'),
			newHeight= 0;
		(colNum > 3 ) ? newHeight = colNum * 40 : newHeight = colNum * 30

		console.log(aLink.css('height', newHeight+'px'));

		



		
		
	})

});