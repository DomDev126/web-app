$(document).ready(function () {


	$('#datepicker').on('change', function (ev) {
		var chosenDate = $('#datepicker').val();

		var currentDate = new Date(getCurrentDate());
		var eventDate = new Date(chosenDate);

		if(currentDate >= eventDate){
			$('#datepicker').addClass('error');

		}else{
			$('#datepicker').removeClass('error');
		}

		


	});



	$('#end').on('change', function (ev) {
		var startTime = $('#start').val();
			endTime = $('#end').val(),
			convertedStartTime = startTime.match('[a-z]{2}'),
			convertedEndTime = endTime.match('[a-z]{2}'),
			startResult = parseInt(startTime),
			endResult = parseInt(endTime);

		if (convertedStartTime == "pm") {
			startResult +=12;
		}

		if (convertedEndTime == "pm"){
			endResult +=12;
		}

		if(startResult >= endResult) {
			$(".form-options").toggleClass('bad-date');

		}

		

	});
	

	function getCurrentDate(){
	   var d;
	   var s = "";
	   
	   d = new Date();
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