$(document).ready(function () {


	$('#title').on('change', function (ev) {
		var eventTitle = $('#title').val();

		if(eventTitle.length < 3 || eventTitle.length > 100) {
			$('#title').addClass('error');


			}else {
				$('#title').removeClass('error');
			}

	});



	$('#datepicker').on('change', function (ev) {
		var chosenDate = $('#datepicker').val();

		var currentDate = new Date(getCurrentDate());
		var eventDate = new Date(chosenDate);

		if(currentDate > eventDate){
			$('#datepicker').addClass('error');

		}else{
			$('#datepicker').removeClass('error');
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

			console.log(endResult);

		if (convertedStartTime == "pm") {
			startResult +=12;
		}

		if (convertedEndTime == "pm"){
			endResult +=12;
		}

		if(startTime == "12:00pm" || startTime == "12:30pm" ){

			startResult = "12";

		}

		console.log(endResult);

		if(startResult >= endResult) {
			formOptions.addClass('bad-date');

		}else{
			formOptions.removeClass('bad-date');

		}

		

	});
	

	function getCurrentDate(){
	   var d = new Date();
	   var s = "";

	   if(d.getMonth() + 1 <10) {

	  	 s += "0"+(d.getMonth() + 1) + "/";

	  	} else {

	  		s += (d.getMonth() + 1) + "/";
	  	}
	   s += d.getDate() + "/";
	   s += d.getFullYear();
	   return(s);
	}




});