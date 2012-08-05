/**
 * I Have Plans -- Json Object for Jquery ui / 'useless tips'
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
 */

$(document).ready(function () {
	
	var Users = {

		getUsers: function ( config ) {

	 		self = Users;
	 		this.config = config;
	 		
		 	$.ajax({
				url: (config.requestType == "all-users") ? "check-friends.php?type=all-users" : "check-friends.php?type=friends"  ,
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

		formInput: $('.formCheck'),
		requestType: $('.formCheck').data('type')

	});

// random tips that are displayed

	var tips = $('.tips').hide();
	
	if(tipsInitialize == true) {
			
		tips.slideToggle('slow', function() {

			setTimeout(slideUp, 3400)

		})
		
		function slideUp() {

			tips.slideToggle('slow');

		}

	}	



});