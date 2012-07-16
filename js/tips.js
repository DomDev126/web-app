$(document).ready(function () {
var tips = $('.tips').hide();
	
	if(tipsInitialize == true) {
			
		

		tips.slideToggle('slow', function() {

			setTimeout(slideUp, 3200)

		})
		
		function slideUp() {

			tips.slideToggle('slow');

		}

	}	



	var Users = {

		getUsers: function (config) {
	 		self = Users;
	 		this.config = config;
	 		
		 	$.ajax({
				url: "check-friends.php",
				type: "POST",
				dataType: "json",
				data: self.config.formInput.serialize(),
				success: function ( results ) {

					self.config.formInput.autocomplete({
				
					source: results

					});
				}

			})
		}
	}

	Users.getUsers({

		formInput: $('#addEmail')

	});

});