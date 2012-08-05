/**
 * I Have Plans -- Main Calendar /  Event view
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */

$(document).ready( function () {
	var i = 0,
		rowSpans = $( '.calendarBody' ).find( '[rowspan]' );

	

	rowSpans.each( function(){
		var colNum = $(this).attr( 'rowspan' ),
			aLink = $(this).find( 'a' ),
			newHeight= 0;
			(colNum > 3 ) ? newHeight = colNum * 20 : newHeight = colNum * 15

			aLink.css( 'height', newHeight+'px' );

	})

	$( '.googleMapCanvas' ).on('click', function () {
		
		$( this ).toggleClass( 'mapMove' );

	});

	$( '#innerMap' ).on('click', function (ev) {
		
		ev.stopPropagation();

	});

});