$(document).ready(function () {


	$('#title').on('change', function (ev) {
		
		var eventTitle = $('#title').val();

		if( eventTitle.length < 3 || eventTitle.length > 100 ) {
			
			$(this).addClass('error');

		} else {

			$(this).removeClass('error');
		}

	});



	$('#datepicker').on('change', function (ev) {
		var chosenDate = $('#datepicker').val(),
			currentDate = new Date(getCurrentDate()),
			eventDate = new Date(chosenDate),

		if( currentDate > eventDate ){

			$(this).addClass('error');

		} else {

			$(this).removeClass('error');
		}


	});



	$('#end').on('change', function (ev) {
		var startTime = $('#start').val();
			endTime = $('#end').val(),
			formOptions = $(".form-options"),
			convertedStartTime = startTime.match('[a-z]{2}'),
			convertedEndTime = endTime.match('[a-z]{2}'),
			startResult = parseInt(startTime),
			endResult = parseInt(endTime);


		if ( convertedStartTime == "pm" ) {
			
			startResult +=12;

		}

		if ( convertedEndTime == "pm" ){
			
			endResult +=12;

		}

		if( startTime == "12:00pm" || startTime == "12:30pm" ){

			startResult = "12";

		}

		if( startResult >= endResult ) {

			formOptions.addClass('bad-date');

		} else {

			formOptions.removeClass('bad-date');

		}

	});
	

	function getCurrentDate(){
	   var d = new Date();
	   var string = "";

	   if(d.getMonth() + 1 <10) {

	  	 string += "0"+(d.getMonth() + 1) + "/";

	  	} else {

	  		string += (d.getMonth() + 1) + "/";
	  	}
	   string += d.getDate() + "/";
	   string += d.getFullYear();
	   return(string);
	}


});