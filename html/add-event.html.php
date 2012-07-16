<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Event &middot I Have Plans</title>
	
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
	<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.js"></script>
	 
	<script type="text/javascript" src="js/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

	<link type="text/css" href="css/custom-theme/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
	<link href="css/general.css" rel="stylesheet">

</head>
<body>
	
	<div class="container">	
		<?php if (user_is_signed_in()) : ?>
	<p class="sign-out"><a href="sign-out.php">Sign Out</a></p>
	<?php endif; ?>
		<div class="header-container">
			<header class="mainHead">
				<figure>
					<div id="imgWrap"><img src="<?php echo (USER_IMAGE_PATH.$user_info['photo']);?>" alt="User Photo"></div>
					<figcaption>Welcome, <?php echo $user_info['username'];?></figcaption>
				</figure>		
				<nav>
					<ul>
						<li id="friends"><a href="friends.php">Friends</a></li>
						<li id="plans"><a href="add-event.php">Plans</a></li>
					</ul>
				</nav>
			</header>
		</div>
		<div class="content-container">
			<div class="eventAdd">
				<header class="contentHead extended">
					<h1>Add Event</h1>
					<p><a href="calendar.php">Back to Calendar</a></p>
				</header>
				<div class="contentBody">
					<div class="eventBody">
						<div class="top-box">
							<form method="post" action="add-event.php" id="plan-form">
								<div class="form-input">
									<label for="title">Title: </label>
									<input id="title" name="title" placeholder="Coffee Break">
								</div>

								<label for="time">Date/Title: </label>
								<div class="form-options">
									<input type="text" id="datepicker" name="date" placeholder="date">
									<input id="start" name="start" value=""  placeholder="7:30am">
									<input id="end" name="end" value=""  placeholder="4:00pm">
							</div>
							<div class="form-input">
									<label for="who-with">With who?: </label>
									<input id="who-with" name="who-with" placeholder="Will (Optional) ">
								</div>
								<div class="form-input">
									<label for="location">Location: </label>
									<input id="location" name="location" placeholder="45 Lowertown Drive">
									<p class="loc-notice">Already know the address? If not search below.</p>
								</div>
							</div>
							<div class="map-case">
								<div id="map_canvas"></div>
								<div id="map-info">
									<h3>What were you thinking?</h3>
									<input id="searchTextField" type="text" size="50">
								    <input type="radio" class="radio" name="type" id="changetype-all" checked="checked">
								    <label for="changetype-all">All</label>

								    <input type="radio" name="type" id="changetype-establishment">
								    <label for="changetype-establishment">Establishments</label>

							    </div>
								<button type="submit" id="make-plans">Make plans</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/googlePlaces.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({

			showSecond: true,
	timeFormat: 'hh:mm:ss',
	stepHour: 2,
	stepMinute: 10,
	stepSecond: 10
		});
	});

		  $(function() {
			$('#start').timepicker();
		  });
		   $(function() {
			$('#end').timepicker();
		  });
		</script>
<script src="js/plan-validator.js"></script>
<body>
</html>